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
	lang_main.php - German
	======================
	*/

	// initiate array $lang
	$lang = array();

	// INDEX.PHP
	$lang['install_directory_exists'] = "Das Installationsverzeichnis wurde noch nicht gelöscht.<br>Zu Deiner eigenen Sicherheit solltest Du das jetzt tun!<br>Vergiss nach einem Update aber nicht die <a href=\"install/upgrade.php\" title=\"Upgrade\">upgrade.php</a> auszuführen!<br>Bei Problemen mit Umlauten kann die <a href=\"install/convert_ansi.php\" title=\"Convert\">convert_ansi.php</a> helfen.";
	$lang['new_entry'] = "Eintragen";
	$lang['new_entry_descr'] = "Hier kannst Du einen neuen Gästebucheintrag verfassen";
	$lang['contact'] = "Kontakt";
	$lang['contact_descr'] = "Hier kannst Du Kontakt mit dem Administrator aufnehmen";
	$lang['adminpanel'] = "Administration";
	$lang['adminpanel_descr'] = "Zum Login";
	$lang['entry'] = "Eintrag";
	$lang['entries'] = "Einträge";
	$lang['no_entries'] = "Es wurden leider noch keine<br>Einträge hinterlassen.";
	$lang['entries_on_pages'] = "Einträge auf {PAGES} Seiten";
	$lang['page_first'] = "Zur ersten Seite";
	$lang['page_first_symbol'] = "&laquo;";
	$lang['page_forwards'] = "Eine Seite vorwärts blättern";
	$lang['page_forwards_symbol'] = "&rsaquo;";
	$lang['page_last'] = "Zur letzten Seite";
	$lang['page_last_symbol'] = "&raquo;";
	$lang['page_backwards'] = "Eine Seite zurück blättern";
	$lang['page_backwards_symbol'] = "&lsaquo;";
	$lang['anchor']	= "Direkt zu diesem Eintrag springen";
	$lang['from'] = "aus";
	$lang['at'] = "um";
	$lang['oclock'] = "Uhr";
	$lang['comment'] = "Kommentar";
	$lang['email_yes'] = "eMail von {ENTRY_NAME}";
	$lang['email_no'] = "{ENTRY_NAME} möchte keine eMails über das Gästebuch empfangen.";
	$lang['hp_of'] = "Homepage von {ENTRY_NAME}";
	$lang['gravatar'] = "Gravatar von {ENTRY_NAME}";
	$lang['quote'] = "Zitat von";

	// NEWENTRY.PHP
	$lang['new_entry_name'] = "Dein Name:";
	$lang['new_entry_city'] = "Wohnort:";
	$lang['new_entry_email'] = "eMail:";
	$lang['new_entry_mastodon'] = "Mastodon:";
	$lang['new_entry_bluesky'] = "Bluesky:";
	$lang['new_entry_w'] = "W:";
	$lang['new_entry_eu_vision'] = "EU Vision:";
	$lang['new_entry_eu_video'] = "EU Video:";
	$lang['new_entry_eu_monnett'] = "EU Monnett:";
	$lang['new_entry_hp'] = "Homepage:";
	$lang['new_entry_message'] = "Deine Nachricht:";
	$lang['necessary_fields'] = "[ Pflichtfelder sind mit einem Stern (*) gekennzeichnet ]";
	$lang['user_notification'] = "Per eMail benachrichtigen, wenn der Eintrag freigeschaltet, oder ein Kommentar dazu geschrieben wurde.";
	$lang['user_show_email'] = "Ermögliche anderen Benutzern mir eine eMail über das Kontaktformular zu schreiben. Um Spam vorzubeugen wird meine Emailadresse nicht angezeigt.";
	$lang['user_accept_akismet_service'] = "Dieser Eintrag wird durch 'Akismet' auf Spam überprüft. Ich bin mir bewusst, dass wenn ich den Eintrag absende, persönliche Daten von mir auf einen Server in die USA geschickt werden, und akzeptiere dies.";
	$lang['send'] = "Eintragen";
	$lang['preview'] = "Vorschau";
	$lang['security_code'] = "Sicherheitscode";
	$lang['captcha_refresh'] = "Neues Captcha generieren";
	$lang['captcha_what_is_that'] = "Was ist das?";
	$lang['captcha_wikipedia'] = "http://de.wikipedia.org/wiki/Captcha";
	$lang['captcha_tooltip'] = "Ein neuer Eintrag erfordert die Eingabe eines Sicherheitscodes um automatisierte Eintragungen zu vermeiden. Bitte tippe alle Buchstaben GROSS ein. Sollte der Code unleserlich sein, lasse das Textfeld leer, und klicke auf ''Eintragen''. Dann wird ein neuer Code generiert. Deine bisherigen Eingaben bleiben dabei erhalten. Sollte kein neuer Code generiert werden, klicke bitte rechts und dann auf ''Aktualisieren''.";
	$lang['back_to_mainpage'] = "Zurück zur Hauptseite";
	$lang['back'] = "Zurück";
	$lang['entry_success_mod'] = "Dein Eintrag wurde erfolgreich gespeichert.<br>Er wird vom Admin begutachtet, und dann freigeschaltet werden.";
	$lang['entry_success'] = "Dein Eintrag wurde erfolgreich gespeichert. Du kannst ihn Dir sofort ansehen.";
	$lang['forwarding'] = "Du wirst in {REFRESH_TIME} Sekunden automatisch weitergeleitet. Wenn nicht klicke bitte auf ''Zurück zur Hauptseite''.";
	$lang['sendmail_admin_title'] = "Neuer Gästebucheintrag von '{NAME}'";
	$lang['sendmail_user_title'] = "Dein Eintrag auf {DOMAIN}";

	// EMAIL.PHP
	$lang['email_name'] = "Dein Name:";
	$lang['email_email'] = "Deine eMail:";
	$lang['email_message'] = "Deine Nachricht:";
	$lang['email_sent_to'] = "Diese eMail wird geschickt an:";
	$lang['email_send'] = "Absenden";
	$lang['email_caption'] = "eMail von '{NAME}' über das Gästebuch von {DOMAIN}";
	$lang['email_caption_copy'] = "eMail an '{NAME}' über das Gästebuch von {DOMAIN} - Kopie der Nachricht";
	$lang['email_sender'] = "Absender:";
	$lang['email_receiver'] = "Empfänger:";
	$lang['email_from'] = "über:";
	$lang['email_sendcopytome'] = "Ich möchte eine Kopie dieser eMail erhalten.";
	$lang['email_success'] = "Deine eMail wurde erfolgreich an den Benutzer verschickt.";
	$lang['email_fail'] = "Die eMail konnte nicht verschickt werden. Möglicherweise gibt es ein Problem mit dem Mailserver.";

	// ERRORMESSAGES
	$lang['errormessage'][1] = "Bitte gib eine Nachricht ein!";
	$lang['errormessage'][2] = "Bitte gib eine gültige eMail Adresse ein!";
	$lang['errormessage'][3] = "Bitte gib einen Namen ein!";
	$lang['errormessage'][4] = "ist keine gültige<br>eMail Adresse!";
	$lang['errormessage'][5] = "ist keine gültiger<br> Mastodon-Account!";
	$lang['errormessage'][6] = "Die IP Sperre verbietet einen weiteren Eintrag!";
	$lang['errormessage'][7] = "Der Sicherheitscode wurde falsch oder nicht eingegeben!";
	$lang['errormessage'][8] = "Dieser Benutzer möchte keine eMails empfangen!";
	$lang['errormessage'][9] = "Es ist ein Fehler beim Versand der eMail aufgetreten!";
	$lang['errormessage'][10] = "Spamschutz: Das Formular wurde zu schnell abgesendet. Bitte warte noch {TIME_LOCK_REST} Sekunden.";
	$lang['errormessage'][11] = "Die Akismet-Einverständniserklärung wurde nicht akzeptiert.<br>Um den Eintrag übernehmen zu können, muss sie akzeptiert werden.";
	$lang['errormessage'][12] = "Diese eMail ist für Eintragungen gesperrt.";
	$lang['errormessage'][13] = "Dieser Domainbereich ist für Eintragungen gesperrt.";
	$lang['errormessage'][14] = "Diese IP-Adresse ist für Eintragungen gesperrt.";
	$lang['errormessage'][15] = "ist kein gültiger Facebook Name. Bitte beachten: Es dürfen keine Sonderzeichen und/oder Umlaute enthalten sein! 'ä' wird z.B. zu 'a'.";
	$lang['errormessage'][16] = "ist kein gültiger Twitter Name. Bitte beachten: Es dürfen keine Sonderzeichen und/oder Umlaute enthalten sein! 'ä' wird z.B. zu 'a'.";
	$lang['errormessage'][17] = "Die wiederholte, sehr schnelle Tippgeschwindigkeit weist daraufhin, dass Du ein Spamroboter bist. Du wurdest für {KEYSTROKE_BAN_TIME} Sekunden geblockt. Sollte dies ein Missverständnis sein, kannst Du Dich beim Administrator melden.";
	$lang['errormessage'][18] = "Du wurdest für zu schnelles Tippen geblockt. Der Verdacht liegt nahe, dass Du ein Spamroboter bist. Bitte warte noch {KEYSTROKE_BAN_TIME_REST} Sekunden.";
	$lang['errormessage'][19] = "Direkte Aufrufe sind nicht gestattet.";

	// BBCODES
	$lang['bbcodes'] = "BBCodes:";
	$lang['bbcode_bold'] = "Fett";
	$lang['bbcode_help_bold'] = "Fette Darstellung des Textes";
	$lang['bbcode_italic'] = "Kursiv";
	$lang['bbcode_help_italic'] = "Kursive Darstellung des Textes";
	$lang['bbcode_url'] = "URL";
	$lang['bbcode_help_url'] = "Fügt einen Hyperlink ein. Möglich sind: [url]http://www.test.de/[/url] oder [url=http://www.test.de/]Test[/url] oder [url=http://www.test.de/][img]Adresse zum Bild[/img][/url]";
	$lang['bbcode_img'] = "Grafik";
	$lang['bbcode_help_img'] = "Fügt ein Bild ein. Möglich sind: [img]Adresse zum Bild[/img] oder [img=Breite,Höhe]Adresse zum Bild[/img]";
	$lang['bbcode_flash'] = "Flash";
	$lang['bbcode_help_flash'] = "Fügt ein Flashvideo ein. -> [flash=Breite,Höhe]URL[/flash]";
	$lang['bbcode_quote'] = "Zitat";
	$lang['bbcode_help_quote'] = "Fügt ein Zitat ein. Möglich sind: [quote]Zitat[/quote] oder [quote=Name des Zitierten]Zitat[/quote]";
	$lang['bbcode_textsize'] = "Schriftgröße";
	$lang['bbcode_extrasmall'] = "Winzig";
	$lang['bbcode_small'] = "Klein";
	$lang['bbcode_default'] = "Standard";
	$lang['bbcode_big'] = "Groß";
	$lang['bbcode_extrabig'] = "Riesig";
	$lang['bbcode_textcolor'] = "Schriftfarbe";
	$lang['bbcode_help_size'] = "Schriftgrösse";
	$lang['smileys'] = "Smilies:";
?>
