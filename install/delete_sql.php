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

	==============
	delete_sql.php
	==============
	*/

	// Show all errors but no warnings
	error_reporting(E_ALL & ~E_NOTICE);

	// set timezone
	if(function_exists("date_default_timezone_set")) {
		date_default_timezone_set('Europe/Berlin');
	}

	// check if MGB has been already installed
	if(file_exists("../includes/config.inc.php")) {
		require ("../includes/config.inc.php");
		if(!isset($mgb_installation_complete)) {
			echo "It seems as if you haven't installed the MGB yet. You can do that <a href=\"install.php\">here</a>.";
			die();
		}
	} else {
		echo "The config file could not be found. If you haven't installed the MGB yet, you can do that <a href=\"install.php\">here</a>.";
		die();
	}

	// load includes
	require ("../includes/config.inc.php");

	if(isset($_POST['delete']) AND $_POST['delete'] == 1) {
		// Form was sent, deletion confirmed
		echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\n";
		echo "\t\t\"http://www.w3.org/TR/html4/loose.dtd\">\n";
		echo "<html>\n";
		echo "<head>\n";
		echo "<title>MGB OpenSource Guestbook - delete_sql.php</title>\n";
		echo "</head>\n";
		echo "<body>\n";
		echo "<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold\">Confirming deletion of all MGB OpenSource Guestbook tables. :(<br /><br /></span>\n";

		$sql = array();

		$sql[1] = "DROP TABLE ".$db['prefix']."banlist_ips";
		$sqldescription[1] = "- deleting table ".$db['prefix']."banlist_ips...";

		$sql[2] = "DROP TABLE ".$db['prefix']."banlist_emails";
		$sqldescription[2] = "- deleting table ".$db['prefix']."banlist_emails...";

		$sql[3] = "DROP TABLE ".$db['prefix']."banlist_domains";
		$sqldescription[3] = "- deleting table ".$db['prefix']."banlist_domains...";

		$sql[4] = "DROP TABLE ".$db['prefix']."captcha";
		$sqldescription[4] = "- deleting table ".$db['prefix']."captcha...";

		$sql[5] = "DROP TABLE ".$db['prefix']."captcha_math";
		$sqldescription[5] = "- deleting table ".$db['prefix']."captcha_math...";

		$sql[6] = "DROP TABLE ".$db['prefix']."entries";
		$sqldescription[6] = "- deleting table ".$db['prefix']."entries...";

		$sql[7] = "DROP TABLE ".$db['prefix']."lastip";
		$sqldescription[7] = "- deleting table ".$db['prefix']."lastip...";

		$sql[8] = "DROP TABLE ".$db['prefix']."mail_log";
		$sqldescription[8] = "- deleting table ".$db['prefix']."mail_log...";

		$sql[9] = "DROP TABLE ".$db['prefix']."settings";
		$sqldescription[9] = "- deleting table ".$db['prefix']."settings...";

		$sql[10] = "DROP TABLE ".$db['prefix']."spam";
		$sqldescription[10] = "- deleting table ".$db['prefix']."spam...";

		$sql[11] = "DROP TABLE ".$db['prefix']."spam_log";
		$sqldescription[11] = "- deleting table ".$db['prefix']."spam_log...";

		$sql[12] = "DROP TABLE ".$db['prefix']."user";
		$sqldescription[12] = "- deleting table ".$db['prefix']."user...";

		$sql[13] = "DROP TABLE ".$db['prefix']."smilies";
		$sqldescription[13] = "- deleting table ".$db['prefix']."smilies...";

		$sql[14] = "DROP TABLE ".$db['prefix']."sys_log";
		$sqldescription[14] = "- deleting table ".$db['prefix']."sys_log...";

		$to = count($sql);

		for($i = 1; $i <= $to; $i++) {
			$sqlcommand = $sql[$i];

			$link = mysqli_connect($db['hostname'], $db['username'], $db['password'], $db['dbname']) or die ("(delete_sql.php, Line 98) Error: ".mysqli_error($link));

			if(mysqli_query($link, $sqlcommand) == TRUE) {
				echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">".$sqldescription[$i]."</span>\n
					\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: green;\">&nbsp;OK!<br /></span>\n";
					$success++;
					$count++;
			} else {
				echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">".$sqldescription[$i]."</span>\n
					\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: red;\">ERROR!<br /></span>\n
					\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">Errormessage: ".mysqli_error($link)."<br /><br /></span>\n";
					$count++;
			}
		}

		if($success == $count) {
			echo "\t\t<br /><span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: green;\">No Errors!</span><br /><br /><span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold\">Note: ''includes/config.inc.php'' already exists. You have to delete it manually before a new installation.<br /><br />Good bye, Dave ...</span>\n";
		} else {
			echo "\t\t<br /><span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: maroon;\">Some Errors have occured. Not all tables could be deleted properly!<br /></span>\n";
		}
		echo "</body>\n";
		echo "</html>\n";
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
		echo "<title>MGB OpenSource Guestbook - delete_sql.php</title>\n";
		echo "</head>\n";
		echo "<body>\n";
		echo "<form action=\"delete_sql.php\" method=\"post\">\n";
		echo "<input type=\"hidden\" name=\"delete\" value=\"1\">\n";
		echo "<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold\">".$greeting.", Dave.<br /><br />Are you really sure you want to delete all sql tables of the MGB OpenSource Guestbook?<br /><br /></span><span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: red\">WARNING: ALL USERS, ENTRIES AND SETTINGS WILL BE LOST FOREVER!</span>\n";
		echo "<br /><br />\n";
		echo "<input type=\"submit\" class=\"button\" name=\"confirm\" value=\"Yes, HAL. I'm sure.\">\n";
		echo "</form>\n";
		echo "</body>\n";
		echo "</html>\n";
	}
?>
