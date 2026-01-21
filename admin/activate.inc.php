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
	activate.inc.php
	================
	*/

	// make sure nobody has direct access to this script
	if(!defined('ADMINISTRATION')) {
		include ("error.html");
		die();
	} else {
		if(check_rights($mysqli, $_GET['action'], $_SESSION['user_ID'])) {
			// load config, settings and language files
			require_once (MGB_ROOT."includes/config.inc.php");
			require_once (MGB_ROOT."includes/load_settings.inc.php");
			require_once (MGB_ROOT."language/".$settings['language_path']."/lang_admin.php");

			// load template
			$content_activate = mgb_load_template("admin", "default", "activate", $settings['debug_mode']);

			// set number of site to "1" if it is "0"
			if(!isset($_GET['p'])) { $_GET['p'] = 1; }

			if(empty($_POST['dropbox'])) { $_POST['dropbox'] = ""; }
			$_POST['dropbox'] = cleanstr($_POST['dropbox']);

			if(isset($_POST['dropbox']) AND $_POST['dropbox'] == 1) { // Activate all entries at once
				$sql = "UPDATE ".$db['prefix']."entries SET 'checked' = ? WHERE checked = ?";
				$params = [1, 0];
				$types = "ii";
				mgb_sql_connect($mysqli, $sql, "Error while activating all entries at once and updating sql table.", 0, $params, $types);
				mgb_erase_cache("../cache/");
			} elseif(isset($_POST['dropbox']) AND $_POST['dropbox'] == 2) { // Put all entries on spam table
				// check if user has too many counts in trying to make a guestbook entry
				$sql = "SELECT COUNT(ID) AS total FROM ".$db['prefix']."spam";
				$results = mgb_sql_connect($mysqli, $sql, "Error while counting entries in spam table.", 1);
				$row = $results->fetch_assoc();
				$spam_list_total = (int)$row['total'];
				$spam_list_result = mgb_sql_connect($mysqli, "SELECT id, ip, email, counter FROM ".$db['prefix']."spam", "Error while loading entries from spam table.", 1, null, null);
				$spam_list = mysqli_fetch_all($spam_list_result, MYSQLI_ASSOC);
				
				/* for($i = 0; $i < mysqli_num_rows($spam_list_result); $i++) {
					$spam_list[$i] = mysqli_fetch_array($spam_list_result, MYSQLI_ASSOC); // put all entries from spam table into an array named $spam_list
				} */

				$sql = "SELECT id, ip, email FROM ".$db['prefix']."entries WHERE checked = ? AND isspam = ?";
				$params = [0, 0];
				$types = "ii";
				$unchecked_entries_result = mgb_sql_connect($mysqli, $sql, "Error while loading entry from ".$db['prefix']."entries.", 1, $params, $types);

				for($i = 0; $i < mysqli_num_rows($unchecked_entries_result); $i++) {
					$store_spam = 1;
					$new_spam[$i] = mysqli_fetch_array($unchecked_entries_result, MYSQLI_ASSOC);
					for($j = 0; $j < $spam_list_total; $j++) {
						if($spam_list[$j]['ip'] === $new_spam[$i]['ip'] OR $spam_list[$j]['email'] === $new_spam[$i]['email']) {
							$store_spam = 0;
							if ($spam_list[$j]['counter'] < 5) {
								$spam_list[$j]['counter']++;
								mgb_sql_connect($mysqli, "UPDATE `".$db['prefix']."spam` SET `counter` = '".$spam_list[$j]['counter']."', `timestamp` = '".time()."' WHERE ID='".$spam_list[$j]['id']."' LIMIT 1", "Error while saving data into ".$db['prefix']."spam", 0, null, null);
								// refresh spam list
								$spam_list_result = mgb_sql_connect($mysqli, "SELECT id, ip, email, counter FROM ".$db['prefix']."spam", "Error while loading entries from spam table.", 1);
								for($k = 0; $k < mysqli_num_rows($spam_list_result); $k++) {
									$spam_list[$k] = mysqli_fetch_array($spam_list_result, MYSQLI_ASSOC); // put all entries from spam table into an array named $spam_list
								}
							}
						}
					}

					if($store_spam == 1) {
						// load whole entry
						$sql = "SELECT * FROM ".$db['prefix']."entries WHERE id = ? AND checked = ? AND isspam = ?";
						$params = [$new_spam[$i]['id'], 0, 0];
						$types = "iii";
						$whole_spam_entry = mgb_sql_connect($mysqli, $sql, "Error while loading entry from ".$db['prefix']."entries.", 1, $params, $types);
						for($l = 0; $l < mysqli_num_rows($whole_spam_entry); $l++) {
							$whole_entry[$l] = mysqli_fetch_array($whole_spam_entry, MYSQLI_ASSOC);
							// store entry in spam table
							
							$sql = "INSERT INTO ".$db['prefix']."spam (
								name, ip, email, city, icq, aim, msn, fb, twitter, hp, message, user_notification, user_show_email, captcha, sent_captcha, counter, user_agent, sneaked, timestamp
							) VALUES (
								?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
							)";
							
							$params = [
								$whole_entry[$l]['name'],
								$whole_entry[$l]['ip'],
								$whole_entry[$l]['email'],
								$whole_entry[$l]['city'],
								$whole_entry[$l]['icq'],
								$whole_entry[$l]['aim'],
								$whole_entry[$l]['msn'],
								$whole_entry[$l]['fb'],
								$whole_entry[$l]['twitter'],
								$whole_entry[$l]['hp'],
								$whole_entry[$l]['message'],
								$whole_entry[$l]['user_notification'],
								$whole_entry[$l]['user_show_email'],
								0,
								0,
								1,
								$whole_entry[$l]['user_agent'],
								0,
								$whole_entry[$l]['timestamp']
							];
							
							$types = "sssssssssssiiiiisii";
							
							mgb_sql_connect($mysqli, $sql, "Error while saving data into ".$db['prefix']."spam", 0, $params, $types);
						}
					}
				}
				// delete entries from entries table
				$sql = "DELETE FROM ".$db['prefix']."entries WHERE checked = 0 AND isspam = 0";
				mgb_sql_connect($mysqli, $sql, "Error while deleting entry in ".$db['prefix']."entries", 0, null, null);
			}

			if(isset($_GET['id'])) {
				if(isset($_GET['isspam']) AND secure_value($_GET['isspam'] == 1)) {
					// get data of the entry from database
					$sql = "SELECT * FROM ".$db['prefix']."entries WHERE ID = ?";
					$params = [$_GET['id']];
					$types = "i";
					$result = mgb_sql_connect($mysqli, $sql, "Error while loading entry from ".$db['prefix']."entries.", 1, $params, $types);
					$spam = mysqli_fetch_all($result, MYSQLI_ASSOC);					

					// store entry in spam table
					$sql = "INSERT INTO".$db['prefix']."spam (
						name, ip, email, city, icq, aim, msn, fb, twitter, hp, message, user_notification, user_show_email, captcha, sent_captcha, counter, user_agent, sneaked, timestamp
					) VALUES (
						?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
					)";
					
					$params = [
						$spam[$_GET['id']]['name'],
						$spam[$_GET['id']]['ip'],
						$spam[$_GET['id']]['email'],
						$spam[$_GET['id']]['city'],
						$spam[$_GET['id']]['icq'],
						$spam[$_GET['id']]['aim'],
						$spam[$_GET['id']]['msn'],
						$spam[$_GET['id']]['fb'],
						$spam[$_GET['id']]['twitter'],
						$spam[$_GET['id']]['hp'],
						$spam[$_GET['id']]['message'],
						$spam[$_GET['id']]['user_notification'],
						$spam[$_GET['id']]['user_show_email'],
						0,
						0,
						1,
						$spam[$_GET['id']]['user_agent'],
						0,
						$spam[$_GET['id']]['timestamp']					
					];
					
					mgb_sql_connect($mysqli, $sql, "Error while saving data into ".$db['prefix']."spam", 0, $params, $types);
					// delete entry from entries table
					$sql = "DELETE FROM `".$db['prefix']."entries` WHERE ID = ? LIMIT 1";
					$params = [$_GET['id']];
					$types = "i";
					mgb_sql_connect($mysqli, $sql, "Error while deleting entry in ".$db['prefix']."entries", 0, $params, $types);
					mgb_erase_cache("../cache/");
				} else {
					$sql = "UPDATE `".$db['prefix']."entries` SET `checked` = ? WHERE ID = ? LIMIT 1";
					$params = [1, $_GET['id']];
					$types = "ii";
					mgb_sql_connect($mysqli, $sql, "Error while activating entry and updating sql table.", 0, $params, $types);
					mgb_trigger_sys_log($mysqli, 1013, '', '', '', $_SESSION['user_name'], '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog (1 or more entries activated by the user)
					mgb_erase_cache("../cache/");
				}

				// send an email to user
				if(isset($_GET['notify']) && $_GET['notify'] === 1) {
					$result = mgb_sql_connect($mysqli, "SELECT name, email, message FROM ".$db['prefix']."entries WHERE id=".secure_value($_GET['id'])." LIMIT 1", "Error while loading information for sending an email to user.", 1);
					$data = mysqli_fetch_array($result, MYSQLI_ASSOC);
					$name = $data['name'];
					$email = $data['email'];
					$message = $data['message'];

					$date = date("d"."/"."m"."/"."Y");
					$time = date("H".":"."i");

					$url_to_gb = "https://".$settings['h_domain'].$settings['gb_path']."index.php";

					$lang['sendmail_user_notification_title'] = format_mail(repl_uml($lang['sendmail_user_notification_title'], $charset), $name, $date, $time, xhtmlbr2nl($message), $settings['h_domain'], $url_to_gb, "", "", "", "", "", "");
					$settings['sendmail_user_notification_text'] = format_mail(repl_uml($settings['sendmail_user_notification_text'], $charset), $name, $date, $time, xhtmlbr2nl($message), $settings['h_domain'], $url_to_gb, "", "", "", "", "", "");

					$mail_header = "content-type: text/plain; charset=".$charset."\r\n";
					$mail_header .= "from: ".$settings['admin_gbemail']."\r\n";
					$mail_header .= "Reply-To: ".$settings['admin_gbemail']."\r\n";
					$mail_header .= "X-Mailer: PHP/".phpversion();

					if(isset($email) AND $email !== "") {
						if($settings['mailer_method'] === 0) {
							$mail_send = @mail($email, $lang['sendmail_user_notification_title'], $settings['sendmail_user_notification_text'], $mail_header);
							if($mail_send) {
								$sendemail_successfull = 1;
								mgb_trigger_sys_log($mysqli, 1026, $name, $email, '', $_SESSION['user_name'], '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog (info mail was sent)
							} else {
								$sendemail_successfull = 0;
							}
						} elseif($settings['mailer_method'] === 1 AND file_exists(MGB_ROOT."plugins/phpmailer/class.phpmailer.php")) {
							$mail_send = mgb_phpmailer($email, $settings['admin_email'], $name, $settings['h_domain'], $lang['sendmail_user_notification_title'], $settings['sendmail_user_notification_text'], $settings['debug_mode'], "adminpanel", $language_short, $charset);
							if($mail_send[0] == 0) {
								$sendemail_successfull = 0;
								$template_message = "<br><br>phpmailer: ".$mail_send[1];
							} else {
								$sendemail_successfull = 1;
								mgb_trigger_sys_log($mysqli, 1026, $name, $email, '', $_SESSION['user_name'], '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog (info mail was sent)
							}
						}
					}
				}
			}

			// get total number of entries
			$sql = "SELECT COUNT(ID) AS total FROM ".$db['prefix']."entries WHERE checked = ? AND isspam = ?";
			$params = [0, 0];
			$types = "ii";
			$results = mgb_sql_connect($mysqli, $sql, "Error while counting entries.", 1, $params, $types);
			$row = $results->fetch_assoc();
			$total = (int)$row['total'];

			// compute how many pages there are
			$p = ($total / 20);

			if ($p <= 1) {
				$p = 0;
				if ($total > 1) {
					$how_many_entries = "<span class=\"admin\">".$total."&nbsp;".$lang['entries']."</span>";
				} elseif ($total == 0) {
					$how_many_entries = "<span class=\"admin\">".$lang['no_deactivated_entries']."</span>";
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

			if ($_GET['p'] == 1) {
				$sf_forwards = "<a class=\"admin\" href=\"admin.php?action=activate&amp;p=".($_GET['p'] + 1).$sid."\" title=\"".$lang['page_forwards']."\">".$lang['page_forwards_symbol']."</a>";
				$sf_pagenumber = $_GET['p'];
				if ($pages_total >= 3 ) {
					$sf_last = "<a class=\"admin\" href=\"admin.php?action=activate&amp;p=".$pages_total."\" title=\"".$lang['page_last']."\">".$lang['page_last_symbol']."</a>";
				}
			}

			if ($_GET['p'] > 1) {
				if (($pages_total >= 3) AND ($_GET['p'] > 2)) {
					$sf_first = "<a class=\"admin\" href=\"admin.php?action=activate&amp;p=1".$sid."\" title=\"".$lang['page_first']."\">".$lang['page_first_symbol']."</a>";
				}
				$sf_backwards = "<a class=\"admin\" href=\"admin.php?action=activate&amp;p=".($_GET['p'] - 1).$sid."\" title=\"".$lang['page_backwards']."\">".$lang['page_backwards_symbol']."</a>";
				$sf_pagenumber = $_GET['p'];
				$sf_forwards = "<a class=\"admin\" href=\"admin.php?action=activate&amp;p=".($_GET['p'] + 1).$sid."\" title=\"".$lang['page_forwards']."\">".$lang['page_forwards_symbol']."</a>";
				if (($pages_total >= 3) AND ($_GET['p'] < ($pages_total - 1))) {
					 $sf_last = "&nbsp;<a class=\"admin\" href=\"admin.php?action=activate&amp;p=".$pages_total.$sid."\" title=\"".$lang['page_last']."\">".$lang['page_last_symbol']."</a>";
				}
			}

			if ($_GET['p'] == $pages_total) {
				if ($pages_total >= 3) {
					$sf_first = "<a class=\"admin\" href=\"admin.php?action=activate&amp;p=1".$sid."\" title=\"".$lang['page_first']."\">".$lang['page_first_symbol']."</a>";
				}
				$sf_backwards = "<a class=\"admin\" href=\"admin.php?action=activate&amp;p=".($_GET['p'] - 1).$sid."\" title=\"".$lang['page_backwards']."\">".$lang['page_backwards_symbol']."</a>";
				$sf_pagenumber = $_GET['p'];
				$sf_forwards = "";
			}

			if ($pages_total <= 0) {
				$content_scrolling_function = "<br><br>";
			}

			// load guestbook entries
			$sql = "SELECT * FROM ".$db['prefix']."entries WHERE checked = 0 AND isspam = 0 ORDER BY ID DESC LIMIT ?, ?";
			$params = [$load_start, $load_end];
			$types = "ii";
			$result = mgb_sql_connect($mysqli, $sql, "Error while loading inactive guestbook entries.", 1, $params, $types);
			$entry = mysqli_fetch_all($result, MYSQLI_ASSOC);
			$counter = count($entry);

			if ($counter <= 1) {
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
					$page_entry[$i] = $content_activate;

					if(empty($entry[$i]['ip'])) { $entry[$i]['ip'] = "-"; }
					if(empty($entry[$i]['comment'])) { $entry[$i]['comment'] = "-"; }

					// wordwrap: if message contains words longer than $settings['wordwrap'] they will
					// be broken into two or more strings. If $settings['wordwrap'] == 0, function is off
					// this method taken from http://de.php.net/manual/en/function.wordwrap.php#64517
					// will luckily not affect html tags

					$entry[$i]['message'] = textWrap($entry[$i]['message'], 45);
					$entry[$i]['comment'] = textWrap($entry[$i]['comment'], 45);

					// convert bbcodes
					$entry[$i]['message'] = bbcode_format($mysqli, $entry[$i]['message'], "adminpanel");
					$entry[$i]['comment'] = bbcode_format($mysqli, $entry[$i]['comment'], "adminpanel");

					// fill template with entry (strings)
					$page_entry[$i] = mgb_template_replace([
						'ENTRY_ID' 		=> $entry[$i]['ID'],
						'ENTRY_NAME' 	=> substr($entry[$i]['name'], 0, 20),
						'ENTRY_MESSAGE' => $entry[$i]['message'],
						'ENTRY_IP' 		=> $entry[$i]['ip'],
						'ENTRY_EMAIL' 	=> $entry[$i]['email'],
						'ENTRY_HP' 		=> $entry[$i]['hp'],
						'ENTRY_COMMENT' => $entry[$i]['comment'],
						'LANG_QUOTE' 	=> $lang['quote'],
						'ACTIVATE' 		=> "<a href=\"admin.php?action=activate&amp;id=".$entry[$i]['ID']."&amp;notify=".$entry[$i]['user_notification'].$add_page_nr.$sid."\"><img class=\"icon\" src=\"templates/default/images/activate.png\" title=\"".$lang['activate_entry']."\" alt=\"".$lang['activate_entry']."\"></a>",
						'MARK_AS_SPAM' 	=> "<a href=\"admin.php?action=activate&amp;id=".$entry[$i]['ID']."&amp;isspam=1".$add_page_nr.$sid."\"><img class=\"icon\" src=\"templates/default/images/spam.png\" title=\"".$lang['mark_as_spam']."\" alt=\"".$lang['mark_as_spam']."\"></a>",
						'TEMPLATE_PATH' => "templates/".$settings['template_path']
					], $page_entry[$i]);

					if(!isset($page_include)) { $page_include = NULL; }
					$page_include .= $page_entry[$i];
				}
			}
		} else {
			$page_include = "<span class=\"admin\">".$lang['errormessage'][4]."</span>"; // user has no right to access this page
			$content_scrolling_function = "<br>";
		}
	}
?>
