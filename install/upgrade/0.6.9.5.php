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
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA	02110-1301, USA.

	========
	0695.php
	========
	*/	
	
	return [
		'version'		=>	'0.6.9.5',
		'description'	=>	'Possibility to set E-Mail to unnecessary, new E-Mail Texts',
		'sql'			=>	[

			function(mysqli $mysqli, array $db) {			
					return "ALTER TABLE `".$db['prefix']."settings`
						ADD `require_email` TINYINT ( 1 ) NOT NULL DEFAULT '1' AFTER `moderated`,
						ADD `sendmail_user_text_moderated` MEDIUMTEXT NOT NULL AFTER `sendmail_user_text`,
						ADD `sendmail_contactmail_text_copy` MEDIUMTEXT NOT NULL AFTER `sendmail_contactmail_text`";
			},
			
			function(mysqli $mysqli, array $db) {			
					return "ALTER TABLE `".$db['prefix']."user` ADD `user_ip` VARBINARY( 40 ) NOT NULL AFTER `user_key`";
			}
		]
	];
?>
