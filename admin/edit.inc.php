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
	edit.inc.php
	============
	*/

	// make sure nobody has direct acces to this script
	if(!defined('ADMINISTRATION')) {
		include ("error.html");
		die();
	} else {
		if(check_rights($mysqli, $_GET['action'], $_SESSION['user_ID'])) {
			// load config, settings and language files
			require (MGB_ROOT."includes/config.inc.php");
			require (MGB_ROOT."includes/load_settings.inc.php");
			require (MGB_ROOT."language/".$settings['language_path']."/lang_admin.php");

			// load templates
			$content_edit = mgb_load_template("admin", "default", "edit", $settings['debug_mode']);
			$content_edit_single = mgb_load_template("admin", "default", "edit_single", $settings['debug_mode']);

			// set number of site to "1" if it is "0"
			if(!isset($_GET['p'])) { $_GET['p'] = 1; }

			$ok = 1;

			if(isset($_GET['id'])) {
				if(isset($_POST['sent_edit']) AND $_POST['sent_edit'] == 1) {
					// delete html code, php code and white spaces
					if(!isset($_POST['user_notification'])) { $_POST['user_notification'] = 0; }
					if(!isset($_POST['user_show_email'])) { $_POST['user_show_email'] = 0; }

					require_once (MGB_ROOT."includes/functions.inc.php");

					// delete bbcode except from message and comment
					$_POST['date'] = bbcode_delete($_POST['date']);
					$_POST['time'] = bbcode_delete($_POST['time']);
					$_POST['name'] = bbcode_delete($_POST['name']);
					$_POST['city'] = bbcode_delete($_POST['city']);
					$_POST['social_mastodon'] = bbcode_delete($_POST['social_mastodon']);
					$_POST['social_bluesky'] = bbcode_delete($_POST['social_bluesky']);
					// $_POST['social_w'] = bbcode_delete($_POST['social_w']);						// not supported yet
					// $_POST['social_eu_voice'] = bbcode_delete($_POST['social_eu_voice']);
					// $_POST['social_eu_video'] = bbcode_delete($_POST['social_eu_video']);
					// $_POST['social_monnett'] = bbcode_delete($_POST['social_monnett']);
					$_POST['hp'] = bbcode_delete($_POST['hp']);

					// set date and time back to unix timestamp format
					$date = explode(".", $_POST['date']);

					$first_date = substr("d.m.Y", 0,1);
					$second_date = substr("d.m.Y", 2,1);
					$third_date = substr("d.m.Y", 4,1);

					$hours = substr($_POST['time'], 0,2);
					$minutes = substr($_POST['time'], 3,2);

					switch ($first_date) {
						case "d":
							$day = $date[0];
							break;
						case "m":
							$month = $date[0];
							break;
						case "Y":
							$year = $date[0];
							break;
					} switch ($second_date) {
						case "d":
							$day = $date[1];
							break;
						case "m":
							$month = $date[1];
							break;
						case "Y":
							$year = $date[1];
							break;
					} switch ($third_date) {
						case "d":
							$day = $date[2];
							break;
						case "m":
							$month = $date[2];
							break;
						case "Y":
							$year = $date[2];
							break;
					}

					$timestamp = mktime($hours, $minutes, 0, $month, $day, $year);

					// save data to database
					$sql = "UPDATE ".$db['prefix']."entries SET
						`name` = ?,
						`city` = ?,
						`email`	= ?,
						`social_mastodon` = ?,
						`social_bluesky` = ?,
						`hp` = ?,
						`message` = ?,
						`comment` = ?,
						`timestamp` = ?,
						`user_notification` = ?,
						`user_show_email` = ?
						WHERE ID = ? LIMIT 1";
					
					$params = [
						$_POST['name'],
						$_POST['city'],
						$_POST['email'],
						$_POST['social_mastodon'],
						$_POST['social_bluesky'],
						$_POST['hp'],
						$_POST['message'],
						$_POST['comment'],
						$timestamp,
						$_POST['user_notification'],
						$_POST['user_show_email'],
						$_GET['id']
					];
					
					$types = "ssssssssiiii";

					if(mgb_sql_connect($mysqli, $sql, "Error while updating entry.", 0, $params, $types)) {
						$saved_settings_successfull = 1;
						mgb_trigger_sys_log($mysqli, 1016, $_POST['name'], $_POST['email'], $_POST['message'], $_SESSION['user_name'], '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog (1 or more entries where edited by user)
						mgb_erase_cache("../cache/");
					}

					if($_POST['user_notification'] == 1 AND !empty($_POST['comment']) AND !empty($_POST['email'])) {
						$date = date("d"."/"."m"."/"."Y");
						$time = date("H".":"."i");

						$url_to_gb = "https://".$settings['h_domain'].$settings['gb_path']."index.php";

						$lang['sendmail_user_comment_title'] = format_mail($lang['sendmail_user_comment_title'], $_POST['name'], $date, $time, trim(xhtmlbr2nl($_POST['message'])), $settings['h_domain'], $url_to_gb, "", "", "", "", "", "", "");
						$settings['sendmail_comment_text'] = format_mail($settings['sendmail_comment_text'], $_POST['name'], $date, $time, trim(xhtmlbr2nl($_POST['message'])), $settings['h_domain'], $url_to_gb, "", "", "", "", "", "", "");

						$mail_header = "content-type: text/plain; charset=".$charset."\r\n";
						$mail_header .= "from: ".$settings['admin_gbemail']."\r\n";
						$mail_header .= "Reply-To: ".$settings['admin_gbemail']."\r\n";
						$mail_header .= "X-Mailer: PHP/".phpversion();

						if($settings['mailer_method'] == 0) {
							$mail_send = @mail($_POST['email'], $lang['sendmail_user_comment_title'], $settings['sendmail_comment_text'], $mail_header);
							if($mail_send) {
								$sendemail_successfull = 1;
								mgb_trigger_sys_log($mysqli, '1026', $_POST['name'], $_POST['email'], $_POST['comment'], $_SESSION['user_name'], '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog (info mail was sent)
							} else {
								$sendemail_successfull = 0;
							}
						} elseif($settings['mailer_method'] == 1 AND file_exists("../plugins/phpmailer/class.phpmailer.php")) {
							$mail_send = mgb_phpmailer($_POST['email'], $settings['admin_email'], $_POST['name'], $settings['h_domain'], $lang['sendmail_user_comment_title'], $settings['sendmail_comment_text'], $settings['debug_mode'], "adminpanel", $language_short, $charset);
							if($mail_send[0] == 0) {
								$sendemail_successfull = 0;
								$template_message = "<br><br>phpmailer: ".$mail_send[1];
							} else {
								$sendemail_successfull = 1;
								mgb_trigger_sys_log('1026', $_POST['name'], $_POST['email'], $_POST['comment'], $_SESSION['user_name'], '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog (info mail was sent)
							}
						}
					}
					$ok = 1;
				} else {
					require_once (MGB_ROOT."includes/functions.inc.php");

					$sql = "SELECT * FROM ".$db['prefix']."entries WHERE ID = ? LIMIT 1";
					$params = [$_GET['id']];
					$types = "i";
					$result = mgb_sql_connect($mysqli, $sql, "Error while loading a single entry.", 1, $params, $types);
					$entry = mysqli_fetch_array($result, MYSQLI_ASSOC);

					$page_entry_single = $content_edit_single;

					// Datum und Zeit trennen
					$date = date("d.m.Y", $entry['timestamp']);
					$time = date("H:i", $entry['timestamp']);

					if($entry['user_notification'] == 1) { $checked_notify = " checked=\"checked\""; } else { $checked_notify = NULL; }
					if($entry['user_show_email'] == 1) { $checked_show_email = " checked=\"checked\""; } else { $checked_show_email = NULL; }

					$page_entry_single = mgb_template_replace([
						'ENTRY_ID' 				=> $entry['ID'],
						'ENTRY_DATE' 			=> $date,
						'ENTRY_TIME' 			=> $time,
						'ENTRY_NAME' 			=> mgb_format($entry['name']),
						'ENTRY_CITY'	 		=> mgb_format($entry['city']),
						'ENTRY_EMAIL' 			=> $entry['email'],
						'ENTRY_MASTODON'		=> mgb_format($entry['social_mastodon']),
						'ENTRY_BLUESKY' 		=> mgb_format($entry['social_bluesky']),
						// 'ENTRY_W' 			=> mgb_format($entry['social_w']),
						// 'ENTRY_EU_VOICE'		=> mgb_format($entry['social_eu_voice']),
						// 'ENTRY_EU_VIDEO' 	=> mgb_format($entry['social_eu_video']),
						// 'ENTRY_MONNETT' 		=> mgb_format($entry['social_monnett']),
						'ENTRY_HP' 				=> $entry['hp'],
						'ENTRY_MESSAGE' 		=> mgb_format($entry['message']),
						'ENTRY_COMMENT' 		=> mgb_format($entry['comment']),
						'ENTRY_IP' 				=> $entry['ip'],
						'CHECKED_NOTIFY' 		=> $checked_notify,
						'CHECKED_SHOW_EMAIL' 	=> $checked_show_email,
						'FORM_ACTION' 			=> "admin.php?action=edit&amp;id=".$entry['ID']."&p=".$_GET['p']
					], $page_entry_single);

					$content_scrolling_function = "<br>";

					$page_include = $page_entry_single;

					$ok = 0;
				}
			}
		} else {
			$page_include = "<span class=\"admin\">".$lang['errormessage'][4]."</span>";
			$content_scrolling_function = "<br>";
			$ok = 0;
		}

		if($ok == 1) {
			// get total number of entries
			$sql = "SELECT COUNT(ID) AS total FROM ".$db['prefix']."entries WHERE isspam=0";
			$results = mgb_sql_connect($mysqli, $sql, "Error while counting entries.", 1, null, null);
			$row = $results->fetch_assoc();
			$total = (int)$row['total'];

			// compute how many pages there are
			$p = ($total / 20);

			if($p <= 1) {
				$p = 0;
				if($total > 1) {
					$how_many_entries = "<span class=\"admin\">".$total."&nbsp;".$lang['entries']."</span>";
				} elseif($total == 0) {
					$how_many_entries = "<span class=\"admin\">".$lang['no_entries']."</span>";
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

			if($_GET['p'] == 1) {
				$sf_forwards = "<a class=\"admin\" href=\"admin.php?action=edit&amp;p=".($_GET['p'] + 1)."\" title=\"".$lang['page_forwards']."\">".$lang['page_forwards_symbol']."</a>";
				$sf_pagenumber = $_GET['p'];
				if($pages_total >= 3 ) {
					$sf_last = "<a class=\"admin\" href=\"admin.php?action=edit&amp;p=".$pages_total."\" title=\"".$lang['page_last']."\">".$lang['page_last_symbol']."</a>";
				}
			}

			if($_GET['p'] > 1) {
				if(($pages_total >= 3) AND ($_GET['p'] > 2)) {
					$sf_first = "<a class=\"admin\" href=\"admin.php?action=edit&amp;p=1"."\" title=\"".$lang['page_first']."\">".$lang['page_first_symbol']."</a>";
				}
				$sf_backwards = "<a class=\"admin\" href=\"admin.php?action=edit&amp;p=".($_GET['p'] - 1)."\" title=\"".$lang['page_backwards']."\">".$lang['page_backwards_symbol']."</a>";
				$sf_pagenumber = $_GET['p'];
				$sf_forwards = "<a class=\"admin\" href=\"admin.php?action=edit&amp;p=".($_GET['p'] + 1)."\" title=\"".$lang['page_forwards']."\">".$lang['page_forwards_symbol']."</a>";
				if(($pages_total >= 3) AND ($_GET['p'] < ($pages_total - 1))) {
					$sf_last = "&nbsp;<a class=\"admin\" href=\"admin.php?action=edit&amp;p=".$pages_total."\" title=\"".$lang['page_last']."\">".$lang['page_last_symbol']."</a>";
				}
			}

			if($_GET['p'] == $pages_total) {
				if($pages_total >= 3) {
					$sf_first = "<a class=\"admin\" href=\"admin.php?action=edit&amp;p=1"."\" title=\"".$lang['page_first']."\">".$lang['page_first_symbol']."</a>";
				}
				$sf_backwards = "<a class=\"admin\" href=\"admin.php?action=edit&amp;p=".($_GET['p'] - 1)."\" title=\"".$lang['page_backwards']."\">".$lang['page_backwards_symbol']."</a>";
				$sf_pagenumber = $_GET['p'];
				$sf_forwards = "";
			}

			if($pages_total <= 0) {
				$content_scrolling_function = "<br><br>";
			}

			// load guestbook entries
			$sql = "SELECT * FROM ".$db['prefix']."entries WHERE isspam = 0 ORDER BY ID DESC LIMIT ?, ?";
			$params = [$load_start, $load_end];
			$types = "ii";
			$result = mgb_sql_connect($mysqli, $sql, "Error while loading guestbook entries.", 1, $params, $types);
			$entry = mysqli_fetch_all($result, MYSQLI_ASSOC);
			$counter = count($entry);

			if($counter <= 1) {
				if($_GET['p'] == 1) {
					$add_page_nr = "";
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
				$page_entry[$i] = $content_edit;

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

				// convert smilies
				/* $entry[$i]['message'] = set_smilies($entry[$i]['message']);
				$entry[$i]['comment'] = set_smilies($entry[$i]['comment']); */

				if($entry[$i]['checked'] == 0) { $status = "<img class=\"icon\" src=\"templates/default/images/inactive.png\" title=\"".$lang['inactive']."\" alt=\"".$lang['inactive']."\">"; } else { $status = "<img class=\"icon\" src=\"templates/default/images/active.png\" title=\"".$lang['active']."\" alt=\"".$lang['active']."\">"; }

				// fill template with entry (strings)
				$page_entry[$i] = mgb_template_replace([
					'ENTRY_ID' 		=> $entry[$i]['ID'],
					'ENTRY_NAME' 	=> mgb_format(substr($entry[$i]['name'], 0, 20)),
					'ENTRY_MESSAGE' => mgb_render_text($entry[$i]['message'], 2, 2, $mysqli), // '2' means do nothing. don't parse bbcode and don't parse smilies. don't delete them either.
					'ENTRY_IP' 		=> $entry[$i]['ip'],
					'ENTRY_EMAIL' 	=> $entry[$i]['email'],
					'ENTRY_HP' 		=> mgb_format($entry[$i]['hp']),
					'ENTRY_COMMENT' => mgb_render_text($entry[$i]['comment'], 2, 2, $mysqli),
					'LANG_QUOTE' 	=> $lang['quote'],
					'EDIT' 			=> $status."<br><a href=\"admin.php?action=edit&amp;id=".$entry[$i]['ID'].$add_page_nr."\"><img class=\"icon\" src=\"templates/default/images/edit.png\" title=\"".$lang['edit_entry']."\" alt=\"".$lang['edit_entry']."\"></a>"
			], $page_entry[$i]);

				if(!isset($page_include)) { $page_include = NULL; }
				$page_include .= $page_entry[$i];
			}
		}
	}
?>
