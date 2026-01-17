<?php
	/*
	MGB 0.6.x - OpenSource PHP and MySql Guestbook
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
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA	02110-1301, USA.

	========
	0701.php
	========
	*/

	$sql = array();

	// 0.7 & 0.7.0.1 & 0.7.0.2

	$sql[1] = "ALTER TABLE `".$db['prefix']."spam_log` ADD
			`hp` VARCHAR( 255 ) NOT NULL AFTER `user_agent`";
	$sqldescription[1] = "- Adding 'hp' to spam_log table. If this fails with a <i>DUPLICATE COLUMN</i> Error, don't worry. Everything's fine.";

	$sql[2] = "ALTER TABLE `".$db['prefix']."entries` ADD
			`twitter` VARCHAR( 255 ) NOT NULL AFTER `fb`";
	$sqldescription[2] = "- Adding 'twitter' to entries table. If this fails with a <i>DUPLICATE COLUMN</i> Error, don't worry. Everything's fine.";

	$sql[3] = "ALTER TABLE `".$db['prefix']."user` ADD
			`r_settings_database` TINYINT( 1 ) NOT NULL AFTER `r_settings`";
	$sqldescription[3] = "- Adding 'r_settings_database' to user table...";

	$sql[4] = "ALTER TABLE `".$db['prefix']."user` ADD
			`r_banlists` TINYINT( 1 ) NOT NULL AFTER `r_edit_smilies`";
	$sqldescription[4] = "- Adding 'r_banlists' to user table...";

	$sql[5] = "ALTER TABLE `".$db['prefix']."spam` ADD
			`user_agent` VARCHAR( 255 ) NOT NULL AFTER `counter`";
	$sqldescription[5] = "- Adding 'user_agent' to spam table...";

	$sql[6] = "ALTER TABLE `".$db['prefix']."entries` ADD
			`user_agent` VARCHAR( 255 ) NOT NULL AFTER `ip`";
	$sqldescription[6] = "- Adding 'user_agent' to entries table...";

	$sql[7] = "ALTER TABLE `".$db['prefix']."settings` ADD
			`direct_access` TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER `announcement_message`";
	$sqldescription[7] = "- Adding 'direct_access' to settings table...";

	$sql[8] = "ALTER TABLE `".$db['prefix']."settings` ADD
			`direct_access_text` VARCHAR( 255 ) NOT NULL DEFAULT '".$_SERVER['SERVER_NAME']."' AFTER `direct_access`";
	$sqldescription[8] = "- Adding 'direct_access_text' to settings table...";

	$sql[9] = "ALTER TABLE `".$db['prefix']."spam_log` ADD
			`http_referer` VARCHAR( 255 ) NOT NULL AFTER `user_agent`";
	$sqldescription[9] = "- Adding 'http_referer' to spam_log table...";

	$sql[10] = "ALTER TABLE `".$db['prefix']."settings` ADD
			`search_engines_excluded` INT( 1 ) NOT NULL DEFAULT '1' AFTER `direct_access_text`";
	$sqldescription[10] = "- Adding 'search_engines_excluded' to settings table...";

	$sql[11] = "ALTER TABLE `".$db['prefix']."settings` ADD
			`search_engines` VARCHAR( 255 ) NOT NULL AFTER `search_engines_excluded`";
	$sqldescription[11] = "- Adding 'search_engines' to settings table...";

	$sql[12] = "UPDATE `".$db['prefix']."settings`
				SET `search_engines` = 'Googlebot, bingbot, YandexBot, Applebot, Twitterbot, Baiduspider, facebookexternalhit, Discordbot, archive.org_bot, MJ12bot, Exabot, ia_archiver, msnbot, Yahoo! Slurp, SEO search Crawler, crawleradmin.t-info@telekom.de, Teoma, DuckDuckBot';";
	$sqldescription[12] = "- Inserting values for 'search engines' in settings table...";
	$sqlisinsert[12] = 1;

	$sql[13] = "ALTER TABLE `".$db['prefix']."spam_log` ADD
			`name` VARCHAR( 255 ) NOT NULL AFTER `ip`";
	$sqldescription[13] = "- Adding 'name' to spam_log table...";

	$sql[14] = "ALTER TABLE `".$db['prefix']."settings` ADD
			`check_against_anti_spam_sites` INT( 1 ) NOT NULL DEFAULT '1' AFTER `search_engines`";
	$sqldescription[14] = "- Adding 'check_against_anti_spam_sites' to settings table...";

	$sql[15] = "ALTER TABLE `".$db['prefix']."settings` ADD
			`sfs_username_frequency` INT( 5 ) NOT NULL DEFAULT '30' AFTER `check_against_anti_spam_sites`";
	$sqldescription[15] = "- Adding 'sfs_username_frequency' to settings table...";

	$sql[16] = "ALTER TABLE `".$db['prefix']."settings` ADD
			`sfs_email_frequency` INT( 5 ) NOT NULL DEFAULT '1' AFTER `sfs_username_frequency`";
	$sqldescription[16] = "- Adding 'sfs_email_frequency' to settings table...";

	$sql[17] = "ALTER TABLE `".$db['prefix']."settings` ADD
			`sfs_ip_frequency` INT( 5 ) NOT NULL DEFAULT '5' AFTER `sfs_email_frequency`";
	$sqldescription[17] = "- Adding 'sfs_ip_frequency' to settings table...";

	$sql[18] = "ALTER TABLE `".$db['prefix']."settings` ADD
			`sfs_username_required` INT( 1 ) NOT NULL AFTER `sfs_ip_frequency`";
	$sqldescription[18] = "- Adding 'sfs_username_required' to settings table...";

	$sql[19] = "ALTER TABLE `".$db['prefix']."settings` ADD
			`sfs_email_required` INT( 1 ) NOT NULL AFTER `sfs_username_required`";
	$sqldescription[19] = "- Adding 'sfs_email_required' to settings table...";

	$sql[20] = "ALTER TABLE `".$db['prefix']."settings` ADD
			`sfs_ip_required` INT( 1 ) NOT NULL DEFAULT '1' AFTER `sfs_email_required`";
	$sqldescription[20] = "- Adding 'sfs_ip_required' to settings table...";

	$sql[21] = "ALTER TABLE `".$db['prefix']."settings` ADD
			`sfs_mark_as_spam` INT( 1 ) NOT NULL DEFAULT '0' AFTER `sfs_ip_required`";
	$sqldescription[21] = "- Adding 'sfs_mark_as_spam' to settings table...";

	$sql[22] = "ALTER TABLE `".$db['prefix']."settings` ADD
			`sfs_api_key` VARCHAR( 255 ) NOT NULL AFTER `sfs_mark_as_spam`";
	$sqldescription[22] = "- Adding 'sfs_api_key' to settings table...";

	$sql[23] = "ALTER TABLE `".$db['prefix']."spam` ADD
			`sneaked` INT( 1 ) NOT NULL DEFAULT '0' AFTER `user_agent`";
	$sqldescription[23] = "- Adding 'sneaked' to spam table...";

	$sql[24] = "ALTER TABLE `".$db['prefix']."spam_log` ADD
			`sneaked` INT( 1 ) NOT NULL DEFAULT '0' AFTER `site`";
	$sqldescription[24] = "- Adding 'sneaked' to spam_log table...";

	$sql[25] = "ALTER TABLE `".$db['prefix']."entries` CHANGE
			`ip` `ip` VARCHAR( 255 ) NOT NULL";
	$sqldescription[25] = "- Changing maximum length of 'ip' in entries table to 255...";

	$sql[26] = "ALTER TABLE `".$db['prefix']."spam` CHANGE
			`ip` `ip` VARCHAR( 255 ) NOT NULL";
	$sqldescription[26] = "- Changing maximum length of 'ip' in spam table to 255...";

	$sql[27] = "ALTER TABLE `".$db['prefix']."user` CHANGE
			`user_ip` `user_ip` VARCHAR( 255 ) NOT NULL";
	$sqldescription[27] = "- Changing maximum length of 'user_ip' in user table to 255...";

	$sql[28] = "ALTER TABLE `".$db['prefix']."settings` ADD
			`ayah_pub_key` VARCHAR( 255 ) NOT NULL AFTER `sfs_api_key`";
	$sqldescription[28] = "- Adding 'ayah_pub_key' to settings table...";

	$sql[29] = "ALTER TABLE `".$db['prefix']."settings` ADD
			`ayah_score_key` VARCHAR( 255 ) NOT NULL AFTER `ayah_pub_key`";
	$sqldescription[29] = "- Adding 'ayah_score_key' to settings table...";
	
	$sql[30] = "ALTER TABLE `".$db['prefix']."settings` ADD
		`captcha_add_noise` TINYINT(1) NOT NULL DEFAULT '0' AFTER `captcha_angle_2`";
	$sqldescription[30] = "- Adding 'captcha_add_noise' to settings table...";

	$sql[31] = "ALTER TABLE `".$db['prefix']."settings` ADD
		`captcha_noise_color` VARCHAR( 6 ) NOT NULL DEFAULT '' AFTER `captcha_add_noise`";
	$sqldescription[31] = "- Adding 'captcha_noise_color' to settings table...";

	$sql[32] = "ALTER TABLE `".$db['prefix']."settings` ADD
		`captcha_noise_count` INT( 3 ) NOT NULL DEFAULT '5' AFTER `captcha_noise_color`";
	$sqldescription[32] = "- Adding 'captcha_noise_color' to settings table...";

	$sql[33] = "ALTER TABLE `".$db['prefix']."settings`
					ADD `show_field_city` TINYINT(1) NOT NULL DEFAULT '1' AFTER `ayah_score_key`,
					ADD `show_field_icq` TINYINT(1) NOT NULL DEFAULT '1' AFTER `show_field_city`,
					ADD `show_field_aim` TINYINT(1) NOT NULL DEFAULT '1' AFTER `show_field_icq`,
					ADD `show_field_fb` TINYINT(1) NOT NULL DEFAULT '1' AFTER `show_field_aim`,
					ADD `show_field_twitter` TINYINT(1) NOT NULL DEFAULT '1' AFTER `show_field_fb`,
					ADD `show_field_hp` TINYINT(1) NOT NULL DEFAULT '1' AFTER `show_field_twitter`";
	$sqldescription[33] = "- Adding options for deactivating some fields in newentry.php...";

	$sql[34] = "CREATE TABLE IF NOT EXISTS ".$db['prefix']."sys_log (
		`ID` int(11) NOT NULL AUTO_INCREMENT,
		`type` int(4) NOT NULL,
		`name` varchar(255) NOT NULL,
		`email` varchar(255) NOT NULL,
		`text` varchar(5000) NOT NULL,
		`user` varchar(255) NOT NULL,
		`user_new` varchar(255) NOT NULL,
		`user_edit` varchar(255) NOT NULL,
		`ip` varchar(255) NOT NULL,
		`timestamp` int(255) NOT NULL,
		PRIMARY KEY (`ID`)
		) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
	$sqldescription[34] = "- Adding sys_log table...";

	$sql[35] = "ALTER TABLE `".$db['prefix']."settings` ADD `autoblock` TINYINT(1) NOT NULL DEFAULT '0' AFTER `banlist_log` ,
		ADD `autoblock_value` TINYINT(5) NOT NULL DEFAULT '5' AFTER `autoblock` ,
		ADD `autoblock_config` INT(7) NOT NULL DEFAULT '60' AFTER `autoblock_value`";
	$sqldescription[35] = "- Adding fields for automatic IP ban...";

	$sql[36] = "ALTER TABLE `".$db['prefix']."settings` ADD `banlist_cleanup` TINYINT(1) NOT NULL DEFAULT '1' AFTER `banlist_log`";
	$sqldescription[36] = "- Adding field for automatic banlist cleanup...";

	if(isset($_POST['update_version']) AND $_POST['update_version'] == 1) {
		$sql[37] = "UPDATE `".$db['prefix']."settings` SET `version` = '".MGB_VERSION."'";
		$sqldescription[37] = "- Updating version number...";
?>
