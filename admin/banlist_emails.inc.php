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

	======================
	banlist_emails.inc.php
	======================
	*/

	// make sure nobody has direct access to this script
	if (!defined('ADMINISTRATION')) {
		include ("error.html");
		die();
	} else {
		if(check_rights($mysqli, $_GET['action'], $_SESSION['user_ID'])) {
			// load config, settings and language files
			require ("../includes/config.inc.php");
			require ("../includes/load_settings.inc.php");
			require ("../language/".$settings['language_path']."/lang_admin.php");
			// load templates
			$content_banlist_emails = mgb_load_template("admin", "default", "banlists", $settings['debug_mode']);

			// set number of site to "1" if it is "0"
			if(!isset($_GET['p'])) { $_GET['p'] = 1; }

			if(empty($_POST['dropbox'])) { $_POST['dropbox'] = ""; }

			if(!empty($_POST['dropbox'])) {
				if($_POST['dropbox'] == 1) { // Delete all spam entries
					mgb_sql_connect($mysqli, "TRUNCATE ".$db['prefix']."banlist_emails", "Error while deleting all spam entries.", 0, null, null);
				} elseif($_POST['dropbox'] == 8) { // export as sql dump
					$script_time_start = microtime(true);
					include("../includes/config.inc.php");

					$sql_dump = "-- MGB OpenSource Guestbook SQL Dump\n";
					$sql_dump.= "-- Version: ".$settings['version']."\n";
					$sql_dump.= "-- https://www.m-gb.org/\n";
					$sql_dump.= "--\n";
					$sql_dump.= "-- Host: ".$db['hostname']."\n";
					$sql_dump.= "-- Database: ".$db['dbname']."\n";
					$sql_dump.= "-- Tables: banlist_emails\n";
					$sql_dump.= "-- ---------------------------------------;\n\n";

					// get structure of sql table
					$sql_dump.= mgb_get_sql_structure($mysqli, $db['prefix'], "banlist_emails", 1);
					$sql_dump.= mgb_get_sql_structure($mysqli, $db['prefix'], "banlist_emails", 2);

					$sql_dump.= "-- END OF FILE --";
					$backup_filename = "-".$db['prefix']."banlist_emails.sql";

					if(!empty($backup_filename)) {
						if(file_exists("../save") AND is_dir("../save") AND is_writable("../save")) {
							$timestamp = time();
							if(mgb_write_export_file("../save/".$timestamp.$backup_filename, $sql_dump) == TRUE) {
								$script_time_end = microtime(true);
								$script_time = $script_time_end - $script_time_start;
								$template_message = "<span class='newer_version'><a href='../save/".$timestamp.$backup_filename."' target='_blank'>SQL Dump</a> erfolgreich in ".round($script_time, 3)." Sekunden erstellt!</span>";
							} else {
								$template_message = "<span class='old_version'>".$lang['errormessage'][17]."</span>";
							}
						} else {
							$template_message = "<span class='old_version'>".$lang['errormessage'][17]."</span>";
						}
					}
				} elseif($_POST['dropbox'] == 9) { // export as csv
					/*
						This option is currently not supported
					*/
					$script_time_start = microtime(true);

					$result = mgb_sql_connect($mysqli, "SELECT banned_email, banned_email_first, banned_email_second, timestamp FROM ".$db['prefix']."banlist_emails ORDER BY banned_email_first ASC", "Error while loading data from banlist_emails for csv export.", 1);
					for($i = 0; $i < mysqli_num_rows($result); $i++) {
						$export[$i] = mysqli_fetch_array($result, MYSQLI_ASSOC);
						$ID = $i + 1;
						$csv.= $ID.":".$export[$i]['banned_email'].":".$export[$i]['banned_email_first'].":".$export[$i]['banned_email_second'].":".$export[$i]['timestamp']."\n";
					}

					if(file_exists("../save") AND is_writable("../save")) {
						$timestamp = time();
						if(mgb_write_export_file("../save/".$timestamp."-".$db['prefix']."banlist_emails.csv", $csv) === TRUE) {
							$script_time_end = microtime(true);
							$script_time = $script_time_end - $script_time_start;
							$template_message = "<span class='newer_version'><a href='../save/".$timestamp."-".$db['prefix']."banlist_emails.csv' target='_blank'>CSV</a> erfolgreich in ".round($script_time, 3)." Sekunden erstellt!</span>";
						} else {
							$template_message = "<span class='old_version'>".$lang['errormessage'][18]."</span>";
						}
					} else {
						$template_message = "<span class='old_version'>".$lang['errormessage'][18]."</span>";
					}
				}
			}

			if(isset($_GET['id'])) {
				if(isset($_GET['spam_action'])) {
					if($_GET['spam_action'] == 'delete') {
						$sql = "DELETE FROM `".$db['prefix']."banlist_emails` WHERE ID = ? LIMIT 1";
						$params = [$_GET['id']];
						$types = "i";
						mgb_sql_connect($mysqli, $sql, "Error while deleting a single spam entry.", 0, $params, $types);
					}
				}
			}

			// get total number of entries
			$sql = "SELECT COUNT(banned_email) AS total FROM ".$db['prefix']."banlist_emails";
			$results = mgb_sql_connect($mysqli, $sql, "Error while counting banned email entries.", 1, null, null);
			$row = $results->fetch_assoc();
			$total = (int)$row['total'];

			// how many entries per page shall be shown?
			$epp = 100;

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
			if($_GET['orderby'] == "content") { $_GET['orderby'] = "banned_email"; }
			
			if ($_GET['p'] == 1) {
				$sf_forwards = "<a class=\"admin\" href=\"admin.php?action=banlist_emails&amp;orderby=".$_GET['orderby']."&amp;sort=".$_GET['sort']."&amp;p=".($_GET['p'] + 1)."\" title=\"".$lang['page_forwards']."\">".$lang['page_forwards_symbol']."</a>";
				$sf_pagenumber = $_GET['p'];
				if ($pages_total >= 3 ) {
					$sf_last = "<a class=\"admin\" href=\"admin.php?action=banlist_emails&amp;orderby=".$_GET['orderby']."&amp;sort=".$_GET['sort']."&amp;p=".$pages_total."\" title=\"".$lang['page_last']."\">".$lang['page_last_symbol']."</a>";
				}
			}

			if ($_GET['p'] > 1) {
				if (($pages_total >= 3) AND ($_GET['p'] > 2)) {
					$sf_first = "<a class=\"admin\" href=\"admin.php?action=banlist_emails&amp;orderby=".$_GET['orderby']."&amp;sort=".$_GET['sort']."&amp;p=1"."\" title=\"".$lang['page_first']."\">".$lang['page_first_symbol']."</a>";
				}
				$sf_backwards = "<a class=\"admin\" href=\"admin.php?action=banlist_emails&amp;orderby=".$_GET['orderby']."&amp;sort=".$_GET['sort']."&amp;p=".($_GET['p'] - 1)."\" title=\"".$lang['page_backwards']."\">".$lang['page_backwards_symbol']."</a>";
				$sf_pagenumber = $_GET['p'];
				$sf_forwards = "<a class=\"admin\" href=\"admin.php?action=banlist_emails&amp;orderby=".$_GET['orderby']."&amp;sort=".$_GET['sort']."&amp;p=".($_GET['p'] + 1)."\" title=\"".$lang['page_forwards']."\">".$lang['page_forwards_symbol']."</a>";
				if (($pages_total >= 3) AND ($_GET['p'] < ($pages_total - 1))) {
					$sf_last = "&nbsp;<a class=\"admin\" href=\"admin.php?action=banlist_emails&amp;orderby=".$_GET['orderby']."&amp;sort=".$_GET['sort']."&amp;p=".$pages_total."\" title=\"".$lang['page_last']."\">".$lang['page_last_symbol']."</a>";
				}
			}

			if ($_GET['p'] == $pages_total) {
				if ($pages_total >= 3) {
					$sf_first = "<a class=\"admin\" href=\"admin.php?action=banlist_emails&amp;orderby=".$_GET['orderby']."&amp;sort=".$_GET['sort']."&amp;p=1"."\" title=\"".$lang['page_first']."\">".$lang['page_first_symbol']."</a>";
				}
				$sf_backwards = "<a class=\"admin\" href=\"admin.php?action=banlist_emails&amp;orderby=".$_GET['orderby']."&amp;sort=".$_GET['sort']."&amp;p=".($_GET['p'] - 1)."\" title=\"".$lang['page_backwards']."\">".$lang['page_backwards_symbol']."</a>";
				$sf_pagenumber = $_GET['p'];
				$sf_forwards = "";
			}

			if ($pages_total <= 0) {
				$content_scrolling_function = "<br><br>";
			}
			
			// Erlaubte Spalten für ORDER BY
			$allowed_columns = ['id', 'banned_email', 'matches', 'timestamp'];
			// Erlaubte Sortierrichtungen
			$allowed_sort = ['ASC', 'DESC'];

			// Standardwerte
			$orderby = 'id';
			$sort = 'ASC';

			// Benutzereingaben validieren
			if (isset($_GET['orderby']) && in_array($_GET['orderby'], $allowed_columns)) {
				$orderby = $_GET['orderby'];
			}
			if (isset($_GET['sort']) && in_array(strtoupper($_GET['sort']), $allowed_sort)) {
				$sort = strtoupper($_GET['sort']);
			}

			// load guestbook entries
			$sql = "SELECT id, banned_email, matches, timestamp FROM ".$db['prefix']."banlist_emails ORDER BY $orderby $sort LIMIT $load_start, $load_end";			
			$result = mgb_sql_connect($mysqli, $sql, "Error while loading banned email entries.", 1, null, null);
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
			require_once ("../includes/functions.inc.php");

			if(!empty($entry)) {
				for($i = 0; $i < count($entry); $i++) {
					$page_entry[$i] = $content_banlist_emails;

					if(!empty($entry[$i]['timestamp'])) {
						$entry_timestamp = mgb_modern_timestamp($entry[$i]['timestamp'], $settings['language_path'], "adminpanel");
					} else {
						$entry_timestamp = "-";
					}

					// fill template with entry (strings)
					$page_entry[$i] = mgb_template_replace([
						'ENTRY_ID' 			=> $entry[$i]['id'],
						'ENTRY_IP' 			=> "",
						'ENTRY_EMAIL' 		=> $entry[$i]['banned_email'],
						'ENTRY_DOMAIN' 		=> "",
						'ENTRY_MATCHES' 	=> $entry[$i]['matches'],
						'ENTRY_TIMESTAMP' 	=> $entry_timestamp,
						'DELETE' 			=> "<a href=\"admin.php?action=banlist_emails&amp;id=".$entry[$i]['id']."&amp;spam_action=delete".$add_page_nr."\" onClick=\"return confirm('".$entry[$i]['id'].", ".$entry[$i]['banned_email'].":&nbsp;{LANG_CONFIRM_DELETE}'); submit();\"><img class=\"icon\" src=\"templates/default/images/delete.png\" title=\"".$lang['delete_entry']."\" alt=\"".$lang['delete_entry']."\"></a>"
					], $page_entry[$i]);

					if(!isset($page_include)) { $page_include = NULL; }
					$page_include .= $page_entry[$i];
				}
			} else {
				$page_include = "";
			}
		} else {
			$page_include = "<span class=\"admin\">".$lang['errormessage'][4]."</span>";
			$content_scrolling_function = "<br>";
		}
	}
?>
