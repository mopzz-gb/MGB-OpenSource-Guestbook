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
		require_once ("../includes/functions.inc.php");
		// load template
		$content_settings_usage = mgb_load_template("admin", "default", "settings_usage", $settings['debug_mode']);

		if(!isset($_GET['action'])) { $_GET['action'] = "settings_usage"; }
		if(check_rights($mysqli, $_GET['action'], $_SESSION['user_ID'])) {
			if(isset($_POST['sent_settings']) AND $_POST['sent_settings'] === 1) {
				// needed values in this script:
				// =============================
				// aus_ping_address
				$empty_needed_value = 0;
				if(empty($_POST['aus_ping_address'])) {
					$_POST['aus_ping_address'] = "https://ping.m-gb.org/telemetry/ping.php";
				}
				if($empty_needed_value == 0) { // no error, continue with saving settings
					// everything's okay now, let's save the data
					$sql = "UPDATE `".$db['prefix']."settings` SET
						`aus_allow` = '".$_POST['aus_allow']."',
						`aus_ping_address` = '".$_POST['aus_ping_address']."'";

					if (mgb_sql_connect($mysqli, $sql, "Error while saving telemetry settings.", 0)) {
						$saved_settings_successfull = 1;
						mgb_trigger_sys_log($mysqli, 1031, '', '', '', $_SESSION['user_name'], '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
						mgb_erase_cache("../cache/");
					}

					require ("../includes/load_settings.inc.php");
				}
			}

			// load active language
			include ("../language/".$settings['language_path']."/settings.php");

			// load template
			$page_include = $content_settings_usage;

			// start replacement for template

			// replacement that has nothing to do with front end
			$page_include = mgb_template_replace(["URL_SETTINGS" => "admin.php?action=settings_usage".$sid], $page_include);
			
			// initiate variables
			$selected_aus_allow_0 = "";
			$selected_aus_allow_1 = "";

			// value replacement
			if ($settings['aus_allow'] == 0) { $selected_aus_allow_0 = " selected"; } else { $selected_aus_allow_1 = " selected"; }
			$page_include = mgb_template_replace([
				'SELECTED_AUS_ALLOW_0'  => $selected_aus_allow_0,
				'SELECTED_AUS_ALLOW_1'  => $selected_aus_allow_1,
				'EDIT_AUS_PING_ADDRESS' => $settings['aus_ping_address'],
				'EDIT_AUS_INSTALL_ID'   => $settings['aus_install_id']
			], $page_include);

			// is scrolling function needed?
			$content_scrolling_function = "";
		} else {
			$page_include = "<span class=\"admin\">".$lang['errormessage'][4]."</span>"; // user has no access to this page, user level too low
			$content_scrolling_function = "<br>";
		}
	}
?>
