<?php
	/*
	MGB 0.7.x - OpenSource PHP and MySql Guestbook
	Copyright (C) 2004 - 2013 Juergen Grueneisl - http://www.m-gb.org/

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
	
	require (MGB_ROOT."includes/functions.inc.php");
	require (MGB_ROOT."includes/config.inc.php");
	require (MGB_ROOT."includes/load_settings.inc.php");
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

	if(isset($_GET['id']) AND isset($_GET['key'])) {
		$result = mgb_sql_connect("SELECT user_name, user_email, np_key, np_expiration FROM ".$db['prefix']."user WHERE ID=".secure_value($_GET['id']), "Error while checking key.", 1);
		$user = mysqli_fetch_array($result, MYSQLI_ASSOC);

		if($_GET['key'] == $user['np_key'] AND $user['np_expiration'] > time()) {
			$new_password = generate_key_and_pw("", $settings['password_min_length'], "adminpanel");

			$user_name = $user['user_name'];
			$email = $user['user_email'];

			$lang['sendmail_new_password_created_title'] = format_mail(repl_uml($lang['sendmail_new_password_created_title'], $charset), $name, $date, $time, "", $settings['h_domain'], "", "", "", "", "", "", $new_password);
			$lang['sendmail_new_password_created_text'] = format_mail(repl_uml(xhtmlbr2nl($lang['sendmail_new_password_created_text']), $charset), $name, $date, $time, "", $settings['h_domain'], "", "", "", "", "", "", $new_password);

			$mail_header = "content-type: text/plain; charset=".$charset."\r\n";
			$mail_header .= "from: ".$settings['admin_gbemail']."\r\n";
			$mail_header .= "Reply-To: ".$settings['admin_gbemail']."\r\n";
			$mail_header .= "X-Mailer: PHP/".phpversion();

			if($settings['mailer_method'] == 0) {
				$mail_send = @mail($email, $lang['sendmail_new_password_created_title'], $lang['sendmail_new_password_created_text'], $mail_header);
				if($mail_send) {
					mgb_sql_connect("UPDATE ".$db['prefix']."user SET user_password = '".md5($new_password)."', np_key = '', np_expiration = '' WHERE ID='".secure_value($_GET['id'])."'", "Error while creating new password.", 0);
					$statusmessage = $lang['lostpassword_success_created'];
					$np_created = 1;
					mgb_trigger_sys_log('1028', '', $email, '', $user_name, '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
				} else {
					// problem with mail server
					$statusmessage = $lang['lostpassword_no_success_created'];
					$errorcode = 14;
					$np_created = 0;
				}
			} elseif($settings['mailer_method'] == 1) {
				$mail_send = mgb_phpmailer($email, $settings['admin_email'], $name, $settings['h_domain'], $lang['sendmail_new_password_created_title'], $lang['sendmail_new_password_created_text'], $settings['debug_mode'], "adminpanel", $language_short, $charset);
				if($mail_send[0] == 0) {
					// problem with mail server
					$statusmessage = $lang['lostpassword_no_success_created']."<br><br>phpmailer: ".$mail_send[1];
					$errorcode = 14;
					$np_created = 0;
				} else {
					mgb_sql_connect("UPDATE ".$db['prefix']."user SET user_password = '".md5($new_password)."', np_key = '', np_expiration = '' WHERE ID='".secure_value($_GET['id'])."'", "Error while creating new password.", 0);
					$statusmessage = $lang['lostpassword_success_created'];
					$np_created = 1;
					mgb_trigger_sys_log('1028', '', $email, '', $user_name, '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
				}
			}
		} else {
			// invalid or expired key
			$errorcode = 12;
			$page_lostpassword = $content_lostpassword;
		}
	}

	if($np_created == 1) {
		$page_lostpassword = $content_lostpassword_sent;
	} else {
		if(!isset($_POST['sent'])) {
			$page_lostpassword = $content_lostpassword;
		} else {
			if(isset($_POST['email']) AND check_mail($_POST['email'])) {
				$result = mgb_sql_connect("SELECT ID, user_name, np_expiration FROM ".$db['prefix']."user WHERE user_email=".secure_value($_POST['email']), "Error while getting data from database.", 1);
				$lostpassword = mysqli_fetch_array($result, MYSQLI_ASSOC);

				if($lostpassword['np_expiration'] <= time()) {
					$user_name = $lostpassword['user_name'];
					$email = cleanstr($_POST['email']);
					$user_id = $lostpassword['ID'];

					$new_password_key = generate_key_and_pw("", 16, "adminpanel");
					$url_to_gb = "http://".$settings['h_domain'].$settings['gb_path']."admin/lostpassword.php";

					$lang['sendmail_new_password_title'] = format_mail(repl_uml(xhtmlbr2nl($lang['sendmail_new_password_title']), $charset), $name, $date, $time, "", $settings['h_domain'], $url_to_gb, "", "", "", $new_password_key, $user_id, $new_password);
					$lang['sendmail_new_password_text'] = format_mail(repl_uml(xhtmlbr2nl($lang['sendmail_new_password_text']), $charset), $name, $date, $time, "", $settings['h_domain'], $url_to_gb, "", "", "", $new_password_key, $user_id, $new_password);

  					$mail_header = "content-type: text/plain; charset=".$charset."\r\n";
  					$mail_header .= "from: ".$settings['admin_gbemail']."\r\n";
	  		    	$mail_header .= "Reply-To: ".$settings['admin_gbemail']."\r\n";
		    		$mail_header .= "X-Mailer: PHP/".phpversion();

					// save key for new password
					$np_expiration = time() + 86400; // 1 day

					if($settings['mailer_method'] == 0) {
						$mail_send = @mail($email, $lang['sendmail_new_password_title'], $lang['sendmail_new_password_text'], $mail_header);
						if($mail_send) {
							mgb_sql_connect("UPDATE ".$db['prefix']."user SET np_key = '".$new_password_key."', np_expiration = '".$np_expiration."' WHERE ID='".$user_id."'", "Error while updating password in the database.", 0);
							$statusmessage = $lang['lostpassword_success'];
							mgb_trigger_sys_log('1027', '', $email, '', $user_name, '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
							$page_lostpassword = $content_lostpassword_sent;
						} else {
							// problem with mail server
							$statusmessage = $lang['lostpassword_no_success'];
							$page_lostpassword = $content_lostpassword_sent;
							$errorcode = 14;
						}
					} elseif($settings['mailer_method'] == 1 AND file_exists("../plugins/phpmailer/class.phpmailer.php")) {
						$mail_send = mgb_phpmailer($email, $settings['admin_email'], $name, $settings['h_domain'], $lang['sendmail_new_password_title'], $lang['sendmail_new_password_text'], $settings['debug_mode'], "adminpanel", $language_short, $charset);
						if($mail_send[0] == 0) {
							// problem with mail server
							$statusmessage = $lang['lostpassword_no_success']."<br><br>phpmailer: ".$mail_send[1];
							$page_lostpassword = $content_lostpassword_sent;
							$errorcode = 14;
						} else {
							mgb_sql_connect("UPDATE ".$db['prefix']."user SET np_key = '".$new_password_key."', np_expiration = '".$np_expiration."' WHERE ID='".$user_id."'", "Error while updating password in the database.", 0);
							$statusmessage = $lang['lostpassword_success'];
							mgb_trigger_sys_log('1027', '', $email, '', $user_name, '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
							$page_lostpassword = $content_lostpassword_sent;
						}
					} else {
						mgb_echo("phpmailer not found!");
					}
				} else {
					// new password was already requested
					$errorcode = 13;
					$page_lostpassword = $content_lostpassword;
				}
			} else {
				// invalid email
				$errorcode = 7;
				$page_lostpassword = $content_lostpassword;
				mgb_trigger_sys_log('1029', '', $email, '', '', '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
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
	$page_header = $content_header;
	$page_header = template("H_LANGUAGE_SHORT", $language_short, $page_header);
	$page_header = template("H_DOMAIN", $settings['h_domain'], $page_header);
	$page_header = template("H_AUTHOR", $settings['h_author'], $page_header);
	$page_header = template("H_KEYWORDS", $settings['h_keywords'], $page_header);
	$page_header = template("H_DESCRIPTION", $settings['h_description'], $page_header);
	$page_header = template("H_CHARSET", $charset, $page_header);
	if(!isset($refresh)) { $refresh = NULL; }
	$page_header = template("REFRESH", $refresh, $page_header);

	// Body
	$page_lostpassword = template("TEMPLATE_HEADER", $page_header, $page_lostpassword);
	$page_lostpassword = template("TEMPLATE_ERRORMESSAGE", $content_errormessage, $page_lostpassword);
	$page_lostpassword = template("ERRORMESSAGE", $errormessage, $page_lostpassword);
	$page_lostpassword = template("LOSTPASSWORD_STATUSMESSAGE", $statusmessage, $page_lostpassword);

	$page_lostpassword = template("LANG_LOSTPASSWORD_MAIL", $lang['lostpassword_mail'], $page_lostpassword);
	$page_lostpassword = template("LANG_GET_NEW_PW", $lang['get_new_pw'], $page_lostpassword);

	// Footer
	$page_lostpassword = template("TEMPLATE_COPYRIGHT", $content_copyright, $page_lostpassword);
	$page_lostpassword = template("TEMPLATE_FOOTER", $content_footer, $page_lostpassword);
	$page_lostpassword = template("COPYRIGHT_DATE", date("Y"), $page_lostpassword);

	echo $page_lostpassword;
?>
