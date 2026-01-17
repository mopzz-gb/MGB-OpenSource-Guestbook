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

	======================
	load_templates.inc.php
	======================
	*/

	// define templates (install.php)
	$template_install_header = "template/install_header.tpl";
	$template_install_body = "template/install_body.tpl";
	$template_install_choose_language = "template/install_choose_language.tpl";
	$template_install_eula = "template/install_eula.tpl";
	$template_install_step1 = "template/install_step1.tpl";
	$template_install_step2 = "template/install_step2.tpl";
	$template_install_step3 = "template/install_step3.tpl";
	$template_install_step3_fail = "template/install_step3_fail.tpl";
	$template_install_warnings = "template/install_warnings.tpl";
	$template_install_errormessage = "template/install_errormessage.tpl";
	$template_install_copyright = "template/install_copyright.tpl";
	$template_install_footer = "template/install_footer.tpl";

	// get content of templates (install.php)
	if(file_exists($template_install_header)) { $content_install_header = file_get_contents($template_install_header); } else { echo "(404) Missing file: ".$template_install_header." - Incomplete Template running!<br>"; }
	if(file_exists($template_install_body)) { $content_install_body = file_get_contents($template_install_body); } else { echo "(404) Missing file: ".$template_install_body." - Incomplete Template running!<br>"; }
	if(file_exists($template_install_choose_language)) { $content_install_choose_language = file_get_contents($template_install_choose_language); } else { echo "(404) Missing file: ".$template_install_choose_language." - Incomplete Template running!<br>"; }
	if(file_exists($template_install_eula)) { $content_install_eula = file_get_contents($template_install_eula); } else { echo "(404) Missing file: ".$template_install_eula." - Incomplete Template running!<br>"; }
	if(file_exists($template_install_step1)) { $content_install_step1 = file_get_contents($template_install_step1); } else { echo "(404) Missing file: ".$template_install_step1." - Incomplete Template running!<br>"; }
	if(file_exists($template_install_step2)) { $content_install_step2 = file_get_contents($template_install_step2); } else { echo "(404) Missing file: ".$template_install_step2." - Incomplete Template running!<br>"; }
	if(file_exists($template_install_step3)) { $content_install_step3 = file_get_contents($template_install_step3); } else { echo "(404) Missing file: ".$template_install_step3." - Incomplete Template running!<br>"; }
	if(file_exists($template_install_step3_fail)) { $content_install_step3_fail = file_get_contents($template_install_step3_fail); } else { echo "(404) Missing file: ".$template_install_step3_fail." - Incomplete Template running!<br>"; }
	if(file_exists($template_install_warnings)) { $content_install_warnings = file_get_contents($template_install_warnings); } else { echo "(404) Missing file: ".$template_install_warnings." - Incomplete Template running!<br>"; }
	if(file_exists($template_install_errormessage)) { $content_install_errormessage = file_get_contents($template_install_errormessage); } else { echo "(404) Missing file: ".$template_install_errormessage." - Incomplete Template running!<br>"; }
	if(file_exists($template_install_copyright)) { $content_install_copyright = file_get_contents($template_install_copyright); } else { echo "(404) Missing file: ".$template_install_copyright." - Incomplete Template running!<br>"; }
	if(file_exists($template_install_footer)) { $content_install_footer = file_get_contents($template_install_footer); } else { echo "(404) Missing file: ".$template_install_footer." - Incomplete Template running!<br>"; }

?>
