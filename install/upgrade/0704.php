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
	
	// generate unique install id for the ping
	define('MGB_TELEMETRY_SALT', 'mgb-telemetry-v1-2026');
	$install_id = mgb_generate_install_id(MGB_TELEMETRY_SALT);
	
	$sqlisinsert[5] = 1;
	$sql[5] = "UPDATE `".$db['prefix']."settings` SET `telemetry_install_id` = '".$install_id."'";	
	$sqldescription[5] = "Adding unique install id...";
	
	// update banlists
	$sql[6] = "ALTER TABLE `".$db['prefix']."banlist_emails` DROP `banned_email_first`, DROP `banned_email_second`;";
	$sqldescription[6] = "Updating structure of email banlist...";
	
	$sql[7] = "ALTER TABLE `".$db['prefix']."banlist_ips` DROP `banned_ip_first`, DROP `banned_ip_second`, DROP `banned_ip_third`, DROP `banned_ip_fourth`;";
	$sqldescription[7] = "Updating structure of ip banlist...";
	
	$sql[8] = "ALTER TABLE `".$db['prefix']."entries` ADD `social_mastodon` VARCHAR(255) NOT NULL DEFAULT '' AFTER `hp`;";
	$sqldescription[8] = "Adding mastodon social network to entries...";
	
	$sql[9] = "ALTER TABLE `".$db['prefix']."spam` ADD `social_mastodon` VARCHAR(255) NOT NULL DEFAULT '' AFTER `hp`;";
	$sqldescription[9] = "Adding mastodon social network to spam...";
	
	$sql[10] = "ALTER TABLE `".$db['prefix']."entries` ADD `social_bluesky` VARCHAR(255) NOT NULL DEFAULT '' AFTER `social_mastodon`;";
	$sqldescription[10] = "Adding bluesky social network to entries...";
	
	$sql[11] = "ALTER TABLE `".$db['prefix']."spam` ADD `social_bluesky` VARCHAR(255) NOT NULL DEFAULT '' AFTER `social_mastodon`;";
	$sqldescription[11] = "Adding bluesky social network to spam...";
	
	$sql[12] = "ALTER TABLE `".$db['prefix']."entries` ADD `social_w` VARCHAR(255) NOT NULL DEFAULT '' AFTER `social_bluesky`;";
	$sqldescription[12] = "Adding W social network to entries...";
	
	$sql[13] = "ALTER TABLE `".$db['prefix']."spam` ADD `social_w` VARCHAR(255) NOT NULL DEFAULT '' AFTER `social_bluesky`;";
	$sqldescription[13] = "Adding W social network to spam...";
	
	$sql[14] = "ALTER TABLE `".$db['prefix']."entries` ADD `social_eu_voice` VARCHAR(255) NOT NULL DEFAULT '' AFTER `social_w`;";
	$sqldescription[14] = "Adding EU Voice social network to entries...";
	
	$sql[15] = "ALTER TABLE `".$db['prefix']."spam` ADD `social_eu_voice` VARCHAR(255) NOT NULL DEFAULT '' AFTER `social_w`;";
	$sqldescription[15] = "Adding EU Voice social network to spam...";
	
	$sql[16] = "ALTER TABLE `".$db['prefix']."entries` ADD `social_eu_video` VARCHAR(255) NOT NULL DEFAULT '' AFTER `social_eu_voice`;";
	$sqldescription[16] = "Adding EU Video social network to entries...";
	
	$sql[17] = "ALTER TABLE `".$db['prefix']."spam` ADD `social_eu_video` VARCHAR(255) NOT NULL DEFAULT '' AFTER `social_eu_voice`;";
	$sqldescription[17] = "Adding EU Video social network to spam...";
	
	$sql[18] = "ALTER TABLE `".$db['prefix']."entries` ADD `social_monnett` VARCHAR(255) NOT NULL DEFAULT '' AFTER `social_eu_video`;";
	$sqldescription[18] = "Adding monnett social network to entries...";
	
	$sql[19] = "ALTER TABLE `".$db['prefix']."spam` ADD `social_monnett` VARCHAR(255) NOT NULL DEFAULT '' AFTER `social_eu_video`;";
	$sqldescription[19] = "Adding monnett social network to spam...";

	$sql[20] = "ALTER TABLE `".$db['prefix']."settings` ADD `show_field_mastodon` VARCHAR(255) NOT NULL DEFAULT '0' AFTER `show_field_hp`;";
	$sqldescription[20] = "Add the option to turn Mastodon on and off ...";

	$sql[21] = "ALTER TABLE `".$db['prefix']."settings` ADD `show_field_bluesky` VARCHAR(255) NOT NULL DEFAULT '0' AFTER `show_field_mastodon`;";
	$sqldescription[21] = "Add the option to turn Bluesky on and off ...";

	$sql[22] = "ALTER TABLE `".$db['prefix']."settings` ADD `show_field_w` VARCHAR(255) NOT NULL DEFAULT '0' AFTER `show_field_bluesky`;";
	$sqldescription[22] = "Add the option to turn W on and off ...";

	$sql[23] = "ALTER TABLE `".$db['prefix']."settings` ADD `show_field_eu_voice` VARCHAR(255) NOT NULL DEFAULT '0' AFTER `show_field_w`;";
	$sqldescription[23] = "Add the option to turn EU Voice on and off ...";

	$sql[24] = "ALTER TABLE `".$db['prefix']."settings` ADD `show_field_eu_video` VARCHAR(255) NOT NULL DEFAULT '0' AFTER `show_field_eu_voice`;";
	$sqldescription[24] = "Add the option to turn EU Video on and off ...";
	
	$sql[25] = "ALTER TABLE `".$db['prefix']."settings` ADD `show_field_monnett` VARCHAR(255) NOT NULL DEFAULT '' AFTER `show_field_eu_video`;";
	$sqldescription[25] = "Add the option to turn Monnett on and off ...";
	
	$sql[26] = "ALTER TABLE `".$db['prefix']."user` ADD `r_telemetry` TINYINT(1) NOT NULL DEFAULT '0' AFTER `r_banlists`;";
	$sqldescription[26] = "Adding user rights for telemetry...";	
	
	if(isset($_POST['update_version']) AND $_POST['update_version'] == 1) {
		$sql[27] = "UPDATE `".$db['prefix']."settings` SET `version` = '".MGB_VERSION."'";
		$sqldescription[27] = "- Updating version number...";
	}
?>
