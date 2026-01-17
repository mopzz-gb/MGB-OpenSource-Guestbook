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

	==========================
	lang_install.php - English
	==========================

	This languagefile was translated by Christian Rech alias HeyJ (mail@heyj.de)
	and edited by Jürgen Schäfer ==> juergen.schaefer(at)minetoshsoft.com
	*/

	// header
	$lang['h_title'] = "Welcome to the installation of MGB {MGB_VERSION}";

	// general
	$lang['next_step'] = "&raquo; Next &raquo;";
	$lang['cancel'] = "Cancel";
	$lang['yes'] = "Yes";
	$lang['no'] = "No";
	$lang['active'] = "Active";
	$lang['inactive'] = "Inactive";

	// installation
	$lang['title'] = "Installation of MGB {MGB_VERSION}";

	$lang['eula_expl'] = "The MGB OpenSource guest book is distributed under the GNU/GPL license for free software (GPLv2). If you want to use the guest book, regardless of purpose, you have to agree to this license. Please read it carefully.";
	$lang['eula_agree'] = "I agree with the conditions of the GNU/GPL.";
	$lang['eula_disagree'] = "I do <strong>not</strong> agree with the conditions of the GNU/GPL.";

	$lang['thanks'] = "Thank you for agreeing with the GNU/GPL and that you chose the MGB OpenSource guest book.";

	$lang['expl_step1'] = "Here some important information – necessary for the installation – are shown. You can see by the icons if you can install MGB on your server.";

	$lang['expl_step2'] = "Please provide the login data for your database and for the administrator account, which has to be created.";
	$lang['expl_step3'] = "Congratulations! The MGB ".MGB_VERSION." has been successfully installed on your server. Please delete the folder ''install'' for your own security. Alternatively, you can just rename it.<br><br>You can now go to the administration. We recommend changing the username if you chose the standard name ''admin''.<br><br>Have a lot of fun with your new guest book!";
	$lang['expl_step3_fail'] = "An error occurred. Please restart the installation from the beginning and check your connection data again.<br><br>If installation fails again, you can find help here:<br><a href='http://forum.m-gb.org/' target='_blank'>Forum of MGB OpenSource Guestbook</a>";

	// step 1
	$lang['srvcfg_server'] = "Server:";
	$lang['srvcfg_phpversion'] = "PHP Version:";
	$lang['srvcfg_mysqlversion'] = "MySQL Version:";
	$lang['srvcfg_mysqliversion'] = "MySQLi-extension:";
	$lang['srvcfg_gd'] = "GD Library:";
	$lang['srvcfg_writable'] = "Config. writeable:";
	$lang['srvcfg_reg_globals'] = "register_globals:";
	$lang['srvcfg_writable'] = "Write access:";

	// errormessages step 1
	$lang['error_1'] = "Your PHP version is outdated. MGB demands a newer version. We recommend an update.";
	$lang['error_2'] = "Your MySQL version is outdated. MGB demands a newer version. We recommend an update.";
	$lang['error_3'] = "The GD library is not available. The guest book will work, but without security code.";
	$lang['error_4'] = "Please make sure the folders 'includes', 'cache' and 'save' are writable.";
	$lang['error_5'] = "register_globals is activated. This implies a security risk. It should be deactivated.";
	$lang['error_6'] = "The PHP extension 'mysqli' is missing or deactivated.";
	$lang['no_error'] = "All values are OK! Please click on ''Next''";

	// step 2
	$lang['db_title'] = "Database information:";
	$lang['db_hostname'] = "Host:";
	$lang['db_dbname'] = "Database name:";
	$lang['db_username'] = "Username:";
	$lang['db_password'] = "Password:";
	$lang['db_prefix'] = "Table prefix:";

	$lang['admin_title'] = "Administrator account:";
	$lang['admin_name'] = "Name:";
	$lang['admin_username'] = "Username:";
	$lang['admin_password'] = "Password:";
	$lang['admin_email'] = "Email:";
	$lang['admin_gbemail'] = "Guestbook email:";

	$lang['post_admin_name'] = "Webmaster";
	$lang['post_admin_username'] = "Admin";

	// errormessages step 2
	$lang['error_1_step2'] = "Please fill in all fields!";
	$lang['error_2_step2'] = "At least one of the two email addresses is invalid.";
	$lang['error_3_step2'] = "The connection to the database could not be established. Please check the database information.";
	$lang['error_4_step2'] = "The database already contains a previous installation using this prefix. Please choose another prefix.";
	$lang['error_5_step2'] = "The prefix you have chosen contains special characters which are not allowed. Please try another prefix. Allowed characters: - and _";
	$lang['error_6_step2'] = "The chosen user-name contains special characters and is, therefore, invalid. Allowed are only lower cases, capital letters and numbers.";

	$lang['to_administration'] = "To the administration";
	$lang['import'] = "Import entries from an older version (0.5.x or older ONLY)";
	$lang['to_guestbook'] = "To the guestbook";
	$lang['to_install'] = "Try again";
?>
