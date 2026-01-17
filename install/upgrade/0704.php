<?php
	/*
	MGB 0.6.x - OpenSource PHP and MySql Guestbook
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
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA	02110-1301, USA.

	========
	0704.php
	========
	*/

	$sql = array();

	// 0.7.0.4
	
	// search for duplicate entries and delete them
	$result = "SELECT banned_email, COUNT(*) AS cnt FROM ".$db['prefix']."banlist_emails GROUP BY banned_email HAVING cnt > 1;";
	while ($row = mysqli_fetch_assoc($result)) {
		$duplicates[] = [
			'email' => $row['banned_email'],
			'count' => (int)$row['cnt']
		];
	}
	
	for($i = 0; $i < count($duplicates['email']); $i++) {
		$sql[$i] = "DELETE FROM `".$db['prefix']."banlist_emails` WHERE banned_email=".$duplicate[$i]['email']." LIMIT 1",
	}
	
	// add columns for anonymous usage statistics
	$sql[2] = "ALTER TABLE `".$db['prefix']."settings` ADD `allow_aus` INT(1) DEFAULT NULL AFTER `version`;";
	$sql[2] = "ALTER TABLE `".$db['prefix']."settings` ADD `aus_ping_address` VARCHAR(255) NOT NULL DEFAULT 'https://www.m-gb.org/telemetry/ping.php' AFTER `allow_aus`;"; 
	

	if(isset($_POST['update_version']) AND $_POST['update_version'] == 1) {
		$sql[3] = "UPDATE `".$db['prefix']."settings` SET `version` = '".MGB_VERSION."'";
		$sqldescription[3] = "- Updating version number...";
	}
?>
