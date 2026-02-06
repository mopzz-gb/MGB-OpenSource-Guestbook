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
	0704.php
	========
	*/
	
	return [
		'version'		=>	'0.7.0.4',
		'description'	=>	'Added more user rights, referer check, stopforumspam',
		'sql'			=>	[
			function(mysqli $mysqli, array $db) {			
				return "ALTER TABLE `".$db['prefix']."spam_log`				
				ADD `sneaked` TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER `site`,
				ADD `http_referer` VARCHAR( 255 ) DEFAULT '' AFTER `user_agent`,
				ADD `hp` VARCHAR( 255 ) NOT NULL DEFAULT '' AFTER `http_referer`,
				ADD `name` VARCHAR( 255 ) NOT NULL AFTER `ip`";
			},
			
			
			function(mysqli $mysqli, array $db) {			
				return "ALTER TABLE `".$db['prefix']."user`
				ADD `r_settings_database` TINYINT( 1 ) NOT NULL AFTER `r_settings`,
				ADD `r_banlists` TINYINT( 1 ) NOT NULL AFTER `r_edit_smilies`,
				CHANGE	`user_ip` `user_ip` VARBINARY( 40 ) NOT NULL";
			},
				
			function(mysqli $mysqli, array $db) {			
				return "ALTER TABLE `".$db['prefix']."spam`
				ADD `user_agent` VARCHAR( 255 ) NOT NULL AFTER `counter`,
				ADD `sneaked` TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER `user_agent`,
				CHANGE	`ip` `ip` VARBINARY( 40 ) NOT NULL";
			},
			
			function(mysqli $mysqli, array $db) {			
				return "ALTER TABLE `".$db['prefix']."entries`
				ADD `user_agent` VARCHAR( 255 ) NOT NULL AFTER `ip`,
				CHANGE `ip` `ip` VARBINARY( 40 ) NOT NULL";
			},
			
			function(mysqli $mysqli, array $db) {			
				return "ALTER TABLE `".$db['prefix']."settings`
				ADD `direct_access` TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER `announcement_message`,
				ADD `direct_access_text` VARCHAR( 255 ) NOT NULL DEFAULT '' AFTER `direct_access`,		
				ADD `search_engines_excluded` TINYINT( 1 ) NOT NULL DEFAULT '1' AFTER `direct_access_text`,
				ADD `search_engines` VARCHAR( 255 ) NOT NULL AFTER `search_engines_excluded`,
				ADD `check_against_anti_spam_sites` TINYINT( 1 ) NOT NULL DEFAULT '1' AFTER `search_engines`,
				ADD `sfs_username_frequency` INT( 5 ) NOT NULL DEFAULT '30' AFTER `check_against_anti_spam_sites`,
				ADD `sfs_email_frequency` INT( 5 ) NOT NULL DEFAULT '1' AFTER `sfs_username_frequency`,
				ADD `sfs_ip_frequency` INT( 5 ) NOT NULL DEFAULT '5' AFTER `sfs_email_frequency`,
				ADD `sfs_username_required` TINYINT( 1 ) NOT NULL AFTER `sfs_ip_frequency`,
				ADD `sfs_email_required` TINYINT( 1 ) NOT NULL AFTER `sfs_username_required`,
				ADD `sfs_ip_required` TINYINT( 1 ) NOT NULL DEFAULT '1' AFTER `sfs_email_required`,
				ADD `sfs_mark_as_spam` TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER `sfs_ip_required`,
				ADD `sfs_api_key` VARCHAR( 255 ) NOT NULL AFTER `sfs_mark_as_spam`,
				ADD `captcha_add_noise` TINYINT(1) NOT NULL DEFAULT '0' AFTER `captcha_angle_2`,
				ADD `captcha_noise_color` VARCHAR( 6 ) NOT NULL DEFAULT '' AFTER `captcha_add_noise`,
				ADD `captcha_noise_count` INT( 3 ) NOT NULL DEFAULT '5' AFTER `captcha_noise_color`,
				ADD `show_field_city` TINYINT(1) NOT NULL DEFAULT '1' AFTER `sfs_api_key`,
				ADD `show_field_hp` TINYINT(1) NOT NULL DEFAULT '1' AFTER `show_field_city`,
				ADD `autoblock` TINYINT(1) NOT NULL DEFAULT '0' AFTER `banlist_log` ,
				ADD `autoblock_value` INT(5) NOT NULL DEFAULT '5' AFTER `autoblock` ,
				ADD `autoblock_config` INT(7) NOT NULL DEFAULT '60' AFTER `autoblock_value`";
			},
			
			function(mysqli $mysqli, array $db) {			
				return "UPDATE `".$db['prefix']."settings`	SET `search_engines` = 'Googlebot, bingbot, YandexBot, Applebot, Twitterbot, Baiduspider, facebookexternalhit, Discordbot, archive.org_bot, MJ12bot, Exabot, ia_archiver, msnbot, Yahoo! Slurp, SEO search Crawler, crawleradmin.t-info@telekom.de, Teoma, DuckDuckBot';";
			},
			
			function(mysqli $mysqli, array $db) {			
				return "CREATE TABLE IF NOT EXISTS ".$db['prefix']."sys_log (
				`ID` int(11) NOT NULL AUTO_INCREMENT,
				`type` int(4) NOT NULL,
				`name` varchar(255) NOT NULL,
				`email` varchar(255) NOT NULL,
				`text` varchar(5000) NOT NULL,
				`user` varchar(255) NOT NULL,
				`user_new` varchar(255) NOT NULL,
				`user_edit` varchar(255) NOT NULL,
				`ip` varbinary(40) NOT NULL,
				`timestamp` int(11) NOT NULL,
				PRIMARY KEY (`ID`)
				) DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;";
			}
		]
	];
?>
