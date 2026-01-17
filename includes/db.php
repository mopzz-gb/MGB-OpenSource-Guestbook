<?php
	/*
	MGB 0.7.x - OpenSource PHP and MySql Guestbook
	Copyright (C) 2004 - 2011 Juergen Grueneisl - http://www.m-gb.org/

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

	=====================
	load_settings.inc.php
	=====================
	*/

	// connect with database

	$mysqli = new mysqli(
		$db['hostname'],
		$db['username'],
		$db['password'],
		$db['dbname']
	);

	if ($mysqli->connect_errno) {
		die("<span style='font-family: verdana, arial, helvetica, sans-serif; font-size:12px;color:darkblue;'>Unable to connect to database
			<br><b>SQL:</b> ".$sql."<br><b>ERROR:</b> ".$mysqli->errno." : ".$mysqli->error."</span>");
	} else {
		$server_version = $mysqli->server_info;
	}

	$mysqli->set_charset('utf8mb4');
?>