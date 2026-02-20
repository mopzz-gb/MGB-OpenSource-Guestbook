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

	===========
	upgrade.php
	===========
	*/

	// Show all errors but no warnings
	ini_set('display_errors', '1');
	error_reporting(E_ALL & ~E_NOTICE);

	// set timezone
	if(function_exists("date_default_timezone_set")) {
		date_default_timezone_set('Europe/Berlin');
	}

	// check if MGB has been already installed
	if(file_exists("../includes/config.inc.php")) {
		require ("../includes/config.inc.php");
		if(!isset($mgb_installation_complete)) {
			echo "It seems as if you haven't installed the MGB yet. You can do it <a href=\"install.php\">here</a>.<br>br>If MGB is already installed, try copy your 'config.inc.php' from root directory into 'includes/config.inc.php'.";
			die();
		}
	} elseif(file_exists("../config.inc.php")) {
		if(copy("../config.inc.php", "../includes/config.inc.php")) {
			require ("../includes/config.inc.php");
			if(!isset($mgb_installation_complete)) {
				echo "It seems as if you haven't installed the MGB yet. You can do it <a href=\"install.php\">here</a>.";
				die();
			}
		} else {
			echo "Due to changes of the directory structure since <b>MGB 0.6.4</b> it is necessary that ''config.inc.php'' lies in the folder ''[root]/includes''.<br /><br />upgrade.php tried to copy it for you in that directory, but that failed. Please copy the file manually and start upgrade.php again.";
		}
	} else {
		echo "The config file could not be found. If you haven't installed the MGB yet, you can do it <a href=\"install.php\">here</a>.";
		die();
	}

	if((isset($_POST['upgrade']) AND $_POST['upgrade'] == 1) OR (isset($_POST['ignore']) AND $_POST['ignore'] == 1)) {
		echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\n";
		echo "\t\t\"http://www.w3.org/TR/html4/loose.dtd\">\n";
		echo "<html>\n";
		echo "\t<head>\n";
		echo "\t\t<title>MGB OpenSource Guestbook - upgrade.php</title>\n";
		echo "\t</head>\n";
		echo "\t<body>\n";

		// load includes
		require_once ("../includes/config.inc.php");
		require_once ("includes/config.inc.php");		
		require_once ('../includes/db.php');
		require_once ("includes/functions.inc.php");
		require_once ("includes/load_settings.inc.php");
		
		// do a full backup
		mgb_backup_database($mysqli, $db['prefix'], $settings['version'], $db['hostname'], $db['dbname'], 2);

		// update database
		if(!isset($success)) { $success = 0; }

		if((isset($_POST['update_necessary']) AND $_POST['update_necessary'] == 1) OR (isset($_POST['ignore']) AND $_POST['ignore'] == 1)) {
				
			// define variables
			$success = 0;
			$count = 0;
			
			// first do some really old stuff if necessary
			if (version_compare($settings['version'], '0.6.4', '<')) {
				include "upgrade/other/0.6.4.php";
			}
			
			// now do the majority of the work
			include('upgrade_runner.php');

			// do possible INSERTS			
			include('upgrade/other/inserts.php');
						
			// and last but not least migrate old databases to newer ones if necessary			
			include('migrate_text.php');

			if($count != 0) {
				if($count === $success) {
					echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: green;\"><br>No Errors! Your Database has been updated successfully! :) Now you can delete the folder <i>install</i> and return to <a href='../index.php'>index.php</a>.</span>\n";
				} else {
					echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: darkblue;\"><br>Some errors have occurred, but that does not necessarily mean that the update did not run smoothly.<br><br>Open the guestbook and check that everything is OK. If you still encounter problems, please report them in the forum: <a href='https://forum.m-gb.org/'>forum.m-gb.org</a>.<br /></span>\n";
				}
				mgb_trigger_sys_log($mysqli, 5001, '', '', '', '', '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog (database upgrade successfull)
			} else {
				echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: maroon;\">No changes were applied.<br /></span>\n";
			}
		}
		echo "\t</body>\n";
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
		echo "\t<head>\n";
		echo "\t\t<title>MGB OpenSource Guestbook - upgrade.php</title>\n";
		echo "\t</head>\n";
		echo "\t<body>\n";
		echo "\t\t<form action=\"upgrade.php\" method=\"post\">\n";
		echo "\t\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold\">".$greeting.", Dave.</span>\n";
		echo "\t\t\t<br><br>\n";

		// load includes
		require ("../includes/config.inc.php");
		require ("includes/config.inc.php");
		require ("includes/functions.inc.php");
		require ("includes/load_settings.inc.php");

		echo "\t\t\t<table summary=\"upgrade\">\n";
		echo "\t\t\t\t<tr>\n";
		echo "\t\t\t\t\t<td><span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px;\">New version:</span></td>\n";
		if($settings['version'] == "0.6.4") {
			echo "\t\t\t\t\t<td><span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">".$mgb_version."</span></td>\n";
		} else {
			echo "\t\t\t\t\t<td><span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">".MGB_VERSION."</span></td>\n";
		}
		echo "\t\t\t\t</tr>\n";
		echo "\t\t\t\t<tr>\n";
		echo "\t\t\t\t\t<td><span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px;\">Installed version:</span></td>\n";
		echo "\t\t\t\t\t<td><span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">".$settings['version']."</span></td>\n";
		echo "\t\t\t\t</tr>\n";
		echo "\t\t\t</table>\n";
		echo "\t\t\t<br>\n";

		switch(version_compare($settings['version'], MGB_VERSION)) {
			case -1: $update_necessary = 1;
				break;
			case 0: $update_necessary = 0;
				break;
			case 1: $update_necessary = 0;
				break;
		}

		// Override version compare if 0.6.4 is installed. There was a mistake in writing data into config.inc.php.
		// A constant with the version number was added. That was not good, because it overrides the new version number
		// of upgrade.php.
		if($settings['version'] == "0.6.4") {
			$update_necessary = 1;
		}

		if($update_necessary == 1) {
			echo "\t\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: red;\">Your database needs to be updated. Are you sure you want to update to the newest Version?</span><br><br>\n";
			echo "\t\t\t<input type=\"hidden\" name=\"upgrade\" value=\"1\">\n";
			echo "\t\t\t<input type=\"hidden\" name=\"update_necessary\" value=\"1\">\n";
			echo "\t\t\t<input type=\"checkbox\" name=\"update_version\" value=\"1\" checked><span style='font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: darkblue;'>&nbsp;Update version number</span><br><br>";
			echo "\t\t\t<input type=\"submit\" class=\"button\" name=\"confirm\" value=\"Yes, HAL. I'm sure.\">\n";
		} else {
			echo "\t\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: green;\">Newest version is already installed. An update is not necessary. :)</span><br><br>\n";
			echo "\t\t\t<input type=\"checkbox\" name=\"ignore\" value=\"1\"><span style='font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: darkblue;'>&nbsp;I know what i do, so ignore it and try to upgrade anyway.</span><br><br>\n";
			echo "\t\t\t<input type=\"submit\" class=\"button\" name=\"confirm\" value=\"Do it!\">\n";
		}
		echo "\t\t</form>\n";
		echo "\t</body>\n";
		echo "</html>\n";
	}
?>
