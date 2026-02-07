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

	=========================
	lang_install.php - German
	=========================
	*/

	// header
	$lang = [
		'h_title' 	=> "Willkommen zur Installation des MGB {MGB_VERSION}",

	// general
		'next_step' => "&raquo; Weiter &raquo;",
		'cancel' 	=> "Abbruch",
		'yes'		=> "Ja",
		'no' 		=> "Nein",
		'active'	=> "Aktiv",
		'inactive'	=> "Inaktiv",

	// installation
		'title' 			=> "Installation des MGB {MGB_VERSION}",

		'eula_expl' 		=> "Das MGB OpenSource Gästebuch wird unter der GNU/GPL Lizenz für freie Software (GPLv2) vertrieben. Wenn Du das Gästebuch nutzen willst, egal zu welchem Zweck, musst Du dich damit einverstanden erklären. Lese die Lizenz bitte sorgfältig durch.",
		'eula_agree' 		=> "Ich bin mit den Bedingungen der GNU/GPL einverstanden.",
		'eula_disagree' 	=> "Ich bin mit den Bedingungen der GNU/GPL <b>nicht</b> einverstanden.",

		'thanks' 			=> "Danke dass Du der GNU/GPL zugestimmt, und dich für das MGB OpenSource Gästebuch entschieden hast.",
		'expl_step1' 		=> "Hier werden einige wichtige Informationen angezeigt, die für die Installation notwendig sind. Du kannst anhand der Symbole sofort sehen, ob sich das MGB auf Deinem Server installieren läßt.",
		'expl_step2' 		=> "Bitte gib nun die Zugangsdaten für Deine Datenbank, sowie für das anzulegende Administratorkonto an.",
		'expl_step3' 		=> "Herzlichen Glückwunsch! Das MGB ".MGB_VERSION." wurde erfolgreich auf Deinem Server installiert. Bitte lösche jetzt zu Deiner eigenen Sicherheit das Verzeichnis ''install''. Alternativ dazu kannst Du es auch umbenennen.<br><br>Du kannst dich nun in die Administration einloggen. Es wird empfohlen Deinen Benutzernamen umzubenennen, falls Du den Standardnamen ''admin'' benutzt hast.<br><br>Viel Spaß mit Deinem neuen Gästebuch! :)",
		'expl_step3_fail' 	=> "Ein Fehler ist aufgetreten. Bitte starte die Installation von vorne, und überprüfe Deine angegebenen Daten noch einmal.<br><br>Sollte die Installation erneut fehlschlagen, findest Du hier Hilfe:<br><a href='http://forum.m-gb.org/' target='_blank'>Forum des MGB OpenSource Gästebuches</a>",

	// step 1
		'srvcfg_server' 		=> "Server:",
		'srvcfg_phpversion' 	=> "PHP Version:",
		'srvcfg_mysqlversion' 	=> "MySQL Version:",
		'srvcfg_mysqliversion' 	=> "MySQLi-Erweiterung:",
		'srvcfg_gd' 			=> "GD Bibliothek:",
		'srvcfg_writable' 		=> "Schreibrechte:",
		'srvcfg_reg_globals' 	=> "register_globals:",

	// errormessages step 1
		'error_1' 	=> "Deine PHP Version ist älter als die erforderliche. Eine Aktualisierung wird empfohlen.<br><br><b>Setze die Variable ''".chr(36)."ignore_warnings'' in Zeile 61 der install.php auf '1', um trotz der Warnung fortzufahren.</b>",
		'error_2' 	=> "Deine MySQL Version ist älter als die erforderliche. Eine Aktualisierung wird empfohlen.<br><br><b>Setze die Variable ''".chr(36)."ignore_warnings'' in Zeile 61 der install.php auf '1', um trotz der Warnung fortzufahren.</b>",
		'error_3' 	=> "Die GD Bibliothek ist nicht verfügbar. Das Gästebuch kann betrieben werden, jedoch ohne Sicherheitsabfrage.",
		'error_4'	=> "Stelle bitte sicher, dass die Ordner 'includes', 'cache' und 'save' schreibbar sind.",
		'error_5' 	=> "register_globals ist aktiviert. Dies birgt ein Sicherheitsrisiko. Es sollte deaktiviert werden.",
		'error_6' 	=> "Die PHP Erweiterung mysqli ist nicht vorhanden oder deaktiviert.",
		'error_7' 	=> "Deine MySQL Version kann leider nicht ermittelt werden. Läuft dein MySQL-Server?",
		'no_error' 	=> "Alle Werte sind OK! Klicke bitte auf ''Weiter''",

	// step 2
		'db_title' 		=> "Datenbankinformationen:",
		'db_hostname' 	=> "Host:",
		'db_dbname' 	=> "Datenbankname:",
		'db_username' 	=> "Benutzername:",
		'db_password' 	=> "Passwort:",
		'db_prefix' 	=> "Tabellenpräfix:",

		'admin_title' 			=> "Administratorkonto:",
		'admin_name' 			=> "Name:",
		'admin_username' 		=> "Benutzername:",
		'admin_password' 		=> "Passwort:",
		'admin_password_repeat' => "Passwort wiederholen:",
		'admin_email' 			=> "eMail:",
		'admin_gbemail' 		=> "Gästebuch eMail:",
		
		'allow_telemetry' 		=> "Anonyme Nutzungsdaten<br>erlauben.<br><br>Erfasst wird:<br><br>- MGB Version<br>- PHP Version<br>- SQL Version<br>- Anonyme Install ID<br>- Aktivitätsping",

		'post_admin_name' 		=> "Webmaster",
		'post_admin_username' 	=> "admin",

	// errormessages step 2
		'error_1_step2' => "Bitte fülle alle Felder aus!",
		'error_2_step2' => "Mindestens eine der beiden eMail Adressen ist ungültig.",
		'error_3_step2' => "Die Verbindung zur Datenbank ist fehlgeschlagen, überprüfe Deine Zugangsdaten.",
		'error_4_step2' => "Es befindet sich bereits eine Installation mit dem angegebenen Präfix in der Datenbank. Bitte wähle einen anderen Präfix.",
		'error_5_step2' => "Der angegebene Präfix enthält Sonderzeichen und ist somit ungültig. Erlaubt ist nur ein Unterstrich (_).",
		'error_6_step2' => "Der angegebene Benutzername enthält Sonderzeichen und ist somit ungültig. Erlaubt sind lediglich Klein- und Großbuchstaben, sowie Zahlen.",
		'error_7_step2' => "Die beiden Admin-Passwörter stimmen nicht überein.",

		'to_administration' => "Zur Administration",
		'to_guestbook' 		=> "Zum Gästebuch",
		'to_install' 		=> "Erneute Installation versuchen"
	];
?>
