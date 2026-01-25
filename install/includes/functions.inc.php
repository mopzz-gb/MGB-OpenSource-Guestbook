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

	=================
	functions.inc.php
	=================
	*/

	// checks if email is valid
	if(!function_exists("check_mail")) {
		function check_mail($email) {
			if(preg_match("/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/", $email)) {
				if (strlen($email) > 254) {
					return FALSE;
				}
				$localPart = strtok($email, '@');
				if (strlen($localPart) > 64) {
					return FALSE;
				}
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}

	// write config file
	// This code is partially taken from phpwcms 1.3.0 released under GNU/GPL. Thanks for that! :)
	if(!function_exists("write_config")) {
		function write_config($filename, $text) {
			if($fp = fopen($filename, "w")) {
				fwrite($fp, $text);
				fclose($fp);
				return true;
			} else {
				return false;
			}
		}
	}

	// checks if db prefix is valid
	if(!function_exists("check_prefix")) {
		function check_prefix($prefix) {
			if(preg_match("#^[a-z0-9_]+$#i", $prefix)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}

	// checks if username is valid
	if(!function_exists("check_username")) {
		function check_username($username) {
			if(preg_match("/^[a-zA-Z0-9]+$/i", $username)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}

	// MGB_TEMPLATE_REPLACE
	// CREATED / ADDED: 03.01.2026
	// INFO: REPLACES TEMPLATE PLACEHOLDERS
	if (!function_exists('mgb_template_replace')) {
		/**
		 * Ersetzt mehrere Template-Platzhalter auf einmal
		 *
		 * @param array  $vars    ['PLACEHOLDER' => 'Wert']
		 * @param string $content Template-Inhalt
		 * @return string
		 */
		function mgb_template_replace(array $vars, string $content): string {
			foreach ($vars as $placeholder => $value) {
				$content = str_replace(
					'{' . $placeholder . '}',
					(string)$value,
					$content
				);
			}
			return $content;
		}
	}
	
	if(!function_exists('mgb_generate_install_id')) {
		function mgb_generate_install_id(string $mgb_telemetry_salt): string {
			$domain = $_SERVER['HTTP_HOST'] ?? 'unknown';
			$domain = strtolower(preg_replace('/^www\./', '', $domain));
			return hash('sha256', $mgb_telemetry_salt . '|' . $domain);
		}
	}
	
	if(!function_exists('mgb_migrate_text')) {
		function mgb_migrate_text($text) {
			// 
			$text = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');

			// <br> to \nl
			$text = str_ireplace(
				['<br>', '<br/>', '<br />'],
				"\n",
				$text
			);

			// latin9 → UTF-8
			if (!mb_check_encoding($text, 'UTF-8')) {
				$text = mb_convert_encoding($text, 'UTF-8', 'ISO-8859-15');
			}

			return $text;
		}
	}
	
	// 21.06.2013 :: MGB_GET_SQL_STRUCTURE
	// GETS STRUCTURE OF SQL TABLES TO CREATE BACKUPS
	if(!function_exists("mgb_get_sql_structure")) {
		function mgb_get_sql_structure($mysqli, $db_prefix, $tablename, $mode) {
			if($mode == 1) {
				// get structure of table and build output
				$result = $mysqli->query("SHOW COLUMNS FROM ".$db_prefix.$tablename);
				if(mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						$fieldnames[] = $row['Field'];
						$fieldtypes[] = $row['Type'];
						$fieldnull[] = $row['Null'];
						$fieldkey[] = $row['Key'];
						$fielddefault[] = $row['Default'];
						$fieldextra[] = $row['Extra'];
					}
				}
				
				if(empty($sql_dump)) { $sql_dump = ""; }
				
				$sql_dump.= "CREATE TABLE IF NOT EXISTS `".$db_prefix.$tablename."` (\n";
				for($i = 0; $i < count($fieldnames); $i++) {
					$sql_dump.= "`".$fieldnames[$i]."` ".$fieldtypes[$i];
					if($fieldnull[$i] == "NO") {
						$sql_dump.= " NOT NULL";
					}
					if(!empty($fielddefault[$i])) {
						$sql_dump.= " DEFAULT ".$fielddefault[$i];
					}
					if(!empty($fieldextra[$i])) {
						$sql_dump.= " ".$fieldextra[$i];
					}
					if($fieldkey[$i] == "PRI") {
						$sql_dump.= " PRIMARY KEY";
					}
					if($i == (count($fieldnames) - 1)) {
						$sql_dump.= "\n";
					} else {
						$sql_dump.= " ,\n";
					}
				}
				$sql_dump.= ") DEFAULT CHARSET=utf8 ;\n\n";
			} elseif($mode == 2) {
				// get content of table and build output
				$result = $mysqli->query("SHOW COLUMNS FROM ".$db_prefix.$tablename);
				if(mysqli_num_rows($result) >= 1) {
					while($row = mysqli_fetch_assoc($result)) {
						$fieldnames[] = $row['Field'];
					}

					$sql = "SELECT ";
					$sql_dump = "INSERT INTO `".$db_prefix.$tablename."` (`";

					for($i = 0; $i < count($fieldnames); $i++) {
						$counter = count($fieldnames) - 1;
						if($i < $counter) {
							$sql .= $fieldnames[$i].", ";
							$sql_dump .= $fieldnames[$i]."`, `";
						} else {
							$sql .= $fieldnames[$i];
							$sql_dump .= $fieldnames[$i]."`) VALUES\n";
						}
					}

					$sql .= " FROM ".$db_prefix.$tablename;

					$data = $mysqli->query($sql);
					if(mysqli_num_rows($data) >= 1) {
						for($i = 0; $i < mysqli_num_rows($data); $i++) {
							$counteri = mysqli_num_rows($data) - 1;
							$export[$i] = mysqli_fetch_array($data, MYSQLI_ASSOC);
							$sql_dump .= "(";
							for($j = 0; $j < count($fieldnames); $j++) {
								$counterj = count($fieldnames) - 1;
								$sql_dump .= $export[$i][$fieldnames[$j]];
								if($j < $counterj) {
									$sql_dump .= ", ";
								} else {
									$sql_dump .= "";
								}
							}
							if($i < $counteri) {
								$sql_dump .= "),\n";
							} else {
								$sql_dump .= ");\n\n";
							}
						}
					} else {
						$sql_dump = "";
					}
				}
			}
		return $sql_dump;
		}
	}
	
	// MGB_WRITE_EXPORT_FILE
	// CREATED: 30.05.2013
	// DESCR: EXPORTS FILES
	if(!function_exists("mgb_write_export_file")) {
		function mgb_write_export_file($filename, $text) {
			if($fp = fopen($filename, "w")) {
				fwrite($fp, $text);
				fclose($fp);
				return true;
			} else {
				return false;
			}
		}
	}
	
	// MGB_BACKUP_DATABASE
	// CREATED: 25.01.2026
	// INFO: DOES A FULL BACKUP BEFORE UPGRADE
	if(!function_exists('mgb_backup_database')) {
		function mgb_backup_database($mysqli, $dbprefix, $version, $hostname, $dbname) {
			$sql_dump = "-- MGB OpenSource Guestbook SQL Dump\n";
			$sql_dump.= "-- Version: ".$version."\n";
			$sql_dump.= "-- https://www.m-gb.org/\n";
			$sql_dump.= "--\n";
			$sql_dump.= "-- Host: ".$hostname."\n";
			$sql_dump.= "-- Database: ".$dbname."\n";
			$sql_dump.= "-- Tables: banlist_domains, banlist_emails, banlist_ips, entries, settings, smilies, spam, spam_log, user\n";
			$sql_dump.= "-- --------------------------------------------------------;\n\n";
			$sql_dump.= "-- Reason for backup: Upgrading database to a newer version;\n\n";
			$sql_dump.= "-- --------------------------------------------------------;\n\n";

			// get structure of sql table
			$sql_dump.= mgb_get_sql_structure($mysqli, $dbprefix, "banlist_domains", 1);
			$sql_dump.= mgb_get_sql_structure($mysqli, $dbprefix, "banlist_domains", 2);

			// get structure of sql table
			$sql_dump.= mgb_get_sql_structure($mysqli, $dbprefix, "banlist_emails", 1);
			$sql_dump.= mgb_get_sql_structure($mysqli, $dbprefix, "banlist_emails", 2);

			// get structure of sql table
			$sql_dump.= mgb_get_sql_structure($mysqli, $dbprefix, "banlist_ips", 1);
			$sql_dump.= mgb_get_sql_structure($mysqli, $dbprefix, "banlist_ips", 2);

			// get structure of sql table
			$sql_dump.= mgb_get_sql_structure($mysqli, $dbprefix, "entries", 1);
			$sql_dump.= mgb_get_sql_structure($mysqli, $dbprefix, "entries", 2);

			// get structure of sql table
			$sql_dump.= mgb_get_sql_structure($mysqli, $dbprefix, "settings", 1);
			$sql_dump.= mgb_get_sql_structure($mysqli, $dbprefix, "settings", 2);

			// get structure of sql table
			$sql_dump.= mgb_get_sql_structure($mysqli, $dbprefix, "smilies", 1);
			$sql_dump.= mgb_get_sql_structure($mysqli, $dbprefix, "smilies", 2);

			// get structure of sql table
			$sql_dump.= mgb_get_sql_structure($mysqli, $dbprefix, "spam", 1);
			$sql_dump.= mgb_get_sql_structure($mysqli, $dbprefix, "spam", 2);

			// get structure of sql table
			$sql_dump.= mgb_get_sql_structure($mysqli, $dbprefix, "spam_log", 1);
			$sql_dump.= mgb_get_sql_structure($mysqli, $dbprefix, "spam_log", 2);

			// get structure of sql table
			$sql_dump.= mgb_get_sql_structure($mysqli, $dbprefix, "sys_log", 1);
			$sql_dump.= mgb_get_sql_structure($mysqli, $dbprefix, "sys_log", 2);

			// get structure of sql table
			$sql_dump.= mgb_get_sql_structure($mysqli, $dbprefix, "user", 1);
			$sql_dump.= mgb_get_sql_structure($mysqli, $dbprefix, "user", 2);

			$sql_dump.= "-- END OF FILE --";

			$backup_filename = time()."-".$dbprefix."full-upgrade.sql";
			
			echo "\t\t<span style='
				font-family: verdana, arial, helvetica, sans-serif;
				font-size: 12px;
				font-weight: bold;'>Database backup ...</span>\n";

			if(!empty($backup_filename)) {
				if(file_exists("../save") AND is_dir("../save") AND is_writable("../save")) {					
					if(mgb_write_export_file("../save/".$backup_filename, $sql_dump) == TRUE) {						
						echo "\t\t<span style='
							font-family: verdana, arial, helvetica, sans-serif;
							font-size: 12px;
							font-weight: bold;
							color: green;'>OK!<br><br></span>\n";						
					} else {
						echo "\t\t<span style='
							font-family: verdana, arial, helvetica, sans-serif;
							font-size: 12px;
							font-weight: bold;
							color: red;'>ERROR!<br><br></span>\n";
					}
				} else {
					echo "\t\t<span style='
						font-family: verdana, arial, helvetica, sans-serif;
						font-size: 12px;
						font-weight: bold;
						color: red;'>ERROR!<br><br></span>\n";
				}
			}
		}
	}
?>
