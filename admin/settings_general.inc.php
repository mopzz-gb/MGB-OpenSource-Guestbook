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

	========================
	settings_general.inc.php
	========================

	DATE OF CREATION: 24.02.2013; 12:10
	*/

	// make sure nobody has direct acces to this script
	if (!defined('ADMINISTRATION')) {
		include ("error.html");
		die();
	} else {
		require_once ("../includes/functions.inc.php");
		// load template
		$content_settings_general = mgb_load_template("admin", "default", "settings_general", $settings['debug_mode']);

		if(!isset($_GET['action'])) { $_GET['action'] = "settings_general"; }
		if(check_rights($mysqli, $_GET['action'], $_SESSION['user_ID'])) {
			if(isset($_POST['sent_settings']) AND $_POST['sent_settings'] == 1) {
				// needed values in this script:
				//
				// title
				// author
				// domain
				// gb_path
				// timezone
				// admin name
				// admin email
				// guestbook mail
				$empty_needed_value = 0;
				if(empty($_POST['title'])) { $empty_needed_value = 1; } // no title information
				if(empty($_POST['h_author'])) { $empty_needed_value = 2; } // no author information
				if(empty($_POST['timezone'])) { $empty_needed_value = 3; } // no timezone information
				if(empty($_POST['admin_name'])) { $empty_needed_value = 4; } // no admin_name information
				if(empty($_POST['admin_email'])) { $empty_needed_value = 5; } // no admin_email information
				if(empty($_POST['admin_gbemail'])) { $empty_needed_value = 6; } // no guestbook mail information
				if($empty_needed_value == 0) { // no error, continue with saving settings
					if ($_POST['h_domain'] == "") { $_POST['domain'] = $_SERVER["SERVER_NAME"]; }
					if ($_POST['gb_path'] == "") { $_POST['gb_path'] = str_ireplace("admin/admin.php", "", $_SERVER["SCRIPT_NAME"]); }

					// everything's okay now, let's save the data
					$sql = "UPDATE `".$db['prefix']."settings` SET
						`title` = '".cleanstr($_POST['title'])."',
						`h_author` = '".cleanstr($_POST['h_author'])."',
						`h_domain` = '".cleanstr($_POST['h_domain'])."',
						`gb_path` = '".cleanstr($_POST['gb_path'])."',
						`h_keywords` = '".cleanstr($_POST['h_keywords'])."',
						`h_description` = '".cleanstr($_POST['h_description'])."',
						`timezone` = '".cleanstr($_POST['timezone'])."',
						`announcement_message` = '".cleanstr($_POST['announcement_message'])."',
						`admin_name` = '".cleanstr($_POST['admin_name'])."',
						`admin_email` = '".cleanstr($_POST['admin_email'])."',
						`admin_gbemail` = '".cleanstr($_POST['admin_gbemail'])."',
						`caching` = '".cleanstr($_POST['caching'])."'";

					if (mgb_sql_connect($mysqli, $sql, "Error while saving general settings.", 0)) {
						$saved_settings_successfull = 1;
						mgb_trigger_sys_log($mysqli, '1003', '', '', '', $_SESSION['user_name'], '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
						mgb_erase_cache(MGB_ROOT."cache/");
					}

					require(MGB_ROOT."includes/load_settings.inc.php");
				}
			}

			// load active language
			include(MGB_ROOT."language/".$settings['language_path']."/settings.php");

			// load template
			$page_include = $content_settings_general;

			// start replacement for template

			// replacement that has nothing to do with front end
			$page_include = template("URL_SETTINGS", "admin.php?action=settings_general".$sid, $page_include);

			// value replacement
			if ($settings['caching'] == 0) {
				$selected_caching_0 = " selected";
				$selected_caching_1 = "";
			} else {
				$selected_caching_0 = "";
				$selected_caching_1 = " selected";
			}

			$page_include = template("SELECTED_CACHING_0", $selected_caching_0, $page_include);
			$page_include = template("SELECTED_CACHING_1", $selected_caching_1, $page_include);
			$page_include = template("EDIT_TITLE", $settings['title'], $page_include);
			$page_include = template("EDIT_H_AUTHOR", $settings['h_author'], $page_include);
			$page_include = template("EDIT_H_DOMAIN", $settings['h_domain'], $page_include);
			$page_include = template("EDIT_GB_PATH", $settings['gb_path'], $page_include);
			$page_include = template("EDIT_H_KEYWORDS", $settings['h_keywords'], $page_include);
			$page_include = template("EDIT_H_DESCRIPTION", $settings['h_description'], $page_include);
			$page_include = template("TIMEZONE", $settings['timezone'], $page_include);
			$page_include = template("EDIT_ANNOUNCEMENT_MESSAGE", $settings['announcement_message'], $page_include);
			$page_include = template("EDIT_ADMIN_NAME", $settings['admin_name'], $page_include);
			$page_include = template("EDIT_ADMIN_EMAIL", $settings['admin_email'], $page_include);
			$page_include = template("EDIT_ADMIN_GBEMAIL", $settings['admin_gbemail'], $page_include);

			// is scrolling function needed?
			$content_scrolling_function = "";
		} else {
			$page_include = "<span class=\"admin\">".$lang['errormessage'][4]."</span>"; // user has no access to this page, user level too low
			$content_scrolling_function = "<br>";
		}
	}
?>