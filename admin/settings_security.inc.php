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

	=========================
	settings_security.inc.php
	=========================

	DATE OF CREATION: 24.02.2013; 15:09
	*/

	// make sure nobody has direct acces to this script
	if(!defined('ADMINISTRATION')) {
		include ("error.html");
		die();
	} else {
		require(MGB_ROOT."includes/functions.inc.php");
		// load template
		$content_settings_security = mgb_load_template("admin", "default", "settings_security", $settings['debug_mode']);

		if(!isset($_GET['action'])) { $_GET['action'] = "settings_security"; }
		if(check_rights($mysqli, $_GET['action'], $_SESSION['user_ID'])) {
			if(isset($_POST['sent_settings']) AND $_POST['sent_settings'] == 1) {
				$empty_needed_value = 0;

				/*
				needed values in this script:
				=============================

				session_timeout
				password_min_length *
				blocktime
				captcha_length
				captcha_coords_x
				captcha_coords_y
				captcha_color
				captcha_angle_1 *
				captcha_angle_2 *
				wrong_captcha_count
				akismet_api
				time_lock_value
				time_lock_maxtime
				time_lock_spamcount *
				*/

				if($_POST['session_timeout'] < 60) {
					$empty_needed_value = 19;
				}

				if($_POST['password_min_length'] < 6) {
					$_POST['password_min_length'] = $settings['password_min_length'];
					$empty_needed_value = 15;
				}

				if(!empty($_POST['captcha_length'])) {
					if($_POST['captcha_length'] < 3) {
						$empty_needed_value = 16;
					} elseif($_POST['captcha_length'] >= 3) {
						if(!empty($_POST['captcha_max_length'])) {
							if($_POST['captcha_max_length'] <= $_POST['captcha_length']) {
								$empty_needed_value = 16;
							} elseif($_POST['captcha_max_length'] > 9) {
								$empty_needed_value = 16;
							}
						}
					}
				} else {
					$empty_needed_value = 16;
				}

				/*
				if($_POST['time_lock_spam_count'] < 5 OR $_POST['time_lock_spam_count'] > 99)
					{
					$_POST['time_lock_spam_count'] = $settings['time_lock_spam_count'];
					$empty_needed_value = 17;
					}
				*/

				// check if the captcha angles are correct
				if((!empty($_POST['captcha_angle_1'])) AND (!empty($_POST['captcha_angle_1']))) {
					if ($_POST['captcha_angle_1'] >= $_POST['captcha_angle_2']) {
						$_POST['captcha_angle_1'] = $settings['captcha_angle_1'];
						$_POST['captcha_angle_2'] = $settings['captcha_angle_2'];
					}
				} else {
					$empty_needed_value = 18;
				}

				if($_POST['akismet_plugin'] == 1) {
					if(empty($_POST['akismet_api'])) {
						$empty_needed_value = 23;
					}
				}

				if($_POST['captcha_method'] == 2) {
					if(!file_exists(MGB_ROOT."plugins/recaptcha/recaptchalib.php") OR empty($_POST['recaptcha_pub_key']) OR empty($_POST['recaptcha_private_key'])) {
						$empty_needed_value = 35;
					}
				}

				if($_POST['captcha_method'] == 3) {
					if(!file_exists(MGB_ROOT."plugins/ayah/ayah.php") OR empty($_POST['ayah_pub_key']) OR empty($_POST['ayah_score_key'])) {
						$empty_needed_value = 44;
					}
				}

				if(!empty($_POST['captcha_salt'])) {
					if(!preg_match('/^[a-z0-9_\.]+$/i', $_POST['captcha_salt'])) {
						$empty_needed_value = 41;
					}
				}

				if(empty($_POST['captcha_color'])) {
					$empty_needed_value = 22;
				} else {
					if(!preg_match('/^[0-9A-F^#]{6}$/i', $_POST['captcha_color'])) {
						$empty_needed_value = 22;
					}
				}

				if(empty($_POST['dynamic_fieldnames_length'])) {
					$empty_needed_value = 42;
				} else {
					if($_POST['dynamic_fieldnames_length'] < 3) {
						$empty_needed_value = 42;
					} elseif($_POST['dynamic_fieldnames_length'] > 255) {
						$empty_needed_value = 42;
					}
				}

				if(!empty($_POST['captcha_add_noise'])) {
					if($_POST['captcha_noise_count'] < 1) {
						$empty_needed_value = 45;
					}
				}

				if(empty($_POST['sfs_username_required'])) {
					$_POST['sfs_username_required'] = 0;
				}

				if(empty($_POST['sfs_email_required'])) {
					$_POST['sfs_email_required'] = 0;
				}

				if(empty($_POST['sfs_ip_required'])) {
					$_POST['sfs_ip_required'] = 0;
				}

				if(empty($_POST['captcha_coords_x'])) { $empty_needed_value = 20; }
				if(empty($_POST['captcha_coords_y'])) { $empty_needed_value = 21; }
				if(empty($_POST['time_lock_value'])) { $empty_needed_value = 24; }
				if(empty($_POST['time_lock_maxtime'])) { $empty_needed_value = 25; }
				// if(empty($_POST['time_lock_spam_count'])) { $empty_needed_value = 26; }
				// if(empty($_POST['wrong_captcha_count'])) { $empty_needed_value = 34; }
				if($empty_needed_value == 0) { // no error, continue with saving settings
					// everything's okay now, let's save the data
					$sql = "UPDATE `".$db['prefix']."settings` SET
						`debug_mode` = '".$_POST['debug_mode']."',
						`session_timeout` = '".$_POST['session_timeout']."',
						`password_min_length` = '".$_POST['password_min_length']."',
						`moderated` = '".$_POST['moderated']."',
						`require_email` = '".$_POST['require_email']."',
						`banlist_ips` = '".$_POST['banlist_ips']."',
						`banlist_emails` = '".$_POST['banlist_emails']."',
						`banlist_domains` = '".$_POST['banlist_domains']."',
						`banlist_log` = '".$_POST['banlist_log']."',
						`banlist_cleanup` = '".$_POST['banlist_cleanup']."',
						`autoblock` = '".$_POST['autoblock']."',
						`autoblock_value` = '".$_POST['autoblock_value']."',
						`autoblock_config` = '".$_POST['autoblock_config']."',
						`blocktime` = '".$_POST['blocktime']."',
						`captcha` = '".$_POST['captcha']."',
						`captcha_method` = '".$_POST['captcha_method']."',
						`captcha_length` = '".$_POST['captcha_length']."',
						`captcha_max_length` = '".$_POST['captcha_max_length']."',
						`captcha_salt` = '".$_POST['captcha_salt']."',
						`captcha_hash_method` = '".$_POST['captcha_hash_method']."',
						`captcha_double_hash` = '".$_POST['captcha_double_hash']."',
						`captcha_coords_x` = '".$_POST['captcha_coords_x']."',
						`captcha_coords_y` = '".$_POST['captcha_coords_y']."',
						`captcha_color` = '".$_POST['captcha_color']."',
						`captcha_angle_1` = '".$_POST['captcha_angle_1']."',
						`captcha_angle_2` = '".$_POST['captcha_angle_2']."',
						`captcha_add_noise` = '".$_POST['captcha_add_noise']."',
						`captcha_noise_color` = '".$_POST['captcha_noise_color']."',
						`captcha_noise_count` = '".$_POST['captcha_noise_count']."',
						`recaptcha_pub_key` = '".$_POST['recaptcha_pub_key']."',
						`recaptcha_private_key` = '".$_POST['recaptcha_private_key']."',
						`recaptcha_style` = '".$_POST['recaptcha_style']."',
						`akismet_plugin` = '".$_POST['akismet_plugin']."',
						`akismet_api` = '".$_POST['akismet_api']."',
						`akismet_mark_as_spam` = '".$_POST['akismet_mark_as_spam']."',
						`time_lock` = '".$_POST['time_lock']."',
						`time_lock_value` = '".$_POST['time_lock_value']."',
						`time_lock_maxtime` = '".$_POST['time_lock_maxtime']."',
						`keystroke` = '".$_POST['keystroke']."',
						`keystroke_max_cps` = '".$_POST['keystroke_max_cps']."',
						`keystroke_ban_time` = '".$_POST['keystroke_ban_time']."',
						`dynamic_fieldnames` = '".$_POST['dynamic_fieldnames']."',
						`dynamic_fieldnames_method` = '".$_POST['dynamic_fieldnames_method']."',
						`dynamic_fieldnames_length` = '".$_POST['dynamic_fieldnames_length']."',
						`direct_access` = '".$_POST['direct_access']."',
						`direct_access_text` = '".$_POST['direct_access_text']."',
						`search_engines_excluded` = '".$_POST['search_engines_excluded']."',
						`search_engines` = '".$_POST['search_engines']."',
						`check_against_anti_spam_sites` = '".$_POST['check_against_anti_spam_sites']."',
						`sfs_username_frequency` = '".$_POST['sfs_username_frequency']."',
						`sfs_email_frequency` = '".$_POST['sfs_email_frequency']."',
						`sfs_ip_frequency` = '".$_POST['sfs_ip_frequency']."',
						`sfs_username_required` = '".$_POST['sfs_username_required']."',
						`sfs_email_required` = '".$_POST['sfs_email_required']."',
						`sfs_ip_required` = '".$_POST['sfs_ip_required']."',
						`sfs_mark_as_spam` = '".$_POST['sfs_mark_as_spam']."',
						`sfs_api_key` = '".$_POST['sfs_api_key']."',
						`ayah_pub_key` = '".$_POST['ayah_pub_key']."',
						`ayah_score_key` = '".$_POST['ayah_score_key']."'";

					if(mgb_sql_connect($mysqli, $sql, "Error while saving security settings.", 0)) {
						$saved_settings_successfull = 1;
						mgb_trigger_sys_log($mysqli, 1006, '', '', '', $_SESSION['user_name'], '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
						mgb_erase_cache(MGB_ROOT."cache/");
					}

					require(MGB_ROOT."includes/load_settings.inc.php");
				}
			}

			// load active language
			include(MGB_ROOT."language/".$settings['language_path']."/settings.php");

			// load template
			$page_include = $content_settings_security;

			// now start replacement for template

			// replacement that has nothing to do with front end
			$page_include = mgb_template_replace(['URL_SETTINGS' => "admin.php?action=settings_security".$sid], $page_include);

			// initiate variables
			$selected_debug_mode_0 = "";
			$selected_debug_mode_1 = "";
			$selected_debug_mode_2 = "";
			$selected_moderated_0 = "";
			$selected_moderated_1 = "";
			$selected_require_email_0 = "";
			$selected_require_email_1 = "";
			$selected_banlist_ips_0 = "";
			$selected_banlist_ips_1 = "";
			$selected_banlist_emails_0 = "";
			$selected_banlist_emails_1 = "";
			$selected_banlist_domains_0 = "";
			$selected_banlist_domains_1 = "";
			$selected_banlist_log_0 = "";
			$selected_banlist_log_1 = "";
			$selected_banlist_cleanup_0 = "";
			$selected_banlist_cleanup_1 = "";
			$selected_autoblock_0 = "";
			$selected_autoblock_1 = "";
			$selected_autoblock_config_0 = "";
			$selected_autoblock_config_1 = "";
			$selected_autoblock_config_2 = "";
			$selected_autoblock_config_3 = "";
			$selected_blocktime_0 = "";
			$selected_blocktime_1 = "";
			$selected_blocktime_2 = "";
			$selected_blocktime_3 = "";
			$selected_blocktime_4 = "";
			$selected_blocktime_5 = "";
			$selected_blocktime_6 = "";
			$selected_captcha_0 = "";
			$selected_captcha_1 = "";
			$selected_captcha_method_0 = "";
			$selected_captcha_method_1 = "";
			$selected_captcha_method_2 = "";
			$selected_captcha_method_3 = "";
			$selected_captcha_hash_method_0 = "";
			$selected_captcha_hash_method_1 = "";
			$selected_captcha_hash_method_2 = "";
			$selected_captcha_hash_method_3 = "";
			$selected_captcha_hash_method_4 = "";
			$selected_captcha_hash_method_5 = "";
			$selected_captcha_hash_method_6 = "";
			$selected_captcha_hash_method_7 = "";
			$selected_captcha_add_noise_0 = "";
			$selected_captcha_add_noise_1 = "";
			$selected_recaptcha_style_0 = "";
			$selected_recaptcha_style_1 = "";
			$selected_recaptcha_style_2 = "";
			$selected_recaptcha_style_3 = "";
			$selected_captcha_double_hash_0 = "";
			$selected_captcha_double_hash_1 = "";
			$selected_akismet_plugin_0 = "";
			$selected_akismet_plugin_1 = "";
			$selected_akismet_mark_as_spam_0 = "";
			$selected_akismet_mark_as_spam_0 = "";
			$selected_time_lock_0 = "";
			$selected_time_lock_1 = "";
			$selected_ipblocker_0 = "";
			$selected_ipblocker_1 = "";
			$selected_keystroke_0 = "";
			$selected_keystroke_1 = "";
			$selected_dynamic_fieldnames_0 = "";
			$selected_dynamic_fieldnames_1 = "";
			$selected_dynamic_fieldnames_method_0 = "";
			$selected_dynamic_fieldnames_method_1 = "";
			$selected_direct_access_0 = "";
			$selected_direct_access_1 = "";
			$selected_search_engines_excluded_0 = "";
			$selected_search_engines_excluded_1 = "";
			$selected_check_against_anti_spam_sites_0 = "";
			$selected_check_against_anti_spam_sites_1 = "";
			$selected_sfs_username_required = "";
			$selected_sfs_email_required = "";
			$selected_sfs_ip_required = "";
			$selected_sfs_mark_as_spam_0 = "";
			$selected_sfs_mark_as_spam_1 = "";
			
			if($settings['debug_mode'] == 0) {
				$selected_debug_mode_0 = " selected";
			} elseif ($settings['debug_mode'] == 1) {
				$selected_debug_mode_1 = " selected";
			} else {
				$selected_debug_mode_2 = " selected";
			}
			
			if($settings['moderated'] == 0) {
				$selected_moderated_0 = " selected";
			} else {
				$selected_moderated_1 = " selected";
			}
			
			if($settings['require_email'] == 0) {
				$selected_require_email_0 = " selected";
			} else {
				$selected_require_email_1 = " selected";
			}
			
			if($settings['banlist_ips'] == 0) {
				$selected_banlist_ips_0 = " selected";
			} else {
				$selected_banlist_ips_1 = " selected";
			}
			
			if($settings['banlist_emails'] == 0) {
				$selected_banlist_emails_0 = " selected";
			} else {
				$selected_banlist_emails_1 = " selected";
			}

			if($settings['banlist_domains'] == 0) {
				$selected_banlist_domains_0 = " selected";
			} else {
				$selected_banlist_domains_1 = " selected";
			}
			
			if($settings['banlist_log'] == 0) {
				$selected_banlist_log_0 = " selected";
			} else {
				$selected_banlist_log_1 = " selected";
			}

			if($settings['banlist_cleanup'] == 0) {
				$selected_banlist_cleanup_0 = " selected";
			} else {
				$selected_banlist_cleanup_1 = " selected";
			}
			
			if($settings['autoblock'] == 0) {
				$selected_autoblock_0 = " selected";
			} else {
				$selected_autoblock_1 = " selected";
			}
			
			if($settings['autoblock_config'] == 60) {
				$selected_autoblock_config_0 = " selected";
				}
			
			if($settings['autoblock_config'] == 3600) {
				$selected_autoblock_config_1 = " selected";
			}
			
			if($settings['autoblock_config'] == 86400) {
				$selected_autoblock_config_2 = " selected";
			}
			
			if($settings['autoblock_config'] == 2592000) {
				$selected_autoblock_config_3 = " selected";
			}
			
			if($settings['blocktime'] == 99999999) {
				$selected_blocktime_0 = " selected";
			}

			if($settings['blocktime'] == 31557600) {
				$selected_blocktime_1 = " selected";
			}

			if($settings['blocktime'] == 2592000) {
				$selected_blocktime_2 = " selected";
			}
			
			if($settings['blocktime'] == 86400) {
				$selected_blocktime_3 = " selected";
			}
			
			if($settings['blocktime'] == 3600) {
				$selected_blocktime_4 = " selected";
			}

			if($settings['blocktime'] == 60) {
				$selected_blocktime_5 = " selected";
			}
			
			if($settings['blocktime'] == 0) {
				$selected_blocktime_6 = " selected";
			}
			
			if($settings['captcha'] == 0) {
				$selected_captcha_0 = " selected";
			} else {
				$selected_captcha_1 = " selected";
			}
			
			if($settings['captcha_method'] == 0) {
				$selected_captcha_method_0 = " selected";
			} elseif($settings['captcha_method'] == 1) {
				$selected_captcha_method_1 = " selected";
			} elseif($settings['captcha_method'] == 2) {
				$selected_captcha_method_2 = " selected";
			} else {
				$selected_captcha_method_3 = " selected";
			}
			
			if($settings['captcha_hash_method'] == "md2") {
				$selected_captcha_hash_method_0 = " selected";
			} elseif($settings['captcha_hash_method'] == "md4") {
				$selected_captcha_hash_method_1 = " selected";
			} elseif($settings['captcha_hash_method'] == "md5") {
				$selected_captcha_hash_method_2 = " selected";
			} elseif($settings['captcha_hash_method'] == "sha1") {
				$selected_captcha_hash_method_3 = " selected";
			} elseif($settings['captcha_hash_method'] == "sha256") {
				$selected_captcha_hash_method_4 = " selected";
			} elseif($settings['captcha_hash_method'] == "sha384") {
				$selected_captcha_hash_method_5 = " selected";
			} elseif($settings['captcha_hash_method'] == "sha512") {
				$selected_captcha_hash_method_6 = " selected";
			} elseif($settings['captcha_hash_method'] == "whirlpool") {
				$selected_captcha_hash_method_7 = " selected";
			}
			
			if($settings['captcha_add_noise'] == 0) {
				$selected_captcha_add_noise_0 = " selected";
			} else {
				$selected_captcha_add_noise_1 = " selected";
			}
			
			if($settings['recaptcha_style'] == 'red') {
				$selected_recaptcha_style_0 = " selected";
			} elseif($settings['recaptcha_style'] == 'white') {
				$selected_recaptcha_style_1 = " selected";
			} elseif($settings['recaptcha_style'] == 'blackglass') {
				$selected_recaptcha_style_2 = " selected";
			} elseif($settings['recaptcha_style'] == 'clean') {
				$selected_recaptcha_style_3 = " selected";
			}
			
			if($settings['captcha_double_hash'] == 0) {
				$selected_captcha_double_hash_0 = " selected";
			} else {
				$selected_captcha_double_hash_1 = " selected";
			}
			
			if($settings['akismet_plugin'] == 0) {
				$selected_akismet_plugin_0 = " selected";
			} else {
				$selected_akismet_plugin_1 = " selected";
			}
			
			if($settings['akismet_mark_as_spam'] == 0) {
				$selected_akismet_mark_as_spam_0 = " selected";
			} else {
				$selected_akismet_mark_as_spam_1 = " selected";
			}
			
			if($settings['time_lock'] == 0) {
				$selected_time_lock_0 = " selected";
			} else {
				$selected_time_lock_1 = " selected";
			}
			
			// if($settings['spam_protection'] == 0) { $selected_spam_protection_0 = " selected"; } else { $selected_spam_protection_1 = " selected"; }
			
			if($settings['ipblocker'] == 0) {
				$selected_ipblocker_0 = " selected";
			} else {
				$selected_ipblocker_1 = " selected";
			}
			
			if($settings['keystroke'] == 0) {
				$selected_keystroke_0 = " selected";
			} else {
				$selected_keystroke_1 = " selected";
			}
			
			if($settings['dynamic_fieldnames'] == 0) {
				$selected_dynamic_fieldnames_0 = " selected";
			} else {
				$selected_dynamic_fieldnames_1 = " selected";
			}
			
			if($settings['dynamic_fieldnames_method'] == 0) {
				$selected_dynamic_fieldnames_method_0 = " selected";
			} else {
				$selected_dynamic_fieldnames_method_1 = " selected";
			}
			
			if($settings['direct_access'] == 0) {
				$selected_direct_access_0 = " selected";
			} else {
				$selected_direct_access_1 = " selected";
			}
			
			if($settings['search_engines_excluded'] == 0) {
				$selected_search_engines_excluded_0 = " selected";
			} else {
				$selected_search_engines_excluded_1 = " selected";
			}
			
			if($settings['check_against_anti_spam_sites'] == 0) {
				$selected_check_against_anti_spam_sites_0 = " selected";
			} else {
				$selected_check_against_anti_spam_sites_1 = " selected";
			}
			
			if($settings['sfs_username_required'] == 0) {
				$selected_sfs_username_required = "";
			} else {
				$selected_sfs_username_required = " checked";
			}
			
			if($settings['sfs_email_required'] == 0) {
				$selected_sfs_email_required = "";
			} else {
				$selected_sfs_email_required = " checked";
			}
			
			if($settings['sfs_ip_required'] == 0) {
				$selected_sfs_ip_required = "";
			} else {
				$selected_sfs_ip_required = " checked";
			}
			
			if($settings['sfs_mark_as_spam'] == 0) {
				$selected_sfs_mark_as_spam_0 = "";
			} else {
				$selected_sfs_mark_as_spam_1 = " selected";
			}

			$page_include = mgb_template_replace([
				'SELECTED_DEBUG_MODE_0' 					=> $selected_debug_mode_0,
				'SELECTED_DEBUG_MODE_1' 					=> $selected_debug_mode_1,
				'SELECTED_DEBUG_MODE_2' 					=> $selected_debug_mode_2,
				'SELECTED_MODERATED_0' 						=> $selected_moderated_0,
				'SELECTED_MODERATED_1' 						=> $selected_moderated_1,
				'SELECTED_REQUIRE_EMAIL_0' 					=> $selected_require_email_0,
				'SELECTED_REQUIRE_EMAIL_1' 					=> $selected_require_email_1,
				'SELECTED_BANLIST_IPS_0' 					=> $selected_banlist_ips_0,
				'SELECTED_BANLIST_IPS_1' 					=> $selected_banlist_ips_1,
				'SELECTED_BANLIST_EMAILS_0' 				=> $selected_banlist_emails_0,
				'SELECTED_BANLIST_EMAILS_1'					=> $selected_banlist_emails_1,
				'SELECTED_BANLIST_DOMAINS_0' 				=> $selected_banlist_domains_0,
				'SELECTED_BANLIST_DOMAINS_1' 				=> $selected_banlist_domains_1,
				'SELECTED_BANLIST_LOG_0' 					=> $selected_banlist_log_0,
				'SELECTED_BANLIST_LOG_1' 					=> $selected_banlist_log_1,
				'SELECTED_BANLIST_CLEANUP_0'				=> $selected_banlist_cleanup_0,
				'SELECTED_BANLIST_CLEANUP_1' 				=> $selected_banlist_cleanup_1,
				'SELECTED_AUTOBLOCK_0' 						=> $selected_autoblock_0,
				'SELECTED_AUTOBLOCK_1' 						=> $selected_autoblock_1,
				'EDIT_AUTOBLOCK_VALUE' 						=> $settings['autoblock_value'],
				'SELECTED_AUTOBLOCK_CONFIG_0' 				=> $selected_autoblock_config_0,
				'SELECTED_AUTOBLOCK_CONFIG_1'				=> $selected_autoblock_config_1,
				'SELECTED_AUTOBLOCK_CONFIG_2' 				=> $selected_autoblock_config_2,
				'SELECTED_AUTOBLOCK_CONFIG_3' 				=> $selected_autoblock_config_3,
				'SELECTED_BLOCKTIME_0' 						=> $selected_blocktime_0,
				'SELECTED_BLOCKTIME_1' 						=> $selected_blocktime_1,
				'SELECTED_BLOCKTIME_2' 						=> $selected_blocktime_2,
				'SELECTED_BLOCKTIME_3' 						=> $selected_blocktime_3,
				'SELECTED_BLOCKTIME_4'						=> $selected_blocktime_4,
				'SELECTED_BLOCKTIME_5' 						=> $selected_blocktime_5,
				'SELECTED_BLOCKTIME_6' 						=> $selected_blocktime_6,
				'SELECTED_CAPTCHA_0' 						=> $selected_captcha_0,
				'SELECTED_CAPTCHA_1' 						=> $selected_captcha_1,
				'SELECTED_CAPTCHA_METHOD_0' 				=> $selected_captcha_method_0,
				'SELECTED_CAPTCHA_METHOD_1' 				=> $selected_captcha_method_1,
				'SELECTED_CAPTCHA_METHOD_2' 				=> $selected_captcha_method_2,
				'SELECTED_CAPTCHA_METHOD_3' 				=> $selected_captcha_method_3,
				'EDIT_CAPTCHA_SALT' 						=> mgb_formatForm($settings['captcha_salt']),
				'SELECTED_CAPTCHA_HASH_METHOD_0' 			=> $selected_captcha_hash_method_0,
				'SELECTED_CAPTCHA_HASH_METHOD_1' 			=> $selected_captcha_hash_method_1,
				'SELECTED_CAPTCHA_HASH_METHOD_2' 			=> $selected_captcha_hash_method_2,
				'SELECTED_CAPTCHA_HASH_METHOD_3' 			=> $selected_captcha_hash_method_3,
				'SELECTED_CAPTCHA_HASH_METHOD_4' 			=> $selected_captcha_hash_method_4,
				'SELECTED_CAPTCHA_HASH_METHOD_5' 			=> $selected_captcha_hash_method_5,
				'SELECTED_CAPTCHA_HASH_METHOD_6' 			=> $selected_captcha_hash_method_6,
				'SELECTED_CAPTCHA_HASH_METHOD_7' 			=> $selected_captcha_hash_method_7,
				'SELECTED_CAPTCHA_ADD_NOISE_0' 				=> $selected_captcha_add_noise_0,
				'SELECTED_CAPTCHA_ADD_NOISE_1' 				=> $selected_captcha_add_noise_1,
				'SELECTED_RECAPTCHA_STYLE_0'				=> $selected_recaptcha_style_0,
				'SELECTED_RECAPTCHA_STYLE_1' 				=> $selected_recaptcha_style_1,
				'SELECTED_RECAPTCHA_STYLE_2' 				=> $selected_recaptcha_style_2,
				'SELECTED_RECAPTCHA_STYLE_3' 				=> $selected_recaptcha_style_3,
				'EDIT_CAPTCHA_LENGTH' 						=> mgb_formatForm($settings['captcha_length']),
				'EDIT_CAPTCHA_MAX_LENGTH' 					=> mgb_formatForm($settings['captcha_max_length']),
				'SELECTED_CAPTCHA_DOUBLE_HASH_0' 			=> $selected_captcha_double_hash_0,
				'SELECTED_CAPTCHA_DOUBLE_HASH_1' 			=> $selected_captcha_double_hash_1,
				'EDIT_CAPTCHA_COORDS_X' 					=> mgb_formatForm($settings['captcha_coords_x']),
				'EDIT_CAPTCHA_COORDS_Y' 					=> mgb_formatForm($settings['captcha_coords_y']),
				'EDIT_CAPTCHA_COLOR' 						=> mgb_formatForm($settings['captcha_color']),
				'EDIT_CAPTCHA_ANGLE_1' 						=> mgb_formatForm($settings['captcha_angle_1']),
				'EDIT_CAPTCHA_ANGLE_2' 						=> mgb_formatForm($settings['captcha_angle_2']),
				'EDIT_CAPTCHA_NOISE_COLOR' 					=> mgb_formatForm($settings['captcha_noise_color']),
				'EDIT_CAPTCHA_NOISE_COUNT' 					=> mgb_formatForm($settings['captcha_noise_count']),
				'EDIT_RECAPTCHA_PUB_KEY' 					=> mgb_formatForm($settings['recaptcha_pub_key']),
				'EDIT_RECAPTCHA_PRIVATE_KEY' 				=> mgb_formatForm($settings['recaptcha_private_key']),
				'SELECTED_TIME_LOCK_0' 						=> $selected_time_lock_0,
				'SELECTED_TIME_LOCK_1' 						=> $selected_time_lock_1,
				'EDIT_TIME_LOCK_VALUE' 						=> mgb_formatForm($settings['time_lock_value']),
				'EDIT_TIME_LOCK_MAXTIME' 					=> mgb_formatForm($settings['time_lock_maxtime']),
				'SELECTED_KEYSTROKE_0'						=> $selected_keystroke_0,
				'SELECTED_KEYSTROKE_1' 						=> $selected_keystroke_1,
				'SELECTED_DYNAMIC_FIELDNAMES_0' 			=> $selected_dynamic_fieldnames_0,
				'SELECTED_DYNAMIC_FIELDNAMES_1' 			=> $selected_dynamic_fieldnames_1,
				'SELECTED_DYNAMIC_FIELDNAMES_METHOD_0' 		=> $selected_dynamic_fieldnames_method_0,
				'SELECTED_DYNAMIC_FIELDNAMES_METHOD_1' 		=> $selected_dynamic_fieldnames_method_1,
				'SELECTED_DIRECT_ACCESS_0' 					=> $selected_direct_access_0,
				'SELECTED_DIRECT_ACCESS_1' 					=> $selected_direct_access_1,
				'SELECTED_SEARCH_ENGINES_EXCLUDED_0' 		=> $selected_search_engines_excluded_0,
				'SELECTED_SEARCH_ENGINES_EXCLUDED_1' 		=> $selected_search_engines_excluded_1,
				'SELECTED_CHECK_AGAINST_ANTI_SPAM_SITES_0' 	=> $selected_check_against_anti_spam_sites_0,
				'SELECTED_CHECK_AGAINST_ANTI_SPAM_SITES_1' 	=> $selected_check_against_anti_spam_sites_1,
				'SELECTED_SFS_USERNAME_REQUIRED' 			=> $selected_sfs_username_required,
				'SELECTED_SFS_EMAIL_REQUIRED' 				=> $selected_sfs_email_required,
				'SELECTED_SFS_IP_REQUIRED' 					=> $selected_sfs_ip_required,
				'SELECTED_SFS_MARK_AS_SPAM_0' 				=> $selected_sfs_mark_as_spam_0,
				'SELECTED_SFS_MARK_AS_SPAM_1' 				=> $selected_sfs_mark_as_spam_1,
				'EDIT_DIRECT_ACCESS_TEXT' 					=> mgb_formatForm($settings['direct_access_text']),
				'EDIT_SEARCH_ENGINES' 						=> mgb_formatForm($settings['search_engines']),
				'EDIT_SFS_USERNAME_FREQUENCY' 				=> mgb_formatForm($settings['sfs_username_frequency']),
				'EDIT_SFS_EMAIL_FREQUENCY' 					=> mgb_formatForm($settings['sfs_email_frequency']),
				'EDIT_SFS_IP_FREQUENCY' 					=> mgb_formatForm($settings['sfs_ip_frequency']),
				'EDIT_SFS_API_KEY' 							=> mgb_formatForm($settings['sfs_api_key']),
				'EDIT_DYNAMIC_FIELDNAMES_LENGTH'			=> mgb_formatForm($settings['dynamic_fieldnames_length']),
				'EDIT_KEYSTROKE_MAX_CPS' 					=> mgb_formatForm($settings['keystroke_max_cps']),
				'EDIT_KEYSTROKE_BAN_TIME' 					=> mgb_formatForm($settings['keystroke_ban_time']),
				'EDIT_SESSION_TIMEOUT' 						=> mgb_formatForm($settings['session_timeout']),
				'EDIT_PASSWORD_MIN_LENGTH' 					=> mgb_formatForm($settings['password_min_length'])
			], $page_include);

			// is scrolling function needed?
			$content_scrolling_function = "";
		} else {
			$page_include = "<span class=\"admin\">".$lang['errormessage'][4]."</span>"; // user has no access to this page, user level too low
			$content_scrolling_function = "<br>";
		}
	}
?>
