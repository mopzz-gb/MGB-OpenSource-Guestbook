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

	==========================
	settings_emoticons.inc.php
	==========================

	DATE OF CREATION: 24.02.2013; 15:02
	*/

	// make sure nobody has direct acces to this script
	if (!defined('ADMINISTRATION')) {
		include ("error.html");
		die();
	} else {
		require ("../includes/functions.inc.php");
		// load template
		$content_settings_emoticons = mgb_load_template("admin", "default", "settings_emoticons", $settings['debug_mode']);

		if(!isset($_GET['action'])) { $_GET['action'] = "settings_emoticons"; }
		if(check_rights($mysqli, $_GET['action'], $_SESSION['user_ID'])) {
			if(isset($_POST['sent_settings']) AND $_POST['sent_settings'] == 1) {
				// needed values in this script:
				// =============================
				// smileys_break
				$empty_needed_value = 0;
				if(empty($_POST['smileys_break'])) { $empty_needed_value = 13; } // no smileys_break information
				if($empty_needed_value == 0) { // no error, continue with saving settings
					// everything's okay now, let's save the data
					$sql = "UPDATE `".$db['prefix']."settings` SET
						`smileys` = '".$_POST['smileys']."',
						`smileys_break` = '".$_POST['smileys_break']."',
						`smileys_order` = '".$_POST['smileys_order']."'";

					if (mgb_sql_connect($mysqli, $sql, "Error while saving general settings.", 0, null, null)) {
						$saved_settings_successfull = 1;
						mgb_trigger_sys_log($mysqli, 1008, '', '', '', $_SESSION['user_name'], '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
						mgb_erase_cache("../cache/");
					}

					require ("../includes/load_settings.inc.php");
				}
			}

			// load active language
			include ("../language/".$settings['language_path']."/settings.php");

			// load template
			$page_include = $content_settings_emoticons;

			// start replacement for template

			// replacement that has nothing to do with front end
			$page_include = mgb_template_replace(['URL_SETTINGS' => "admin.php?action=settings_emoticons".$sid], $page_include);
			
			// initiate variables
			$selected_smileys_0 = "";
			$selected_smileys_1 = "";
			$selected_smileys_order_0 = "";
			$selected_smileys_order_1 = "";

			// value replacement
			if ($settings['smileys'] == 0) { $selected_smileys_0 = " selected"; } else { $selected_smileys_1 = " selected"; }
			if ($settings['smileys_order'] == "ASC") { $selected_smileys_order_0 = " selected"; } else { $selected_smileys_order_1 = " selected"; }
			$page_include = mgb_template_replace([
				'SELECTED_SMILEYS_0' 		=> $selected_smileys_0,
				'SELECTED_SMILEYS_1' 		=> $selected_smileys_1,
				'EDIT_SMILEYS_BREAK' 		=> $settings['smileys_break'],
				'SELECTED_SMILEYS_ORDER_0' 	=> $selected_smileys_order_0,
				'SELECTED_SMILEYS_ORDER_1' 	=> $selected_smileys_order_1
			], $page_include);

			// is scrolling function needed?
			$content_scrolling_function = "";
		} else {
			$page_include = "<span class=\"admin\">".$lang['errormessage'][4]."</span>"; // user has no access to this page, user level too low
			$content_scrolling_function = "<br>";
		}
	}
?>
