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

	=============
	login.inc.php
	=============
	*/

	// make sure nobody has direct access to this script
	if(!defined('ADMINISTRATION')) {
		include ('error.html');
		die();
	}

	require_once (MGB_ROOT.'includes/functions.inc.php');

	if(isset($_GET['action']) AND ($_GET['action'] == "logout")) {
		// logout
		if(isset($_SESSION['user_ID'])) {
			mgb_sql_connect($mysqli, "UPDATE ".$db['prefix']."user SET `logged_out` = '1' WHERE ID=".$_SESSION['user_ID']." LIMIT 1", "Error while logging out.", 0);
			mgb_trigger_sys_log($mysqli, 1002, '', '', '', $_SESSION['user_name'], '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
			session_unset();
			session_destroy();
			$_SESSION = array();
		}

		$login_is_ok = 0;
		$login_status_text = $lang['logged_out'];
		$login_status_img = "<img src=\"templates/default/images/login.png\" height=\"16\" width=\"16\" title=\"{LANG_LOGIN}\" alt=\"{LANG_LOGIN}\">";
		$_POST['sent'] = 0;
	} else {
		if(empty($_SESSION['login_fail'])) { $_SESSION['login_fail'] = 0; }
		if(isset($_POST['sent']) AND $_POST['sent'] == 1) {
			if(!empty($_POST['username']) AND !empty($_POST['password'])) {
				if(login_ok($mysqli, $_POST['username'], "", $_POST['password'])) {
					if(!isset($_SESSION['user_key'])) {
						generate_key_and_pw(MGB_ROOT, $mysqli, $_POST['username'], 16, "adminpanel");

						$result = mgb_sql_connect($mysqli, "SELECT ID, user_name, user_key, user_ip, user_is_active, user_agent, logged_out FROM ".$db['prefix']."user WHERE user_name='".$_POST['username']."'", "Error while logging in.", 1, null, null);
						$user = mysqli_fetch_array($result, MYSQLI_ASSOC);

						$_SESSION['user_ID'] = $user['ID'];
						$_SESSION['user_name'] = $user['user_name'];
						$_SESSION['user_key'] = $user['user_key'];
						$_SESSION['user_is_active'] = $user['user_is_active'];
						$_SESSION['user_ip'] = $user['user_ip'];
						$_SESSION['user_agent'] = $user['user_agent'];

						if($_SESSION['user_is_active'] == 1) {
							$login_status_text = $lang['login_ok'];
							$login_status_img = NULL;
							$login_is_ok = 1;
							mgb_trigger_sys_log($mysqli, 1001, '', '', '', $_SESSION['user_name'], '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog

							if(SID != NULL) { $sid = "?".SID; } else {$sid = NULL; }

							if($user['logged_out'] == 0) {
								$errorcode = 10;
								$refresh = "<meta http-equiv=\"refresh\" content=\"5; URL=admin.php".$sid."\">";
							} else {
								$refresh = "<meta http-equiv=\"refresh\" content=\"2; URL=admin.php".$sid."\">";
							}

							mgb_sql_connect($mysqli, "UPDATE ".$db['prefix']."user SET `logged_in` = '".time()."', `logged_out` = '0' WHERE ID=".$user['ID']." LIMIT 1", "Error while logging in.", 0, null, null);
						} else {
							session_unset();
							session_destroy();
							$_SESSION = array();

							$login_status_text = $lang['logged_out'];
							$login_status_img = "";
							$login_is_ok = 0;
							$errorcode = 3;

							$refresh = "";
						}
					} else {
						$login_status_text = $lang['logged_out'];
						$login_status_img = "<img src=\"templates/default/images/login.png\" height=\"16\" width=\"16\" title=\"{LANG_LOGIN}\" alt=\"{LANG_LOGIN}\">";
						$login_is_ok = 0;
					}
				} else {
					$login_status_text = $lang['logged_out'];
					$login_status_img = "<img src=\"templates/default/images/login.png\" height=\"16\" width=\"16\" title=\"{LANG_LOGIN}\" alt=\"{LANG_LOGIN}\">";
					$login_is_ok = 0;
					$errorcode = 2;					
					$_SESSION['login_fail'] = mgb_login_fail($_SESSION['login_fail']);
					mgb_trigger_sys_log($mysqli, 1025, '', '', '', $_POST['username'], '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
				}
			} else {
				$login_status_text = $lang['logged_out'];
				$login_status_img = "<img src=\"templates/default/images/login.png\" height=\"16\" width=\"16\" title=\"{LANG_LOGIN}\" alt=\"{LANG_LOGIN}\">";
				$login_is_ok = 0;
				$errorcode = 1;
			}
		} else {
			$login_status_text = $lang['logged_out'];
			$login_status_img = "<img src=\"templates/default/images/login.png\" height=\"16\" width=\"16\" title=\"{LANG_LOGIN}\" alt=\"{LANG_LOGIN}\">";
			$login_is_ok = 0;
		}
	}

	if(!empty($errorcode)) {
		$errormessage = mgb_errormessage($errorcode, $settings['language_path'], "adminpanel");
	} else {
		$content_errormessage = "";
	}

	if(isset($login_is_ok) AND $login_is_ok == 1) {
		$page_include = $content_login_ok;
		$page_include = mgb_template_replace(['TEMPLATE_ERRORMESSAGE' => $content_errormessage], $page_include);
		if(empty($errormessage)) { $errormessage = ""; }
		$page_include = mgb_template_replace([
			'ERRORMESSAGE' 		=> $errormessage,
			'LANG_PLEASE_WAIT' 	=> $lang['please_wait']
		], $page_include);
	} else {
		$page_include = $content_login;
		if(empty($errormessage)) { $errormessage = ""; }
		$page_include = mgb_template_replace([
			'TEMPLATE_ERRORMESSAGE' 	=> $content_errormessage,
			'ERRORMESSAGE' 				=> $errormessage,
			'LANG_LOGIN_USERNAME' 		=> $lang['login_username'],
			'LANG_LOGIN_PASSWORD' 		=> $lang['login_password'],
			'LANG_LOGIN_LOSTPASSWORD' 	=> $lang['login_lostpassword']
		], $page_include);
	}

	$content_scrolling_function = "";
?>
