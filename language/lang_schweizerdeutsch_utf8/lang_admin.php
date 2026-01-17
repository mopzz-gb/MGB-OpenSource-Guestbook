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

	================================
	lang_admin.php - German (formal)
	================================
	*/

	// GENERAL
	$lang['no'] = "Nein";
	$lang['yes'] = "Ja";
	$lang['min'] = "Minimal";
	$lang['max'] = "Maximal";
	$lang['asc'] = "Aufsteigend";
	$lang['desc'] = "Absteigend";
	$lang['save'] = "Speichern";
	$lang['administrator'] = "Administrator";
	$lang['moderator'] = "Moderator";
	$lang['forever'] = "F&uuml;r Immer";
	$lang['one_month'] = "1 Monat";
	$lang['one_day'] = "1 Tag";
	$lang['one_hour'] = "1 Stunde";
	$lang['one_minute'] = "1 Minute";
	$lang['never'] = "Nie";
	$lang['time_second'] = "Sekunde";
	$lang['time_seconds'] = "Sekunden";
	$lang['time_minute'] = "Minute";
	$lang['time_minutes'] = "Minuten";
	$lang['time_hour'] = "Stunde";
	$lang['time_hours'] = "Stunden";
	$lang['time_day'] = "Tag";
	$lang['time_days'] = "Tage";
	$lang['time_month'] = "Monat";
	$lang['time_months'] = "Monate";
	$lang['time_year'] = "Jahr";
	$lang['time_years'] = "Jahre";
	$lang['age'] = "Alter";
	$lang['old'] = "alt";

	// LOGIN.INC.PHP
	$lang['title'] = "MGB OpenSource Guestbook - Administration";
	$lang['login_username'] = "Benutzername:";
	$lang['login_password'] = "Passwort:";
	$lang['login_lostpassword'] = "Ich habe mein Passwort vergessen";
	$lang['login'] = "Anmelden";
	$lang['logout'] = "Abmelden";
	$lang['login_ok'] = "Herzlich Willkommen <b>{SESSION_USERNAME}</b>.";
	$lang['logged_in'] = "Sie sind angemeldet als <b>{SESSION_USERNAME}</b>";
	$lang['logged_out'] = "Geben Sie bitte Ihren Benutzernamen und Ihr Passwort ein um sich anzumelden.";
	$lang['please_wait'] = "Sie wurden erfolgreich angemeldet.<br>Bitte warten Sie einen kurzen Moment...";

	// ERRORMESSAGES
	$lang['errormessage'][1] = "Bitte f&uuml;llen Sie alle Felder aus!";
	$lang['errormessage'][2] = "Diese Benutzername/Passwort Kombination existiert nicht.";
	$lang['errormessage'][3] = "Ihr Benutzerkonto wurde von einem Administrator deaktiviert.";
	$lang['errormessage'][4] = "Sie haben auf diese Seite keinen Zugriff. Wenden Sie sich<br>gegebenenfalls an einen Administrator.";
	$lang['errormessage'][5] = "Das angegebene Passwort ist falsch.";
	$lang['errormessage'][6] = "Die neuen Passw&ouml;rter sind nicht identisch.";
	$lang['errormessage'][7] = "Die angegebene eMail Adresse ist nicht g&uuml;ltig, oder es wurde keine angegeben.";
	$lang['errormessage'][8] = "Sie k&ouml;nnen sich nicht selbst den Administratorstatus nehmen, Ihr eigenes Benutzerkonto deaktivieren, oder es l&ouml;schen.";
	$lang['errormessage'][9] = "Sie waren zu lange inaktiv, und wurden deshalb automatisch abgemeldet.";
	$lang['errormessage'][10] = "Beim letzten Besuch haben Sie vergessen sich abzumelden. Dies wurde automatisch erledigt.<br><br>Bitte benutzen Sie zu Ihrer eigenen Sicherheit immer den Knopf ''Abmelden'', wenn Sie die Administration verlassen. Danke.";
	$lang['errormessage'][11] = "Dieser Benutzername oder diese eMail Adresse wird bereits verwendet.";
	$lang['errormessage'][12] = "Dieser Schl&uuml;ssel ist ung&uuml;ltig oder bereits abgelaufen.";
	$lang['errormessage'][13] = "Es wurde bereits ein neues Passwort f&uuml;r dieses Benutzerkonto beantragt.<br>Es ist nicht m&ouml;glich ein weiteres Passwort zu generieren, bis das Neue aktiviert, oder abgelaufen ist.";
	$lang['errormessage'][14] = "Die eMail konnte nicht verschickt werden. M&ouml;glicherweise gibt es ein Problem mit dem Mailserver, oder der eMail Adresse.";
	$lang['errormessage'][15] = "Die Version konnte nicht ermittelt werden, da sowohl <a href=\"http://php.net/manual/de/function.fopen.php\">fopen()</a> als auch cURL auf Ihrem Server deaktiviert sind.<br>Setzen Sie sich gegebenenfalls mit Ihrem Hoster in Verbindung.<br><br>In der Zwischenzeit k&ouml;nnen Sie sich auf <a href=''http://www.m-gb.org/'' target='_blank' title='MGB Homepage'>m-gb.org/</a> &uuml;ber die aktuellste Version informieren.";
	$lang['errormessage'][16] = "Das neue Passwort ist zu kurz. Es muss mindestens {PASSWORD_MIN_LENGTH} Zeichen haben.";
	$lang['errormessage'][17] = "SQL Dump konnte nicht erstellt werden.<br>Ist das Verzeichnis <i>save</i> schreibbar?";
	$lang['errormessage'][18] = "CSV konnte nicht erstellt werden.<br>Ist das Verzeichnis <i>save</i> schreibbar?";
	$lang['errormessage'][19] = "Beim L&ouml;schen des Backups ist ein Fehler aufgetreten!";
	$lang['errormessage'][20] = "Es wurde kein Backup ausgew&auml;hlt";
	$lang['errormessage'][21] = "Es trat ein Fehler beim Wiederherstellen des Backups auf!";
	$lang['errormessage'][22] = "Es trat ein Fehler beim L&ouml;schen der betroffenen Tabelle auf!";

	// ERRORMESSAGES EMPTY VALUES
	$lang['empty_needed_value'][1] = "Fehlender Titel";
	$lang['empty_needed_value'][2] = "Fehlender Autor";
	$lang['empty_needed_value'][3] = "Fehlende Zeitzone";
	$lang['empty_needed_value'][4] = "Fehlender Admin Name";
	$lang['empty_needed_value'][5] = "Fehlende Admin eMail";
	$lang['empty_needed_value'][6] = "Fehlende G&auml;stebuch eMail";
	$lang['empty_needed_value'][7] = "Fehlende Eintr&auml;ge pro Seite";
	$lang['empty_needed_value'][8] = "Fehlendes Datumsformat";
	$lang['empty_needed_value'][9] = "Fehlender Maximalwert f&uuml;r Bildbreite";
	$lang['empty_needed_value'][10] = "Fehlender Maximalwert f&uuml;r Bildh&ouml;he";
	$lang['empty_needed_value'][11] = "Fehlender Maximalwert f&uuml;r Flashbreite";
	$lang['empty_needed_value'][12] = "Fehlender Maximalwert f&uuml;r Flashh&ouml;he";
	$lang['empty_needed_value'][13] = "Fehlender Smileyumbruchswert";
	$lang['empty_needed_value'][14] = "Fehlende Gravatargr&ouml;&szlig;e";
	$lang['empty_needed_value'][15] = "Falscher oder fehlender Wert f&uuml;r Mindestpasswortl&auml;nge";
	$lang['empty_needed_value'][16] = "Falscher oder fehlende Werte f&uuml;r Captcha-L&auml;nge";
	$lang['empty_needed_value'][17] = "Falscher oder fehlender Wert f&uuml;r Maximale Absendeversuche";
	$lang['empty_needed_value'][18] = "Fehlender Wert f&uuml;r Captcha-Winkel";
	$lang['empty_needed_value'][19] = "Fehlender oder falscher Session-Timeout Wert";
	$lang['empty_needed_value'][20] = "Fehlende Captcha-X-Koordinaten";
	$lang['empty_needed_value'][21] = "Fehlende Captcha-Y-Koordinaten";
	$lang['empty_needed_value'][22] = "Die Captcha Farbe wurde nicht angegeben oder enth&auml;lt ung&uuml;ltige Zeichen.";
	$lang['empty_needed_value'][23] = "Zur Aktivierung von Akismet wird ein API-Key ben&ouml;tigt";
	$lang['empty_needed_value'][24] = "Fehlende Minimalzeit f&uuml;r Absendesperre";
	$lang['empty_needed_value'][25] = "Fehlende Maximalzeit f&uuml;r Absendesperre";
	$lang['empty_needed_value'][26] = "Fehlender oder falscher Wert f&uuml;r Absendeversuche";
	$lang['empty_needed_value'][27] = "Fehlender E-Mail-Text: Admin";
	$lang['empty_needed_value'][28] = "Fehlender E-Mail-Text: Dankesmail an Benutzer (unmoderiert)";
	$lang['empty_needed_value'][29] = "Fehlender E-Mail-Text: Dankesmail an Benutzer (moderiert)";
	$lang['empty_needed_value'][30] = "Fehlender E-Mail-Text: Freischaltungsmail";
	$lang['empty_needed_value'][31] = "Fehlender E-Mail-Text: Kommentar";
	$lang['empty_needed_value'][32] = "Fehlender E-Mail-Text: Kontaktmail";
	$lang['empty_needed_value'][33] = "Fehlender E-Mail-Text: Kontaktmail (Kopie)";
	$lang['empty_needed_value'][34] = "Fehlender Wert f&uuml;r Maximale Captcha Falscheingabe";
	$lang['empty_needed_value'][35] = "Fehlender Public oder Private Key f&uuml;r reCaptcha,<br>oder das reCaptcha Plugin ist nicht installiert";
	$lang['empty_needed_value'][36] = "SMTP Server wurde nicht angegeben.";
	$lang['empty_needed_value'][37] = "SMTP Port wurde nicht angegeben.";
	$lang['empty_needed_value'][38] = "SMTP Benutzername wurde nicht angegeben.";
	$lang['empty_needed_value'][39] = "SMTP Passwort wurde nicht angegeben.";
	$lang['empty_needed_value'][40] = "phpmailer konnte nicht im Ordner ''plugins/phpmailer/'' gefunden werden.";
	$lang['empty_needed_value'][41] = "Der Salt enth&auml;lt ung&uuml;ltige Zeichen.";
	$lang['empty_needed_value'][42] = "Der L&auml;ngenwert f&uuml;r die dynamischen Feldvariblen darf nicht leer/null,<br>kleiner als drei oder gr&ouml;&szlig;er als 255 sein.";

	// SPAM TYPES
	$lang['spam_entry_type'][1] = "Durch IP Bannliste abgewehrt.";
	$lang['spam_entry_type'][2] = "Auf Spam-Liste, aber nicht in der Blockliste.";
	$lang['spam_entry_type'][3] = "Durch eMail Bannliste abgewehrt.";
	$lang['spam_entry_type'][4] = "Durch Domain Bannliste abgewehrt.";
	$lang['spam_entry_type'][5] = "Durch Absendesperre abgewehrt.";
	$lang['spam_entry_type'][6] = "Aktualisiert durch Akismet.";
	$lang['spam_entry_type'][7] = "Neueintrag durch Akismet.";
	$lang['spam_entry_type'][8] = "Aktualisiert durch falsches Captcha.";
	$lang['spam_entry_type'][9] = "Durch Captcha abgewehrt.";
	$lang['spam_entry_type'][10] = "Captcha richtig, aber bereits auf Spam-Liste.";
	$lang['spam_entry_type'][11] = "Durch Tippgeschwindigkeitserkennung abgewehrt.";

	// SPAM.INC.PHP
	$lang['spam_add_to_ip_banlist'] = "Zur IP-Blockliste hinzuf&uuml;gen";
	$lang['spam_add_to_email_banlist'] = "Zur eMail-Blockliste hinzuf&uuml;gen";
	$lang['spam_add_to_domain_banlist'] = "Zur Domain-Blockliste hinzuf&uuml;gen";
	$lang['spam_added_to_ip_list'] = " wurde zur IP-Blockliste hinzugef&uuml;gt!";
	$lang['spam_added_to_email_list'] = " wurde zur eMail-Blockliste hinzugef&uuml;gt!";
	$lang['spam_added_to_domain_list'] = " wurde zur Domain-Blockliste hinzugef&uuml;gt!";
	$lang['spam_is_already_on_ip_list'] = " befindet sich bereits auf der IP-Blockliste.";
	$lang['spam_is_already_on_email_list'] = " befindet sich bereits auf der eMail-Blockliste.";
	$lang['spam_is_already_on_domain_list'] = " befindet sich bereits auf der Domain-Blockliste.";
	$lang['updated_ips'] = "{COUNTER} IPs wurden in {SECONDS} Sekunden aktualisiert.";
	$lang['updated_emails'] = "{COUNTER} eMails wurden in {SECONDS} Sekunden aktualisiert.";
	$lang['updated_domains'] = "{COUNTER} Domains wurden in {SECONDS} Sekunden aktualisiert.";

	// general strings
	$lang['back_to_mainpage'] = "Zur&uuml;ck zur Hauptseite";
	$lang['back'] = "Zur&uuml;ck";
	$lang['go'] = "Los!";
	$lang['entry'] = "Eintrag";
	$lang['entries'] = "Eintr&auml;ge";
	$lang['no_entries'] = "Keine Eintr&auml;ge vorhanden.";
	$lang['no_deactivated_entries'] = "Keine deaktivierten Eintr&auml;ge vorhanden.";
	$lang['no_activated_entries'] = "Keine aktiven Eintr&auml;ge vorhanden.";
	$lang['no_spam_entries'] = "Keine Spam-Eintr&auml;ge vorhanden.";
	$lang['entries_on_pages'] = "Eintr&auml;ge auf {PAGES} Seiten";
	$lang['page_first'] = "Zur ersten Seite";
	$lang['page_first_symbol'] = "&laquo;";
	$lang['page_forwards'] = "Eine Seite vorw&auml;rts bl&auml;ttern";
	$lang['page_forwards_symbol'] = "&rsaquo;";
	$lang['page_last'] = "Zur letzten Seite";
	$lang['page_last_symbol'] = "&raquo;";
	$lang['page_backwards'] = "Eine Seite zur&uuml;ck bl&auml;ttern";
	$lang['page_backwards_symbol'] = "&lsaquo;";
	$lang['captcha_method_code'] = "Sicherheitscode";
	$lang['captcha_method_math'] = "Mathematisch";
	$lang['activate_entry'] = "Diesen Eintrag aktivieren";
	$lang['deactivate_entry'] = "Diesen Eintrag deaktivieren";
	$lang['delete_entry'] = "Diesen Eintrag l&ouml;schen";
	$lang['mark_as_spam'] = "Als Spam markieren";
	$lang['nospam_entry'] = "Als 'kein Spam' markieren und freischalten";
	$lang['nospam_deactivate_entry'] = "Als 'kein Spam' markieren aber deaktiviert lassen";
	$lang['active'] = "Dieser Eintrag ist im G&auml;stebuch freigeschaltet";
	$lang['inactive'] = "Dieser Eintrag ist im G&auml;stebuch nicht freigeschaltet";
	$lang['edit_entry'] = "Diesen Eintrag editieren";
	$lang['timestamp'] = "Zeitstempel";
	$lang['quote'] = "Zitat von";

	// GRAVATAR
	$lang['gravatar_position_left'] = "Links vom Eintrag";
	$lang['gravatar_position_right'] = "Rechts vom Eintrag";
	$lang['gravatar_type_0'] = "Standard";
	$lang['gravatar_type_1'] = "Mystery-Man";
	$lang['gravatar_type_2'] = "Identicon";
	$lang['gravatar_type_3'] = "Monsterid";
	$lang['gravatar_type_4'] = "Wavatar";
	$lang['gravatar_type_5'] = "Retro";
	$lang['gravatar_type_6'] = "Blank";

	// RECAPTCHA
	$lang['captcha_method_recaptcha'] = "reCaptcha";
	$lang['recaptcha_style_0'] = "red";
	$lang['recaptcha_style_1'] = "white";
	$lang['recaptcha_style_2'] = "blackglass";
	$lang['recaptcha_style_3'] = "clean";

	// DROPDOWNS
	$lang['do_nothing'] = "Keine Aktion gew&auml;hlt...";
	$lang['delete_whole_spam'] = "L&ouml;sche alle Spam-Eintr&auml;ge";
	$lang['mark_all_no_spam_deactivate'] = "- Alle Eintr&auml;ge als 'kein Spam' markieren aber deaktiviert lassen";
	$lang['mark_all_no_spam_activate'] = "- Alle Eintr&auml;ge als 'kein Spam' markieren und freischalten";
	$lang['mark_all_as_spam'] = "- Alle Eintr&auml;ge als Spam markieren";
	$lang['activate_all_entries'] = "- Alle Eintr&auml;ge aktivieren";
	$lang['deactivate_all_entries'] = "- Alle Eintr&auml;ge deaktivieren";
	$lang['delete_all_entries'] = "- Alle Eintr&auml;ge l&ouml;schen";
	$lang['put_all_ips_on_banlist'] = "- Alle neuen IPs in die Blockliste eintragen";
	$lang['put_all_emails_on_banlist'] = "- Alle neuen eMails in die Blockliste eintragen";
	$lang['put_all_domains_on_banlist'] = "- Alle neuen Domains in die Blockliste eintragen";
	$lang['put_all_on_banlists_and_delete_everything'] = "- Alle neuen IPs, eMails und Domains in die Blockliste eintragen und anschl. l&ouml;schen";
	$lang['show_banned_by_ip_only'] = "-- Zeige nur Eintr&auml;ge die durch IP geblockt wurden";
	$lang['show_banned_by_email_only'] = "-- Zeige nur Eintr&auml;ge die durch eMail geblockt wurden";
	$lang['show_banned_by_domain_only'] = "-- Zeige nur Eintr&auml;ge die durch Domain geblockt wurden";
	$lang['show_banned_by_keystroke_only'] = "-- Zeige nur Eintr&auml;ge die durch Tippgeschwindigkeitserkennung geblockt wurden";
	$lang['show_banned_by_captcha_only'] = "-- Zeige nur Eintr&auml;ge die durch Captcha geblockt wurden";
	$lang['export_as_sql_dump'] = "--- Exportieren als SQL Dump";
	$lang['export_as_csv'] = "--- Exportieren als CSV";

	// CONFIRMS
	$lang['confirm_general'] = "&Auml;nderungen wirklich durchf&uuml;hren?";
	$lang['confirm_delete'] = "Eintrag wirklich l&ouml;schen?";
	$lang['confirm_delete_spam'] = "Wirklich alle Spam-Eintr&auml;ge l&ouml;schen?";
	$lang['confirm_add_to_permanent_ip_blocklist'] = "Wirklich zur IP-Blockliste hinzuf&uuml;gen?";
	$lang['confirm_add_to_permanent_email_blocklist'] = "Wirklich zur eMail-Blockliste hinzuf&uuml;gen?";
	$lang['confirm_add_to_permanent_domain_blocklist'] = "Wirklich zur Domain-Blockliste hinzuf&uuml;gen?";
	$lang['confirm_restore_backup'] = "Das Backup wirklich wiederherstellen?";
	$lang['confirm_delete_backup'] = "Das Backup wirklich l&ouml;schen?";
	$lang['confirm_changes_smiley'] = "Wollen Sie die &Auml;nderungen an den bestehenden Smilies wirklich durchf&uuml;hren?";

	// MAILS
	$lang['standard_mail'] = "mail()";
	$lang['phpmailer'] = "phpmailer";
	$lang['sendmail_user_notification_title'] = "Ihr Eintrag auf {DOMAIN} wurde freigeschaltet";
	$lang['sendmail_user_comment_title'] = "Zu Ihrem Eintrag auf {DOMAIN} wurde ein Kommentar verfasst";
	$lang['sendmail_adduser_title'] = "Ihre Benutzerdaten bei {DOMAIN}";
	$lang['sendmail_adduser_text'] = "Sie wurden erfolgreich bei {DOMAIN} von einem Administrator angemeldet. Hier Ihre Benutzerdaten:<br /><br />Benutzername: {ADDUSER_NAME}<br />Passwort: {ADDUSER_PASSWORD}<br /><br />Sie k&ouml;nnen sich hier anmelden: {ADDUSER_URL}";
	$lang['sendmail_admin_text'] = "{NAME} hat einen neuen Eintrag im G&auml;stebuch hinterlassen.<br /><br />Datum: {DATE}<br />Zeit: {TIME}<br /><br />---<br />{MESSAGE}<br />---<br /><br />{URL_TO_GB}";
	$lang['sendmail_user_text'] = "Hallo {NAME},<br /><br />vielen Dank f&uuml;r Ihren Eintrag in meinem G&auml;stebuch. Der Eintrag ist sofort verf&uuml;gbar.<br /><br />{URL_TO_GB}";
	$lang['sendmail_user_text_moderated'] = "Hallo {NAME},<br /><br />vielen Dank f&uuml;r Ihren Eintrag in meinem G&auml;stebuch. Nach einer Pr&uuml;fung werde ich ihn so bald wie m&ouml;glich freischalten.<br /><br />{URL_TO_GB}";
	$lang['sendmail_user_notification_text'] = "Hallo {NAME},<br /><br />Ihr Eintrag auf {DOMAIN} wurde soeben freigeschaltet. Sie k&ouml;nnen ihn sich hier ansehen: {URL_TO_GB}";
	$lang['sendmail_comment_text'] = "Hallo {NAME},<br /><br />zu Ihrem Eintrag<br /><br />---<br />{MESSAGE}<br />---<br /><br />wurde soeben ein Kommentar verfasst. Sie k&ouml;nnen ihn sich hier ansehen: {URL_TO_GB}";
	$lang['sendmail_contactmail_text'] = "Sie haben eine eMail von {NAME} &uuml;ber das G&auml;stebuch von {DOMAIN} erhalten. Hier die Nachricht:<br /><br />---<br />{MESSAGE}<br />---<br /><br />Datum: {DATE}<br />Zeit: {TIME}";
	$lang['sendmail_contactmail_text_copy'] = "Sie haben eine Nachricht an {NAME} &uuml;ber das G&auml;stebuch von {DOMAIN} verschickt. Hier eine Kopie davon:<br /><br />---<br />{MESSAGE}<br />---<br /><br />Datum: {DATE}<br />Zeit: {TIME}<br /><br />Beinhaltet diese eMail Spam? Oder sind Sie gar nicht der Absender dieser eMail? Sie k&ouml;nnen hier den Webmaster kontaktieren: {URL_TO_GB}";
	$lang['sendmail_new_password_title'] = "Neues Passwort: Best&auml;tigung";
	$lang['sendmail_new_password_text'] = "Hallo {NAME},<br /><br />F&uuml;r Ihren Account wurde ein neues Passwort generiert. Um dieses zu best&auml;tigen, klicken Sie bitte innerhalb der n&auml;chsten 24 Stunden auf den untenstehenden Link. Bis das neue Passwort aktiviert wurde, bleibt das alte Passwort aktiv.<br /><br />Wird innerhalb der n&auml;chsten 24 Stunden nicht auf den Link geklickt, verf&auml;llt das neue Passwort.<br /><br />{NEW_PASSWORD_LINK}";
	$lang['sendmail_new_password_created_title'] = "Das neue Passwort wurde aktiviert";
	$lang['sendmail_new_password_created_text'] = "Hallo {NAME},<br /><br />Sie haben ihr neues Passwort erfolgreich best&auml;tigt. Anbei erhalten Sie die neuen Zugangsdaten.<br /><br />Benutzername: {NAME}<br />Passwort: {NEW_PASSWORD}";

	// navigation
	$lang['settings'] = "Konfiguration";
	$lang['settings_general'] = "Allgemein";
	$lang['settings_look'] = "Aussehen";
	$lang['settings_bbcodes'] = "BBCodes";
	$lang['settings_emoticons'] = "Emoticons";
	$lang['settings_gravatar'] = "Gravatar";
	$lang['settings_security'] = "Sicherheit &amp; Anti-Spam";
	$lang['settings_mails'] = "eMails";
	$lang['settings_database'] = "Datenbank";
	$lang['activate'] = "Eintrag freischalten";
	$lang['deactivate'] = "Eintrag deaktivieren";
	$lang['delete'] = "Eintrag l&ouml;schen";
	$lang['edit'] = "Eintrag editieren";
	$lang['spam'] = "Spam-Eintr&auml;ge";
	$lang['edit_smilies'] = "Smilies bearbeiten";
	$lang['edit_users'] = "Benutzerverwaltung";
	$lang['banlists'] = "Blocklisten verwalten";
	$lang['banlist_ips'] = "IP Liste";
	$lang['banlist_emails'] = "eMail Liste";
	$lang['banlist_domains'] = "Domain Liste";
	$lang['spam_log'] = "Spam Protokoll";
	$lang['stats'] = "Statistik";
	$lang['license'] = "Lizenz";
	$lang['forum'] = "Forum";
	$lang['bugreport'] = "Fehler melden";
	$lang['version'] = "Version";
	$lang['manual'] = "Dokumentation";
	$lang['fb_nav'] = "MGB auf Facebook";
	$lang['to_guestbook'] = "Zum G&auml;stebuch";
	$lang['paypal'] = "Wenn Sie das MGB n&uuml;tzlich finden, d&uuml;rfen Sie gerne etwas spenden um die weitere Entwicklung zu unterst&uuml;tzen.";

	// settings.inc.php
	$lang['edit_caption_general'] = "Allgemeine Einstellungen";
	$lang['edit_caption_look'] = "Aussehen";
	$lang['edit_caption_bbcodes'] = "BBCodes";
	$lang['edit_caption_smilies'] = "Emoticons";
	$lang['edit_caption_gravatars'] = "Gravatar Unterst&uuml;tzung";
	$lang['edit_caption_security'] = "Allgemeine Sicherheitsoptionen";
	$lang['edit_caption_antispam'] = "Anti-Spam Einstellungen";
	$lang['edit_caption_captcha'] = "Captcha Einstellungen";
	$lang['edit_caption_recaptcha'] = "reCaptcha";
	$lang['edit_caption_dynamic_fieldnames'] = "Dynamische Feldvariablen";
	$lang['edit_caption_akismet'] = "Akismet-Plugin";
	$lang['edit_caption_time_lock'] = "Absendesperre";
	$lang['edit_caption_mail_settings'] = "eMail Konfiguration";
	$lang['edit_caption_smtp_settings'] = "Die folgenden Angaben werden nur ben&ouml;tigt, wenn der Versand &uuml;ber SMTP (phpmailer) beabsichtigt ist. Ansonsten einfach leer lassen.";
	$lang['edit_caption_email'] = "eMail Texte";
	$lang['edit_caption_database'] = "Datenbankinformationen";
	$lang['edit_caption_database_backups'] = "Datenbank Backups";
	$lang['edit_caption_keystroke'] = "Tippgeschwindigkeitserkennung";
	$lang['edit_save_message'] = "Einstellungen erfolgreich gespeichert.";
	$lang['edit_title'] = "Titel:";
	$lang['edit_h_author'] = "Autor:";
	$lang['edit_h_domain'] = "Domain:";
	$lang['edit_gb_path'] = "Pfad zum G&auml;stebuch:";
	$lang['edit_h_keywords'] = "Schl&uuml;sselw&ouml;rter:";
	$lang['edit_h_description'] = "Beschreibung:";
	$lang['edit_timezone'] = "Zeitzone:";
	$lang['edit_announcement_message'] = "Ank&uuml;ndigung:";
	$lang['edit_admin_name'] = "Admin Name:";
	$lang['edit_admin_email'] = "Admin eMail:";
	$lang['edit_admin_gbemail'] = "G&auml;stebuchemail:";
	$lang['edit_caching'] = "Zwischenspeicherung (Caching):";
	$lang['edit_sendmail_admin'] = "eMail Benachrichtigung:";
	$lang['edit_sendmail_admin_text'] = "Text f&uuml;r eMail Benachrichtigung:";
	$lang['edit_sendmail_user'] = "Dankesmail an Benutzer:";
	$lang['edit_sendmail_user_text'] = "Text f&uuml;r Dankesmail (unmoderiert):";
	$lang['edit_sendmail_user_text_moderated'] = "Text f&uuml;r Dankesmail (moderiert):";
	$lang['edit_sendmail_user_notification_text'] = "Text f&uuml;r Freischaltungsmail:";
	$lang['edit_sendmail_comment_text'] = "Text bei Kommentarbenachrichtigung:";
	$lang['edit_sendmail_contactmail_text'] = "Text bei eMail &uuml;ber G&auml;stebuch:";
	$lang['edit_sendmail_contactmail_text_copy'] = "Text f&uuml;r die eigene Kopie bei eMail &uuml;ber G&auml;stebuch:";
	$lang['edit_template_path'] = "Template:";
	$lang['edit_template_style_path'] = "Template-Stil:";
	$lang['edit_iconset_path'] = "Grafikset:";
	$lang['edit_language_path'] = "Sprachdatei:";
	$lang['edit_badwords'] = "Wortzensur:";
	$lang['edit_bbcode'] = "BBcodes:";
	$lang['edit_allow_img_tag'] = "IMG-Tag:";
	$lang['edit_max_img_width'] = "Maximale Bildbreite:";
	$lang['edit_max_img_height'] = "Maximale Bildh&ouml;he:";
	$lang['edit_center_img'] = "Zentrierte Bilddarstellung:";
	$lang['edit_allow_flash_tag'] = "FLASH-Tag:";
	$lang['edit_max_flash_width'] = "Maximale Flashbreite:";
	$lang['edit_max_flash_height'] = "Maximale Flashh&ouml;he:";
	$lang['edit_center_flash'] = "Zentrierte Flashdarstellung:";
	$lang['edit_smileys'] = "Smilies:";
	$lang['edit_smileys_break'] = "Smilies in einer Reihe:";
	$lang['edit_smileys_order'] = "Smileysortierung:";
	$lang['edit_blocktime'] = "Sperrzeit:";
	$lang['edit_captcha'] = "Sicherheitsabfrage (''Captcha''):";
	$lang['edit_captcha_method'] = "Art des Captchas:";
	$lang['edit_recaptcha_pub_key'] = "reCaptcha Public Key:";
	$lang['edit_recaptcha_private_key'] = "reCaptcha Private Key:";
	$lang['edit_recaptcha_style'] = "reCaptcha Stil:";
	$lang['edit_captcha_length'] = "L&auml;nge des Captchas:";
	$lang['edit_captcha_salt'] = "Salt:";
	$lang['edit_captcha_hash_method'] = "Hash Methode:";
	$lang['edit_captcha_double_hash'] = "Doppeltes W&uuml;rfeln:";
	$lang['edit_captcha_coords'] = "Captcha-Koordinaten:";
	$lang['edit_captcha_color'] = "Captcha-Textfarbe:";
	$lang['edit_captcha_angle'] = "Captcha-Winkel:";
	$lang['edit_wrong_captcha_count'] = "Maximale Captcha Falscheingabe:";
	$lang['edit_akismet_plugin'] = "Akismet-Plugin:";
	$lang['edit_akismet_api'] = "Akismet API Key (erforderlich):";
	$lang['edit_akismet_mark_as_spam'] = "Spam-Markierung:";
	$lang['edit_time_lock'] = "Absendesperre:";
	$lang['edit_time_lock_value'] = "Minimale Zeit f&uuml;r Absendesperre:";
	$lang['edit_time_lock_maxtime'] = "Maximale Zeit f&uuml;r Absendesperre:";
	$lang['edit_time_lock_spam_count'] = "Maximale Absendeversuche:";
	$lang['edit_user_notification'] = "Benutzerbenachrichtigung:";
	$lang['edit_user_show_email'] = "Benutzeremail im G&auml;stebuch:";
	$lang['edit_session_timeout'] = "Ablaufzeit der Session:";
	$lang['edit_password_min_length'] = "Mindestl&auml;nge f&uuml;r Passw&ouml;rter:";
	$lang['edit_moderated'] = "Moderiertes G&auml;stebuch:";
	$lang['edit_require_email'] = "eMail bei Eintrag erforderlich:";
	$lang['edit_entries_per_page'] = "Eintr&auml;ge pro Seite:";
	$lang['edit_entries_order'] = "Sortierung der Eintr&auml;ge:";
	$lang['edit_entries_order_asc_desc'] = "Reihenfolge der Sortierung:";
	$lang['edit_entries_numbering'] = "Reihenfolge der Nummerierung:";
	$lang['edit_spam_protection'] = "eMail Spamschutz:";
	$lang['edit_spam_mail'] = "Spaminfo Mailadresse:";
	$lang['edit_ipblocker'] = "IP-Sperre:";
	$lang['edit_wordwrap'] = "Zeilenumbruch:";
	$lang['edit_dateform'] = "Datumsformat:";
	$lang['edit_gravatar_show'] = "Zeige Gravatare:";
	$lang['edit_gravatar_rating'] = "Gravatar Einstufung:";
	$lang['edit_gravatar_type'] = "Unregistrierte Gravatare:";
	$lang['edit_gravatar_size'] = "Gravatar Gr&ouml;sse:";
	$lang['edit_gravatar_position'] = "Position:";
	$lang['edit_banlist_ips'] = "IP Blockliste aktiv:";
	$lang['edit_banlist_emails'] = "eMail Blockliste aktiv:";
	$lang['edit_banlist_domains'] = "Domain Blockliste aktiv:";
	$lang['edit_banlist_log'] = "Spam Protokollierung:";
	$lang['edit_debug_mode'] = "Debug Modus:";
	$lang['edit_general_info'] = "Generelle Informationen:";
	$lang['edit_server_name'] = "Host:";
	$lang['edit_database_name'] = "Datenbankname:";
	$lang['edit_server_document_root'] = "Root Verzeichnis:";
	$lang['edit_database_type'] = "Datenbanktyp:";
	$lang['edit_database_version'] = "Datenbankversion:";
	$lang['edit_database_prefix'] = "Pr&auml;fix f&uuml;r diese MGB Installation:";
	$lang['edit_php_version'] = "PHP Version:";
	$lang['edit_backup'] = "Backup:";
	$lang['edit_no_backup'] = "Kein Backup vorhanden";
	$lang['edit_database_backup_full'] = "Komplett:";
	$lang['edit_database_backup_entries'] = "Eintr&auml;ge:";
	$lang['edit_database_backup_banlist_ips'] = "IP-Blocklisten:";
	$lang['edit_database_backup_banlist_emails'] = "eMail-Blocklisten:";
	$lang['edit_database_backup_banlist_domains'] = "Domain-Blocklisten:";
	$lang['edit_create_db_backup_full'] = "Erstellen";
	$lang['edit_restore_db_backup_full'] = "Wiederherstellen";
	$lang['edit_delete_db_backup_full'] = "L&ouml;schen";
	$lang['edit_create_db_backup_entries'] = "Erstellen";
	$lang['edit_restore_db_backup_entries'] = "Wiederherstellen";
	$lang['edit_delete_db_backup_entries'] = "L&ouml;schen";
	$lang['edit_create_db_backup_banlist_ips'] = "Erstellen";
	$lang['edit_restore_db_backup_banlist_ips'] = "Wiederherstellen";
	$lang['edit_delete_db_backup_banlist_ips'] = "L&ouml;schen";
	$lang['edit_create_db_backup_banlist_emails'] = "Erstellen";
	$lang['edit_restore_db_backup_banlist_emails'] = "Wiederherstellen";
	$lang['edit_delete_db_backup_banlist_emails'] = "L&ouml;schen";
	$lang['edit_create_db_backup_banlist_domains'] = "Erstellen";
	$lang['edit_restore_db_backup_banlist_domains'] = "Wiederherstellen";
	$lang['edit_delete_db_backup_banlist_domains'] = "L&ouml;schen";
	$lang['edit_delete_backup_successfull'] = "Backup wurde erfolgreich gel&ouml;scht!";
	$lang['edit_restore_backup_successfull'] = "Backup wurde erfolgreich wiederhergestellt!";
	$lang['edit_mailer_method'] = "Versandmethode:";
	$lang['edit_smtp_server'] = "SMTP Server:";
	$lang['edit_smtp_port'] = "SMTP Port:";
	$lang['edit_smtp_user'] = "SMTP Benutzername:";
	$lang['edit_smtp_password'] = "SMTP Passwort:";
	$lang['edit_smtp_auth'] = "SMTP Authentifizierung:";
	$lang['edit_keystroke'] = "Tippgeschwindigkeitserkennung:";
	$lang['edit_keystroke_max_cps'] = "Maximale Zeichen pro Sekunde:";
	$lang['edit_keystroke_ban_time'] = "Sperrzeit:";
	$lang['edit_dynamic_fieldnames'] = "Dynamische Feldvariablen:";
	$lang['edit_dynamic_fieldnames_method'] = "Art der Zufallsvariable:";
	$lang['edit_dynamic_fieldnames_length'] = "L&auml;nge:";

	$lang['edit_expl_title'] = "Der Titel &uuml;ber dem G&auml;stebuch.";
	$lang['edit_expl_h_author'] = "Der Name des Autors der Internetseite.";
	$lang['edit_expl_h_domain'] = "Domain auf der sich das G&auml;stebuch befindet <b>ohne http://</b> am Anfang, und <b>/</b> am Ende. (www.beispiel.de)";
	$lang['edit_expl_gb_path'] = "Der Pfad relativ zur Domain in dem sich das G&auml;stebuch befindet.";
	$lang['edit_expl_h_keywords'] = "Schl&uuml;sselw&ouml;rter durch Kommata getrennt.";
	$lang['edit_expl_h_description'] = "Eine kurze Beschreibung der Seite.";
	$lang['edit_expl_timezone'] = "Seit PHP5 wird die Angabe einer expliziten Zeitzone vorausgesetzt. Geben Sie hier Ihre Zeitzone ein. Siehe: <a href='http://www.php.net/manual/de/timezones.php' target='_blank' title='Verf&uuml;gbare Zeitzonen'>Liste aller verf&uuml;gbaren Zeitzonen</a>";
	$lang['edit_expl_announcement_message'] = "Dieser Text wird &uuml;ber den Eintr&auml;gen angezeigt, und bleibt dort auch stehen, bis er hier wieder gel&ouml;scht wird. Formatierungen mit BBCodes und Smilies sind m&ouml;glich.";
	$lang['edit_expl_admin_name'] = "Der Name des Admins oder einfach nur ''Admin''.<br><br><b>ACHTUNG: Sollte nicht identisch mit dem Benutzernamen zum Login in den Adminbereich sein!</b>";
	$lang['edit_expl_admin_email'] = "An diese Adresse werden Benachrichtigungen &uuml;ber neue Eintr&auml;ge geschickt.";
	$lang['edit_expl_admin_gbemail'] = "Wird als Absenderadresse f&uuml;r eMails benutzt.";
	$lang['edit_expl_caching'] = "Ist die Zwischenspeicherung aktiv, werden die G&auml;stebucheintr&auml;ge nicht jedes mal neu aus der Datenbank geholt, sondern als html Datei zwischengespeichert. Dies kann bei sehr gut besuchten Seiten die Serverlast reduzieren.<br><br><b>ACHTUNG: Diese Option ist noch als experimentell anzusehen und sollte bei Problemen mit der Darstellung oder der Aktualit&auml;t der Eintr&auml;ge vorsichtshalber deaktiviert werden.</b>";
	$lang['edit_expl_sendmail_admin'] = "Wenn diese Option aktiviert ist, dann wird dem Administrator bei einem neuen Eintrag eine eMail geschickt.";
	$lang['edit_expl_sendmail_admin_text'] = "Dieser Text wird dem Administrator bei aktivierter eMail Benachrichtigung geschickt.<br><br>Verf&uuml;gbare Platzhalter: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_user'] = "Wenn diese Option aktiviert ist, dann wird dem Benutzer nach einem Eintrag eine Dankesmail geschickt.";
	$lang['edit_expl_sendmail_user_text'] = "Dieser Text wird dem Benutzer bei einem <b>unmoderierten G&auml;stebuch</b> und <b>aktivierter Dankesmail</b> geschickt.<br><br>Verf&uuml;gbare Platzhalter: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_user_text_moderated'] = "Dieser Text wird dem Benutzer bei einem <b>moderierten G&auml;stebuch</b> und <b>aktivierter Dankesmail</b> geschickt.<br><br>Verf&uuml;gbare Platzhalter: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_user_notification_text'] = "Dieser Text wird dem Benutzer geschickt, sobald sein Beitrag freigeschaltet wurde. Voraussetzung hierf&uuml;r ist, dass der Benutzer dem bei der Eintragung auch zugestimmt hat.<br><br>Verf&uuml;gbare Platzhalter: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_comment_text'] = "Dieser Text wird dem Benutzer geschickt, wenn von einem Administrator oder Moderator ein Kommentar zu seinem Beitrag verfasst wurde. Voraussetzung hierf&uuml;r ist, dass der Benutzer dem bei der Eintragung auch zugestimmt hat.<br><br>Verf&uuml;gbare Platzhalter: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_contactmail_text'] = "Dieser Text wird Benutzern geschickt, die bei aktiviertem eMail Spamschutz eine email &uuml;ber das G&auml;stebuch erhalten.<br><br>Verf&uuml;gbare Platzhalter: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_contactmail_text_copy'] = "Dieser Text wird dem Absender einer bei aktiviertem eMail Spamschutz &uuml;ber das Kontaktformular gesendeten Nachricht geschickt.<br><br>Verf&uuml;gbare Platzhalter: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_template_path'] = "Das Template das benutzt werden soll.";
	$lang['edit_expl_template_style_path'] = "Der gew&uuml;nschte Stil des Templates. Kann erst ausgew&auml;hlt werden, nachdem das entsprechende Template geladen wurde.";
	$lang['edit_expl_iconset_path'] = "Das gew&uuml;nschte Grafikset das Icons unabh&auml;ngig vom gew&auml;hlten Template bereitstellt.";
	$lang['edit_expl_language_path'] = "Die Sprache die benutzt werden soll.<br><br><b>ACHTUNG:</b> Seit Version <b>0.6.5</b> werden Sprachen die den Zeichencode latin9 (iso-8859-15) besitzen, <b>NICHT</b> mehr Unterst&uuml;tzt. Bei fehlenden Variablen, leeren Textfeldern etc. im G&auml;stebuch bitte auf eine utf-8-basierte Sprache (z.B. ''German / Deutsch (Du)'') umstellen, und jegliche latin9-Sprachen aus dem Ordner ''language'' entfernen.<br><br>Anschlie&szlig;end k&ouml;nnen Probleme mit Sonderzeichen, Umlauten etc. auftreten. Dann bitte die Datei ''convert_ansi.php'' im Ordner ''install'' ausf&uuml;hren.";
	$lang['edit_expl_language_author'] = "Autor:";
	$lang['edit_expl_language_charset'] = "Zeichensatz:";
	$lang['edit_expl_badwords'] = "Geben Sie hier unerw&uuml;nschte W&ouml;rter durch Kommata getrennt ein, die im G&auml;stebuch durch Sternchen ersetzt werden sollen. Leer lassen zur Deaktivierung.";
	$lang['edit_expl_bbcode'] = "L&auml;sst Textformatierungen durch den Benutzer zu.";
	$lang['edit_expl_allow_img_tag'] = "Das Einbinden von Bildern und Grafiken in einen G&auml;stebucheintrag birgt ein Sicherheitsrisiko. Bilder k&ouml;nnten Schadsoftware enthalten, und ebenso k&ouml;nnten durch Benutzer eventuell unerw&uuml;nschte oder juristisch fragliche Bilder eingebunden werden. Sehr viele, gro&szlig;e Bilder k&ouml;nnen lange Ladezeiten des G&auml;stebuches hervorrufen.<br><br><b>Der BBCode f&uuml;r Bilder sollte nur bei einem moderierten G&auml;stebuch eingeschaltet werden.</b>";
	$lang['edit_expl_max_img_width'] = "Bestimmt die maximale Breite eines durch einen [img]-Tag eingef&uuml;gten Bildes.<br><br><b>ACHTUNG: Greift nur bei funktionierendem <a href='http://de2.php.net/manual/de/function.getimagesize.php' target='_blank' title='php.net'>getimagesize();</a> oder bei einem [img]-Tag mit Angabe der Abmessungen ([img=Breite,H&ouml;he]Bildadresse[/img]).</b>";
	$lang['edit_expl_max_img_height'] = "Bestimmt die maximale H&ouml;he eines durch einen [img]-Tag eingef&uuml;gten Bildes.<br><br><b>ACHTUNG: Greift nur bei funktionierendem <a href='http://de2.php.net/manual/de/function.getimagesize.php' target='_blank' title='php.net'>getimagesize();</a> oder bei einem [img]-Tag mit Angabe der Abmessungen ([img=Breite,H&ouml;he]Bildadresse[/img]).</b>";
	$lang['edit_expl_center_img'] = "Legt fest ob durch einen [img]-Tag eingef&uuml;gte Bilder zentriert dargestellt werden.";
	$lang['edit_expl_allow_flash_tag'] = "Erlaubt es dem Benutzer Flashvideos, wie sie etwa von YouTube bereitgestellt werden, in einen Eintrag einzubinden.<br><br><b>Der BBCode f&uuml;r Flash-Dateien sollte nur bei einem moderierten G&auml;stebuch eingeschaltet werden, da die Gefahr besteht, dass jemand anst&ouml;&szlig;ige Videos verbreitet.</b>";
	$lang['edit_expl_max_flash_width'] = "Bestimmt die maximale Breite eines durch einen [flash]-Tag eingef&uuml;gten Videos.";
	$lang['edit_expl_max_flash_height'] = "Bestimmt die maximale H&ouml;he eines durch einen [flash]-Tag eingef&uuml;gten Videos.";
	$lang['edit_expl_center_flash'] = "Legt fest ob ein durch einen [flash]-Tag eingef&uuml;gtes Video zentriert dargestellt wird.";
	$lang['edit_expl_smileys'] = "Erm&ouml;glicht es dem Benutzer Smilies einzuf&uuml;gen.";
	$lang['edit_expl_smileys_break'] = "Gibt an, nach wie vielen Smilies in der ''newentry.php'' eine neue Zeile angefangen wird. Hilfreich bei sehr vielen Smilies.";
	$lang['edit_expl_smileys_order'] = "Definiert ob Smilies aufsteigend oder absteigend sortiert geladen werden.";
	$lang['edit_expl_blocktime'] = "Legt die Zeit fest, die ein Benutzer geblockt wird, nachdem er auf die Blockliste gesetzt wurde.";
	$lang['edit_expl_captcha'] = "Bei Aktivierung muss ein Sicherheitscode eingegeben oder eine mathematische Formel gel&ouml;st werden, um einen neuen Eintrag und eine eMail an einen Benutzer zu schreiben.";
	$lang['edit_expl_captcha_method'] = "Du kannst zwischen einem klassischen Sicherheitscode, einem mathematischen Captcha, bei dem der Benutzer eine Rechenaufgabe l&ouml;sen muss und Googles ''reCaptcha'' (<a href=\"http://code.google.com/p/recaptcha/downloads/list?q=label:phplib-Latest\" target=\"_blank\">Plugin</a> muss sich im Ordner ''[mgb_root]/plugins/recaptcha'' befinden) w&auml;hlen.";
	$lang['edit_expl_recaptcha_pub_key'] = "Wird ben&ouml;tigt, wenn reCaptcha aktiviert ist. Du kannst ihn <a href=\"https://www.google.com/recaptcha/admin/create\">hier</a> beantragen.";
	$lang['edit_expl_recaptcha_private_key'] = "Wird ben&ouml;tigt, wenn reCaptcha aktiviert ist. Du erh&auml;ltst ihn zusammen mit dem Public Key.";
	$lang['edit_expl_recaptcha_style'] = "Legt fest, wie das reCaptcha aussieht. Es gibt vier verschiedene Auswahlm&ouml;glichkeiten.";
	$lang['edit_expl_captcha_length'] = "Betrifft nur die Sicherheitsabfrage, <b>nicht</b> das mathematische Captcha oder reCaptcha. Darf den Wert <b>3</b> nicht unter- und den Wert <b>9</b> nicht &uuml;berschreiten. Wird nur ein Minimalwert angegeben, bleibt die L&auml;nge des Captchas stets gleich. Wird zus&auml;tzlich noch ein Maximalwert angegeben, variiert die L&auml;nge des Captchas zuf&auml;llig bei jedem neuen Captcha.<br><br>Standard: <b>6</b>";
	$lang['edit_expl_captcha_salt'] = "Ein ''Salt'' ist ein zuf&auml;llig gew&auml;hltes Wort, oder eine Kombination aus Buchstaben und Zahlen, das mit in den Hash aus dem sich das Captcha ergibt eingebracht wird. Es erh&ouml;ht nochmalig die Chance, dass das Captcha so zuf&auml;llig wie m&ouml;glich generiert wird und nicht berechenbar ist.<br><br>Es sollte nicht bei dem bei der Installation zuf&auml;llig gew&auml;hlten Wert belassen, sondern selbst gew&auml;hlt werden. Das Feld kann bei Bedarf aber auch leer bleiben.";
	$lang['edit_expl_captcha_hash_method'] = "Bestimmt die Hash Methode mit der das Captcha generiert wird.";
	$lang['edit_expl_captcha_double_hash'] = "Wird dieser Wert auf ''Ja'' gestellt, werden die Zufallszahlen des Sicherheitscodes noch einmal ''durchgew&uuml;rfelt''.";
	$lang['edit_expl_captcha_coords'] = "Definiert die Koordinaten, an denen der Text im Bild startet. Anfangspunkt ist dabei die <b>linke, untere Ecke des ersten Buchstabens</b>.";
	$lang['edit_expl_captcha_color'] = "Bestimmt die Textfarbe des Captchas. Der Wert muss im HTML-Format und ohne '#' vorliegen.<br><br><b>Richtig: <span class='newer_version'>505050</span><br>Falsch: <span class='old_version'>#505050</span></b>";
	$lang['edit_expl_captcha_angle'] = "Diese beiden Werte geben den Bereich an, in dem der Winkel den der Text einnimmt, zuf&auml;llig ausgew&auml;hlt wird. Der linke Wert muss <b>kleiner</b> sein als der rechte.";
	$lang['edit_expl_wrong_captcha_count'] = "Wert, der bestimmt, wie oft das Captcha maximal falsch eingegeben werden darf. Erreicht der Nutzer diesen Wert, wird er auf die <b>Spamliste</b> gesetzt.";
	$lang['edit_expl_akismet_plugin'] = "Akismet ist ein externer Service, der neue Eintr&auml;ge auf Spam pr&uuml;ft, und bei einem positiven Ergebnis den Eintrag blockt. Das Akismet-Plugin kann auf <a href='http://www.m-gb.org/index.php?id=download_gb' title='Download Akismet Plugin'>http://www.m-gb.org/</a> herunter geladen werden.<br><br><b>ACHTUNG: Mit der Nutzung von 'Akismet' erkl&auml;ren Sie sich einverstanden, dass Daten auf einen Server in die USA &uuml;bermittelt werden. Sind Sie oder Ihre Benutzer damit nicht einverstanden, sollten Sie das Plugin nicht benutzen!</b>";
	$lang['edit_expl_akismet_api'] = "Um Akismet nutzen zu k&ouml;nnen, ist das Akismet-Plugin sowie ein <a href='http://akismet.com/signup/#free' title='Akismet API Key'>API Key</a> erforderlich. Gib ihn nach der Registrierung hier ein.";
	$lang['edit_expl_akismet_check_ok'] = "<span class='same_version' style='font-size: medium'>Akismet ist installiert!</span>";
	$lang['edit_expl_akismet_check_fail'] = "<span class='old_version' style='font-size: medium'>Akismet ist NICHT installiert!</span>";
	$lang['edit_expl_akismet_mark_as_spam'] = "Ist diese Option aktiv, werden neue, von Akismet als Spam identifizierte Eintr&auml;ge, als solcher markiert, und erscheinen in der Administration in der Kategorie Spam.";
	$lang['edit_expl_time_lock'] = "Wenn diese Option aktiviert wird, l&auml;uft bei einem neuen G&auml;stebucheintrag im Hintergrund ein Z&auml;hler mit. Sendet der Benutzer das Formular vor Ablauf dieses Z&auml;hlers ab, wird er darauf hingewiesen dass er zu schnell war, und wie viele Sekunden er noch warten muss, um das Formular abzusenden.";
	$lang['edit_expl_time_lock_value'] = "Die minimale Zeit in Sekunden die der Benutzer warten muss, bis er das Formular absenden kann.";
	$lang['edit_expl_time_lock_maxtime'] = "Die maximale Zeit in Sekunden in der ein Benutzer Gelegenheit hat, einen G&auml;stebucheintrag zu hinterlassen. L&auml;uft die Zeit w&auml;hrend des G&auml;stebucheintrags ab, beginnt die Absendesperre von vorne.";
	$lang['edit_expl_time_lock_spam_count'] = "Die maximalen Absendeversuche die ein Nutzer in der gesperrten Zeit t&auml;tigen kann, bis er auf die <b>Spamliste</b> gesetzt wird.<br><br><b>Beispiel:</b> Ist die Absendesperre auf 30 Sekunden eingestellt, und ein Nutzer versucht trotz Hinweis, dass er noch warten muss, da die Zeit noch nicht abgelaufen ist, mehr als die voreingestellten Versuche das Formular abzusenden, wird er auf die Spamliste gesetzt. Das hei&szlig;t aber noch nicht, dass er schon geblockt ist. Erst, wenn er das Maximum in dieser Spamliste erreicht hat, wird er dauerhaft geblockt.<br><br>Minimum: <b>5</b><br>Maximum: <b>99</b>";
	$lang['edit_expl_user_notification'] = "Erm&ouml;glicht es dem Benutzer zu entscheiden, ob er sich per eMail benachrichtigen lassen will wenn sein Eintrag freigeschaltet wurde.";
	$lang['edit_expl_user_show_email'] = "Erm&ouml;glicht es dem Benutzer zu entscheiden, ob seine eMail im G&auml;stebuch angezeigt wird, oder nicht. Deaktiviert er das K&auml;stchen kann ihm niemand au&szlig;er der Administrator eine eMail schreiben.";
	$lang['edit_expl_session_timeout'] = "Ein Administrator / Moderator wird bei Inaktivit&auml;t nach Ablauf dieser Zeit automatisch abgemeldet. Angabe in <b>Sekunden</b>. Wert muss >= <b>60</b> sein.";
	$lang['edit_expl_password_min_length'] = "Legt die Mindestl&auml;nge f&uuml;r Passw&ouml;rter fest. Wert darf nicht kleiner als <b>6</b> sein.<br><br><b>ACHTUNG:</b> Sichere Passw&ouml;rter sollten mindestens acht oder mehr Zeichen lang sein, und Sonderzeichen enthalten!";
	$lang['edit_expl_moderated'] = "Bei Aktivierung m&uuml;ssen Eintr&auml;ge erst freigeschaltet werden, bevor sie im G&auml;stebuch erscheinen.";
	$lang['edit_expl_require_email'] = "Legt fest, ob bei einem neuen Eintrag eine eMail Adresse zwingend angegeben werden muss.<br><br><b>ACHTUNG: Wirkung wird mit der Nutzung von Akismet au&szlig;er Kraft gesetzt.</b>";
	$lang['edit_expl_entries_per_page'] = "Gibt an, wieviele Eintr&auml;ge auf einer Seite angezeigt werden. Der Wert darf <b>nicht 0</b> sein.";
	$lang['edit_expl_entries_order'] = "Bestimmt das MySQL-Feld nach dem die Eintr&auml;ge sortiert werden sollen.";
	$lang['edit_expl_entries_order_asc_desc'] = "Bestimmt die Reihenfolge nach der die Eintr&auml;ge sortiert werden sollen.";
	$lang['edit_expl_entries_numbering'] = "Bestimmt die Reihenfolge nach der die Eintr&auml;ge nummeriert werden.<br><br><b>Achtung:</b> Dies hat nichts mit der Sortierung zu tun. Lediglich die einem &ouml;ffentlichen Benutzer gezeigte Nummer eines Eintrags &auml;ndert sich hier.";
	$lang['edit_expl_spam_protection'] = "Bei Aktivierung wird bei Klick auf das eMail Symbol im Beitrag, ein Kontaktformular ge&ouml;ffnet, durch das ein anderer Benutzer dann eine eMail versenden kann. eMail Adressen werden somit <b>nicht</b> direkt angezeigt.";
	$lang['edit_expl_spam_mail'] = "An diese Adresse werden bei neuen Spam-Eintr&auml;gen oder bei erfolgreicher Spam-Abwehr Infomails gesendet. Leer lassen zur Deaktivierung.";
	$lang['edit_expl_ipblocker'] = "Verhindert mehrere Eintr&auml;ge hintereinander.<br><br><b>NICHT VOLL FUNKTIONSF&Auml;HIG!</b>";
	$lang['edit_expl_wordwrap'] = "Gibt die Anzahl der Zeichen an, nachdem ein sehr langes Wort umgebrochen wird. <b>0</b> f&uuml;r Deaktivierung.";
	$lang['edit_expl_dateform'] = "Die Form in der das Datum dargestellt wird. Formatierungen sind anhand der php Funktion <a class='admin' href='http://www.php.net/manual/en/function.date.php' title='date()' target='_blank'>date()</a> m&ouml;glich.";
	$lang['edit_expl_gravatar_show'] = "Gravatare (Global Recognized Avatars) sind kleine Bildchen, die neben dem Eintrag des Benutzers angezeigt werden. Sie sind abh&auml;ngig davon, ob der Benutzer mit seiner eMail Adresse bei dem Service <a class=\"admin\" href=\"http://site.gravatar.com/\" target=\"_blank\" title=\"Gravatar Service\">registriert</a> ist.";
	$lang['edit_expl_gravatar_rating'] = "Legt fest bis zu welcher Einstufung Gravatare angezeigt werden.<br><br><b>G</b> = F&uuml;r jedes Alter<br><b>PG</b> = leichte Gewaltdarstellungen, provokant gekleidete Menschen und Gesten<br><b>R</b> = Intensive Gewaltdarstellungen, Obsz&ouml;nit&auml;ten<br><b>X</b> = sexuell anst&ouml;&szlig;ige Bilder";
	$lang['edit_expl_gravatar_type'] = "Hier k&ouml;nnen Sie festlegen, wie Gravatare dargestellt werden, sollte der Benutzer nicht bei dem Dienst mit seiner eMail-Adresse registriert sein.";
	$lang['edit_expl_gravatar_size'] = "Legt die Abmessungen des Gravatars in <b>Pixeln</b> fest.";
	$lang['edit_expl_gravatar_position'] = "Legt fest, ob der Gravatar links oder rechts vom Eintrag erscheint.";
	$lang['edit_expl_banlist_ips'] = "Besucher des G&auml;stebuches werden bei Aktivierung mit dieser Liste abgeglichen. Befindet sich die IP des Nutzers auf dieser Liste, wird er geblockt.";
	$lang['edit_expl_banlist_emails'] = "Neue Eintr&auml;ge werden bei Aktivierung mit dieser Liste abgeglichen. Befindet sich die eMail des Nutzers auf dieser Liste, wird er geblockt.";
	$lang['edit_expl_banlist_domains'] = "Neue Eintr&auml;ge werden bei Aktivierung mit dieser Liste abgeglichen. Befindet sich die Domain der eMail des Nutzers auf dieser Liste, wird er geblockt.";
	$lang['edit_expl_banlist_log'] = "Ist diese Option aktiv, werden jegliche Blockaktionen des G&auml;stebuches oder auch Captcha Falscheingaben in einem Protokoll gespeichert.";
	$lang['edit_expl_debug_mode'] = "Im Debug Modus werden interessante Hintergrundinformationen des G&auml;stebuches auf dem Bildschirm angezeigt. Erleichtert die Fehlersuche wenn etwas nicht so funktioniert wie es sollte.";
	$lang['edit_expl_database_backup_full'] = "Ein komplettes Backup der gesamten MGB Installation. Es beinhaltet alle Eintr&auml;ge, Einstellungen, Blocklisten. Einfach alles.";
	$lang['edit_expl_database_backup_entries'] = "Ein komplettes Backup aller G&auml;stebucheintr&auml;ge.";
	$lang['edit_expl_database_backup_banlist_ips'] = "Ein Backup der kompletten IP-Blockliste.";
	$lang['edit_expl_database_backup_banlist_emails'] = "Ein Backup der kompletten eMail-Blockliste.";
	$lang['edit_expl_database_backup_banlist_domains'] = "Ein Backup der kompletten Domain-Blockliste.";
	$lang['edit_expl_mailer_method'] = "Legt die Methode fest, mit der die eMails des G&auml;stebuches versandt werden.<br><br><b>- mail()</b> - Die in PHP integrierte Standardversandmethode<br><b>- phpmailer</b> - Eine Klasse die auf <a href='https://github.com/Synchro/PHPMailer' target='_blank' title='phpmailer'>Github</a> heruntergeladen werden kann. Sie muss nach dem Download im Ordner ''plugins/phpmailer'' des G&auml;stebuches hinterlegt werden. Mit dieser Klasse wird der Versand von eMails &uuml;ber smtp m&ouml;glich. Der Webhoster muss die daf&uuml;r ben&ouml;tigten Funktionen freigegeben haben.";
	$lang['edit_expl_smtp_server'] = "Die Adresse zu Ihrem STMP Server.";
	$lang['edit_expl_smtp_port'] = "Der Port Ihres SMTP Servers.<br><br><b>Standard: 25</b>";
	$lang['edit_expl_smtp_user'] = "Der Benutzername mit dem Sie sich bei Ihrem SMTP Server anmelden. Oft identisch mit der eMail Adresse.";
	$lang['edit_expl_smtp_password'] = "Das SMTP Passwort.<br><br><b>VORSICHT:</b> Das SMTP Passwort muss im <b>Klartext</b> in der Datenbank gespeichert werden, und ist somit in diesem Formular &uuml;ber den Quelltext f&uuml;r jeden einsehbar, der Zugriff auf die eMail Konfiguration hat. Es sollte nicht identisch mit dem Administratorpasswort sein, wenn mehrere Personen Zugriff auf diesen Bereich haben.";
	$lang['edit_expl_smtp_auth'] = "Erfordert der betreffende SMTP Server eine Authentifizierung?";
	$lang['edit_expl_keystroke'] = "Erkennt ob ein Benutzer zu schnell einen Eintrag erstellt. Spamroboter f&uuml;llen f&uuml;r gew&ouml;hnlich die Formulare binnen weniger Milisekunden aus und schicken sie ab. Ein normaler Benutzer braucht daf&uuml;r weitaus l&auml;nger.";
	$lang['edit_expl_keystroke_max_cps'] = "Gibt an, wie viele Zeichen ein Benutzer maximal in der Sekunde tippen darf, bevor er als ''Spamroboter'' eingestuft wird. Sie sollten diesen Wert nicht zu niedrig einstellen, denn es gibt sehr viele 'Schnelltipper' da draussen.<br><br><b>Standard: 8</b>";
	$lang['edit_expl_keystroke_ban_time'] = "Wird ein Benutzer als ''Spambot'' eingestuft, wird er f&uuml;r diese Zeit geblockt, bevor er einen neuen Absendeversuch starten darf. Angabe in <b>Sekunden</b>.";
	$lang['edit_expl_dynamic_fieldnames'] = "Wenn diese Option aktiviert ist, werden die Variablen der Felder die f&uuml;r die Erstellung eines neuen Eintrages notwendig sind (Name, eMail, Wohnort, ...) dynamisch erzeugt.<br><br>Spambots f&uuml;llen meist nur Felder aus, die bestimmte Bezeichnungen tragen, und f&uuml;r ihre Zwecke dienlich sind. Mit der Vergabe von dynamischen Variablen ''sieht'' der Spambot die Felder nicht mehr, da er nur die Variablen aus dem Quelltext ausliest. Und da sich diese Variablen jedes mal &auml;ndern, kann er sich auch nicht darauf einstellen. Ein Mensch hat dieses Problem nicht, da er immer noch die Bezeichnungen lesen kann, was ein Spambot nicht tut.<br><br><b>Die Verwendung dieser Option wird <i>w&auml;rmstens</i> empfohlen.</b>";
	$lang['edit_expl_dynamic_fieldnames_method'] = "Setzt die Funktion mit der die Zufallsvariablen generiert werden.<br><br><b>mt_rand():</b> Die PHP eigene Funktion f&uuml;r bessere Zufallszahlen. Generiert jedoch nur Zahlen.<br><b>generate_key_and_pw():</b> Die MGB interne Funktion generiert eine Kombination aus Zahlen, Gro&szlig;- und Kleinbuchstaben.";
	$lang['edit_expl_dynamic_fieldnames_length'] = "Bestimmt die L&auml;nge der dynamischen Feldvariablen. Darf nicht kleiner als <b>3</b> und nicht gr&ouml;&szlig;er als <b>255</b> sein.<br><br><b>ACHTUNG: Gilt nur f&uuml;r die MGB interne Funktion generate_key_and_pw().</b>";

	// EDIT.INC.PHP
	$lang['id'] = "ID:";
	$lang['ip'] = "IP:";
	$lang['date'] = "Datum:";
	$lang['timestamp'] = "Zeit:";
	$lang['name'] = "Name:";
	$lang['city'] = "Wohnort:";
	$lang['email'] = "eMail:";
	$lang['icq'] = "ICQ:";
	$lang['aim'] = "AIM:";
	$lang['msn'] = "MSN:";
	$lang['fb'] = "Facebook:";
	$lang['twitter'] = "Twitter:";
	$lang['hp'] = "Homepage:";
	$lang['message'] = "Eintrag:";
	$lang['user_notification'] = "Benachrichtigung bei Freischaltung oder Kommentar:";
	$lang['user_show_email'] = "Zeige email im G&auml;stebuch an:";
	$lang['comment'] = "Kommentar:";

	// smilies.inc.php
	$lang['add_smilies_descr'] = "Hier k&ouml;nnen Sie bestehende Smilies &auml;ndern, oder neue hinzuf&uuml;gen.<br><br>Alle Smilies die hinzugef&uuml;gt werden sollen, m&uuml;ssen sich im Ordner <b>'images/smilies/'</b> im Hauptverzeichnis des G&auml;stebuches befinden. Sie m&uuml;ssen also nur den Dateinamen angeben. Benutzen Sie dazu bitte das <b>leere Feld</b> und dr&uuml;cken dann <b>Speichern</b>.<br><br>Sie k&ouml;nnen auch mehrere Platzhalter angeben. Trennen Sie sie durch ein <b>Komma und ein Leerzeichen</b>. Um Smilies in der ''newentry.php'' einzuf&uuml;gen, wird der <b>erste</b> angegebene Platzhalter verwendet.<br><br><span class='same_version'>Richtig:</span> :smile:, :), :-)<br><span class='old_version'>Falsch:</span> :smile:,:),:-)<br><br><b>Bitte beachten Sie, dass wenn Sie bestehende Platzhalter oder Smilies &auml;ndern bzw. l&ouml;schen, die in Eintr&auml;gen bereits verwendet wurden, diese nicht mehr korrekt angezeigt werden k&ouml;nnen! Sie m&uuml;ssen diese Eintr&auml;ge dann per Hand editieren.</b>";
	$lang['smiley_path'] = "Dateiname";
	$lang['smiley_replacement'] = "Platzhalter";
	$lang['add_new_smiley'] = "Smiley hinzuf&uuml;gen";
	$lang['checked_smilies'] = "Markierte Smilies ...";
	$lang['delete_checked_smilies'] = "... aus Liste entfernen, unmarkierte behalten";
	$lang['keep_checked_smilies'] = "... in Liste behalten, unmarkierte entfernen";
	$lang['smiley_width'] = "Breite";
	$lang['smiley_height'] = "H&ouml;he";
	$lang['smilies'] = "Smilies";
	$lang['check_all'] = "Alle markieren";
	$lang['uncheck_all'] = "Alle Markierungen entfernen";
	$lang['invert_all'] = "Markierungen umkehren";

	// EDIT_USER.INC.PHP
	$lang['user_is_active'] = "Benutzer ist aktiv:";
	$lang['r_user_type'] = "Benutzer ist:";
	$lang['r_settings'] = "Konfiguration &auml;ndern:";
	$lang['r_settings_database'] = "Backups verwalten:";
	$lang['r_activate'] = "Eintr&auml;ge freischalten:";
	$lang['r_deactivate'] = "Eintr&auml;ge deaktivieren:";
	$lang['r_delete'] = "Eintr&auml;ge l&ouml;schen:";
	$lang['r_edit'] = "Eintr&auml;ge editieren:";
	$lang['r_spam'] = "Spamliste verwalten:";
	$lang['r_blocklists'] = "Blocklisten verwalten:";
	$lang['r_edit_smilies'] = "Smilies bearbeiten";
	$lang['old_password'] = "Ihr aktuelles Passwort:";
	$lang['new_password_1'] = "Passwort:";
	$lang['new_password_2'] = "Passwort best&auml;tigen:";
	$lang['delete_user'] = "Best&auml;tigen:";
	$lang['edit_user_caption_rights'] = "Rechte (gelten nur f&uuml;r Moderatoren)";
	$lang['edit_user_caption_password'] = "Passwort dieses Benutzers:";
	$lang['edit_user_caption_delete_user'] = "Diesen Benutzer l&ouml;schen";
	$lang['edit_user_caption_old_password'] = " Ihr aktuelles Passwort:";
	$lang['user_add'] = "Benutzer hinzuf&uuml;gen";
	$lang['user_edit'] = "Benutzer editieren";
	$lang['edit_user_caption_send_account_data'] = "Daten zusenden";
	$lang['send_account_data'] = "per eMail zusenden?";

	// VERSION.INC.PHP
	$lang['current_version'] = "Installierte Version:";
	$lang['stable_version'] = "Neueste stabile Version:";
	$lang['unstable_version'] = "Neueste Entwicklerversion:";
	$lang['old_version'] = "Ihre Version ist veraltet.<br>Eine Aktualisierung wird empfohlen.<br><br><a href='http://www.m-gb.org/index.php?id=download_gb' class='admin' target='_blank' title='Jetzt aktualisieren'>Zur neuesten Version</a>";
	$lang['same_version'] = "Sie besitzen die neueste Version.<br>Eine Aktualisierung ist nicht erforderlich.";
	$lang['newer_version'] = "Ihre Version ist neuer als die verf&uuml;gbare stabile Version.<br>Eine Aktualisierung ist nicht erforderlich.";
	$lang['new_version_available'] = "Eine neuere Version ist verf&uuml;gbar: <a href='http://www.m-gb.org/files/latest/mgb-latest.zip' class='admin' target='_blank' title='Jetzt aktualisieren!'>{LATEST_VERSION}</a>";

	// LOSTPASSWORD.PHP
	$lang['lostpassword_mail'] = "Ihre eMail Adresse:";
	$lang['get_new_pw'] = "Neues Passwort anfordern";
	$lang['lostpassword_success'] = "Ihre Anfrage wurde bearbeitet. Sie werden in K&uuml;rze eine eMail mit einem<br>Best&auml;tigungslink erhalten. Klicken Sie darauf, um ihr neues Passwort zu aktivieren.";
	$lang['lostpassword_no_success'] = "Ihre Anfrage konnte nicht bearbeitet werden, da ein Problem mit dem Mailserver aufgetreten ist.<br><br>Erfahren Sie <a href='http://forum.m-gb.org/viewtopic.php?p=1220#p1220' target='_blank' title='MGB Forum'>hier</a> wie Sie trotzdem ein neues Passwort setzen k&ouml;nnen.";
	$lang['lostpassword_success_created'] = "Ihre neuen Zugangsdaten wurden<br>Ihnen per eMail zugeschickt.";
	$lang['lostpassword_no_success_created'] = "Ein Fehler ist beim Mailversand aufgetreten.<br>Die Zugangsdaten konnten leider nicht verschickt werden.<br><br>Erfahren Sie <a href='http://forum.m-gb.org/viewtopic.php?p=1220#p1220' target='_blank' title='MGB Forum'>hier</a> wie Sie trotzdem ein neues Passwort setzen k&ouml;nnen.";
?>
