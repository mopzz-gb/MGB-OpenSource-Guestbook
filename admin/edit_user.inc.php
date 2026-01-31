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

	=================
	edit_user.inc.php
	=================
	*/

	// make sure nobody has direct acces to this script
	if (!defined('ADMINISTRATION')) {
		include ("error.html");
		die();
	} else {
		if(check_rights($mysqli, $_GET['action'], $_SESSION['user_ID'])) {
			// load config, settings, template and language files
			require_once (MGB_ROOT."includes/config.inc.php");
			require_once (MGB_ROOT."includes/load_settings.inc.php");
			require (MGB_ROOT."language/".$settings['language_path']."/lang_admin.php");
			require (MGB_ROOT."includes/functions.inc.php");

			// load templates
			$content_edit_user = mgb_load_template("admin", "default", "edit_user", $settings['debug_mode']);
			$content_edit_user_single = mgb_load_template("admin", "default", "edit_user_single", $settings['debug_mode']);
			$content_edit_user_adduser = mgb_load_template("admin", "default", "edit_user_adduser", $settings['debug_mode']);

			$ok = 1;

			if(isset($_GET['mode']) AND $_GET['mode'] == "edit") {
				if(isset($_GET['id'])) {
					if(isset($_POST['sent_edit_user']) AND $_POST['sent_edit_user'] == 1) {
						if(!isset($_POST['delete_user'])) {
							$_POST['delete_user'] = 0;
						}						
						if($_POST['delete_user'] == 1) {
							// check if user is able to change rights of the user
							// an admin can't revoke his own rights or delete himself
							if(login_ok($mysqli, $_SESSION['user_name'], "", $_POST['old_password'])) {
								if($_SESSION['lock'] == 1 AND $_SESSION['edit_username'] === $_SESSION['user_name']) {
									$errorcode = 8; // user tried to lock or delete his own account
									$ok = 0;
								}
							} else {
								$errorcode = 5; // wrong password
							}

							if(empty($errorcode)) {
								mgb_sql_connect($mysqli, "DELETE FROM ".$db['prefix']."user WHERE ID=".$_GET['id']." LIMIT 1", "Error while deleting user.", 0);
								mgb_trigger_sys_log($mysqli, 1020, '', '', '', $_SESSION['user_name'], '', $_POST['name'], $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
							}
						} else {
							// check if a new password is set
							if(!empty($_POST['new_password_1']) AND !empty($_POST['new_password_2'])) {
								if(!empty($_POST['old_password'])) {
									if(login_ok($mysqli, $_SESSION['user_name'], $_SESSION['user_ID'], $_POST['old_password'])) {
										if($_POST['new_password_1'] === $_POST['new_password_2']) {
											if(strlen($_POST['new_password_1']) < $settings['password_min_length']) {
												$errorcode = 16; // new password is too short
											} else {
												$pass = "`user_password` = '".password_hash($_POST['new_password_1'], PASSWORD_DEFAULT)."',";
												mgb_trigger_sys_log($mysqli, 1019, '', '', '', $_SESSION['user_name'], '', $_POST['name'], $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
											}
										} else {
											$errorcode = 6; // new passwords are not identical
										}
									} else {
										$errorcode = 5; // wrong or no old password
									}
								} else {
									$errorcode = 5; // wrong or no old password
								}
							} else {
								$pass = "";
							}

							// check if email is valid
							if(!mgb_check_mail($_POST['email'])) {
								$errorcode = 7; // no or no valid email
							}

							// name and email can't be empty
							if(empty($_POST['name']) OR empty($_POST['email'])) {
								$errorcode = 1; // necessary fields are empty
							}

							// check if user is able to change rights of the user
							// an admin can't revoke his own rights or delete himself
							if($_SESSION['lock'] == 1) { // user is admin
								$_POST['user_is_active'] = 1;
								$_POST['user_level'] = 0;
								$_POST['r_settings'] = 1;
								$_POST['r_settings_database'] = 1;
								$_POST['r_activate'] = 1;
								$_POST['r_deactivate'] = 1;
								$_POST['r_delete'] = 1;
								$_POST['r_edit'] = 1;
								$_POST['r_spam'] = 1;
								$_POST['r_edit_smilies'] = 1;
								$_POST['r_banlists'] = 1;
								$_POST['r_telemetry'] = 1;
							}

							// make sure $_GET['id'] is safe
							$id = (int)$_GET['id'];
							
							// check password
							if(login_ok($mysqli, $_SESSION['user_name'], $_SESSION['user_ID'], $_POST['old_password'])) {
								if(empty($errorcode)) {
									// save data to database
									$sql = "UPDATE ".$db['prefix']."user SET
										`user_name` = '".$_POST['name']."',
										".$pass."
										`user_email` = '".$_POST['email']."',
										`user_is_active` = '".$_POST['user_is_active']."',
										`user_level` = '".$_POST['user_level']."',
										`r_settings` = '".$_POST['r_settings']."',
										`r_settings_database` = '".$_POST['r_settings_database']."',
										`r_activate` = '".$_POST['r_activate']."',
										`r_deactivate` = '".$_POST['r_deactivate']."',
										`r_delete` = '".$_POST['r_delete']."',
										`r_edit` = '".$_POST['r_edit']."',
										`r_spam` = '".$_POST['r_spam']."',
										`r_edit_smilies` = '".$_POST['r_edit_smilies']."',
										`r_banlists` = '".$_POST['r_banlists']."',
										`r_telemetry` = '".$_POST['r_telemetry']."'
										WHERE ID=".$id." LIMIT 1";

									if (mgb_sql_connect($mysqli, $sql, "Error while editing user.", 0)) {
										$saved_settings_successfull = 1;
										mgb_trigger_sys_log($mysqli, 1019, '', '', '', $_SESSION['user_name'], '', $_POST['name'], $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
									}
									$ok = 1;
								} else {
									$ok = 0;
								}
							} else {
								$errorcode = 5; // wrong password
							}
						}
					}

					if(!isset($_POST['sent_edit_user']) OR !empty($errorcode)) {
						if(!empty($errorcode)) {
							$errormessage = mgb_errormessage($errorcode, $settings['language_path'], "adminpanel");
							if($errorcode == 16) {
								$errormessage = mgb_template_replace(['PASSWORD_MIN_LENGTH' => $settings['password_min_length']], $errormessage);
							}
						} else {
							$errormessage = "";
							$content_errormessage = "";
						}

						$result = mgb_sql_connect($mysqli, "SELECT * FROM ".$db['prefix']."user WHERE ID=".$_GET['id']." LIMIT 1", "Error while loading user.", 1);
						$user = mysqli_fetch_array($result, MYSQLI_ASSOC);

						$page_edit_user_single = $content_edit_user_single;

						$userID = $user['ID'];
						$user_name = $user['user_name'];
						$user_email = $user['user_email'];
						$user_level = $user['user_level'];
						$user_is_active = $user['user_is_active'];
						$r_settings = $user['r_settings'];
						$r_settings_database = $user['r_settings_database'];
						$r_activate = $user['r_activate'];
						$r_deactivate = $user['r_deactivate'];
						$r_delete = $user['r_delete'];
						$r_edit = $user['r_edit'];
						$r_spam = $user['r_spam'];
						$r_edit_smilies = $user['r_edit_smilies'];
						$r_banlists = $user['r_banlists'];
						$r_telemetry = $user['r_telemetry'];

						if($_SESSION['user_ID'] == $userID) {
							$_SESSION['lock'] = 1;
							$_SESSION['edit_username'] = $user_name;
							$page_edit_user_single = mgb_template_replace(['DISABLED' => " disabled"], $page_edit_user_single);
						} else {
							$_SESSION['lock'] = 0;
							$_SESSION['edit_username'] = "";
							$page_edit_user_single = mgb_template_replace(['DISABLED' => ""], $page_edit_user_single);
						}

						if ($user_level == 0) { $selected_r_admin = " selected"; $selected_r_moderator = NULL; } else { $selected_r_admin = NULL; $selected_r_moderator = " selected"; }
						if ($user_is_active == 0) { $selected_user_is_active_0 = " selected"; $selected_user_is_active_1 = NULL; } else { $selected_user_is_active_0 = NULL; $selected_user_is_active_1 = " selected"; }
						if ($r_settings == 0) { $selected_r_settings_0 = " selected"; $selected_r_settings_1 = NULL; } else { $selected_r_settings_0 = NULL; $selected_r_settings_1 = " selected"; }
						if ($r_settings_database == 0) { $selected_r_settings_database_0 = " selected"; $selected_r_settings_database_1 = NULL; } else { $selected_r_settings_database_0 = NULL; $selected_r_settings_database_1 = " selected"; }
						if ($r_activate == 0) { $selected_r_activate_0 = " selected"; $selected_r_activate_1 = NULL; } else { $selected_r_activate_0 = NULL; $selected_r_activate_1 = " selected"; }
						if ($r_deactivate == 0) { $selected_r_deactivate_0 = " selected"; $selected_r_deactivate_1 = NULL; } else { $selected_r_deactivate_0 = NULL; $selected_r_deactivate_1 = " selected"; }
						if ($r_delete == 0) { $selected_r_delete_0 = " selected"; $selected_r_delete_1 = NULL; } else { $selected_r_delete_0 = NULL; $selected_r_delete_1 = " selected"; }
						if ($r_edit == 0) { $selected_r_edit_0 = " selected"; $selected_r_edit_1 = NULL; } else { $selected_r_edit_0 = NULL; $selected_r_edit_1 = " selected"; }
						if ($r_spam == 0) { $selected_r_spam_0 = " selected"; $selected_r_spam_1 = NULL; } else { $selected_r_spam_0 = NULL; $selected_r_spam_1 = " selected"; }
						if ($r_edit_smilies == 0) { $selected_r_edit_smilies_0 = " selected"; $selected_r_edit_smilies_1 = NULL; } else { $selected_r_edit_smilies_0 = NULL; $selected_r_edit_smilies_1 = " selected"; }
						if ($r_banlists == 0) { $selected_r_banlists_0 = " selected"; $selected_r_banlists_1 = NULL; } else { $selected_r_banlists_0 = NULL; $selected_r_banlists_1 = " selected"; }
						if ($r_telemetry == 0) { $selected_r_telemetry_0 = " selected"; $selected_r_telemetry_1 = NULL; } else { $selected_r_telemetry_0 = NULL; $selected_r_telemetry_1 = " selected"; }

						$page_edit_user_single = mgb_template_replace([
							'TEMPLATE_ERRORMESSAGE' => $content_errormessage,
							'ERRORMESSAGE' 			=> $errormessage
						], $page_edit_user_single);

						// $page_edit_user_single = mgb_template_language($page_edit_user_single, "../language/".$settings['language_path']."/lang_admin.php", $settings['debug_mode']); // last number defines debug mode

						$page_edit_user_single = mgb_template_replace([
							'EDIT_USER_ID' 						=> $userID,
							'EDIT_USER_NAME' 					=> $user_name,
							'EDIT_USER_EMAIL' 					=> $user_email,
							'SELECTED_USER_IS_ACTIVE_0' 		=> $selected_user_is_active_0,
							'SELECTED_USER_IS_ACTIVE_1' 		=> $selected_user_is_active_1,
							'SELECTED_R_ADMIN' 					=> $selected_r_admin,
							'SELECTED_R_MODERATOR' 				=> $selected_r_moderator,
							'SELECTED_R_SETTINGS_0' 			=> $selected_r_settings_0,
							'SELECTED_R_SETTINGS_1' 			=> $selected_r_settings_1,
							'SELECTED_R_SETTINGS_DATABASE_0' 	=> $selected_r_settings_database_0,
							'SELECTED_R_SETTINGS_DATABASE_1' 	=> $selected_r_settings_database_1,
							'SELECTED_R_ACTIVATE_0' 			=> $selected_r_activate_0,
							'SELECTED_R_ACTIVATE_1'			 	=> $selected_r_activate_1,
							'SELECTED_R_DEACTIVATE_0' 			=> $selected_r_deactivate_0,
							'SELECTED_R_DEACTIVATE_1' 			=> $selected_r_deactivate_1,
							'SELECTED_R_DELETE_0'	 			=> $selected_r_delete_0,
							'SELECTED_R_DELETE_1' 				=> $selected_r_delete_1,
							'SELECTED_R_EDIT_0' 				=> $selected_r_edit_0,
							'SELECTED_R_EDIT_1' 				=> $selected_r_edit_1,
							'SELECTED_R_SPAM_0' 				=> $selected_r_spam_0,
							'SELECTED_R_SPAM_1' 				=> $selected_r_spam_1,
							'SELECTED_R_EDIT_SMILIES_0' 		=> $selected_r_edit_smilies_0,
							'SELECTED_R_EDIT_SMILIES_1' 		=> $selected_r_edit_smilies_1,
							'SELECTED_R_BANLISTS_0' 			=> $selected_r_banlists_0,
							'SELECTED_R_BANLISTS_1' 			=> $selected_r_banlists_1,
							'SELECTED_R_TELEMETRY_0' 			=> $selected_r_telemetry_0,
							'SELECTED_R_TELEMETRY_1' 			=> $selected_r_telemetry_1,
							'FORM_ACTION' 						=> "admin.php?action=editusers&amp;mode=edit&amp;id=".$userID.$sid
						], $page_edit_user_single);

						$content_scrolling_function = NULL;

						$page_include = $page_edit_user_single;

						$ok = 0;
					}
				}
			}

			if(isset($_GET['mode']) AND $_GET['mode'] == "adduser") {
				if(isset($_POST['sent_edit_user_adduser']) AND $_POST['sent_edit_user_adduser'] == 1) {
					if(login_ok($mysqli, $_SESSION['user_name'], $_SESSION['user_ID'], $_POST['old_password'])) {
						if(!check_if_user_exists($mysqli, $_POST['name'], $_POST['email'])) {
							$errorcode = 11; // user already exists
						}
					} else {
						$errorcode = 5; // wrong password
					}

					if($_POST['new_password_1'] != $_POST['new_password_2']) {
						$errorcode = 6; // passwords are not identical
					}

					// check if email is valid
					if(!mgb_check_mail($_POST['email'])) {
						$errorcode = 7; // no or no valid email
					}

					// name and email must not be empty
					if($_POST['name'] == "" OR $_POST['email'] == "") {
						$errorcode = 1; // required fields are empty
					}

					if(!isset($errorcode) OR $errorcode == 0) {
						if(!isset($_POST['logged_out'])) {
							$_POST['logged_out'] = 1;
						}

						$sql = "INSERT INTO ".$db['prefix']."user (
							`user_name`,
							`user_password`,
							`user_email`,
							`user_is_active`,
							`user_level`,
							`r_settings`,
							`r_settings_database`,
							`r_activate`,
							`r_deactivate`,
							`r_delete`,
							`r_edit`,
							`r_spam`,
							`r_edit_smilies`,
							`r_banlists`,
							`r_telemetry`,
							`logged_out`
						) VALUES (
							'".$_POST['name']."',
							'".password_hash($_POST['new_password_1'], PASSWORD_DEFAULT)."',
							'".$_POST['email']."',
							'".$_POST['user_is_active']."',
							'".$_POST['user_level']."',
							'".$_POST['r_settings']."',
							'".$_POST['r_settings_database']."',
							'".$_POST['r_activate']."',
							'".$_POST['r_deactivate']."',
							'".$_POST['r_delete']."',
							'".$_POST['r_edit']."',
							'".$_POST['r_spam']."',
							'".$_POST['r_edit_smilies']."',
							'".$_POST['r_banlists']."',
							'".$_POST['r_telemetry']."',
							'".$_POST['logged_out']."'
						);";

						mgb_sql_connect($mysqli, $sql, "Error while registering a new user.", 0);
						mgb_trigger_sys_log($mysqli, 1018, '', '', '', $_SESSION['user_name'], $_POST['name'], '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog

						if(!empty($_POST['send_account_data'])) {
							if (!empty($_SERVER['HTTPS'])) {
								$url = "https://".$settings['h_domain'].$settings['gb_path']."admin/admin.php";
							} else {
								$url = "http://".$settings['h_domain'].$settings['gb_path']."admin/admin.php";
							}

							$lang['sendmail_adduser_title'] = format_mail(repl_uml($lang['sendmail_adduser_title'], $charset), "", "", "", "", $settings['h_domain'], "", $_POST['name'], $_POST['new_password_1'], $url, "", "", "");
							$lang['sendmail_adduser_text'] = format_mail(repl_uml(xhtmlbr2nl($lang['sendmail_adduser_text']), $charset), "", "", "", "", $settings['h_domain'], "", $_POST['name'], $_POST['new_password_1'], $url, "", "", "");

							$mail_header = "content-type: text/plain; charset=".$charset."\r\n";
							$mail_header .= "from: ".$settings['admin_gbemail']."\r\n";
							$mail_header .= "Reply-To: ".$settings['admin_gbemail']."\r\n";
							$mail_header .= "X-Mailer: PHP/".phpversion();

							if($settings['mailer_method'] == 0) {
								$mail_send = @mail($_POST['email'], $lang['sendmail_adduser_title'], $lang['sendmail_adduser_text'], $mail_header);
								if($mail_send) {
									$sendemail_successfull = 1;
									mgb_trigger_sys_log($mysqli, 1026, $_POST['name'], '', '', $_SESSION['user_name'], '', '', $_SERVER['REMOTE_ADDR'], $db['prefix']); // write the syslog
								} else {
									$sendemail_successfull = 0;
								}
							}
						}
					}
				}

				if(!isset($_POST['sent_edit_user_adduser']) OR isset($errorcode)) {
					if(!empty($errorcode)) {
						$errormessage = mgb_errormessage($errorcode, $settings['language_path'], "adminpanel");
					} else {
						$content_errormessage = "";
						$errormessage = "";
					}

					$save_pw = generate_key_and_pw(MGB_ROOT, $mysqli, "", $settings['password_min_length'], "adminpanel");

					$page_edit_user_adduser = $content_edit_user_adduser;

					$page_edit_user_adduser = mgb_template_replace([
						'TEMPLATE_ERRORMESSAGE' => $content_errormessage,
						'ERRORMESSAGE' => $errormessage
					], $page_edit_user_adduser);

					// $page_edit_user_adduser = mgb_template_language($page_edit_user_adduser, "../language/".$settings['language_path']."/lang_admin.php", $settings['debug_mode']); // last number defines debug mode

					$user_level = isset($_POST['user_level']) ? (int)$_POST['user_level'] : 0;
					$user_is_active = isset($_POST['user_is_active']) ? (int)$_POST['user_is_active'] : 0;
					$r_settings = isset($_POST['r_settings']) ? (int)$_POST['r_settings'] : 0;
					$r_settings_database = isset($_POST['r_settings_database']) ? (int)$_POST['r_settings_database'] : 0;
					$r_activate = isset($_POST['r_activate']) ? (int)$_POST['r_activate'] : 0;
					$r_deactivate = isset($_POST['r_deactivate']) ? (int)$_POST['r_deactivate'] : 0;
					$r_delete = isset($_POST['r_delete']) ? (int)$_POST['r_delete'] : 0;
					$r_edit = isset($_POST['r_edit']) ? (int)$_POST['r_edit'] : 0;
					$r_spam = isset($_POST['r_spam']) ? (int)$_POST['r_spam'] : 0;
					$r_edit_smilies = isset($_POST['r_edit_smilies']) ? (int)$_POST['r_edit_smilies'] : 0;
					$r_banlists = isset($_POST['r_banlists']) ? (int)$_POST['r_banlists'] : 0;
					$r_telemetry = isset($_POST['r_telemetry']) ? (int)$_POST['r_telemetry'] : 0;
					$name = isset($_POST['name']) ? $_POST['name'] : "";
					$email = isset($_POST['email']) ? $_POST['email'] : "";					
					
					if ($user_level == 0) { $selected_r_admin = " selected"; $selected_r_moderator = NULL; } else { $selected_r_admin = NULL; $selected_r_moderator = " selected"; }
					if ($user_is_active == 0) { $selected_user_is_active_0 = " selected"; $selected_user_is_active_1 = NULL; } else { $selected_user_is_active_0 = NULL; $selected_user_is_active_1 = " selected"; }
					if ($r_settings == 0) { $selected_r_settings_0 = " selected"; $selected_r_settings_1 = NULL; } else { $selected_r_settings_0 = NULL; $selected_r_settings_1 = " selected"; }
					if ($r_settings_database == 0) { $selected_r_settings_database_0 = " selected"; $selected_r_settings_database_1 = NULL; } else { $selected_r_settings_database_0 = NULL; $selected_r_settings_database_1 = " selected"; }
					if ($r_activate == 0) { $selected_r_activate_0 = " selected"; $selected_r_activate_1 = NULL; } else { $selected_r_activate_0 = NULL; $selected_r_activate_1 = " selected"; }
					if ($r_deactivate == 0) { $selected_r_deactivate_0 = " selected"; $selected_r_deactivate_1 = NULL; } else { $selected_r_deactivate_0 = NULL; $selected_r_deactivate_1 = " selected"; }
					if ($r_delete == 0) { $selected_r_delete_0 = " selected"; $selected_r_delete_1 = NULL; } else { $selected_r_delete_0 = NULL; $selected_r_delete_1 = " selected"; }
					if ($r_edit == 0) { $selected_r_edit_0 = " selected"; $selected_r_edit_1 = NULL; } else { $selected_r_edit_0 = NULL; $selected_r_edit_1 = " selected"; }
					if ($r_spam == 0) { $selected_r_spam_0 = " selected"; $selected_r_spam_1 = NULL; } else { $selected_r_spam_0 = NULL; $selected_r_spam_1 = " selected"; }
					if ($r_edit_smilies == 0) { $selected_r_edit_smilies_0 = " selected"; $selected_r_edit_smilies_1 = NULL; } else { $selected_r_edit_smilies_0 = NULL; $selected_r_edit_smilies_1 = " selected"; }
					if ($r_banlists == 0) { $selected_r_banlists_0 = " selected"; $selected_r_banlists_1 = NULL; } else { $selected_r_banlists_0 = NULL; $selected_r_banlists_1 = " selected"; }
					if ($r_telemetry == 0) { $selected_r_telemetry_0 = " selected"; $selected_r_telemetry_1 = NULL; } else { $selected_r_telemetry_0 = NULL; $selected_r_telemetry_1 = " selected"; }

					$page_edit_user_adduser = mgb_template_replace([
						'EDIT_USER_NAME' 					=> $name,
						'EDIT_USER_EMAIL' 					=> $email,
						'SELECTED_USER_IS_ACTIVE_0' 		=> $selected_user_is_active_0,
						'SELECTED_USER_IS_ACTIVE_1' 		=> $selected_user_is_active_1,
						'SELECTED_R_ADMIN' 					=> $selected_r_admin,
						'SELECTED_R_MODERATOR' 				=> $selected_r_moderator,
						'SELECTED_R_SETTINGS_0' 			=> $selected_r_settings_0,
						'SELECTED_R_SETTINGS_1' 			=> $selected_r_settings_1,
						'SELECTED_R_SETTINGS_DATABASE_0' 	=> $selected_r_settings_database_0,
						'SELECTED_R_SETTINGS_DATABASE_1' 	=> $selected_r_settings_database_1,
						'SELECTED_R_ACTIVATE_0'	 			=> $selected_r_activate_0,
						'SELECTED_R_ACTIVATE_1' 			=> $selected_r_activate_1,
						'SELECTED_R_DEACTIVATE_0' 			=> $selected_r_deactivate_0,
						'SELECTED_R_DEACTIVATE_1' 			=> $selected_r_deactivate_1,
						'SELECTED_R_DELETE_0' 				=> $selected_r_delete_0,
						'SELECTED_R_DELETE_1' 				=> $selected_r_delete_1,
						'SELECTED_R_EDIT_0' 				=> $selected_r_edit_0,
						'SELECTED_R_EDIT_1' 				=> $selected_r_edit_1,
						'SELECTED_R_SPAM_0' 				=> $selected_r_spam_0,
						'SELECTED_R_SPAM_1' 				=> $selected_r_spam_1,
						'SELECTED_R_EDIT_SMILIES_0' 		=> $selected_r_edit_smilies_0,
						'SELECTED_R_EDIT_SMILIES_1' 		=> $selected_r_edit_smilies_1,
						'SELECTED_R_BANLISTS_0' 			=> $selected_r_banlists_0,
						'SELECTED_R_BANLISTS_1' 			=> $selected_r_banlists_1,
						'SELECTED_R_TELEMETRY_0' 			=> $selected_r_telemetry_0,
						'SELECTED_R_TELEMETRY_1' 			=> $selected_r_telemetry_1,
						'EDIT_USER_NEW_PASSWORD_1' 			=> $save_pw,
						'EDIT_USER_NEW_PASSWORD_2' 			=> $save_pw,
						'FORM_ACTION' 						=> "admin.php?action=editusers&amp;mode=adduser".$sid
					], $page_edit_user_adduser);

					$content_scrolling_function = NULL;

					$page_include = $page_edit_user_adduser;

					$ok = 0;
				}
			}

			if ($ok == 1) {
				$result = mgb_sql_connect($mysqli, "SELECT * FROM ".$db['prefix']."user ORDER BY ID ASC", "Error while loading users.", 1);

				$counter = 0;

				for($i = 0; $i < mysqli_num_rows($result); $i++) {
					$users[$i] = mysqli_fetch_array($result, MYSQLI_ASSOC);
					$counter++;
				}

				for($i = 0; $i < count($users); $i++) {
					$page_edit_user[$i] = $content_edit_user;

					if($i == 0) {
						$edit_user_icon_adduser = "<a href=\"admin.php?action=editusers&amp;mode=adduser".$sid."\"><img class=\"icon\" src=\"templates/default/images/user_adduser.png\" title=\"".$lang['user_add']."\" alt=\"".$lang['user_add']."\"></a>";
					} else {
						$edit_user_icon_adduser = NULL;
					}

					// fill template with entry (strings)
					if($users[$i]['user_level'] == 0) { $user_level = $lang['administrator']; } else { $user_level = $lang['moderator']; }
					
					$page_edit_user[$i] = mgb_template_replace([
						'EDIT_USER_ID' 				=> $users[$i]['ID'],
						'EDIT_USER_NAME' 			=> $users[$i]['user_name'],
						'EDIT_USER_LEVEL' 			=> $user_level,
						'EDIT_USER_ICON_EDIT' 		=> "<a href=\"admin.php?action=editusers&amp;mode=edit&amp;id=".$users[$i]['ID'].$sid."\"><img class=\"icon\" src=\"templates/default/images/user_edit.png\" title=\"".$lang['user_edit']."\" alt=\"".$lang['user_edit']."\"></a>",
						'EDIT_USER_ICON_ADDUSER' 	=> $edit_user_icon_adduser
					], $page_edit_user[$i]);

					if(!isset($page_include)) { $page_include = NULL; }
					$page_include .= $page_edit_user[$i];

					$content_scrolling_function = NULL;
				}
			}
		} else {
			$page_include = "<span class=\"admin\">".$lang['errormessage'][4]."</span>"; // user has no access to this script
			$content_scrolling_function = "<br>";
		}
	}
?>
