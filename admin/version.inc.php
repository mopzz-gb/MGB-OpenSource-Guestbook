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
	*/

	// =============== //
	// version.inc.php //
	// =============== //
	//
	// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

	// make sure nobody has direct acces to this script
	if(!defined('ADMINISTRATION')) {
		include ("error.html");
		die();
	} else {
		if(check_rights($mysqli, $_GET['action'], $_SESSION['user_ID'])) {
			// load config, settings, template and language files
			require ("../includes/config.inc.php");
			require ("../includes/functions.inc.php");
			require ("../includes/load_settings.inc.php");
			require("../language/".$settings['language_path']."/lang_admin.php");
			// load template
			$content_version = mgb_load_template("admin", "default", "version", $settings['debug_mode']);

			if(function_exists('mgb_file_get_contents_curl')) {
				// latest stable version
				$stable_version_plain = mgb_file_get_contents_curl('https://www.m-gb.org/latest.txt');
				$stable_version = "<a href=\"https://www.m-gb.org/files/latest/mgb-latest.7z\" title=\"7ZIP Version\">".$stable_version_plain."</a>";

				// info about latest stable version
				$file = mgb_file_get_contents_curl('https://www.m-gb.org/latest_info.txt');
				$stable_version_info = $file;
			} elseif(function_exists('fopen') AND ini_get(allow_url_fopen) == 1) {
				// latest stable version
				$stable_version_plain = fopen("https://www.m-gb.org/latest.txt", "r");
				$stable_version = "<a href=\"https://www.m-gb.org/files/latest/mgb-latest.7z\" title=\"7ZIP Version\">".fread($stable_version_plain, 50)."</a>";
				fclose($latest_version_plain);

				// info about latest stable version
				$file = fopen("https://www.m-gb.org/latest_info.txt", "r");
				$stable_version_info = fread($file, 1000);
				fclose($file);
			} elseif(!function_exists('fopen') OR ini_get(allow_url_fopen) == 0) {
				if(extension_loaded('curl')) {
					// latest stable version
					$stable_version_plain = get_mgb_version_info('https://www.m-gb.org/latest.txt');
					$stable_version = "<a href=\"https://www.m-gb.org/files/latest/mgb-latest.7z\" title=\"7ZIP Version\">".$stable_version_plain."</a>";
					// info about latest version
					$stable_version_info = get_mgb_version_info('https://www.m-gb.org/latest_info.txt');
				}
			} else {
				$stable_version = "?";
				$stable_version_info = "?";
				$version_info = "<span class='old_version'>".$lang['errormessage15']."</span>";
				$error = 1;
			}

			if(empty($error)) {
				switch(version_compare($settings['version'], $stable_version_plain)) {
					case -1: $version_info = "<span class='old_version'>".$lang['old_version']."</span>";
						break;
					case 0: $version_info = "<span class='same_version'>".$lang['same_version']."</span>";
						break;
					case 1: $version_info = "<span class='newer_version'>".$lang['newer_version']."</span>";
						break;
				}
			}
		}
	}

	$page_include = $content_version;

	$page_include = mgb_template_replace([
		'LANG_CURRENT_VERSION' 	=> $lang['current_version'],
		'LANG_STABLE_VERSION' 	=> $lang['stable_version'],
		'STABLE_VERSION' 		=> $stable_version,
		'STABLE_VERSION_INFO' 	=> $stable_version_info,
		'VERSION_INFO' 			=> $version_info
	], $page_include);

	$content_scrolling_function = "<br>";
?>
