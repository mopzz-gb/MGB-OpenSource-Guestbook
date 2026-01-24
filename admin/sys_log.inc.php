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

	// =============== //
	// sys_log.inc.php //
	// =============== //
	//
	// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

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
			$content_sys_log = mgb_load_template("admin", "default", "sys_log", $settings['debug_mode']);

			// set number of site to "1" if it is "0"
			if(!isset($_GET['p'])) { $_GET['p'] = 1; }

			// get total number of entries
			if((!empty($_POST['dropbox']) AND $_POST['dropbox'] == 1000) OR (!empty($_GET['show_type']) AND $_GET['show_type'] == 1000)) {
				$show_type = " WHERE type=1000";
				$show_url = "&amp;show_type=1000";
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
			$sql = "SELECT COUNT(ID) AS total FROM ".$db['prefix']."sys_log";
			$results = mgb_sql_connect($mysqli, $sql, "Error while counting system log entries.", 1);
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
					$how_many_entries = "<span class=\"admin\">".$lang['no_sys_log_entries']."</span>";
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

			if ($_GET['p'] == 1) {
				$sf_forwards = "<a class=\"admin\" href=\"admin.php?action=sys_log".$show_url."&amp;p=".($_GET['p'] + 1).$sid."\" title=\"".$lang['page_forwards']."\">".$lang['page_forwards_symbol']."</a>";
				$sf_pagenumber = $_GET['p'];
				if ($pages_total >= 3 ) {
					$sf_last = "<a class=\"admin\" href=\"admin.php?action=sys_log".$show_url."&amp;p=".$pages_total."\" title=\"".$lang['page_last']."\">".$lang['page_last_symbol']."</a>";
				}
			}

			if ($_GET['p'] > 1) {
				if (($pages_total >= 3) AND ($_GET['p'] > 2)) {
					$sf_first = "<a class=\"admin\" href=\"admin.php?action=sys_log".$show_url."&amp;p=1".$sid."\" title=\"".$lang['page_first']."\">".$lang['page_first_symbol']."</a>";
				}
				$sf_backwards = "<a class=\"admin\" href=\"admin.php?action=sys_log".$show_url."&amp;p=".($_GET['p'] - 1).$sid."\" title=\"".$lang['page_backwards']."\">".$lang['page_backwards_symbol']."</a>";
				$sf_pagenumber = $_GET['p'];
				$sf_forwards = "<a class=\"admin\" href=\"admin.php?action=sys_log".$show_url."&amp;p=".($_GET['p'] + 1).$sid."\" title=\"".$lang['page_forwards']."\">".$lang['page_forwards_symbol']."</a>";
				if (($pages_total >= 3) AND ($_GET['p'] < ($pages_total - 1))) {
					$sf_last = "&nbsp;<a class=\"admin\" href=\"admin.php?action=sys_log".$show_url."&amp;p=".$pages_total.$sid."\" title=\"".$lang['page_last']."\">".$lang['page_last_symbol']."</a>";
				}
			}

			if ($_GET['p'] == $pages_total) {
				if ($pages_total >= 3) {
					$sf_first = "<a class=\"admin\" href=\"admin.php?action=sys_log".$show_url."&amp;p=1".$sid."\" title=\"".$lang['page_first']."\">".$lang['page_first_symbol']."</a>";
				}
				$sf_backwards = "<a class=\"admin\" href=\"admin.php?action=sys_log".$show_url."&amp;p=".($_GET['p'] - 1).$sid."\" title=\"".$lang['page_backwards']."\">".$lang['page_backwards_symbol']."</a>";
				$sf_pagenumber = $_GET['p'];
				$sf_forwards = "";
			}

			if ($pages_total <= 0) {
				$content_scrolling_function = "<br><br>";
			}

			// load sys_log entries
			$result = mgb_sql_connect($mysqli, "SELECT * FROM ".$db['prefix']."sys_log".$show_type." ORDER BY timestamp DESC LIMIT $load_start, $load_end", "Error while loading system log entries.", 1);
			$counter = 0;

			for($i = 0; $i < mysqli_num_rows($result); $i++) {
				$entry[$i] = mysqli_fetch_array($result, MYSQLI_ASSOC);
				$counter++;
			}

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
			require ("../includes/functions.inc.php");

			if(!isset($entry)) {
				$entry = NULL;
			}

			for($i = 0; $i < count($entry); $i++) {
				$page_entry[$i] = $content_sys_log;
				$entry_timestamp = mgb_modern_timestamp($entry[$i]['timestamp'], $settings['language_path'], "adminpanel");

				if(empty($entry[$i]['email'])) {
					$entry[$i]['email'] = "-";
				}

				$entry_domain = explode("@", $entry[$i]['email']);
				// fill template with entry (strings)
				$page_entry[$i] = mgb_template_replace([
					'ENTRY_TIMESTAMP' 	=> $entry_timestamp,
					'ENTRY_TYPE' 		=> $lang['sys_log_type'][$entry[$i]['type']],
					'ENTRY_NAME' 		=> mgb_format($entry[$i]['name']),
					'ENTRY_EMAIL' 		=> "<a href=\"admin.php?action=sys_log&amp;id=".$entry[$i]['ID']."&amp;spam_action=add_to_permanent_email_banlist".$add_page_nr.$sid."\" onClick=\"return confirm('{LANG_CONFIRM_ADD_TO_PERMANENT_EMAIL_BLOCKLIST}'); submit();\" title=\"{LANG_SPAM_ADD_TO_EMAIL_BANLIST}\">".$entry[$i]['email']."</a>",
					'ENTRY_TEXT' 		=> mgb_format($entry[$i]['text']),
					'ENTRY_IP' 			=> "<a href=\"admin.php?action=sys_log&amp;id=".$entry[$i]['ID']."&amp;spam_action=add_to_permanent_ip_banlist".$add_page_nr.$sid."\" onClick=\"return confirm('{LANG_CONFIRM_ADD_TO_PERMANENT_IP_BLOCKLIST}'); submit();\" title=\"{LANG_SPAM_ADD_TO_IP_BANLIST}\">".$entry[$i]['ip']."</a>",
					'ENTRY_USER' 		=> mgb_format($entry[$i]['user']),
					'ENTRY_USER_NEW' 	=> mgb_format($entry[$i]['user_new']),
					'ENTRY_USER_EDIT' 	=> mgb_format($entry[$i]['user_edit']),
					'DELETE' 			=> "<a href=\"admin.php?action=sys_log&amp;id=".$entry[$i]['ID']."&amp;spam_action=delete".$add_page_nr.$sid."\" onClick=\"return confirm('".$entry[$i]['ID'].", ".$entry[$i]['ip'].":&nbsp;{LANG_CONFIRM_DELETE}'); submit();\"><img class=\"icon\" src=\"templates/default/images/delete.png\" title=\"".$lang['delete_entry']."\" alt=\"".$lang['delete_entry']."\"></a>"
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