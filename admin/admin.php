<?php
	/*
	MGB 0.7.x - OpenSource PHP and MySql Guestbook
	Copyright (C) since 2004 Juergen Grueneisl - https://www.m-gb.org/

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

	=========
	admin.php
	=========
	*/

	// Show all errors but no warnings
	error_reporting(E_ALL & ~E_NOTICE);

	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Datum in der Vergangenheit

	define('ADMINISTRATION', TRUE);
	// define site name
	$site_name = "admin.php";

	// set root path
	define('MGB_ROOT', dirname(dirname(__FILE__))."/");

	// use only cookies for session
	ini_set('session.use_only_cookies', '1');
	ini_set('session.use_trans_sid', '0');

	// start session
	session_name("sid");
	ini_set('url_rewriter.tags', '');
	session_start();
	session_regenerate_id();

	// check server_SID
	if(!isset($_SESSION['server_SID'])) {
		session_unset();
		$_SESSION = array();
		session_destroy();
		session_start();
		session_regenerate_id();
		$_SESSION['server_SID'] = true;
	}

	if(SID != NULL) { $sid = "&amp;".SID; } else {$sid = NULL; }

	if(file_exists(MGB_ROOT."includes/config.inc.php")) {
		// load settings and functions
		require_once (MGB_ROOT.'includes/config.inc.php');
		require_once (MGB_ROOT.'includes/db.php');
		require_once (MGB_ROOT.'includes/functions.inc.php');
		require_once (MGB_ROOT.'includes/load_settings.inc.php');
		// check if mgb has been already installed or an upgrade is necessary
		mgb_iou_check($mysqli, "../");
	} else {
		require_once (MGB_ROOT.'includes/functions.inc.php');
		$mysqli = "";
		mgb_iou_check($mysqli, "../");
	}

	if(!empty($_POST['language_path'])) {
		require_once (cleanstr(MGB_ROOT."language/".$_POST['language_path'])."/lang_admin.php");
		require_once (cleanstr(MGB_ROOT."language/".$_POST['language_path'])."/settings.php");
	} else {
		require_once (MGB_ROOT."language/".$settings['language_path']."/lang_admin.php");
		require_once (MGB_ROOT."language/".$settings['language_path']."/settings.php");
	}

	// set timezone
	if(function_exists("date_default_timezone_set")) {
		date_default_timezone_set($settings['timezone']);
	}

	// load necessary templates
	$page_header = mgb_load_template("admin", "default/general_admin", "header", $settings['debug_mode']);
	$page_admin = mgb_load_template("admin", "default", "admin", $settings['debug_mode']);
	$content_errormessage = mgb_load_template("admin", "default/general_admin", "errormessage", $settings['debug_mode']);
	$content_scrolling_function = mgb_load_template("admin", "default/general_admin", "scrolling_function", $settings['debug_mode']);
	$content_login = mgb_load_template("admin", "default", "login", $settings['debug_mode']);
	$content_login_ok = mgb_load_template("admin", "default", "login_ok", $settings['debug_mode']);
	$content_dropbox_normal = mgb_load_template("admin", "default", "dropbox_normal", $settings['debug_mode']);
	$content_dropbox_spam = mgb_load_template("admin", "default", "dropbox_spam", $settings['debug_mode']);
	$content_dropbox_banlists = mgb_load_template("admin", "default", "dropbox_banlists", $settings['debug_mode']);
	$content_copyright = mgb_load_template("admin", "default/general_admin", "copyright", $settings['debug_mode']);
	$content_footer = mgb_load_template("admin", "default/general_admin", "footer", $settings['debug_mode']);

	if(isset($_SESSION['user_key'])) {
		if(!check_session($mysqli, $_SESSION['user_ID'], $_SESSION['user_key'], $_SESSION['user_ip'], $settings['session_timeout'])) {
			session_unset();
			session_destroy();
			$_SESSION = array();
			$errorcode = 9; // something's wrong with actual session, so destroy it
		}
	} else {
		$include = "login.inc.php";
		$new_version_available = "&nbsp;";
	}
	
	// define variables
	$template_message = "";

	// login status
	if(empty($_SESSION['user_ID']) OR !empty($_GET['action']) AND $_GET['action'] == "logout") {
		$include = "login.inc.php";
		$new_version_available = "&nbsp;";
	} else {
		// get info about new version
		if(function_exists('mgb_file_get_contents_curl')) {
			$latest_version = mgb_file_get_contents_curl('https://www.m-gb.org/latest.txt');
		}

		switch(version_compare($settings['version'], $latest_version)) {
		case -1: $new_version_available = $lang['new_version_available'];
			break;
		case 0: $new_version_available = "&nbsp;";
			break;
		case 1: $new_version_available = "&nbsp;";
			break;
		}
		
		// send the ping
		mgb_send_telemetry($settings['aus_allow'], $settings['aus_last_ping'], $settings['version'], $mysql_client, $db['prefix'], $settings['aus_install_id'], $settings['aus_ping_address'], $mysqli, 86400); // 1 day = 86400 seconds

		$login_status_text = "<b>PHP</b>: ".phpversion()."&nbsp;| <b>MySQL Client</b>: ".$mysql_client."&nbsp;| <b>MySQL Server</b>: ".$mysql_server."&nbsp;|&nbsp;".$lang['logged_in']."&nbsp;|&nbsp;<a class='admin' href='admin.php?action=logout' title='{LANG_LOGOUT}'>{LANG_LOGOUT}</a>&nbsp;";
		$login_status_img = "<img src='templates/default/images/logout.png' height='16' width='16' title='{LANG_LOGOUT}' alt='{LANG_LOGOUT}'>";

		$page_navigation = mgb_load_template("admin", "default", "navigation", $settings['debug_mode']);

		if(!empty($_GET['action']) AND ($_GET['action'] == "settings_general")) {
			$include = "settings_general.inc.php";
		}
		elseif(!empty($_GET['action']) AND ($_GET['action'] == "settings_look")) {
			$include = "settings_look.inc.php";
		}
		elseif(!empty($_GET['action']) AND ($_GET['action'] == "settings_fields")) {
			$include = "settings_fields.inc.php";
		}
		elseif(!empty($_GET['action']) AND ($_GET['action'] == "settings_bbcodes")) {
			$include = "settings_bbcodes.inc.php";
		}
		elseif(!empty($_GET['action']) AND ($_GET['action'] == "settings_emoticons")) {
			$include = "settings_emoticons.inc.php";
		}
		elseif(!empty($_GET['action']) AND ($_GET['action'] == "settings_gravatar")) {
			$include = "settings_gravatar.inc.php";
		}
		elseif(!empty($_GET['action']) AND ($_GET['action'] == "settings_security")) {
			$include = "settings_security.inc.php";
		}
		elseif(!empty($_GET['action']) AND ($_GET['action'] == "settings_mails")) {
			$include = "settings_mails.inc.php";
		}
		elseif(!empty($_GET['action']) AND ($_GET['action'] == "settings_database")) {
			if(!empty($_GET['db_action']) AND $_GET['db_action'] == "show_phpinfo") {
				$include = "phpinfo.inc.php";
			}
			else {
				$include = "settings_database.inc.php";
			}
		}
		elseif(!empty($_GET['action']) AND ($_GET['action'] == "settings_usage")) {
			$include = "settings_usage.inc.php";
		}
		elseif(!empty($_GET['action']) AND ($_GET['action'] == "activate")) {
			$include = "activate.inc.php";
		}
		elseif(!empty($_GET['action']) AND ($_GET['action'] == "deactivate")) {
			$include = "deactivate.inc.php";
		}
		elseif(!empty($_GET['action']) AND ($_GET['action'] == "delete")) {
			$include = "delete.inc.php";
		}
		elseif(!empty($_GET['action']) AND ($_GET['action'] == "edit")) {
			$include = "edit.inc.php";
		}
		elseif(!empty($_GET['action']) AND ($_GET['action'] == "spam")) {
			$include = "spam.inc.php";
		}
		elseif(!empty($_GET['action']) AND ($_GET['action'] == "smilies")) {
			$include = "smilies.inc.php";
		}
		elseif(!empty($_GET['action']) AND ($_GET['action'] == "editusers")) {
			$include = "edit_user.inc.php";
		}
		elseif(!empty($_GET['action']) AND ($_GET['action'] == "banlist_ips")) {
			$include = "banlist_ips.inc.php";
		}
		elseif(!empty($_GET['action']) AND ($_GET['action'] == "banlist_emails")) {
			$include = "banlist_emails.inc.php";
		}
		elseif(!empty($_GET['action']) AND ($_GET['action'] == "banlist_domains")) {
			$include = "banlist_domains.inc.php";
		}
		elseif(!empty($_GET['action']) AND ($_GET['action'] == "spam_log")) {
			$include = "spam_log.inc.php";
		}
		elseif(!empty($_GET['action']) AND ($_GET['action'] == "sys_log")) {
			$include = "sys_log.inc.php";
		}
		elseif(!empty($_GET['action']) AND ($_GET['action'] == "license")) {
			$page_include = file_get_contents("license.html");
		}
		elseif(!empty($_GET['action']) AND ($_GET['action'] == "version")) {
			$include = "version.inc.php";
		}
		else {
			$include = "settings_general.inc.php";
		}
	}

	if(empty($_GET['action']) OR $_GET['action'] != "license") {
		include $include;
	} elseif($_GET['action'] == "license") {
		$login_status_text = "<b>PHP</b>: ".phpversion()."&nbsp;| <b>MySQL</b>: ".$mysql_server."&nbsp;|&nbsp;".$lang['logged_in']."&nbsp;|&nbsp;<a class='admin' href='admin.php?action=logout' title='{LANG_LOGOUT}'>{LANG_LOGOUT}</a>&nbsp;";
		$login_status_img = "<img src='templates/default/images/logout.png' height='16' width='16' title='{LANG_LOGOUT}' alt='{LANG_LOGOUT}'>";

		// get info about new version
		$latest_version = get_mgb_version_info("https://www.m-gb.org/latest.txt");

		switch(version_compare($settings['version'], $latest_version)) {
		case -1: $new_version_available = $lang['new_version_available'];
			break;
		case 0: $new_version_available = "&nbsp;";
			break;
		case 1: $new_version_available = "&nbsp;";
			break;
		}

		if(isset($include) AND ($include == "login.inc.php")) {
			include $include;
		} else {
			$page_include = file_get_contents("license.html");
			$content_scrolling_function = "<br>";
		}
	} else {
		$content_scrolling_function = "<br>";
	}

	// get total number of spam entries
	$sql = "SELECT COUNT(ID) as total FROM ".$db['prefix']."spam";
	$results_spam = mgb_sql_connect($mysqli, $sql, "Error while getting information about spam entries in navigation.", 1);
	$sql = "SELECT COUNT(ID) as total FROM ".$db['prefix']."entries WHERE checked=0 and isspam=0";
	$results_deactivated = mgb_sql_connect($mysqli, $sql, "Error while getting information about deactivated entries.", 1);
	$sql = "SELECT COUNT(ID) as total FROM ".$db['prefix']."spam_log";
	$results_spam_log = mgb_sql_connect($mysqli, $sql, "Error while getting information about spam log in navigation.", 1);

	$row_spam = $results_spam->fetch_assoc();
	$row_deactivated = $results_deactivated->fetch_assoc();
	$row_spam_log = $results_spam_log->fetch_assoc();
	
	$total_spam = (int)$row_spam['total'];
	$total_deactivated = (int)$row_deactivated['total'];
	$total_spam_log = (int)$row_spam_log['total'];

	// if there are spam entries, show it in navigation
	if ($total_spam >= 1) {
		$lang['spam'] = $lang['spam']."&nbsp;(".$total_spam.")";
	}
	// if there are deactivated entries, show it in navigation
	if ($total_deactivated >= 1) {
		$lang['activate'] = $lang['activate']."&nbsp;(".$total_deactivated.")";
	}
	// if there are spam_log entries, show it in navigation
	if ($total_spam_log >= 1) {
		$lang['spam_log'] = $lang['spam_log']."&nbsp;(".$total_spam_log.")";
	}
	
	if(empty($page_navigation)) { $page_navigation = ""; }

	$page_navigation = mgb_template_replace([
		'LINK_SETTINGS' 			=> "admin.php?action=settings".$sid,
		'LINK_SETTINGS_GENERAL' 	=> "admin.php?action=settings_general".$sid,
		'LINK_SETTINGS_LOOK' 		=> "admin.php?action=settings_look".$sid,
		'LINK_SETTINGS_FIELDS' 		=> "admin.php?action=settings_fields".$sid,
		'LINK_SETTINGS_BBCODES' 	=> "admin.php?action=settings_bbcodes".$sid,
		'LINK_SETTINGS_EMOTICONS' 	=> "admin.php?action=settings_emoticons".$sid,
		'LINK_SETTINGS_GRAVATAR' 	=> "admin.php?action=settings_gravatar".$sid,
		'LINK_SETTINGS_SECURITY' 	=> "admin.php?action=settings_security".$sid,
		'LINK_SETTINGS_MAILS' 		=> "admin.php?action=settings_mails".$sid,
		'LINK_SETTINGS_DATABASE' 	=> "admin.php?action=settings_database".$sid,
		'LINK_SETTINGS_USAGE' 		=> "admin.php?action=settings_usage".$sid,
		'LINK_ACTIVATE' 			=> "admin.php?action=activate".$sid,
		'LINK_DEACTIVATE' 			=> "admin.php?action=deactivate".$sid,
		'LINK_DELETE' 				=> "admin.php?action=delete".$sid,
		'LINK_EDIT' 				=> "admin.php?action=edit".$sid,
		'LINK_SPAM' 				=> "admin.php?action=spam".$sid,
		'LINK_EDIT_SMILIES' 		=> "admin.php?action=smilies".$sid,
		'LINK_EDIT_USERS' 			=> "admin.php?action=editusers".$sid,
		'LINK_BANLIST_IPS' 			=> "admin.php?action=banlist_ips".$sid,
		'LINK_BANLIST_EMAILS' 		=> "admin.php?action=banlist_emails".$sid,
		'LINK_BANLIST_DOMAINS' 		=> "admin.php?action=banlist_domains".$sid,
		'LINK_SPAM_LOG' 			=> "admin.php?action=spam_log".$sid,
		'LINK_SYS_LOG' 				=> "admin.php?action=sys_log".$sid,
		'LINK_LICENSE' 				=> "admin.php?action=license".$sid,
		'LINK_FORUM' 				=> "https://forum.m-gb.org/",
		'LINK_VERSION' 				=> "admin.php?action=version".$sid,
		'LINK_MASTODON' 			=> "https://troet.cafe/@mgb",
		'LINK_GITHUB'	 			=> "https://github.com/mopzz-gb/MGB-OpenSource-Guestbook",
		'LINK_TO_GUESTBOOK' 		=> "../index.php",

		'LANG_SPAM' 				=> $lang['spam'],
		'LANG_ACTIVATE' 			=> $lang['activate'],
		'LANG_SPAM_LOG' 			=> $lang['spam_log'],

		'TEMPLATE_PATH' 			=> "../templates/".$settings['template_path']
	], $page_navigation);

	if(!isset($refresh)) { $refresh = NULL; }
	
	// fill header template with content
	$page_header = mgb_template_replace([
		'H_LANGUAGE_SHORT' 	=> $language_short,
		'H_DOMAIN' 			=> $settings['h_domain'],
		'H_AUTHOR' 			=> $settings['h_author'],
		'H_KEYWORDS' 		=> $settings['h_keywords'],
		'H_DESCRIPTION' 	=> $settings['h_description'],
		'H_CHARSET' 		=> $charset,
		'REFRESH' 			=> $refresh
	], $page_header);

	if(!isset($_SESSION['user_name'])) { $_SESSION['user_name'] = NULL; }
	if(!isset($page_navigation)) { $page_navigation = NULL; }
	if(!isset($how_many_entries)) { $how_many_entries = NULL; }
	if(!isset($p)) { $p = NULL; }
	
	// fill admin_body template with content
	$page_admin = mgb_template_replace([
		'TEMPLATE_HEADER' 				=> $page_header,
		'TITLE' 						=> $lang['title'],
		'LOGIN_STATUS_TEXT' 			=> $login_status_text,
		'LOGIN_STATUS_IMG' 				=> $login_status_img,
		'SESSION_USERNAME' 				=> $_SESSION['user_name'],
		'TEMPLATE_NAVIGATION' 			=> $page_navigation,
		'LANG_HOW_MANY_ENTRIES' 		=> $how_many_entries,
		'PAGES' 						=> $p,
		'TEMPLATE_SCROLLING_FUNCTION' 	=> $content_scrolling_function
	], $page_admin);

	if(!isset($page_include)) { $page_include = NULL; }
	
	if(empty($saved_settings_successfull)) { $saved_settings_successfull = ""; }

	if($saved_settings_successfull === 1) {
		if(($_GET['action'] == "settings") OR
			($_GET['action'] == "settings_general") OR
			($_GET['action'] == "settings_look") OR
			($_GET['action'] == "settings_fields") OR
			($_GET['action'] == "settings_bbcodes") OR
			($_GET['action'] == "settings_emoticons") OR
			($_GET['action'] == "settings_gravatar") OR
			($_GET['action'] == "settings_security") OR
			($_GET['action'] == "settings_mails") OR
			($_GET['action'] == "settings_database") OR
			($_GET['action'] == "settings_usage") OR
			($_GET['action'] == "editusers") OR
			($_GET['action'] == "edit") OR
			($_GET['action'] == "smilies")) {
			$page_admin = mgb_template_replace(["TEMPLATE_MESSAGE" => "<span class='newer_version'>".$lang['edit_save_message']."</span><br><br>"], $page_admin);
		}
	}

	if(!empty($template_message)) {
		if(($_GET['action'] == "banlist_ips") OR
			($_GET['action'] == "banlist_emails") OR
			($_GET['action'] == "banlist_domains") OR
			($_GET['action'] == "spam_log") OR
			($_GET['action'] == "sys_log") OR
			($_GET['action'] == "spam") OR
			($_GET['action'] == "settings_database")) {
			$page_admin = mgb_template_replace(['TEMPLATE_MESSAGE' => "<span>".$template_message."</span><br><br>"], $page_admin);
		}
	}

	if(empty($empty_needed_value)) { $empty_needed_value = ""; }
	if($empty_needed_value > 0) {
		if (($_GET['action'] == "settings_general") OR
			($_GET['action'] == "settings_look") OR
			($_GET['action'] == "settings_bbcodes") OR
			($_GET['action'] == "settings_emoticons") OR
			($_GET['action'] == "settings_gravatar") OR
			($_GET['action'] == "settings_security") OR
			($_GET['action'] == "settings_mails") OR
			($_GET['action'] == "settings_database")) {
			$page_admin = mgb_template_replace(["TEMPLATE_MESSAGE" => "<span class='old_version'>".$lang['empty_needed_value'][$empty_needed_value]."</span><br><br>"], $page_admin);
		}
	}

	if(isset($sendemail_successfull) AND $sendemail_successfull === 1) {
	$page_admin = mgb_template_replace(["TEMPLATE_MESSAGE" => ""], $page_admin);
	} elseif(isset($sendemail_successfull) AND $sendemail_successfull === 0) {
		if(empty($template_message)) { $template_message = ""; }
		if(isset($_GET['action']) AND ($_GET['action'] == "activate") AND (isset($_GET['id']) AND !isset($_GET['isspam']))) {
			$page_admin = mgb_template_replace(["TEMPLATE_MESSAGE" => "<span class='old_version'>".$lang['errormessage'][14].$template_message."</span><br><br>"], $page_admin);
		} elseif(isset($_GET['action']) AND ($_GET['action'] == "edit") AND (isset($_GET['id']) AND (isset($_POST['sent_edit']) AND ($_POST['sent_edit'] == 1)) AND !isset($_GET['isspam']))) {
			$page_admin = mgb_template_replace(["TEMPLATE_MESSAGE" => "<span class='old_version'>".$lang['errormessage'][14].$template_message."</span><br><br>"], $page_admin);
		} elseif(isset($_GET['action']) AND ($_GET['action'] == "editusers" AND (isset($_POST['sent_edit']) AND ($_POST['sent_edit'] === 1)) AND !isset($_GET['isspam']))) {
		$page_admin = mgb_template_replace(["TEMPLATE_MESSAGE" => "<span class='old_version'>".$lang['errormessage'][14].$template_message."</span><br><br>"], $page_admin);
		} else {
			$page_admin = mgb_template_replace(["TEMPLATE_MESSAGE" => ""], $page_admin);
		}
	} else {
		$page_admin = mgb_template_replace(["TEMPLATE_MESSAGE" => ""], $page_admin);
	}

	if(isset($_GET['action']) AND ($_GET['action'] == 'spam')) {
		$page_admin = mgb_template_replace([
			'TEMPLATE_DROPBOX_NORMAL' 	=> '',
			'TEMPLATE_DROPBOX_BANLISTS' => ''
		], $page_admin);
		if($total >= 2) {
			$page_admin = mgb_template_replace([
				'TEMPLATE_DROPBOX_SPAM' 			=> $content_dropbox_spam,
				'OPTION_SNEAK_EVERYTHING' 			=> "<option value=\"7\">{LANG_SNEAK_EVERYTHING}</option>",
				'OPTION_PUT_ALL_IPS_ON_BANLIST' 	=> "<option value=\"4\">{LANG_PUT_ALL_IPS_ON_BANLIST}</option>",
				'OPTION_PUT_ALL_EMAILS_ON_BANLIST' 	=> "<option value=\"5\">{LANG_PUT_ALL_EMAILS_ON_BANLIST}</option>",
				'OPTION_PUT_ALL_DOMAINS_ON_BANLIST' => "<option value=\"6\">{LANG_PUT_ALL_DOMAINS_ON_BANLIST}</option>"
		], $page_admin);
		} else {
			$page_admin = mgb_template_replace(["TEMPLATE_DROPBOX_SPAM" => ''], $page_admin);
		}
	} elseif(isset($_GET['action']) AND ($_GET['action'] == 'banlist_ips' OR $_GET['action'] == 'banlist_emails' OR $_GET['action'] == 'banlist_domains' OR $_GET['action'] == 'spam_log')) {
		$page_admin = mgb_template_replace([
			'TEMPLATE_DROPBOX_NORMAL' 	=> '',
			'TEMPLATE_DROPBOX_SPAM' 	=> ''
		], $page_admin);
		if($total >= 1) {
			$page_admin = mgb_template_replace([
				'TEMPLATE_DROPBOX_BANLISTS' => $content_dropbox_banlists,
				'ACTION_BANLISTS' 			=> $_GET['action']
			], $page_admin);
			if($_GET['action'] == 'banlist_ips' OR $_GET['action'] == 'banlist_emails' OR $_GET['action'] == 'banlist_domains') {
				$page_admin = mgb_template_replace([
					'OPTION_PUT_ALL_IPS_ON_BANLIST' 					=> "",
					'OPTION_PUT_ALL_EMAILS_ON_BANLIST' 					=> "",
					'OPTION_PUT_ALL_DOMAINS_ON_BANLIST' 				=> "",
					'OPTION_PUT_ALL_ON_BANLISTS_AND_DELETE_EVERYTHING' 	=> "",
					'OPTION_SNEAK_EVERYTHING' 							=> "",
					'OPTION_SHOW_BANNED_BY_IP_ONLY' 					=> "",
					'OPTION_SHOW_BANNED_BY_EMAIL_ONLY' 					=> "",
					'OPTION_SHOW_BANNED_BY_DOMAIN_ONLY' 				=> "",
					'OPTION_SHOW_BANNED_BY_KEYSTROKE_ONLY' 				=> "",
					'OPTION_SHOW_BANNED_BY_CAPTCHA_ONLY' 				=> ""
				], $page_admin);
				// $page_admin = template("OPTION_EXPORT_AS_SQL_DUMP", "<option value='10'>{LANG_EXPORT_AS_SQL_DUMP}", $page_admin);
				// $page_admin = template("OPTION_EXPORT_AS_CSV", "<option value='11'>{LANG_EXPORT_AS_CSV}", $page_admin);
			} elseif($_GET['action'] == 'spam_log') {
				$page_admin = mgb_template_replace([
					'OPTION_PUT_ALL_IPS_ON_BANLIST' 					=> "<option value='2'>{LANG_PUT_ALL_IPS_ON_BANLIST}</option>",
					'OPTION_PUT_ALL_EMAILS_ON_BANLIST' 					=> "<option value='3'>{LANG_PUT_ALL_EMAILS_ON_BANLIST}</option>",
					'OPTION_PUT_ALL_DOMAINS_ON_BANLIST' 				=> "<option value='10'>{LANG_PUT_ALL_DOMAINS_ON_BANLIST}</option>",
					'OPTION_PUT_ALL_ON_BANLISTS_AND_DELETE_EVERYTHING' 	=> "<option value='4'>{LANG_PUT_ALL_ON_BANLISTS_AND_DELETE_EVERYTHING}</option>",
					'OPTION_SNEAK_EVERYTHING' 							=> "<option value='11'>{LANG_SNEAK_EVERYTHING}</option>",
					'OPTION_SHOW_BANNED_BY_IP_ONLY' 					=> "<option value='5'>{LANG_SHOW_BANNED_BY_IP_ONLY}</option>",
					'OPTION_SHOW_BANNED_BY_EMAIL_ONLY'	 				=> "<option value='6'>{LANG_SHOW_BANNED_BY_EMAIL_ONLY}</option>",
					'OPTION_SHOW_BANNED_BY_DOMAIN_ONLY' 				=> "<option value='7'>{LANG_SHOW_BANNED_BY_DOMAIN_ONLY}</option>",
					'OPTION_SHOW_BANNED_BY_KEYSTROKE_ONLY' 				=> "<option value='8'>{LANG_SHOW_BANNED_BY_KEYSTROKE_ONLY}</option>",
					'OPTION_SHOW_BANNED_BY_CAPTCHA_ONLY' 				=> "<option value='9'>{LANG_SHOW_BANNED_BY_CAPTCHA_ONLY}</option>"
				], $page_admin);
				// $page_admin = template("OPTION_EXPORT_AS_SQL_DUMP", "", $page_admin);
				// $page_admin = template("OPTION_EXPORT_AS_CSV", "", $page_admin);
			}
		} else {
			$page_admin = mgb_template_replace(["TEMPLATE_DROPBOX_BANLISTS" => ''], $page_admin);
		}
	} else {
		if(isset($total) AND ($total >= 1)) {
			if($_GET['action'] == 'activate') {
				$page_admin = mgb_template_replace([
					'TEMPLATE_DROPBOX_NORMAL' 		=> $content_dropbox_normal,
					'OPTION_ACTIVATE_ALL_ENTRIES' 	=> "<option value='1'>{LANG_ACTIVATE_ALL_ENTRIES}</option>",
					'OPTION_MARK_ALL_AS_SPAM' 		=> "<option value='2'>{LANG_MARK_ALL_AS_SPAM}</option>",
					'OPTION_DEACTIVATE_ALL_ENTRIES' => '',
					'OPTION_DELETE_ALL_ENTRIES' 	=> ''
				], $page_admin);
			} elseif($_GET['action'] == 'deactivate') {
				$page_admin = mgb_template_replace([
					'TEMPLATE_DROPBOX_NORMAL' 		=> $content_dropbox_normal,
					'OPTION_ACTIVATE_ALL_ENTRIES' 	=> '',
					'OPTION_MARK_ALL_AS_SPAM' 		=> '',
					'OPTION_DEACTIVATE_ALL_ENTRIES' => "<option value='1'>{LANG_DEACTIVATE_ALL_ENTRIES}</option>",
					'OPTION_DELETE_ALL_ENTRIES' 	=> ''
				], $page_admin);
			} elseif($_GET['action'] == 'delete') {
				$page_admin = mgb_template_replace([
					'TEMPLATE_DROPBOX_NORMAL' 		=> $content_dropbox_normal,
					'OPTION_ACTIVATE_ALL_ENTRIES' 	=> '',
					'OPTION_MARK_ALL_AS_SPAM' 		=> '',
					'OPTION_DEACTIVATE_ALL_ENTRIES' => '',
					'OPTION_DELETE_ALL_ENTRIES' 	=> "<option value='1'>{LANG_DELETE_ALL_ENTRIES}</option>"
				], $page_admin);
			} elseif($_GET['action'] == 'edit') {
				$page_admin = mgb_template_replace(["TEMPLATE_DROPBOX_NORMAL" => ''], $page_admin);
			}
		} else {
			$page_admin = mgb_template_replace(["TEMPLATE_DROPBOX_NORMAL" => ''], $page_admin);
		}
		$page_admin = mgb_template_replace([
			'TEMPLATE_DROPBOX_SPAM' 	=> '',
			'TEMPLATE_DROPBOX_BANLISTS' => ''
		], $page_admin);
	}

	$page_admin = mgb_template_replace(["SEPARATOR" => "<option value='0'>---</option>"], $page_admin);

	if(empty($_GET['action'])) { $_GET['action'] = ""; }
	if(empty($add_page_nr)) { $add_page_nr = ""; }
	if(empty($latest_version)) { $latest_version = ""; }
	if(empty($sf_first)) { $sf_first = ""; }
	if(empty($sf_backwards)) { $sf_backwards = ""; }
	if(empty($sf_pagenumber)) { $sf_pagenumber = ""; }
	if(empty($sf_forwards)) { $sf_forwards = ""; }
	if(empty($sf_last)) { $sf_last = ""; }
	
	$page_admin = mgb_template_replace([
		'ACTION' 						=> $_GET['action'],
		'PAGE_NR' 						=> $add_page_nr,
		'SID' 							=> $sid,
		'INCLUDE' 						=> $page_include,
		'LANG_NEW_VERSION_AVAILABLE' 	=> $new_version_available,
		'LATEST_VERSION' 				=> $latest_version,
		'TEMPLATE_COPYRIGHT' 			=> $content_copyright,
		'TEMPLATE_FOOTER' 				=> $content_footer,
		'COPYRIGHT_DATE' 				=> date("Y"),
		'MGB_VERSION' 					=> $settings['version'],
		'TEMPLATE_SCROLLING_FUNCTION' 	=> $content_scrolling_function,
		'SF_FIRST' 						=> $sf_first,
		'SF_BACKWARDS' 					=> $sf_backwards,
		'SF_PAGENUMBER' 				=> $sf_pagenumber,
		'SF_FORWARDS'					=> $sf_forwards,
		'SF_LAST' 						=> $sf_last
	], $page_admin);

	$page_admin = mgb_template_language($page_admin, MGB_ROOT."language/".$settings['language_path']."/lang_admin.php", $settings['debug_mode']); // last number defines debug mode

	echo $page_admin;
?>
