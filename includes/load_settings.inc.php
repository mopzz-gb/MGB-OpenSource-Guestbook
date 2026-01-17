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

	// load settings from database
	$sql = "SELECT * FROM ".$db['prefix']."settings";
	$result = mgb_sql_connect($mysqli, $sql, "Error while loading settings from database.", 1);
	$settings = $result->fetch_assoc();

	$settings['sendmail_admin_text'] = xhtmlbr2nl($settings['sendmail_admin_text']);
	$settings['sendmail_user_text'] = xhtmlbr2nl($settings['sendmail_user_text']);
	$settings['sendmail_user_text_moderated'] = xhtmlbr2nl($settings['sendmail_user_text_moderated']);
	$settings['sendmail_user_notification_text'] = xhtmlbr2nl($settings['sendmail_user_notification_text']);
	$settings['sendmail_comment_text'] = xhtmlbr2nl($settings['sendmail_comment_text']);
	$settings['sendmail_contactmail_text'] = xhtmlbr2nl($settings['sendmail_contactmail_text']);
	$settings['sendmail_contactmail_text_copy'] = xhtmlbr2nl($settings['sendmail_contactmail_text_copy']);
?>
