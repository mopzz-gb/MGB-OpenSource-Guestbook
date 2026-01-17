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

	===========
	upgrade.php
	===========
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
		require ("../includes/config.inc.php");
		require ("includes/config.inc.php");
		require ("includes/functions.inc.php");
		require ("includes/load_settings.inc.php");

		// update database
		if(!isset($success)) { $success = 0; }

		if((isset($_POST['update_necessary']) AND $_POST['update_necessary'] == 1) OR (isset($_POST['ignore']) AND $_POST['ignore'] == 1)) {
			if(!isset($_POST['upgrade_information'])) {
				$upgrade_file = preg_replace("/\./", "", $settings['version']); //replace "." with "" so the upgrade files can be found and loaded by the script
				if(!file_exists("upgrade/".$upgrade_file.".php")) {
					if($upgrade_file == "07_beta_3" OR $upgrade_file == "07_beta_2" OR $upgrade_file == "07_beta_1") {
						include "upgrade/0695.php";
					} else {
						$missing_file = 1;
					}
				} else {
					include "upgrade/".$upgrade_file.".php";
				}
			} else {
				include "upgrade/".$_POST['upgrade_information'].".php";
			}

			// an error occured while loading update file. stop the script here.
			if(!empty($missing_file)) {
				echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: maroon;\">UPGRADE DATA <i>".$upgrade_file.".php</i> NOT FOUND! PLEASE VISIT <a href='https://forum.m-gb.org/'>forum.m-gb.org</a> FOR MORE INFORMATION.</span>\n";
				echo "\t</body>\n";
				echo "</html>\n";
				die();
			}
			
			// modify mysql error reporting
			// mysqli_report(MYSQLI_REPORT_ERROR);
			mysqli_report(MYSQLI_REPORT_OFF);

			// establish sql connection
			$link = mysqli_connect($db['hostname'], $db['username'], $db['password'], $db['dbname']) or die ("(upgrade.php, Line 98) Error: ".mysqli_error($link));
			mysqli_set_charset($link, 'utf8');

			for($i = 1; $i <= count($sql); $i++) {
				$sqlcommand = $sql[$i];
				// check if NO INSERTS is checked
				if(!empty($_POST['no_inserts'])) {
					if($sqlisinsert[$i] == 1) {
						echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">".$i.".&nbsp;".$sqldescription[$i]."</span>\n";
						echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: maroon;\">INSERT denied.</span>\n";
						echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: green;\">&nbsp;OK!<br><br></span>\n";
						$success++;
						$count++;
					} else {
						if(mysqli_query($link, $sqlcommand) == TRUE) {
							echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">".$i.".&nbsp;".$sqldescription[$i]."</span>\n";
							echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: green;\">&nbsp;OK!<br><br></span>\n";
							$success++;
							$count++;
						} else {
							echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">".$i.".&nbsp;".$sqldescription[$i]."</span>\n";
							if(mysqli_errno($link) == 1060) { // duplicate column
								echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: maroon;\">DUPLICATE COLUMN, no changes were applied.</span>\n";
								echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: green;\">&nbsp;OK!<br><br></span>\n";
								$success++;
								$count++;
							} elseif(mysqli_errno($link) == 1050) { // duplicate table
								echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: maroon;\">DUPLICATE TABLE, no changes were applied.</span>\n";
								echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: green;\">&nbsp;OK!<br><br></span>\n";
								$success++;
								$count++;
							} elseif(mysqli_errno($link) == 1062) { // duplicate entry
								echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: maroon;\">DUPLICATE ENTRY, no changes were applied.</span>\n";
								echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: green;\">&nbsp;OK!<br><br></span>\n";
								$success++;
								$count++;
							} else {
								echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: red;\">ERROR!<br></span>\n";
								echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">&nbsp;&nbsp;&nbsp;&nbsp;".mysqli_errno($link)." : ".mysqli_error($link)."</span><br><br>\n";
								$count++;
							}
						}
					}
				} else {
					if(mysqli_query($link, $sqlcommand) == TRUE) {
						echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">".$i.".&nbsp;".$sqldescription[$i]."</span>\n";
						echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: green;\">&nbsp;OK!<br><br></span>\n";
						$success++;
						$count++;
					} else {
						echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">".$i.".&nbsp;".$sqldescription[$i]."</span>\n";
						if(mysqli_errno($link) == 1060) { // duplicate column
							echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: maroon;\">DUPLICATE COLUMN, no changes were applied.</span>\n";
							echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: green;\">&nbsp;OK!<br><br></span>\n";
							$success++;
							$count++;
						} elseif(mysqli_errno($link) == 1050) { // duplicate table
							echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: maroon;\">DUPLICATE TABLE, no changes were applied.</span>\n";
							echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: green;\">&nbsp;OK!<br><br></span>\n";
							$success++;
							$count++;
						} elseif(mysqli_errno($link) == 1062) { // duplicate entry
							echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: maroon;\">DUPLICATE ENTRY, no changes were applied.</span>\n";
							echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: green;\">&nbsp;OK!<br><br></span>\n";
							$success++;
							$count++;
						} else {
							echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: red;\">ERROR!<br></span>\n";
							echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">&nbsp;&nbsp;&nbsp;&nbsp;".mysqli_errno($link)." : ".mysqli_error($link)."</span><br><br>\n";
							$count++;
						}
					}
				}
			}

			if($count != 0) {
				if($count == $success) {
					echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: green;\"><br>No Errors! Your Database has been updated successfully! :) Now you can delete the folder <i>install</i> and return to <a href='../index.php'>index.php</a>.</span>\n";
				} else {
					echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: darkblue;\"><br>Some Errors have occured. Try updating again by using an older update information or try searching the forums: <a href='https://forum.m-gb.org/'>forum.m-gb.org</a>.<br /></span>\n";
				}
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
			echo "\t\t\t<input type=\"checkbox\" name=\"ignore\" value=\"1\"><span style='font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: darkblue;'>&nbsp;I know what i do, so ignore it and try to upgrade anyway.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Use following upgrade information (Your previous version, before upgrading to the latest): </span>\n";
			echo "\t\t\t<select class=\"option\" name=\"upgrade_information\" size=\"1\">\n";
			echo "\t\t\t\t<option value='06'>0.6</option>\n";
			echo "\t\t\t\t<option value='061'>0.6.1</option>\n";
			echo "\t\t\t\t<option value='062'>0.6.2</option>\n";
			echo "\t\t\t\t<option value='063'>0.6.3</option>\n";
			echo "\t\t\t\t<option value='064'>0.6.4</option>\n";
			echo "\t\t\t\t<option value='065'>0.6.5</option>\n";
			echo "\t\t\t\t<option value='066'>0.6.6</option>\n";
			echo "\t\t\t\t<option value='067'>0.6.7 &amp; 0.6.7.1</option>\n";
			echo "\t\t\t\t<option value='068'>0.6.8</option>\n";
			echo "\t\t\t\t<option value='069'>0.6.9</option>\n";
			echo "\t\t\t\t<option value='0691'>0.6.9.1</option>\n";
			echo "\t\t\t\t<option value='0692'>0.6.9.2</option>\n";
			echo "\t\t\t\t<option value='0693'>0.6.9.3</option>\n";
			echo "\t\t\t\t<option value='0694'>0.6.9.4</option>\n";
			echo "\t\t\t\t<option value='0695'>0.6.9.5</option>\n";
			echo "\t\t\t\t<option value='07'>0.7</option>\n";
			echo "\t\t\t\t<option selected='selected' value='0701'>0.7.0.1 - 0.7.0.3</option>\n";
			echo "\t\t\t</select><br>\n";
			echo "\t\t\t<input type=\"checkbox\" name=\"no_inserts\" value=\"1\"><span style='font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: darkblue;'>&nbsp;No INSERTS (check this ONLY if you are upgrading from an older upgrade version as yours and you don't want some data duplicate or changed like smilies etc.)</span><br><br>\n";
			echo "\t\t\t<input type=\"submit\" class=\"button\" name=\"confirm\" value=\"Do it!\">\n";
		}
		echo "\t\t</form>\n";
		echo "\t</body>\n";
		echo "</html>\n";
	}
?>
