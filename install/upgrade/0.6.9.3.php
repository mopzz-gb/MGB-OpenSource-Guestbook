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
	0693.php
	=======
	*/
	
	return [
		'version'		=>	'0.6.9.3',
		'description'	=>	'Added more user rights, referer check, stopforumspam',
		'sql'			=>	[

			function(mysqli $mysqli, array $db) {			
					return "ALTER TABLE `".$db['prefix']."settings`
						ADD `allow_img_tag` TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER `bbcode`,
						ADD `max_img_width` INT( 4 ) NOT NULL DEFAULT '400' AFTER `allow_img_tag`,
						ADD `max_img_height` INT( 4 ) NOT NULL DEFAULT '400' AFTER `max_img_width`,
						ADD `center_img` TINYINT( 1 ) NOT NULL DEFAULT '1' AFTER `max_img_height`;";
			},
			
			function(mysqli $mysqli, array $db) {			
					return "ALTER TABLE `".$db['prefix']."settings`
						ADD `allow_flash_tag` TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER `center_img`,
						ADD `max_flash_width` INT( 4 ) NOT NULL DEFAULT '400' AFTER `allow_flash_tag`,
						ADD `max_flash_height` INT( 4 ) NOT NULL DEFAULT '400' AFTER `max_flash_width`,
						ADD `center_flash` TINYINT( 1 ) NOT NULL DEFAULT '1' AFTER `max_flash_height`;";
			},
			
			function(mysqli $mysqli, array $db) {			
					return "ALTER TABLE `".$db['prefix']."settings`
						ADD `captcha_coords_x` INT( 3 ) NOT NULL DEFAULT '20' AFTER `captcha_method`,
						ADD `captcha_coords_y` INT( 3 ) NOT NULL DEFAULT '25' AFTER `captcha_coords_x`,
						ADD `captcha_color` VARCHAR( 6 ) NOT NULL DEFAULT '505050' AFTER `captcha_coords_y`,
						ADD `captcha_angle_1` INT( 4 ) NOT NULL DEFAULT '-10' AFTER `captcha_color`,
						ADD `captcha_angle_2` INT( 4 ) NOT NULL DEFAULT '5' AFTER `captcha_angle_1`;";
			}
		]
	];
?>
