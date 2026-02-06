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
	069.php
	=======
	*/
	
	return [
		'version'		=>	'0.6.9',
		'description'	=>	'Added additional Gravatar settings, More emoticons',
		'sql'			=>	[

			function(mysqli $mysqli, array $db) {			
					return "ALTER TABLE `".$db['prefix']."settings`
						ADD `gravatar_type` TINYINT( 1 ) NOT NULL DEFAULT '1' AFTER `gravatar_rating`,
						ADD `gravatar_size` INT( 3 ) NOT NULL DEFAULT '50' AFTER `gravatar_type`,
						ADD `gravatar_position` TINYINT( 1 ) NOT NULL DEFAULT '1' AFTER `gravatar_size`;";
			},
			
			function(mysqli $mysqli, array $db) {			
					return "ALTER TABLE `".$db['prefix']."settings`
						ADD `entries_order` VARCHAR( 11 ) NOT NULL DEFAULT 'ID' AFTER `entries_per_page`,
						ADD `entries_order_asc_desc` VARCHAR( 4 ) NOT NULL DEFAULT 'DESC' AFTER `entries_order`,
						ADD `entries_numbering` TINYINT( 1 ) NOT NULL DEFAULT '1' AFTER `entries_order_asc_desc`;";
			},
			
			function(mysqli $mysqli, array $db) {			
					return "ALTER TABLE `".$db['prefix']."settings`
						ADD `smileys_break` INT( 2 ) NOT NULL DEFAULT '11' AFTER `smileys`,
						ADD `smileys_order` VARCHAR( 4 ) NOT NULL DEFAULT 'ASC' AFTER `smileys_break`,
						ADD `password_min_length` TINYINT( 2 ) NOT NULL DEFAULT '8' AFTER `session_timeout`;";
			}			
		]
	];
?>
