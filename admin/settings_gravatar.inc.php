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

	=========================
	settings_gravatar.inc.php
	=========================

	DATE OF CREATION: 24.02.2013; 15:09
	*/

	// make sure nobody has direct acces to this script
	if (!defined('ADMINISTRATION')) {
		include ("error.html");
		die();
	} else {
		require ("../includes/functions.inc.php");
		// load template
		$content_settings_gravatar = mgb_load_template("admin", "default", "settings_gravatar", $settings['debug_mode']);

		if(!isset($_GET['action'])) { $_GET['action'] = "settings_gravatar"; }
		if(check_rights($mysqli, $_GET['action'], $_SESSION['user_ID'])) {
			if(isset($_POST['sent_settings']) AND $_POST['sent_settings'] == 1) {
				// needed values in this script:
				// =============================
				// gravatar_size
				$empty_needed_value = 0;
				if(empty($_POST['gravatar_size'])) { $empty_needed_value = 14; } // no smileys_break information
				if($empty_needed_value == 0) { // no error, continue with saving settings
					// everything's okay now, let's save the data
					$sql = "UPDATE `".$db['prefix']."settings` SET
						`gravatar_show` = '".$_POST['gravatar_show']."',
						`gravatar_rating` = '".$_POST['gravatar_rating']."',
						`gravatar_type` = '".$_POST['gravatar_type']."',
						`gravatar_size` = '".$_POST['gravatar_size']."',
						`gravatar_position` = '".$_POST['gravatar_position']."'";

					if (mgb_sql_connect($mysqli, $sql, "Error while saving gravatar settings.", 0, null, null)) {
						$saved_settings_successfull = 1;
						mgb_trigger_sys_log($mysqli, 1009, '', '', '', $_SESSION['user_name'], '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
						mgb_erase_cache("../cache/");
					}

					require ("../includes/load_settings.inc.php");
				}
			}

			// load active language
			include ("../language/".$settings['language_path']."/settings.php");

			// load template
			$page_include = $content_settings_gravatar;

			// start replacement for template

			// replacement that has nothing to do with front end
			$page_include = mgb_template_replace(['URL_SETTINGS' => "admin.php?action=settings_gravatar"], $page_include);
			
			// initiate variables
			$selected_gravatar_show_0 = "";
			$selected_gravatar_show_1 = "";
			$selected_gravatar_rating_0 = "";
			$selected_gravatar_rating_1 = "";
			$selected_gravatar_rating_2 = "";
			$selected_gravatar_rating_3 = "";
			$selected_gravatar_type_0 = "";
			$selected_gravatar_type_1 = "";
			$selected_gravatar_type_2 = "";
			$selected_gravatar_type_3 = "";
			$selected_gravatar_type_4 = "";
			$selected_gravatar_type_5 = "";
			$selected_gravatar_type_6 = "";
			$selected_gravatar_position_0 = "";
			$selected_gravatar_position_1 = "";

			// value replacement
			if($settings['gravatar_show'] == 0) { $selected_gravatar_show_0 = " selected"; } else { $selected_gravatar_show_1 = " selected"; }
			if($settings['gravatar_rating'] == 0) { $selected_gravatar_rating_0 = " selected"; }
			if($settings['gravatar_rating'] == 1) { $selected_gravatar_rating_1 = " selected"; }
			if($settings['gravatar_rating'] == 2) { $selected_gravatar_rating_2 = " selected"; }
			if($settings['gravatar_rating'] == 3) { $selected_gravatar_rating_3 = " selected"; }
			if($settings['gravatar_type'] == 0) {
				$selected_gravatar_type_0 = " selected"; }
			elseif($settings['gravatar_type'] == 1) {
				$selected_gravatar_type_1 = " selected"; }
			elseif($settings['gravatar_type'] == 2) {
				$selected_gravatar_type_2 = " selected"; }
			elseif($settings['gravatar_type'] == 3) {
				$selected_gravatar_type_3 = " selected"; }
			elseif($settings['gravatar_type'] == 4) {
				$selected_gravatar_type_4 = " selected"; }
			elseif($settings['gravatar_type'] == 5) {
				$selected_gravatar_type_5 = " selected"; }
			elseif($settings['gravatar_type'] == 6) {
				$selected_gravatar_type_6 = " selected"; }
			if($settings['gravatar_position'] == 0) { $selected_gravatar_position_0 = " selected"; } else { $selected_gravatar_position_1 = " selected"; }
			
			$page_include = mgb_template_replace([
				'SELECTED_GRAVATAR_SHOW_0' 		=> $selected_gravatar_show_0,
				'SELECTED_GRAVATAR_SHOW_1' 		=> $selected_gravatar_show_1,
				'SELECTED_GRAVATAR_RATING_0' 	=> $selected_gravatar_rating_0,
				'SELECTED_GRAVATAR_RATING_1' 	=> $selected_gravatar_rating_1,
				'SELECTED_GRAVATAR_RATING_2' 	=> $selected_gravatar_rating_2,
				'SELECTED_GRAVATAR_RATING_3' 	=> $selected_gravatar_rating_3,
				'SELECTED_GRAVATAR_TYPE_0' 		=> $selected_gravatar_type_0,
				'SELECTED_GRAVATAR_TYPE_1' 		=> $selected_gravatar_type_1,
				'SELECTED_GRAVATAR_TYPE_2' 		=> $selected_gravatar_type_2,
				'SELECTED_GRAVATAR_TYPE_3' 		=> $selected_gravatar_type_3,
				'SELECTED_GRAVATAR_TYPE_4' 		=> $selected_gravatar_type_4,
				'SELECTED_GRAVATAR_TYPE_5' 		=> $selected_gravatar_type_5,
				'SELECTED_GRAVATAR_TYPE_6' 		=> $selected_gravatar_type_6,
				'SELECTED_GRAVATAR_POSITION_0' 	=> $selected_gravatar_position_0,
				'SELECTED_GRAVATAR_POSITION_1' 	=> $selected_gravatar_position_1,
				'EDIT_GRAVATAR_SIZE' 			=> mgb_formatForm($settings['gravatar_size'])
			], $page_include);

			// is scrolling function needed?
			$content_scrolling_function = "";
		} else {
			$page_include = "<span class=\"admin\">".$lang['errormessage'][4]."</span>"; // user has no access to this page, user level too low
			$content_scrolling_function = "<br>";
		}
	}
?>
