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
	0695.php
	========
	*/
	
	return [
		'version'		=>	'0.7',
		'description'	=>	'Add Caching, Debug Mode, Banlists, reCaptcha, Dynamic Field Variables, Keystroke, SMTP Mails, Database Backup, Spam Protocol, ...',
		'sql'			=>	[

			function(mysqli $mysqli, array $db) {			
					return "CREATE TABLE IF NOT EXISTS ".$db['prefix']."spam (
						`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
						`name` VARCHAR( 255 ) NOT NULL ,
						`ip` VARBINARY( 40 ) NOT NULL ,
						`email` VARCHAR( 255 ) NOT NULL ,
						`city` VARCHAR( 255 ) NOT NULL ,
						`hp` VARCHAR( 255 ) NOT NULL ,
						`message` MEDIUMTEXT NOT NULL ,
						`comment` MEDIUMTEXT NOT NULL ,
						`user_notification` TINYINT( 1 ) NOT NULL ,
						`user_show_email` TINYINT( 1 ) NOT NULL ,
						`captcha` VARCHAR( 9 ) NOT NULL ,
						`sent_captcha` VARCHAR( 9 ) NOT NULL ,
						`counter` TINYINT( 1 ) NOT NULL ,
						`timestamp` INT( 11 ) NOT NULL
						) DEFAULT CHARSET=utf8mb4";
			},
			

			function(mysqli $mysqli, array $db) {			
					return "CREATE TABLE IF NOT EXISTS ".$db['prefix']."banlist_ips (
						`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
						`banned_ip` VARBINARY( 40 ) NOT NULL ,						
						`matches` INT( 11 ) NOT NULL ,
						`timestamp` INT( 11 ) NOT NULL
						) DEFAULT CHARSET=utf8mb4";
			},
		

			function(mysqli $mysqli, array $db) {			
					return "CREATE TABLE IF NOT EXISTS ".$db['prefix']."banlist_emails (
						`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
						`banned_email` VARCHAR( 255 ) NOT NULL ,						
						`matches` INT( 11 ) NOT NULL ,
						`timestamp` INT( 11 ) NOT NULL
						) DEFAULT CHARSET=utf8mb4";
			},

			function(mysqli $mysqli, array $db) {			
					return "CREATE TABLE IF NOT EXISTS ".$db['prefix']."banlist_domains (
						`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
						`banned_domain` VARCHAR( 255 ) NOT NULL ,
						`matches` INT( 11 ) NOT NULL ,
						`timestamp` INT( 11 ) NOT NULL
						) DEFAULT CHARSET=utf8mb4";
			},
	

			function(mysqli $mysqli, array $db) {			
					return "CREATE TABLE IF NOT EXISTS ".$db['prefix']."spam_log (
						`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
						`ip` VARBINARY( 40 ) NOT NULL ,
						`email` VARCHAR( 255 ) NOT NULL ,
						`user_agent` VARCHAR( 255 ) NOT NULL ,
						`hp` VARCHAR( 255 ) NOT NULL ,
						`message` MEDIUMTEXT NOT NULL ,
						`type` INT( 2 ) NOT NULL ,
						`site` VARCHAR( 255 ) NOT NULL ,
						`timestamp` VARCHAR( 255 ) NOT NULL
						) DEFAULT CHARSET=utf8mb4";
			},

			function(mysqli $mysqli, array $db) {			
					return "ALTER TABLE `".$db['prefix']."settings`
						ADD `announcement_message` MEDIUMTEXT NOT NULL AFTER `gravatar_position`,
						ADD `spam_mail` VARCHAR( 255 ) NOT NULL AFTER `announcement_message`;";
			},
			
			function(mysqli $mysqli, array $db) {			
					return "ALTER TABLE `".$db['prefix']."settings`
						ADD `banlist_emails` TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER `spam_mail`,
						ADD `banlist_domains` TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER `banlist_emails`,
						ADD `banlist_ips` TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER `banlist_domains`,
						ADD `banlist_log` TINYINT( 1 ) NOT NULL DEFAULT '1' AFTER `banlist_ips`,
						ADD `banlist_cleanup` TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER `banlist_log`;";
			},
			
			function(mysqli $mysqli, array $db) {			
					return "ALTER TABLE `".$db['prefix']."settings`
						ADD `captcha_length` TINYINT( 2 ) NOT NULL DEFAULT '6' AFTER `captcha_method`,
						ADD `captcha_max_length` TINYINT( 1 ) NOT NULL AFTER `captcha_length`,
						ADD `captcha_salt` VARCHAR( 255 ) NOT NULL DEFAULT '' AFTER `captcha_max_length`,
						ADD `captcha_hash_method` VARCHAR( 255 ) NOT NULL DEFAULT 'sha256' AFTER `captcha_salt`,
						ADD `captcha_double_hash` TINYINT( 1 ) NOT NULL DEFAULT '1' AFTER `captcha_hash_method`,
						ADD `wrong_captcha_count` INT( 2 ) NOT NULL DEFAULT '5' AFTER `captcha_angle_2`;";						
			},
			
			function(mysqli $mysqli, array $db) {			
					return "ALTER TABLE `".$db['prefix']."settings`
						ADD `time_lock_spam_count` TINYINT( 2 ) NOT NULL DEFAULT '5' AFTER `time_lock_maxtime`,
						ADD `blocktime` INT( 10 ) NOT NULL DEFAULT '99999999' AFTER `require_email`,						
						ADD `debug_mode` TINYINT( 1 ) DEFAULT '0' NOT NULL AFTER `banlist_log`;";
			},
			
			function(mysqli $mysqli, array $db) {			
					return "ALTER TABLE `".$db['prefix']."settings`
						ADD `recaptcha_pub_key` VARCHAR( 255 ) DEFAULT '' NOT NULL AFTER `captcha_angle_2`,
						ADD `recaptcha_private_key` VARCHAR( 255 ) DEFAULT '' NOT NULL AFTER `recaptcha_pub_key`,
						ADD `recaptcha_style` VARCHAR( 15 ) DEFAULT 'red' NOT NULL AFTER `recaptcha_private_key`;";
			},
			
			function(mysqli $mysqli, array $db) {			
					return "ALTER TABLE `".$db['prefix']."settings`
						CHANGE `dateform` `dateform` VARCHAR( 255 ) NOT NULL DEFAULT 'd.m.Y, H:i';";
			},
			
			function(mysqli $mysqli, array $db) {			
					return "ALTER TABLE `".$db['prefix']."settings`
						ADD `mailer_method` TINYINT( 1 ) NOT NULL  DEFAULT '0' AFTER `sendmail_contactmail_text_copy` ,
						ADD `smtp_server` VARCHAR( 255 ) NOT NULL AFTER `mailer_method` ,
						ADD `smtp_port` INT( 6 ) NOT NULL DEFAULT '25' AFTER `smtp_server` ,
						ADD `smtp_user` VARCHAR( 255 ) NOT NULL AFTER `smtp_port` ,
						ADD `smtp_password` VARCHAR( 255 ) NOT NULL AFTER `smtp_user` ,
						ADD `smtp_auth` TINYINT( 1 ) NOT NULL DEFAULT '1' AFTER `smtp_password`;";
			},
			
			function(mysqli $mysqli, array $db) {			
					return "ALTER TABLE `".$db['prefix']."settings`
						ADD `keystroke` TINYINT( 1 ) NOT NULL DEFAULT '1' AFTER `time_lock_spam_count` ,
						ADD `keystroke_max_cps` TINYINT( 2 ) NOT NULL DEFAULT '8' AFTER `keystroke` ,
						ADD `keystroke_ban_time` INT( 6 ) NOT NULL DEFAULT '20' AFTER `keystroke_max_cps`;";
			},
			
			function(mysqli $mysqli, array $db) {			
					return "ALTER TABLE `".$db['prefix']."settings`
						ADD `caching` TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER `admin_gbemail`,
						ADD `dynamic_fieldnames` TINYINT( 1 ) NOT NULL DEFAULT '1' AFTER `keystroke_ban_time`,
						ADD `dynamic_fieldnames_method` TINYINT( 1 ) NOT NULL DEFAULT '1' AFTER `dynamic_fieldnames`,
						ADD `dynamic_fieldnames_length` INT( 255 ) NOT NULL DEFAULT '16' AFTER `dynamic_fieldnames_method`;";
			}
		]
	];		
?>
