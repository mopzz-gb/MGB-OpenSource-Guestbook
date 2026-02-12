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

	============
	spam.inc.php
	============
	*/

	// make sure nobody has direct access to this script
	if (!defined('ADMINISTRATION')) {
		include ("error.html");
		die();
	} else {
		if(check_rights($mysqli, $_GET['action'], $_SESSION['user_ID'])) {
			// load config, settings and language files
			require (MGB_ROOT."includes/config.inc.php");
			require (MGB_ROOT."includes/load_settings.inc.php");
			require (MGB_ROOT."language/".$settings['language_path']."/lang_admin.php");
			// load templates
			$content_spam = mgb_load_template("admin", "default", "spam", $settings['debug_mode']);

			// set number of site to "1" if it is "0"
			if(!isset($_GET['p'])) { $_GET['p'] = 1; }

			if(empty($_POST['dropbox'])) { $_POST['dropbox'] = ""; }
			
			// DELETE ALL SPAM ENTRIES
			if(isset($_POST['dropbox']) AND $_POST['dropbox'] == 1) {
				mgb_sql_connect($mysqli, "TRUNCATE ".$db['prefix']."spam", "Error while deleting all spam entries.", 0, null, null);
			} elseif(isset($_POST['dropbox']) AND $_POST['dropbox'] == 2) { // No spam but let them deactivated
				$result = mgb_sql_connect($mysqli, "SELECT * FROM ".$db['prefix']."spam", "Error while loading entries from ".$db['prefix']."spam.", 1, null, null);
				for($i = 0; $i < mysqli_num_rows($result); $i++) {
					$spam_entry[$i] = mysqli_fetch_array($result, MYSQLI_ASSOC);
					// store entries in entries table
					$sql = "INSERT INTO ".$db['prefix']."entries (
						name,
						city,
						email,
						icq,
						aim,
						msn,
						fb,
						twitter,
						hp,
						message,
						comment,
						ip,
						user_agent,
						timestamp,
						user_notification,
						user_show_email,
						checked,
						isspam
						) values (
						?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
						)";
						
						$params = [
						$spam_entry[$i]['name'],
						$spam_entry[$i]['city'],
						$spam_entry[$i]['email'],
						$spam_entry[$i]['icq'],
						$spam_entry[$i]['aim'],
						$spam_entry[$i]['msn'],
						$spam_entry[$i]['fb'],
						$spam_entry[$i]['twitter'],
						$spam_entry[$i]['hp'],
						$spam_entry[$i]['message'],
						'',
						$spam_entry[$i]['ip'],
						$spam_entry[$i]['user_agent'],
						$spam_entry[$i]['timestamp'],
						$spam_entry[$i]['user_notification'],
						$spam_entry[$i]['user_show_email'],
						0,
						0
						];
						
						$types = "sssssssssssssiiiii";
					
					mgb_sql_connect($mysqli, $sql, "Error while saving data into ".$db['prefix']."entries", 0, $params, $types);
				}
				// delete all entries from spam table
				mgb_sql_connect($mysqli, "TRUNCATE ".$db['prefix']."spam", "Error while deleting all spam entries.", 0, null, null);
			} elseif(isset($_POST['dropbox']) AND $_POST['dropbox'] == 3) { // No spam and activate them
				$result = mgb_sql_connect($mysqli, "SELECT * FROM ".$db['prefix']."spam", "Error while loading entries from ".$db['prefix']."spam.", 1);
				for($i = 0; $i < mysqli_num_rows($result); $i++) {
					$spam_entry[$i] = mysqli_fetch_array($result, MYSQLI_ASSOC);
					// store entries in entries table
					$sql = "INSERT INTO ".$db['prefix']."entries (
						name,
						city,
						email,
						icq,
						aim,
						msn,
						fb,
						twitter,
						hp,
						message,
						comment,
						ip,
						user_agent,
						timestamp,
						user_notification,
						user_show_email,
						checked,
						isspam
						) values (
						?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
						)";
					
					$params = [
						$spam_entry[$i]['name'],
						$spam_entry[$i]['city'],
						$spam_entry[$i]['email'],
						$spam_entry[$i]['icq'],
						$spam_entry[$i]['aim'],
						$spam_entry[$i]['msn'],
						$spam_entry[$i]['fb'],
						$spam_entry[$i]['twitter'],
						$spam_entry[$i]['hp'],
						$spam_entry[$i]['message'],
						'',
						$spam_entry[$i]['ip'],
						$spam_entry[$i]['user_agent'],
						$spam_entry[$i]['timestamp'],
						$spam_entry[$i]['user_notification'],
						$spam_entry[$i]['user_show_email'],
						1,
						0
						];
						
					$types = "sssssssssssssiiiii";
						
					mgb_sql_connect($mysqli, $sql, "Error while saving data into ".$db['prefix']."entries", 0, $params, $types);
					mgb_erase_cache(MGB_ROOT."cache/");
				}
				// delete all entries from spam table
				mgb_sql_connect($mysqli, "TRUNCATE ".$db['prefix']."spam", "Error while deleting all spam entries.", 0);
			} elseif(isset($_POST['dropbox']) AND $_POST['dropbox'] == 4) { // Put all IPs on banlist
				$script_time_start = microtime(true);
				$entry_counter = 0;
				$ips = array();
				$ip_counter = 0;
				$result = mgb_sql_connect($mysqli, "SELECT ip FROM ".$db['prefix']."spam", "Error while loading ips from ".$db['prefix']."spam.", 1, null, null);
				for($i = 0; $i < mysqli_num_rows($result); $i++) {
					$spam_entry[$i] = mysqli_fetch_array($result, MYSQLI_ASSOC);
					$counter = 0;
					$result_parts = explode(".", $spam_entry[$i]['ip']);
					$banned_ips = mgb_sql_connect($mysqli, "SELECT banned_ip FROM ".$db['prefix']."banlist_ips WHERE banned_ip_first = '".$result_parts[0]."'", "Error while loading banned ips from ".$db['prefix']."banlist_ips.", 1, null, null);
					// $count_banned_ip = $count_banned_ip + mysqli_num_rows($banned_ip);
					for($j = 0; $j < mysqli_num_rows($banned_ips); $j++) {
						if($j === 0) {
							$ip_counter = $ip_counter + mysqli_num_rows($banned_ips);
						}
						$ips[$j] = mysqli_fetch_array($banned_ips, MYSQLI_ASSOC);
						// put ip on ip banlist if it is not already in there
						if($spam_entry[$i]['ip'] === $ips[$j]['banned_ip']) {
							$counter++;
						}
					} if($counter === 0) {
						mgb_sql_connect($mysqli, "INSERT INTO ".$db['prefix']."banlist_ips (
							ID,
							banned_ip,
							banned_ip_first,
							banned_ip_second,
							banned_ip_third,
							banned_ip_fourth,
							matches,
							timestamp )
						values (
							NULL,
							'".$spam_entry[$i]['ip']."',
							'".$result_parts[0]."',
							'".$result_parts[1]."',
							'".$result_parts[2]."',
							'".$result_parts[3]."',
							'0',
							'".time()."' )", "Error while saving data into ".$db['prefix']."banlist_ips", 0);
						$entry_counter++;
					}
					// delete all entries from spam table
					// mgb_sql_connect($mysqli, "TRUNCATE ".$db['prefix']."spam", "Error while deleting all spam entries.", 0);
				}
				
				// stop time measuring
				$script_time_end = microtime(true);
				$script_time = $script_time_end - $script_time_start;
				
				if($entry_counter > 0) {
					$template_message = $lang['updated_ips'];
					$template_message = mgb_template_replace(["COUNTER" => $entry_counter], $template_message);
					$template_message.= "<br>".$lang['compared_ips'];
					$template_message = mgb_template_replace(["COUNTER" => $ip_counter], $template_message);
					$template_message = mgb_template_replace(["TIME" 	=> round($script_time, 3)], $template_message);
				} else {
					$template_message = $lang['compared_ips'];
					$template_message = mgb_template_replace(["COUNTER" => $ip_counter], $template_message);
					$template_message = mgb_template_replace(["TIME" 	=> round($script_time, 3)], $template_message);
					$template_message = $lang['spam_all_ips_on_ip_list'].'<br>'.$template_message;
				}
			} elseif(isset($_POST['dropbox']) AND $_POST['dropbox'] == 5) { // Put all emails on banlist
				$script_time_start = microtime(true);
				$entry_counter = 0;
				$emails = array();
				$email_counter = 0;
				$result = mgb_sql_connect($mysqli, "SELECT email FROM ".$db['prefix']."spam", "Error while loading emails from ".$db['prefix']."spam.", 1, null, null);
				for($j = 0; $j < mysqli_num_rows($result); $j++) {
					$spam_entry[$j] = mysqli_fetch_array($result, MYSQLI_ASSOC);
					$counter = 0;
					$result_parts = explode("@", $spam_entry[$j]['email']);
					$banned_emails = mgb_sql_connect($mysqli, "SELECT banned_email FROM ".$db['prefix']."banlist_emails WHERE banned_email_first = '".$result_parts[0]."'", "Error while loading banned emails from ".$db['prefix']."banlist_emails.", 1, null, null);
					for($i = 0; $i < mysqli_num_rows($banned_emails); $i++) {
						if($i === 0) {
							$email_counter = $email_counter + mysqli_num_rows($banned_emails);
						}
						$emails[$i] = mysqli_fetch_array($banned_emails, MYSQLI_ASSOC);
						// put email on email banlist if it is not already in there
						if($spam_entry[$j]['email'] === $emails[$i]['banned_email']) {
							$counter++;
						}
					} if($counter === 0) {
						mgb_sql_connect($mysqli, "INSERT INTO ".$db['prefix']."banlist_emails (
							ID,
							banned_email,
							banned_email_first,
							banned_email_second,
							matches,
							timestamp )
						values (
							NULL,
							'".$spam_entry[$j]['email']."',
							'".$result_parts[0]."',
							'".$result_parts[1]."',
							'0',
							'".time()."' )", "Error while saving data into ".$db['prefix']."banlist_emails", 0, null, null);
						$entry_counter++;
					}

					// delete all entries from spam table
					// mgb_sql_connect($mysqli, "TRUNCATE ".$db['prefix']."spam", "Error while deleting all spam entries.", 0);
				}

				// stop time measuring
				$script_time_end = microtime(true);
				$script_time = $script_time_end - $script_time_start;

				if($entry_counter > 0) {
					$template_message = $lang['updated_emails'];
					$template_message = mgb_template_replace(["COUNTER" => $entry_counter], $template_message);
					$template_message.= "<br>".$lang['compared_emails'];
					$template_message = mgb_template_replace(["COUNTER" => $email_counter], $template_message);
					$template_message = mgb_template_replace(["TIME" 	=> round($script_time, 3)], $template_message);
				} else {
					$template_message = $lang['compared_emails'];
					$template_message = mgb_template_replace(["COUNTER" => $email_counter], $template_message);
					$template_message = mgb_template_replace(["TIME" 	=> round($script_time, 3)], $template_message);
					$template_message = $lang['spam_all_emails_on_email_list'].'<br>'.$template_message;
				}
			} elseif(isset($_POST['dropbox']) AND $_POST['dropbox'] == 6) { // Put all domains on banlist
				$script_time_start = microtime(true);
				$entry_counter = 0;
				$domains = array();
				$domains_counter = 0;
				$result = mgb_sql_connect($mysqli, "SELECT email FROM ".$db['prefix']."spam", "Error while loading emails from ".$db['prefix']."spam.", 1, null, null);
				for($j = 0; $j < mysqli_num_rows($result); $j++) {
					$spam_entry[$j] = mysqli_fetch_array($result, MYSQLI_ASSOC);
					$counter = 0;
					$user_domain = $spam_entry[$j]['email'];
					$result_parts = explode("@", $user_domain);
					$banned_domains = mgb_sql_connect($mysqli, "SELECT banned_domain FROM ".$db['prefix']."banlist_domains WHERE banned_domain = '".$result_parts[1]."'", "Error while loading banned domains from ".$db['prefix']."banlist_domains.", 1, null, null);
					for($i = 0; $i < mysqli_num_rows($banned_domains); $i++) {
						if($i === 0) {
							$domain_counter = $domain_counter + mysqli_num_rows($banned_domains);
						}
						$domains[$i] = mysqli_fetch_array($banned_domains, MYSQLI_ASSOC);
						// put domain on domain banlist if it is not already in there
						if($result_parts[1] === $domains[$i]['banned_domain']) {
							$counter++;
						}
					} if($counter === 0) {
						mgb_sql_connect($mysqli, "INSERT INTO ".$db['prefix']."banlist_domains (
							ID ,
							banned_domain ,
							matches,
							timestamp
						) VALUES (
							NULL ,
							'".$result_parts[1]."' ,
							'0',
							'".time()."'
						);", "Error while saving data into ".$db['prefix']."banlist_domains", 0);
						$entry_counter++;
					}
					// delete all entries from spam table
					// mgb_sql_connect($mysqli, "TRUNCATE ".$db['prefix']."spam", "Error while deleting all spam entries.", 0);
				}

				// stop time measuring
				$script_time_end = microtime(true);
				$script_time = $script_time_end - $script_time_start;

				if($entry_counter > 0) {
					$template_message = $lang['updated_domains'];
					$template_message = mgb_template_replace(["COUNTER" => $entry_counter], $template_message);
					$template_message.= "<br>".$lang['compared_domains'];
					$template_message = mgb_template_replace(["COUNTER" => $domain_counter], $template_message);
					$template_message = mgb_template_replace(["TIME"	=> round($script_time, 3)], $template_message);
				} else {
					$template_message = $lang['compared_domains'];
					$template_message = mgb_template_replace(["COUNTER" => $domain_counter], $template_message);
					$template_message = mgb_template_replace(["TIME"	=> round($script_time, 3)], $template_message);
					$template_message = $lang['spam_all_domains_on_domain_list'].'<br>'.$template_message;
				}
			} elseif(isset($_POST['dropbox']) AND $_POST['dropbox'] == 7) { // Sneak everything
				if(!empty($settings['sfs_api_key'])) {
					$script_time_start = microtime(true);
					$entry_counter = 0;
					$result = mgb_sql_connect($mysqli, "SELECT ID, name, ip, email, hp, message, sneaked FROM ".$db['prefix']."spam", "Error while loading entries from ".$db['prefix']."spam.", 1, null, null);
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
							if($response === 200) {
								mgb_sql_connect($mysqli, "UPDATE `".$db['prefix']."spam` SET `sneaked` = '1' WHERE ID=".$spam_entry[$i]['ID']." LIMIT 1", "Error while sneaking spam entry and updating sql table.", 0, null, null);
								$entry_counter++;
							} elseif($response === 403) {
								$template_message = $lang['report_failed'];
							} elseif($response === "") {
								mgb_sql_connect($mysqli, "UPDATE `".$db['prefix']."spam` SET `sneaked` = '1' WHERE ID=".$spam_entry[$i]['ID']." LIMIT 1", "Error while sneaking spam entry and updating sql table.", 0, null, null);
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
						$template_message = mgb_template_replace(['COUNTER' => $entry_counter], $template_message);
						$template_message = mgb_template_replace(['TIME'    => round(($script_time), 3)], $template_message);
					}
				} else {
					$template_message = $lang['empty_needed_value'][43]; // missing api key
				}
			}

			if(isset($_GET['id'])) {
				if(isset($_GET['spam_action'])) {
					if($_GET['spam_action'] == 'delete') {
						mgb_sql_connect($mysqli, "DELETE FROM `".$db['prefix']."spam` WHERE ID=".$_GET['id']." LIMIT 1", "Error while deleting a single spam entry.", 0, null, null);
					} elseif($_GET['spam_action'] == 'nospam_deactivate') {
						$result = mgb_sql_connect($mysqli, "SELECT name, city, email, hp, message, ip, user_agent, timestamp, user_notification, user_show_email FROM ".$db['prefix']."spam WHERE ID=".$_GET['id']." LIMIT 1", "Error while loading an entry from spam table", 1, null, null);
						while ($spam_entry = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							mgb_sql_connect($mysqli, "INSERT INTO ".$db['prefix']."entries (
								name,
								city,
								email,								
								hp,
								message,
								comment,
								ip,
								user_agent,
								timestamp,
								user_notification,
								user_show_email,
								checked,
								isspam
								) values (
								'".$spam_entry['name']."',
								'".$spam_entry['city']."',
								'".$spam_entry['email']."',								
								'".$spam_entry['hp']."',
								'".$spam_entry['message']."',
								'',
								'".$spam_entry['ip']."',
								'".$spam_entry['user_agent']."',
								'".$spam_entry['timestamp']."',
								'".$spam_entry['user_notification']."',
								'".$spam_entry['user_show_email']."',
								'0',
								'0'
								)", "Error while saving data into ".$db['prefix']."entries", 0, null, null);
						}
						// delete the entry from spam table
						mgb_sql_connect($mysqli, "DELETE FROM `".$db['prefix']."spam` WHERE ID=".$_GET['id']." LIMIT 1", "Error while deleting an entry from spam table.", 0, null, null);
					} elseif($_GET['spam_action'] == 'nospam') {
						$result = mgb_sql_connect($mysqli, "SELECT name, city, email, hp, message, ip, user_agent, timestamp, user_notification, user_show_email FROM ".$db['prefix']."spam WHERE ID=".$_GET['id']." LIMIT 1", "Error while loading an entry from spam table", 1);
						while ($spam_entry = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							mgb_sql_connect($mysqli, "INSERT INTO ".$db['prefix']."entries (
								name,
								city,
								email,
								hp,
								message,
								comment,
								ip,
								user_agent,
								timestamp,
								user_notification,
								user_show_email,
								checked,
								isspam
								) values (
								'".$spam_entry['name']."',
								'".$spam_entry['city']."',
								'".$spam_entry['email']."',
								'".$spam_entry['hp']."',
								'".$spam_entry['message']."',
								'',
								'".$spam_entry['ip']."',
								'".$spam_entry['user_agent']."',
								'".$spam_entry['timestamp']."',
								'".$spam_entry['user_notification']."',
								'".$spam_entry['user_show_email']."',
								'1',
								'0'
								)", "Error while saving data into ".$db['prefix']."entries", 0, null, null);
							mgb_erase_cache(MGB_ROOT."cache/");
						}
						// delete the entry from spam table
						mgb_sql_connect($mysqli, "DELETE FROM `".$db['prefix']."spam` WHERE ID=".$_GET['id']." LIMIT 1", "Error while deleting an entry from spam table.", 0, null, null);
					} elseif($_GET['spam_action'] == 'add_to_permanent_ip_banlist') {
						$script_time_start = microtime(true);
						$result = mgb_sql_connect($mysqli, "SELECT ip FROM ".$db['prefix']."spam WHERE ID=".$_GET['id']." LIMIT 1", "Error while loading IP from spam table", 1, null, null);
						while($spam_entry = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							$result_parts = explode(".", $spam_entry['ip']);
							$banned_ips = mgb_sql_connect($mysqli, "SELECT banned_ip FROM ".$db['prefix']."banlist_ips WHERE banned_ip = '".$spam_entry['ip']."'", "Error while loading banned ips from ".$db['prefix']."banlist_ips.", 1, null, null);
							$ip = mysqli_fetch_array($banned_ips, MYSQLI_ASSOC);
							// put ip on ip banlist if it is not already in there
							if($spam_entry['ip'] === $ip['banned_ip']) {
								$counter++;
							}

							if($counter === 0) {
								mgb_sql_connect($mysqli, "INSERT INTO ".$db['prefix']."banlist_ips (
									banned_ip,
									matches,
									timestamp )
								values (
									'".$spam_entry['ip']."',
									'0',
									'".time()."' )", "Error while saving data into ".$db['prefix']."banlist_ips", 0, null, null);
								$template_message = str_replace('{IP}', $spam_entry['ip'], $lang['spam_added_to_ip_list']);
							} else {
								$template_message = str_replace('{IP}', $spam_entry['ip'], $lang['spam_is_already_on_ip_list']);
							}
						}
						$script_time_end = microtime(true);
						$script_time = $script_time_end - $script_time_start;
						// delete the entry from spam table
						// mgb_sql_connect($mysqli, "DELETE FROM `".$db['prefix']."spam` WHERE ID=".secure_value($_GET['id'])." LIMIT 1", "Error while deleting an entry from spam table.", 0);
					} elseif($_GET['spam_action'] == 'add_to_permanent_email_banlist') {
						$script_time_start = microtime(true);
						$result = mgb_sql_connect($mysqli, "SELECT email FROM ".$db['prefix']."spam WHERE ID=".$_GET['id']." LIMIT 1", "Error while loading email from spam table", 1, null, null);
						while($spam_entry = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							$result_parts = explode("@", $spam_entry['email']);
							$banned_emails = mgb_sql_connect($mysqli, "SELECT banned_email FROM ".$db['prefix']."banlist_emails WHERE banned_email = '".$spam_entry['email']."'", "Error while loading banned emails from ".$db['prefix']."banlist_emails.", 1, null, null);
							$email = mysqli_fetch_array($banned_emails, MYSQLI_ASSOC);
							// put email on email banlist if it is not already in there
							if($spam_entry['email'] === $email['banned_email']) {
								$counter++;
							}

							if($counter === 0) {
								mgb_sql_connect($mysqli, "INSERT INTO ".$db['prefix']."banlist_emails (
									ID,
									banned_email,
									banned_email_first,
									banned_email_second,
									matches,
									timestamp )
								values (
									NULL,
									'".$spam_entry['email']."',
									'".$result_parts[0]."',
									'".$result_parts[1]."',
									'0',
									'".time()."' )", "Error while saving data into ".$db['prefix']."banlist_emails", 0);
								$template_message = str_replace('{EMAIL}', $spam_entry['email'], $lang['spam_added_to_email_list']);
							} else {
								$template_message = str_replace('{EMAIL}', $spam_entry['email'], $lang['spam_is_already_on_email_list']);
							}
						}
						$script_time_end = microtime(true);
						$script_time = $script_time_end - $script_time_start;
						// delete the entry from spam table
						// mgb_sql_connect($mysqli, "DELETE FROM `".$db['prefix']."spam` WHERE ID=".secure_value($_GET['id'])." LIMIT 1", "Error while deleting an entry from spam table.", 0);
					} elseif($_GET['spam_action'] == 'add_to_permanent_domain_banlist') {
						$script_time_start = microtime(true);
						$result = mgb_sql_connect($mysqli, "SELECT email FROM ".$db['prefix']."spam WHERE ID=".$_GET['id']." LIMIT 1", "Error while loading email from spam table", 1, null, null);
						while ($spam_entry = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							$user_domain = explode("@", $spam_entry['email']);
							$banned_domain = mgb_sql_connect($mysqli, "SELECT banned_domain FROM ".$db['prefix']."banlist_domains WHERE banned_domain = '".$user_domain[1]."'", "Error while loading banned domains from ".$db['prefix']."banlist_domains.", 1, null, null);
							$domain = mysqli_fetch_array($banned_domain, MYSQLI_ASSOC);
							// put domain on domain banlist if it is not already in there
							if($user_domain[1] != $domain['banned_domain']) {
								mgb_sql_connect($mysqli, "INSERT INTO ".$db['prefix']."banlist_domains (
									ID,
									banned_domain,
									matches,
									timestamp
								) values (
									NULL,
									'".$user_domain[1]."',
									'0',
									'".time()."'
								)", "Error while saving data into ".$db['prefix']."banlist_domains", 0);
								$template_message = str_replace('{DOMAIN}', $user_domain[1], $lang['spam_added_to_domain_list']);
							} else {
								$template_message = str_replace('{DOMAIN}', $user_domain[1], $lang['spam_is_already_on_domain_list']);
							}
						}
						$script_time_end = microtime(true);
						$script_time = $script_time_end - $script_time_start;
						// delete the entry from spam table
						// mgb_sql_connect($mysqli, "DELETE FROM `".$db['prefix']."spam` WHERE ID=".secure_value($_GET['id'])." LIMIT 1", "Error while deleting an entry from spam table.", 0);
					} elseif($_GET['spam_action'] == 'report_to_stopforumspam') {
						if(!empty($settings['sfs_api_key'])) {
							$result = mgb_sql_connect($mysqli, "SELECT name, ip, email, hp, message, sneaked FROM ".$db['prefix']."spam WHERE ID=".$_GET['id']." LIMIT 1", "Error while loading email from spam table", 1, null, null);
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
									$template_message = $lang['report_successfull'];
									mgb_sql_connect($mysqli, "UPDATE `".$db['prefix']."spam` SET `sneaked` = '1' WHERE ID=".$_GET['id']." LIMIT 1", "Error while sneaking spam entry and updating sql table.", 0, null, null);
								} elseif($response == 403) {
									$template_message = $lang['report_failed'];
								} elseif($response == "") {
									$template_message = $lang['report_successfull'];
									mgb_sql_connect($mysqli, "UPDATE `".$db['prefix']."spam` SET `sneaked` = '1' WHERE ID=".$_GET['id']." LIMIT 1", "Error while sneaking spam entry and updating sql table.", 0, null, null);
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

				// send an email to user
				if(isset($_GET['notify']) AND $_GET['notify'] == 1) {
					$result = mgb_sql_connect($mysqli, "SELECT name, email, message FROM ".$db['prefix']."entries WHERE id=".$_GET['id']." LIMIT 1", "Error while getting information about the user to send an email.", 1, null, null);
					$data = mysqli_fetch_array($result, MYSQLI_ASSOC);
					$name = $data['name'];
					$email = $data['email'];
					$message = $data['message'];

					$date = date("d"."/"."m"."/"."Y");
					$time = date("H".":"."i");

					$url_to_gb = mgb_isHttps()."://".$settings['h_domain'].$settings['gb_path']."index.php";

					$lang['sendmail_user_notification_title'] = format_mail($lang['sendmail_user_notification_title'], $name, $date, $time, trim($message), $settings['h_domain'], $url_to_gb, "", "", "", "", "", "");
					$settings['sendmail_user_notification_text'] = format_mail($settings['sendmail_user_notification_text'], $name, $date, $time, trim($message), $settings['h_domain'], $url_to_gb, "", "", "", "", "", "");

					$mail_header = "content-type: text/plain; charset=".$charset."\n";

					$mail_header .= "from: ".$settings['admin_gbemail'];

					if($settings['mailer_method'] == 0) {
						$mail_send = @mail($email, $lang['sendmail_user_notification_title'], $settings['sendmail_user_notification_text'], $mail_header);
						if($mail_send) {
							$sendemail_successfull = 1;
						} else {
							$sendemail_successfull = 0;
						}
					} elseif($settings['mailer_method'] == 1 AND file_exists(MGB_ROOT."plugins/phpmailer/class.phpmailer.php")) {
						$mail_send = mgb_phpmailer($email, $settings['admin_email'], $name, $settings['h_domain'], $lang['sendmail_user_notification_title'], $settings['sendmail_user_notification_text'], "adminpanel", $language_short, $charset);
						if($mail_send[0] == 0) {
							$sendemail_successfull = 0;
							$template_message = "<br><br>phpmailer: ".$mail_send[1];
						} else {
							$sendemail_successfull = 1;
						}
					}
				}
			}

			// get total number of entries
			$sql = "SELECT COUNT(ID) AS total FROM ".$db['prefix']."spam";
			$results = mgb_sql_connect($mysqli, $sql, "Error while counting spam entries.", 1, null, null);
			$row = $results->fetch_assoc();
			$total = (int)$row['total'];

			// compute how many pages there are
			$p = ($total / 20);

			if ($p <= 1) {
				$p = 0;
				if ($total > 1) {
					$how_many_entries = "<span class=\"admin\">".$total."&nbsp;".$lang['entries']."</span>";
				} elseif ($total === 0) {
					$how_many_entries = "<span class=\"admin\">".$lang['no_spam_entries']."</span>";
				} else {
					$how_many_entries = "<span class=\"admin\">".$total."&nbsp;".$lang['entry']."</span>";
				}
			} else {
				$p = ceil($p);
				$how_many_entries = "<span class=\"admin\">".$total."&nbsp;".$lang['entries_on_pages']."</span>";
			}

			$load_start = ($_GET['p'] * 20) - 20;
			$load_end = 20;

			$pages_total = ceil($p);

			if ($_GET['p'] === 1) {
				$sf_forwards = "<a class=\"admin\" href=\"admin.php?action=spam&amp;p=".($_GET['p'] + 1).$sid."\" title=\"".$lang['page_forwards']."\">".$lang['page_forwards_symbol']."</a>";
				$sf_pagenumber = $_GET['p'];
				if ($pages_total >= 3 ) {
					$sf_last = "<a class=\"admin\" href=\"admin.php?action=spam&amp;p=".$pages_total."\" title=\"".$lang['page_last']."\">".$lang['page_last_symbol']."</a>";
				}
			}

			if ($_GET['p'] > 1) {
				if (($pages_total >= 3) AND ($_GET['p'] > 2)) {
					$sf_first = "<a class=\"admin\" href=\"admin.php?action=spam&amp;p=1".$sid."\" title=\"".$lang['page_first']."\">".$lang['page_first_symbol']."</a>";
				}
				$sf_backwards = "<a class=\"admin\" href=\"admin.php?action=spam&amp;p=".($_GET['p'] - 1).$sid."\" title=\"".$lang['page_backwards']."\">".$lang['page_backwards_symbol']."</a>";
				$sf_pagenumber = $_GET['p'];
				$sf_forwards = "<a class=\"admin\" href=\"admin.php?action=spam&amp;p=".($_GET['p'] + 1).$sid."\" title=\"".$lang['page_forwards']."\">".$lang['page_forwards_symbol']."</a>";
				if (($pages_total >= 3) AND ($_GET['p'] < ($pages_total - 1))) {
					$sf_last = "&nbsp;<a class=\"admin\" href=\"admin.php?action=spam&amp;p=".$pages_total.$sid."\" title=\"".$lang['page_last']."\">".$lang['page_last_symbol']."</a>";
				}
			}

			if ($_GET['p'] === $pages_total) {
				if ($pages_total >= 3) {
					$sf_first = "<a class=\"admin\" href=\"admin.php?action=spam&amp;p=1".$sid."\" title=\"".$lang['page_first']."\">".$lang['page_first_symbol']."</a>";
				}
				$sf_backwards = "<a class=\"admin\" href=\"admin.php?action=spam&amp;p=".($_GET['p'] - 1).$sid."\" title=\"".$lang['page_backwards']."\">".$lang['page_backwards_symbol']."</a>";
				$sf_pagenumber = $_GET['p'];
				$sf_forwards = "";
			}

			if ($pages_total <= 0) {
				$content_scrolling_function = "<br><br>";
			}

			// load guestbook entries
			$result = mgb_sql_connect($mysqli, "SELECT ID, name, message, ip, email, hp, comment, timestamp, counter, sneaked FROM ".$db['prefix']."spam ORDER BY counter DESC LIMIT $load_start, $load_end", "Error while loading guestbook entries.", 1, null, null);

			$counter = 0;

			for($i = 0; $i < mysqli_num_rows($result); $i++) {
				$entry[$i] = mysqli_fetch_array($result, MYSQLI_ASSOC);
				$counter++;
			}

			if ($counter <= 1) {
				if ($_GET['p'] === 1) {
					$add_page_nr = NULL;
				} else {
					$add_page_nr = "&amp;p=".($_GET['p'] - 1);
				}
			} else {
				$add_page_nr = "&amp;p=".$_GET['p'];
			}

			// fill entry template with content
			require_once (MGB_ROOT."includes/functions.inc.php");

			if(!isset($entry)) { $entry = array(); }

			for($i = 0; $i < count($entry); $i++) {
				$page_entry[$i] = $content_spam;

				$entry[$i]['ip'] = $entry[$i]['ip'] ?? "-";
				$entry[$i]['comment'] = $entry[$i]['comment'] ?? "-";
				$entry[$i]['user_notification'] = $entry[$i]['user_notification'] ?? 0;

				// wordwrap: if message contains words longer than $settings['wordwrap'] they will
				// be broken into two or more strings. If $settings['wordwrap'] === 0, function is off
				// this method taken from http://de.php.net/manual/en/function.wordwrap.php#64517
				// will luckily not affect html tags

				$entry[$i]['message'] = textWrap($entry[$i]['message'], 45);
				$entry[$i]['comment'] = textWrap($entry[$i]['comment'], 45);

				// convert bbcodes
				$entry[$i]['message'] = bbcode_format($mysqli, $entry[$i]['message'], "adminpanel");
				$entry[$i]['comment'] = bbcode_format($mysqli, $entry[$i]['comment'], "adminpanel");

				// fill template with entry (strings)
				$ID = $i + 1;
				$page_entry[$i] = mgb_template_replace(["ENTRY_ID" => $ID], $page_entry[$i]);

				$entry_timestamp = mgb_modern_timestamp($entry[$i]['timestamp'], $settings['language_path'], "adminpanel");

				if ($entry[$i]['counter'] >= 3) {
					$page_entry[$i] = mgb_template_replace(["ENTRY_NAME" => "<span style='color: #ff0000'>".substr($entry[$i]['name'], 0, 20)."<br><br>{LANG_USER_BLOCKED}</span><br><br>".$lang['last_contact']."&nbsp;".ceil($time_in_list).$timecode], $page_entry[$i]);
				} else {
					$page_entry[$i] = mgb_template_replace(["ENTRY_NAME" => substr($entry[$i]['name'], 0, 20)."<br><br>".$lang['in_list_since']."&nbsp;".$entry_timestamp], $page_entry[$i]);
				}

				if(strlen($entry[$i]['hp']) > 50) {
					$entry[$i]['hp'] = substr($entry[$i]['hp'], 0, 50).$lang['shortened'];
				}

				// get domain of entry
				$entry_domain = explode("@", $entry[$i]['email']);

				$page_entry[$i] = mgb_template_replace([
					'ENTRY_MESSAGE' => mgb_format($entry[$i]['message']),
					'ENTRY_IP' 		=> "<a href=\"admin.php?action=spam&amp;id=".$entry[$i]['ID']."&amp;spam_action=add_to_permanent_ip_banlist".$add_page_nr.$sid."\" onClick=\"return confirm('{LANG_CONFIRM_ADD_TO_PERMANENT_IP_BLOCKLIST}'); submit();\" title=\"".$lang['spam_add_to_ip_banlist']."\">".$entry[$i]['ip']."</a>"
				], $page_entry[$i]);
				if(empty($entry[$i]['sneaked'])) {
					$page_entry[$i] = mgb_template_replace(['ENTRY_REPORT_SPAM' => "&nbsp;-&nbsp;<a href=\"admin.php?action=spam&amp;id=".$entry[$i]['ID']."&amp;spam_action=report_to_stopforumspam".$add_page_nr.$sid."\" onClick=\"return confirm('{LANG_CONFIRM_REPORT_TO_STOPFORUMSPAM}'); submit();\" title=\"{LANG_REPORT_SPAM}\">".$lang['confirm_report_spam']."</a>"], $page_entry[$i]);
				} else {
					$page_entry[$i] = mgb_template_replace(['ENTRY_REPORT_SPAM' => ""], $page_entry[$i]);
				}
				$page_entry[$i] = mgb_template_replace([
					'ENTRY_EMAIL' 				=> "<a href=\"admin.php?action=spam&amp;id=".$entry[$i]['ID']."&amp;spam_action=add_to_permanent_email_banlist".$add_page_nr.$sid."\" onClick=\"return confirm('{LANG_CONFIRM_ADD_TO_PERMANENT_EMAIL_BLOCKLIST}'); submit();\"title=\"".$lang['spam_add_to_email_banlist']."\">".$entry[$i]['email']."</a>",
					'ENTRY_DOMAIN' 				=> "<a href=\"admin.php?action=spam&amp;id=".$entry[$i]['ID']."&amp;spam_action=add_to_permanent_domain_banlist".$add_page_nr.$sid."\" onClick=\"return confirm('{LANG_CONFIRM_ADD_TO_PERMANENT_EMAIL_BLOCKLIST}'); submit();\"title=\"".$lang['spam_add_to_domain_banlist']."\">".$entry_domain[1]."</a>",
					'ENTRY_HP' 					=> mgb_format($entry[$i]['hp']),
					'ENTRY_COMMENT' 			=> mgb_format($entry[$i]['comment']),
					'LANG_QUOTE' 				=> $lang['quote'],
					'DELETE' 					=> "<a href=\"admin.php?action=spam&amp;id=".$entry[$i]['ID']."&amp;spam_action=delete".$add_page_nr.$sid."\" onClick=\"return confirm('{LANG_CONFIRM_DELETE}'); submit();\"><img class=\"icon\" src=\"templates/default/images/delete.png\" title=\"".$lang['delete_entry']."\" alt=\"".$lang['delete_entry']."\"></a>",
					'SPAM_ADD_TO_BLOCKLISTS' 	=> "",
					'NO_SPAM_DEACTIVATE'		=> "<a href=\"admin.php?action=spam&amp;id=".$entry[$i]['ID']."&amp;spam_action=nospam_deactivate".$add_page_nr.$sid."\"><img class=\"icon\" src=\"templates/default/images/nospam2.png\" title=\"".$lang['nospam_deactivate_entry']."\" alt=\"".$lang['nospam_deactivate_entry']."\"></a>",
					'NO_SPAM' 					=> "<a href=\"admin.php?action=spam&amp;id=".$entry[$i]['ID']."&amp;spam_action=nospam&amp;notify=".$entry[$i]['user_notification'].$add_page_nr.$sid."\"><img class=\"icon\" src=\"templates/default/images/nospam.png\" title=\"".$lang['nospam_entry']."\" alt=\"".$lang['nospam_entry']."\"></a>",
					'REPORT_AS_NO_SPAM' 		=> ""
				], $page_entry[$i]);

				if(!isset($page_include)) { $page_include = NULL; }
				$page_include .= $page_entry[$i];
			}
		} else {
			$page_include = "<span class=\"admin\">".$lang['errormessage'][4]."</span>";
			$content_scrolling_function = "<br>";
		}
	}
?>
