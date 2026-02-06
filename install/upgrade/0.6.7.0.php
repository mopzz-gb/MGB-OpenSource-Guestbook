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
	067.php
	=======
	*/
	
	return [
		'version'		=>	'0.6.7',
		'description'	=>	'Added time lock',
		'sql'			=>	[

			function(mysqli $mysqli, array $db) {			
					return "ALTER TABLE `".$db['prefix']."settings`
						ADD `time_lock` INT( 1 ) NOT NULL AFTER `captcha_method`,
						ADD `time_lock_value` INT( 3 ) DEFAULT '30' NOT NULL AFTER `time_lock`,
						ADD `time_lock_maxtime` INT DEFAULT '300' NOT NULL AFTER `time_lock_value`;";
			}			
		]
	];
?>
