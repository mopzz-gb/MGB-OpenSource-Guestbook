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

	================
	migrate_text.php
	================
	*/
	
	// upgradescript for older latin9 text and so on
	
	// entries
	echo "\t\t<span style='
		font-family: verdana, arial, helvetica, sans-serif;
		font-size: 12px;
		font-weight: bold;'>Migrating entries table...</span>\n";
	$result = $mysqli->query("SELECT id, name, city, message, comment FROM ".$db['prefix']."entries");
	while ($row = $result->fetch_assoc()) {

		$clean_name = mgb_migrate_text($row['name']);
		$clean_city = mgb_migrate_text($row['city']);
		$clean_message = mgb_migrate_text($row['message']);
		$clean_comment = mgb_migrate_text($row['comment']);
		
		$stmt = $mysqli->prepare(
			"UPDATE ".$db['prefix']."entries SET name = ?, city = ?, message = ?, comment = ? WHERE id = ?"
		);
		$stmt->bind_param("ssssi", $clean_name, $clean_city, $clean_message, $clean_comment, $row['id']);
		if($stmt->execute() === true) {
			$migrate_entries = true;
		} else {
			$migrate_entries = false;
		}
	}
	
	if($migrate_entries === true) {
		echo "\t\t<span style='
			font-family: verdana, arial, helvetica, sans-serif;
			font-size: 12px;
			font-weight: bold;
			color: green;'>OK!<br><br></span>\n";
		$success++;
	} else {
		echo "\t\t<span style='
			font-family: verdana, arial, helvetica, sans-serif;
			font-size: 12px;
			font-weight: bold;
			color: red;'>ERROR!<br><br></span>\n";
	}		
	$count++;
	
	// settings
	echo "\t\t<span style='
		font-family: verdana, arial, helvetica, sans-serif;
		font-size: 12px;
		font-weight: bold;'>Migrating settings table...</span>\n";
	$result = $mysqli->query("SELECT
		title,
		h_author,
		h_domain,
		gb_path,
		h_keywords,
		h_description,
		timezone,
		admin_name,
		sendmail_admin_text,
		sendmail_user_text,
		sendmail_user_text_moderated,
		sendmail_user_notification_text,
		sendmail_comment_text,
		sendmail_contactmail_text,
		sendmail_contactmail_text_copy,
		badwords,
		recaptcha_pub_key,
		recaptcha_private_key,
		announcement_message,
		direct_access_text,
		search_engines,
		sfs_api_key
		FROM ".$db['prefix']."settings");
	while ($row = $result->fetch_assoc()) {
		
		$clean_title = mgb_migrate_text($row['title']);
		$clean_h_author = mgb_migrate_text($row['h_author']);
		$clean_h_domain = mgb_migrate_text($row['h_domain']);
		$clean_gb_path = mgb_migrate_text($row['gb_path']);
		$clean_h_keywords = mgb_migrate_text($row['h_keywords']);
		$clean_h_description = mgb_migrate_text($row['h_description']);
		$clean_timezone = mgb_migrate_text($row['timezone']);
		$clean_admin_name = mgb_migrate_text($row['admin_name']);
		$clean_sendmail_admin_text = mgb_migrate_text($row['sendmail_admin_text']);
		$clean_sendmail_user_text = mgb_migrate_text($row['sendmail_user_text']);
		$clean_sendmail_user_text_moderated = mgb_migrate_text($row['sendmail_user_text_moderated']);
		$clean_sendmail_user_notification_text = mgb_migrate_text($row['sendmail_user_notification_text']);
		$clean_sendmail_comment_text = mgb_migrate_text($row['sendmail_comment_text']);
		$clean_contactmail_text = mgb_migrate_text($row['sendmail_contactmail_text']);
		$clean_contactmail_text_copy = mgb_migrate_text($row['sendmail_contactmail_text_copy']);
		$clean_badwords = mgb_migrate_text($row['badwords']);
		$clean_recaptcha_pub_key = mgb_migrate_text($row['recaptcha_pub_key']);
		$clean_recaptcha_private_key = mgb_migrate_text($row['recaptcha_private_key']);
		$clean_announcement_message = mgb_migrate_text($row['announcement_message']);
		$clean_direct_access_text = mgb_migrate_text($row['direct_access_text']);
		$clean_search_engines = mgb_migrate_text($row['search_engines']);
		$clean_sfs_api_key = mgb_migrate_text($row['sfs_api_key']);
				
		$stmt = $mysqli->prepare(
			"UPDATE ".$db['prefix']."settings SET
				title = ?,
				h_author = ?,
				h_domain = ?,
				gb_path = ?,
				h_keywords = ?,
				h_description = ?,
				timezone = ?,
				admin_name = ?,
				sendmail_admin_text = ?,
				sendmail_user_text = ?,
				sendmail_user_text_moderated = ?,
				sendmail_user_notification_text = ?,
				sendmail_comment_text = ?,
				sendmail_contactmail_text = ?,
				sendmail_contactmail_text_copy = ?,
				badwords = ?,
				recaptcha_pub_key = ?,
				recaptcha_private_key = ?,
				announcement_message = ?,
				direct_access_text = ?,
				search_engines = ?,
				sfs_api_key = ?"
		);
		$stmt->bind_param("ssssssssssssssssssssss",
			$clean_title,
			$clean_h_author,
			$clean_h_domain,
			$clean_gb_path,
			$clean_h_keywords,
			$clean_h_description,
			$clean_timezone,
			$clean_admin_name,
			$clean_sendmail_admin_text,
			$clean_sendmail_user_text,
			$clean_sendmail_user_text_moderated,
			$clean_sendmail_user_notification_text,
			$clean_sendmail_comment_text,
			$clean_contactmail_text,
			$clean_contactmail_text_copy,
			$clean_badwords,
			$clean_recaptcha_pub_key,
			$clean_recaptcha_private_key,
			$clean_announcement_message,
			$clean_direct_access_text,
			$clean_search_engines,
			$clean_sfs_api_key
		);
		
		if($stmt->execute() === true) {
			$migrate_settings = true;
		} else {
			$migrate_settings = false;
		}
	}
	
	if($migrate_settings === true) {
		echo "\t\t<span style='
			font-family: verdana, arial, helvetica, sans-serif;
			font-size: 12px;
			font-weight: bold;
			color: green;'>OK!<br><br></span>\n";
		$success++;
	} else {
		echo "\t\t<span style='
			font-family: verdana, arial, helvetica, sans-serif;
			font-size: 12px;
			font-weight: bold;
			color: red;'>ERROR!<br><br></span>\n";
	}		
	$count++;
	
	// user
	echo "\t\t<span style='
		font-family: verdana, arial, helvetica, sans-serif;
		font-size: 12px;
		font-weight: bold;'>Migrating user table...</span>\n";
	$result = $mysqli->query("SELECT user_name FROM ".$db['prefix']."user");
	while ($row = $result->fetch_assoc()) {

		$clean_user_name = mgb_migrate_text($row['user_name']);
		
		$stmt = $mysqli->prepare(
			"UPDATE ".$db['prefix']."user SET user_name = ? WHERE id = ?"
		);
		$stmt->bind_param("si", $clean_user_name, $row['id']);
		
		if($stmt->execute() === true) {
			$migrate_users = true;
		} else {
			$migrate_users = false;
		}				
	}
	
	if($migrate_users === true) {
		echo "\t\t<span style='
			font-family: verdana, arial, helvetica, sans-serif;
			font-size: 12px;
			font-weight: bold;
			color: green;'>OK!<br><br></span>\n";
		$success++;
	} else {
		echo "\t\t<span style='
			font-family: verdana, arial, helvetica, sans-serif;
			font-size: 12px;
			font-weight: bold;
			color: red;'>ERROR!<br><br></span>\n";
	}	
	$count++;
	
	// now convert old database tables to utf8 instead of latin9
	$tablename[1] = "entries";
	$sql[1] = "ALTER TABLE ".$db['prefix']."entries CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
	$sqldescription[1] = "Converting table entries to utf8...";
	
	$tablename[2] = "settings";
	$sql[2] = "ALTER TABLE ".$db['prefix']."settings CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
	$sqldescription[2] = "Converting table settings to utf8...";
	
	$tablename[3] = "user";
	$sql[3] = "ALTER TABLE ".$db['prefix']."user CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
	$sqldescription[3] = "Converting table user to utf8...";
	
	$tablename[4] = "smilies";
	$sql[4] = "ALTER TABLE ".$db['prefix']."smilies CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
	$sqldescription[4] = "Converting table smilies to utf8...";
	
	$tablename[5] = "banlist_ips";
	$sql[5] = "ALTER TABLE ".$db['prefix']."banlist_ips CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
	$sqldescription[5] = "Converting table banlist_ips to utf8...";
	
	$tablename[6] = "banlist_emails";
	$sql[6] = "ALTER TABLE ".$db['prefix']."banlist_emails CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
	$sqldescription[6] = "Converting table banlist_emails to utf8...";
	
	$tablename[7] = "banlist_domains";
	$sql[7] = "ALTER TABLE ".$db['prefix']."banlist_domains CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
	$sqldescription[7] = "Converting table banlist_domains to utf8...";
	
	$tablename[8] = "spam_log";
	$sql[8] = "ALTER TABLE ".$db['prefix']."spam_log CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
	$sqldescription[8] = "Converting table spam_log to utf8...";
	
	$tablename[9] = "spam";
	$sql[9] = "ALTER TABLE ".$db['prefix']."spam CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
	$sqldescription[9] = "Converting table spam to utf8...";
	
	$tablename[10] = "sys_log";
	$sql[10] = "ALTER TABLE ".$db['prefix']."sys_log CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
	$sqldescription[10] = "Converting table sys_log to utf8...";
	
	for($i = 1; $i <= count($sql); $i++) {
		echo "\t\t<span style='
			font-family: verdana, arial, helvetica, sans-serif;
			font-size: 12px;
			font-weight: bold;'>".$sqldescription[$i]."</span>\n";
		$sql_status = "SHOW TABLES LIKE '".$db['prefix'].$tablename[$i]."'";
		$result = $mysqli->query($sql_status);
		if($result == true) {
			$result = $mysqli->query($sql[$i]);
			if($result == true) {
				echo "\t\t<span style='
					font-family: verdana, arial, helvetica, sans-serif;
					font-size: 12px;
					font-weight: bold;
					color: green;'>OK!</span><br><br>\n";
				$success++;
			} else {
				echo "\t\t<span style='
				font-family: verdana, arial, helvetica, sans-serif;
				font-size: 12px;
				font-weight: bold;
				color: red;'>ERROR: ".$mysqli->error."</span><br><br>\n";
			}
		}
		$count++;
	}
	
	echo "\t\t<br><span style='
		font-family: verdana, arial, helvetica, sans-serif;
		font-size: 12px;
		font-weight: bold;'>".$success." of ".$count." queries are ok.</span><br><br>\n";
?>