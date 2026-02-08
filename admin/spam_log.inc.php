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
	*/

	// ================ //
	// spam_log.inc.php //
	// ================ //
	//
	// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //
	
	// REASONS FOR DENIAL
	/* 
	type = 1  = blocked by ip
	type = 2  = known at stopforumspam.com
	type = 3  = blocked by email
	type = 4  = blocked by domain
	type = 5  = Absendesperre
	type = 6  = updated by Akismet
	type = 7  = new entry by Akismet
	type = 8  = updated by wrong captcha
	type = 9  = captcha wrong
	type = 10 = captcha ok, but already on spam-list
	type = 11 = too fast typing
	type = 12 = http_referer wrong
	type = 13 = forbidden direct access
	*/

	// make sure nobody has direct access to this script
	if (!defined('ADMINISTRATION')) {
		include ("error.html");
		die();
	} else {
		if(check_rights($mysqli, $_GET['action'], $_SESSION['user_ID'])) {
			// load config, settings and language files
			require_once (MGB_ROOT."includes/config.inc.php");
			require_once (MGB_ROOT."includes/load_settings.inc.php");
			require_once (MGB_ROOT."language/".$settings['language_path']."/lang_admin.php");
			// load templates
			$content_spam_log = mgb_load_template("admin", "default", "spam_log", $settings['debug_mode']);

			// set number of site to "1" if it is "0"
			if(!isset($_GET['p'])) { $_GET['p'] = 1; }

			if(empty($_POST['dropbox'])) { $_POST['dropbox'] = ""; }
			$delete_everything = 0;
			
			// PUT ALL ENTRIES ON IP BANLIST 2.0 - NOW WITH MOOOOOREEEE SPEEEEEEED!!!
			if((!empty($_POST['dropbox']) AND $_POST['dropbox'] == 2) OR (!empty($_POST['dropbox']) AND $_POST['dropbox'] == 4)) {
				$script_time_start = microtime(true);
				$entry_counter = 0;
				$ips = array();
				
				// 1. Alle Spam-IPs auf einmal laden
				$spam_ips = [];
				$result = mgb_sql_connect($mysqli, "SELECT ip FROM ".$db['prefix']."spam_log WHERE type IN (3, 4, 9, 11, 12, 13)", "Error while loading IPs from spam log.", 1, null, null);
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					$spam_ips[] = $row['ip'];
				}

				// 2. Alle bereits gebannten IPs auf einmal laden
				$banned_ips = [];
				$result = mgb_sql_connect($mysqli, "SELECT banned_ip FROM ".$db['prefix']."banlist_ips", "Error while loading banned IPs.", 1, null, null);
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					$banned_ips[] = $row['banned_ip'];
				}

				// 3. IPs vergleichen und neue Bans einfügen
				$new_bans = array_diff($spam_ips, $banned_ips);
				$entry_counter = count($new_bans);
				
				if($settings['debug_mode'] === 1 OR $settings['debug_mode'] === 2) {
					$spam_ips_count = count($spam_ips);
					$banned_ips_count = count($banned_ips);
					mgb_echo("IPs in der Liste: ".$spam_ips_count."<br>Bereits gebannte IPs: ".$banned_ips_count."<br>Neue IPs: ".$entry_counter."<br><br>"
					);
				}

				if (!empty($new_bans)) {
					$insert_values = [];
					foreach ($new_bans as $ip) {
						$insert_values[] = "(
							'$ip',
							'0',
							'".time()."'
						)";
					}
					// Alle neuen Bans in EINER Abfrage einfügen
					$sql = "INSERT INTO ".$db['prefix']."banlist_ips (
						banned_ip, matches, timestamp
					) VALUES ".implode(", ", $insert_values);
					mgb_sql_connect($mysqli, $sql, "Error while inserting new banned IPs.", 0, null, null);
				}
				
				// stop time measuring
				$script_time_end = microtime(true);
				$script_time = $script_time_end - $script_time_start;
				
				if($entry_counter > 0) {
					$template_message.= $lang['updated_ips']."<br>";
					$template_message = mgb_template_replace([
						'COUNTER' 	=> $entry_counter,
						'TIME' 		=> round($script_time, 3)
					], $template_message);
				} else {					
					$template_message.= $lang['spam_all_ips_on_ip_list']."<br>";
				}

				if($_POST['dropbox'] == 4) {
					$delete_everything++;
				}
			}

			// PUT ALL ENTRIES ON E-MAIL BANLIST
			if((!empty($_POST['dropbox']) AND $_POST['dropbox'] == 3) OR (!empty($_POST['dropbox']) AND $_POST['dropbox'] == 4)) {
				$script_time_start = microtime(true);
				$entry_counter = 0;
				$emails = array();
				
				// 1. load all spam mails at once
				$spam_emails = [];
				$result = mgb_sql_connect($mysqli, "SELECT email FROM ".$db['prefix']."spam_log WHERE type IN (1, 3, 4, 9, 11)", "Error while loading emails from spam log.", 1, null, null);
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					$spam_emails[] = $row['email'];
				}

				// 2. load all banned mails at once
				$banned_emails = [];
				$result = mgb_sql_connect($mysqli, "SELECT banned_email FROM ".$db['prefix']."banlist_emails", "Error while loading banned emails.", 1, null, null);
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					$banned_emails[] = $row['banned_email'];
				}

				// 3. compare emails and save new mails to database
				$new_bans = array_diff($spam_emails, $banned_emails);
				$entry_counter = count($new_bans);
				
				if($settings['debug_mode'] === 1 OR $settings['debug_mode'] === 2) {
					$spam_emails_count = count($spam_emails);
					$banned_emails_count = count($banned_emails);
					mgb_echo("E-Mails in der Liste: ".$spam_emails_count."<br>Bereits gebannte E-Mails: ".$banned_emails_count."<br>Neue E-Mails: ".$entry_counter."<br><br>"
					);
				}

				if (!empty($new_bans)) {
					$insert_values = [];
					foreach ($new_bans as $email) {
						$insert_values[] = "(
							'$email',
							'0',
							'".time()."'
						)";
					}
					// Alle neuen Bans in EINER Abfrage einfügen
					$sql = "INSERT INTO ".$db['prefix']."banlist_emails (
						banned_email, matches, timestamp
					) VALUES ".implode(", ", $insert_values);
					mgb_sql_connect($mysqli, $sql, "Error while inserting new banned emails.", 0, null, null);
				}
				
				// stop time measuring
				$script_time_end = microtime(true);
				$script_time = $script_time_end - $script_time_start;
				
				if($entry_counter > 0) {
					$template_message.= $lang['updated_emails']."<br>";
					$template_message = mgb_template_replace([
						'COUNTER' 	=> $entry_counter,
						'TIME' 		=> round($script_time, 3)
					], $template_message);
				} else {					
					$template_message.= $lang['spam_all_emails_on_email_list']."<br>";
				}

				if($_POST['dropbox'] == 4) {
					$delete_everything++;
				}
			}

			// PUT ALL ENTRIES ON DOMAIN BANLIST
			if((!empty($_POST['dropbox']) AND $_POST['dropbox'] == 10) OR (!empty($_POST['dropbox']) AND $_POST['dropbox'] == 4)) {
				$script_time_start = microtime(true);
				$entry_counter = 0;
				$emails = array();
				
				// load all spam domains at once
				$spam_emails = [];
				$result = mgb_sql_connect($mysqli, "SELECT email FROM ".$db['prefix']."spam_log", "Error while loading emails from spam log.", 1, null, null); //  WHERE type IN (2, 3, 5, 9, 10, 11)
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					$email = $row['email'];
					if(!empty($settings['debug_mode'])) { mgb_echo("email: ".$email."<br>"); }
					$spam_emails[] = $email;
				}
				
				// extract domains
				$spam_domains = [];
				foreach ($spam_emails as $email) {
					$parts = explode("@", $email);
					if (count($parts) === 2) { 
						$domain = strtolower(trim($parts[1])); // without whitespaces and lowercase
						if(!empty($settings['debug_mode'])) { mgb_echo("domain: ".$domain."<br>"); }
						$spam_domains[] = $domain;
					}
				}
				
				// extract double domains
				$unique_domains = array_unique($spam_domains);

				// load all banned domains at once
				$banned_domains = [];
				$result = mgb_sql_connect($mysqli, "SELECT banned_domain FROM ".$db['prefix']."banlist_domains", "Error while loading banned domains.", 1, null, null);
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					$banned_domains[] = $row['banned_domain'];
				}

				// compare domains and save new domains to database
				$new_bans = array_diff($unique_domains, $banned_domains);
				$entry_counter = count($new_bans);
				
				if($settings['debug_mode'] === 1 OR $settings['debug_mode'] === 2) {
					$spam_domains_count = count($spam_domains);
					$banned_domains_count = count($banned_domains);
					mgb_echo("Domains in der Liste: ".$spam_domains_count."<br>Bereits gebannte Domains: ".$banned_domains_count."<br>Neue Domains: ".$entry_counter."<br><br>"
					);
				}

				if (!empty($new_bans)) {
					$insert_values = [];
					foreach ($new_bans as $domain) {
						$insert_values[] = "(
							'$domain',
							'0',
							'".time()."'
						)";
					}
					// put all bans into database
					$sql = "INSERT INTO ".$db['prefix']."banlist_domains (
						banned_domain, matches, timestamp
					) VALUES ".implode(", ", $insert_values);
					mgb_sql_connect($mysqli, $sql, "Error while inserting new banned domains.", 0, null, null);
				}
				
				// stop time measuring
				$script_time_end = microtime(true);
				$script_time = $script_time_end - $script_time_start;
				
				if($entry_counter > 0) {
					$template_message.= $lang['updated_domains']."<br>";
					$template_message = mgb_template_replace([
						'COUNTER' 	=> $entry_counter,
						'TIME' 		=> round($script_time, 3)
					], $template_message);
				} else {					
					$template_message.= $lang['spam_all_domains_on_domain_list']."<br>";
				}

				if($_POST['dropbox'] == 4) {
					$delete_everything++;
				}
			}

			// Sneak everything
			if(isset($_POST['dropbox']) AND $_POST['dropbox'] == 11) {
				if(!empty($settings['sfs_api_key'])) {
					$script_time_start = microtime(true);
					$entry_counter = 0;
					$result = mgb_sql_connect($mysqli, "SELECT ID, name, ip, email, hp, message, sneaked FROM ".$db['prefix']."spam_log", "Error while loading entries from ".$db['prefix']."spam.", 1);
					for($i = 0; $i < mysqli_num_rows($result); $i++) {
						$spam_entry[$i] = mysqli_fetch_array($result, MYSQLI_ASSOC);
						if($spam_entry[$i]['sneaked'] != 1) {
							$data = "username=".urlencode(iconv('GBK', 'UTF-8', $spam_entry[$i]['name']));
							$data.= "&ip_addr=".$spam_entry[$i]['ip'];
							$data.= "&email=".urlencode(iconv('GBK', 'UTF-8', $spam_entry[$i]['email']));
							$data.= "&api_key=".$settings['sfs_api_key'];
							$data.= "&evidence=".urlencode(iconv('GBK', 'UTF-8', $spam_entry[$i]['message']."<br><br>".$spam_entry[$i]['hp']));
							if(!empty($settings['debug_mode'])) {
								mgb_echo($data);
							}

							$response = mgb_report_spam($data);
							if($response == 200) {
								mgb_sql_connect($mysqli, "UPDATE `".$db['prefix']."spam_log` SET `sneaked` = '1' WHERE ID=".$spam_entry[$i]['ID']." LIMIT 1", "Error while sneaking spam entry and updating sql table.", 0);
								$entry_counter++;
							} elseif($response == 403) {
								$template_message = $lang['report_failed'];
							} elseif($response == "") {
								mgb_sql_connect($mysqli, "UPDATE `".$db['prefix']."spam_log` SET `sneaked` = '1' WHERE ID=".$spam_entry[$i]['ID']." LIMIT 1", "Error while sneaking spam entry and updating sql table.", 0);
								$entry_counter++;
							} else {
								$template_message = $response;
							}
						}
					}

					// stop time measuring
					$script_time_end = microtime(true);
					$script_time = $script_time_end - $script_time_start;

					if($entry_counter > 0) {
						$template_message = $lang['entries_sneaked'];
						$template_message = mgb_template_replace([
							'COUNTER' 	=> $entry_counter,
							'TIME'		=> round($script_time, 3)
						], $template_message);
					} else {
						$template_message = $lang['entries_already_sneaked'];
					}
				} else {
					$template_message = $lang['empty_needed_value'][43]; // missing api key
				}
			}
			
			if((isset($_POST['dropbox']) AND $_POST['dropbox'] == 1) OR ($delete_everything == 3)) { // Delete all spam_log entries
				mgb_sql_connect($mysqli, "TRUNCATE ".$db['prefix']."spam_log", "Error while deleting all log entries.", 0, null, null);
			}

			if(isset($_GET['id'])) {
				if(isset($_GET['spam_action'])) {
					if($_GET['spam_action'] == 'delete') {
						$sql = "DELETE FROM `".$db['prefix']."spam_log` WHERE ID = ? LIMIT 1";
						$params = [$_GET['id']];
						$types = "i";
						mgb_sql_connect($mysqli, $sql, "Error while deleting a single log entry.", 0, $params, $types);
					} elseif($_GET['spam_action'] == 'add_to_permanent_ip_banlist') {
						$script_time_start = microtime(true);
						$sql = "SELECT ip FROM ".$db['prefix']."spam_log WHERE ID = ? LIMIT 1";
						$params = [$_GET['id']];
						$types = "i";
						$result = mgb_sql_connect($mysqli, $sql, "Error while loading IP from spam table", 1, $params, $types);
						while($spam_entry = mysqli_fetch_array($result)) {
							$banned_ips = mgb_sql_connect($mysqli, "SELECT banned_ip FROM ".$db['prefix']."banlist_ips WHERE banned_ip = '".$spam_entry['ip']."'", "Error while loading banned ips from ".$db['prefix']."banlist_ips.", 1);
							$ip = mysqli_fetch_array($banned_ips, MYSQLI_ASSOC);
							// put ip on ip banlist if it is not already in there
							if($spam_entry['ip'] !== $ip['banned_ip']) {
								mgb_sql_connect($mysqli, "INSERT INTO ".$db['prefix']."banlist_ips (
									banned_ip,
									matches,
									timestamp )
								values (
									'".$spam_entry['ip']."',
									'0',
									'".time()."' )", "Error while saving data into ".$db['prefix']."banlist_ips", 0, null, null);
								$template_message = mgb_template_replace(['IP' => $spam_entry['ip']], $lang['spam_added_to_ip_list']);
							} else {
								$template_message = mgb_template_replace(['IP' => $spam_entry['ip']], $lang['spam_is_already_on_ip_list']);
							}
						}
						$script_time_end = microtime(true);
						$script_time = $script_time_end - $script_time_start;
					} elseif($_GET['spam_action'] == 'add_to_permanent_email_banlist') {
						$script_time_start = microtime(true);
						$sql = "SELECT email FROM ".$db['prefix']."spam_log WHERE ID = ? LIMIT 1";
						$params = [$_GET['id']];
						$types = "i";
						$result = mgb_sql_connect($mysqli, $sql, "Error while loading email from spam table", 1, $params, $types);
						while($spam_entry = mysqli_fetch_array($result)) {
							$banned_emails = mgb_sql_connect($mysqli, "SELECT banned_email FROM ".$db['prefix']."banlist_emails WHERE banned_email = '".$spam_entry['email']."'", "Error while loading banned emails from ".$db['prefix']."banlist_emails.", 1);
							$email = mysqli_fetch_array($banned_emails, MYSQLI_ASSOC);
							// put email on email banlist if it is not already in there
							if($spam_entry['email'] != $email['banned_email']) {
								mgb_sql_connect($mysqli, "INSERT INTO ".$db['prefix']."banlist_emails (
									banned_email,
									matches,
									timestamp )
								values (
									'".$spam_entry['email']."',
									'0',
									'".time()."' )", "Error while saving data into ".$db['prefix']."banlist_emails", 0, null, null);
								$template_message = mgb_template_replace(['EMAIL' => $spam_entry['email']], $lang['spam_added_to_email_list']);
							} else {
								$template_message = mgb_template_replace(['EMAIL' => $spam_entry['email']], $lang['spam_is_already_on_email_list']);
							}
						}
						$script_time_end = microtime(true);
						$script_time = $script_time_end - $script_time_start;
					} elseif($_GET['spam_action'] == 'add_to_permanent_domain_banlist') {
						$script_time_start = microtime(true);
						$result = mgb_sql_connect($mysqli, "SELECT email FROM ".$db['prefix']."spam_log WHERE ID=".secure_value($_GET['id'])." LIMIT 1", "Error while loading email from spam table", 1);
						while($spam_entry = mysqli_fetch_array($result)) {
							$result_parts = explode("@", $spam_entry['email'], 2);
							$banned_domains = mgb_sql_connect($mysqli, "SELECT banned_domain FROM ".$db['prefix']."banlist_domains WHERE banned_domain = '".$result_parts[1]."'", "Error while loading banned domains from ".$db['prefix']."banlist_domains.", 1);
							$email = mysqli_fetch_array($banned_domains, MYSQLI_ASSOC);
							// put domain on domain banlist if it is not already in there
							if($result_parts[1] != $email['banned_domain']) {
								mgb_sql_connect($mysqli, "INSERT INTO ".$db['prefix']."banlist_domains (
									ID,
									banned_domain,
									matches,
									timestamp )
								values (
									NULL,
									'".$result_parts[1]."',
									'0',
									'".time()."' )", "Error while saving data into ".$db['prefix']."banlist_domains", 0);
								$template_message = mgb_template_replace(['DOMAIN' => $result_parts[1]], $lang['spam_added_to_domain_list']);
							} else {
								$template_message = mgb_template_replace(['DOMAIN' => $result_parts[1]], $lang['spam_is_already_on_domain_list']);
							}
						}
						$script_time_end = microtime(true);
						$script_time = $script_time_end - $script_time_start;
						// delete the entry from spam table
						// mgb_sql_connect($mysqli, "DELETE FROM `".$db['prefix']."spam_log` WHERE ID=".secure_value($_GET['id'])." LIMIT 1", "Error while deleting an entry from spam table.", 0);
					} elseif($_GET['spam_action'] == 'report_to_stopforumspam') {
						if(!empty($settings['sfs_api_key'])) {
							$result = mgb_sql_connect($mysqli, "SELECT ID, name, ip, email, hp, message, sneaked FROM ".$db['prefix']."spam_log WHERE ID=".$_GET['id']." LIMIT 1", "Error while loading email from spam table", 1);
							$spam_entry = mysqli_fetch_array($result, MYSQLI_ASSOC);
							if($spam_entry['sneaked'] != 1) {
								$data = "username=".urlencode(iconv('GBK', 'UTF-8', $spam_entry['name']));
								$data.= "&ip_addr=".$spam_entry['ip'];
								$data.= "&email=".urlencode(iconv('GBK', 'UTF-8', $spam_entry['email']));
								$data.= "&api_key=".$settings['sfs_api_key'];
								$data.= "&evidence=".urlencode(iconv('GBK', 'UTF-8', $spam_entry['message']."<br><br>".$spam_entry['hp']));

								if(!empty($settings['debug_mode'])) {
									mgb_echo($data);
								}

								$response = mgb_report_spam($data);
								if($response == 200) {
									mgb_sql_connect($mysqli, "UPDATE `".$db['prefix']."spam_log` SET `sneaked` = '1' WHERE ID=".$spam_entry['ID']." LIMIT 1", "Error while sneaking spam entry and updating sql table.", 0);
									$template_message = $lang['report_successfull'];
								} elseif($response == 403) {
									$template_message = $lang['report_failed'];
								} elseif($response == "") {
									mgb_sql_connect($mysqli, "UPDATE `".$db['prefix']."spam_log` SET `sneaked` = '1' WHERE ID=".$spam_entry['ID']." LIMIT 1", "Error while sneaking spam entry and updating sql table.", 0);
									$template_message = $lang['report_successfull'];
								} else {
									$template_message = $response;
								}
							} else {
								$template_message = $lang['entry_already_sneaked'];
							}
						} else {
							$template_message = $lang['empty_needed_value'][43]; // missing api key
						}
					}
				}
			}

			// get total number of entries
			if((!empty($_POST['dropbox']) AND $_POST['dropbox'] == 5) OR (!empty($_GET['show_type']) AND $_GET['show_type'] == 1)) {
				$show_type = " WHERE type=1";
				$show_url = "&amp;show_type=1";
			} elseif((!empty($_POST['dropbox']) AND $_POST['dropbox'] == 6) OR (!empty($_GET['show_type']) AND $_GET['show_type'] == 3)) {
				$show_type = " WHERE type=3";
				$show_url = "&amp;show_type=3";
			} elseif((!empty($_POST['dropbox']) AND $_POST['dropbox'] == 7) OR (!empty($_GET['show_type']) AND $_GET['show_type'] == 4)) {
				$show_type = " WHERE type=4";
				$show_url = "&amp;show_type=4";
			} elseif((!empty($_POST['dropbox']) AND $_POST['dropbox'] == 8) OR (!empty($_GET['show_type']) AND $_GET['show_type'] == 11)) {
				$show_type = " WHERE type=11";
				$show_url = "&amp;show_type=11";
			} elseif((!empty($_POST['dropbox']) AND $_POST['dropbox'] == 9) OR (!empty($_GET['show_type']) AND $_GET['show_type'] == 9)) {
				$show_type = " WHERE type=9";
				$show_url = "&amp;show_type=9";
			}

			if(empty($show_type)) { $show_type = ""; }
			if(empty($show_url)) { $show_url = ""; }
			
			// get total number of entries
			$sql = "SELECT COUNT(ID) AS total FROM ".$db['prefix']."spam_log";
			$results = mgb_sql_connect($mysqli, $sql, "Error while counting guestbook entries.", 1, null, null);
			$row = $results->fetch_assoc();
			$total = (int)$row['total'];

			// how many entries per page shall be shown?
			$epp = 50;

			// compute how many pages there are
			$p = ($total / $epp);

			if ($p <= 1) {
				$p = 0;
				if ($total > 1) {
					$how_many_entries = "<span class=\"admin\">".$total."&nbsp;".$lang['entries']."</span>";
				} elseif ($total == 0) {
					$how_many_entries = "<span class=\"admin\">".$lang['no_spam_entries']."</span>";
				} else {
					$how_many_entries = "<span class=\"admin\">".$total."&nbsp;".$lang['entry']."</span>";
				}
			} else {
				$p = ceil($p);
				$how_many_entries = "<span class=\"admin\">".$total."&nbsp;".$lang['entries_on_pages']."</span>";
			}

			$load_start = ($_GET['p'] * $epp) - $epp;
			$load_end = $epp;

			$pages_total = ceil($p);
			
			if(empty($_GET['orderby'])) { $_GET['orderby'] = "id"; }
			if(empty($_GET['sort'])) { $_GET['sort'] = "ASC"; }
			if($_GET['orderby'] == "content") { $_GET['orderby'] = "message"; }

			if ($_GET['p'] == 1) {
				$sf_forwards = "<a class=\"admin\" href=\"admin.php?action=spam_log".$show_url."&amp;p=".($_GET['p'] + 1).$sid."\" title=\"".$lang['page_forwards']."\">".$lang['page_forwards_symbol']."</a>";
				$sf_pagenumber = $_GET['p'];
				if ($pages_total >= 3 ) {
					$sf_last = "<a class=\"admin\" href=\"admin.php?action=spam_log".$show_url."&amp;p=".$pages_total."\" title=\"".$lang['page_last']."\">".$lang['page_last_symbol']."</a>";
				}
			}

			if ($_GET['p'] > 1) {
				if (($pages_total >= 3) AND ($_GET['p'] > 2)) {
					$sf_first = "<a class=\"admin\" href=\"admin.php?action=spam_log".$show_url."&amp;p=1".$sid."\" title=\"".$lang['page_first']."\">".$lang['page_first_symbol']."</a>";
				}
				$sf_backwards = "<a class=\"admin\" href=\"admin.php?action=spam_log".$show_url."&amp;p=".($_GET['p'] - 1).$sid."\" title=\"".$lang['page_backwards']."\">".$lang['page_backwards_symbol']."</a>";
				$sf_pagenumber = $_GET['p'];
				$sf_forwards = "<a class=\"admin\" href=\"admin.php?action=spam_log".$show_url."&amp;p=".($_GET['p'] + 1).$sid."\" title=\"".$lang['page_forwards']."\">".$lang['page_forwards_symbol']."</a>";
				if (($pages_total >= 3) AND ($_GET['p'] < ($pages_total - 1))) {
					$sf_last = "&nbsp;<a class=\"admin\" href=\"admin.php?action=spam_log".$show_url."&amp;p=".$pages_total.$sid."\" title=\"".$lang['page_last']."\">".$lang['page_last_symbol']."</a>";
				}
			}

			if ($_GET['p'] == $pages_total) {
				if ($pages_total >= 3) {
					$sf_first = "<a class=\"admin\" href=\"admin.php?action=spam_log".$show_url."&amp;p=1".$sid."\" title=\"".$lang['page_first']."\">".$lang['page_first_symbol']."</a>";
				}
				$sf_backwards = "<a class=\"admin\" href=\"admin.php?action=spam_log".$show_url."&amp;p=".($_GET['p'] - 1).$sid."\" title=\"".$lang['page_backwards']."\">".$lang['page_backwards_symbol']."</a>";
				$sf_pagenumber = $_GET['p'];
				$sf_forwards = "";
			}

			if ($pages_total <= 0) {
				$content_scrolling_function = "<br><br>";
			}

			// load spam_log entries
			// Erlaubte Spalten für ORDER BY
			$allowed_columns = ['id', 'message', 'matches', 'timestamp'];
			// Erlaubte Sortierrichtungen
			$allowed_sort = ['ASC', 'DESC'];

			// Standardwerte
			$orderby = 'timestamp';
			$sort = 'DESC';

			// Benutzereingaben validieren
			if (isset($_GET['orderby']) && in_array($_GET['orderby'], $allowed_columns)) {
				$orderby = $_GET['orderby'];
			}
			if (isset($_GET['sort']) && in_array(strtoupper($_GET['sort']), $allowed_sort)) {
				$sort = strtoupper($_GET['sort']);
			}

			// load guestbook entries
			$sql = "SELECT * FROM ".$db['prefix']."spam_log ORDER BY $orderby $sort LIMIT $load_start, $load_end";			
			$result = mgb_sql_connect($mysqli, $sql, "Error while loading banned email entries.", 1, null, null);
			$entry = mysqli_fetch_all($result, MYSQLI_ASSOC);
			$counter = count($entry);

			if($counter <= 1) {
				if ($_GET['p'] == 1) {
					$add_page_nr = NULL;
				} else {
					$add_page_nr = "&amp;p=".($_GET['p'] - 1);
				}
			} else {
				$add_page_nr = "&amp;p=".$_GET['p'];
			}

			// fill entry template with content
			require_once (MGB_ROOT."includes/functions.inc.php");

			if(!empty($entry)) {
				for($i = 0; $i < count($entry); $i++) {
					$page_entry[$i] = $content_spam_log;
					$entry_timestamp = mgb_modern_timestamp($entry[$i]['timestamp'], $settings['language_path'], "adminpanel");

					if (strpos($entry[$i]['email'], '@') !== false) {
						$entry_domain = explode('@', $entry[$i]['email'], 2);
						$entry_domain = $entry_domain[1];
					} else {
						$entry[$i]['email'] = "-";
						$entry_domain = '-';
					}

					if(strlen($entry[$i]['hp']) > 50) {
						$entry[$i]['hp'] = substr($entry[$i]['hp'], 0, 50).$lang['shortened'];
					}
					
					// fill template with entry (strings)
					$page_entry[$i] = mgb_template_replace([
						'ENTRY_ID' => $entry[$i]['ID'],
						'ENTRY_IP' => "<a href=\"admin.php?action=spam_log&amp;id=".$entry[$i]['ID']."&amp;spam_action=add_to_permanent_ip_banlist".$add_page_nr.$sid."\" onClick=\"return confirm('{LANG_CONFIRM_ADD_TO_PERMANENT_IP_BLOCKLIST}'); submit();\" title=\"{LANG_SPAM_ADD_TO_IP_BANLIST}\">".$entry[$i]['ip']."</a>"
					], $page_entry[$i]);
					
					if($entry[$i]['email'] == "-") {
						$page_entry[$i] = mgb_template_replace([
							'ENTRY_EMAIL'  => "-",
							'ENTRY_DOMAIN' => "-"
						], $page_entry[$i]);
					} elseif (!empty($entry[$i]['email'])) {
						$page_entry[$i] = mgb_template_replace([
							'ENTRY_EMAIL'  => "<a href=\"admin.php?action=spam_log&amp;id=".$entry[$i]['ID']."&amp;spam_action=add_to_permanent_email_banlist".$add_page_nr.$sid."\" onClick=\"return confirm('{LANG_CONFIRM_ADD_TO_PERMANENT_EMAIL_BLOCKLIST}'); submit();\" title=\"{LANG_SPAM_ADD_TO_EMAIL_BANLIST}\">".$entry[$i]['email']."</a>",
							'ENTRY_DOMAIN' => "<a href=\"admin.php?action=spam_log&amp;id=".$entry[$i]['ID']."&amp;spam_action=add_to_permanent_domain_banlist".$add_page_nr.$sid."\" onClick=\"return confirm('{LANG_CONFIRM_ADD_TO_PERMANENT_DOMAIN_BLOCKLIST}'); submit();\" title=\"{LANG_SPAM_ADD_TO_DOMAIN_BANLIST}\">".$entry_domain."</a>"
						], $page_entry[$i]); 
					} else {
						$page_entry[$i] = mgb_template_replace([
							'ENTRY_EMAIL'	=> "-",
							'ENTRY_DOMAIN' 	=> "-"
						], $page_entry[$i]);
					}
					
					if(empty($entry[$i]['sneaked'])) {
						$page_entry[$i] = mgb_template_replace(['ENTRY_REPORT_SPAM' => "&nbsp;-&nbsp;<a href=\"admin.php?action=spam_log&amp;id=".$entry[$i]['ID']."&amp;spam_action=report_to_stopforumspam".$add_page_nr.$sid."\" onClick=\"return confirm('{LANG_CONFIRM_REPORT_TO_STOPFORUMSPAM}'); submit();\" title=\"{LANG_REPORT_SPAM}\">".$lang['confirm_report_spam']."</a>"], $page_entry[$i]);
					} else {
						$page_entry[$i] = mgb_template_replace(['ENTRY_REPORT_SPAM' => ""], $page_entry[$i]);
					}
					
					$page_entry[$i] = mgb_template_replace([
						'ENTRY_USER_AGENT' 		=> $entry[$i]['user_agent'],
						'ENTRY_HTTP_REFERER'	=> $entry[$i]['http_referer'],
						'ENTRY_HP' 				=> mgb_format($entry[$i]['hp']),
						'ENTRY_MESSAGE' 		=> mgb_format($entry[$i]['message']),
						'ENTRY_TYPE' 			=> $lang['spam_entry_type'][$entry[$i]['type']],
						'ENTRY_SITE' 			=> $entry[$i]['site'],
						'ENTRY_TIMESTAMP' 		=> $entry_timestamp,
						'DELETE' 				=> "<a href=\"admin.php?action=spam_log&amp;id=".$entry[$i]['ID']."&amp;spam_action=delete".$add_page_nr.$sid."\" onClick=\"return confirm('".$entry[$i]['ID'].", ".$entry[$i]['ip'].":&nbsp;{LANG_CONFIRM_DELETE}'); submit();\"><img class=\"icon\" src=\"templates/default/images/delete.png\" title=\"".$lang['delete_entry']."\" alt=\"".$lang['delete_entry']."\"></a>"
					], $page_entry[$i]);

					if(!isset($page_include)) { $page_include = NULL; }
					$page_include .= $page_entry[$i];
				}
			}
		} else {
			$page_include = "<span class=\"admin\">".$lang['errormessage'][4]."</span>";
			$content_scrolling_function = "<br>";
		}
	}
?>
