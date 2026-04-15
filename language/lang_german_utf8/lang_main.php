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

	======================
	lang_main.php - German
	======================
	*/

	$lang = [
	
	// INDEX.PHP
	'install_directory_exists' 	=> "Das Installationsverzeichnis wurde noch nicht gelöscht.<br>Zu Deiner eigenen Sicherheit solltest Du das jetzt tun!<br>Vergiss nach einem Update aber nicht die <a href=\"install/upgrade.php\" title=\"Upgrade\">upgrade.php</a> auszuführen!",
	'new_entry' 				=> "Eintragen",
	'new_entry_descr' 			=> "Hier kannst Du einen neuen Gästebucheintrag verfassen",
	'contact' 					=> "Kontakt",
	'contact_descr' 			=> "Hier kannst Du Kontakt mit dem Administrator aufnehmen",
	'adminpanel' 				=> "Administration",
	'adminpanel_descr' 			=> "Zum Login",
	'entry' 					=> "Eintrag",
	'entries' 					=> "Einträge",
	'no_entries' 				=> "Es wurden leider noch keine<br>Einträge hinterlassen.",
	'entries_on_pages' 			=> "Einträge auf {PAGES} Seiten",
	'page_first' 				=> "Zur ersten Seite",
	'page_first_symbol' 		=> "&laquo;",
	'page_forwards' 			=> "Eine Seite vorwärts blättern",
	'page_forwards_symbol' 		=> "&rsaquo;",
	'page_last' 				=> "Zur letzten Seite",
	'page_last_symbol' 			=> "&raquo;",
	'page_backwards' 			=> "Eine Seite zurück blättern",
	'page_backwards_symbol' 	=> "&lsaquo;",
	'anchor'					=> "Direkt zu diesem Eintrag springen",
	'from' 						=> "aus",
	'at' 						=> "um",
	'oclock' 					=> "Uhr",
	'comment' 					=> "Kommentar",
	'email_yes' 				=> "eMail von {ENTRY_NAME}",
	'email_no' 					=> "{ENTRY_NAME} möchte keine eMails über das Gästebuch empfangen.",
	'hp_of' 					=> "Homepage von {ENTRY_NAME}",
	'gravatar' 					=> "Gravatar von {ENTRY_NAME}",
	'quote' 					=> "Zitat von",

	// NEWENTRY.PHP
	'new_entry_name' 				=> "Dein Name:",
	'new_entry_city' 				=> "Wohnort:",
	'new_entry_email' 				=> "eMail:",
	'new_entry_mastodon' 			=> "Mastodon:",
	'new_entry_bluesky' 			=> "Bluesky:",
	'new_entry_w' 					=> "W:",
	'new_entry_eu_vision' 			=> "EU Vision:",
	'new_entry_eu_video' 			=> "EU Video:",
	'new_entry_eu_monnett' 			=> "EU Monnett:",
	'new_entry_hp' 					=> "Homepage:",
	'new_entry_message' 			=> "Deine Nachricht:",
	'necessary_fields' 				=> "[ Pflichtfelder sind mit einem Stern (*) gekennzeichnet ]",
	'user_notification' 			=> "Per eMail benachrichtigen, wenn der Eintrag freigeschaltet, oder ein Kommentar dazu geschrieben wurde.",
	'user_show_email' 				=> "Ermögliche anderen Benutzern mir eine eMail über das Kontaktformular zu schreiben. Um Spam vorzubeugen wird meine Emailadresse nicht angezeigt.",
	'user_accept_akismet_service' 	=> "Dieser Eintrag wird durch 'Akismet' auf Spam überprüft. Ich bin mir bewusst, dass wenn ich den Eintrag absende, persönliche Daten von mir auf einen Server in die USA geschickt werden, und akzeptiere dies.",
	'send' 							=> "Eintragen",
	'preview' 						=> "Vorschau",
	'security_code' 				=> "Sicherheitscode",
	'captcha_refresh' 				=> "Neues Captcha generieren",
	'captcha_what_is_that' 			=> "Was ist das?",
	'captcha_wikipedia' 			=> "https://de.wikipedia.org/wiki/Captcha",
	'captcha_tooltip' 				=> "Ein neuer Eintrag erfordert die Eingabe eines Sicherheitscodes um automatisierte Eintragungen zu vermeiden. Bitte tippe alle Buchstaben GROSS ein. Sollte der Code unleserlich sein, lasse das Textfeld leer, und klicke auf ''Eintragen''. Dann wird ein neuer Code generiert. Deine bisherigen Eingaben bleiben dabei erhalten. Sollte kein neuer Code generiert werden, klicke bitte rechts und dann auf ''Aktualisieren''.",
	'back_to_mainpage' 				=> "Zurück zur Hauptseite",
	'back' 							=> "Zurück",
	'entry_success_mod' 			=> "Dein Eintrag wurde erfolgreich gespeichert.<br>Er wird vom Admin begutachtet, und dann freigeschaltet werden.",
	'entry_success' 				=> "Dein Eintrag wurde erfolgreich gespeichert. Du kannst ihn Dir sofort ansehen.",
	'forwarding' 					=> "Du wirst in {REFRESH_TIME} Sekunden automatisch weitergeleitet. Wenn nicht klicke bitte auf ''Zurück zur Hauptseite''.",
	'sendmail_admin_title' 			=> "Neuer Gästebucheintrag von '{NAME}'",
	'sendmail_user_title' 			=> "Dein Eintrag auf {DOMAIN}",

	// EMAIL.PHP
	'email_name' 			=> "Dein Name:",
	'email_email' 			=> "Deine eMail:",
	'email_message' 		=> "Deine Nachricht:",
	'email_sent_to' 		=> "Diese eMail wird geschickt an:",
	'email_send' 			=> "Absenden",
	'email_caption' 		=> "eMail von '{NAME}' über das Gästebuch von {DOMAIN}",
	'email_caption_copy' 	=> "eMail an '{NAME}' über das Gästebuch von {DOMAIN} - Kopie der Nachricht",
	'email_sender' 			=> "Absender:",
	'email_receiver' 		=> "Empfänger:",
	'email_from' 			=> "über:",
	'email_sendcopytome' 	=> "Ich möchte eine Kopie dieser eMail erhalten.",
	'email_success' 		=> "Deine eMail wurde erfolgreich an den Benutzer verschickt.",
	'email_fail' 			=> "Die eMail konnte nicht verschickt werden. Möglicherweise gibt es ein Problem mit dem Mailserver.",

	// ERRORMESSAGES
	'errormessage' => [
		1 	=> "Bitte gib eine Nachricht ein!",
		2 	=> "Bitte gib eine gültige eMail Adresse ein!",
		3 	=> "Bitte gib einen Namen ein!",
		4 	=> "ist keine gültige<br>eMail Adresse!",
		5 	=> "ist keine gültiger<br> Mastodon-Account!",
		6 	=> "Die IP Sperre verbietet einen weiteren Eintrag!",
		7 	=> "Der Sicherheitscode wurde falsch oder nicht eingegeben!",
		8 	=> "Dieser Benutzer möchte keine eMails empfangen!",
		9 	=> "Es ist ein Fehler beim Versand der eMail aufgetreten!",
		10 	=> "Spamschutz: Das Formular wurde zu schnell abgesendet. Bitte warte noch {TIME_LOCK_REST} Sekunden.",
		11 	=> "Die Akismet-Einverständniserklärung wurde nicht akzeptiert.<br>Um den Eintrag übernehmen zu können, muss sie akzeptiert werden.",
		12 	=> "Diese eMail ist für Eintragungen gesperrt.",
		13 	=> "Dieser Domainbereich ist für Eintragungen gesperrt.",
		14 	=> "Diese IP-Adresse ist für Eintragungen gesperrt.",
		15 	=> "ist kein gültiger Facebook Name. Bitte beachten: Es dürfen keine Sonderzeichen und/oder Umlaute enthalten sein! 'ä' wird z.B. zu 'a'.",
		16 	=> "ist kein gültiger Twitter Name. Bitte beachten: Es dürfen keine Sonderzeichen und/oder Umlaute enthalten sein! 'ä' wird z.B. zu 'a'.",
		17 	=> "Die wiederholte, sehr schnelle Tippgeschwindigkeit weist daraufhin, dass Du ein Spamroboter bist. Du wurdest für {KEYSTROKE_BAN_TIME} Sekunden geblockt. Sollte dies ein Missverständnis sein, kannst Du Dich beim Administrator melden.",
		18 	=> "Du wurdest für zu schnelles Tippen geblockt. Der Verdacht liegt nahe, dass Du ein Spamroboter bist. Bitte warte noch {KEYSTROKE_BAN_TIME_REST} Sekunden.",
		19 	=> "Direkte Aufrufe sind nicht gestattet.",
		20  => "Dein Eintrag enthält zu viele Links.<br>Es sind maximal {MAX_LINKS_IN_MESSAGE} Links erlaubt."
	],

	// BBCODES
	'bbcodes' 				=> "BBCodes:",
	'bbcode_bold' 			=> "Fett",
	'bbcode_help_bold' 		=> "Fette Darstellung des Textes",
	'bbcode_italic' 		=> "Kursiv",
	'bbcode_help_italic' 	=> "Kursive Darstellung des Textes",
	'bbcode_url' 			=> "URL",
	'bbcode_help_url' 		=> "Fügt einen Hyperlink ein. Möglich sind: [url]http://www.test.de/[/url] oder [url=http://www.test.de/]Test[/url] oder [url=http://www.test.de/][img]Adresse zum Bild[/img][/url]",
	'bbcode_img' 			=> "Grafik",
	'bbcode_help_img' 		=> "Fügt ein Bild ein. Möglich sind: [img]Adresse zum Bild[/img] oder [img=Breite,Höhe]Adresse zum Bild[/img]",
	'bbcode_flash' 			=> "Flash",
	'bbcode_help_flash' 	=> "Fügt ein Flashvideo ein. -> [flash=Breite,Höhe]URL[/flash]",
	'bbcode_quote' 			=> "Zitat",
	'bbcode_help_quote' 	=> "Fügt ein Zitat ein. Möglich sind: [quote]Zitat[/quote] oder [quote=Name des Zitierten]Zitat[/quote]",
	'bbcode_textsize' 		=> "Schriftgröße",
	'bbcode_extrasmall' 	=> "Winzig",
	'bbcode_small' 			=> "Klein",
	'bbcode_default' 		=> "Standard",
	'bbcode_big' 			=> "Groß",
	'bbcode_extrabig' 		=> "Riesig",
	'bbcode_textcolor' 		=> "Schriftfarbe",
	'bbcode_help_size' 		=> "Schriftgrösse",
	'smileys' 				=> "Smilies:"
	];
?>
