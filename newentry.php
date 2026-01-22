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

	============
	newentry.php
	============
	*/

	// show all errors
	error_reporting(E_ALL & ~E_NOTICE);

	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // date in the past

	// define site name
	$site_name = "newentry.php";

	// set root path
	define('MGB_ROOT', dirname(__FILE__)."/");

	if(file_exists(MGB_ROOT."includes/config.inc.php")) {
		// load settings and functions
		require_once (MGB_ROOT.'includes/config.inc.php');
		require_once (MGB_ROOT.'includes/db.php');
		require_once (MGB_ROOT.'includes/functions.inc.php');
		require_once (MGB_ROOT.'includes/load_settings.inc.php');
		// check if mgb has been already installed or an upgrade is necessary
		mgb_iou_check($mysqli, MGB_ROOT);
	} else {
		require_once (MGB_ROOT.'includes/functions.inc.php');
		$mysqli = "";
		mgb_iou_check($mysqli, MGB_ROOT);
	}

	// start the session
	@session_name("newentry");
	ini_set('url_rewriter.tags', '');
	@session_start();
	@session_regenerate_id();

	// check if user's ip is on banlist
	if (mgb_isIpBanned($mysqli, $settings, $db)) {
		http_response_code(403);
		exit;
	}

	// override language path if "lang" parameter is set
	if(!empty($_GET['lang'])) {
		MGB_ROOT."language/".$settings['language_path'] = mgb_get_language_path($_GET['lang']);
	}

	require (MGB_ROOT."language/".$settings['language_path'].'/lang_main.php');
	require (MGB_ROOT."language/".$settings['language_path'].'/settings.php');

	// set timezone
	if(function_exists("date_default_timezone_set")) {
		date_default_timezone_set($settings['timezone']);
	}

	// check if this is a direct or not allowed access to the script
	if($settings['direct_access'] == 1) {
		if(empty($_SERVER['HTTP_REFERER'])) { $_SERVER['HTTP_REFERER'] = ""; }
		if(mgb_http_referer($mysqli, $settings['direct_access_text'], $settings['search_engines_excluded'], $settings['search_engines'], $settings['banlist_log'], $_SERVER['HTTP_REFERER'], $_SERVER['HTTP_USER_AGENT'], $_SERVER['REMOTE_ADDR'], $db['prefix'], $site_name, $settings['debug_mode']) == FALSE) {
			// destroy active session
			session_unset();
			session_destroy();
			$_SESSION = array();
			mgb_echo($lang['errormessage'][19]);
			mgb_trigger_sys_log($mysqli, 3003, '', '', '', '', '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
			die();
		}
	}

	// load general templates
	$content_header = mgb_load_template("user", $settings['template_path'], "general/header", $settings['debug_mode']);
	$content_footer = mgb_load_template("user", $settings['template_path'], "general/footer", $settings['debug_mode']);
	$content_copyright = mgb_load_template("user", $settings['template_path'], "general/copyright", $settings['debug_mode']);
	$content_scrolling_function = mgb_load_template("user", $settings['template_path'], "general/scrolling_function", $settings['debug_mode']);
	$content_errormessage = mgb_load_template("user", $settings['template_path'], "general/errormessage", $settings['debug_mode']);

	// load captcha
	if($settings['captcha_method'] == 2) {
		if(empty($content_captcha)) { $content_captcha = ""; }
      	$content_captcha.= "<br>";
      	$content_captcha.= "<div id='html_element'></div>";
      	$content_captcha.= "<br>";
    	$content_captcha.= "<script type='text/javascript' src='https://www.google.com/recaptcha/api.js?onload=onloadCallback&amp;render=explicit' async defer>";
    	$content_captcha.= "</script>";
	} else {
		$content_captcha = mgb_load_template("user", $settings['template_path'], "general/captcha", $settings['debug_mode']);
	}

	// load main templates
	$content_newentry_body = mgb_load_template("user", $settings['template_path'], "main/newentry_body", $settings['debug_mode']);
	$content_newentry_body_city = mgb_load_template("user", $settings['template_path'], "main/newentry_body_city", $settings['debug_mode']);
	$content_newentry_body_icq = mgb_load_template("user", $settings['template_path'], "main/newentry_body_icq", $settings['debug_mode']);
	$content_newentry_body_aim = mgb_load_template("user", $settings['template_path'], "main/newentry_body_aim", $settings['debug_mode']);
	$content_newentry_body_fb = mgb_load_template("user", $settings['template_path'], "main/newentry_body_fb", $settings['debug_mode']);
	$content_newentry_body_twitter = mgb_load_template("user", $settings['template_path'], "main/newentry_body_twitter", $settings['debug_mode']);
	$content_newentry_body_hp = mgb_load_template("user", $settings['template_path'], "main/newentry_body_hp", $settings['debug_mode']);
	$content_newentry_bbcodes = mgb_load_template("user", $settings['template_path'], "main/newentry_bbcodes", $settings['debug_mode']);
	$content_newentry_bbcodes_flash = mgb_load_template("user", $settings['template_path'], "main/newentry_bbcodes_flash", $settings['debug_mode']);
	$content_newentry_bbcodes_img = mgb_load_template("user", $settings['template_path'], "main/newentry_bbcodes_img", $settings['debug_mode']);
	$content_newentry_body_entry_success = mgb_load_template("user", $settings['template_path'], "main/newentry_body_entry_success", $settings['debug_mode']);
	$content_newentry_preview = mgb_load_template("user", $settings['template_path'], "main/newentry_preview", $settings['debug_mode']);
	$content_newentry_preview_gravatar = mgb_load_template("user", $settings['template_path'], "main/newentry_preview_gravatar", $settings['debug_mode']);
	$content_newentry_smileys = mgb_load_template("user", $settings['template_path'], "main/newentry_smileys", $settings['debug_mode']);
	$content_newentry_user_accept_akismet_service = mgb_load_template("user", $settings['template_path'], "main/newentry_user_accept_akismet_service", $settings['debug_mode']);
	$content_newentry_user_notification = mgb_load_template("user", $settings['template_path'], "main/newentry_user_notification", $settings['debug_mode']);
	$content_newentry_user_show_email = mgb_load_template("user", $settings['template_path'], "main/newentry_user_show_email", $settings['debug_mode']);

	if($settings['time_lock'] === 1) {
		// set start time
		if(!empty($_SESSION['start_time'])) {
			if(time() > ($_SESSION['start_time'] + $settings['time_lock_maxtime'])) {
				$_SESSION['start_time'] = time();
			}
		} else {
			$_SESSION['start_time'] = time();
		}
	} else {
		if(empty($_SESSION['start_time'])) {
			$_SESSION['start_time'] = time();
		}
	}

	if(!empty($_POST['send']) AND $_POST['send'] == $lang['send']) {
		// get information about formular elements
		if(empty($_POST[$_SESSION['FORM_ELEMENT_CAPTCHA']])) { $_POST[$_SESSION['FORM_ELEMENT_CAPTCHA']] = ""; } 
		$_POST['name'] = $_POST[$_SESSION['FORM_ELEMENT_NAME']];
		$_POST['city'] = $_POST[$_SESSION['FORM_ELEMENT_CITY']];
		$_POST['email'] = $_POST[$_SESSION['FORM_ELEMENT_EMAIL']];
		$_POST['icq'] = $_POST[$_SESSION['FORM_ELEMENT_ICQ']];		
		$_POST['fb'] = $_POST[$_SESSION['FORM_ELEMENT_FB']];
		$_POST['twitter'] = $_POST[$_SESSION['FORM_ELEMENT_TWITTER']];
		$_POST['hp'] = $_POST[$_SESSION['FORM_ELEMENT_HP']];
		$_POST['captcha'] = $_POST[$_SESSION['FORM_ELEMENT_CAPTCHA']];

		// ANTI-SPAM #1
		// ============
		// check www.stopforumspam.com if user is known for intense spamming
		if($settings['check_against_anti_spam_sites'] === 1 ) {
			if(mgb_spam_request($_POST['name'], $_POST['email'], $_SERVER['REMOTE_ADDR'], $settings['sfs_username_frequency'], $settings['sfs_email_frequency'], $settings['sfs_ip_frequency'], $settings['sfs_username_required'], $settings['sfs_email_required'], $settings['sfs_ip_required']) == 1) {
				if($settings['sfs_mark_as_spam'] == 1) {
					$mark_as_spam = 1; // accept the entry, but mark it as spam
					$noemail = 1;
					mgb_trigger_sys_log($mysqli, 3007, $_POST['name'], $_POST['email'], '', '', '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog (entry accepted but marked as spam)
				} else {
					$errorcode = 19; // user was blocked by www.stopforumspam.com
					mgb_trigger_sys_log($mysqli, 3008, $_POST['name'], $_POST['email'], '', '', '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog (entry by stopforumspam denied)
				}
			}
		}

		// delete html, php code and white spaces
		if(empty($_POST['user_notification'])) { $_POST['user_notification'] = 0; }
		if(empty($_POST['user_show_email'])) { $_POST['user_show_email'] = 0; }

		if(!empty($settings['time_lock'])) {
			// time check for formular load
			$actual_time = time();
			$difference = $actual_time - $_SESSION['start_time'];
			if($difference < $settings['time_lock_value']) {
				$errorcode = 10; // time's not up
				$rest = $settings['time_lock_value'] - $difference;
			} else {
				$_SESSION['keystroke_start_time'] = time();
			}
		}

		// THE CAKE IS A LIE!

		// form was sent and is ok!

		// check if user typed too fast and detect possible spam robots
		if(empty($errorcode)) { $errorcode = 0; }
		if(empty($mark_as_spam)) { $mark_as_spam = 0; }
		if($settings['keystroke'] == 1 AND $errorcode != 10 AND $errorcode != 19 AND $mark_as_spam != 1) {
			if(empty($_SESSION['keystroke_ban_time'])) {
				if(!mgb_get_keystrokes($settings['keystroke_max_cps'], $settings['keystroke_ban_time'], $settings['dynamic_fieldnames'], $settings['debug_mode'])) {
					$errorcode = 17; // too fast typing, possible spam robot?
					$type = 11;
					mgb_trigger_sys_log($mysqli, 3004, '', '', '', '', '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
				}
			} else {
				$keystroke_ban_time_rest = $_SESSION['keystroke_ban_time'] - time();
				if($keystroke_ban_time_rest >= 1) {
					$errorcode = 18; // user is already banned for too fast typing
				} else {
					if(!mgb_get_keystrokes($settings['keystroke_max_cps'], $settings['keystroke_ban_time'], $settings['dynamic_fieldnames'], $settings['debug_mode'])) {
						$errorcode = 17; // too fast typing, possible spam robot?
						$type = 11; // blocked by keystroke
						mgb_trigger_sys_log($mysqli, 3004, '', '', '', '', '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
					}
				}
			}
		}

		// check if captcha is correct
		if($settings['captcha'] === 1 AND !empty($_POST['name']) AND !empty($_POST['message'])) {
			if($settings['captcha_method'] === 0) { // security code
				if($_SESSION['CAPTCHA_CODE'] !== $_POST['captcha']) {
					$errorcode = 7;  // captcha wrong or not set
					mgb_trigger_sys_log($mysqli, 3005, '', '', '', '', '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
				}
			} elseif($settings['captcha_method'] === 1) { // mathematical captcha
				if($_SESSION['CAPTCHA_SUM'] !== $_POST['captcha']) {
					$errorcode = 7; // captcha wrong or not set
					mgb_trigger_sys_log($mysqli, 3005, '', '', '', '', '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
				}
			} elseif($settings['captcha_method'] == 2) { // reCaptchav2
				$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$settings['recaptcha_private_key']."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
        			$responseKeys = json_decode($response, true);
        			if(intval($responseKeys["success"]) !== 1) {
					$errorcode = 7; // captcha wrong or not set
					mgb_trigger_sys_log($mysqli, 3005, '', '', '', '', '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
        			}
			}

			// captcha was wrong
			if((!empty($settings['banlist_log']) AND $errorcode == 7) AND (!empty($_POST['captcha']) OR !empty($_POST['recaptcha_response_field']))) {
				$type = 9; // captcha wrong
				$sql = "INSERT INTO ".$db['prefix']."spam_log (
					ip,	name, email, user_agent, hp, message, type,	site, timestamp
				) VALUES (
					?, ?, ?, ?, ?, ?, ?, ?, ?
				)";
				$params = [
					$_SERVER['REMOTE_ADDR'],
					$_POST['name'] ?? '',
					$_POST['email'] ?? '',
					$_SERVER['HTTP_USER_AGENT'],
					$_POST['hp'] ?? '',
					$_POST['message'] ?? '',
					$type,
					$site_name,
					time()
				];
				$types = "ssssssisi";
				mgb_sql_connect($mysqli, $sql, "Error while saving data into spam_log.", 0, $params, $types);
			}
		}

		if(!empty($_POST['icq'])) {
			if(!check_number($_POST['icq'])) { $errorcode = 5; } // icq# is not valid
		}

		if(!empty($_POST['fb'])) {
			$_POST['fb'] = strtolower($_POST['fb']); // convert capital letters to small letters
			$_POST['fb'] = preg_replace("/https:\/\/www.facebook.com\//", "", $_POST['fb']); // extract facebook url
			if(!check_fb_name($_POST['fb'])) { $errorcode = 15; } // facebook name is not valid
		}

		if(!empty($_POST['twitter'])) {
			$_POST['twitter'] = strtolower($_POST['twitter']); // convert capital letters to small letters
			$_POST['twitter'] = preg_replace("/https:\/\/www.twitter.com\//", "", $_POST['twitter']);
			if(!check_twitter_name($_POST['twitter'])) { $errorcode = 16; } // twitter user name is not valid
		}

		if(!preg_match("/https:\/\//i", $_POST['hp'])) { // if https:// is not set, do it
			$_POST['hp'] = "https://".$_POST['hp'];
		}

		// check ip, email and domain with banlists
		if((!empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['message'])) AND ($errorcode != 7) AND ($mark_as_spam != 1) AND (!$settings['banlist_ips'] == 1 OR $settings['banlist_emails'] == 1 OR $settings['banlist_domains'] == 1)) {
			$check_banlists = mgb_check_banlists(
				$mysqli,
				$_SERVER['REMOTE_ADDR'],
				$_POST['email'],
				$settings['blocktime'],
				$settings['banlist_ips'],
				$settings['banlist_emails'],
				$settings['banlist_domains'],
				$settings['debug_mode']
			);
			if($check_banlists === 1) {
				$errorcode = 14; // blocked by ip
				$type = 1; // blocked by ip
			} elseif($check_banlists === 2) {
				$errorcode = 12; // blocked by email
				$type = 3; // blocked by email
			} elseif($check_banlists === 3) {
				$errorcode = 13; // blocked by domain
				$type = 4; // blocked by domain
			}

			if(!empty($settings['banlist_log']) AND ($errorcode === 12 OR $errorcode === 13 OR $errorcode === 14 OR $errorcode === 17)) {
				$sql = "INSERT INTO ".$db['prefix']."spam_log (
					ip,	name, email, user_agent, hp, message, type,	site, timestamp
				) VALUES (
					?, ?, ?, ?, ?, ?, ?, ?, ?
				)";

				$params = [
					$_SERVER['REMOTE_ADDR'],
					$_POST['name'] ?? '',
					$_POST['email'] ?? '',
					$_SERVER['HTTP_USER_AGENT'],
					$_POST['hp'] ?? '',
					$_POST['message'] ?? '',
					$type,
					$site_name,
					time()
				];
				$types = "ssssssisi";
				mgb_sql_connect($mysqli, $sql, "Error while saving data into spam_log.", 0, $params, $types);
			}

			// send mail to admin if an email is set
			if(!empty($settings['spam_mail']) AND !empty($settings['spam_mail']) AND !empty($errorcode)) {
				mgb_spam_mail($charset,
					$settings['spam_mail'],
					$settings['admin_gbemail'],
					$_SERVER['REMOTE_ADDR'],
					$_POST['name'],
					$_POST['email'],
					$_POST['hp'] ?? '',
					$_SERVER['HTTP_USER_AGENT'],
					'',
					'',
					$_POST['message'],
					$site_name,
					$type,
					$settings['mailer_method'],
					$settings['debug_mode']);
			}
		}

		// check required fields
		if(empty($_POST['message'])) { $errorcode = 1; } // message is required
		if(empty($_POST['email'])) {
			if($settings['require_email'] == 1) {
				$errorcode = 2; // email is required
			}
		} else {
			if(!check_mail($_POST['email'])) { $errorcode = 4; } // email's not valid
		}

		if(empty($_POST['name'])) { $errorcode = 3; } // name is required

		if(empty($errorcode)) { // everything's ok, let's format and save the entry
			$_POST['email_name'] = $_POST['name'];
			// delete bbcode except from message
			$_POST['name'] = bbcode_delete($_POST['name']);
			$_POST['city'] = bbcode_delete($_POST['city']);
			$_POST['aim'] = bbcode_delete($_POST['aim']);
			$_POST['msn'] = bbcode_delete($_POST['msn']);
			$_POST['fb'] = bbcode_delete($_POST['fb']);
			$_POST['twitter'] = bbcode_delete($_POST['twitter']);
			$_POST['hp'] = bbcode_delete($_POST['hp']);

			$_POST['message'] = nl2br($_POST['message']);
			$t1 = chr(10); // new line
			$t2 = chr(13); // carriage return
			$_POST['message'] = str_replace($t1,'', $_POST['message']);
			$_POST['message'] = str_replace($t2,'', $_POST['message']);
			if($_POST['twitter'] === "@"){ $_POST['twitter'] = ""; }
			if($_POST['hp'] === "http://" || "https://"){ $_POST['hp'] = ""; }

			// check if "moderated gb" and "user email notification" is on
			if($settings['moderated'] === 1 OR $mark_as_spam === 1) {
				$checked = 0;
				$ip = $_SERVER['REMOTE_ADDR'];
			} else {
				$checked = 1;
				$ip = mgb_anonymize_ip($_SERVER['REMOTE_ADDR']);
			}
			if($settings['user_notification'] == 0 OR empty($_POST['email'])) { $_POST['user_notification'] = 0; }
			if($settings['user_show_email'] == 0 OR empty($_POST['email'])) { $_POST['user_show_email'] = 0; }
			
			if(empty($mark_as_spam)) {
				// Write data into database
				$sql = "INSERT INTO ".$db['prefix']."entries (
					name, city,	email, icq,	aim, msn, fb, twitter, hp, message, ip, user_agent,	timestamp, user_notification, user_show_email, checked, isspam
				) VALUES (
				   ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
				)";
				$params = [
					$_POST['name'],
					$_POST['city'] ?? '',
					$_POST['email'] ?? '',
					$_POST['icq'] ?? '',
					$_POST['aim'] ?? '',
					$_POST['msn'] ?? '',
					$_POST['fb'] ?? '',
					$_POST['twitter'] ?? '',
					$_POST['hp'] ?? '',
					$_POST['message'],
					$ip,
					$_SERVER['HTTP_USER_AGENT'],
					time(),
					$_POST['user_notification'],
					$_POST['user_show_email'],
					$checked,
					$mark_as_spam
				];
				$types = "ssssssssssssiiiii";
			} else {
				// Write data into database
				$sql = "INSERT INTO ".$db['prefix']."spam (
					name, city,	email, icq,	aim, msn, fb, twitter, hp, message, ip, user_agent,	timestamp, user_notification, user_show_email, sent_captcha
				) VALUES (
				   ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
				)";
				$params = [
					$_POST['name'],
					$_POST['city'] ?? '',
					$_POST['email'] ?? '',
					$_POST['icq'] ?? '',
					$_POST['aim'] ?? '',
					$_POST['msn'] ?? '',
					$_POST['fb'] ?? '',
					$_POST['twitter'] ?? '',
					$_POST['hp'] ?? '',
					$_POST['message'],
					$_SERVER['REMOTE_ADDR'],
					$_SERVER['HTTP_USER_AGENT'],
					time(),
					$_POST['user_notification'],
					$_POST['user_show_email'],
					$_POST['captcha']
				];
				$types = "ssssssssssssiiis";
			}
			
			// saving entry
			if(mgb_sql_connect($mysqli, $sql, "Error while saving a new guestbook entry.", 0, $params, $types)) {
				if($checked == 1) {
					mgb_erase_cache(MGB_ROOT."cache/");
				}
			}

			// turn xhtml breaks into new lines
			$_POST['message'] = xhtmlbr2nl($_POST['message']);

			// send an email to admin
			if(($settings['sendmail_admin'] == 1) AND ($noemail == 0)) {
				$date = date("d"."/"."m"."/"."Y");
				$time = date("H".":"."i");

				$url_to_gb = "http://".$settings['h_domain'].$settings['gb_path']."admin/admin.php";

				$lang['sendmail_admin_title'] = format_mail(repl_uml($lang['sendmail_admin_title'], $charset), $_POST['email_name'], $date, $time, xhtmlbr2nl($_POST['email_message']), $settings['h_domain'], $url_to_gb, "", "", "", "", "", "");
				$settings['sendmail_admin_text'] = format_mail(repl_uml($settings['sendmail_admin_text'], $charset), $_POST['email_name'], $date, $time, xhtmlbr2nl($_POST['email_message']), $settings['h_domain'], $url_to_gb, "", "", "", "", "", "");

				$mail_header = "content-type: text/plain; charset=".$charset."\r\n";
				$mail_header .= "from: ".$settings['admin_gbemail']."\r\n";
				$mail_header .= "Reply-To: ".$settings['admin_gbemail']."\r\n";
				$mail_header .= "X-Mailer: PHP/".phpversion();

				if($settings['mailer_method'] == 0) {
					$mail_send = @mail($settings['admin_email'], $lang['sendmail_admin_title'], $settings['sendmail_admin_text'], $mail_header);
					if($mail_send) {
						$sendemail_successfull = 1;
					} else {
						$sendemail_successfull = 0;
					}
				} elseif($settings['mailer_method'] == 1 AND file_exists("plugins/phpmailer/class.phpmailer.php")) {
					/* $mail_send = mgb_phpmailer($settings['admin_email'], $settings['admin_email'], $_POST['email_name'], $settings['h_domain'], $lang['sendmail_admin_title'], $settings['sendmail_admin_text'], $settings['debug_mode'], "user", $language_short, $charset); */
					if($mail_send[0] == 0) {
						$sendemail_successfull = 0;
						// $errormessage = $mail_send[1];
					} else {
						$sendemail_successfull = 1;
					}
				}
			}

			// send an email to user
			if($settings['sendmail_user'] == 1 AND !empty($_POST['email']) AND ($noemail == 0)) {
				$date = date("d"."/"."m"."/"."Y");
				$time = date("H".":"."i");

				$url_to_gb = "http://".$settings['h_domain'].$settings['gb_path']."index.php?lang=".$_GET['lang'];

				$lang['sendmail_user_title'] = format_mail(repl_uml($lang['sendmail_user_title'], $charset), $_POST['email_name'], $date, $time, xhtmlbr2nl($_POST['email_message']), $settings['h_domain'], $url_to_gb, "", "", "", "", "", "");
				if($settings['moderated'] == 0) {
				  $settings['sendmail_user_text'] = format_mail(repl_uml($settings['sendmail_user_text'], $charset), $_POST['email_name'], $date, $time, xhtmlbr2nl($_POST['email_message']), $settings['h_domain'], $url_to_gb, "", "", "", "", "", "");
				} else {
				  $settings['sendmail_user_text'] = format_mail(repl_uml($settings['sendmail_user_text_moderated'], $charset), $_POST['email_name'], $date, $time, xhtmlbr2nl($_POST['email_message']), $settings['h_domain'], $url_to_gb, "", "", "", "", "", "");
				}

				$mail_header = "content-type: text/plain; charset=".$charset."\r\n";
				$mail_header .= "from: ".$settings['admin_gbemail']."\r\n";
				$mail_header .= "Reply-To: ".$settings['admin_gbemail']."\r\n";
				$mail_header .= "X-Mailer: PHP/".phpversion();

				if($settings['mailer_method'] == 0) {
					$mail_send = @mail($_POST['email'], $lang['sendmail_user_title'], $settings['sendmail_user_text'], $mail_header);
					if($mail_send) {
						$sendemail_successfull = 1;
						mgb_trigger_sys_log($mysqli, 3006, $_POST['email_name'], $_POST['email'], '', '', '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
					} else {
						$sendemail_successfull = 0;
					}
				} elseif($settings['mailer_method'] == 1 AND file_exists("plugins/phpmailer/class.phpmailer.php")) {
					/* $mail_send = mgb_phpmailer($_POST['email'], $settings['admin_email'], $_POST['email_name'], $settings['h_domain'], $lang['sendmail_user_title'], $settings['sendmail_user_text'], $settings['debug_mode'], "user", $language_short, $charset); */
					if($mail_send[0] == 0) {
						$sendemail_successfull = 0;
						// $errormessage = $mail_send[1];
					} else {
						$sendemail_successfull = 1;
						mgb_trigger_sys_log($mysqli, 3006, $_POST['email_name'], $_POST['email'], '', '', '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
					}
				}
			}

			$entry_successfull = 1;

			// destroy active session
			session_unset();
			session_destroy();
			$_SESSION = array();

			// refresh site
			if(!isset($settings['refresh_time'])) {
				$settings['refresh_time'] = 5;
			}
			$refresh = "<meta http-equiv='refresh' content='".$settings['refresh_time']."; URL=index.php{PARAMLANG_A}'>";
		} else {
			// create errormessage if needed
			if(!empty($errorcode)) {
				$errormessage = mgb_errormessage($errorcode, MGB_ROOT."language/".$settings['language_path'], "user");
			}

			// do not refresh site
			$refresh = "";

			// generate captcha code if activated
			if(empty($captcha_generated)) { $captcha_generated = 0; }
			if(($settings['captcha'] == 1) AND ($captcha_generated != 1)) {
				generate_captcha($settings['captcha_method'], $settings['captcha_length'], $settings['captcha_max_length'], $settings['captcha_salt'], $settings['captcha_hash_method'], $settings['captcha_double_hash']);
				$captcha_generated = 1;
			} elseif($settings['captcha'] == 0) {
				$content_captcha = "";
			}
		}
		// don't show preview here
		$content_newentry_preview = "";
	} else {
		// maybe preview button has been pushed instead?
		if(!empty($_POST['preview']) AND $_POST['preview'] == $lang['preview'] AND !empty($_POST['message'])) {
			// get information about formular elements
			$_POST['name'] = $_POST[$_SESSION['FORM_ELEMENT_NAME']];
			$_POST['city'] = $_POST[$_SESSION['FORM_ELEMENT_CITY']];
			$_POST['email'] = $_POST[$_SESSION['FORM_ELEMENT_EMAIL']];
			$_POST['icq'] = $_POST[$_SESSION['FORM_ELEMENT_ICQ']];
			// $_POST['aim'] = $_POST[$_SESSION['FORM_ELEMENT_AIM']];
			// $_POST['msn'] = $_POST[$_SESSION['FORM_ELEMENT_MSN']];
			// $_POST['fb'] = $_POST[$_SESSION['FORM_ELEMENT_FB']];
			// $_POST['twitter'] = $_POST[$_SESSION['FORM_ELEMENT_TWITTER']];
			$_POST['hp'] = $_POST[$_SESSION['FORM_ELEMENT_HP']];
			$_POST['captcha'] = $_POST[$_SESSION['FORM_ELEMENT_CAPTCHA']];

			$preview_message = nl2br($_POST['message']);
			$t1 = chr(10);
			$t2 = chr(13);
			$preview_message = str_ireplace($t1, '', $preview_message);
			$preview_message = str_ireplace($t2, '', $preview_message);

			if(!$settings['wordwrap'] == 0) {
				$preview_message = textWrap($preview_message, $settings['wordwrap']);
			}

			// set smilies
			if($settings['smileys'] == 1) {
				$preview_message = set_smilies($mysqli, $preview_message);
			} else {
				$preview_message = delete_smilies($mysqli, $preview_message);
			}

			// set bbcode
			if($settings['bbcode'] == 1) {
				$preview_message = bbcode_format($mysqli, $preview_message, "");
			} else {
				$preview_message = bbcode_delete($preview_message);
			}

			if(!empty($settings['gravatar_show']) AND ($settings['gravatar_show'] == 1) AND (!empty($_POST['email']))) {
				// load gravatar
				if($settings['gravatar_rating'] == 0) { $gravatar_rating = "G"; }
				if($settings['gravatar_rating'] == 1) { $gravatar_rating = "PG"; }
				if($settings['gravatar_rating'] == 2) { $gravatar_rating = "R"; }
				if($settings['gravatar_rating'] == 3) { $gravatar_rating = "X"; }
				if($settings['gravatar_type'] == 0) { $gravatar_type = "&amp;f=y"; }
				if($settings['gravatar_type'] == 1) { $gravatar_type = "&amp;d=mm"; }
				if($settings['gravatar_type'] == 2) { $gravatar_type = "&amp;d=identicon"; }
				if($settings['gravatar_type'] == 3) { $gravatar_type = "&amp;d=monsterid"; }
				if($settings['gravatar_type'] == 4) { $gravatar_type = "&amp;d=wavatar"; }
				if($settings['gravatar_type'] == 5) { $gravatar_type = "&amp;d=retro"; }
				if($settings['gravatar_type'] == 6) { $gravatar_type = "&amp;d=blank"; }

				$gravatar_url = "http://www.gravatar.com/avatar/".md5(strtolower(trim($_POST['email'])))."?s=".$settings['gravatar_size']."&amp;r=".$gravatar_rating.$gravatar_type;
				$img_gravatar = "<img src=\"".$gravatar_url."\" class=\"gravatar\" style=\"width: ".$settings['gravatar_size']."px; height: ".$settings['gravatar_size']."px;\" alt=\"".$lang['gravatar']."\" title=\"".$lang['gravatar']."\">";
			} else {
				$gravatar_size = 0;
				$img_gravatar = "";
			}

			$gravatar = mgb_template_replace(['IMG_GRAVATAR' => $img_gravatar], $content_newentry_preview_gravatar);

			if($settings['gravatar_position'] == 0) {
				$content_newentry_preview = mgb_template_replace([
					'ENTRY_GRAVATAR_LEFT' 	=> $gravatar,
					'ENTRY_GRAVATAR_RIGHT'	=> "",
					'GRAVATAR_CSS'			=> "entry_message_gravatar_left"
				], $content_newentry_preview);
			} else {
				$content_newentry_preview = mgb_template_replace([
					'ENTRY_GRAVATAR_LEFT' 	=> "",
					'ENTRY_GRAVATAR_RIGHT' 	=> $gravatar,
					'GRAVATAR_CSS' 			=> "entry_message_gravatar_right"
				], $content_newentry_preview);
			}

			$content_newentry_preview = mgb_template_replace([
				'TEMPLATE_ENTRY_MESSAGE' 	=> $preview_message,
				'GRAVATAR_SIZE'				=> $settings['gravatar_size'],
				'ENTRY_NAME'				=> $_POST['name']
			], $content_newentry_preview);
		} else {
			$content_newentry_preview = "";
		}

		// do not refresh site
		$refresh = "";

		// generate captchacode if activated
		if(empty($captcha_generated)) { $captcha_generated = ""; }
		if(($settings['captcha'] == 1) AND ($captcha_generated != 1)) {
			generate_captcha($settings['captcha_method'], $settings['captcha_length'], $settings['captcha_max_length'], $settings['captcha_salt'], $settings['captcha_hash_method'], $settings['captcha_double_hash']);
			$captcha_generated = 1;
		} elseif($settings['captcha'] == 0) {
			$content_captcha = "";
		}
	}

	// Generate Page

	// fill header template with content
	$page_header = $content_header;

	// check if "install" directory has been deleted
	if(file_exists("install") AND is_dir("install")) {
		$install_directory_exists = $content_errormessage;
		$install_directory_exists = mgb_template_replace(['ERRORMESSAGE' => $lang['install_directory_exists']], $install_directory_exists);
		$page_header = mgb_template_replace(['INSTALL_DIRECTORY_EXISTS' => $install_directory_exists], $page_header);
	} else {
		$page_header = mgb_template_replace(['INSTALL_DIRECTORY_EXISTS' => ""], $page_header);
	}

	$page_header = mgb_template_replace([
		"H_LANGUAGE_SHORT" 	=> $language_short,
		'H_DOMAIN' 			=> $settings['h_domain'],
		'H_AUTHOR'			=> $settings['h_author'],
		'H_KEYWORDS' 		=> $settings['h_keywords'],
		'H_DESCRIPTION' 	=> $settings['h_description'],
		'H_CHARSET' 		=> $charset,
		'REFRESH' 			=> $refresh
	], $page_header);

	if(empty($errorcode)) {
		$content_errormessage = "";
	}

	// Add smilies if activated
	if($settings['smileys'] == 1) {
		$sql = "SELECT * FROM ".$db['prefix']."smilies ORDER BY ID ".$settings['smileys_order'];
		$result = mgb_sql_connect($mysqli, $sql, "Error while loading smilies.", 1);

		for($i = 0; $i < mysqli_num_rows($result); $i++) {
			$smilies[$i] = mysqli_fetch_array($result, MYSQLI_ASSOC);
		}

		if(empty($smilies)) {
			$smilies = "";
		}

		$smiley_counter = 0;
		$smiley_counter_2 = 0;
		$smilies_replace = "";

		for($i = 0; $i < count($smilies); $i++) {
			$smiley_counter++;
			$smiley_counter_2++;
			if(($smiley_counter == $settings['smileys_break']) AND ($smiley_counter_2 != count($smilies))) {
				if(preg_match("/,/is", $smilies[$i]['replacement'], $treffer)) {
					$repl = explode(", ", $smilies[$i]['replacement']);
					$smilies[$i]['replacement'] = $repl[0];
				}
				$smilies_loop = "<a href='javascript&#058;AddSmiley(\"".$smilies[$i]['replacement']."\")'><img src='images/smilies/".$smilies[$i]['path']."' class='smilies' width='".$smilies[$i]['width']."' height='".$smilies[$i]['height']."' alt='".$smilies[$i]['replacement']."' title='".$smilies[$i]['replacement']."'></a><br>&nbsp;";
				$smiley_counter = 0;
			} else {
				if(preg_match("/,/is", $smilies[$i]['replacement'], $treffer)) {
					$repl = explode(", ", $smilies[$i]['replacement']);
					$smilies[$i]['replacement'] = $repl[0];
				}
				$smilies_loop = "<a href='javascript&#058;AddSmiley(\"".$smilies[$i]['replacement']."\")'><img src='images/smilies/".$smilies[$i]['path']."' class='smilies' width='".$smilies[$i]['width']."' height='".$smilies[$i]['height']."' alt='".$smilies[$i]['replacement']."' title='".$smilies[$i]['replacement']."'></a>&nbsp;";
			}
			$smilies_replace .= $smilies_loop;
		}

		$content_newentry_smileys = mgb_template_replace(['SMILIES' => $smilies_replace], $content_newentry_smileys);
	} else {
		$content_newentry_smileys = "";
	}

	// Add BBCodes if activated
	if($settings['bbcode'] == 1) {
		if(!empty($settings['allow_img_tag'])) {
			$content_newentry_bbcodes = mgb_template_replace(['TEMPLATE_BBCODE_IMG' => $content_newentry_bbcodes_img], $content_newentry_bbcodes);
		} else {
			$content_newentry_bbcodes = mgb_template_replace(['TEMPLATE_BBCODE_IMG' => ""], $content_newentry_bbcodes);
		}

		if(!empty($settings['allow_flash_tag'])) {
			$content_newentry_bbcodes = mgb_template_replace(['TEMPLATE_BBCODE_FLASH' => $content_newentry_bbcodes_flash], $content_newentry_bbcodes);
		} else {
			$content_newentry_bbcodes = mgb_template_replace(['TEMPLATE_BBCODE_FLASH' => ""], $content_newentry_bbcodes);
		}
		$bbcodes = $content_newentry_bbcodes;
	} else {
		$bbcodes = "";
	}

	// insert template for user_notification checkbox
	if($settings['user_notification'] == 1 AND $settings['moderated'] == 1) {
		if($settings['require_email'] == 1 OR !empty($_POST['email'])) {
			$content_newentry_user_notification = mgb_template_replace(['LANG_USER_NOTIFICATION' => $lang['user_notification']], $content_newentry_user_notification);
			if(!empty($_POST['send']) OR !empty($_POST['preview']) OR !empty($_POST['refresh_captcha'])) {
				if(!empty($_POST['user_notification'])) {
					$content_newentry_user_notification = mgb_template_replace(['CHECKED' => " checked='checked'"], $content_newentry_user_notification);
				} else {
					$content_newentry_user_notification = mgb_template_replace(['CHECKED' => ""], $content_newentry_user_notification);
				}
			} else {
				$content_newentry_user_notification = mgb_template_replace(['CHECKED' => " checked='checked'"], $content_newentry_user_notification);
			}
			$user_notification = $content_newentry_user_notification;
		}
	} else {
		$user_notification = "";
	}

	// insert template if user_show_email == 1
	if($settings['user_show_email'] == 1) {
		if($settings['require_email'] == 1 OR !empty($_POST['email'])) {
			$content_newentry_user_show_email = mgb_template_replace(['LANG_USER_SHOW_EMAIL' => $lang['user_show_email']], $content_newentry_user_show_email);
			if(!empty($_POST['send']) OR !empty($_POST['preview']) OR !empty($_POST['refresh_captcha'])) {
				if(!empty($_POST['user_show_email'])) {
					$content_newentry_user_show_email = mgb_template_replace(['CHECKED' => " checked='checked'"], $content_newentry_user_show_email);
				} else {
					$content_newentry_user_show_email = mgb_template_replace(['CHECKED' => ""], $content_newentry_user_show_email);
				}
			} else {
				$content_newentry_user_show_email = mgb_template_replace(['CHECKED' => " checked='checked'"], $content_newentry_user_show_email);
			}
			$user_show_email = $content_newentry_user_show_email;
		}
	} else {
		$user_show_email = "";
	}

	// insert template if akismet is acitvated
	if(file_exists(MGB_ROOT."plugins/akismet/akismet.class.php") AND (!empty($settings['akismet_plugin']))) {
		$content_newentry_user_accept_akismet_service = mgb_template_replace(['LANG_USER_ACCEPT_AKISMET_SERVICE' => $lang['user_accept_akismet_service']], $content_newentry_user_accept_akismet_service);
		$user_accept_akismet_service = $content_newentry_user_accept_akismet_service;
	} else {
		$user_accept_akismet_service = "";
	}

	// fill template with captcha
	if(($settings['captcha'] == 1) AND ($captcha_generated != 1)) {
		generate_captcha($settings['captcha_method'], $settings['captcha_length'], $settings['captcha_max_length'], $settings['captcha_salt'], $settings['captcha_hash_method'], $settings['captcha_double_hash']);
		$captcha_generated = 1;
	} elseif($settings['captcha'] == 0) {
		$content_captcha = "";
	}

	// fill template with activated / deactivated formular fields
	if($settings['show_field_city'] == 0 OR "") {
		$content_newentry_body_city = "";
	}

	if($settings['show_field_icq'] == 0 OR "") {
		$content_newentry_body_icq = "";
	}

	if($settings['show_field_aim'] == 0 OR "") {
		$content_newentry_body_aim = "";
	}

	if($settings['show_field_fb'] == 0 OR "") {
		$content_newentry_body_fb = "";
	}

	if($settings['show_field_twitter'] == 0 OR "") {
		$content_newentry_body_twitter = "";
	}

	if($settings['show_field_hp'] == 0 OR "") {
		$content_newentry_body_hp = "";
	}

	 // entry was not successfull or it is the first time the site was loaded
	if(empty($entry_successfull)) {
		// generate unique id for captcha. necessary for reloading it every time instead of loading it out of the cache
		$captcha_unique_id = generate_key_and_pw(MGB_ROOT, $mysqli, "", 16, "user");

		// get data from template
		$page_newentry_body = $content_newentry_body;

		// fill template with other templates if set
		$page_newentry_body = mgb_template_replace(['HEADER' => $page_header], $page_newentry_body);
		if($settings['captcha_method'] == 2) {
			$page_newentry_body = mgb_template_replace(["SCRIPT_RECAPTCHAV2" => "<script type='text/javascript'> var onloadCallback = function() { grecaptcha.render('html_element', {'sitekey' : '".$settings['recaptcha_pub_key']."' }); }; </script>"], $page_newentry_body);
		} else {
			$page_newentry_body = mgb_template_replace(["SCRIPT_RECAPTCHAV2" => ""], $page_newentry_body);
		}
		$page_newentry_body = mgb_template_replace([
			'TEMPLATE_ERRORMESSAGE' 				=> $content_errormessage,
			'TEMPLATE_PREVIEW' 						=> $content_newentry_preview,
			'TEMPLATE_CITY' 						=> $content_newentry_body_city,
			'TEMPLATE_ICQ' 							=> $content_newentry_body_icq,
			'TEMPLATE_AIM' 							=> $content_newentry_body_aim,
			'TEMPLATE_FB'							=> $content_newentry_body_fb,
			'TEMPLATE_TWITTER' 						=> $content_newentry_body_twitter,
			'TEMPLATE_HP' 							=> $content_newentry_body_hp,
			'TEMPLATE_SMILEYS' 						=> $content_newentry_smileys,
			'TEMPLATE_BBCODES' 						=> $bbcodes,
			'TEMPLATE_USER_NOTIFICATION' 			=> $user_notification,
			'TEMPLATE_USER_SHOW_EMAIL' 				=> $user_show_email,
			'TEMPLATE_USER_ACCEPT_AKISMET_SERVICE' 	=> $user_accept_akismet_service,
			'TEMPLATE_CAPTCHA'						=> $content_captcha,
			'CAPTCHA_UNIQUE_ID' 					=> $captcha_unique_id,
			'TEMPLATE_COPYRIGHT' 					=> $content_copyright,
			'TEMPLATE_FOOTER' 						=> $content_footer,
			'MGB_VERSION' 							=> $settings['version'],
			'COPYRIGHT_DATE' 						=> date("Y"),
			'ICONSET_PATH' 							=> $settings['iconset_path'],
			'TEMPLATE_PATH' 						=> "templates/".$settings['template_path'],
			'TEMPLATE_STYLE_PATH' 					=> $settings['template_style_path']
		], $page_newentry_body);

		// fill template with language strings
		if(empty($errormessage)) { $errormessage = ""; }
		if(empty($rest)) { $rest = ""; }
		if(empty($keystroke_ban_time_rest)) { $keystroke_ban_time_rest = ""; }
		$page_newentry_body = mgb_template_replace([
			'ERRORMESSAGE' 				=> $errormessage,
			'TIME_LOCK_REST' 			=> $rest,
			'KEYSTROKE_BAN_TIME' 		=> $settings['keystroke_ban_time'],
			'KEYSTROKE_BAN_TIME_REST' 	=> $keystroke_ban_time_rest,
			'TITLE' 					=> $settings['title']
		], $page_newentry_body);

		// fill template with sent strings
		if(empty($_POST['sent'])) {
			if($settings['dynamic_fieldnames'] == 1) {
				if($settings['dynamic_fieldnames_method'] == 0) {
					$_SESSION['FORM_ELEMENT_NAME'] = mt_rand();
					$_SESSION['FORM_ELEMENT_CITY'] = mt_rand();
					$_SESSION['FORM_ELEMENT_EMAIL'] = mt_rand();
					$_SESSION['FORM_ELEMENT_ICQ'] = mt_rand();
					$_SESSION['FORM_ELEMENT_AIM'] = mt_rand();
					$_SESSION['FORM_ELEMENT_FB'] = mt_rand();
					$_SESSION['FORM_ELEMENT_TWITTER'] = mt_rand();
					$_SESSION['FORM_ELEMENT_HP'] = mt_rand();
					// $_SESSION['FORM_ELEMENT_MESSAGE'] = mt_rand();
					$_SESSION['FORM_ELEMENT_CAPTCHA'] = mt_rand();
				} else {
					$_SESSION['FORM_ELEMENT_NAME'] = generate_key_and_pw(MGB_ROOT, $mysqli, "", $settings['dynamic_fieldnames_length'], "user");
					$_SESSION['FORM_ELEMENT_CITY'] = generate_key_and_pw(MGB_ROOT, $mysqli, "", $settings['dynamic_fieldnames_length'], "user");
					$_SESSION['FORM_ELEMENT_EMAIL'] = generate_key_and_pw(MGB_ROOT, $mysqli, "", $settings['dynamic_fieldnames_length'], "user");
					$_SESSION['FORM_ELEMENT_ICQ'] = generate_key_and_pw(MGB_ROOT, $mysqli, "", $settings['dynamic_fieldnames_length'], "user");
					$_SESSION['FORM_ELEMENT_AIM'] = generate_key_and_pw(MGB_ROOT, $mysqli, "", $settings['dynamic_fieldnames_length'], "user");
					$_SESSION['FORM_ELEMENT_FB'] = generate_key_and_pw(MGB_ROOT, $mysqli, "", $settings['dynamic_fieldnames_length'], "user");
					$_SESSION['FORM_ELEMENT_TWITTER'] = generate_key_and_pw(MGB_ROOT, $mysqli, "", $settings['dynamic_fieldnames_length'], "user");
					$_SESSION['FORM_ELEMENT_HP'] = generate_key_and_pw(MGB_ROOT, $mysqli, "", $settings['dynamic_fieldnames_length'], "user");
					// $_SESSION['FORM_ELEMENT_MESSAGE'] = generate_key_and_pw("", $settings['dynamic_fieldnames_length'], "user");
					$_SESSION['FORM_ELEMENT_CAPTCHA'] = generate_key_and_pw(MGB_ROOT, $mysqli, "", $settings['dynamic_fieldnames_length'], "user");
				}
			} else {
				$_SESSION['FORM_ELEMENT_NAME'] = "name";
				$_SESSION['FORM_ELEMENT_CITY'] = "city";
				$_SESSION['FORM_ELEMENT_EMAIL'] = "email";
				$_SESSION['FORM_ELEMENT_ICQ'] = "icq";
				$_SESSION['FORM_ELEMENT_AIM'] = "aim";
				$_SESSION['FORM_ELEMENT_FB'] = "fb";
				$_SESSION['FORM_ELEMENT_TWITTER'] = "twitter";
				$_SESSION['FORM_ELEMENT_HP'] = "hp";
				// $_SESSION['FORM_ELEMENT_MESSAGE'] = "message";
				$_SESSION['FORM_ELEMENT_CAPTCHA'] = "captcha";
			}

			$_POST[$_SESSION['FORM_ELEMENT_NAME']] = "";
			$_POST[$_SESSION['FORM_ELEMENT_CITY']] = "";
			$_POST[$_SESSION['FORM_ELEMENT_EMAIL']] = "";
			$_POST[$_SESSION['FORM_ELEMENT_ICQ']] = "";
			$_POST[$_SESSION['FORM_ELEMENT_AIM']] = "";
			$_POST[$_SESSION['FORM_ELEMENT_FB']] = "";
			$_POST[$_SESSION['FORM_ELEMENT_TWITTER']] = "";
			$_POST[$_SESSION['FORM_ELEMENT_HP']] = "";
			// $_POST[$_SESSION['FORM_ELEMENT_MESSAGE']] = "";
			$_POST[$_SESSION['FORM_ELEMENT_CAPTCHA']] = "";
		}
		
		if(empty($_POST['message'])) { $_POST['message'] = ""; }

		$page_newentry_body = mgb_template_replace([
			'POST_NAME' 	=> $_POST[$_SESSION['FORM_ELEMENT_NAME']],
			'POST_CITY' 	=> $_POST[$_SESSION['FORM_ELEMENT_CITY']],
			'POST_EMAIL' 	=> $_POST[$_SESSION['FORM_ELEMENT_EMAIL']],
			'POST_ICQ' 		=> $_POST[$_SESSION['FORM_ELEMENT_ICQ']],
			'POST_FB' 		=> $_POST[$_SESSION['FORM_ELEMENT_FB']],
			'POST_TWITTER' 	=> $_POST[$_SESSION['FORM_ELEMENT_TWITTER']],
			'POST_HP' 		=> $_POST[$_SESSION['FORM_ELEMENT_HP']],
			'POST_MESSAGE' 	=> $_POST['message'],

			'FORM_ELEMENT_NAME' 	=> $_SESSION['FORM_ELEMENT_NAME'],
			'FORM_ELEMENT_CITY' 	=> $_SESSION['FORM_ELEMENT_CITY'],
			'FORM_ELEMENT_EMAIL' 	=> $_SESSION['FORM_ELEMENT_EMAIL'],
			'FORM_ELEMENT_ICQ' 		=> $_SESSION['FORM_ELEMENT_ICQ'],
			'FORM_ELEMENT_AIM'		=> $_SESSION['FORM_ELEMENT_AIM'],
			'FORM_ELEMENT_FB' 		=> $_SESSION['FORM_ELEMENT_FB'],
			'FORM_ELEMENT_TWITTER' 	=> $_SESSION['FORM_ELEMENT_TWITTER'],
			'FORM_ELEMENT_HP' 		=> $_SESSION['FORM_ELEMENT_HP'],
			// 'FORM_ELEMENT_MESSAGE' 	=> $_SESSION['FORM_ELEMENT_MESSAGE'],
			'FORM_ELEMENT_CAPTCHA' 	=> $_SESSION['FORM_ELEMENT_CAPTCHA']
		], $page_newentry_body);

		// fill template with general data
		$page_newentry_body = mgb_template_replace(['FORM_ACTION' => "newentry.php{PARAMLANG_A}"], $page_newentry_body);

		if($settings['require_email'] == 1) {
			$page_newentry_body = mgb_template_replace([
				'EMAIL_NECESSARY' 	=> "*",
				'EMAIL_REQUIRED'	=> "required=\"required\""
			], $page_newentry_body);
		} else {
			$page_newentry_body = mgb_template_replace([
				'EMAIL_NECESSARY' 	=> "&nbsp;",
				'EMAIL_REQUIRED' 	=> ""
			], $page_newentry_body);
		}

		$page_newentry_body = mgb_template_replace([
			'PARAMLANG_A' => "?lang=".$_GET['lang'],
			'PARAMLANG_B' => "&amp;lang=".$_GET['lang']
		], $page_newentry_body);

		$page_newentry_body = mgb_template_language($page_newentry_body, MGB_ROOT."language/".$settings['language_path']."/lang_main.php", $settings['debug_mode']); // last number defines debug mode
	} else {
		// entry was successfull, load success template
		$page_newentry_body = $content_newentry_body_entry_success;

		// fill template with other templates and load them first
		$page_newentry_body = mgb_template_replace([
			'HEADER' 				=> $page_header,
			'SCRIPT_RECAPTCHAV2' 	=> "",
			'TEMPLATE_PATH' 		=> "templates/".$settings['template_path'],
			'TEMPLATE_STYLE_PATH' 	=> $settings['template_style_path'],
			'TEMPLATE_COPYRIGHT' 	=> $content_copyright,
			'TEMPLATE_FOOTER' 		=> $content_footer
		], $page_newentry_body);

		// then strings
		$page_newentry_body = mgb_template_replace(['TITLE' => $settings['title']], $page_newentry_body);

		if($settings['moderated'] == 1) {
			$page_newentry_body = mgb_template_replace(['LANG_ENTRY_SUCCESS' => $lang['entry_success_mod']], $page_newentry_body);
		} else {
			$page_newentry_body = mgb_template_replace(['LANG_ENTRY_SUCCESS' => $lang['entry_success']], $page_newentry_body);
		}

		$page_newentry_body = mgb_template_replace([
			'MGB_VERSION' 		=> $settings['version'],
			'COPYRIGHT_DATE' 	=> date("Y"),
			'ICONSET_PATH' 		=> $settings['iconset_path'],
			'PARAMLANG_A' 		=> "?lang=".cleanstr($_GET['lang']),
			'PARAMLANG_B' 		=> "&amp;lang=".cleanstr($_GET['lang']),
			'REFRESH_TIME'		=> $settings['refresh_time']
		], $page_newentry_body);

		$page_newentry_body = mgb_template_language($page_newentry_body, MGB_ROOT."language/".$settings['language_path']."/lang_main.php", $settings['debug_mode']); // last number defines debug mode
	}

	// display the page
	echo $page_newentry_body;
?>
