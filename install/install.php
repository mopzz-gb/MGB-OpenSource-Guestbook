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

	===================
	install.php - 0.7.1
	===================
	*/

	// Show all errors but no warnings and make sure they are displayed
	error_reporting(E_ALL & ~E_NOTICE);
	ini_set("display_errors", 1);

	// set root path
	define('MGB_ROOT', dirname(dirname(__FILE__))."/");

	// set timezone
	if(function_exists("date_default_timezone_set")) {
		date_default_timezone_set('Europe/Berlin');
	}

	require MGB_ROOT.'install/includes/functions.inc.php';

	if(file_exists(MGB_ROOT.'install/includes/config.inc.php')) {
		require_once (MGB_ROOT.'install/includes/config.inc.php');
		if(isset($mgb_installation_complete) AND (cleanstr($mgb_installation_complete) == TRUE)) {
			echo "<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: green;\">config.inc.php exists. It seems that MGB has been already installed.</span><br><br>
			<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: darkblue;\">If you want to upgrade your MGB installation call <a href='upgrade.php'>upgrade.php</a> instead of install.php. If you want a new installation, delete ''config.inc.php'' in root/includes directory and try again.</span>";
			die();
		}
	}

	// start session
	session_name("sid");
	ini_set('url_rewriter.tags', '');
	session_start();
	session_regenerate_id();

	if(SID != NULL) { $sid = "?".SID; } else { $sid = NULL;	}

	// load template
	require_once MGB_ROOT.'install/includes/load_templates.inc.php';
	require_once MGB_ROOT.'install/includes/config.inc.php';

	// load main template
	$page_body = $content_install_body;
	$page_header = $content_install_header;

	// set this to 1 if you want to ignore warnings
	$ignore_warnings = 0;

	if(isset($_POST['install_language'])) {
		$_SESSION['install_language'] = $_POST['install_language'];
	}

	if(isset($_SESSION['install_language'])) {
		require_once (MGB_ROOT."language/".$_SESSION['install_language']."/lang_install.php");
		require_once (MGB_ROOT."language/".$_SESSION['install_language']."/settings.php");
		$lang_install = $lang;

		// set timezone
		if(function_exists("date_default_timezone_set")) {
			date_default_timezone_set($language_timezone);
		}

		if(empty($_POST['step'])) {
			$page_body = mgb_template_replace([
				'TEMPLATE_STEPS' 		=> $content_install_eula,
				'LANG_EULA_EXPL' 		=> $lang['eula_expl'],
				'LANG_EULA_AGREE' 		=> $lang['eula_agree'],
				'LANG_EULA_DISAGREE' 	=> $lang['eula_disagree'],
				'LANG_NEXT_STEP' 		=> $lang['next_step']
			], $page_body);
		} elseif(!empty($_POST['step']) AND $_POST['step'] == 1) {
			if(isset($_POST['eula_agreement']) AND $_POST['eula_agreement'] == 1) {
				switch(version_compare('8.0.0', phpversion())) {
					case -1: $img_php = "<img src=\"template/images/ok.png\" alt=\"OK\">";
						break;
					case 0: $img_php = "<img src=\"template/images/ok.png\" alt=\"OK\">";
						break;
					case 1: $img_php = "<img src=\"template/images/nok.png\" alt=\"NOT OK\">";
						$error_php = 1;
						break;
				}

				// is mysqli extension loaded?
				if(extension_loaded('mysqli')) {
					$mysqli_loaded_lang = $lang['yes'];
					$img_mysqli = "<img src=\"template/images/ok.png\" alt=\"OK\">";
					echo "yes";
				} else {
					$mysqli_loaded_lang = $lang['no'];
					$img_mysqli = "<img src=\"template/images/nok.png\" alt=\"NOT OK\">";
					$error_mysqli = 1;
					echo "no";
				}

				// does imagegd exist?
				if(function_exists('imagegd2') OR function_exists('imagegd')) {
					$gd_exists_lang = $lang['yes'];
					$img_gd = "<img src=\"template/images/ok.png\" alt=\"OK\">";
				} else {
					$gd_exists_lang = $lang['no'];
					$img_gd = "<img src=\"template/images/warning.png\" alt=\"WARNING\">";
					$error_gd = 1;
				}

				// does the config file exist and is it writable?
				if(!file_exists(MGB_ROOT.'includes/config.inc.php')) {
					if($file = fopen(MGB_ROOT.'includes/config.inc.php', 'w')) {
						fclose($file);
					} else {
						$error_writable = 1;
					}
				}

				if(is_writable(MGB_ROOT.'includes/config.inc.php') && is_writable(MGB_ROOT.'cache') && is_writable(MGB_ROOT.'save')) {
					$cfg_writable_lang = $lang['yes'];
					$img_cfg_writable = "<img src=\"template/images/ok.png\" alt=\"OK\">";
				} else {
					$cfg_writable_lang = $lang['no'];
					$img_cfg_writable = "<img src=\"template/images/nok.png\" alt=\"NOT OK\">";
					$error_writable = 1;
				}

				// is register_globals off?
				if(ini_get('register_globals') == 1) {
					$reg_globals_lang = $lang['active'];
					$img_reg_globals = "<img src=\"template/images/warning.png\" alt=\"WARNING\">";
					$error_reg_globals = 1;
				} else {
					$reg_globals_lang = $lang['inactive'];
					$img_reg_globals = "<img src=\"template/images/ok.png\" alt=\"OK\">";
				}

				$page_body = mgb_template_replace([
					'TEMPLATE_STEPS' => $content_install_step1,
					'TEMPLATE_WARNINGS' => $content_install_warnings
				], $page_body);

				if(!isset($errorcode)) {
					$errorcode = NULL;
				}

				if(isset($error_gd)) { $page_body = mgb_template_replace(['ERROR_3' => "<span class=\"install_error_low\">-&nbsp;".$lang['error_3']."</span><br>"], $page_body); $show_next_step = 1; $errorcode++; } else { $page_body = mgb_template_replace(['ERROR_3' => ""], $page_body); }
				if(isset($error_reg_globals)) { $page_body = mgb_template_replace(['ERROR_5' => "<span class=\"install_error_low\">-&nbsp;".$lang['error_5']."</span><br>"], $page_body); $show_next_step = 1; $errorcode++; } else { $page_body = mgb_template_replace(['ERROR_5' => ""], $page_body); }
				if(isset($error_php)) { $page_body = mgb_template_replace(['ERROR_1' => "<span class=\"install_error_critical\">-&nbsp;".$lang['error_1']."</span><br>"], $page_body); $show_next_step = 0; $errorcode++; } else { $page_body = mgb_template_replace(['ERROR_1' => ""], $page_body); }
				if(isset($error_mysqli)) { $page_body = mgb_template_replace(['ERROR_6' => "<span class=\"install_error_critical\">-&nbsp;".$lang['error_6']."</span><br>"], $page_body); $show_next_step = 0; $errorcode++; } else { $page_body = mgb_template_replace(['ERROR_6' => ""], $page_body); }
				if(isset($error_mysql)) { $page_body = mgb_template_replace(['ERROR_2' => "<span class=\"install_error_critical\">-&nbsp;".$lang['error_2']."</span><br>"], $page_body); $show_next_step = 0; $errorcode++; } else { $page_body = mgb_template_replace(['ERROR_2' => ""], $page_body); }
				if(isset($error_writable)) { $page_body = mgb_template_replace(['ERROR_4' => "<span class=\"install_error_critical\">-&nbsp;".$lang['error_4']."</span><br>"], $page_body); $show_next_step = 0; $errorcode++; } else { $page_body = mgb_template_replace(['ERROR_4' => ""], $page_body); }
				if(!isset($errorcode)) { $page_body = mgb_template_replace(['NO_ERROR' => "<span class=\"install_no_error\">-&nbsp;".$lang['no_error']."</span><br>"], $page_body); $show_next_step = 1; } else { $page_body = mgb_template_replace(['NO_ERROR' => ""], $page_body); }

				$page_body = mgb_template_replace([
					'ERROR' 			=> "",
					'LANG_THANKS' 		=> $lang['thanks'],
					'LANG_EXPL_STEP1' 	=> $lang['expl_step1'],
					'LANG_SERVER' 		=> "&nbsp;", // $lang['srvcfg_server']
					'LANG_PHP' 			=> $lang['srvcfg_phpversion'],
					'LANG_MYSQLI' 		=> $lang['srvcfg_mysqliversion'],
					// 'LANG_MYSQL' 	=> $lang['srvcfg_mysqlversion'],
					'LANG_GD' 			=> $lang['srvcfg_gd'],
					'LANG_CFG_WRITABLE' => $lang['srvcfg_writable'],
					'LANG_REG_GLOBALS' 	=> $lang['srvcfg_reg_globals'],

					'SRVCFG_SERVER' 		=> "&nbsp;", // $_SERVER['SERVER_SOFTWARE']
					'SRVCFG_PHP' 			=> phpversion(),
					'SRVCFG_MYSQLI' 		=> $mysqli_loaded_lang,
					// 'SRVCFG_MYSQL' 		=> $mysql_version,
					'SRVCFG_GD' 			=> $gd_exists_lang,
					'SRVCFG_CFG_WRITABLE' 	=> $cfg_writable_lang,
					'SRVCFG_REG_GLOBALS' 	=> $reg_globals_lang,

					'IMG_PHP' 			=> $img_php,
					'IMG_MYSQLI' 		=> $img_mysqli,
					// 'IMG_MYSQL' 		=> $img_mysql,
					'IMG_GD' 			=> $img_gd,
					'IMG_CFG_WRITABLE' 	=> $img_cfg_writable,
					'IMG_REG_GLOBALS' 	=> $img_reg_globals
				], $page_body);

				if(isset($ignore_warnings) AND $ignore_warnings == 1) {
					$show_next_step = 1;
				}

				if(isset($show_next_step) AND $show_next_step == 1) {
					$next_step = "<form action=\"install.php".$sid."\" method=\"post\">\n";
					$next_step .= "<input type=\"hidden\" name=\"step\" value=\"2\">\n";
					$next_step .= "<input type=\"submit\" class=\"install_button\" name=\"next\" value=\"{LANG_NEXT_STEP}\">\n";
					$next_step .= "</form>";
					$page_body = mgb_template_replace(['NEXT_STEP' => $next_step], $page_body);
				} else {
					$page_body = mgb_template_replace(['NEXT_STEP' => ""], $page_body);
				}
			} else {
				// EULA was not accpted, destroy session
				session_unset();
				session_destroy();
				$_SESSION = array();
			}
		} elseif(!empty($_POST['step']) AND $_POST['step'] == 2) {
			$page_body = mgb_template_replace([
				'TEMPLATE_STEPS' 				=> $content_install_step2,
				'LANG_EXPL_STEP2' 				=> $lang['expl_step2'],
				'LANG_DB_TITLE' 				=> $lang['db_title'],
				'LANG_DB_HOSTNAME' 				=> $lang['db_hostname'],
				'LANG_DB_DBNAME' 				=> $lang['db_dbname'],
				'LANG_DB_USERNAME' 				=> $lang['db_username'],
				'LANG_DB_PASSWORD' 				=> $lang['db_password'],
				'LANG_DB_PREFIX' 				=> $lang['db_prefix'],
				'LANG_ADMIN_TITLE' 				=> $lang['admin_title'],
				'LANG_ADMIN_NAME' 				=> $lang['admin_name'],
				'LANG_ADMIN_USERNAME' 			=> $lang['admin_username'],
				'LANG_ADMIN_PASSWORD' 			=> $lang['admin_password'],
				'LANG_ADMIN_PASSWORD_REPEAT'	=> $lang['admin_password_repeat'],
				'LANG_ADMIN_EMAIL' 				=> $lang['admin_email'],
				'LANG_ADMIN_GBEMAIL' 			=> $lang['admin_gbemail'],
				'LANG_ALLOW_TELEMETRY'			=> $lang['allow_telemetry'],
				'LANG_YES'						=> $lang['yes']
			], $page_body);

			if(!isset($_POST['sent'])) {
				$page_body = mgb_template_replace([
					'POST_DB_HOSTNAME' 				=> $_SERVER["SERVER_NAME"],
					'POST_DB_DBNAME' 				=> "",
					'POST_DB_USERNAME' 				=> "",
					'POST_DB_PASSWORD' 				=> "",
					'POST_DB_PREFIX' 				=> "mgb_",
					'POST_ADMIN_NAME' 				=> $lang['post_admin_name'],
					'POST_ADMIN_USERNAME' 			=> $lang['post_admin_username'],
					'POST_ADMIN_PASSWORD' 			=> "",
					'POST_ADMIN_PASSWORD_REPEAT' 	=> "",
					'POST_ADMIN_EMAIL' 				=> "",
					'POST_ADMIN_GBEMAIL' 			=> "noreply@".$_SERVER["SERVER_NAME"],
					'{CHECKED}'						=> "",
					'TEMPLATE_WARNINGS' 			=> "",
					'VALUE_STEP' 					=> 2,
					'VALUE_SENT'					=> 1
				], $page_body);
			} elseif(isset($_POST['sent']) AND ($_POST['sent'] == 1)) {				
				$telemetry_checked = "";
				if(empty($_POST['allow_telemetry'])) {
					$telemetry_checked = "";
				} else {
					$telemetry_checked = " checked='checked'";
				}

				$page_body = mgb_template_replace([
					'POST_DB_HOSTNAME' 				=> $_POST['db_hostname'],
					'POST_DB_DBNAME' 				=> $_POST['db_dbname'],
					'POST_DB_USERNAME' 				=> $_POST['db_username'],
					'POST_DB_PASSWORD' 				=> $_POST['db_password'],
					'POST_DB_PREFIX' 				=> $_POST['db_prefix'],
					'POST_ADMIN_NAME' 				=> $_POST['admin_name'],
					'POST_ADMIN_USERNAME' 			=> $_POST['admin_username'],
					'POST_ADMIN_EMAIL' 				=> $_POST['admin_email'],
					'POST_ADMIN_GBEMAIL' 			=> $_POST['admin_gbemail'],
					'CHECKED'						=> $telemetry_checked
				], $page_body);

				if(!empty($_POST['db_hostname']) AND !empty($_POST['db_dbname']) AND !empty($_POST['db_username']) AND !empty($_POST['db_prefix']) AND !empty($_POST['admin_name']) AND !empty($_POST['admin_username']) AND !empty($_POST['admin_password']) AND !empty($_POST['admin_password_repeat']) AND !empty($_POST['admin_email']) AND !empty($_POST['admin_gbemail'])) {
					// put Posts into Session
					$_SESSION['db_hostname'] 			= $_POST['db_hostname'];
					$_SESSION['db_dbname'] 				= $_POST['db_dbname'];
					$_SESSION['db_username'] 			= $_POST['db_username'];
					$_SESSION['db_password'] 			= $_POST['db_password'];
					$_SESSION['db_prefix'] 				= $_POST['db_prefix'];
					$_SESSION['admin_name'] 			= $_POST['admin_name'];
					$_SESSION['admin_username'] 		= $_POST['admin_username'];
					$_SESSION['admin_password'] 		= $_POST['admin_password'];
					$_SESSION['admin_password_repeat'] 	= $_POST['admin_password_repeat'];
					$_SESSION['admin_email'] 			= $_POST['admin_email'];
					$_SESSION['admin_gbemail'] 			= $_POST['admin_gbemail'];
					$_SESSION['allow_telemetry'] 		= $_POST['allow_telemetry'];

					// modify mysql error reporting
					mysqli_report(MYSQLI_REPORT_ERROR);
					
					// check connection to database
					$mysqli = new mysqli(
						$_SESSION['db_hostname'],
						$_SESSION['db_username'],
						$_SESSION['db_password'], 
						$_SESSION['db_dbname']
					);
					
					if(!$mysqli->connect_error) {
						$prefix = $mysqli->real_escape_string($_POST['db_prefix']);
						
						$sql = "SHOW TABLES LIKE '".$prefix."%'";
						$result = $mysqli->query($sql);
						$prefix_already_used = ($result && $result->num_rows > 0);

						if($prefix_already_used === FALSE) {
							if(check_mail($_POST['admin_email']) AND check_mail($_POST['admin_gbemail'])) {
								if(check_prefix($_POST['db_prefix'])) {
									if(check_username($_POST['admin_username'])) {
										if($_POST['admin_password'] === $_POST['admin_password_repeat']) {
											$page_body = mgb_template_replace([
												'TEMPLATE_WARNINGS' => $content_install_warnings,
												'ERROR' 			=> "",
												'NO_ERROR' 			=> "<span class=\"install_no_error\">-&nbsp;".$lang['no_error']."</span><br>", // everything's ok!
												'VALUE_STEP' 		=> 3,
												'VALUE_SENT' 		=> 2
											], $page_body);
										} else {
											$page_body = mgb_template_replace([
												'TEMPLATE_WARNINGS' => $content_install_warnings,
												'ERROR' 			=> "<span class=\"install_error_critical\">-&nbsp;".$lang['error_7_step2']."</span><br>", // Passwords don't match
												'NO_ERROR' 			=> "",
												'VALUE_STEP' 		=> 2,
												'VALUE_SENT' 		=> 1
										], $page_body);
										}
									} else {
										$page_body = mgb_template_replace([
											'TEMPLATE_WARNINGS' => $content_install_warnings,
											'ERROR' 			=> "<span class=\"install_error_critical\">-&nbsp;".$lang['error_6_step2']."</span><br>", // username not ok
											'NO_ERROR' 			=> "",
											'VALUE_STEP' 		=> 2,
											'VALUE_SENT' 		=> 1
										], $page_body);
									}
								} else {
									$page_body = mgb_template_replace([
										'TEMPLATE_WARNINGS' 	=> $content_install_warnings,
										'ERROR' 			=> "<span class=\"install_error_critical\">-&nbsp;".$lang['error_5_step2']."</span><br>", // prefix contains invalid characters
										'NO_ERROR' 			=> "",
										'VALUE_STEP' 		=> 2,
										'VALUE_SENT' 		=> 1
									], $page_body);
								}
							} else {
								$page_body = mgb_template_replace([
									'TEMPLATE_WARNINGS' 	=> $content_install_warnings,
									'ERROR' 			=> "<span class=\"install_error_critical\">-&nbsp;".$lang['error_2_step2']."</span><br>", // invalid emails
									'NO_ERROR' 			=> "",
									'VALUE_STEP' 		=> 2,
									'VALUE_SENT' 		=> 1
								], $page_body);
							}
						} else {
							$page_body = mgb_template_replace([
								'TEMPLATE_WARNINGS' 	=> $content_install_warnings,
								'ERROR' 			=> "<span class=\"install_error_critical\">-&nbsp;".$lang['error_4_step2']."</span><br>", // prefix already used
								'NO_ERROR' 			=> "",
								'VALUE_STEP' 		=> 2,
								'VALUE_SENT' 		=> 1
							], $page_body);
						}
					} else {
						$page_body = mgb_template_replace([
							'TEMPLATE_WARNINGS' 	=> $content_install_warnings,
							'ERROR' 			=> "<span class=\"install_error_critical\">-&nbsp;".$lang['error_3_step2']."</span><br>", // database connection could not be established
							'NO_ERROR' 			=> "",
							'VALUE_STEP' 		=> 2,
							'VALUE_SENT' 		=> 1
						], $page_body);
					}
				} else {
					$page_body = mgb_template_replace([
						'TEMPLATE_WARNINGS' 	=> $content_install_warnings,
						'ERROR' 			=> "<span class=\"install_error_critical\">-&nbsp;".$lang['error_1_step2']."</span><br>", // some fields are empty
						'NO_ERROR' 			=> "",
						'VALUE_STEP' 		=> 2,
						'VALUE_SENT' 		=> 1
					], $page_body);
				}

				$page_body = mgb_template_replace([
					'ERROR_1' => "",
					'ERROR_2' => "",
					'ERROR_3' => "",
					'ERROR_4' => "",
					'ERROR_5' => ""
				], $page_body);
			}
		} elseif(!empty($_POST['step']) AND ($_POST['step'] == 3)) {
			// generate unique install id for the ping
			define('MGB_TELEMETRY_SALT', 'mgb-telemetry-v1-2026');
			$install_id = mgb_generate_install_id(MGB_TELEMETRY_SALT);
			
			// install the guestbook
			include_once (MGB_ROOT."install/mysql.php");

			if($success == count($sql)) {
				$config_file = "<?php\n\n";
				$config_file.= "\t/*\n";
				$config_file.= "\tTHIS FILE WAS AUTOMATICALLY GENERATED BY MGB\n";
				$config_file.= "\tDO NOT MODIFY IT!\n\n";
				$config_file.= "\tDATE FILE WAS CREATED: ".date("d M Y, H:i")."\n";
				$config_file.= "\t*/\n\n";
				$config_file.= "\t// Database settings\n";
				$config_file.= "\t\$db = [\n";
				$config_file.= "\t\t'hostname' => '".$_SESSION['db_hostname']."',\n";
				$config_file.= "\t\t'dbname' => '".$_SESSION['db_dbname']."',\n";
				$config_file.= "\t\t'username' => '".$_SESSION['db_username']."',\n";
				$config_file.= "\t\t'password' => '".$_SESSION['db_password']."',\n";
				$config_file.= "\t\t'prefix' => '".$_SESSION['db_prefix']."'\n";
				$config_file.= "\t];\n\n";
				$config_file.= "\t\$mgb_installation_complete = TRUE;\n";
				$config_file.= "\t\$mgb_installation_timestamp = ".time().";\n\n";
				$config_file.= "?>";
				if(write_config(MGB_ROOT.'includes/config.inc.php', $config_file) === TRUE) {
					$success++;
				} else {
					echo "<span class='install_error_critical'>ERROR: Config could not be written!</span><br><br>";
				}
			}

			$to = count($sql) + 1;

			if($success == $to) {
				$lang = $lang_install;
				$page_body = mgb_template_replace([
					'TEMPLATE_STEPS' 			=> $content_install_step3,
					'LANG_EXPL_STEP3' 			=> $lang['expl_step3'], 
					'LANG_TO_ADMINISTRATION'	=> $lang['to_administration'], 
					'LANG_TO_GUESTBOOK' 		=> $lang['to_guestbook']
				], $page_body);

				// do a complete backup of fresh install
				require_once ("../includes/functions.inc.php");

				sleep(1); // wait one second

				// do a full backup
				mgb_backup_database($mysqli, $_SESSION['db_prefix'], MGB_VERSION, $_SESSION['db_hostname'], $_SESSION['db_dbname'], 1);
			}

			// destroy session
			session_unset();
			session_destroy();
			$_SESSION = array();
		} else {
			// something went wrong
			$page_body = mgb_template_replace([
				'TEMPLATE_STEPS' 		=> $content_install_step3_fail,
				'LANG_EXPL_STEP3_FAIL'	=> $lang['expl_step3_fail'],
				'LANG_TO_INSTALL' 		=> $lang['to_install']
			], $page_body);

			// destroy session
			session_unset();
			session_destroy();
			$_SESSION = array();
		}
	}

	if(!isset($_SESSION['install_language'])) {
		// choose language for installation
		$path = MGB_ROOT.'language/';
		foreach (glob($path."*") as $filename) {
			if($filename != "." && $filename != "..") {
				if(is_dir($filename)) {
					if(!isset($install_option_language)) { $install_option_language = ""; }
					include ($filename."/settings.php");
					$install_option_language .= "<option ";
					if(basename($filename) == "lang_german_utf8") {
						$install_option_language .= "selected ";
					}
					$filename = str_replace(MGB_ROOT."language/", '', $filename);
					$install_option_language .= "value=\"".$filename."\">".$language."</option>";
				}
			}
		}

		$language_short = "en";
		$lang['h_title'] = "Welcome to the installation of MGB OpenSource Guestbook ".MGB_VERSION;
		$charset = "utf-8";
		$lang['title'] = "Installation of MGB OpenSource Guestbook ".MGB_VERSION;
		$lang['next_step'] = "&raquo; Next step &raquo;";

		$page_body = mgb_template_replace([
			'TEMPLATE_STEPS' 			=> $content_install_choose_language,
			'INSTALL_OPTION_LANGUAGE' 	=> $install_option_language
		], $page_body);
	}

	$page_header = mgb_template_replace([
		'H_LANGUAGE_SHORT' 	=> $language_short,
		'H_INSTALL_TITLE' 	=> $lang['h_title'],
		'H_CHARSET' 		=> $charset
	], $page_header);

	$page_body = mgb_template_replace([
		'TEMPLATE_HEADER' 		=> $page_header,
		'TITLE' 				=> $lang['title'],
		'INSTALL_FORM_ACTION' 	=> "install.php".$sid,
		'LANG_NEXT_STEP' 		=> $lang['next_step'],
		'TEMPLATE_COPYRIGHT' 	=> $content_install_copyright,
		'TEMPLATE_FOOTER' 		=> $content_install_footer,
		'COPYRIGHT_DATE' 		=> date("Y"),
		'MGB_VERSION' 			=> MGB_VERSION
	], $page_body);

	echo $page_body;
?>
