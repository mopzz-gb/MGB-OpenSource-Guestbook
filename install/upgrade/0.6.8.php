<?php
	/*
	MGB 0.6.x - OpenSource PHP and MySql Guestbook
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
	068.php
	=======
	*/
	
	return [
		'version'		=>	'0.6.8',
		'description'	=>	'Added possibility to manage emoticons in the admin menu',
		'sql'			=>	[
			
			function(mysqli $mysqli, array $db) {
					return "CREATE TABLE ".$db['prefix']."smilies (
						`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
						`path` VARCHAR( 255 ) NOT NULL ,
						`replacement` VARCHAR( 255 ) NOT NULL ,
						`height` TINYINT( 4 ) NOT NULL ,
						`width` TINYINT( 4 ) NOT NULL
						);";
			},			
			
			function(mysqli $mysqli, array $db) {		
					return "ALTER TABLE `".$db['prefix']."user` ADD `r_edit_smilies` TINYINT( 1 ) NOT NULL AFTER `r_spam`";
			}
		]
	];
?>

