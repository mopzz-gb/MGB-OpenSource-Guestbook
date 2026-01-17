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

	=======================
	settings_fields.inc.php
	=======================

	DATE OF CREATION: 17.06.2015; 22:02
	*/

	// make sure nobody has direct acces to this script
	if (!defined('ADMINISTRATION')) {
		include ("error.html");
		die();
	} else {
		require ("../includes/functions.inc.php");
		// load template
		$content_settings_fields = mgb_load_template("admin", "default", "settings_fields", $settings['debug_mode']);

		if(!isset($_GET['action'])) { $_GET['action'] = "settings_fields"; }
		if(check_rights($mysqli, $_GET['action'], $_SESSION['user_ID'])) {
			if(isset($_POST['sent_settings']) AND $_POST['sent_settings'] == 1) {
				// needed values in this script:
				// =============================
				// - none -
				$empty_needed_value = 0;
				if($empty_needed_value == 0) { // no error, continue with saving settings

					if(empty($_POST['show_field_city'])) { $show_field_city = 0; } else { $show_field_city = 1; }
					if(empty($_POST['show_field_icq'])) { $show_field_icq = 0; } else { $show_field_icq = 1; }
					if(empty($_POST['show_field_aim'])) { $show_field_aim = 0; } else { $show_field_aim = 1; }
					if(empty($_POST['show_field_fb'])) { $show_field_fb = 0; } else { $show_field_fb = 1; }
					if(empty($_POST['show_field_twitter'])) { $show_field_twitter = 0; } else { $show_field_twitter = 1; }
					if(empty($_POST['show_field_hp'])) { $show_field_hp = 0; } else { $show_field_hp = 1; }

					// everything's okay now, let's save the data
					$sql = "UPDATE `".$db['prefix']."settings` SET
						`show_field_city` = '".$show_field_city."',
						`show_field_icq` = '".$show_field_icq."',
						`show_field_aim` = '".$show_field_aim."',
						`show_field_fb` = '".$show_field_fb."',
						`show_field_twitter` = '".$show_field_twitter."',
						`show_field_hp` = '".$show_field_hp."'";

					if (mgb_sql_connect($mysqli, $sql, "Error while saving general settings.", 0)) {
						$saved_settings_successfull = 1;
						mgb_trigger_sys_log($mysqli, '1005', '', '', '', $_SESSION['user_name'], '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
						mgb_erase_cache("../cache/");
					}

					require ("../includes/load_settings.inc.php");
				}
			}

			// load active language
			include ("../language/".$settings['language_path']."/settings.php");

			// load template
			$page_include = $content_settings_fields;

			// start replacement for template

			// replacement that has nothing to do with front end
			$page_include = template("URL_SETTINGS", "admin.php?action=settings_fields".$sid, $page_include);

			// value replacement
			if ($settings['show_field_city'] == "0" OR "") {
				$edit_value_city = "0";
				$checked_city = "";
			} else {
				$edit_value_city = "1";
				$checked_city = " checked";
			}

			if ($settings['show_field_icq'] == "0" OR "") {
				$edit_value_icq = "0";
				$checked_icq = "";
			} else {
				$edit_value_icq = "1";
				$checked_icq = " checked";
			}

			if ($settings['show_field_aim'] == "0" OR "") {
				$edit_value_aim = "0";
				$checked_aim = "";
			} else {
				$edit_value_aim = "1";
				$checked_aim = " checked";
			}

			if ($settings['show_field_fb'] == "0" OR "") {
				$edit_value_fb = "0";
				$checked_fb = "";
			} else {
				$edit_value_fb = "1";
				$checked_fb = " checked";
			}

			if ($settings['show_field_twitter'] == "0" OR "") {
				$edit_value_twitter = "0";
				$checked_twitter = "";
			} else {
				$edit_value_twitter = "1";
				$checked_twitter = " checked";
			}

			if ($settings['show_field_hp'] == "0" OR "") {
				$edit_value_hp = "0";
				$checked_hp = "";
			} else {
				$edit_value_hp = "1";
				$checked_hp = " checked";
			}

			$page_include = template("EDIT_VALUE_CITY", $edit_value_city, $page_include);
			$page_include = template("EDIT_VALUE_ICQ", $edit_value_icq, $page_include);
			$page_include = template("EDIT_VALUE_AIM", $edit_value_aim, $page_include);
			$page_include = template("EDIT_VALUE_FB", $edit_value_fb, $page_include);
			$page_include = template("EDIT_VALUE_TWITTER", $edit_value_twitter, $page_include);
			$page_include = template("EDIT_VALUE_HP", $edit_value_hp, $page_include);

			$page_include = template("CHECKED_CITY", $checked_city, $page_include);
			$page_include = template("CHECKED_ICQ", $checked_icq, $page_include);
			$page_include = template("CHECKED_AIM", $checked_aim, $page_include);
			$page_include = template("CHECKED_FB", $checked_fb, $page_include);
			$page_include = template("CHECKED_TWITTER", $checked_twitter, $page_include);
			$page_include = template("CHECKED_HP", $checked_hp, $page_include);

			// front end / language replacement
			// $page_include = mgb_template_language($page_include, "../language/".$settings['language_path']."/lang_admin.php", $settings['debug_mode']); // last number defines debug mode

			// is scrolling function needed?
			$content_scrolling_function = "";
		} else {
			$page_include = "<span class=\"admin\">".$lang['errormessage'][4]."</span>"; // user has no access to this page, user level too low
			$content_scrolling_function = "<br>";
		}
	}
?>
