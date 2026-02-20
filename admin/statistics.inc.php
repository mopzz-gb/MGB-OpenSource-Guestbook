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

	// ================== //
	// statistics.inc.php //
	// ================== //
	//
	// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

	// make sure nobody has direct access to this script
	if (!defined('ADMINISTRATION')) {
		include ("error.html");
		die();
	} else {
		if(check_rights($mysqli, $_GET['action'], $_SESSION['user_ID'])) {
			// load config, settings and language files
			require ("../includes/config.inc.php");
			require ("../includes/load_settings.inc.php");
			require ("../language/".$settings['language_path']."/lang_admin.php");

			// load templates
			$content_statistics = mgb_load_template("admin", "default", "statistics", $settings['debug_mode']);
			$page_statistics = $content_statistics;
			
			// Installation date
			if(!empty($mgb_installation_timestamp)) {
				$st_install_date = date('d.m.Y', $mgb_installation_timestamp);
			} else {
				$st_install_date = $lang['st_unknown'];
			}
			
			// Age of Installation
			if(!empty($mgb_installation_timestamp)) {
				$st_age = mgb_modern_timestamp($mgb_installation_timestamp, $settings['language_path'], "adminpanel");
			} else {
				$st_age = $lang['st_unknown'];
			}
			
			// Number of guestbook entries
			$sql = "SELECT COUNT(ID) as total FROM ".$db['prefix']."entries";
			$result = mgb_sql_connect($mysqli, $sql, "Error while getting information about spam entries in navigation.", 1, null, null);
			$row = $result->fetch_assoc();
			$total_entries = (int)$row['total'];
			
			// entries per day since Installation
			if($total_entries > 0) {
				$difference = time() - $mgb_installation_timestamp;
				$days_since_install = floor($difference / (60*60*24));			
				$entries_per_day = $total_entries / $days_since_install;
				$entries_per_day = round($entries_per_day, 3);
			} else {
				$entries_per_day = 0;
			}
			
			$page_statistics = mgb_template_replace([
						'ST_INSTALL_DATE'		=> $st_install_date,
						'ST_AGE'				=> $st_age,
						'ST_ENTRIES'			=> $total_entries,
						'ST_ENTRIES_PER_DAY' 	=> $entries_per_day
					], $page_statistics);
			
			$page_include = $page_statistics;
		}			
	}
?>