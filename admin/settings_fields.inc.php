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
					if(empty($_POST['show_field_hp'])) { $show_field_hp = 0; } else { $show_field_hp = 1; }
					if(empty($_POST['show_field_mastodon'])) { $show_field_mastodon = 0; } else { $show_field_mastodon = 1; }
					if(empty($_POST['show_field_bluesky'])) { $show_field_bluesky = 0; } else { $show_field_bluesky = 1; }
					if(empty($_POST['show_field_w'])) { $show_field_w = 0; } else { $show_field_w = 1; }
					if(empty($_POST['show_field_eu_voice'])) { $show_field_eu_voice = 0; } else { $show_field_eu_voice = 1; }
					if(empty($_POST['show_field_eu_video'])) { $show_field_eu_video = 0; } else { $show_field_eu_video = 1; }
					if(empty($_POST['show_field_monnett'])) { $show_field_monnett = 0; } else { $show_field_monnett = 1; }
					
					// everything's okay now, let's save the data
					$sql = "UPDATE `".$db['prefix']."settings` SET
						`show_field_city` = '".$show_field_city."',
						`show_field_hp` = '".$show_field_hp."',
						`show_field_mastodon` = '".$show_field_mastodon."',
						`show_field_bluesky` = '".$show_field_bluesky."',
						`show_field_w` = '".$show_field_w."',
						`show_field_eu_voice` = '".$show_field_eu_voice."',
						`show_field_eu_video` = '".$show_field_eu_video."',
						`show_field_monnett` = '".$show_field_monnett."'";

					if (mgb_sql_connect($mysqli, $sql, "Error while saving general settings.", 0, null, null)) {
						$saved_settings_successfull = 1;
						mgb_trigger_sys_log($mysqli, 1005, '', '', '', $_SESSION['user_name'], '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
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
			$page_include = mgb_template_replace(['URL_SETTINGS' => "admin.php?action=settings_fields".$sid], $page_include);

			// value replacement
			if ($settings['show_field_city'] == "0" OR "") {
				$edit_value_city = "0";
				$checked_city = "";
			} else {
				$edit_value_city = "1";
				$checked_city = " checked";
			}
			
			if ($settings['show_field_hp'] == "0" OR "") {
				$edit_value_hp = "0";
				$checked_hp = "";
			} else {
				$edit_value_hp = "1";
				$checked_hp = " checked";
			}

			if ($settings['show_field_mastodon'] == "0" OR "") {
				$edit_value_mastodon = "0";
				$checked_mastodon = "";
			} else {
				$edit_value_mastodon = "1";
				$checked_mastodon = " checked";
			}

			if ($settings['show_field_bluesky'] == "0" OR "") {
				$edit_value_bluesky = "0";
				$checked_bluesky = "";
			} else {
				$edit_value_bluesky = "1";
				$checked_bluesky = " checked";
			}

			if ($settings['show_field_w'] == "0" OR "") {
				$edit_value_w = "0";
				$checked_w = "";
			} else {
				$edit_value_w = "1";
				$checked_w = " checked";
			}

			if ($settings['show_field_eu_voice'] == "0" OR "") {
				$edit_value_eu_voice = "0";
				$checked_eu_voice = "";
			} else {
				$edit_value_eu_voice = "1";
				$checked_eu_voice = " checked";
			}

			if ($settings['show_field_eu_video'] == "0" OR "") {
				$edit_value_eu_video = "0";
				$checked_eu_video = "";
			} else {
				$edit_value_eu_video = "1";
				$checked_eu_video = " checked";
			}
			
			if ($settings['show_field_monnett'] == "0" OR "") {
				$edit_value_monnett = "0";
				$checked_monnett = "";
			} else {
				$edit_value_monnett = "1";
				$checked_monnett = " checked";
			}

			$page_include = mgb_template_replace([
				'EDIT_VALUE_CITY' 		=> $edit_value_city,
				'EDIT_VALUE_HP' 		=> $edit_value_hp,
				'EDIT_VALUE_MASTODON'	=> $edit_value_mastodon,
				'EDIT_VALUE_BLUESKY'	=> $edit_value_bluesky,
				'EDIT_VALUE_W'	 		=> $edit_value_w,
				'EDIT_VALUE_EU_VOICE'	=> $edit_value_eu_voice,
				'EDIT_VALUE_EU_VIDEO' 	=> $edit_value_eu_video,
				'EDIT_VALUE_MONNETT' 	=> $edit_value_monnett,

				'CHECKED_CITY' 			=> $checked_city,
				'CHECKED_HP' 			=> $checked_hp,
				'CHECKED_MASTODON'		=> $checked_mastodon,
				'CHECKED_BLUESKY' 		=> $checked_bluesky,
				'CHECKED_W' 			=> $checked_w,
				'CHECKED_EU_VOICE' 		=> $checked_eu_voice,
				'CHECKED_EU_VIDEO'		=> $checked_eu_video,
				'CHECKED_MONNETT' 		=> $checked_monnett
			], $page_include);

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
