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

	======================
	settings_mails.inc.php
	======================

	DATE OF CREATION: 24.02.2013; 16:10
	*/

	// make sure nobody has direct acces to this script
	if (!defined('ADMINISTRATION')) {
		include ("error.html");
		die();
	} else {
		require_once ("../includes/functions.inc.php");
		// load template
		$content_settings_mails = mgb_load_template("admin", "default", "settings_mails", $settings['debug_mode']);

		if(empty($_GET['action'])) { $_GET['action'] = "settings_mails"; }
		if(check_rights($mysqli, $_GET['action'], $_SESSION['user_ID'])) {
			if(!empty($_POST['sent_settings'])) {
				// needed values in this script:
				//
				// sendmail_admin_text
				// sendmail_user_text
				// sendmail_user_notification_text
				// sendmail_comment_text
				// sendmail_contactmail_text
				// sendmail_contactmail_text_copy
				// smtp_server
				// smtp_port
				$empty_needed_value = 0;
				$errorcode = 0;

				if(empty($_POST['sendmail_admin_text'])) { $empty_needed_value = 27; }
				if(empty($_POST['sendmail_user_text'])) { $empty_needed_value = 28; }
				if(empty($_POST['sendmail_user_text_moderated'])) { $empty_needed_value = 29; }
				if(empty($_POST['sendmail_user_notification_text'])) { $empty_needed_value = 30; }
				if(empty($_POST['sendmail_comment_text'])) { $empty_needed_value = 31; }
				if(empty($_POST['sendmail_contactmail_text'])) { $empty_needed_value = 32; }
				if(empty($_POST['sendmail_contactmail_text_copy'])) { $empty_needed_value = 33; }
				if($_POST['mailer_method'] == 1) {
					if(file_exists("../plugins/phpmailer/class.phpmailer.php") AND file_exists("../plugins/phpmailer/class.smtp.php")) {
						if(empty($_POST['smtp_server'])) { $empty_needed_value = 36; }
						if(empty($_POST['smtp_port'])) { $empty_needed_value = 37; }
						$settings['mailer_method'] = 1;
					} else {
						$empty_needed_value = 40;
						$settings['mailer_method'] = 0;
					}
				}
				if(!empty($_POST['spam_mail'])) {
					if(!mgb_check_mail($_POST['spam_mail'])) {
						$errorcode = 7;
					}
				}

				if($empty_needed_value === 0 AND $errorcode === 0) { // no error, continue with saving settings
					$sql = "UPDATE `".$db['prefix']."settings` SET
						`sendmail_admin` = '".$_POST['sendmail_admin']."',
						`sendmail_admin_text` = '".$_POST['sendmail_admin_text']."',
						`sendmail_user` = '".$_POST['sendmail_user']."',
						`sendmail_user_text` = '".$_POST['sendmail_user_text']."',
						`sendmail_user_text_moderated` = '".$_POST['sendmail_user_text_moderated']."',
						`sendmail_user_notification_text` = '".$_POST['sendmail_user_notification_text']."',
						`sendmail_comment_text` = '".$_POST['sendmail_comment_text']."',
						`sendmail_contactmail_text` = '".$_POST['sendmail_contactmail_text']."',
						`sendmail_contactmail_text_copy` = '".$_POST['sendmail_contactmail_text_copy']."',
						`spam_mail` = '".$_POST['spam_mail']."',
						`mailer_method` = '".$_POST['mailer_method']."',
						`smtp_server` = '".$_POST['smtp_server']."',
						`smtp_port` = '".$_POST['smtp_port']."',
						`smtp_user` = '".$_POST['smtp_user']."',
						`smtp_password` = '".$_POST['smtp_password']."',
						`smtp_auth` = '".$_POST['smtp_auth']."'";

					if (mgb_sql_connect($mysqli, $sql, "Error while saving mails settings.", 0, null, null)) {
						$saved_settings_successfull = 1;
						mgb_trigger_sys_log($mysqli, 1010, '', '', '', $_SESSION['user_name'], '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
					}

					require_once ("../includes/load_settings.inc.php");
				}
			}

			// load active language
			include("../language/".$settings['language_path']."/settings.php");

			// load template
			$page_include = $content_settings_mails;

			// start replacement for template

			// replacement that has nothing to do with front end
			$page_include = mgb_template_replace(['URL_SETTINGS' => "admin.php?action=settings_mails".$sid], $page_include);
			
			// initiate variables
			$selected_mailer_method_0 = "";
			$selected_mailer_method_1 = "";
			$selected_smtp_auth_0 = "";
			$selected_smtp_auth_1 = "";
			$selected_sendmail_admin_0 = "";
			$selected_sendmail_admin_1 = "";
			$selected_sendmail_user_0 = "";
			$selected_sendmail_user_1 = "";

			// value replacement
			if($settings['mailer_method'] == 0) { $selected_mailer_method_0 = " selected"; } else { $selected_mailer_method_1 = " selected"; }
			if($settings['smtp_auth'] == 0) { $selected_smtp_auth_0 = " selected"; } else { $selected_smtp_auth_1 = " selected"; }
			if($settings['sendmail_admin'] == 0) { $selected_sendmail_admin_0 = " selected"; } else { $selected_sendmail_admin_1 = " selected"; }
			if($settings['sendmail_user'] == 0) { $selected_sendmail_user_0 = " selected"; } else { $selected_sendmail_user_1 = " selected"; }
			$page_include = mgb_template_replace([
				'SELECTED_MAILER_METHOD_0' 				=> $selected_mailer_method_0,
				'SELECTED_MAILER_METHOD_1' 				=> $selected_mailer_method_1,
				'SELECTED_SMTP_AUTH_0' 					=> $selected_smtp_auth_0,
				'SELECTED_SMTP_AUTH_1' 					=> $selected_smtp_auth_1,
				'EDIT_SMTP_SERVER' 						=> $settings['smtp_server'],
				'EDIT_SMTP_PORT' 						=> $settings['smtp_port'],
				'EDIT_SMTP_USER' 						=> $settings['smtp_user'],
				'EDIT_SMTP_PASSWORD' 					=> $settings['smtp_password'],
				'SELECTED_SENDMAIL_ADMIN_0' 			=> $selected_sendmail_admin_0,
				'SELECTED_SENDMAIL_ADMIN_1' 			=> $selected_sendmail_admin_1,
				'EDIT_SENDMAIL_ADMIN_TEXT' 				=> mgb_formatForm($settings['sendmail_admin_text']),
				'SELECTED_SENDMAIL_USER_0' 				=> $selected_sendmail_user_0,
				'SELECTED_SENDMAIL_USER_1' 				=> $selected_sendmail_user_1,
				'EDIT_SENDMAIL_USER_TEXT' 				=> mgb_formatForm($settings['sendmail_user_text']),
				'EDIT_SENDMAIL_USER_TEXT_MODERATED' 	=> mgb_formatForm($settings['sendmail_user_text_moderated']),
				'EDIT_SENDMAIL_USER_NOTIFICATION_TEXT' 	=> mgb_formatForm($settings['sendmail_user_notification_text']),
				'EDIT_SENDMAIL_COMMENT_TEXT' 			=> mgb_formatForm($settings['sendmail_comment_text']),
				'EDIT_SENDMAIL_CONTACTMAIL_TEXT' 		=> mgb_formatForm($settings['sendmail_contactmail_text']),
				'EDIT_SENDMAIL_CONTACTMAIL_TEXT_COPY' 	=> mgb_formatForm($settings['sendmail_contactmail_text_copy']),
				'EDIT_SPAM_MAIL' 						=> $settings['spam_mail']
			], $page_include);

			// is scrolling function needed?
			$content_scrolling_function = "";
		} else {
			$page_include = "<span class=\"admin\">".$lang['errormessage'][4]."</span>"; // user has no access to this page, user level too low
			$content_scrolling_function = "<br>";
		}
	}
?>
