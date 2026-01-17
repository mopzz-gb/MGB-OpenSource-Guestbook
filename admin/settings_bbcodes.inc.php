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
	settings_bbcodes.inc.php
	========================

	DATE OF CREATION: 24.02.2013; 13:50
	*/

	// make sure nobody has direct acces to this script
	if (!defined('ADMINISTRATION')) {
		include ("error.html");
		die();
	} else {
		require ("../includes/functions.inc.php");
		// load template
		$content_settings_general = mgb_load_template("admin", "default", "settings_bbcodes", $settings['debug_mode']);

		if(!isset($_GET['action'])) { $_GET['action'] = "settings_bbcodes"; }
		if(check_rights($mysqli, $_GET['action'], $_SESSION['user_ID'])) {
			if(isset($_POST['sent_settings']) AND $_POST['sent_settings'] == 1) {
				// needed values in this script:
				// =============================
				// max_img_width
				// max_img_height
				// max_flash_width
				// max_flash_height
				$empty_needed_value = 0;
				if(empty($_POST['max_img_width'])) { $empty_needed_value = 7; } // no max_img_width information
				if(empty($_POST['max_img_height'])) { $empty_needed_value = 8; } // no max_img_height information
				if(empty($_POST['max_flash_width'])) { $empty_needed_value = 9; } // no max_flash_width information
				if(empty($_POST['max_flash_height'])) { $empty_needed_value = 10; } // no max_flash_height information
				if($empty_needed_value == 0) { // no error, continue with saving settings
					// everything's okay now, let's save the data
					$sql = "UPDATE `".$db['prefix']."settings` SET
						`bbcode` = '".cleanstr($_POST['bbcode'])."',
						`allow_img_tag` = '".cleanstr($_POST['allow_img_tag'])."',
						`max_img_width` = '".cleanstr($_POST['max_img_width'])."',
						`max_img_height` = '".cleanstr($_POST['max_img_height'])."',
						`center_img` = '".cleanstr($_POST['center_img'])."',
						`allow_flash_tag` = '".cleanstr($_POST['allow_flash_tag'])."',
						`max_flash_width` = '".cleanstr($_POST['max_flash_width'])."',
						`max_flash_height` = '".cleanstr($_POST['max_flash_height'])."',
						`center_flash` = '".cleanstr($_POST['center_flash'])."'";

					if (mgb_sql_connect($mysqli, $sql, "Error while saving general settings.", 0)) {
						$saved_settings_successfull = 1;
						mgb_trigger_sys_log($mysqli, '1007', '', '', '', $_SESSION['user_name'], '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
						mgb_erase_cache("../cache/");
					}

					require ("../includes/load_settings.inc.php");
				}
			}

			// load active language
			include ("../language/".$settings['language_path']."/settings.php");

			// load template
			$page_include = $content_settings_general;

			// start replacement for template

			// replacement that has nothing to do with front end
			$page_include = template("URL_SETTINGS", "admin.php?action=settings_bbcodes".$sid, $page_include);
			
			// initiate variables
			$selected_bbcode_0 = "";
			$selected_bbcode_1 = "";
			$selected_allow_img_tag_0 = "";
			$selected_allow_img_tag_1 = "";
			$selected_center_img_0 = "";
			$selected_center_img_1 = "";
			$selected_allow_flash_tag_0 = "";
			$selected_allow_flash_tag_1 = "";
			$selected_center_flash_0 = "";
			$selected_center_flash_1 = "";

			// value replacement
			if ($settings['bbcode'] == 0) { $selected_bbcode_0 = " selected"; } else { $selected_bbcode_1 = " selected"; }
			if ($settings['allow_img_tag'] == 0) { $selected_allow_img_tag_0 = " selected"; } else { $selected_allow_img_tag_1 = " selected"; }
			if ($settings['center_img'] == 0) { $selected_center_img_0 = " selected"; } else { $selected_center_img_1 = " selected"; }
			if ($settings['allow_flash_tag'] == 0) { $selected_allow_flash_tag_0 = " selected"; } else { $selected_allow_flash_tag_1 = " selected"; }
			if ($settings['center_flash'] == 0) { $selected_center_flash_0 = " selected"; } else { $selected_center_flash_1 = " selected"; }
			$page_include = template("SELECTED_BBCODE_0", $selected_bbcode_0, $page_include);
			$page_include = template("SELECTED_BBCODE_1", $selected_bbcode_1, $page_include);
			$page_include = template("SELECTED_ALLOW_IMG_TAG_0", $selected_allow_img_tag_0, $page_include);
			$page_include = template("SELECTED_ALLOW_IMG_TAG_1", $selected_allow_img_tag_1, $page_include);
			$page_include = template("SELECTED_CENTER_IMG_0", $selected_center_img_0, $page_include);
			$page_include = template("SELECTED_CENTER_IMG_1", $selected_center_img_1, $page_include);
			$page_include = template("EDIT_MAX_IMG_WIDTH", $settings['max_img_width'], $page_include);
			$page_include = template("EDIT_MAX_IMG_HEIGHT", $settings['max_img_height'], $page_include);
			$page_include = template("SELECTED_ALLOW_FLASH_TAG_0", $selected_allow_flash_tag_0, $page_include);
			$page_include = template("SELECTED_ALLOW_FLASH_TAG_1", $selected_allow_flash_tag_1, $page_include);
			$page_include = template("SELECTED_CENTER_FLASH_0", $selected_center_flash_0, $page_include);
			$page_include = template("SELECTED_CENTER_FLASH_1", $selected_center_flash_1, $page_include);
			$page_include = template("EDIT_MAX_FLASH_WIDTH", $settings['max_flash_width'], $page_include);
			$page_include = template("EDIT_MAX_FLASH_HEIGHT", $settings['max_flash_height'], $page_include);

			// is scrolling function needed?
			$content_scrolling_function = "";
		} else {
			$page_include = "<span class=\"admin\">".$lang['errormessage'][4]."</span>"; // user has no access to this page, user level too low
			$content_scrolling_function = "<br>";
		}
	}
?>