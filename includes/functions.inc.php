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
	*/

	// ================= //
	// functions.inc.php //
	// ================= //
	//
	// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

	// MGB_ISIPBANNED
	// CREATED: 02.01.2026
	// INFO: CHECKS IF THE USER IP IS ALREADY BANNED
	
	if (!function_exists('mgb_isIpBanned')) {
		/**
		 * Prüft, ob die aktuelle IP gebannt ist
		 *
		 * @param mysqli $mysqli   Aktive DB-Verbindung
		 * @param array  $settings MGB-Settings
		 * @param array  $db       DB-Config (Prefix)
		 *
		 * @return bool true = IP ist gebannt, false = erlaubt
		 */
		function mgb_isIpBanned(mysqli $mysqli, array $settings, array $db): bool
			{
			if (empty($settings['banlist_ips']) || $settings['banlist_ips'] != 1) {
				return false;
			}

			$ip = $_SERVER['REMOTE_ADDR'] ?? '';
				if ($ip === '') {
				return false;
			}

			$stmt = $mysqli->prepare(
				"SELECT banned_ip, timestamp
				FROM {$db['prefix']}banlist_ips
				WHERE banned_ip = ?
				LIMIT 1"
			);

			$stmt->bind_param('s', $ip);
			$stmt->execute();
			$result = $stmt->get_result();
			$ban = $result->fetch_assoc();

			if (!$ban) {
				return false;
			}

			// Permanenter Ban
			if (
				empty($settings['blocktime']) ||
				$settings['blocktime'] == 0 ||
				empty($settings['banlist_cleanup']) ||
				$settings['banlist_cleanup'] != 1
			) {
				return true;
			}

			$blocktime = (int)$settings['blocktime'];
			$bannedAt  = (int)$ban['timestamp'];

			// Ban abgelaufen -> löschen
			if (time() - $bannedAt >= $blocktime) {

				$del = $mysqli->prepare(
					"DELETE FROM {$db['prefix']}banlist_ips
					WHERE banned_ip = ?
					LIMIT 1"
				);
				$del->bind_param('s', $ip);
				$del->execute();

			return false;
			}

		return true;
		}
	}

	// MGB_SQL_CONNECT
	// CREATED: 04.01.2012
	// UPDATED: 02.01.2026
	// DESCR: GETS DATA FROM SQL DATABASE
	if (!function_exists('mgb_sql_connect')) {
		/**
		 * Führt eine SQL-Abfrage aus
		 *
		 * @param mysqli $mysqli   		mysqli-Objekt
		 * @param string $sql      		SQL-Query
		 * @param string $errormessage 	Meldung bei Fehler
		 * @param int    $return   		0 = true/false, 1 = mysqli_result
		 * @return mixed
		 */
		function mgb_sql_connect(mysqli $mysqli, string $sql, string $errormessage, int $return) {
			if ($return === 0) {
				$result = $mysqli->query($sql);
				if (!$result) {
					die("<span style='font-family: verdana, arial, helvetica, sans-serif; font-size:12px;color:darkblue;'>
						 ".$errormessage."<br><b>SQL:</b> ".$sql."<br><b>ERROR:</b> ".$mysqli->errno." : ".$mysqli->error."</span>");
				}
				return true;
			} else {
				$result = $mysqli->query($sql);
				if (!$result) {
					die("<span style='font-family: verdana, arial, helvetica, sans-serif; font-size:12px;color:darkblue;'>
						 ".$errormessage."<br><b>SQL:</b> ".$sql."<br><b>ERROR:</b> ".$mysqli->errno." : ".$mysqli->error."</span>");
				}
				return $result;
			}
		}
	}

	// MGB_IOU_CHECK
	// CREATED: 20.08.2012
	// UPDATED: 12.01.2026
	// DESCR: CHECKS IF IT IS A FRESH INSTALL OR UPGRADE
	if(!function_exists("mgb_iou_check")) {
		function mgb_iou_check($mysqli, $path) {
			if(file_exists($path."includes/config.inc.php")) {
				require ($path."includes/config.inc.php");
				if(!isset($mgb_installation_complete)) {
					echo "<span>It seems as if you haven't installed MGB yet. You can do it <a href=\"install/install.php\">here</a>.<br><br> If MGB is already installed, try to copy your 'config.inc.php' from root directory into 'includes/config.inc.php'.</span>";
					die();
				} elseif(isset($mgb_installation_complete) AND $mgb_installation_complete == TRUE AND file_exists($path.'install') AND is_dir($path.'install')) {
					require $path."install/includes/config.inc.php";
					$sql = "SELECT version FROM ".$db['prefix']."settings";
					$result = mgb_sql_connect($mysqli, $sql, "Error while retrieving version of MGB.", 1);
					$existing_version = $result->fetch_assoc();
					if(version_compare($existing_version['version'], MGB_VERSION, "!=")) {
						echo "<meta http-equiv='refresh' content='0; URL=install/upgrade.php'>";
						die();
					} else {
						echo "<center><span>If you upgraded to a newer version shortly, please run <a href='install/upgrade.php'>upgrade.php</a> in install directory <b>now!</b> Otherwise you might discover problems when using this software.<br>If you did a fresh install, you can ignore this message. To remove it, delete install directory. Thank you!<br><br></span></center>";
					}
				}
			} else {
				echo "<!doctype html>\n";
				echo "<html>\n";
				echo "<head>\n";
				echo "<meta http-equiv='refresh' content='5; URL=install/install.php'>";
				echo "<title>MGB OpenSource Guestbook</title>\n";
				echo "</head>\n";
				echo "<body>\n";
				echo "<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: darkblue;\">Installation of MGB OpenSource Guestbook starts automatically in 5 Seconds.<br>If not, please click <a href=\"install/install.php\">here</a>.</span>\n";
				echo "</body>\n";
				echo "</html>";
				die();
			}
		}
	}

	// 14.08.2012 14:21 :: MGB_TEMPLATE_LANGUAGE
	// REPLACES ALL LANGUAGE STRINGS AUTOMATICALLY
	if(!function_exists("mgb_template_language")) {
		function mgb_template_language($template_file, $language_file, $debug_mode) {
			// include ("../language/lang_english_utf8/lang_admin.php"); // load english language file every time so empty strings will be in english
			include ($language_file);
			$output = array();
			// debug only
			$missing_strings = 0;
			$missing_strings_names = array();

			preg_match_all("/(\{LANG_)[A-Z_0-9]+\}/", $template_file, $output); // this here catches all language strings

			if(!empty($debug_mode)) {
				echo "<pre>\n";
				echo "<span>---<br>";
				echo "<b>mgb_template_language() :: debug mode</b><br>";
				echo "---<br>";
				echo "<b>Language file path:</b> ".$language_file."<br>";
				echo "<b>Number of found strings:</b> ".count($output[0])."</span>";
				echo "<table>\n";
			}

			for($a = 0; $a < count($output[0]); $a++) {
				$ersetzung = strtolower(substr($output[0][$a], 6));		// delete the first six characters -> {LANG_
				$ersetzung2 = substr($ersetzung, 0, -1);				// delete the last character -> }

				if(empty($lang[$ersetzung2])) {
					$missing_strings++;
					$missing_strings_names[$a] = $ersetzung2;
					$error = 1;
				} else {
					$error = 0;
				}

				$ausdruck = substr($output[0][$a], 0, -1);				// delete the last character -> }
				$ausdruck2 = substr($ausdruck, 1);						// delete the first character -> {

				if($debug_mode == 2 AND !empty($lang[$ersetzung2])) {
					echo "<tr>\n";
					echo "<td><span>".$output[0][$a]."</span></td>\n";
					echo "<td><span>&nbsp;|&nbsp;".$ersetzung2."</span></td>\n";
					echo "<td><span>&nbsp;|&nbsp;".$lang[$ersetzung2]."</span></td>\n";
					echo "</tr>\n";
				} elseif(!empty($debug_mode) AND empty($lang[$ersetzung2])) {
					echo "<tr>\n";
					echo "<td><span style='color: #FF0000'>".$output[0][$a]."</span></td>\n";
					echo "<td><span style='color: #FF0000'>&nbsp;|&nbsp;".$ersetzung2."</span></td>\n";
					echo "<td><span style='color: #FF0000'>&nbsp;|&nbsp;STRING NOT FOUND</span></td>\n";
					echo "</tr>\n";
				}

				if($error == 0) {
					$template_file = preg_replace("/\{".$ausdruck2."\}/", $lang[$ersetzung2], $template_file);
				}
			}

			if(!empty($debug_mode)) {
				echo "</table>\n";
				echo "<span><b>Missing strings:</b> ".$missing_strings."</span></pre>";
			}

			return $template_file;
		}
	}

	// 15.08.2012 :: MGB_LOAD_TEMPLATE
	// LOADS THE TEMPLATE THAT IS REALLY NEEDED INSTEAD OF ALL TEMPLATE FILES AT ONCE
	if(!function_exists("mgb_load_template")) {
		function mgb_load_template($area, $template_name, $site_path, $debug_mode) {
			if($area == "admin") {
				$template_path = "../admin/templates/".$template_name."/".$site_path.".tpl";

				if($debug_mode == 2) {
					echo "<span><b>Loading:</b> ".$template_path."&nbsp;|</span>";
				}

				if(file_exists($template_path)) {
					$template_file = file_get_contents($template_path);
					if($debug_mode == 2) {
						echo "<span style='color: green'>&nbsp;OK</span><br>";
					}
					return $template_file;
				} else {
					if(!empty($debug_mode)) {
						echo "<span><b>Loading:</b> ".$template_path."&nbsp;|&nbsp;</span><span style='color:#FF0000'>Missing file!</span><span> - Incomplete template in use! If you are using your own template, and you updated to a newer version of MGB shortly, check changes in the main template 'mgbModern'.</span><br>";
					} elseif($debug_mode == 2) {
						echo "<span style='color:#FF0000'>&nbsp;Missing file!</span><span> - Incomplete template in use! If you are using your own template, and you updated to a newer version of MGB shortly, check changes in the main template 'mgbModern'.</span><br>";
					}
				}
			} elseif($area == "user") {
				$template_path = "templates/".$template_name."/".$site_path.".tpl";

				if($debug_mode == 2) {
					echo "<span><b>Loading:</b> ".$template_path."&nbsp;|</span>";
				}

				if(file_exists($template_path)) {
					$template_file = file_get_contents($template_path);
					if($debug_mode == 2) {
						echo "<span style='color: green'>&nbsp;OK</span><br>";
					}
					return $template_file;
				} else {
					if(!empty($debug_mode)) {
						echo "<span><b>Loading:</b> ".$template_path."&nbsp;|&nbsp;</span><span style='color:#FF0000'>Missing file!</span><span> - Incomplete template in use! If you are using your own template, and you updated to a newer version of MGB shortly, check changes in the main template 'mgbModern'.</span><br>";
					} elseif($debug_mode == 2) {
						echo "<span style='color:#FF0000'>&nbsp;Missing file!</span><span> - Incomplete template in use! If you are using your own template, and you updated to a newer version of MGB shortly, check changes in the main template 'mgbModern'.</span><br>";
					}
				}
			}
		}
	}

	// 21.06.2013 :: MGB_GET_SQL_STRUCTURE
	// GETS STRUCTURE OF SQL TABLES TO CREATE BACKUPS
	if(!function_exists("mgb_get_sql_structure")) {
		function mgb_get_sql_structure($mysqli, $db_prefix, $tablename, $mode) {
			if($mode == 1) {
				// get structure of table and build output
				$result = mgb_sql_connect($mysqli, "SHOW COLUMNS FROM ".$db_prefix.$tablename, "Error while getting structure of table ".$tablename, 1);
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
						$sql_dump.= " DEFAULT ".secure_value($fielddefault[$i]);
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
				$result = mgb_sql_connect($mysqli, "SHOW COLUMNS FROM ".$db_prefix.$tablename, "Error while getting structure of table ".$tablename, 1);
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

					$data = mgb_sql_connect($mysqli, $sql, "Error while getting data of table ".$tablename, 1);
					if(mysqli_num_rows($data) >= 1) {
						for($i = 0; $i < mysqli_num_rows($data); $i++) {
							$counteri = mysqli_num_rows($data) - 1;
							$export[$i] = mysqli_fetch_array($data, MYSQLI_ASSOC);
							$sql_dump .= "(";
							for($j = 0; $j < count($fieldnames); $j++) {
								$counterj = count($fieldnames) - 1;
								$sql_dump .= secure_value($export[$i][$fieldnames[$j]]);
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

	// badwords
	if(!function_exists("badwords")) {
		function badwords($text) {
			global $badwords;
			foreach($badwords as $b) {
				if($b != "") {
					$r = $b[0].str_repeat("*", strlen($b)-2).$b[strlen($b)-1];
					if(function_exists("str_ireplace")) {
						$text = str_ireplace($b, $r, $text);
					} else {
						$text = str_replace($b, $r, $text);
					}
				}
			}
			return $text;
		}
	}


	// checks if email is valid
	if(!function_exists("check_mail")) {
		function check_mail($email) {
			if(preg_match("/^[a-zA-Z0-9äöüÄÖÜ]+([-_\.]?[a-zA-Z0-9äöüÄÖÜ])+@[a-zA-Z0-9äöüÄÖÜ]+([-_\.]?[a-zA-Z0-9äöüÄÖÜ])+\.[a-zA-ZäöüÄÖÜ\.]{2,15}/", $email)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}


	// checks if icq number is valid
	if(!function_exists("check_number")) {
		function check_number($number) {
			if(preg_match("/^[0-9]+$/i", $number)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}


	// checks if facebook name is valid
	if(!function_exists("check_fb_name")) {
		function check_fb_name($fb) {
			if(preg_match("/^[a-z]+[\.]?[a-z]+[\.]?([0-9]{1,2})?$/", $fb)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}


	// checks if twitter name is valid
	if(!function_exists("check_twitter_name")) {
		function check_twitter_name($twitter) {
			if(preg_match("/^[_a-zA-Z0-9@]+$/", $twitter)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}


	// sets smilies
	if(!function_exists("set_smilies")) {
		function set_smilies($mysqli, $text) {
			// load smilies
			require "includes/config.inc.php";
			$result = mgb_sql_connect($mysqli, "SELECT * FROM ".$db['prefix']."smilies ORDER BY ID DESC", "Error while loading smilies.", 1);

			for($i = 0; $i < mysqli_num_rows($result); $i++) {
				$smiley[$i] = mysqli_fetch_array($result, MYSQLI_ASSOC);
			}

			if(!isset($smiley)) {
				$smiley = NULL;
			}

			for($i = 0; $i < count($smiley); $i++) {
				// replace smilies in entry
				if(preg_match("/,/is", $smiley[$i]['replacement'], $treffer)) {
					$smilies = explode(", ", $smiley[$i]['replacement']);
					for($e = 0; $e < count($smilies); $e++) {
						if(($smilies[$e] != ":/") AND ($smilies[$e] != "//") AND ($smilies[$e] != "://")) {
							$smilie_replace[$e] = $text;
							$smilie_replace[$e] = str_ireplace($smilies[$e], '<img src="images/smilies/'.$smiley[$i]['path'].'" class="smilies" alt="" title="" width="'.$smiley[$i]['width'].'" height="'.$smiley[$i]['height'].'">', $smilie_replace[$e]);
							$text = $smilie_replace[$e];
						}
					}
				}

				if(($smiley[$i]['replacement'] != ":/") AND ($smiley[$i]['replacement'] != "//") AND ($smiley[$i]['replacement'] != "://")) {
					$smilie_replace[$i] = $text;
					$smilie_replace[$i] = str_ireplace($smiley[$i]['replacement'], '<img src="images/smilies/'.$smiley[$i]['path'].'" class="smilies" alt="" title="" width="'.$smiley[$i]['width'].'" height="'.$smiley[$i]['height'].'">', $smilie_replace[$i]);
					$text = $smilie_replace[$i];
				}
			}
			return $text;
		}
	}


	// delete smilies
	if(!function_exists("delete_smilies")) {
		function delete_smilies($mysqli, $text) {
			// load smilies
			require "includes/config.inc.php";
			$result = mgb_sql_connect($mysqli, "SELECT * FROM ".$db['prefix']."smilies ORDER BY ID DESC", "Error while loading smilies.", 1);

			for($i = 0; $i < mysqli_num_rows($result); $i++) {
				$smiley[$i] = mysqli_fetch_array($result, MYSQLI_ASSOC);
			}

			if(!isset($smiley)) {
				$smiley = NULL;
			}

			for($i = 0; $i < count($smiley); $i++) {
				// replace smilies in entry
				if(preg_match("/,/is", $smiley[$i]['replacement'], $treffer)) {
					$smilies = explode(", ", $smiley[$i]['replacement']);
					for($e = 0; $e < count($smilies); $e++) {
						if(($smilies[$e] != ":/") AND ($smilies[$e] != "//") AND ($smilies[$e] != "://")) {
							$smilie_replace[$e] = $text;
							$smilie_replace[$e] = str_ireplace($smilies[$e], '', $smilie_replace[$e]);
							$text = $smilie_replace[$e];
						}
					}
				}

				if(($smiley[$i]['replacement'] != ":/") AND ($smiley[$i]['replacement'] != "//") AND ($smiley[$i]['replacement'] != "://")) {
					$smilie_replace[$i] = $text;
					$smilie_replace[$i] = str_ireplace($smiley[$i]['replacement'], '', $smilie_replace[$i]);
					$text = $smilie_replace[$i];
				}
			}
			return $text;
		}
	}

	// this function adds "http://" or "https://" to a bbcode url
	// if it isn't there
	if(!function_exists("http")) {
		function http($treffer) {
			$url = $treffer[1];
			if(!preg_match("/http:\/\//i", $url)) {
				if(!preg_match("/https:\/\//i", $url)) {
				$url = "https://".$url;
				}
			}
			$link = "<a href='".$url."' target='_blank' title='".$url."'>".$url."</a>";
			return $link;
		}
	}

	// this function adds "http://" or "https://" to a bbcode url
	// if it isn't there AND checks if there is an image between the [url] bbcode
	if(!function_exists("http_img")) {
		function http_img($mysqli, $treffer) {
			$url = $treffer[1];
			$text = $treffer[2];

			// load maximum width and height settings
			require "config.inc.php";
			$result = mgb_sql_connect($mysqli, "SELECT allow_img_tag, max_img_width, max_img_height, center_img FROM ".$db['prefix']."settings", "Error while loading img settings.", 1);
			$settings = mysqli_fetch_array($result, MYSQLI_ASSOC);
			if($settings['center_img'] == 1) { $center_1 = "<center>"; $center_2 = "</center>"; }

			// search for missing http://
			if(!preg_match("/http:\/\//i", $url)) {
				if(!preg_match("/https:\/\//i", $url)) {
				$url = "https://".$url;
				}
			}

			$link = "<a href='".$url."' target='_blank' title='".$url."'>".$text."</a>";

			if(isset($settings['allow_img_tag']) AND $settings['allow_img_tag'] == 1) {
				// does [url] contain an image?
				if(preg_match("/\[img\](.*?)\[\/img\]/is", $text, $image)) {
					$img_url = $image[1];
					if(function_exists("getimagesize")) {
						if($img_size = getimagesize($img_url)) {
							$max_width = $settings['max_img_width'];
							if($img_size[0] > $max_width) {
								$proportion = $img_size[0] / $max_width;
								$image_width = $max_width;
								$image_height = ceil($img_size[1] / $proportion);
							} else {
								$image_width = $img_size[0];
								$image_height = $img_size[1];
							}
							$link = $center_1."<a href='".$url."' target='_blank' title='".$url."'><img class='entry' src='".$img_url."' alt='".$img_url."' title='".$img_url."' width='".$image_width."' height='".$image_height."'></a>".$center_2;
						} else {
							$link = $center_1."<a href='".$url."' target='_blank' title='".$url."'><img class='entry' src='".$img_url."' alt='".$img_url."' title='".$img_url."'></a>".$center_2;
						}
					} else {
						$link = $center_1."<a href='".$url."' target='_blank' title='".$url."'><img class='entry' src='".$img_url."' alt='".$img_url."' title='".$img_url."'></a>".$center_2;
					}
				} elseif(preg_match("/\[img=([0-9]+),([0-9]+)\](.*?)\[\/img\]/is", $text, $image)) {
					$max_width = $settings['max_img_width'];
					$max_height = $settings['max_img_height'];

					if($image[1] > $max_width) { $image_width = $max_width; } else { $image_width = $image[1]; }
					if($image[2] > $max_height) { $image_height = $max_height; } else { $image_height = $image[2]; }

					$link = $center_1."<a href='".$url."' target='_blank' title='".$url."'><img class='entry' src='".$image[3]."' alt='".$image[3]."' title='".$image[3]."' width='".$image_width."' height='".$image_height."'></a>".$center_2;
				}
			}
			return $link;
		}
	}


	// this function analyzes the size of the image in the [img]-tag and reduces it's
	// dimensions to "normal" ones that don't break up the flow of the template design
	if(!function_exists("img_1")) {
		function img_1($mysqli, $treffer) {
			// load maximum width and height settings
			require "config.inc.php";
			$result = mgb_sql_connect($mysqli, "SELECT allow_img_tag, max_img_width, max_img_height, center_img FROM ".$db['prefix']."settings", "Error while loading img settings.", 1);
			$settings = mysqli_fetch_array($result, MYSQLI_ASSOC);

			if(isset($settings['allow_img_tag']) AND $settings['allow_img_tag'] == 1) {
				$img_url = $treffer[1];
				$max_width = $settings['max_img_width'];
				if($settings['center_img'] == 1) { $center_1 = "<center>"; $center_2 = "</center>"; }
				if(function_exists("getimagesize")) {
					if($img_size = @getimagesize($img_url)) {
						if($img_size[0] > $max_width) {
							$proportion = $img_size[0] / $max_width;
							$image_width = $max_width;
							$image_height = ceil($img_size[1] / $proportion);
						} else {
							$image_width = $img_size[0];
							$image_height = $img_size[1];
						}
						$bbcode = $center_1."<img class='entry' src='".$img_url."' alt='".$img_url."' title='".$img_url."' width='".$image_width."' height='".$image_height."'>".$center_2;
					} else {
						$bbcode = $center_1."<img class='entry' src='".$img_url."' alt='".$img_url."' title='".$img_url."'>".$center_2;
					}
				} else {
					$bbcode = $center_1."<img class='entry' src='".$img_url."' alt='".$img_url."' title='".$img_url."'>".$center_2;
				}
			} else {
				$bbcode = "Image: ".$treffer[1];
			}
			return $bbcode;
		}
	}


	// this functions analyzes the provided size values of the user and
	// reduces them to "normal" ones if they break up the flow of the template
	if(!function_exists("img_2")) {
		function img_2($mysqli, $treffer) {
			// load maximum width and height settings
			require "config.inc.php";
			$result = mgb_sql_connect($mysqli, "SELECT allow_img_tag, max_img_width, max_img_height, center_img FROM ".$db['prefix']."settings", "Error while loading img settings.", 1);
			$settings = mysqli_fetch_array($result, MYSQLI_ASSOC);

			if(isset($settings['allow_img_tag']) AND $settings['allow_img_tag'] == 1) {
				$image_width = $treffer[1];
				$image_height = $treffer[2];
				$image_url = $treffer[3];

				$max_width = $settings['max_img_width'];
				$max_height = $settings['max_img_height'];

				if($treffer[1] > $max_width) { $image_width = $max_width; } else { $image_width = $treffer[1]; }
				if($treffer[2] > $max_height) { $image_height = $max_height; } else { $image_height = $treffer[2]; }
				if($settings['center_img'] == 1) { $center_1 = "<center>"; $center_2 = "</center>"; }
				$bbcode = $center_1."<img class='entry' src='".$image_url."' alt='".$image_url."' title='".$image_url."' width='".$image_width."' height='".$image_height."'>".$center_2;
			} else {
				$bbcode = "Image: ".$treffer[3];
			}
			return $bbcode;
		}
	}


	if(!function_exists("quote")) {
		function quote($treffer) {
			$quote_text = $treffer[1];
			$bbcode = "<pre><blockquote><span class='quote_text'>&raquo;".$quote_text."&laquo;</span></blockquote></pre>";
			return $bbcode;
		}
	}


	if(!function_exists("quote_name")) {
		function quote_name($treffer) {
			$quote_name = $treffer[1];
			$quote_text = $treffer[2];
			$bbcode = "<pre><blockquote><span class='quote_name'>{LANG_QUOTE}&nbsp;".$quote_name.":</span><br><span class='quote_text'>&raquo;".$quote_text."&laquo;</span></blockquote></pre>";
			return $bbcode;
		}
	}


	if(!function_exists("flash")) {
		function flash($mysqli, $treffer) {
			// load maximum width and height settings
			require "config.inc.php";
			$result = mgb_sql_connect($mysqli, "SELECT allow_flash_tag, max_flash_width, max_flash_height, center_flash FROM ".$db['prefix']."settings", "Error while loading flash settings.", 1);
			$settings = mysqli_fetch_array($result, MYSQLI_ASSOC);

			if(isset($settings['allow_flash_tag']) AND $settings['allow_flash_tag'] == 1) {
				$flash_width = $treffer[1];
				$flash_height = $treffer[2];
				$flash_url = $treffer[3];

				$max_width = $settings['max_flash_width'];
				$max_height = $settings['max_flash_height'];

				if($treffer[1] > $max_width) {
					$flash_width = $max_width;
				} else {
					$flash_width = $treffer[1];
				}

				if($treffer[2] > $max_height) {
					$flash_height = $max_height;
				} else {
					$flash_height = $treffer[2];
				}

				// simplify youtube urls for the user
				if(preg_match("/http:\/\/www.youtube.com\/watch\?v\=(.*?)/is", $flash_url, $found)) { $flash_url = preg_replace("/http:\/\/www.youtube.com\/watch\?v=(.*?)/is", "http://www.youtube.com/v/$1", $flash_url); }
				if($settings['center_flash'] == 1) { $center_1 = "<center>"; $center_2 = "</center>"; }
				/* $bbcode = $center_1."<iframe width='".$flash_width."' height='".$flash_height."' src='".$flash_url."' frameborder='0'></iframe>".$center_2; //allowfullscreen */
				// the following html code is taken from phpBB 3.0.9, released under GNU/GPL
				$bbcode = $center_1."<object classid='clsid:D27CDB6E-AE6D-11CF-96B8-444553540000' codebase='http://active.macromedia.com/flash2/cabs/swflash.cab#version=5,0,0,0' width='".$flash_width."' height='".$flash_height."'>
				<param name='movie' value='".$flash_url."' />
				<param name='play' value='false' />
				<param name='loop' value='false' />
				<param name='quality' value='high' />
				<param name='allowScriptAccess' value='never' />
				<param name='allowNetworking' value='internal' />
				<embed src='".$flash_url."' type='application/x-shockwave-flash' pluginspage='http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash' width='".$flash_width."' height='".$flash_height."' play='false' loop='false' quality='high' allowscriptaccess='never' allownetworking='internal'></embed>
				</object>".$center_2;
			} else {
				$bbcode = "Flash: ".$treffer[3];
			}
			return $bbcode;
		}
	}


	// bbcode formatting
	if(!function_exists("bbcode_format")) {
		function bbcode_format($mysqli, $bbcode, $page) {
			if($page != "adminpanel") {
				$bbcode = preg_replace_callback('/\[url\](.*?)\[\/url\]/is', 'http', $bbcode);
				$bbcode = preg_replace_callback('/\[url\=(.*?)\](.*?)\[\/url\]/is', function ($treffer) use ($mysqli) { return http_img($mysqli, $treffer); }, $bbcode);
				$bbcode = preg_replace_callback('/\[img\](.*?)\[\/img\]/is', function ($treffer) use ($mysqli) { return img_1($mysqli, $treffer); }, $bbcode);
				$bbcode = preg_replace_callback('/\[img\=([0-9]+),([0-9]+)\](.*?)\[\/img\]/is', function ($treffer) use ($mysqli) { return img_2($mysqli, $treffer); }, $bbcode);
				$bbcode = preg_replace_callback('/\[quote\](.*?)\[\/quote\]/is', 'quote', $bbcode);
				$bbcode = preg_replace_callback('/\[quote\=(.*?)\](.*?)\[\/quote\]/is', 'quote_name', $bbcode);
				$bbcode = preg_replace_callback('/\[flash\=([0-9]+),([0-9]+)\](.*?)\[\/flash\]/is', function ($treffer) use ($mysqli) { return flash($mysqli, $treffer); }, $bbcode);

				$bbcode_search = array(
					'/\[center\](.*?)\[\/center\]/is',
					'/\[b\](.*?)\[\/b\]/is',
					'/\[i\](.*?)\[\/i\]/is',
					'/\[size\=(.*?)\]\[color\=(.*?)\](.*?)\[\/color\]\[\/size\]/is',
					'/\[color\=(.*?)\]\[size\=(.*?)\](.*?)\[\/size\]\[\/color\]/is',
					'/\[size\=(.*?)\](.*?)\[\/size\]/is',
					'/\[color\=(.*?)\](.*?)\[\/color\]/is',
					'/\[code\](.*?)\[\/code\]/is'
					);

				$bbcode_replace = array(
					'<center>$1</center>',
					'<b>$1</b>',
					'<i>$1</i>',
					'<span style="font-size: $1px; color: $2">$3</span>',
					'<span style="color: $1; font-size: $2px">$3</span>',
					'<span style="font-size: $1px;color:inherit;">$2</span>',
					'<span style="color: $1">$2</span>',
					'<blockquote class="code">$1</blockquote>'
					);

				$bbcode = preg_replace ($bbcode_search, $bbcode_replace, $bbcode);
			} else {
				$bbcode_search = array(
					'/\[center\](.*?)\[\/center\]/is',
					'/\[b\](.*?)\[\/b\]/is',
					'/\[i\](.*?)\[\/i\]/is',
					'/\[size\=(.*?)\]\[color\=(.*?)\](.*?)\[\/color\]\[\/size\]/is',
					'/\[color\=(.*?)\]\[size\=(.*?)\](.*?)\[\/size\]\[\/color\]/is',
					'/\[size\=(.*?)\](.*?)\[\/size\]/is',
					'/\[color\=(.*?)\](.*?)\[\/color\]/is',
					'/\[img\](.*?)\[\/img\]/is',
					'/\[img\=([0-9]+),([0-9]+)\](.*?)\[\/img\]/is',
					'/\[url\](.*?)\[\/url\]/is',
					'/\[url\=(.*?)\](.*?)\[\/url\]/is',
					'/\[quote\](.*?)\[\/quote\]/is',
					'/\[quote\=(.*?)\](.*?)\[\/quote\]/is',
					'/\[flash\=([0-9]+),([0-9]+)\](.*?)\[\/flash\]/is',
					'/\[code\](.*?)\[\/code\]/is'
					);

				$bbcode_replace = array(
					'[center]$1[/center]',
					'[b]$1[/b]',
					'[i]$1[/i]',
					'[size=$1][color=$2]$3[/color][/size]',
					'[color=$1][size=$2]$3[/size][/color]',
					'[size=$1]$2[/size]',
					'[color=$1]$2[/color]',
					'[img]$1[/img]',
					'[img=$1,$2]$3[/img]',
					'[url]$1[/url]',
					'[url=$1]$2[/url]',
					'[quote]$1[/quote]',
					'[quote=$1]$2[/quote]',
					'[flash=$1,$2]$3[/flash]',
					'[code]$1[/code]'
					);

				$bbcode = preg_replace ($bbcode_search, $bbcode_replace, $bbcode);
			}
			return $bbcode;
		}
	}

	// deletes bbcode
	if(!function_exists("bbcode_delete")) {
		function bbcode_delete($bbcode) {
			//$bbcode = htmlentities($bbcode);
			$bbcode_search = array(
				'/\[b\](.*?)\[\/b\]/is',
				'/\[i\](.*?)\[\/i\]/is',
				'/\[url\](.*?)\[\/url\]/is',
				'/\[url\=(.*?)\](.*?)\[\/url\]/is',
				'/\[size\=(.*?)\](.*?)\[\/size\]/is',
				'/\[color\=(.*?)\](.*?)\[\/color\]/is',
				'/\[img\](.*?)\[\/img\]/is',
				'/\[img=([0-9]+),([0-9]+)\](.*?)\[\/img\]/is',
				'/\[quote\](.*?)\[\/quote\]/is',
				'/\[quote\=(.*?)\](.*?)\[\/quote\]/is',
				'/\[flash\=([0-9]+),([0-9]+)\](.*?)\[\/flash\]/is',
				'/\[code\](.*?)\[\/code\]/is'
				);

			$bbcode_replace = array(
				'$1',
				'$1',
				'$1',
				'$1',
				'$2',
				'$2',
				'$1',
				'$3',
				'$1',
				'$2',
				'$3',
				'$1'
				);

			$bbcode = preg_replace ($bbcode_search, $bbcode_replace, $bbcode);

			return $bbcode;
		}
	}

	// checks if login is ok
	if(!function_exists("login_ok")) {
		function login_ok($mysqli, $name, $ID, $password) {
			$old_password = md5($password);
			require ('../includes/config.inc.php');

			if(!empty($ID)) {
				$sql = "SELECT user_password FROM ".$db['prefix']."user WHERE ID='".$ID."'";
			} else {
				$sql = "SELECT user_password FROM ".$db['prefix']."user WHERE user_name='".$name."'";
			}

			$result = mgb_sql_connect($mysqli, $sql, "Error while checking login information!", 1);
			$user = mysqli_fetch_array($result, MYSQLI_ASSOC);

			if(password_verify($password, $user['user_password'])) {
				unset($ID);
				unset($user['user_password']);
				unset($password);
				// update user_ip in database
				mgb_sql_connect($mysqli, "UPDATE ".$db['prefix']."user SET `user_ip` = '".$_SERVER['REMOTE_ADDR']."' WHERE user_name='".$name."' LIMIT 1", "Error while updating user information.", 0);
				return TRUE;
			} elseif($user['user_password'] === $old_password) {
				$newHash = password_hash($password, PASSWORD_DEFAULT);
				unset($ID);
				unset($user['user_password']);
				unset($password);
				// update user_ip in database
				mgb_sql_connect($mysqli, "UPDATE ".$db['prefix']."user SET `user_ip` = '".$_SERVER['REMOTE_ADDR']."' WHERE user_name='".$name."' LIMIT 1", "Error while updating user information.", 0);
				// update user_password in database
				mgb_sql_connect($mysqli, "UPDATE ".$db['prefix']."user SET `user_password` = '".$newHash."' WHERE user_name='".$name."' LIMIT 1", "Error while updating user information.", 0);
				return TRUE;
			} else {
				unset($ID);
				unset($user['user_password']);
				unset($password);
				return FALSE;
			}
		}
	}

	// checks if username exists when adding a new user
	if(!function_exists("check_if_user_exists")) {
		function check_if_user_exists($mysqli, $name, $email) {
			include('../includes/config.inc.php');

			$stmt = $mysqli->prepare("SELECT 1 FROM ".$db['prefix']."user WHERE user_name = LOWER(?) LIMIT 1");
			$stmt->bind_param("s", $name);
			$stmt->execute();
			$result = $stmt->get_result();

			if ($result && $result->num_rows > 0) {
				return false; // user name already exists
			}

			$stmt = $mysqli->prepare("SELECT 1 FROM ".$db['prefix']."user WHERE user_email = LOWER(?) LIMIT 1");
			$stmt->bind_param("s", $email);
			$stmt->execute();
			$result = $stmt->get_result();

			if ($result && $result->num_rows > 0) {
				return false; // user email already exists
			}

			return TRUE;			
		}
	}

	// wordwrap: if message contains words longer than $settings['wordwrap'] they will
	// be broken into two or more strings. If $settings['wordwrap'] == 0, function is off.
	// This method taken from http://de.php.net/manual/en/function.wordwrap.php#64517
	// by ab_at_notenet(dot)dk (thanks for that!!) will luckily not affect html tags
	if(!function_exists("textWrap")) {
		function textWrap($text, $size) {
			$new_text = '';
			$text_1 = explode('>',$text);
			$sizeof = sizeof($text_1);
			for ($i=0; $i<$sizeof; ++$i) {
				$text_2 = explode('<',$text_1[$i]);

				if(!empty($text_2[0])) {
					$new_text .= preg_replace('#([^\n\r .]{'. $size .'})#i', '\\1  ', $text_2[0]);
				}

				if(!empty($text_2[1])) {
					$new_text .= '<' . $text_2[1] . '>';
				}
			}
			return $new_text;
		}
	}

	// secure values to prevent remote sql exploits
	if(!function_exists("secure_value")) {
		function secure_value($value) {
			if(!is_numeric($value)) {
				$value = "'".$value."'";
			} else {
				$value = stripslashes($value);
			}
			return $value;
		}
	}

	// turn xhtml breaks to new lines
	if(!function_exists("xhtmlbr2nl")) {
		function xhtmlbr2nl($value) {
			$value = preg_replace("/\<br \/>/", "\n", $value);
			return $value;
		}
	}

	// replace placeholders in email
	if(!function_exists("format_mail")) {
		function format_mail($value, $name, $date, $time, $message, $domain, $url_to_gb, $adduser_name, $adduser_password, $adduser_url, $new_password_key, $user_id, $new_password) {
			$value = preg_replace("/\{NAME\}/", $name, $value);
			$value = preg_replace("/\{DATE\}/", $date, $value);
			$value = preg_replace("/\{TIME\}/", $time, $value);
			$value = preg_replace("/\{DOMAIN\}/", $domain, $value);
			$value = preg_replace("/\{URL_TO_GB\}/", $url_to_gb, $value);
			$value = preg_replace("/\{MESSAGE\}/", $message, $value);
			$value = preg_replace("/\{ADDUSER_NAME\}/", $adduser_name, $value);
			$value = preg_replace("/\{ADDUSER_PASSWORD\}/", $adduser_password, $value);
			$value = preg_replace("/\{ADDUSER_URL\}/", $adduser_url, $value);
			$value = preg_replace("/\{NEW_PASSWORD_KEY\}/", $new_password_key, $value);
			$value = preg_replace("/\{NEW_PASSWORD_LINK\}/", $url_to_gb."?id=".$user_id."&key=".$new_password_key, $value);
			$value = preg_replace("/\{NEW_PASSWORD\}/", $new_password, $value);

			return $value;
		}
	}

	// replace umlauts in email
	if(!function_exists("repl_uml")) {
		function repl_uml($text, $charset) {
			$text = preg_replace("/\&uuml;/", "ü", $text);
			$text = preg_replace("/\&auml;/", "ä", $text);
			$text = preg_replace("/\&ouml;/", "ö", $text);
			$text = preg_replace("/\&szlig;/", "ß", $text);

			return $text;
		}
	}

	// MGB_SECURE_RAND
	// CREATED / ADDED: 19.02.2013
	// DESCR: CREATES MORE SECURE RANDOM NUMBERS AND LETTERS THAN THE BEFORE USED rand()
	if(!function_exists("mgb_secure_rand")) {
		function mgb_secure_rand($min_length, $max_length, $salt, $hash_method, $double) {
			/*
			if(function_exists('openssl_random_pseudo_bytes')) {
				$rnd = openssl_random_pseudo_bytes($length, $strong);
				if($strong === TRUE)
				return $rnd;
			}
			*/
			$rnd ='';

			for ($i = 0; $i < $min_length; $i++) {
				$sha = hash($hash_method, $salt.mt_rand());
				$char = mt_rand(0,30);
				$rnd .= $sha[$char];
			}

			if($double == 1) {
				$rnd = hash($hash_method, $rnd);
			}

			if(empty($max_length)) {
				$length = $min_length;
			} else {
				$length = mt_rand($min_length, $max_length);
			}
			$rnd = substr($rnd, 0, $length);

		return $rnd;
		}
	}

	// generate captcha
	if(!function_exists("generate_captcha")) {
		function generate_captcha($captcha_method, $min_length, $max_length, $salt, $hash_method, $double) {
			require (MGB_ROOT.'includes/config.inc.php');
			if($captcha_method == 0) {
				$_SESSION['CAPTCHA_CODE'] = strtoupper(mgb_secure_rand($min_length, $max_length, $salt, $hash_method, $double));
			} elseif ($captcha_method == 1) {
				$captcha_rnd_1 = mt_rand(1, 10);
				$captcha_rnd_2 = mt_rand(1, 20);
				$captcha_rnd_3 = mt_rand(1, 30);

				$captcha_rnd_method = mt_rand(1, 2);
				if($captcha_rnd_method == 1) {
					$captcha_sum = $captcha_rnd_1 + $captcha_rnd_2;
					$captcha_math_symbol_1 = "+";
				} else {
					$captcha_sum = $captcha_rnd_1 - $captcha_rnd_2;
					$captcha_math_symbol_1 = "-";
				}
				$captcha_sum2 = $captcha_sum; // debug

				$captcha_rnd_method = mt_rand(1, 2);
				if($captcha_rnd_method == 1) {
					$captcha_sum = $captcha_sum + $captcha_rnd_3;
					$captcha_math_symbol_2 = "+";
				} else {
					$captcha_sum = $captcha_sum - $captcha_rnd_3;
					$captcha_math_symbol_2 = "-";
				}

				// generate formula for user
				$_SESSION['CAPTCHA_MATH'] = $captcha_rnd_1.$captcha_math_symbol_1.$captcha_rnd_2.$captcha_math_symbol_2.$captcha_rnd_3;
				$_SESSION['CAPTCHA_SUM'] = $captcha_sum;
			}
		}
	}

	// generate user_key
	if(!function_exists("generate_key_and_pw")) {
		function generate_key_and_pw($root_path, $mysqli, $name, $length, $area) {
			if($area == "adminpanel") {
				require($root_path."/includes/config.inc.php");
			} elseif($area = "user") {
				require($root_path."/includes/config.inc.php");
			}

			$key_pw_letters = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
			$key_pw_letters_small = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
			$key_pw_numbers = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
			$key_pw_special = array("!", "§", "$", "%", "&", "=", "?", "+", "*", "~", "#", "-", "@");

			for($i = 0, $key_pw = ""; strlen($key_pw) < $length; $i++) {
				// if you like to use special characters in your user_key
				// set the "3" in the following line to "4"
				$key_pw_random = mt_rand(1, 3);
				if($key_pw_random == 1) {
					$key_pw .= $key_pw_letters[mt_rand(0, (count($key_pw_letters))-1)];
				} elseif($key_pw_random == 2) {
					$key_pw .= $key_pw_letters_small[mt_rand(0, (count($key_pw_letters_small))-1)];
				} elseif($key_pw_random == 3) {
					$key_pw .= $key_pw_numbers[mt_rand(0, (count($key_pw_numbers))-1)];
				} else {
					$key_pw .= $key_pw_special[mt_rand(0, (count($key_pw_special))-1)];
				}
			}

			if(!empty($name)) {
				// save user_key for user in database
				mgb_sql_connect($mysqli, "UPDATE `".$db['prefix']."user` SET `user_key` = '".$key_pw."' WHERE `user_name` = ".$name." LIMIT 1", "Error while generating key/password.", 0);
			} else {
				return $key_pw;
			}
		}
	}

	// check session
	if(!function_exists("check_session")) {
		function check_session($mysqli, $sessid, $sessionkey, $sessionip, $timeout) {
			require("../includes/config.inc.php");
			$result = mgb_sql_connect($mysqli, "SELECT user_key, logged_in FROM ".$db['prefix']."user WHERE ID=".$sessid." LIMIT 1", "Error while loading user information.", 1);
			$user = mysqli_fetch_array($result, MYSQLI_ASSOC);

			$count_ok = 0;

			if($_SERVER['REMOTE_ADDR'] == $sessionip) {
				$count_ok++;
			}

			if($user['user_key'] == $sessionkey) {
				$count_ok++;
			}

			if(time() < ($user['logged_in'] + $timeout)) {
				mgb_sql_connect($mysqli, "UPDATE ".$db['prefix']."user SET `logged_in` = '".time()."' WHERE ID=".$sessid." LIMIT 1", "Error while updating user information.", 0);
				$count_ok++;
			}

			if($count_ok == 3) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}

	// check rights for access of several adminsites
	if(!function_exists("check_rights")) {
		function check_rights($mysqli, $site, $sessid) {
			require "../includes/config.inc.php";

			$result = mgb_sql_connect($mysqli, "SELECT user_level, r_settings, r_settings_database, r_activate, r_deactivate, r_delete, r_edit, r_spam, r_edit_smilies, r_banlists FROM ".$db['prefix']."user WHERE ID=".$sessid, "Error while checking user rights.", 1);
			$user = mysqli_fetch_array($result, MYSQLI_ASSOC);

			switch ($user['user_level']) {
				case 0:
					return TRUE;
					break;
				case 1:
					if($site == "settings_general" AND $user['r_settings'] == 1) {
						return TRUE;
					} elseif($site == "settings_security" AND $user['r_settings'] == 1) {
						return TRUE;
					} elseif($site == "settings_look" AND $user['r_settings'] == 1) {
						return TRUE;
					} elseif($site == "settings_bbcodes" AND $user['r_settings'] == 1) {
						return TRUE;
					} elseif($site == "settings_emoticons" AND $user['r_settings'] == 1) {
						return TRUE;
					} elseif($site == "settings_gravatar" AND $user['r_settings'] == 1) {
						return TRUE;
					} elseif($site == "settings_mails" AND $user['r_settings'] == 1) {
						return TRUE;
					} elseif($site == "settings_database" AND $user['r_settings_database'] == 1) {
						return TRUE;
					} elseif($site == "activate" AND $user['r_activate'] == 1) {
						return TRUE;
					} elseif($site == "deactivate" AND $user['r_deactivate'] == 1) {
						return TRUE;
					} elseif($site == "delete" AND $user['r_delete'] == 1) {
						return TRUE;
					} elseif($site == "edit" AND $user['r_edit'] == 1) {
						return TRUE;
					} elseif($site == "spam" AND $user['r_spam'] == 1) {
						return TRUE;
					} elseif($site == "spam_log" AND $user['r_spam'] == 1) {
						return TRUE;
					} elseif($site == "banlist_ips" AND $user['r_banlists'] == 1) {
						return TRUE;
					} elseif($site == "banlist_emails" AND $user['r_banlists'] == 1) {
						return TRUE;
					} elseif($site == "banlist_domains" AND $user['r_banlists'] == 1) {
						return TRUE;
					} elseif($site == "smilies" AND $user['r_edit_smilies'] == 1) {
						return TRUE;
					} elseif($site == "version") {
						return TRUE;
					} elseif($site == "editusers") {
						return FALSE;
					} else {
						return FALSE;
					}
					break;
			}
		}
	}

	// clean string
	if(!function_exists("cleanstr")) {
		function cleanstr($string) {
			if(empty($string)) { $string = ""; }
			$string = htmlspecialchars(stripslashes(strip_tags($string)), ENT_QUOTES, "UTF-8");
			return $string;
		}
	}

	// get version info with cURL
	if(!function_exists("get_mgb_version_info")) {
		function get_mgb_version_info($url) {
			if(function_exists("curl_init")) {
				$ch = curl_init($url);
				curl_setopt ($ch, CURLOPT_URL, $url);
				curl_setopt ($ch, CURLOPT_HEADER, 0);
				curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
				$result = curl_exec ($ch);
				curl_close ($ch);
				return $result;
			} else {
				$result = "error with php function curl";
				return $result;
			}
		}
	}

	// replace template placeholders
	if(!function_exists("template")) {
		function template($placeholder, $data, $content) {
			if(empty($data)) { $data = ""; }
			$content = preg_replace("/\{".$placeholder."\}/", $data, $content);
			return $content;
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

	// MGB_ERRORMESSAGE
	// CREATED / ADDED: 18.05.2013
	// DESCR: DELIVERS AN ERRORMESSAGE
	if(!function_exists("mgb_errormessage")) {
		function mgb_errormessage($errorcode, $language_path, $area) {
			if($area == "adminpanel") {
				include (MGB_ROOT.str_replace(MGB_ROOT, '', $language_path).'/lang_admin.php');
				$errormessage = $lang['errormessage'][$errorcode];
			} elseif($area == "user") {
				include (MGB_ROOT.str_replace(MGB_ROOT, '', $language_path).'/lang_main.php');
				if($errorcode != 4 AND $errorcode != 5 AND $errorcode != 15 AND $errorcode != 16) {
					$errormessage = $lang['errormessage'][$errorcode];
				} else {
					if($errorcode == 4) { // email not valid
						$errormessage = "{POST_EMAIL}&nbsp;".$lang['errormessage'][$errorcode];
					} elseif($errorcode == 5) { // icq# not valid
						$errormessage = "{POST_ICQ}&nbsp;".$lang['errormessage'][$errorcode];
					} elseif($errorcode == 15) { // facebook name not valid
						$errormessage = "{POST_FB}&nbsp;".$lang['errormessage'][$errorcode];
					} elseif($errorcode == 16) { // twitter name not valid
						$errormessage = "{POST_TWITTER}&nbsp;".$lang['errormessage'][$errorcode];
					}
				}
			}
			return $errormessage;
		}
	}

	// MGB_CHECK_BANLISTS
	// CREATED: 12.06.2013
	// DESCR: CHECKS IF A GIVEN IP, EMAIL ADDRESS OR DOMAIN IS ALREADY BANNED
	if(!function_exists("mgb_check_banlists")) {
		function mgb_check_banlists($mysqli, $user_ip, $user_email, $blocktime, $banlist_ips_active, $banlist_emails_active, $banlist_domains_active, $debug_mode) {
			require "config.inc.php";
			if($banlist_ips_active == 1) {
				if($debug_mode == 1 OR $debug_mode == 2) {
					echo "<span>---<br>";
					echo "<b>Bantime:</b> ".$blocktime."<br>";
					echo "<b>User IP:</b> ".$user_ip."<br>";
					echo "<b>User email:</b> ".$user_email."</span><br>";
				}
				// load banned ips out of the database
				$banned_ip = mgb_sql_connect($mysqli, "SELECT banned_ip, matches, timestamp FROM ".$db['prefix']."banlist_ips WHERE banned_ip = ".secure_value($user_ip), "Error while loading banned ips from ".$db['prefix']."banlist_ips.", 1);
				$ip = mysqli_fetch_array($banned_ip, MYSQLI_ASSOC);
				if($user_ip == $ip['banned_ip']) {
					if($debug_mode === 1 OR $debug_mode === 2) {
						echo "&nbsp;<span style='color: #FF0000'>IP: ".$user_ip."&nbsp;:&nbsp;".$ip['banned_ip']."</span>&nbsp;<span style='color: #00FF00'>Match!</span><br>";
					}

					if($blocktime != 99999999) { // 99999999 means banned forever
						$f_blocktime = time() - $ip['timestamp'];
						if($f_blocktime >= $blocktime) {
							$blocked = 0;
						} else {
							$blocked = 1;
						}
					} elseif($blocktime == 99999999) {
						$blocked = 1;
					}

					if($blocked = 1) {
						// update counter for banned ip
						$matches = $ip['matches'] + 1;
						mgb_sql_connect($mysqli, "UPDATE ".$db['prefix']."banlist_ips SET
							`matches` = '".$matches."'
							WHERE banned_ip=".secure_value($user_ip)." LIMIT 1", "Error while updating 'matches' in banlist ips.", 0);
					}
				} else {
					if($debug_mode == 1 OR $debug_mode == 2) {
						echo "&nbsp;<span>IP:</span>&nbsp;<span style='color: #228b22'>No Match!</span><br>";
					}
				}
			}

			if($banlist_emails_active == 1 AND $blocked == 0) {
				$banned_email = mgb_sql_connect($mysqli, "SELECT banned_email, matches, timestamp FROM ".$db['prefix']."banlist_emails WHERE banned_email = '".cleanstr($user_email)."'", "Error while loading banned emails from ".$db['prefix']."banlist_emails.", 1);
				$email = mysqli_fetch_array($banned_email, MYSQLI_ASSOC);
				if($user_email == $email['banned_email']) {
					if($debug_mode == 1 OR $debug_mode == 2) {
						echo "&nbsp;<span style='color: #FF0000'>eMail: ".$user_email."&nbsp;:&nbsp;".$email['banned_email']."</span>&nbsp;<span style='color: #00FF00'>Match!</span><br>";
					}

					if($blocktime != 99999999) { // 99999999 means banned forever
						$f_blocktime = time() - $email['timestamp'];
						if($f_blocktime >= $blocktime) {
							$blocked = 0;
						} else {
							$blocked = 2;
						}
					} else {
						$blocked = 2;
					}

					if($blocked = 2) {
						// update counter for banned email
						$matches = $email['matches'] + 1;
						mgb_sql_connect($mysqli, "UPDATE ".$db['prefix']."banlist_emails SET
							`matches` = '".$matches."'
							WHERE banned_email = ".secure_value($user_email)." LIMIT 1", "Error while updating 'matches' in banlist emails.", 0);
					}
				} else {
					if($debug_mode == 1 OR $debug_mode == 2) {
						echo "&nbsp;<span>eMail:</span>&nbsp;<span style='color: #228b22'>No Match!</span><br>";
					}
				}
			}

			if($banlist_domains_active == 1 AND $blocked == 0) {
				$user_domain = explode("@", $user_email);
				$banned_domain = mgb_sql_connect($mysqli, "SELECT banned_domain, matches, timestamp FROM ".$db['prefix']."banlist_domains WHERE banned_domain = '".cleanstr($user_domain[1])."'", "Error while loading banned domains from database.", 1);
				$domain = mysqli_fetch_array($banned_domain, MYSQLI_ASSOC);
				if($user_domain[1] == $domain['banned_domain']) {
					if($debug_mode == 1 OR $debug_mode == 2) {
						echo "&nbsp;<span style='color: #FF0000'>Domain: ".$user_domain[1]."&nbsp;:&nbsp;".$domain['banned_domain']."</span>&nbsp;<span style='color: #00FF00'>Match!</span><br>";
					}

					if($blocktime != 99999999) { // 99999999 means banned forever
						$f_blocktime = time() - $domain['timestamp'];
						if($f_blocktime >= $blocktime) {
							$blocked = 0;
						} else {
							$blocked = 3;
						}
					} else {
						$blocked = 3;
					}

					if($blocked = 3) {
						// update counter for banned domain
						$matches = $domain['matches'] + 1;
						mgb_sql_connect($mysqli, "UPDATE ".$db['prefix']."banlist_domains SET
							`matches` = '".$matches."'
							WHERE banned_domain = ".secure_value($user_domain[1])." LIMIT 1", "Error while updating 'matches' in banlist domains.", 0);
					}
				} else {
					if($debug_mode == 1 OR $debug_mode == 2) {
						echo "&nbsp;<span>Domain:</span>&nbsp;<span style='color: #228b22'>No Match!</span><br>";
					}
				}
			}

			if($debug_mode == 1 OR $debug_mode == 2 OR $debug_mode == 3) {
				if($blocked != 0) { $blocked_debug = "TRUE"; } else { $blocked_debug = "FALSE"; }
				echo "<br><span><b>User is banned:</b> ".$blocked_debug."</span><br><br>";
			}

			if(!empty($blocked)) {
				return $blocked;
			} else {
				return FALSE;
			}
		}
	}

	// MGB_SPAM_MAIL
	// CREATED: 01.03.2013
	// DESCR: INFORMS ADMIN ABOUT A NEW OR UPDATED SPAM ENTRY
	if(!function_exists("mgb_spam_mail")) {
		function mgb_spam_mail($charset, $gbmail, $spammail, $remote_addr, $name, $email, $hp, $http_user_agent, $counter, $id, $message, $source, $type, $mailer_method, $debug_mode) {
			// 1 = Neueintrag durch Absendesperre
			// 2 = Update durch Absendesperre
			// 3 = Neueintrag durch Akismet
			// 4 = Update durch Akismet
			// 5 = Update durch falsch eingegebenes Captcha
			// 6 = Update durch richtig eingegebenes Captcha (Eintrag war bereits vorhanden)
			$header = 'Content-Type: text/html; charset='.$charset."\r\n".'From: '.$gbmail."\r\n".'Reply-To: '.$spammail."\r\n".'X-Mailer: PHP/'.phpversion();
			if($type == 1) {
				$mailtext = $remote_addr." wurde NEU durch die ABSENDESPERRE eingetragen.<br><br>\n\n";
				$caption = $source.": Absendesperre, NEU"; }
			elseif($type == 2) {
				$mailtext = $remote_addr." wurde durch die ABSENDESPERRE AKTUALISIERT.<br><br>\n\n";
				$caption = $source.": Absendesperre, UPDATE"; }
			elseif($type == 3) {
				$mailtext = $remote_addr." wurde NEU durch AKISMET eingetragen.<br><br>\n\n";
				$caption = $source.": Akismet, NEU"; }
			elseif($type == 4) {
				$mailtext = $remote_addr." wurde durch AKISMET AKTUALISIERT.<br><br>\n\n";
				$caption = $source.": Akismet, UPDATE"; }
			elseif($type == 5) {
				$mailtext = $remote_addr." wurde NEU durch CAPTCHA eingetragen.<br><br>\n\n";
				$caption = $source.": Captcha, NEU"; }
			elseif($type == 6) {
				$mailtext = $remote_addr." wurde durch CAPTCHA AKTUALISIERT.<br><br>\n\n";
				$caption = $source.": Captcha, UPDATE"; }
			elseif($type == 7) {
				$mailtext = $remote_addr." hat das CAPTCHA richtig eingegeben, ist jedoch bereits in der Spamliste vorhanden!<br><br>\n\n";
				$caption = $source.": Captcha richtig. Auf Spamliste gefunden, daher UPDATE"; }
			$mailtext.= "IP: ".$remote_addr."<br>\n";
			$mailtext.= "Name: ".$name."<br>\n";
			$mailtext.= "eMail: ".$email."<br>\n";
			$mailtext.= "Homepage: ".$hp."<br>\n";
			$mailtext.= "User-Agent: ".$http_user_agent."<br>\n";
			if(isset($counter) AND $counter != "")
				{
				$mailtext.= "Counter: ".$counter."<br>\n";
				}
			if(isset($id) AND $id != "")
				{
				$mailtext.= "ID: ".$id."<br>\n\n";
				}
			$mailtext.= "<br>Text: ".$message;

			if($mailer_method == 0) {
				@mail($spammail, $caption, $mailtext, $header);
			} else {
				mgb_phpmailer($spammail, $caption, $mailtext, $debug_mode, "user", $language_short);
			}
		}
	}

	// MGB_MODERN_TIMESTAMP
	// CREATED: 30.05.2013
	// DESCR: SHOWS A MORE BEAUTIFUL TIMESTAMP
	if(!function_exists("mgb_modern_timestamp")) {
		function mgb_modern_timestamp($timestamp, $language_path, $area) {
			if($area == "adminpanel") {
				include('../language/'.$language_path.'/lang_admin.php');
			} elseif($area == "user") {
				include('language/'.$language_path.'/lang_admin.php');
			}
			
			// initiate variables
			$timecode_less_than = "";

			// calculate timecode
			$time_in_list = time() - $timestamp;

			if($time_in_list <= 60) {
					$timecode = "&nbsp;".$lang['time_seconds'];
				}
			elseif($time_in_list <= 7200) {
				$time_in_list = $time_in_list / 60;
				if($time_in_list < 1) {
					$timecode_less_than = "ca.&nbsp;";
					$timecode = "&nbsp;".$lang['time_minute'];
				} elseif(ceil($time_in_list) == 1) {
					$timecode = "&nbsp;".$lang['time_minute'];
				} else {
					$timecode = "&nbsp;".$lang['time_minutes'];
				}
			} elseif($time_in_list <= 86400) {
				$time_in_list = $time_in_list / 3600;
				if(ceil($time_in_list) == 1) {
					$timecode = "&nbsp;".$lang['time_hour'];
				} else {
					$timecode = "&nbsp;".$lang['time_hours'];
				}
			} elseif($time_in_list <= 2592000) {
				$time_in_list = $time_in_list / 86400;
				if(ceil($time_in_list) == 1) {
					$timecode = "&nbsp;".$lang['time_day'];
				} else {
					$timecode = "&nbsp;".$lang['time_days'];
				}
			} elseif($time_in_list <= 31104000) {
				$time_in_list = $time_in_list / 2592000;
				if(ceil($time_in_list) == 1) {
					$timecode = "&nbsp;".$lang['time_month'];
				} else {
					$timecode = "&nbsp;".$lang['time_months'];
				}
			} elseif($time_in_list > 31104000) {
				$time_in_list = $time_in_list / 31104000;
				if(ceil($time_in_list) == 1) {
					$timecode = "&nbsp;".$lang['time_year'];
				} else {
					$timecode = "&nbsp;".$lang['time_years'];
				}
			}

			$entry_timestamp = $timecode_less_than.ceil($time_in_list).$timecode;

			return $entry_timestamp;
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

	// MGB_REMOVE_EVIL_THINGS
	// CREATED: DON'T KNOW
	// DESCR: REMOVES EVIL THINGS, YOU KNOW?
	if(!function_exists("mgb_remove_evil_things")) {
		function mgb_remove_evil_things($string, $evil_thing) {
			$cleaned_string = preg_replace("/".$evil_thing."/", "", $string);
			return $cleaned_string;
		}
	}

	// MGB_GET_LANGUAGE_PATH
	// CREATED: 06.09.2013
	// DESCR: GETS NAMES OF LANGUAGE DIRECTORIES AND DELIVERS THEM BACK WHERE THEY ARE NEEDED
	if(!function_exists("mgb_get_language_path")) {
		function mgb_get_language_path($lang_short) {
			// get names of languages
			$path = "language/";
			foreach (glob($path."*") as $filename) {
				if($filename != "." && $filename != "..") {
					if(is_dir($filename)) {
						include ($filename."/settings.php");
						if(!empty($charset) AND $charset == "utf-8") {
							// only utf-8 languages are loaded into the guestbook
							if(!empty($language_short_mgb)) {
								if($lang_short == $language_short_mgb) {
									$lang_name = $filename;
								}
							} else {
								if($lang_short == $language_short) {
									$lang_name = $filename;
								} else {
									if(empty($lang_name)) {
										$lang_name = "lang_german_utf8";
									}
								}
							}
						}
					}
				}
			}
			$lang_name = preg_replace("/language\//", "", $lang_name);
			return $lang_name;
		}
	}

	// MGB_PHPMAILER
	// CREATED: 09.09.2013, 23:16
	// DESCR: SENDS MAILS OVER PHPMAILER
	/* if(!function_exists("mgb_phpmailer")) {
		function mgb_phpmailer($email, $reply_email, $name, $sender, $caption, $mailtext, $debug, $area, $language_short, $charset) {
			if($area == "user") {
				include 'includes/config.inc.php';
				include 'includes/load_settings.inc.php';
			} elseif($area == "adminpanel") {
				include '../includes/config.inc.php';
				include '../includes/load_settings.inc.php';
			}

			$data = array();
			$data['smtp'] = array();
			$data['smtp']['host'] = $settings['smtp_server'];
			$data['smtp']['port'] = $settings['smtp_port'];
			$data['smtp']['username'] = $settings['smtp_user'];
			$data['smtp']['password'] = $settings['smtp_password'];

			if(empty($sender)) {
				$sender = "MGB OpenSource Guestbook";
			}

			$data['from'] = array('name' => $sender, 'email' => $settings['smtp_user']);
			$data['to'] = array('name' => $name, 'email' => $email);
			$data['charset'] = $charset;
			$data['subject'] = $caption;
			$data['html'] = '';
			$data['text'] = $mailtext;

			if($settings['smtp_auth'] == 1) {
				$smtp_auth = true;
			} else {
				$smtp_auth = false;
			}

			// load phpmailer
			// namespace MGBOpensourceGuestbook;
			// require 'vendor/autoload.php';

			if($area == "user") {
				require 'plugins/phpmailer/src/Exception.php';
				require 'plugins/phpmailer/src/PHPMailer.php';
				require 'plugins/phpmailer/src/SMTP.php';
			} elseif($area == "adminpanel") {
				require '../plugins/phpmailer/src/Exception.php';
				require '../plugins/phpmailer/src/PHPMailer.php';
				require '../plugins/phpmailer/src/SMTP.php';
			}
			
			// use PHPMailer\PHPMailer\PHPMailer;
			// use PHPMailer\PHPMailer\SMTP;

			$mail = new PHPMailer(true);

			if($area == "user") {
				$mail->SetLanguage ($language_short, "plugins/phpmailer/language/");
			} elseif($area == "adminpanel") {
				$mail->SetLanguage ($language_short, "../plugins/phpmailer/language/");
			}

			if(!empty($debug)) {
				$mail->SMTPDebug	= SMTP::DEBUG_SERVER;
				$mail->Debugoutput	= "html";
			} else {
				$mail->SMTPDebug	= false;
			}

			// Server-Zugangsdaten setzen
			$mail->IsSMTP();

			$mail->SMTPAuth 	= $settings['smtp_auth'];
			$mail->Host     	= $data['smtp']['host'];
			$mail->Username 	= $data['smtp']['username'];
			$mail->Password 	= $data['smtp']['password'];
			$mail->SMTPSecure   = PHPMailer::ENCRYPTION_SMTPS;
			$mail->Port     	= $data['smtp']['port'];
			
			// Empfänger
			$mail->setFrom($data['from']['email'], $data['from']['name']);	// Absender setzen
			$mail->AddAddress($data['to']['email'], $data['to']['name']);	// Empfänger hinzufügen
			$mail->AddReplyTo($reply_email, $name);

			// Inhalt
			$mail->IsHTML(false);						// do not send as html, send plain text
			// $mail->CharSet 	= $data['charset'];		// Charset festlegen
			$mail->Subject  	= $data['subject'];		// Betreff setzen
			$mail->AltBody     	= $data['text'];		// Nachricht setzen

			$error = array();

			// Email absenden
			if(!$mail->send()) {
				$error[0] = 0;
				$error[1] = $mail->ErrorInfo;
				return $error;
			} else {
				$error[0] = 1;
				return $error;
			}
		}
	} */

	// MGB_GET_KEYSTROKES by R.W. modified by mopzz
	// CREATED: 11.09.2013, 17:52
	// DESCR: DETECTS SPAM BY THE NUMBER OF KEYSTROKES IN TIME

	if(!function_exists("mgb_get_keystrokes")) {
		function mgb_get_keystrokes($keystroke_max_cps, $keystroke_ban_time, $dynamic_fieldnames, $debug) {
			if($dynamic_fieldnames == 1) {
			$ignore_field = array (
				'send',
				'preview',
				'sent',
				'user_notification',
				'user_show_email',
				'recaptcha_challenge_field',
				'send_mail_button',
				'user_sendcopytome',
				'refresh_captcha',
				'textsize',
				'textcolor',
				'name',
				'city',
				'email',
				'aim',
				'icq',
				'msn',
				'fb',
				'twitter',
				'hp',
				'captcha',
				'g-recaptcha-response');
			} else {
			$ignore_field = array (
				'send',
				'preview',
				'sent',
				'user_notification',
				'user_show_email',
				'recaptcha_challenge_field',
				'send_mail_button',
				'user_sendcopytome',
				'refresh_captcha',
				'textsize',
				'textcolor',
				'g-recaptcha-response');
			}

			$formular_send_time = time();
			if(empty($_SESSION['keystroke_time'])) {
				$difference = $formular_send_time - $_SESSION['start_time'];
			} else {
				$difference = $formular_send_time - $_SESSION['keystroke_time'];
			}

			if ($difference == 0) { $difference = 0.1; }

			if($debug == 2) {
				echo "<pre>\n";
			}

			$str = '';
			foreach ($_POST as $key => $value) {
				if(!in_array($key, $ignore_field)) {
					if($debug == 2) {
						echo "key: ".$key." :: "."value: ".$value."<br>\n";
					}
					$str .= $value;
				}
			}

			if($debug == 2) {
				echo "</pre>\n";
			}

			$strlength = strlen($str);
			$charspersecond = $strlength / $difference;

			if(!empty($debug)) {
				echo "<pre>";
				echo '<span>session start time: <b>'.$_SESSION['start_time']."</b><br>";
				echo 'formular send time: <b>'.$formular_send_time."</b><br>";
				echo '$keystroke_max_cps: <b>'.$keystroke_max_cps."</b><br>";
				echo '$keystroke_ban_time: <b>'.$keystroke_ban_time."</b><br>";
				echo "Time elapsed: <b>".$difference."</b><br>";
				echo "Characters: <b>".$strlength."</b><br>";
				echo "Keystrokes / second: <b>".$charspersecond."</b><br>";
				echo "Text: <b>".$str."</b></span>";
				echo "</pre>";
			}

			if($charspersecond < $keystroke_max_cps) {
				$_SESSION['keystroke_time'] = time();
				return true;
			} else {
				$_SESSION['keystroke_time'] = time();
				$_SESSION['keystroke_ban_time'] = time() + $keystroke_ban_time;
				return false;
			}
		}
	}

	// MGB_ERASE_CACHE
	// CREATED: 22.09.2013, 07:32
	// INFO: ERASES ALL CACHE FILES IF NECESSARY

	if(!function_exists("mgb_erase_cache")) {
		function mgb_erase_cache($path) {
			$count = 0;
			foreach(glob($path."*.html") as $filename) {
				$count++;
				if($filename != "." && $filename != "..") {
					if(file_exists($filename) AND !is_dir($filename) AND preg_match("/cache/", $filename)) {
						unlink($filename);
					}
				}
			}
		}
	}

	// MGB_ECHO
	// CREATED: 22.09.2013, 09:44
	// INFO: RETURNS SOME NICER ECHO

	if(!function_exists("mgb_echo")) {
		function mgb_echo($var) {
			echo "<pre>\n";
			print_r($var);
			echo "</pre>\n";
		}
	}

	// MGB_HTTP_REFERER
	// CREATED: 26.10.2013, 08:15
	// CHECKS IF IT IS A DIRECT ACCESS TO THE SCRIPT AND IF THIS IS FORBIDDEN

	if(!function_exists("mgb_http_referer")) {
		function mgb_http_referer($mysqli, $direct_access_text, $search_engines_excluded, $search_engines, $banlist_log, $HTTP_REFERER, $HTTP_USER_AGENT, $REMOTE_ADDR, $db_prefix, $site_name, $debug_mode) {
			if(!empty($direct_access_text) AND !empty($HTTP_REFERER)) {
				$search_pattern = explode(",", $direct_access_text);
				foreach($search_pattern as $key) {
					$key = str_replace("/", "\/", $key);
					$key = "/".trim($key)."/i"; // trim() removes spaces at the start and end of a string

					if(!preg_match($key, $HTTP_REFERER)) {
						if($blocked != "FALSE") {
							$blocked = "TRUE"; // http referer doesn't match
						}
					} else {
						$blocked = "FALSE"; // http referer matches
					}

					// check if user is a valid search engine
					$isSearchEngine = "";
					if(!empty($search_engines)) {
						$search_engines = explode(",", $search_engines);

						foreach($search_engines as $searchbot) {
							$searchbot = str_replace("/", "\/", $searchbot);
							$searchbot = "/".trim($searchbot)."/i"; // trim() removes spaces at the start and end of a string
							if(preg_match($searchbot, $HTTP_USER_AGENT)) {
								$blocked = "FALSE"; // valid search engine
								$isSearchEngine = "TRUE";
							} else {
								if($isSearchEngine != "TRUE") {
									$isSearchEngine = "FALSE"; // no valid search engine, block user
								}
							}
						}
					}

					if(!empty($debug_mode)) {
						mgb_echo(	"HTTP_REFERER: ".$HTTP_REFERER."
									<br>SEARCH PATTERN: ".$key."
									<br>BLOCKED BY WRONG OR FALSE HTTP_REFERER: ".$blocked."
									<br>USER IS SEARCH ENGINE: ".$isSearchEngine
						);
					}

					if($blocked == "TRUE") { // a not valid domain links directly to newentry.php or email.php
						if(!empty($banlist_log)) {
							mgb_sql_connect($mysqli, "INSERT INTO ".$db_prefix."spam_log (
								ID ,
								ip ,
								name ,
								email ,
								user_agent ,
								http_referer ,
								hp ,
								message ,
								type ,
								site ,
								timestamp
								) values (
								NULL ,
								'".$REMOTE_ADDR."' ,
								'' ,
								'' ,
								'".$HTTP_USER_AGENT."' ,
								'".$HTTP_REFERER."' ,
								'' ,
								'' ,
								'12' ,
								'".$site_name."' ,
								'".time()."')", "ERROR while saving data into spam_log.", 0);
						}
						return FALSE;
					} else {
						return TRUE;
					}
				}
			} else {
				if(empty($HTTP_REFERER)) { // direct call of newentry.php or email.php
					// check if user is a valid search engine
					$isSearchEngine = "";
					if($search_engines_excluded != 0 AND !empty($search_engines)) {
						$search_engines = explode(",", $search_engines);
						foreach($search_engines as $searchbot) {
							$searchbot = str_replace("/", "\/", $searchbot);
							$searchbot = "/".trim($searchbot)."/i"; // trim() removes spaces at the start and end of a string
							if(preg_match($searchbot, $HTTP_USER_AGENT)) {
								$isSearchEngine = 1; // valid search engine
							} else {
								if($isSearchEngine != 1) {
									$isSearchEngine = 0; // no valid search engine, block user
								}
							}
						}
					}

					if($isSearchEngine == 0 AND !empty($banlist_log)) {
						mgb_sql_connect($mysqli, "INSERT INTO ".$db_prefix."spam_log (
							ID ,
							ip ,
							name ,
							email ,
							user_agent ,
							http_referer ,
							hp ,
							message ,
							type ,
							site ,
							timestamp
							) values (
							NULL ,
							'".$REMOTE_ADDR."' ,
							'' ,
							'' ,
							'".$HTTP_USER_AGENT."' ,
							'".$HTTP_REFERER."' ,
							'' ,
							'' ,
							'13' ,
							'".$site_name."' ,
							'".time()."')", "ERROR while saving data into spam_log.", 0);
					}

					if($isSearchEngine == 0 OR $search_engines_excluded == 0) {
						return FALSE;
					} else {
						return TRUE;
					}
				} else {
					return TRUE;
				}
			}
		}
	}

	// MGB_REPORT_SPAM
	// DESCR: REPORTS SPAM TO STOPFORUMSPAM.COM
	// CREATED: 29.10.2013, 20:11

	if(!function_exists("mgb_report_spam")) {
		function mgb_report_spam($data) {
			$host = "www.stopforumspam.com";
			$port = 80;
			$url = "/add.php";
			$timeout = 30;

			$fp = fsockopen($host, $port, $errno, $errstr, $timeout);
			if($fp) {
				fputs($fp, "POST ".$url." HTTP/1.1\r\n" );
				fputs($fp, "Host: ".$host."\r\n" );
				fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n" );
				fputs($fp, "Content-length: ".strlen($data)."\n" );
				fputs($fp, "Connection: Close\r\n\r\n" );
				fputs($fp, $data);
				fclose($fp);
			} else {
				return $errno.": ".$errstr;
			}
		}
	}

	// MGB_SPAM_REQUEST
	// DESCR: ASKS STOPFORUMSPAM.COM IF USER IP IS AS SPAM IP ALREADY KNOWN
	// CREATED: 29.10.2013, 21:44

	if(!function_exists("mgb_spam_request")) {
		function mgb_spam_request($name, $email, $ip, $username_frequency, $email_frequency, $ip_frequency, $username_required, $email_required, $ip_required) {
			if(function_exists("json_decode") AND function_exists("file_get_contents")) {
				$spam_request = json_decode(file_get_contents('http://www.stopforumspam.com/api?username='.$name.'&email='.$email.'&ip='.$ip.'&f=json&unix'), true);
				$blocked = 0;
				if(empty($spam_request['username']['frequency'])) { $spam_request['username']['frequency'] = ""; } 
				if($spam_request['username']['frequency'] >= $username_frequency AND $username_required == 1) {
					$blocked++;
				}
				if(empty($spam_request['email']['frequency'])) { $spam_request['email']['frequency'] = ""; }
				if($spam_request['email']['frequency'] >= $email_frequency AND $email_required == 1) {
					$blocked++;
				}
				if(empty($spam_request['ip']['frequency'])) { $spam_request['ip']['frequency'] = ""; }
				if($spam_request['ip']['frequency'] >= $ip_frequency AND $ip_required == 1) {
					$blocked++;
				}
				$for_ban_required = $username_required + $email_required + $ip_required;
				if($blocked >= $for_ban_required) {
					return 1;
				} else {
					return 0;
				}
			}
		}
	}

	// MGB_IPV6
	// DESCR: CHECKS AN IP ADDRESS IF IT IS IPV6 VALID
	// CREATED: 16.11.2013
	// THIS FUNCTION WAS ORIGINALLY CREATED BY MEBSD.COM. YOU CAN FIND THE ORIGINALLY POST HERE: https://mebsd.com/coding-snipits/php-regex-ipv6-with-preg_match-revisited.html

	if(!function_exists("mgb_ipv6")) {
		function mgb_ipv6($ip) {
			$regex = '/^(((?=(?>.*?(::))(?!.+\3)))\3?|([\dA-F]{1,4}(\3|:(?!$)|$)|\2))(?4){5}((?4){2}|(25[0-5]|(2[0-4]|1\d|[1-9])?\d)(\.(?7)){3})\z/i';
			if(!preg_match($regex, $ip)) {
				return (false); // is not a valid IPv6 Address
			} else {
				return (true);
			}
		}
	}

	// MGB_CAPTCHA_RANDOM_NUMBER
	// DESCR: CREATES RANDOM NUMBERS FOR MGB CAPTCHA
	// CREATED: 03.02.2015

	if(!function_exists("mgb_captcha_random_number")) {
		function mgb_captcha_random_number($type) {
			// types:
			// 1 = x angle for drawing lines #1
			// 2 = y angle for drawing lines #1
			// 3 = x angle for drawing lines #2
			// 4 = y angle for drawing lines #2
			if($type == 1) {
				$nr = mt_rand(1, 60);
			} elseif ($type == 2) {
				$nr = mt_rand(1, 40);
			} elseif ($type == 3) {
				$nr = mt_rand(60, 140);
			} elseif ($type == 4) {
				$nr = mt_rand(1, 40);
			}

			return $nr;
		}
	}

	// MGB_RGB2HTML
	// DESCR: CONVERTS RGB COLOR TO HTML COLOR
	// CREATED: 03.02.2015
	// TAKEN FROM: http://www.anyexample.com/programming/php/php_convert_rgb_from_to_html_hex_color.xml | Thank you! :)

	if(!function_exists("mgb_rgb2html")) {
		function mgb_rgb2html($r, $g=-1, $b=-1) {
    		if (is_array($r) && sizeof($r) == 3) {
        		list($r, $g, $b) = $r;
        	}

    		$r = intval($r); $g = intval($g);
    		$b = intval($b);

    		$r = dechex($r<0?0:($r>255?255:$r));
    		$g = dechex($g<0?0:($g>255?255:$g));
    		$b = dechex($b<0?0:($b>255?255:$b));

    		$color = (strlen($r) < 2?'0':'').$r;
    		$color .= (strlen($g) < 2?'0':'').$g;
    		$color .= (strlen($b) < 2?'0':'').$b;

    		return $color;
		}
	}

	// MGB_LOGIN_FAIL
	// DESCR:
	// CREATED: 23.02.2015

	if(!function_exists("mgb_login_fail")) {
		function mgb_login_fail($login_fail) {
			if(empty($login_fail)) {
				$login_fail = time() + 2;
			} elseif ($login_fail === 2) {
				$login_fail = $login_fail + time() + 2;
			}
		}
	}

	// MGB_TRIGGER_SYS_LOG_EVENT
	// DESCR: writes the system log
	// CREATED: 30.09.2015

	if(!function_exists("mgb_trigger_sys_log")) {
		function mgb_trigger_sys_log($mysqli, $type, $name, $email, $text, $user, $user_new, $user_edit, $ip, $db_prefix) {
			$sql = "INSERT INTO ".$db_prefix."sys_log (
				type,
				name,
				email,
				text,
				user,
				user_new,
				user_edit,
				ip,
				timestamp )
				values (
				'".$type."',
				'".$name."',
				'".$email."',
				'".$text."',
				'".$user."',
				'".$user_new."',
				'".$user_edit."',
				'".$ip."',
				'".time()."' )";
			mgb_sql_connect($mysqli, $sql, "Error while saving data into ".$db_prefix."sys_log.", 0);
		}
	}
	
	// MGB_FILE_GET_CONTENTS_CURL
	// DESCR: gets content of ssl files // thanks to Ben Shoval https://stackoverflow.com/a/40311146
	// CREATED: 18.11.2021
	
	if(!function_exists("mgb_file_get_contents_curl")) {
		function mgb_file_get_contents_curl($url) {
			$ch = curl_init();

			curl_setopt( $ch, CURLOPT_AUTOREFERER, TRUE );
			curl_setopt( $ch, CURLOPT_HEADER, 0 );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt( $ch, CURLOPT_URL, $url );
			curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, TRUE );

			$data = curl_exec( $ch );
			curl_close( $ch );

			return $data;
		}
	}
	
	// MGB_IS_HTTPS
	// DESCR: detects if the connection is secured by https or not // thanks to "ling" @stackoverflow https://stackoverflow.com/users/405042/ling
	// CREATED: 14.02.2023
	
	if(!function_exists("mgb_isHttps")) {
		function mgb_isHttps() {
			if (array_key_exists("HTTPS", $_SERVER) && 'on' === $_SERVER["HTTPS"]) {
				return "https";
			}
			if (array_key_exists("SERVER_PORT", $_SERVER) && 443 === (int)$_SERVER["SERVER_PORT"]) {
				return "https";
			}
			if (array_key_exists("HTTP_X_FORWARDED_SSL", $_SERVER) && 'on' === $_SERVER["HTTP_X_FORWARDED_SSL"]) {
				return "https";
			}
			if (array_key_exists("HTTP_X_FORWARDED_PROTO", $_SERVER) && 'https' === $_SERVER["HTTP_X_FORWARDED_PROTO"]) {
				return "https";
			}
			return "http";
		}
	}
	
	// MGB_FORMATFILESIZE
	// INFO: makes a file size easier to read for humans 
	// CREATED: 08.01.2026

	if(!function_exists("mgb_formatFilesize")) {
		function mgb_formatFilesize(int $bytes): string {
			$units = ['B', 'KB', 'MB', 'GB', 'TB'];

			for ($i = 0; $bytes >= 1024 && $i < count($units) - 1; $i++) {
				$bytes /= 1024;
			}

			return round($bytes, 2) . ' ' . $units[$i];
		}
	}
	
	// MGB_SEND_TELEMETRY
	// INFO: sends a anonymous ping to m-gb.org
	// CREATED: 15.01.2026
	
	if(!function_exists("mgb_send_telemetry")) {
		function mgb_send_telemetry($telemetry_enabled, $telemetry_last_ping, $mgb_version, $mysql_client, $db_prefix, $install_id, $ping_address, $mysqli, $last_seen) {
			if (empty($telemetry_enabled)) {
			return;
			}

			if (!empty($telemetry_last_ping) && time() - $telemetry_last_ping < $last_seen) { // 1 day = 86400 seconds
			return;
			}

			$data = [
				'software'   => 'MGB',
				'version'    => $mgb_version,
				'php'        => phpversion(),
				'db'         => $mysql_client,
				'install_id' => $install_id,
				'timestamp'  => time()
			];

			$context = stream_context_create([
				'http' => [
				'method'  => 'POST',
				'header'  => "Content-Type: application/json\r\n",
				'timeout' => 3,
				'content' => json_encode($data)
				]
			]);

			@file_get_contents($ping_address, false, $context);

			// Timestamp speichern
			mgb_sql_connect($mysqli, "UPDATE ".$db_prefix."settings SET aus_last_ping=".time(), "Error updating telemetry ping", 0);
		}
	}
?>
