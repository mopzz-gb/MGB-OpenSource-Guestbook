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
	*/

	// If your template uses different styles you have to set the default style
	// here. This is necessary to let the guestbook know which style to load if
	// the active template is changed. Just put in the EXACT name of the folder
	// of your default style. Don't forget to set a default iconset for your
	// template. If your template don't uses its own icons, you can use the icons
	// of the mgb-default theme "mgbModern".

	// template information
	$template = array();

	$template['name'] = "mgbModern by mopzz";
	$template['version'] = "0.7";
	$template['author'] = "J&uuml;rgen Gr&uuml;neisl";
	$template['default_style'] = "blue";
	$template['default_iconset'] = "default";
	$template['doctype'] = "html4";
?>
