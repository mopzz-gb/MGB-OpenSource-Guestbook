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

	===============
	smilies.inc.php
	===============
	*/

	// make sure nobody has direct acces to this script
	if(!defined('ADMINISTRATION')) {
		include ("error.html");
		die();
	} else {
		if(check_rights($mysqli, $_GET['action'], $_SESSION['user_ID'])) {
			// load config, settings and language files
			require ("../includes/config.inc.php");
			require ("../includes/load_settings.inc.php");
			require ("../language/".$settings['language_path']."/lang_admin.php");

			// load templates
			$content_smilies = mgb_load_template("admin", "default", "smilies", $settings['debug_mode']);
			$content_smilies_single = mgb_load_template("admin", "default", "smilies_single", $settings['debug_mode']);
			$content_smilies_single_new = mgb_load_template("admin", "default", "smilies_single_new", $settings['debug_mode']);

			if(isset($_POST['sent_smilies']) AND $_POST['sent_smilies'] == 1) {
				for($i = 0; $i < $_SESSION['SMILEY_COUNT']; $i++) {
					if($_POST['path_'.$i.''] != "" AND $_POST['replacement_'.$i.''] != "") {
						$sql = "UPDATE `".$db['prefix']."smilies` SET
								`path` = ?,
								`replacement` = ?,
								`height` = ?,
								`width` = ?
								WHERE ID = ? LIMIT 1";
						$params = [
							$_POST['path_'.$i.''],
							$_POST['replacement_'.$i.''],
							$_POST['height_'.$i.''],
							$_POST['width_'.$i.''],
							$_POST['real_id_'.$i.'']
						];
						$types = "ssiii";
					} elseif(
						isset($_POST['path_'.$i.'']) AND
						isset($_POST['replacement_'.$i.'']) AND
						isset($_POST['width_'.$i.'']) AND
						isset($_POST['height_'.$i.'']) AND
						($_POST['path_'.$i.''] == "") AND
						($_POST['replacement_'.$i.''] == "") AND
						($_POST['width_'.$i.''] == "") AND
						($_POST['height_'.$i.''] == "")) {
						$sql = "DELETE FROM `".$db['prefix']."smilies` WHERE `ID` = ?";
						$params = [$_POST['real_id_'.$i.'']];
						$types = "i";
					}

					if(!empty($sql)) {
						if(mgb_sql_connect($mysqli, $sql, "Error while updating smilies.", 0, $params, $types)) {
							$saved_settings_successfull = 1;
							mgb_trigger_sys_log($mysqli, 1017, '', '', '', $_SESSION['user_name'], '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
							mgb_erase_cache("../cache/");
						}
					}
				}
			}

			// user wants to delete more than one smilies at once
			if(isset($_POST['dropbox']) AND (!empty($_POST['dropbox']))) {
				if($_POST['dropbox'] == 1) { // delete checked smilies, keep unchecked
					for($i = 0; $i < $_SESSION['SMILEY_COUNT']; $i++) {
						if(isset($_POST['edit_smiley_'.$i.'']) AND (!empty($_POST['edit_smiley_'.$i.'']))) {
							$sql = "DELETE FROM `".$db['prefix']."smilies` WHERE `ID` = ?";
							$params = [$_POST['real_id_'.$i.'']];
							$types = "i";
							if(mgb_sql_connect($mysqli, $sql, "Error while deleting more than one smiley at once.", 0, $params, $types)) {
								$saved_settings_successfull = 1;
								mgb_trigger_sys_log($mysqli, 1017, '', '', '', $_SESSION['user_name'], '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
								mgb_erase_cache("../cache/");
							}
						}
					}
				} elseif($_POST['dropbox'] == 2) { // delete unchecked smilies, keep checked
					for($i = 0; $i < $_SESSION['SMILEY_COUNT']; $i++) {
						if(empty($_POST['edit_smiley_'.$i.''])) {
							$sql = "DELETE FROM `".$db['prefix']."smilies` WHERE `ID` = ?";
							$params = [$_POST['real_id_'.$i.'']];
							$types = "i";
							if(mgb_sql_connect($mysqli, $sql, "Error while deleting more than one smiley at once.", 0, $params, $types)) {
								$saved_settings_successfull = 1;
								mgb_trigger_sys_log($mysqli, 1017, '', '', '', $_SESSION['user_name'], '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
								mgb_erase_cache("../cache/");
							}
						}
					}
				}
			}

			// user wants to add a new smiley
			if(!empty($_POST['new_path']) AND !empty($_POST['new_replacement'])) {
				require_once ("../includes/functions.inc.php");
				$sql = "INSERT INTO ".$db['prefix']."smilies (
					path,
					replacement,
					height,
					width
				) VALUES (
					?, ?, ?, ?
				)";
				$params = [
					$_POST['new_path'],
					$_POST['new_replacement'],
					$_POST['new_height'],
					$_POST['new_width']
				];
				$types = "ssii";

				if (mgb_sql_connect($mysqli, $sql, "Error while adding a new smiley.", 0, $params, $types)) {
					$saved_settings_successfull = 1;
					mgb_trigger_sys_log($mysqli, 1017, '', '', '', $_SESSION['user_name'], '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
					mgb_erase_cache("../cache/");
				}
			}

			// load smilies
			$result = mgb_sql_connect($mysqli, "SELECT * FROM ".$db['prefix']."smilies ORDER BY ID ".$settings['smileys_order'], "Error while loading smilies.", 1);
			$smiley = mysqli_fetch_all($result, MYSQLI_ASSOC);
			
			if(!isset($smiley)) {
				$smiley = NULL;
			}

			$_SESSION['SMILEY_COUNT'] = count($smiley); // count smilies
			
			// initiate variables
			$page_smilies_single = "";
			
			for($i = 0; $i < count($smiley); $i++) {
				$page_smilies[$i] = $content_smilies_single;

				// fill template with smilies
				$page_smilies[$i] = mgb_template_replace([
					'SMILEY_PATH' 			=> $smiley[$i]['path'],
					'SMILEY_REPLACEMENT' 	=> $smiley[$i]['replacement'],
					'SMILEY_HEIGHT' 		=> $smiley[$i]['height'],
					'SMILEY_WIDTH' 			=> $smiley[$i]['width'],
					'SMILEY_ID' 			=> $i,
					'SMILEY_REAL_ID' 		=> $smiley[$i]['ID']
				], $page_smilies[$i]);

				if(!isset($page_include)) { $page_include = NULL; }
				$page_smilies_single .= $page_smilies[$i];
			}

			// add an empty field for adding a new smiley
			$page_smilies_single .= $content_smilies_single_new;

			$page_smiley = $content_smilies;
			$page_smiley = mgb_template_replace([
				'TEMPLATE_SMILIES_SINGLE' 		=> $page_smilies_single,
				'SMILEY_COUNT' 					=> $_SESSION['SMILEY_COUNT'],
				'URL_SMILIES' 					=> "admin.php?action=smilies".$sid,
				'OPTION_DELETE_CHECKED_SMILIES' => "<option value='1'>{LANG_DELETE_CHECKED_SMILIES}</option>",
				'OPTION_KEEP_CHECKED_SMILIES' 	=> "<option value='2'>{LANG_KEEP_CHECKED_SMILIES}</option>"
		], $page_smiley);

			// $page_smiley = mgb_template_language($page_smiley, "../language/".$settings['language_path']."/lang_admin.php", $settings['debug_mode']); // last number defines debug mode

			$page_include = $page_smiley;
			$content_scrolling_function = "";
		} else {
			$page_include = "<span class=\"admin\">".$lang['errormessage'][4]."</span>";
			$content_scrolling_function = "<br>";
		}
	}
?>
