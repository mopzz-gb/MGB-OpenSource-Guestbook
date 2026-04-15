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

	=================
	mysql.php - 0.7.1
	=================
	*/

	// make sure nobody has direct access to this script
	if(!defined('INSTALL')) {
		echo "Error! Start installation with <a href=\"install.php\">install.php</a>";
		die();
	} else {
		$db_hostname = $_SESSION['db_hostname'];
		$db_dbname = $_SESSION['db_dbname'];
		$db_username = $_SESSION['db_username'];
		$db_password = $_SESSION['db_password'];
		$db_prefix = $_SESSION['db_prefix'];

		$admin_name = $_SESSION['admin_name'];
		$admin_username = $_SESSION['admin_username'];
		$admin_password = password_hash($_SESSION['admin_password'], PASSWORD_DEFAULT);
		$admin_email = $_SESSION['admin_email'];
		$admin_gbemail = $_SESSION['admin_gbemail'];
		
		$allow_telemetry = $_SESSION['allow_telemetry'];

		$server_name = $_SERVER["SERVER_NAME"];
		$gb_path = str_replace("install", '', dirname($_SERVER['PHP_SELF']));
		$install_language = preg_replace("/\.\.\/language\//", "", $_SESSION['install_language']);		

		// ++++++++++++++++++++++++++++++++++ //

		require (MGB_ROOT."language/".$_SESSION['install_language']."/lang_admin.php");

		$sql = array();

		$sql[1] = "CREATE TABLE IF NOT EXISTS ".$db_prefix."entries (
			`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
			`name` VARCHAR( 255 ) NOT NULL DEFAULT '',
			`city` VARCHAR( 255 ) NOT NULL DEFAULT '',
			`email` VARCHAR( 255 ) NOT NULL DEFAULT '',			
			`hp` VARCHAR( 255 ) NOT NULL DEFAULT '',			
			`social_mastodon` VARCHAR( 255 ) NOT NULL DEFAULT '',
			`social_bluesky` VARCHAR( 255 ) NOT NULL DEFAULT '',
			`social_w` VARCHAR( 255 ) NOT NULL DEFAULT '',
			`social_eu_voice` VARCHAR( 255 ) NOT NULL DEFAULT '',
			`social_eu_video` VARCHAR( 255 ) NOT NULL DEFAULT '',
			`social_monnett` VARCHAR( 255 ) NOT NULL DEFAULT '',
			`message` MEDIUMTEXT NOT NULL ,
			`comment` MEDIUMTEXT NOT NULL ,
			`ip` VARBINARY( 40 ) NOT NULL DEFAULT '',
			`user_agent` VARCHAR( 255 ) NOT NULL DEFAULT '',
			`timestamp` INT( 11 ) NOT NULL,
			`user_notification` TINYINT( 1 ) NOT NULL DEFAULT '1',
			`user_show_email` TINYINT( 1 ) NOT NULL DEFAULT '0',
			`checked` TINYINT( 1 ) NOT NULL DEFAULT '0',
			`isspam` TINYINT( 1 ) NOT NULL DEFAULT '0'
			) DEFAULT CHARSET=utf8mb4 ;";

		$sql[2] = "CREATE TABLE IF NOT EXISTS ".$db_prefix."settings (
			`title` VARCHAR(255) NOT NULL DEFAULT 'MGB OpenSource Guestbook',
			`h_author` VARCHAR(255) NOT NULL DEFAULT '".$admin_name."',
			`h_domain` VARCHAR(255) NOT NULL DEFAULT '".$server_name."',
			`gb_path` VARCHAR(255) NOT NULL DEFAULT '".$gb_path."',
			`h_keywords` VARCHAR(255) NOT NULL DEFAULT '',
			`h_description` VARCHAR(255) NOT NULL DEFAULT '',
			`timezone` VARCHAR(255) NOT NULL DEFAULT 'Europe/Berlin',
			`admin_name` VARCHAR(255) NOT NULL DEFAULT '".$admin_name."',
			`admin_email` VARCHAR(255) NOT NULL DEFAULT '".$admin_email."',
			`admin_gbemail` VARCHAR(255) NOT NULL DEFAULT '".$admin_gbemail."',
			`caching` TINYINT( 1 ) NOT NULL DEFAULT '0',
			`sendmail_admin` TINYINT(1) NOT NULL DEFAULT '1',
			`sendmail_admin_text` MEDIUMTEXT NOT NULL DEFAULT '',
			`sendmail_user` TINYINT(1) NOT NULL DEFAULT '1',
			`sendmail_user_text` MEDIUMTEXT NOT NULL,
			`sendmail_user_text_moderated` MEDIUMTEXT NOT NULL,
			`sendmail_user_notification_text` MEDIUMTEXT NOT NULL,
			`sendmail_comment_text` MEDIUMTEXT NOT NULL,
			`sendmail_contactmail_text` MEDIUMTEXT NOT NULL,
			`sendmail_contactmail_text_copy` MEDIUMTEXT NOT NULL,
			`mailer_method` TINYINT(1) NOT NULL DEFAULT '0',
			`smtp_server` VARCHAR(255) NOT NULL DEFAULT '',
			`smtp_port` INT(6) NOT NULL DEFAULT '25',
			`smtp_user` VARCHAR(255) NOT NULL DEFAULT '',
			`smtp_password` VARCHAR(255) NOT NULL DEFAULT '',
			`smtp_auth` TINYINT( 1 ) NOT NULL DEFAULT '1',
			`template_path` VARCHAR(255) NOT NULL DEFAULT 'mgbModern',
			`template_style_path` VARCHAR(255) NOT NULL DEFAULT 'blue',
			`iconset_path` VARCHAR(255) NOT NULL DEFAULT 'default',
			`language_path` VARCHAR(255) NOT NULL DEFAULT 'lang_english_utf8',
			`badwords` MEDIUMTEXT NOT NULL DEFAULT '',
			`bbcode` TINYINT(1) NOT NULL DEFAULT '1',
			`allow_img_tag` TINYINT(1) NOT NULL DEFAULT '0',
			`max_img_width` INT(4) NOT NULL DEFAULT '400',
			`max_img_height` INT(4) NOT NULL DEFAULT '400',
			`center_img` TINYINT(1) NOT NULL DEFAULT '1',
			`allow_flash_tag` TINYINT(1) NOT NULL DEFAULT '0',
			`max_flash_width` INT(4) NOT NULL DEFAULT '400',
			`max_flash_height` INT(4) NOT NULL DEFAULT '400',
			`center_flash` TINYINT(1) NOT NULL DEFAULT '1',
			`smileys` TINYINT(1) NOT NULL DEFAULT '1',
			`smileys_break` TINYINT(2) NOT NULL DEFAULT '12',
			`smileys_order` VARCHAR(4) NOT NULL DEFAULT 'ASC',
			`captcha` TINYINT(1) NOT NULL DEFAULT '1',
			`captcha_method` TINYINT(1) NOT NULL DEFAULT '0',
			`captcha_length` TINYINT(1) NOT NULL DEFAULT '6',
			`captcha_max_length` TINYINT(1) NOT NULL DEFAULT '9',
			`captcha_salt` VARCHAR( 255 ) NOT NULL DEFAULT '0',
			`captcha_hash_method` VARCHAR( 255 ) NOT NULL DEFAULT 'sha256',
			`captcha_double_hash` TINYINT(1) NOT NULL DEFAULT '1',
			`captcha_coords_x` INT( 3 ) NOT NULL DEFAULT '10',
			`captcha_coords_y` INT( 3 ) NOT NULL DEFAULT '25',
			`captcha_color` VARCHAR( 6 ) NOT NULL DEFAULT '303030',
			`captcha_angle_1` INT( 4 ) NOT NULL DEFAULT '-10',
			`captcha_angle_2` INT( 4 ) NOT NULL DEFAULT '5',
			`captcha_add_noise` TINYINT(1) NOT NULL DEFAULT '1',
			`captcha_noise_color` VARCHAR( 6 ) NOT NULL DEFAULT '',
			`captcha_noise_count` INT( 3 ) NOT NULL DEFAULT '5',
			`recaptcha_pub_key` VARCHAR(255) NOT NULL DEFAULT '',
			`recaptcha_private_key` VARCHAR(255) NOT NULL DEFAULT '',
			`recaptcha_style` VARCHAR(255) NOT NULL DEFAULT '1',
			`wrong_captcha_count` INT(2) NOT NULL DEFAULT '0',			
			`time_lock` TINYINT(1) NOT NULL DEFAULT '1',
			`time_lock_value` INT(3) NOT NULL DEFAULT '30',
			`time_lock_maxtime` INT(11) NOT NULL DEFAULT '600',
			`time_lock_spam_count` TINYINT(2) NOT NULL DEFAULT '5',
			`keystroke` TINYINT( 1 ) NOT NULL DEFAULT '1' ,
			`keystroke_max_cps` TINYINT( 2 ) NOT NULL DEFAULT '8' ,
			`keystroke_ban_time` INT( 6 ) NOT NULL DEFAULT '20' ,
			`dynamic_fieldnames` TINYINT( 1 ) NOT NULL DEFAULT '1' ,
			`dynamic_fieldnames_method` TINYINT( 1 ) NOT NULL DEFAULT '1' ,
			`dynamic_fieldnames_length` INT( 255 ) NOT NULL DEFAULT '16' ,
			`user_notification` TINYINT(1) NOT NULL DEFAULT '1',
			`user_show_email` TINYINT(1) NOT NULL DEFAULT '1',
			`session_timeout` INT(4) NOT NULL DEFAULT '900',
			`password_min_length` TINYINT(2) NOT NULL DEFAULT '8',
			`moderated` TINYINT(1) NOT NULL DEFAULT '1',
			`require_email` TINYINT(1) NOT NULL DEFAULT '1',
			`blocktime` INT(10) NOT NULL DEFAULT '99999999',
			`entries_per_page` TINYINT(2) NOT NULL DEFAULT '10',
			`entries_order` VARCHAR(11) NOT NULL DEFAULT 'ID',
			`entries_order_asc_desc` VARCHAR(4) NOT NULL DEFAULT 'DESC',
			`entries_numbering` TINYINT(1) NOT NULL DEFAULT '1',
			`spam_protection` TINYINT(1) NOT NULL DEFAULT '1',
			`ipblocker` TINYINT(1) NOT NULL DEFAULT '0',
			`wordwrap` TINYINT(2) NOT NULL DEFAULT '60',
			`dateform` VARCHAR(255) NOT NULL DEFAULT 'd.m.Y, H:i',
			`gravatar_show` TINYINT(1) NOT NULL DEFAULT '0',
			`gravatar_rating` TINYINT(1) NOT NULL DEFAULT '0',
			`gravatar_type` TINYINT(1) NOT NULL DEFAULT '1',
			`gravatar_size` INT(3) NOT NULL DEFAULT '50',
			`gravatar_position` TINYINT(1) NOT NULL DEFAULT '1',
			`spam_mail` VARCHAR(255) NOT NULL DEFAULT '',
			`banlist_emails` TINYINT(1) NOT NULL DEFAULT '1',
			`banlist_domains` TINYINT(1) NOT NULL DEFAULT '1',
			`banlist_ips` TINYINT(1) NOT NULL DEFAULT '1',
			`banlist_log` TINYINT(1) NOT NULL DEFAULT '1',
			`banlist_cleanup` TINYINT(1) NOT NULL DEFAULT '0',
			`autoblock` TINYINT(1) NOT NULL DEFAULT '0',
			`autoblock_value` TINYINT(5) NOT NULL DEFAULT '5',
			`autoblock_config` INT(7) NOT NULL DEFAULT '60',
			`debug_mode` TINYINT(1) NOT NULL DEFAULT '0',
			`announcement_message` MEDIUMTEXT NOT NULL DEFAULT '',
			`direct_access` TINYINT(1) NOT NULL DEFAULT '0',
			`direct_access_text` VARCHAR(255) NOT NULL DEFAULT '',
			`search_engines_excluded` TINYINT(1) NOT NULL DEFAULT '1',
			`search_engines` MEDIUMTEXT NOT NULL,
			`check_against_anti_spam_sites` INT(1) NOT NULL DEFAULT '0',
			`sfs_username_frequency` INT(5) NOT NULL DEFAULT '30',
			`sfs_email_frequency` INT(5) NOT NULL DEFAULT '1',
			`sfs_ip_frequency` INT(5) NOT NULL DEFAULT '5',
			`sfs_username_required` INT(1) NOT NULL DEFAULT '0',
			`sfs_email_required` INT(1) NOT NULL DEFAULT '0',
			`sfs_ip_required` INT(1) NOT NULL DEFAULT '1',
			`sfs_mark_as_spam` INT(1) NOT NULL DEFAULT '1',
			`sfs_api_key` VARCHAR(255) NOT NULL DEFAULT '',
			`show_field_city` TINYINT(1) NOT NULL DEFAULT '1',
			`show_field_hp` TINYINT(1) NOT NULL DEFAULT '1',
			`show_field_mastodon` TINYINT(1) NOT NULL DEFAULT '0',
			`show_field_bluesky` TINYINT(1) NOT NULL DEFAULT '0',
			`show_field_w` TINYINT(1) NOT NULL DEFAULT '0',
			`show_field_eu_voice` TINYINT(1) NOT NULL DEFAULT '0',
			`show_field_eu_video` TINYINT(1) NOT NULL DEFAULT '0',
			`show_field_monnett` TINYINT(1) NOT NULL DEFAULT '0',
			`telemetry` TINYINT(1) NOT NULL DEFAULT '0',
			`telemetry_ping` VARCHAR(255) NOT NULL DEFAULT 'https://ping.m-gb.org/ping.php',
			`telemetry_install_id` CHAR(32),
			`telemetry_last_ping` INT(11),
			`max_links` TINYINT(1) NOT NULL DEFAULT '0',
			`max_links_in_message` INT(3) NOT NULL DEFAULT '3',
			`version` VARCHAR(20) NOT NULL,
			PRIMARY KEY (`title`)
			) DEFAULT CHARSET=utf8mb4 ;";

		$sql[3] = "INSERT INTO ".$db_prefix."settings (
			`sendmail_admin_text` ,
			`sendmail_user_text` ,
			`sendmail_user_text_moderated` ,
			`sendmail_user_notification_text` ,
			`sendmail_comment_text` ,
			`sendmail_contactmail_text` ,
			`sendmail_contactmail_text_copy` ,			
			`language_path` ,			
			`captcha_salt` ,			
			`direct_access_text` ,			
			`search_engines` ,
			`telemetry` ,
			`telemetry_install_id` ,
			`telemetry_last_ping` ,
			`version`
			) VALUES (
			'".$lang['sendmail_admin_text']."',
			'".$lang['sendmail_user_text']."',
			'".$lang['sendmail_user_text_moderated']."',
			'".$lang['sendmail_user_notification_text']."',
			'".$lang['sendmail_comment_text']."',
			'".$lang['sendmail_contactmail_text']."',
			'".$lang['sendmail_contactmail_text_copy']."',			
			'".$install_language."',			
			'".mt_rand()."',			
			'".$_SERVER['SERVER_NAME']."',			
			'Googlebot, bingbot, YandexBot, Applebot, Twitterbot, Baiduspider, facebookexternalhit, Discordbot, archive.org_bot, MJ12bot, Exabot, ia_archiver, msnbot, Yahoo! Slurp, SEO search Crawler, crawleradmin.t-info@telekom.de, Teoma, DuckDuckBot',
			'".$allow_telemetry."',
			'".$install_id."',
			'".time()."',
			'".MGB_VERSION."'
			);";


		$sql[4] = "CREATE TABLE IF NOT EXISTS ".$db_prefix."user (
			`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
			`user_name` VARCHAR( 255 ) NOT NULL ,
			`user_password` VARCHAR( 255 ) NOT NULL ,
			`user_key` VARCHAR( 16 ) NOT NULL DEFAULT '',
			`user_ip` VARBINARY( 40 ) NOT NULL DEFAULT '',
			`user_agent` VARCHAR( 255 ) NOT NULL DEFAULT '',
			`user_email` VARCHAR( 255 ) NOT NULL DEFAULT '',
			`user_is_active` TINYINT( 1 ) NOT NULL DEFAULT '1',
			`user_level` TINYINT( 1 ) NOT NULL DEFAULT '1',
			`r_settings` TINYINT( 1 ) NOT NULL ,
			`r_settings_database` TINYINT( 1 ) NOT NULL ,
			`r_activate` TINYINT( 1 ) NOT NULL ,
			`r_deactivate` TINYINT( 1 ) NOT NULL ,
			`r_delete` TINYINT( 1 ) NOT NULL ,
			`r_edit` TINYINT( 1 ) NOT NULL ,
			`r_spam` TINYINT( 1 ) NOT NULL ,
			`r_edit_smilies` TINYINT( 1 ) NOT NULL ,
			`r_banlists` TINYINT( 1 ) NOT NULL ,
			`r_telemetry` TINYINT( 1 ) NOT NULL ,
			`logged_in` INT( 11 ) NOT NULL DEFAULT '0',
			`logged_out` TINYINT( 1 ) NOT NULL DEFAULT '1',
			`np_key` VARCHAR( 16 ) NOT NULL DEFAULT '',
			`np_expiration` VARCHAR( 255 ) NOT NULL DEFAULT ''
			) DEFAULT CHARSET=utf8mb4 ;";

		$sql[5] = "INSERT INTO ".$db_prefix."user (			
			`user_name` ,
			`user_password` ,
			`user_key` ,
			`user_ip` ,
			`user_agent` ,
			`user_email` ,
			`user_is_active` ,
			`user_level` ,
			`r_settings` ,
			`r_settings_database` ,
			`r_activate` ,
			`r_deactivate` ,
			`r_delete` ,
			`r_edit`,
			`r_spam`,
			`r_edit_smilies` ,
			`r_banlists` ,
			`r_telemetry`			
			) VALUES (			
			'".$admin_username."',
			'".$admin_password."',
			'0',
			'".$_SERVER['REMOTE_ADDR']."',
			'".$_SERVER['HTTP_USER_AGENT']."',
			'".$admin_email."',
			'1',
			'0',
			'1',
			'1',
			'1',
			'1',
			'1',
			'1',
			'1',
			'1',
			'1',
			'1'			
			);";

		$sql[6] = "CREATE TABLE IF NOT EXISTS ".$db_prefix."smilies (
			`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
			`path` VARCHAR( 255 ) NOT NULL ,
			`replacement` VARCHAR( 255 ) NOT NULL ,
			`height` TINYINT( 4 ) NOT NULL ,
			`width` TINYINT( 4 ) NOT NULL
			) DEFAULT CHARSET=utf8mb4 ;";

		$sql[7] = "INSERT INTO ".$db_prefix."smilies (
			`ID` ,
			`path` ,
			`replacement` ,
			`height` ,
			`width`
			) VALUES
			( NULL , 'smiley_smile.gif', ':smile:, :), :-)', '15', '15' ),
			( NULL , 'smiley_wink.gif', ':wink:, ;), ;-)', '15', '15' ),
			( NULL , 'smiley_lol.gif', ':lol:', '15', '15' ),
			( NULL , 'smiley_biggrin.gif', ':biggrin:, :D, :-D', '15', '15' ),
			( NULL , 'smiley_cool.gif', ':cool:, B), B-)', '15', '15' ),
			( NULL , 'smiley_fun.gif', ':fun:, ^^', '15', '15' ),
			( NULL , 'smiley_surprised.gif', ':surprised:, :O, :-O', '15', '15' ),
			( NULL , 'smiley_tongue.gif', ':tongue:, :P, :-P', '15', '15' ),
			( NULL , 'smiley_confused.gif', ':confused:, :-/', '15', '15' ),
			( NULL , 'smiley_eek.gif', ':eek:, 8O, 8-O', '15', '15' ),
			( NULL , 'smiley_doubt.gif', ':doubt:', '15', '15' ),
			( NULL , 'smiley_neutral.gif', ':neutral:, :|, :-|', '15', '15' ),
			( NULL , 'smiley_redface.gif', ':redface:', '15', '15' ),
			( NULL , 'smiley_rolleyes.gif', ':rolleyes:', '15', '15' ),
			( NULL , 'smiley_silenced.gif', ':silenced:', '15', '15' ),
			( NULL , 'smiley_sad.gif', ':sad:, :(, :-(', '15', '15' ),
			( NULL , 'smiley_cry.gif', ':cry:, :\'(, :\'-(', '15', '15' ),
			( NULL , 'smiley_doh.gif', ':doh:', '15', '15' ),
			( NULL , 'smiley_angry.gif', ':angry:', '15', '15' ),
			( NULL , 'smiley_evil.gif', ':evil:', '15', '15' ),
			( NULL , 'icon_arrow.gif', ':arrow:', '15', '15' ),
			( NULL , 'icon_exclaim.gif', ':exclaim:', '15', '15' ),
			( NULL , 'icon_question.gif', ':question:', '15', '15' );";

		$sql[8] = "CREATE TABLE IF NOT EXISTS ".$db_prefix."banlist_ips (
			`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
			`banned_ip` VARBINARY( 40 ) NOT NULL ,
			`matches` INT( 11 ) NOT NULL DEFAULT 0,
			`timestamp` INT( 11 ) NOT NULL,
			UNIQUE KEY `uniq_banned_ip` (`banned_ip`)
			) DEFAULT CHARSET=utf8mb4 ;";

		$sql[9] = "CREATE TABLE IF NOT EXISTS ".$db_prefix."banlist_emails (
			`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
			`banned_email` VARCHAR( 255 ) NOT NULL ,
			`matches` INT( 11 ) NOT NULL DEFAULT 0,
			`timestamp` INT( 11 ) NOT NULL,
			UNIQUE KEY `uniq_banned_email` (`banned_email`)
			) DEFAULT CHARSET=utf8mb4 ;";

		$sql[10] = "CREATE TABLE IF NOT EXISTS ".$db_prefix."banlist_domains (
			`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
			`banned_domain` VARCHAR( 255 ) NOT NULL ,
			`matches` INT( 11 ) NOT NULL ,
			`timestamp` INT( 11 ) NOT NULL DEFAULT 0,
			UNIQUE KEY `uniq_banned_domain` (`banned_domain`)
			) DEFAULT CHARSET=utf8mb4 ;";

		$sql[11] = "CREATE TABLE IF NOT EXISTS ".$db_prefix."spam_log (
			`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
			`ip` VARBINARY( 40 ) NOT NULL ,
			`name` VARCHAR( 255 ) NOT NULL ,
			`email` VARCHAR( 255 ) NOT NULL ,
			`user_agent` VARCHAR( 255 ) NOT NULL ,
			`sneaked` INT( 1 ) NOT NULL DEFAULT '0' ,
			`http_referer` VARCHAR( 255 ) NOT NULL ,
			`hp` VARCHAR( 255 ) NOT NULL ,
			`message` MEDIUMTEXT NOT NULL ,
			`type` INT( 2 ) NOT NULL ,
			`site` VARCHAR( 255 ) NOT NULL ,
			`timestamp` INT( 11 ) NOT NULL
			) DEFAULT CHARSET=utf8mb4 ;";

		$sql[12] = "CREATE TABLE IF NOT EXISTS ".$db_prefix."spam (
			`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
			`name` VARCHAR( 255 ) NOT NULL ,
			`ip` VARBINARY( 40 ) NOT NULL ,
			`email` VARCHAR( 255 ) NOT NULL ,
			`city` VARCHAR( 255 ) NOT NULL ,			
			`hp` VARCHAR( 255 ) NOT NULL ,
			`social_mastodon` VARCHAR( 255 ) NOT NULL,
			`social_bluesky` VARCHAR( 255 ) NOT NULL,
			`social_w` VARCHAR( 255 ) NOT NULL,
			`social_eu_voice` VARCHAR( 255 ) NOT NULL,
			`social_eu_video` VARCHAR( 255 ) NOT NULL,
			`social_monnett` VARCHAR( 255 ) NOT NULL,
			`message` MEDIUMTEXT NOT NULL ,
			`comment` MEDIUMTEXT NOT NULL ,
			`user_notification` TINYINT( 1 ) NOT NULL ,
			`user_show_email` TINYINT( 1 ) NOT NULL ,
			`captcha` VARCHAR( 9 ) NOT NULL ,
			`sent_captcha` VARCHAR( 9 ) NOT NULL ,
			`counter` TINYINT( 1 ) NOT NULL ,
			`user_agent` VARCHAR( 255 ) NOT NULL ,
			`sneaked` TINYINT( 1 ) NOT NULL DEFAULT '0',
			`type` TINYINT( 1 ) NOT NULL DEFAULT '0',
			`timestamp` INT( 11 ) NOT NULL
			) DEFAULT CHARSET=utf8mb4 ;";

		$sql[13] = "CREATE TABLE IF NOT EXISTS ".$db_prefix."sys_log (
			`ID` INT (11) NOT NULL AUTO_INCREMENT,
			`type` INT (4) NOT NULL,
			`name` VARCHAR (255) NOT NULL,
			`email` VARCHAR (255) NOT NULL,
			`text` VARCHAR (5000) NOT NULL,
			`user` VARCHAR (255) NOT NULL,
			`user_new` VARCHAR (255) NOT NULL,
			`user_edit` VARCHAR (255) NOT NULL,
			`ip` VARBINARY (40) NOT NULL,
			`timestamp` INT (11) NOT NULL,
			PRIMARY KEY (`ID`)
			) DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;";

		// establish sql connection
		$mysqli = new mysqli(
			$db_hostname,
			$db_username,
			$db_password,
			$db_dbname
		);

		if ($mysqli->connect_error) {
			die($lang['error_3_step2'] . "&nbsp;:&nbsp;" . $mysqli->connect_error);
		}

		$mysqli->set_charset('utf8');

		$success = 0;
		$errors  = [];

		// execute sql
		foreach ($sql as $statement) {
			if ($mysqli->query($statement) === true) {
				$success++;
			} else {
				$errors[] = [
					'sql'   => $statement,
					'errno' => $mysqli->errno,
					'error' => $mysqli->error
				];
			}
		}
	}
?>
