<?php
	/*
	MGB 0.7.x - OpenSource PHP and MySql Guestbook
	Copyright (C) 2004 - 2026 Juergen Grueneisl - https://www.m-gb.org/

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

	================
	lostpassword.php
	================
	*/

	// Show all errors but no warnings
	error_reporting(E_ALL & ~E_NOTICE);
	
	define('MGB_ROOT', str_replace("/admin", "", dirname(__FILE__)."/"));
	
	require_once (MGB_ROOT."includes/config.inc.php");
	require_once (MGB_ROOT."includes/db.php");
	require_once (MGB_ROOT."includes/functions.inc.php");
	require_once (MGB_ROOT."includes/load_settings.inc.php");
	require (MGB_ROOT."language/".$settings['language_path']."/lang_admin.php");
	require (MGB_ROOT."language/".$settings['language_path']."/settings.php");

	// set timezone
	if(function_exists("date_default_timezone_set")) {
		date_default_timezone_set($settings['timezone']);
	}

	// load necessary templates
	$content_header = mgb_load_template("admin", "default/general_admin", "header", $settings['debug_mode']);
	$content_errormessage = mgb_load_template("admin", "default/general_admin", "errormessage", $settings['debug_mode']);
	$content_lostpassword = mgb_load_template("admin", "default", "lostpassword", $settings['debug_mode']);
	$content_lostpassword_sent = mgb_load_template("admin", "default", "lostpassword_sent", $settings['debug_mode']);
	$content_copyright = mgb_load_template("admin", "default/general_admin", "copyright", $settings['debug_mode']);
	$content_footer = mgb_load_template("admin", "default/general_admin", "footer", $settings['debug_mode']);
	
	// define variables
	$np_created = 0;
	$errormessage = "";
	$statusmessage = "";

	// user has already asked for a new password and clicked on the link in the email he received from the guestbook
	if(isset($_GET['id']) AND isset($_GET['key'])) {
		$sql = "SELECT user_name, user_email, np_key, np_expiration FROM ".$db['prefix']."user WHERE ID = ?";
		$params = [$_GET['id']];
		$types = "i";
		$result = mgb_sql_connect($mysqli, $sql, "Error while checking key.", 1, $params, $types);
		$user = mysqli_fetch_array($result, MYSQLI_ASSOC);

		if($_GET['key'] === $user['np_key'] AND $user['np_expiration'] > time()) {
			$new_password = generate_key_and_pw(MGB_ROOT, $mysqli, "", $settings['password_min_length'], "adminpanel");

			$user_name = $user['user_name'];
			$email = $user['user_email'];

			$lang['sendmail_new_password_created_title'] = format_mail($lang['sendmail_new_password_created_title'], $user_name, "", time(), "", $settings['h_domain'], "", "", "", "", "", "", $new_password);
			$lang['sendmail_new_password_created_text'] = format_mail($lang['sendmail_new_password_created_text'], $user_name, "", time(), "", $settings['h_domain'], "", "", "", "", "", "", $new_password);

			$mail_header = "content-type: text/plain; charset=".$charset."\r\n";
			$mail_header .= "from: ".$settings['admin_gbemail']."\r\n";
			$mail_header .= "Reply-To: ".$settings['admin_gbemail']."\r\n";
			$mail_header .= "X-Mailer: PHP/".phpversion();

			if($settings['mailer_method'] === 0) {
				$mail_send = @mail($email, $lang['sendmail_new_password_created_title'], $lang['sendmail_new_password_created_text'], $mail_header);
				if($mail_send) {
					$newHash = password_hash($new_password, PASSWORD_DEFAULT);
					$sql = "UPDATE ".$db['prefix']."user SET user_password = '".$newHash."', np_key = '', np_expiration = '' WHERE ID = ?";
					$params = [$_GET['id']];
					$types = "i";
					mgb_sql_connect($mysqli, $sql, "Error while creating new password.", 0, $params, $types);
					$statusmessage = $lang['lostpassword_success_created'];
					$np_created = 1;
					mgb_trigger_sys_log($mysqli, 1028, '', $email, '', $user_name, '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
				} else {
					// problem with mail server
					$statusmessage = $lang['lostpassword_no_success_created'];
					$errorcode = 14;
					$np_created = 0;
				}
			}
		} else {
			// invalid or expired key
			$errorcode = 12;
			$page_lostpassword = $content_lostpassword;
		}
	}

	if($np_created === 1) {
		$page_lostpassword = $content_lostpassword_sent;
	} else {
		if(!isset($_POST['sent'])) {
			$page_lostpassword = $content_lostpassword;
		} else {
			if(isset($_POST['email']) AND mgb_check_mail($_POST['email'])) {
				$sql = "SELECT ID, user_name, np_expiration FROM ".$db['prefix']."user WHERE user_email = ?";
				$params = [$_POST['email']];
				$types = "s";
				$result = mgb_sql_connect($mysqli, $sql, "Error while getting data from database.", 1, $params, $types);
				$lostpassword = mysqli_fetch_array($result, MYSQLI_ASSOC);

				if($lostpassword['np_expiration'] <= time()) {
					$user_name = $lostpassword['user_name'];
					$email = $_POST['email'];
					$user_id = $lostpassword['ID'];

					$new_password_key = generate_key_and_pw(MGB_ROOT, $mysqli, "", 16, "adminpanel");
					$url_to_gb = "https://".$settings['h_domain'].$settings['gb_path']."admin/lostpassword.php";

					$lang['sendmail_new_password_title'] = format_mail($lang['sendmail_new_password_title'], $user_name, "", time(), "", $settings['h_domain'], $url_to_gb, "", "", "", $new_password_key, $user_id, "");
					$lang['sendmail_new_password_text'] = format_mail($lang['sendmail_new_password_text'], $user_name, "", time(), "", $settings['h_domain'], $url_to_gb, "", "", "", $new_password_key, $user_id, "");

  					$mail_header = "content-type: text/plain; charset=".$charset."\r\n";
  					$mail_header .= "from: ".$settings['admin_gbemail']."\r\n";
	  		    	$mail_header .= "Reply-To: ".$settings['admin_gbemail']."\r\n";
		    		$mail_header .= "X-Mailer: PHP/".phpversion();

					// save key for new password
					$np_expiration = time() + 86400; // 1 day

					if($settings['mailer_method'] === 0) {
						$mail_send = @mail($email, $lang['sendmail_new_password_title'], $lang['sendmail_new_password_text'], $mail_header);
						if($mail_send) {
							$sql = "UPDATE ".$db['prefix']."user SET np_key = '".$new_password_key."', np_expiration = '".$np_expiration."' WHERE ID='".$user_id."'";
							mgb_sql_connect($mysqli, $sql, "Error while updating password in the database.", 0, null, null);
							$statusmessage = $lang['lostpassword_success'];
							mgb_trigger_sys_log($mysqli, 1027, '', $email, '', $user_name, '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
							$page_lostpassword = $content_lostpassword_sent;
						} else {
							// problem with mail server
							$statusmessage = $lang['lostpassword_no_success'];
							$page_lostpassword = $content_lostpassword_sent;
							$errorcode = 14;
						}
					}
				} else {
					// new password was already requested
					$errorcode = 13;
					$page_lostpassword = $content_lostpassword;
				}
			} else {
				// invalid email
				$page_lostpassword = $content_lostpassword;
				mgb_trigger_sys_log($mysqli, 1029, '', $email, '', '', '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
			}
		}
	}

	if(!empty($errorcode)) {
		$errormessage = mgb_errormessage($errorcode, $settings['language_path'], "adminpanel");
	} else {
		$content_errormessage = "";
	}

	// Template replacement

	// Header
	if(!isset($refresh)) { $refresh = ""; }
	$page_header = $content_header;
	$page_header = mgb_template_replace([
		'H_LANGUAGE_SHORT' 	=> $language_short,
		'H_DOMAIN' 			=> $settings['h_domain'],
		'H_AUTHOR' 			=> $settings['h_author'],
		'H_KEYWORDS' 		=> $settings['h_keywords'],
		'H_DESCRIPTION' 	=> $settings['h_description'],
		'H_CHARSET' 		=> $charset,	
		'REFRESH' 			=> $refresh
	], $page_header);

	// Body
	$page_lostpassword = mgb_template_replace([
		'TEMPLATE_HEADER' 				=>  $page_header,
		'TEMPLATE_ERRORMESSAGE' 		=>  $content_errormessage,
		'ERRORMESSAGE' 					=>  $errormessage,
		'LOSTPASSWORD_STATUSMESSAGE' 	=>  $statusmessage,
		'LANG_LOSTPASSWORD_MAIL' 		=>  $lang['lostpassword_mail'],
		'LANG_GET_NEW_PW' 				=>  $lang['get_new_pw'],
		'TEMPLATE_COPYRIGHT' 			=>  $content_copyright, // Footer
		'TEMPLATE_FOOTER' 				=>  $content_footer,
		'COPYRIGHT_DATE' 				=>  date("Y")
	], $page_lostpassword);

	echo $page_lostpassword;
?>
