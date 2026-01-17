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

	============================
	lang_main.php - Swiss German
	============================

	Translated by Walti Zubler
	*/

	// INDEX.PHP
	$lang['install_directory_exists'] = "De Ordner 'install' isch nonig gl&ouml;scht worde !!.<br>Da das es Sicherheitsrisiko isch, sett de gl&ouml;scht werde !<br>Vergiss aber n&ouml;d nacheme Update zerscht <a href=\"install/upgrade.php\" title=\"Upgrade\">upgrade.php</a> uszf&uuml;ere!<br>Bei Problemen mit Umlauten kann die <a href=\"install/convert_ansi.php\" title=\"Convert\">convert_ansi.php</a> helfen.";
	$lang['new_entry'] = "Itrag schribe";
	$lang['new_entry_descr'] = "Da chamer en eigene neue Itrag schribe";
	$lang['contact'] = "Kontakt";
	$lang['contact_descr'] = "Mit em G&auml;schtebuechbetriber Kontakt ufn&auml;";
	$lang['adminpanel'] = "Adminischtration";
	$lang['adminpanel_descr'] = "Zum Login";
	$lang['entry'] = "Itrag";
	$lang['entries'] = "Itr&auml;g";
	$lang['no_entries'] = "Es sind leider no kei Itr&auml;g vorhande";
	$lang['entries_on_pages'] = "Itr&auml;g uf {PAGES} Sitene";
	$lang['page_first'] = "Uf di erschti Site";
	$lang['page_first_symbol'] = "&laquo;";
	$lang['page_forwards'] = "Zu de n&auml;chschte Site";
	$lang['page_forwards_symbol'] = "&rsaquo;";
	$lang['page_last'] = "Zu de letschte Site";
	$lang['page_last_symbol'] = "&raquo;";
	$lang['page_backwards'] = "Zu de vorherige Site ga";
	$lang['page_backwards_symbol'] = "&lsaquo;";
	$lang['anchor'] = "Zu dem Itrag gumpe";
	$lang['from'] = "us";
	$lang['at'] = "bi dere";
	$lang['oclock'] = "Zit";
	$lang['comment'] = "Kommentar";
	$lang['email_yes'] = "eMail vo {ENTRY_NAME}";
	$lang['email_no'] = "{ENTRY_NAME} will kei eMails &uuml;bers G&auml;schtebuech.";
	$lang['hp_of'] = "Internetsite vo {ENTRY_NAME}";
	$lang['gravatar'] = "Gravatar von {ENTRY_NAME}";
	$lang['quote'] = "Zitat von";

	// NEWENTRY.PHP
	$lang['new_entry_name'] = "Din Name:";
	$lang['new_entry_city'] = "Dis Wohnort:";
	$lang['new_entry_email'] = "Dis eMail:";
	$lang['new_entry_icq'] = "ICQ:";
	$lang['new_entry_aim'] = "AIM:";
	$lang['new_entry_msn'] = "MSN:";
	$lang['new_entry_fb'] = "Facebook:";
	$lang['new_entry_twitter'] = "Twitter:";
	$lang['new_entry_hp'] = "Internetsite:";
	$lang['new_entry_message'] = "Dini Nachricht:";
	$lang['necessary_fields'] = "[ Pflichtf&auml;lder sind mit eme Stern (*) kennzeichnet ]";
	$lang['user_notification'] = "Mit eme eMail benachrichtige, wenn de Itrag freig&auml;, oder en Kommentar dazue geschriebe worde isch.";
	$lang['user_show_email'] = "Erlaub andere Teilnehmer dir es eMail &uuml;bers Kontaktformular z'schribe. Mini eMail-Adr&auml;sse wird aber so oder so n&ouml;d azeigt.";
	$lang['user_accept_akismet_service'] = "Dieser Eintrag wird durch 'Akismet' auf Spam überprüft. Ich bin mir bewusst, dass wenn ich den Eintrag absende, persönliche Daten von mir auf einen Server in die USA geschickt werden, und akzeptiere dies.";
	$lang['send'] = "Itrag schribe";
	$lang['preview'] = "Vorschau";
	$lang['security_code'] = "Sicherheitscode";
	$lang['captcha_refresh'] = "Neues Captcha generieren";
	$lang['captcha_what_is_that'] = "Was isch das?";
	$lang['captcha_wikipedia'] = "http://de.wikipedia.org/wiki/Captcha";
	$lang['captcha_tooltip'] = " En neue Itrag erfordered d'Igab vome Sicherheitscode zum automatisierte Itr&auml;g zvermide. <b>Gib all Buechstabe i Gross-Schrift i</b> Isch de Code n&ouml;d l&auml;sbar, Klick ohni igab uf Itr&auml;ge, d&auml;nn wird en neue Code azeigt.";
	$lang['back_to_mainpage'] = "Zrugg zu de Haubtsite";
	$lang['back'] = "Zrugg";
	$lang['entry_success_mod'] = "De Itrag isch gschpeichered worde, de Admin wird en beguetachte und den w&auml;ner ok isch freischalte.";
	$lang['entry_success'] = "De Itrag isch gschpeichered und isch jetz Online.";
	$lang['forwarding'] = "Si werdet i 5 Sekunde automatisch witergeleitet. W&auml;nn n&ouml;d, den klicked Si bitte uf ''Zrugg zu de Haubtsite''.";
	$lang['sendmail_admin_title'] = "Neue G&auml;stebuechitrag vo '{NAME}'";
	$lang['sendmail_user_title'] = "Ihre Itrag auf {DOMAIN}";

	// EMAIL.PHP
	$lang['email_name'] = "Ihre Name:";
	$lang['email_email'] = "Ihres eMail:";
	$lang['email_message'] = "Ihri Nachricht:";
	$lang['email_sent_to'] = "Die eMail wird gschickt a:";
	$lang['email_send'] = "Abs&auml;nde";
	$lang['email_caption'] = "eMail von '{NAME}' &uuml;ber das G&auml;stebuch von {DOMAIN}";
	$lang['email_sender'] = "Absender:";
	$lang['email_receiver'] = "Empf&auml;nger:";
	$lang['email_from'] = "&uuml;ber:";
	$lang['email_sendcopytome'] = "Ich m&ouml;chti e Kopie vo dem eMail &uuml;bercho.";
	$lang['email_success'] = "Ihri eMail isch erfolgrich a de Benutzer verschickt worde.";
	$lang['email_fail'] = "Die eMail h&auml;t n&ouml;d verschickt werde ch&ouml;ne. M&ouml;glicherwis git's es Problem mit em Mailserver.";

	// ERRORMESSAGES
	$lang['errormessage'][1] = "Aso ohni en Itrag-Text bringt das n&uuml;t!";
	$lang['errormessage'][2] = "Es mues e g&uuml;ltigi eMail-Adr&auml;sse ig&auml; werde!";
	$lang['errormessage'][3] = "Es mues en Name ig&auml; werde!";
	$lang['errormessage'][4] = "Das isch kei g&uuml;ltigi<br>eMail Adr&auml;sse!";
	$lang['errormessage'][5] = "ist keine g&uuml;ltige<br>ICQ Nummer!";
	$lang['errormessage'][6] = "D'IP-Sperre verb&uuml;tet en neue Itrag!";
	$lang['errormessage'][7] = "De Sicherheitscode isch falsch oder n&ouml;d ig&auml;&auml; worde!";
	$lang['errormessage'][8] = "D&auml; M&auml;nsch will kei eMail empfange!";
	$lang['errormessage'][9] = "Es isch en Fehler bim eMail-Versand uftr&auml;te!";
	$lang['errormessage'][10] = "Spamschutz: Das Formular wurde zu schnell abgesendet. Bitte warte noch {TIME_LOCK_REST} Sekunden.";
	$lang['errormessage'][11] = "Die Akismet-Einverständniserklärung wurde nicht akzeptiert.<br>Um den Eintrag übernehmen zu können, muss sie akzeptiert werden.";
	$lang['errormessage'][12] = "Diese eMail ist f&uuml;r Eintragungen gesperrt.";
	$lang['errormessage'][13] = "Dieser Domainbereich ist f&uuml;r Eintragungen gesperrt.";
	$lang['errormessage'][14] = "Diese IP-Adresse ist f&uuml;r Eintragungen gesperrt.";
	$lang['errormessage'][15] = "ist kein g&uuml;ltiger Facebook Name. Bitte beachten: Es d&uuml;rfen keine Sonderzeichen und/oder Umlaute enthalten sein! '&auml;' wird z.B. zu 'a'.";
	$lang['errormessage'][16] = "ist kein g&uuml;ltiger Twitter Name. Bitte beachten: Es d&uuml;rfen keine Sonderzeichen und/oder Umlaute enthalten sein! '&auml;' wird z.B. zu 'a'.";
	$lang['errormessage'][17] = "Die sehr schnelle Tippgeschwindigkeit weist daraufhin, dass Sie ein Spamroboter sind. Sie wurden f&uuml;r {KEYSTROKE_BAN_TIME} Sekunden geblockt. Sollte dies ein Missverst&auml;ndnis sein, k&ouml;nnen Sie sich beim Administrator melden.";
	$lang['errormessage'][18] = "Sie wurden f&uuml;r zu schnelles Tippen geblockt. Der Verdacht liegt nahe, dass Sie ein Spamroboter sind. Bitte warten Sie noch {KEYSTROKE_BAN_TIME_REST} Sekunden.";

	// BBCODES
	$lang['bbcodes'] = "BBCodes:";
	$lang['bbcode_bold'] = "Fett";
	$lang['bbcode_help_bold'] = "Fette Darstellung des Textes";
	$lang['bbcode_italic'] = "Kursiv";
	$lang['bbcode_help_italic'] = "Kursive Darstellung des Textes";
	$lang['bbcode_url'] = "URL";
	$lang['bbcode_help_url'] = "F&uuml;gt einen Hyperlink ein. M&ouml;glich sind: [url]http://www.test.ch/[/url] oder [url=http://www.test.ch/]Test[/url] oder [url=http://www.test.ch/][img]Adresse zum Bild[/img][/url]";
	$lang['bbcode_img'] = "Grafik";
	$lang['bbcode_help_img'] = "F&uuml;gt ein Bild ein. M&ouml;glich sind: [img]Adresse zum Bild[/img] oder [img=Breite,H&ouml;he]Adresse zum Bild[/img]";
	$lang['bbcode_flash'] = "Flash";
	$lang['bbcode_help_flash'] = "F&uuml;gt ein Flashvideo ein. -> [flash=Breite,H&ouml;he]URL[/flash]";
	$lang['bbcode_quote'] = "Zitat";
	$lang['bbcode_help_quote'] = "F&uuml;gt ein Zitat ein. M&ouml;glich sind: [quote]Zitat[/quote] oder [quote=Name des Zitierten]Zitat[/quote]";
	$lang['bbcode_textsize'] = "Schriftgr&ouml;ssi";
	$lang['bbcode_extrasmall'] = "Winzig";
	$lang['bbcode_small'] = "Chli";
	$lang['bbcode_default'] = "Standard";
	$lang['bbcode_big'] = "Gross;";
	$lang['bbcode_extrabig'] = "Riesig";
	$lang['bbcode_textcolor'] = "Schriftfarb";
	$lang['bbcode_help_size'] = "Schriftgr&ouml;ssi";
	$lang['smileys'] = "Smilies:";
?>
