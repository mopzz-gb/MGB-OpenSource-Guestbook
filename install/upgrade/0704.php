<?php
	/*
	MGB 0.6.x - OpenSource PHP and MySql Guestbook
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
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA	02110-1301, USA.

	========
	0704.php
	========
	*/

	$sql = array();

	// 0.7.0.4
	
	// add columns for anonymous usage statistics
	$sql[1] = "ALTER TABLE `".$db['prefix']."settings` ADD `telemetry` TINYINT(1) DEFAULT NULL AFTER `debug_mode`;";
	$sqldescription[1] = "Adding telemetry...";
	$sql[2] = "ALTER TABLE `".$db['prefix']."settings` ADD `telemetry_ping` VARCHAR(255) NOT NULL DEFAULT 'https://ping.m-gb.org/ping.php' AFTER `telemetry`;";
	$sqldescription[2] = "Adding telemetry ping address...";
	$sql[3] = "ALTER TABLE `".$db['prefix']."settings` ADD `telemetry_install_id` CHAR(128) AFTER `telemetry_ping`;";
	$sqldescription[3] = "Adding telemetry unique install id...";
	$sql[4] = "ALTER TABLE `".$db['prefix']."settings` ADD `telemetry_last_ping` INT(11) AFTER `telemetry_install_id`;";
	$sqldescription[4] = "Adding telemetry last ping...";
	
	// update banlists
	$sql[5] = "ALTER TABLE `".$db['prefix']."banlist_emails` DROP `banned_email_first`, DROP `banned_email_second`;";
	$sqldescription[5] = "Updating structure of email banlist...";
	$sql[6] = "ALTER TABLE `".$db['prefix']."banlist_ips` DROP `banned_ip_first`, DROP `banned_ip_second`, DROP `banned_ip_third`, DROP `banned_ip_fourth`;";
	$sqldescription[6] = "Updating structure of ip banlist...";
		
	// generate unique install id for the ping
	define('MGB_TELEMETRY_SALT', 'mgb-telemetry-v1-2026');
	$install_id = mgb_generate_install_id(MGB_TELEMETRY_SALT);
	
	$sql[7] = "UPDATE `".$db['prefix']."_settings` SET `telemetry_install_id` = '".$install_id."'";
	$sqlisinsert[7] = 1;
	$sqldescription[7] = "Adding telemetry last ping...";

	if(isset($_POST['update_version']) AND $_POST['update_version'] == 1) {
		$sql[8] = "UPDATE `".$db['prefix']."settings` SET `version` = '".MGB_VERSION."'";
		$sqldescription[8] = "- Updating version number...";
	}
?>
