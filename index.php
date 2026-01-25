<?php
	/*
	MGB 0.7.x - OpenSource PHP and MySQL Guestbook
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

	=========
	index.php
	=========
	*/

	// show all errors
	error_reporting(E_ALL & ~E_NOTICE);
	
	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // date in the past

	// define site name
	$site_name = "index.php";

	// set root path
	define('MGB_ROOT', dirname(__FILE__)."/");

	if(file_exists(MGB_ROOT."includes/config.inc.php")) {
		// load settings and functions
		require_once (MGB_ROOT.'includes/config.inc.php');
		require_once (MGB_ROOT.'includes/db.php');
		require_once (MGB_ROOT.'includes/functions.inc.php');
		require_once (MGB_ROOT.'includes/load_settings.inc.php');
		// check if mgb has been already installed or an upgrade is necessary
		mgb_iou_check($mysqli, MGB_ROOT);
	} else {
		require_once (MGB_ROOT.'includes/functions.inc.php');
		$mysqli = "";
		mgb_iou_check($mysqli, MGB_ROOT);
	}

	// check if user's ip is on banlist
	if (mgb_isIpBanned($mysqli, $settings, $db)) {
		http_response_code(403);
		exit;
	}

	// override language path if "lang" parameter is set
	if(!empty($_GET['lang'])) {
		MGB_ROOT."language/".$settings['language_path'] = mgb_get_language_path($_GET['lang']);
	}

	require (MGB_ROOT."language/".$settings['language_path'].'/lang_main.php');
	require (MGB_ROOT."language/".$settings['language_path'].'/settings.php');

	// if caching is activated, include page from cache directory instead of loading it out of the database
	if($settings['caching'] == 1 AND !file_exists(MGB_ROOT.'install')) {
		if(!empty($_GET['p'])) {
			$filename = "cache/index_".$language_short."_".$_GET['p'].".html";
		} else {
			$filename = "cache/index_".$language_short."_1.html";
		}

		if(file_exists($filename) AND (time() - filemtime($filename)) < 259200) { // 3 days, value in seconds
	    	if(!empty($settings['debug_mode'])) {
	    		echo "<pre>\n";
	    		echo "<span>Debug: Page loaded out of the cache as \"".$filename."\"</span>\n";
	    		echo "</pre>\n";
	    	}
	    	include($filename);
	    	exit();
		}
	}
	
	// get mysql client info
	$str = mysqli_get_client_info();
	if (preg_match_all("([0-9.]+)", $str, $matches)) $zahlen = $matches[0];
	
	if(empty($version)) { $version = ""; }

	for($i = 0; $i < count($zahlen); $i++) {
		$version.= $zahlen[$i];
	}

	$mysql_client = substr($version, 0, 6);
	
	// send the ping (fallback method if the admin isn't active anymore)
	mgb_send_telemetry($settings['telemetry'], $settings['telemetry_last_ping'], $settings['version'], $mysql_client, $db['prefix'], $settings['telemetry_install_id'], $settings['telemetry_ping'], $mysqli, 604800); // 1 week = 604800 seconds

	// set timezone
	if(function_exists("date_default_timezone_set")) {
		date_default_timezone_set($settings['timezone']);
	}

	// load general templates
	$content_header = mgb_load_template("user", $settings['template_path'], "general/header", $settings['debug_mode']);
	$content_footer = mgb_load_template("user", $settings['template_path'], "general/footer", $settings['debug_mode']);
	$content_copyright = mgb_load_template("user", $settings['template_path'], "general/copyright", $settings['debug_mode']);
	$content_scrolling_function = mgb_load_template("user", $settings['template_path'], "general/scrolling_function", $settings['debug_mode']);
	$content_errormessage = mgb_load_template("user", $settings['template_path'], "general/errormessage", $settings['debug_mode']);

	// load index templates
	$content_index_announcement_message = mgb_load_template("user", $settings['template_path'], "main/index_announcement_message", $settings['debug_mode']);
	$content_index_body = mgb_load_template("user", $settings['template_path'], "main/index_body", $settings['debug_mode']);
	$content_index_entry = mgb_load_template("user", $settings['template_path'], "main/index_entry", $settings['debug_mode']);
	$content_index_entry_aim = mgb_load_template("user", $settings['template_path'], "main/index_entry_aim", $settings['debug_mode']);
	$content_index_entry_city = mgb_load_template("user", $settings['template_path'], "main/index_entry_city", $settings['debug_mode']);
	$content_index_entry_comment = mgb_load_template("user", $settings['template_path'], "main/index_entry_comment", $settings['debug_mode']);
	$content_index_entry_email = mgb_load_template("user", $settings['template_path'], "main/index_entry_email", $settings['debug_mode']);
	$content_index_entry_gravatar = mgb_load_template("user", $settings['template_path'], "main/index_entry_gravatar", $settings['debug_mode']);
	$content_index_entry_hp = mgb_load_template("user", $settings['template_path'], "main/index_entry_hp", $settings['debug_mode']);
	$content_index_entry_icq = mgb_load_template("user", $settings['template_path'], "main/index_entry_icq", $settings['debug_mode']);
	$content_index_entry_info = mgb_load_template("user", $settings['template_path'], "main/index_entry_info", $settings['debug_mode']);
	$content_index_entry_message = mgb_load_template("user", $settings['template_path'], "main/index_entry_message", $settings['debug_mode']);
	$content_index_entry_msn = mgb_load_template("user", $settings['template_path'], "main/index_entry_msn", $settings['debug_mode']);
	$content_index_entry_fb = mgb_load_template("user", $settings['template_path'], "main/index_entry_fb", $settings['debug_mode']);
	$content_index_entry_twitter = mgb_load_template("user", $settings['template_path'], "main/index_entry_twitter", $settings['debug_mode']);

	// set number of site to "1" if it is "0"
	if(empty($_GET['p'])) { $_GET['p'] = 1; }

	// get total number of entries
	$sql = "SELECT COUNT(ID) AS total FROM ".$db['prefix']."entries WHERE checked = 1";
	$results = mgb_sql_connect($mysqli, $sql, "Error while counting guestbook entries.", 1);
	$row = $results->fetch_assoc();
	$total = (int)$row['total'];

	// compute how many pages there are
	$p = ($total / $settings['entries_per_page']);

	if($p <= 1) {
		$p = 0;
		if($total > 1) {
			$how_many_entries = $total."&nbsp;".$lang['entries'];
			}
		elseif($total == 0) {
			$how_many_entries = $lang['no_entries'];
			}
		else {
			$how_many_entries = $total."&nbsp;".$lang['entry'];
		}
	}
	else {
		$p = ceil($p);
		$how_many_entries = $total."&nbsp;".$lang['entries_on_pages'];
	}

	$pagenr = $_GET['p'];

	$load_start = ($pagenr * $settings['entries_per_page']) - $settings['entries_per_page'];
	$load_end = $settings['entries_per_page'];

	$pages_total = ceil($p);

	if($pagenr == 1) {
		$sf_forwards = "<a href=\"index.php?p=".($pagenr + 1)."{PARAMLANG_B}\" title=\"".$lang['page_forwards']."\">".$lang['page_forwards_symbol']."</a>";
		$sf_pagenumber = $pagenr;
		if($pages_total >= 3 ) {
			$sf_last = "<a href=\"index.php?p=".$pages_total."{PARAMLANG_B}\" title=\"".$lang['page_last']."\">".$lang['page_last_symbol']."</a>";
		}
	}

	if($pagenr > 1) {
		if(($pages_total >= 3) AND ($pagenr > 2)) {
			$sf_first = "<a href=\"index.php?p=1{PARAMLANG_B}\" title=\"".$lang['page_first']."\">".$lang['page_first_symbol']."</a>";
		}
		$sf_backwards = "<a href=\"index.php?p=".($pagenr - 1)."{PARAMLANG_B}\" title=\"".$lang['page_backwards']."\">".$lang['page_backwards_symbol']."</a>";
		$sf_pagenumber = $pagenr;
		$sf_forwards = "<a href=\"index.php?p=".($pagenr + 1)."{PARAMLANG_B}\" title=\"".$lang['page_forwards']."\">".$lang['page_forwards_symbol']."</a>";
		if(($pages_total >= 3) AND ($pagenr < ($pages_total - 1))) {
			 $sf_last = "&nbsp;<a href=\"index.php?p=".$pages_total."{PARAMLANG_B}\" title=\"".$lang['page_last']."\">".$lang['page_last_symbol']."</a>";
		}
	}

	if($pagenr == $pages_total) {
		if($pages_total >= 3) {
			$sf_first = "<a href=\"index.php?p=1"."{PARAMLANG_B}\" title=\"".$lang['page_first']."\">".$lang['page_first_symbol']."</a>";
		}
		$sf_backwards = "<a href=\"index.php?p=".($pagenr - 1)."{PARAMLANG_B}\" title=\"".$lang['page_backwards']."\">".$lang['page_backwards_symbol']."</a>";
		$sf_pagenumber = $pagenr;
		$sf_forwards = "";
	}

	if($pages_total <= 0) {
		$content_scrolling_function = "<br>";
	}

	// load guestbook entries
	$sql = "SELECT ID, name, city, email, icq, aim, msn, hp, fb, twitter, message, comment, timestamp, user_show_email FROM ".$db['prefix']."entries WHERE checked = 1 ORDER BY ".$settings['entries_order']." ".$settings['entries_order_asc_desc']." LIMIT $load_start, $load_end";
	$result = mgb_sql_connect($mysqli, $sql, "Error while loading guestbook entries.", 1, null, null);

	// put them in an array
	for($i = 0; $i < mysqli_num_rows($result); $i++) {
		$entry[$i] = mysqli_fetch_array($result, MYSQLI_ASSOC);
	}
	
	// fill header template with content
	$refresh = "";
	$page_header = $content_header;

	// check if "install" directory already exists
	if(file_exists(MGB_ROOT.'install') AND is_dir(MGB_ROOT.'install')) {
		$install_directory_exists = $content_errormessage;
		$install_directory_exists = mgb_template_replace(['ERRORMESSAGE' => $lang['install_directory_exists']], $install_directory_exists);
		$page_header = mgb_template_replace(['INSTALL_DIRECTORY_EXISTS' => $install_directory_exists], $page_header);
	}
	else {
		$page_header = mgb_template_replace(['INSTALL_DIRECTORY_EXISTS' => ""], $page_header);
	}

	// replace header informations
	$page_header = mgb_template_replace([
		'H_LANGUAGE_SHORT' 	=> $language_short,
		'H_DOMAIN' 			=> $settings['h_domain'],
		'H_AUTHOR' 			=> $settings['h_author'],
		'H_KEYWORDS' 		=> $settings['h_keywords'],
		'H_DESCRIPTION'		=> $settings['h_description'],
		'H_CHARSET' 		=> $charset,
		'REFRESH' 			=> $refresh
	], $page_header);

	// fill entry template with content
	if($settings['entries_numbering'] == 0) {
		$entry_counter = ($settings['entries_per_page'] * $pagenr) - $settings['entries_per_page'];
	}
	else {
		$entry_counter = ($total - ($settings['entries_per_page'] * $pagenr) + ($settings['entries_per_page'] + 1));
	}

	if(empty($page_entry_echo)) { $page_entry_echo = ""; }
	
	if($total > 0) {
		for($i = 0; $i < count($entry); $i++) {
			$page_entry[$i] = $content_index_entry;
			if($settings['entries_numbering'] == 0) {
				$entry_counter++;
			}
			else {
				$entry_counter--;
			}

			// wordwrap: if message contains words longer than $settings['wordwrap'] they will
			// be broken into two or more strings. If $settings['wordwrap'] == 0, function is off
			// this method taken from http://de.php.net/manual/en/function.wordwrap.php#64517
			// by ab_at_notenet(dot)dk (thanks for that!!) will luckily not break html tags

			if(!$settings['wordwrap'] == 0) {
				$entry[$i]['message'] = textWrap($entry[$i]['message'], $settings['wordwrap']);
			}

			// set smilies
			if($settings['smileys'] == 1) {
				$entry[$i]['message'] = set_smilies($mysqli, $entry[$i]['message']);
				$entry[$i]['comment'] = set_smilies($mysqli, $entry[$i]['comment']);
			}
			else {
				$entry[$i]['message'] = delete_smilies($mysqli, $entry[$i]['message']);
				$entry[$i]['comment'] = delete_smilies($mysqli, $entry[$i]['comment']);
			}

			// set bbcode
			if($settings['bbcode'] == 1) {
				$entry[$i]['message'] = bbcode_format($mysqli, $entry[$i]['message'], "");
				$entry[$i]['comment'] = bbcode_format($mysqli, $entry[$i]['comment'], "");
			}
			else {
				$entry[$i]['message'] = bbcode_delete($entry[$i]['message']);
				$entry[$i]['comment'] = bbcode_delete($entry[$i]['comment']);
			}

			// find out which optional data has been set by the user
			$info = $content_index_entry_info;
			$email = $content_index_entry_email;
			$message = $content_index_entry_message;
			$city = $content_index_entry_city;
			$hp = $content_index_entry_hp;
			$gravatar = $content_index_entry_gravatar;
			$icq = $content_index_entry_icq;
			$aim = $content_index_entry_aim;
			$msn = $content_index_entry_msn;
			$fb = $content_index_entry_fb;
			$twitter = $content_index_entry_twitter;
			$comment = $content_index_entry_comment;

			$info_icons = 7;

			if(empty($entry[$i]['city'])) {
				$city = "";
			}
			if(empty($entry[$i]['hp'])) {
				$hp = "";
				$info_icons--;
			} else {
				$entry_hp_text = $lang['hp_of'];
			}
			if(empty($entry[$i]['icq'])) {
				$icq = "";
				$info_icons--;
			}
			if(empty($entry[$i]['aim'])) {
				$aim = "";
				$info_icons--;
			}
			if(empty($entry[$i]['msn'])) {
				$msn = "";
				$info_icons--;
			}
			if(empty($entry[$i]['fb'])) {
				$fb = "";
				$info_icons--;
			}
			if(empty($entry[$i]['twitter'])) {
				$twitter = "";
				$info_icons--;
			}
			if(empty($entry[$i]['comment'])) {
				$comment = "";
			}

			// check if email is set
			if(!empty($entry[$i]['email'])) {
				// find out if the user wants his email to be shown
				if($entry[$i]['user_show_email'] != 0) {
					$entry_email_path = "email.php?id=".$entry[$i]['ID']."{PARAMLANG_B}";
					$entry_email_pic = "images/iconsets/".$settings['iconset_path']."/email.png";
					$entry_email_text = $lang['email_yes'];
				}
				else {
					$info_icons--;
					$email = "";
				}
			}
			else {
				$info_icons--;
				$email = "";
			}

			if(!$settings['badwords'] == NULL) {
				// replace badwords
				$badwords = explode(',', $settings['badwords']);
				foreach($badwords as $key => $val)
				$badwords[$key] = trim($val);

				$entry[$i]['name'] = badwords($entry[$i]['name']);
				$entry[$i]['city'] = badwords($entry[$i]['city']);
				$entry[$i]['message'] = badwords($entry[$i]['message']);
			}

			$timestamp = date($settings['dateform'], $entry[$i]['timestamp']);

			if(!empty($settings['gravatar_show']) AND ($settings['gravatar_show'] == 1) AND (!empty($entry[$i]['email']))) {
				// load gravatar
				if($settings['gravatar_rating'] == 0) { $gravatar_rating = "G"; }
				if($settings['gravatar_rating'] == 1) { $gravatar_rating = "PG"; }
				if($settings['gravatar_rating'] == 2) { $gravatar_rating = "R"; }
				if($settings['gravatar_rating'] == 3) { $gravatar_rating = "X"; }
				if($settings['gravatar_type'] == 0) { $gravatar_type = "&amp;f=y"; }
				if($settings['gravatar_type'] == 1) { $gravatar_type = "&amp;d=mm"; }
				if($settings['gravatar_type'] == 2) { $gravatar_type = "&amp;d=identicon"; }
				if($settings['gravatar_type'] == 3) { $gravatar_type = "&amp;d=monsterid"; }
				if($settings['gravatar_type'] == 4) { $gravatar_type = "&amp;d=wavatar"; }
				if($settings['gravatar_type'] == 5) { $gravatar_type = "&amp;d=retro"; }
				if($settings['gravatar_type'] == 6) { $gravatar_type = "&amp;d=blank"; }

				if($_SERVER['HTTPS'] == "on") {
					$gravatar_url = "https";
				} else {
					$gravatar_url = "http";
				}
				
				$gravatar_url.= "://www.gravatar.com/avatar/".md5(strtolower(trim($entry[$i]['email'])))."?s=".$settings['gravatar_size']."&amp;r=".$gravatar_rating.$gravatar_type;
				$img_gravatar = "<img src=\"".$gravatar_url."\" class=\"gravatar\" style=\"width: ".$settings['gravatar_size']."px; height: ".$settings['gravatar_size']."px;\" alt=\"".$lang['gravatar']."\" title=\"".$lang['gravatar']."\">";
			} else {
				$gravatar_size = 0;
				$img_gravatar = "";
			}

			// fill template with other templates if set
			if($info_icons > 0) {
				$page_entry[$i] = mgb_template_replace([
					'TEMPLATE_ENTRY_INFO' 		=> $info,
					'TEMPLATE_ENTRY_EMAIL' 		=> $email,
					'TEMPLATE_ENTRY_HP' 		=> $hp,
					'TEMPLATE_ENTRY_ICQ' 		=> $icq,
					'TEMPLATE_ENTRY_AIM' 		=> $aim,
					'TEMPLATE_ENTRY_MSN' 		=> $msn,
					'TEMPLATE_ENTRY_FB' 		=> $fb,
					'TEMPLATE_ENTRY_TWITTER' 	=> $twitter
				], $page_entry[$i]);
			} elseif($info_icons == 0) {
				$page_entry[$i] = mgb_template_replace([
					'TEMPLATE_ENTRY_INFO' => ""
				], $page_entry[$i]);
			}

			$page_entry[$i] = mgb_template_replace([
				'TEMPLATE_ENTRY_CITY' 		=> $city,
				'TEMPLATE_ENTRY_MESSAGE' 	=> $message
			], $page_entry[$i]);

			if($settings['gravatar_position'] == 0) {
				$page_entry[$i] = mgb_template_replace([
					'ENTRY_GRAVATAR_LEFT' 	=> $gravatar,
					'ENTRY_GRAVATAR_RIGHT' 	=> "",
					'GRAVATAR_CSS'			=> "entry_message_gravatar_left"
				], $page_entry[$i]);
			} else {
				$page_entry[$i] = mgb_template_replace([
					'ENTRY_GRAVATAR_LEFT'	=> "",
					'ENTRY_GRAVATAR_RIGHT'	=> $gravatar,
					'GRAVATAR_CSS'			=> "entry_message_gravatar_right"
				], $page_entry[$i]);
			}

			$page_entry[$i] = template("TEMPLATE_ENTRY_COMMENT", $comment, $page_entry[$i]);

			// fill template with entry (language)
			if(empty($entry_email_text)) { $entry_email_text = ""; }
			if(empty($entry_hp_text)) { $entry_hp_text = ""; }
			$page_entry[$i] = mgb_template_replace([
				'LANG_EMAIL_OF'	=> $entry_email_text,
				'LANG_HP_OF' 	=> $entry_hp_text
			], $page_entry[$i]);

			// fill template with entry (strings)
			$page_entry[$i] = mgb_template_replace([
				'ENTRY_ID'			=> $entry_counter,
				'ENTRY_ANCHOR' 		=> "<a href=\"index.php{PARAMLANG_A}&amp;p=".$pagenr."#e".$entry_counter."\" title=\"".$lang['anchor']."\">&raquo;</a>'",
				'ENTRY_CITY' 		=> mgb_format($entry[$i]['city']), 
				'ENTRY_EMAIL_PIC' 	=> $entry_email_pic, 
				'ENTRY_EMAIL_PATH' 	=> $entry_email_path, 
				'ENTRY_TIMESTAMP' 	=> $timestamp, 
				'GRAVATAR_SIZE' 	=> $settings['gravatar_size'], 
				'IMG_GRAVATAR' 		=> $img_gravatar, 
				'ENTRY_MESSAGE' 	=> mgb_format($entry[$i]['message']), 
				'ENTRY_HP' 			=> mgb_format($entry[$i]['hp']), 
				'ENTRY_ICQ_NUMBER' 	=> mgb_format($entry[$i]['icq']), 
				'ENTRY_AIM_NAME' 	=> mgb_format($entry[$i]['aim']), 
				'ENTRY_MSN' 		=> mgb_format($entry[$i]['msn']), 
				'ENTRY_FB' 			=> mgb_format($entry[$i]['fb']), 
				'ENTRY_TWITTER' 	=> mgb_format($entry[$i]['twitter']), 
				'ENTRY_COMMENT' 	=> mgb_format($entry[$i]['comment']), 
				'ENTRY_NAME' 		=> mgb_format($entry[$i]['name']), 
				'TEMPLATE_PATH' 	=> "templates/".$settings['template_path']
			], $page_entry[$i]);

			$page_entry_echo .= $page_entry[$i];
		}
	}

	if(empty($page_entry_echo)) { $page_entry_echo = ""; }

	// check if an announcement message is set
	if(empty($settings['announcement_message'])) {
		$content_index_announcement_message = "";
	}
	else {
		$settings['announcement_message'] = set_smilies($mysqli, $settings['announcement_message']);
		$settings['announcement_message'] = bbcode_format($mysqli, $settings['announcement_message'], "");
		$settings['announcement_message'] = mgb_format($settings['announcement_message']);
	}

	// fill index_body.tpl and load templates first
	$page_body_index = $content_index_body;
	$page_body_index = mgb_template_replace([
		'HEADER' 						=> $page_header,
		'SCRIPT_RECAPTCHAV2' 			=> "",
		'TEMPLATE_ANNOUNCEMENT_MESSAGE' => $content_index_announcement_message,
		'TEMPLATE_SCROLLING_FUNCTION' 	=> $content_scrolling_function,
		'TEMPLATE_ENTRIES' 				=> $page_entry_echo,
		'TEMPLATE_PATH' 				=> "templates/".$settings['template_path'],
		'TEMPLATE_STYLE_PATH' 			=> $settings['template_style_path'],
		'TEMPLATE_COPYRIGHT' 			=> $content_copyright,
		'TEMPLATE_FOOTER' 				=> $content_footer
	], $page_body_index);

	// then strings. starting by initialising some of them
	if(!isset($sf_first)) { $sf_first = ''; }
	if(!isset($sf_backwards)) { $sf_backwards = ''; }
	if(!isset($sf_last)) { $sf_last = ''; }
	if(!isset($_GET['lang'])) { $_GET['lang'] = 'de'; }
	
	$page_body_index = mgb_template_replace([
		'TITLE' 				=> $settings['title'],
		'ICONSET_PATH' 			=> $settings['iconset_path'],
		'LANG_HOW_MANY_ENTRIES' => $how_many_entries,
		'ANNOUNCEMENT_MESSAGE' 	=> $settings['announcement_message'],
		'PAGES' 				=> $p,
		'SF_FIRST' 				=> $sf_first,
		'SF_BACKWARDS' 			=> $sf_backwards,
		'SF_PAGENUMBER' 		=> $sf_pagenumber,
		'SF_FORWARDS' 			=> $sf_forwards,
		'SF_LAST' 				=> $sf_last,
		'MGB_VERSION' 			=> $settings['version'],
		'COPYRIGHT_DATE' 		=> date("Y"),
		'PARAMLANG_A' 			=> "?lang=".cleanstr($_GET['lang']),
		'PARAMLANG_B' 			=> "&amp;lang=".cleanstr($_GET['lang'])
	], $page_body_index);

	// fill in the rest of the language strings
	$page_body_index = mgb_template_language($page_body_index, MGB_ROOT."language/".$settings['language_path']."/lang_main.php", $settings['debug_mode']); // last number defines debug mode

	// start caching if activated
	if($settings['caching'] == 1 AND !file_exists(MGB_ROOT.'install')) {
		ob_start();
	}

	// display the page
	echo $page_body_index;

	if($settings['caching'] == 1 AND !file_exists(MGB_ROOT.'install')) {
		if(!empty($_GET['p'])) {
			$filename = MGB_ROOT."cache/index_".$language_short."_".$_GET['p'].".html";
		} else {
			$filename = MGB_ROOT."cache/index_".$language_short."_1.html";
		}

		// write the cache file
		if(is_writable(MGB_ROOT.'cache')) {
			file_put_contents($filename, ob_get_flush());
		}
	}
?>
