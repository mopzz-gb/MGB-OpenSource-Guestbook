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
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA	02110-1301, USA.

	========
	071.php
	========
	*/
	
	return [
		'version'		=>	'0.7.1',
		'description'	=>	'Adding telemetry, updating structure of banlists, add new social networks',
		'sql'			=>	[
			function(mysqli $mysqli, array $db) {
				return "ALTER TABLE `".$db['prefix']."settings`
					ADD `show_field_mastodon` VARCHAR(255) NOT NULL DEFAULT '0' AFTER `show_field_hp`,
					ADD `show_field_bluesky` VARCHAR(255) NOT NULL DEFAULT '0' AFTER `show_field_mastodon`,
					ADD `show_field_w` VARCHAR(255) NOT NULL DEFAULT '0' AFTER `show_field_bluesky`,
					ADD `show_field_eu_voice` VARCHAR(255) NOT NULL DEFAULT '0' AFTER `show_field_w`,
					ADD `show_field_eu_video` VARCHAR(255) NOT NULL DEFAULT '0' AFTER `show_field_eu_voice`,
					ADD `show_field_monnett` VARCHAR(255) NOT NULL DEFAULT '' AFTER `show_field_eu_video`;";
			},
			
			function(mysqli $mysqli, array $db) {
				return "ALTER TABLE `".$db['prefix']."settings`
					ADD `telemetry` TINYINT(1) DEFAULT '0' AFTER `debug_mode`,
					ADD `telemetry_ping` VARCHAR(255) NOT NULL DEFAULT 'https://ping.m-gb.org/ping.php' AFTER `telemetry`,
					ADD `telemetry_install_id` CHAR(128) AFTER `telemetry_ping`,
					ADD `telemetry_last_ping` INT(11) AFTER `telemetry_install_id`;";
			},
				
			function(mysqli $mysqli, array $db) {
					return "ALTER TABLE `".$db['prefix']."banlist_emails`
					DROP `banned_email_first`,
					DROP `banned_email_second`;";
			},
				
			function(mysqli $mysqli, array $db) {
					return "ALTER TABLE `".$db['prefix']."banlist_ips`
					DROP `banned_ip_first`,
					DROP `banned_ip_second`,
					DROP `banned_ip_third`,
					DROP `banned_ip_fourth`;";
			},
				
			function(mysqli $mysqli, array $db) {
					return "ALTER TABLE `".$db['prefix']."entries`
					ADD `social_mastodon` VARCHAR(255) NOT NULL DEFAULT '' AFTER `hp`,
					ADD `social_bluesky` VARCHAR(255) NOT NULL DEFAULT '' AFTER `social_mastodon`,
					ADD `social_w` VARCHAR(255) NOT NULL DEFAULT '' AFTER `social_bluesky`,
					ADD `social_eu_voice` VARCHAR(255) NOT NULL DEFAULT '' AFTER `social_w`,
					ADD `social_eu_video` VARCHAR(255) NOT NULL DEFAULT '' AFTER `social_eu_voice`,
					ADD `social_monnett` VARCHAR(255) NOT NULL DEFAULT '' AFTER `social_eu_video`;";
			},
				
			function(mysqli $mysqli, array $db) {
					return "ALTER TABLE `".$db['prefix']."spam`
					ADD `social_mastodon` VARCHAR(255) NOT NULL DEFAULT '' AFTER `hp`,
					ADD `social_bluesky` VARCHAR(255) NOT NULL DEFAULT '' AFTER `social_mastodon`,
					ADD `social_w` VARCHAR(255) NOT NULL DEFAULT '' AFTER `social_bluesky`,
					ADD `social_eu_voice` VARCHAR(255) NOT NULL DEFAULT '' AFTER `social_w`,
					ADD `social_eu_video` VARCHAR(255) NOT NULL DEFAULT '' AFTER `social_eu_voice`,
					ADD `social_monnett` VARCHAR(255) NOT NULL DEFAULT '' AFTER `social_eu_video`;";
			},
				
			function(mysqli $mysqli, array $db) {
					return "ALTER TABLE `".$db['prefix']."user` ADD `r_telemetry` TINYINT(1) NOT NULL DEFAULT '0' AFTER `r_banlists`;";
			}
			
			function(mysqli $mysqli, array $db) {
					return "DROP TABLE `".$db['prefix']."captcha`, `".$db['prefix']."lastip`;";
			}			
		]
	];
?>
