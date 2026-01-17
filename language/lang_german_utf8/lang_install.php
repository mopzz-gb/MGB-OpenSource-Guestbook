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

	=========================
	lang_install.php - German
	=========================
	*/

	// initiate array $lang
	$lang = array();

	// header
	$lang['h_title'] = "Willkommen zur Installation des MGB {MGB_VERSION}";

	// general
	$lang['next_step'] = "&raquo; Weiter &raquo;";
	$lang['cancel'] = "Abbruch";
	$lang['yes'] = "Ja";
	$lang['no'] = "Nein";
	$lang['active'] = "Aktiv";
	$lang['inactive'] = "Inaktiv";

	// installation
	$lang['title'] = "Installation des MGB {MGB_VERSION}";

	$lang['eula_expl'] = "Das MGB OpenSource G&auml;stebuch wird unter der GNU/GPL Lizenz f&uuml;r freie Software (GPLv2) vertrieben. Wenn Du das G&auml;stebuch nutzen willst, egal zu welchem Zweck, musst Du dich damit einverstanden erkl&auml;ren. Lese die Lizenz bitte sorgf&auml;ltig durch.";
	$lang['eula_agree'] = "Ich bin mit den Bedingungen der GNU/GPL einverstanden.";
	$lang['eula_disagree'] = "Ich bin mit den Bedingungen der GNU/GPL <b>nicht</b> einverstanden.";

	$lang['thanks'] = "Danke dass Du der GNU/GPL zugestimmt, und dich f&uuml;r das MGB OpenSource G&auml;stebuch entschieden hast.";
	$lang['expl_step1'] = "Hier werden einige wichtige Informationen angezeigt, die f&uuml;r die Installation notwendig sind. Du kannst anhand der Symbole sofort sehen, ob sich das MGB auf Deinem Server installieren l&auml;&szlig;t.";
	$lang['expl_step2'] = "Bitte gib nun die Zugangsdaten f&uuml;r Deine Datenbank, sowie f&uuml;r das anzulegende Administratorkonto an.";
	$lang['expl_step3'] = "Herzlichen Gl&uuml;ckwunsch! Das MGB ".MGB_VERSION." wurde erfolgreich auf Deinem Server installiert. Bitte l&ouml;sche jetzt zu Deiner eigenen Sicherheit das Verzeichnis ''install''. Alternativ dazu kannst Du es auch umbenennen.<br><br>Du kannst dich nun in die Administration einloggen. Es wird empfohlen Deinen Benutzernamen umzubenennen, falls Du den Standardnamen ''admin'' benutzt hast.<br><br>Viel Spa&szlig; mit Deinem neuen G&auml;stebuch! :)";
	$lang['expl_step3_fail'] = "Ein Fehler ist aufgetreten. Bitte starte die Installation von vorne, und &uuml;berpr&uuml;fe Deine angegebenen Daten noch einmal.<br><br>Sollte die Installation erneut fehlschlagen, findest Du hier Hilfe:<br><a href='http://forum.m-gb.org/' target='_blank'>Forum des MGB OpenSource G&auml;stebuches</a>";

	// step 1
	$lang['srvcfg_server'] = "Server:";
	$lang['srvcfg_phpversion'] = "PHP Version:";
	$lang['srvcfg_mysqlversion'] = "MySQL Version:";
	$lang['srvcfg_mysqliversion'] = "MySQLi-Erweiterung:";
	$lang['srvcfg_gd'] = "GD Bibliothek:";
	$lang['srvcfg_writable'] = "Schreibrechte:";
	$lang['srvcfg_reg_globals'] = "register_globals:";

	// errormessages step 1
	$lang['error_1'] = "Deine PHP Version ist &auml;lter als die erforderliche. Eine Aktualisierung wird empfohlen.<br><br><b>Setze die Variable ''".chr(36)."ignore_warnings'' in Zeile 61 der install.php auf '1', um trotz der Warnung fortzufahren.</b>";
	$lang['error_2'] = "Deine MySQL Version ist &auml;lter als die erforderliche. Eine Aktualisierung wird empfohlen.<br><br><b>Setze die Variable ''".chr(36)."ignore_warnings'' in Zeile 61 der install.php auf '1', um trotz der Warnung fortzufahren.</b>";
	$lang['error_3'] = "Die GD Bibliothek ist nicht verf&uuml;gbar. Das G&auml;stebuch kann betrieben werden, jedoch ohne Sicherheitsabfrage.";
	$lang['error_4'] = "Stelle bitte sicher, dass die Ordner 'includes', 'cache' und 'save' schreibbar sind.";
	$lang['error_5'] = "register_globals ist aktiviert. Dies birgt ein Sicherheitsrisiko. Es sollte deaktiviert werden.";
	$lang['error_6'] = "Die PHP Erweiterung mysqli ist nicht vorhanden oder deaktiviert.";
	$lang['error_7'] = "Deine MySQL Version kann leider nicht ermittelt werden. L&auml;uft dein MySQL-Server?";
	$lang['no_error'] = "Alle Werte sind OK! Klicke bitte auf ''Weiter''";

	// step 2
	$lang['db_title'] = "Datenbankinformationen:";
	$lang['db_hostname'] = "Host:";
	$lang['db_dbname'] = "Datenbankname:";
	$lang['db_username'] = "Benutzername:";
	$lang['db_password'] = "Passwort:";
	$lang['db_prefix'] = "Tabellenpr&auml;fix:";

	$lang['admin_title'] = "Administratorkonto:";
	$lang['admin_name'] = "Name:";
	$lang['admin_username'] = "Benutzername:";
	$lang['admin_password'] = "Passwort:";
	$lang['admin_email'] = "eMail:";
	$lang['admin_gbemail'] = "G&auml;stebuch eMail:";

	$lang['post_admin_name'] = "Webmaster";
	$lang['post_admin_username'] = "admin";

	// errormessages step 2
	$lang['error_1_step2'] = "Bitte f&uuml;lle alle Felder aus!";
	$lang['error_2_step2'] = "Mindestens eine der beiden eMail Adressen ist ung&uuml;ltig.";
	$lang['error_3_step2'] = "Die Verbindung zur Datenbank ist fehlgeschlagen, &uuml;berpr&uuml;fe Deine Zugangsdaten.";
	$lang['error_4_step2'] = "Es befindet sich bereits eine Installation mit dem angegebenen Pr&auml;fix in der Datenbank. Bitte w&auml;hle einen anderen Pr&auml;fix.";
	$lang['error_5_step2'] = "Der angegebene Pr&auml;fix enth&auml;lt Sonderzeichen und ist somit ung&uuml;ltig. Erlaubt ist nur ein Unterstrich (_).";
	$lang['error_6_step2'] = "Der angegebene Benutzername enth&auml;lt Sonderzeichen und ist somit ung&uuml;ltig. Erlaubt sind lediglich Klein- und Gro&szlig;buchstaben, sowie Zahlen.";

	$lang['to_administration'] = "Zur Administration";
	$lang['to_guestbook'] = "Zum G&auml;stebuch";
	$lang['to_install'] = "Erneute Installation versuchen";
?>
