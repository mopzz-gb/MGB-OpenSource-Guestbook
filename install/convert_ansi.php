<?php
	/*
	MGB 0.7.x - OpenSource PHP and MySql Guestbook
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
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

	================
	convert_ansi.php
	================
	*/

	// Show all errors but no warnings
	error_reporting(E_ALL & ~E_NOTICE);

	// set timezone
	if(function_exists("date_default_timezone_set")) {
		date_default_timezone_set('Europe/Berlin');
	}

	// check if MGB has been already installed
	if(file_exists("../includes/config.inc.php")) {
		require("../includes/config.inc.php");
		if(!isset($mgb_installation_complete)) {
			echo "It seems as if you haven't installed the MGB yet. You can do that <a href=\"install.php\">here</a>.";
			die();
		}
	} else {
		echo "The config file could not be found. If you haven't installed the MGB yet, you can do that <a href=\"install.php\">here</a>.";
		die();
	}

	// load includes
	require("../includes/config.inc.php");
	require("../includes/functions.inc.php");
	require("../includes/load_settings.inc.php");

	if(empty($_POST['convert'])) { $_POST['convert'] = 0; }
	if($_POST['convert'] == 1) {
		// Form was sent, conversion confirmed
		echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\n";
		echo "\t\t\"http://www.w3.org/TR/html4/loose.dtd\">\n";
		echo "<html>\n";
		echo "<head>\n";
		echo "<title>MGB OpenSource Guestbook - convert_ansi.php</title>\n";
		echo "<meta content='text/html; charset=utf-8' http-equiv='content-type'>";
		echo "</head>\n";
		echo "<body>\n";

		// create a backup of all entries
		echo "<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold\">Creating a backup of all entries...</span>\n";

		$sql_dump = "-- MGB OpenSource Guestbook SQL Dump\n";
		$sql_dump.= "-- Version: ".$settings['version']."\n";
		$sql_dump.= "-- https://www.m-gb.org/\n";
		$sql_dump.= "--\n";
		$sql_dump.= "-- Host: ".$db['hostname']."\n";
		$sql_dump.= "-- Database: ".$db['dbname']."\n";
		$sql_dump.= "-- Tables: entries\n";
		$sql_dump.= "-- Created by convert_ansi.php\n";
		$sql_dump.= "-- ---------------------------------------;\n\n";

		// get structure of sql table
		$sql_dump.= mgb_get_sql_structure($db['prefix'], "entries", 1); // table structure
		$sql_dump.= mgb_get_sql_structure($db['prefix'], "entries", 2); // table content

		$sql_dump.= "-- END OF FILE --";

		$backup_filename = "-".$db['prefix']."entries.sql";

		if(file_exists("../save") AND is_dir("../save") AND is_writable("../save")) {
			$timestamp = time();
			if(mgb_write_export_file("../save/".$timestamp.$backup_filename, $sql_dump) == TRUE) {
				echo "&nbsp;<span style='font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: green;'>OK!</span><br><br>\n";
			} else {
				echo "&nbsp;<span style='font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: red;'>ERROR!</span>\n";
				echo "&nbsp;<span style='font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;'>The backup could not be written.</span>";
				die();
			}
		} else {
			echo "&nbsp;<span style='font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: red;'>ERROR!</span>";
			echo "&nbsp;<span style='font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;'>Maybe the 'save' directory is not writable or doesn't exist.</span>\n";
			die();
		}

		echo "<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold\">Backup successfull created. Now converting all Umlauts to utf-8...<br><br></span>\n";

		// function for converting strings to utf-8
		function convert($content) {
			if(!empty($content)) {
				$content = preg_replace('/Ã¤/', 'ä', $content);
				$content = preg_replace('/Ã„/', 'Ä', $content);
				$content = preg_replace('/Ã¶/', 'ö', $content);
				$content = preg_replace('/Ã–/', 'Ö', $content);
				$content = preg_replace('/Ã¼/', 'ü', $content);
				$content = preg_replace('/Ãœ/', 'Ü', $content);
				$content = preg_replace('/ÃŸ/', 'ß', $content);
			}
			return $content;
		}

		// connect to database
		$link = mysqli_connect($db['hostname'], $db['username'], $db['password'], $db['dbname']) or die ("<span style='font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; color: darkblue;'>Line 114: Cannot connect to database. See SQL ERROR for details.<br><br><b>SQL QUERY:</b> ".$sql."<br><br><b>SQL ERROR</b>: ".mysqli_connect_errno($link)." : ".mysqli_connect_error($link)."</span>");
		mysqli_set_charset($link, 'utf8');

		// get total number of entries
		$link_count = "SELECT COUNT(ID) FROM ".$db['prefix']."entries";
		$results = mysqli_fetch_assoc(@mysqli_query($link, $link_count)) or die ("<span style='font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; color: darkblue;'>Line 119: Error in sql query. See SQL ERROR for details.<br><br><b>SQL QUERY:</b> ".$sql."<br><br><b>SQL ERROR:</b> ".mysqli_errno($link)." : ".mysqli_error($link)."</span>");
		$total = $results['COUNT(ID)'];

		// load possible affected settings
		$sql = "SELECT
			title,
			h_author,
			h_domain,
			h_keywords,
			h_description,
			admin_name,
			admin_email,
			admin_gbemail,
			sendmail_admin_text,
			sendmail_user_text,
			sendmail_user_text_moderated,
			sendmail_user_notification_text,
			sendmail_comment_text,
			sendmail_contactmail_text,
			sendmail_contactmail_text_copy
			FROM ".$db['prefix']."settings";

		$result_settings = @mysqli_query($link, $sql) or die ("<span style='font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; color: darkblue;'>Line 141: Error in sql query. See SQL ERROR for details.<br><br><b>SQL QUERY:</b> ".$sql."<br><br><b>SQL ERROR:</b> ".mysqli_errno($link)." : ".mysqli_error($link)."</span>");

		// let's put them in an array
		for($i = 0; $i < @mysqli_num_rows($result_settings); $i++) {
			$settings = @mysqli_fetch_array($result_settings, MYSQLI_ASSOC);
		}

		$sql_settings = "UPDATE ".$db['prefix']."settings SET
			`title` = '".convert($settings['title'])."',
			`h_author` = '".convert($settings['h_author'])."',
			`h_domain` = '".convert($settings['h_domain'])."',
			`h_keywords` = '".convert($settings['h_keywords'])."',
			`h_description` = '".convert($settings['h_description'])."',
			`admin_name` = '".convert($settings['admin_name'])."',
			`admin_email` = '".convert($settings['admin_email'])."',
			`admin_gbemail` = '".convert($settings['admin_gbemail'])."',
			`sendmail_admin_text` = '".convert($settings['sendmail_admin_text'])."',
			`sendmail_user_text` = '".convert($settings['sendmail_user_text'])."',
			`sendmail_user_text_moderated` = '".convert($settings['sendmail_user_text_moderated'])."',
			`sendmail_user_notification_text` = '".convert($settings['sendmail_user_notification_text'])."',
			`sendmail_comment_text` = '".convert($settings['sendmail_comment_text'])."',
			`sendmail_contactmail_text` = '".convert($settings['sendmail_contactmail_text'])."',
			`sendmail_contactmail_text_copy` = '".convert($settings['sendmail_contactmail_text_copy'])."'";

		if(@mysqli_query($link, $sql_settings) or die ("<span style='font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; color: darkblue;'>Line 165: Error in sql query. See SQL ERROR for details.<br><br><b>SQL QUERY:</b> ".$sql."<br><br><b>SQL ERROR:</b> ".mysqli_errno($link)." : ".mysqli_error($link)."</span>" )) {
			echo "<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold\">Settings:</span>&nbsp;<span style='font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: green;'>OK!</span><br>\n";
		}

		// load guestbook entries
		$sql = "SELECT ID, name, city, email, hp, message, comment FROM ".$db['prefix']."entries ORDER BY timestamp DESC LIMIT $total";
		$result = @mysqli_query($link, $sql) or die ("<span style='font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; color: darkblue;'>Line 171: Error in sql query. See SQL ERROR for details.<br><br><b>SQL QUERY:</b> ".$sql."<br><br><b>SQL ERROR:</b> ".mysqli_errno($link)." : ".mysqli_error($link)."</span>");

		// let's put them in an array
		for($i = 0; $i < @mysqli_num_rows($result); $i++) {
			$entry[$i] = @mysqli_fetch_array($result, MYSQLI_ASSOC);
		}

		echo "<span>\n";
		if($total > 0) {
			for($i = 0; $i < count($entry); $i++) {
				// save data to database
				$sql = "UPDATE ".$db['prefix']."entries SET
					`name` = '".convert($entry[$i]['name'])."',
					`city` = '".convert($entry[$i]['city'])."',
					`email` = '".convert($entry[$i]['email'])."',
					`hp` = '".convert($entry[$i]['hp'])."',
					`message` = '".convert($entry[$i]['message'])."',
					`comment` = '".convert($entry[$i]['comment'])."'
					WHERE ID=".$entry[$i]['ID']." LIMIT 1";

				if(@mysqli_query($link, $sql) or die ("<span style='font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; color: darkblue;'>Line 171: Error in sql query. See SQL ERROR for details.<br><br><b>SQL QUERY:</b> ".$sql."<br><br><b>SQL ERROR:</b> ".mysqli_errno($link)." : ".mysqli_error($link)."</span>")) {
					$convert_count = $i + 1;
					// echo "<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold\">Entry ".$convert_count." message: ".$entry[$i]['message']."</span><br>\n";
					echo "<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold\">Entry ".$convert_count.":</span>&nbsp;<span style='font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: green;'>OK!</span><br>\n";
				}
			}
		}
		echo "<br><span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold\">All entries &amp; settings have been converted!</span><br>\n";
		echo "</span>\n";
	} else {
		if(date('H') < "12") {
			$greeting = "Good Morning";
		}

		if(date('H') >= "12") {
			$greeting = "Hello";
		}

		if(date('H') > "18") {
			$greeting ="Good Evening";
		}

		echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\n";
		echo "\t\t\"http://www.w3.org/TR/html4/loose.dtd\">\n";
		echo "<html>\n";
		echo "<head>\n";
		echo "<title>MGB OpenSource Guestbook - convert_ansi.php</title>\n";
		echo "<meta content='text/html; charset=utf-8' http-equiv='content-type'>";
		echo "</head>\n";
		echo "<body>\n";
		echo "<form action=\"convert_ansi.php\" method=\"post\">\n";
		echo "<input type=\"hidden\" name=\"convert\" value=\"1\">\n";
		echo "<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold\">".$greeting.", Dave.<br /><br />Are you really sure you want to convert all entries from ansi-code to utf-8?<br>A backup of all entries will be created and stored into 'save' directory before proceeding.";
		echo "<br /><br />\n";
		echo "<input type=\"submit\" class=\"button\" name=\"confirm\" value=\"Yes, HAL. I'm sure.\">\n";
		echo "</form>\n";
		echo "</body>\n";
		echo "</html>\n";
	}
?>
