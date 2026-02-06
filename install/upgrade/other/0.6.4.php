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

	=======
	064.php
	=======
	*/

	if(file_exists("../functions.inc.php")) {
		if(unlink("../functions.inc.php")) {
			echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">- deleting old ''functions.inc.php'' from root directory...</span>\n
				\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: green;\">&nbsp;OK!<br /></span>\n";
			$success++;
			$count++;
		} else {
			echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">- deleting old ''functions.inc.php'' from root directory...</span>\n
				\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: red;\">ERROR!<br /></span>\n";
			$count++;
		}
	}

	if(file_exists("../load_templates.inc.php")) {
		if(unlink("../load_templates.inc.php")) {
			echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">- deleting old ''load_templates.inc.php'' from root directory...</span>\n
				\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: green;\">&nbsp;OK!<br /></span>\n";
			$success++;
			$count++;
		} else {
			echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">- deleting old ''load_templates.inc.php'' from root directory...</span>\n
				\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: red;\">ERROR!<br /></span>\n";
			$count++;
		}
	}

	if(file_exists("../load_settings.inc.php")) {
		if(unlink("../load_settings.inc.php")) {
			echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">- deleting old ''load_settings.inc.php'' from root directory...</span>\n
				\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: green;\">&nbsp;OK!<br /></span>\n";
			$success++;
			$count++;
		} else {
			echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">- deleting old ''load_settings.inc.php'' from root directory...</span>\n
				\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: red;\">ERROR!<br /></span>\n";
			$count++;
		}
	}

	if(file_exists("../captcha.php")) {
		if(unlink("../captcha.php")) {
			echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">- deleting old ''captcha.php'' from root directory...</span>\n
				\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: green;\">&nbsp;OK!<br /></span>\n";
			$success++;
			$count++;
		} else {
			echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">- deleting old ''captcha.php'' from root directory...</span>\n
				\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: red;\">ERROR!<br /></span>\n";
			$count++;
		}
	}

	if(file_exists("../akoom.ttf")) {
		if(unlink("../akoom.ttf")) {
			echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">- deleting old ''akoom.ttf'' from root directory...</span>\n
				\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: green;\">&nbsp;OK!<br /></span>\n";
			$success++;
			$count++;
		} else {
			echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">- deleting old ''akoom.ttf'' from root directory...</span>\n
				\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: red;\">ERROR!<br /></span>\n";
			$count++;
		}
	}

	if(file_exists("../config.inc.php")) {
		if(rename("../config.inc.php", "../config.inc.bak")) {
			echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">- renaming old ''config.inc.php'' to ''config.inc.bak''...</span>\n
				\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: green;\">&nbsp;OK!<br /></span>\n";
			$success++;
			$count++;
		} else {
			echo "\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold;\">- renaming old ''config.inc.php'' to ''config.inc.bak''...</span>\n
				\t\t<span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; font-weight: bold; color: red;\">ERROR!<br /></span>\n";
			$count++;
		}
	}
?>
