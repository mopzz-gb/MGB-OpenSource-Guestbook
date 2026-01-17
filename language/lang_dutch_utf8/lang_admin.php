<?php
	/*
	MGB 0.7.x - OpenSource PHP and MySql Guestbook
	Copyright (C) 2004 - 2013 Juergen Grueneisl - http://www.m-gb.org/

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	he Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

	======================
	lang_admin.php - Dutch
	======================

	This languagefile was translated by Gerard Vandeninden gerard@brookstruefriends.nl
	*/

	// GENERAL
	$lang['no'] = "nee";
	$lang['yes'] = "ja";
	$lang['min'] = "minimum";
	$lang['max'] = "maximum";
	$lang['asc'] = "Aflopend";
	$lang['desc'] = "Oplopend";
	$lang['save'] = "Opslaan";
	$lang['administrator'] = "administrator";
	$lang['moderator'] = "moderator";
	$lang['forever'] = "Voor Altijd";
	$lang['one_month'] = "1 Maand";
	$lang['one_day'] = "1 Dag";
	$lang['one_hour'] = "1 Uur";
	$lang['one_minute'] = "1 Minuut";
	$lang['never'] = "Nooit";
	$lang['time_second'] = "Seconde";
	$lang['time_seconds'] = "Seconden";
	$lang['time_minute'] = "Minuut";
	$lang['time_minutes'] = "Minuten";
	$lang['time_hour'] = "Uur";
	$lang['time_hours'] = "Uren";
	$lang['time_day'] = "Dag";
	$lang['time_days'] = "Dagen";
	$lang['time_month'] = "Maand";
	$lang['time_months'] = "Maanden";
	$lang['time_year'] = "Jaar";
	$lang['time_years'] = "Jaren";
	$lang['age'] = "Leeftijd";
	$lang['old'] = "oud";

	// LOGIN.INC.PHP
	$lang['title'] = "MGB OpenSource Guestbook - Administratie";
	$lang['login_username'] = "Usernaam:";
	$lang['login_password'] = "wachtwoord:";
	$lang['login_lostpassword'] = "wachtwoord vergeten";
	$lang['login'] = "Log in";
	$lang['logout'] = "Log uit";
	$lang['login_ok'] = "Welkom <b>{SESSION_USERNAME}</b>.";
	$lang['logged_in'] = "Je bent ingelogd als <b>{SESSION_USERNAME}</b>";
	$lang['logged_out'] = "Vul gerbruikernaam en wachtwoord in.";
	$lang['please_wait'] = "Je bent succesvol ingelogd.<br>Een moment a.u.b....";

	// ERRORMESSAGES
	$lang['errormessage'][1] = "Vul alle velden in A.U.B.!";
	$lang['errormessage'][2] = "Deze naam/wachtwoord combinatie bestaat niet.";
	$lang['errormessage'][3] = "Uw gebruikersaccount is gedeactiveerd door de administrator.";
	$lang['errormessage'][4] = "U heeft geen toegang tot deze site.";
	$lang['errormessage'][5] = "Het wachtwoord is verkeerd.";
	$lang['errormessage'][6] = "De nieuwe wachtwoorden zijn niet gelijk.";
	$lang['errormessage'][7] = "Het e-mail adres is niet geldig of het veld is leeg.";
	$lang['errormessage'][8] = "Je kan je eigen administrator rechten niet verwijderen, ook ka je je eigen account niet disabelen of deleten.";
	$lang['errormessage'][9] = "Je bent automatisch gedeactiveerd omdat je te lang inactief was.";
	$lang['errormessage'][10] = "Bij je vorige bezoek heb je niet correct uitgelogd. Het susteem heeft dit voor jou gedaan.<br><br>Gebruik voor je eigen veiligheid altijd de ''Logout'' knop om uit te loggen.";
	$lang['errormessage'][11] = "Deze gebruikersnaam of email adres is al in gebruik.";
	$lang['errormessage'][12] = "Dit wachtwoord is ongeldig of is verlopen.";
	$lang['errormessage'][13] = "Voor deze gebruiker is al een nieuw wachtwoord aangevraagd.<br>Het is niet mogelijk een ander wachtwoord aan te vragen voordat het nieuwe wachtwoord is geactiveerd of verlopen.";
	$lang['errormessage'][14] = "De email kan niet verzonden worden. Misschien is er een probleem met de mailserver.";
	$lang['errormessage'][15] = "De nieuwe versie kan niet opgehaald worden omdat <a href=\"http://php.net/manual/en/function.fopen.php\">fopen()</a> gedeavtveerd is op jouw server.<br>Neem contact op met je host om dit probleem op te lossen.<br><br>Kijk voor de laatste versie van MGB op http://www.m-gb.org/.";
	$lang['errormessage'][16] = "Je nieuwe wachtwoord is te kort. veilige wachtwoorden moeten minstens {PASSWORD_MIN_LENGTH} karakters lang zijn.";
	$lang['errormessage'][17] = "SQL Dump kan niet gemaakt worden.<br>controleer of de directory 'save' writable is.";
	$lang['errormessage'][18] = "CSV kan niet gemaakt worden.<br>controleer of de directory 'save' writable is.";
	$lang['errormessage'][19] = "Er is een fout opgetreden tijdens het verwijderen van de backup!";
	$lang['errormessage'][20] = "Er is geen backup geselecteerd";
	$lang['errormessage'][21] = "Er is een fout opgetreden tijdens het terugplaatsen van de backup!";
	$lang['errormessage'][22] = "Er is een fout opgetreden tijdens het verwijderen van de tabel!";

	// ERRORMESSAGES EMPTY VALUES
	$lang['empty_needed_value'][1] = "Titel ontbreekt";
	$lang['empty_needed_value'][2] = "Auteur ontbreekt";
	$lang['empty_needed_value'][3] = "Tijdzone ontbreekt";
	$lang['empty_needed_value'][4] = "Admin naam ontbreekt";
	$lang['empty_needed_value'][5] = "Admin emailadres ontbreekt";
	$lang['empty_needed_value'][6] = "Gastenboek emailadres ontbreekt";
	$lang['empty_needed_value'][7] = "Ontbrekende entries per site";
	$lang['empty_needed_value'][8] = "Date format ontbreekt";
	$lang['empty_needed_value'][9] = "Maximum breedte voor afbeelding ontbreekt";
	$lang['empty_needed_value'][10] = "Maximum hoogte voor afbeelding ontbreekt";
	$lang['empty_needed_value'][11] = "Maximum breedte voor flash ontbreekt";
	$lang['empty_needed_value'][12] = "Maximum hoogte voor flash ontbreekt";
	$lang['empty_needed_value'][13] = "Waarde voor smiley line break ontbreekt";
	$lang['empty_needed_value'][14] = "Gravatar size ontbreekt";
	$lang['empty_needed_value'][15] = "Verkeerde of missende waarde voor minimum wachtwoord lengte";
	$lang['empty_needed_value'][16] = "Verkeerde of missende waarde voor Captcha lengte";
	$lang['empty_needed_value'][17] = "Verkeerde of missende waarde voor maximum inlog pogingen wanneer de gebruiker is geblokkeerd";
	$lang['empty_needed_value'][18] = "Missende waarde voor de hoek van de Captcha";
	$lang['empty_needed_value'][19] = "Verkeerde of missende waarde voor sessie timeout";
	$lang['empty_needed_value'][20] = "Missende waarde voor Captcha X-Coordinaten";
	$lang['empty_needed_value'][21] = "Missende waarde voor Captcha Y-Coordinaten";
	$lang['empty_needed_value'][22] = "Missende Captcha kleur";
	$lang['empty_needed_value'][23] = "Voor de activatie van Akismet is een API sleutel vereist";
	$lang['empty_needed_value'][24] = "Missende waarde voor minimum tijd voor time lock";
	$lang['empty_needed_value'][25] = "Missende waarde voor maximum tijd voor time lock";
	$lang['empty_needed_value'][26] = "Verkeerde of missende waarde voor het aantal inlogpogingen";
	$lang['empty_needed_value'][27] = "Missende E-Mail tekst: admin";
	$lang['empty_needed_value'][28] = "Missende E-Mail tekst: Thank-You-Mail (unmoderated)";
	$lang['empty_needed_value'][29] = "Missende E-Mail tekst: Thank-You-Mail (moderated)";
	$lang['empty_needed_value'][30] = "Missende E-Mail tekst: activation-mail";
	$lang['empty_needed_value'][31] = "Missende E-Mail tekst: comment-notification";
	$lang['empty_needed_value'][32] = "Missende E-Mail tekst: contact-mail";
	$lang['empty_needed_value'][33] = "Missende E-Mail tekst: contact-mail (copy)";
	$lang['empty_needed_value'][34] = "Waarde voor verkeerde captcha count ontbreekt";
	$lang['empty_needed_value'][35] = "Ontbrekende publieke of private key voor reCaptcha<br>of reCaptcha is niet goed geinstalleerd";
	$lang['empty_needed_value'][36] = "Vul SMTP Server in";
	$lang['empty_needed_value'][37] = "Vul SMTP Poort in";
	$lang['empty_needed_value'][38] = "Vul SMTP username in";
	$lang['empty_needed_value'][39] = "Vul SMTP password in";
	$lang['empty_needed_value'][40] = "phpmailer niet gevonden in de map ''plugins/phpmailer/''.";
	$lang['empty_needed_value'][41] = "Salt bevat verboden karakters.";
	$lang['empty_needed_value'][42] = "Der L&auml;ngenwert f&uuml;r die dynamischen Feldvariblen darf nicht leer/null,<br>kleiner als drei oder gr&ouml;&szlig;er als 255 sein.";

	// SPAM TYPES
	$lang['spam_entry_type'][1] = "Geblokkeerd door ip-banlist.";
	$lang['spam_entry_type'][2] = "Op de spam lijst,maar niet in de banlist.";
	$lang['spam_entry_type'][3] = "Geblokkeerd door email banlist.";
	$lang['spam_entry_type'][4] = "Geblokkeerd door domein banlist.";
	$lang['spam_entry_type'][5] = "Geblokkeerd door time lock.";
	$lang['spam_entry_type'][6] = "Updated door Akismet.";
	$lang['spam_entry_type'][7] = "Nieuwer vermelding door Akismet.";
	$lang['spam_entry_type'][8] = "Geupdate door verkeerde captcha.";
	$lang['spam_entry_type'][9] = "Nieuwe vermelding door verkeerde captcha.";
	$lang['spam_entry_type'][10] = "Captcha is ok, maar is op spam lijst.";
	$lang['spam_entry_type'][11] = "Blocked by Keystroke.";

	// SPAM.INC.PHP
	$lang['spam_add_to_ip_banlist'] = "Toevoegen aan ip-banlist.";
	$lang['spam_add_to_email_banlist'] = "Toevoegen aan email banlist.";
	$lang['spam_add_to_domain_banlist'] = "Toevoegen aan domein banlist.";
	$lang['spam_added_to_ip_list'] = " is toegevoegd aan ip-banlist.";
	$lang['spam_added_to_email_list'] = " is toegevoegd aan email banlist.";
	$lang['spam_added_to_domain_list'] = " is toegevoegd aan domain banlist.";
	$lang['spam_is_already_on_ip_list'] = " is al op ip-banlist.";
	$lang['spam_is_already_on_email_list'] = "  is al op email banlist.";
	$lang['spam_is_already_on_domain_list'] = "  is al op domein banlist.";
	$lang['updated_ips'] = "{COUNTER} ip adressen zijn in {SECONDS} seconden geupdate.";
	$lang['updated_emails'] = "{COUNTER} email adressen zijn in {SECONDS} seconden geupdate.";
	$lang['updated_domains'] = "{COUNTER} domeinen zijn in {SECONDS} seconden geupdate.";

	// GENERAL STRINGS
	$lang['back_to_mainpage'] = "Terug naar de hoofdpagina";
	$lang['back'] = "Terug";
	$lang['go'] = "Go!";
	$lang['entry'] = "Bericht";
	$lang['entries'] = "Berichten";
	$lang['no_entries'] = "Geen berichten beschikbaar.";
	$lang['no_deactivated_entries'] = "Geen gedeactiveerde berichten beschikbaar.";
	$lang['no_activated_entries'] = "Geen geactiveerde berichten beschikbaar";
	$lang['no_spam_entries'] = "No spam entries available.";
	$lang['entries_on_pages'] = "berichten op {PAGES} pages";
	$lang['page_first'] = "eerste pagina";
	$lang['page_first_symbol'] = "&laquo;";
	$lang['page_forwards'] = "1 pagina vooruit";
	$lang['page_forwards_symbol'] = "&rsaquo;";
	$lang['page_last'] = "Laatste pagina";
	$lang['page_last_symbol'] = "&raquo;";
	$lang['page_backwards'] = "1 pagina terug";
	$lang['page_backwards_symbol'] = "&lsaquo;";
	$lang['captcha_method_code'] = "Securitycode";
	$lang['captcha_method_math'] = "Mathematic";
	$lang['activate_entry'] = "Activeer dit bericht";
	$lang['deactivate_entry'] = "Deactiveer dit bericht";
	$lang['delete_entry'] = "Verwijder dit bericht";
	$lang['mark_as_spam'] = "Markeren als spam";
	$lang['nospam_entry'] = "Markeren als 'geen spam' en activeren";
	$lang['nospam_deactivate_entry'] = "Markeren als 'geen spam' MAAR niet activeren";
	$lang['active'] = "Dit bericht is geactiveerd in het gastenboek";
	$lang['inactive'] = "Dit bericht niet is geactiveerd in het gastenboek";
	$lang['edit_entry'] = "Bewerk dit bericht";
	$lang['timestamp'] = "Tijdstempel";
	$lang['quote'] = "Citeren uit";

	// GRAVATAR
	$lang['gravatar_position_left'] = "Links van het bericht";
	$lang['gravatar_position_right'] = "Rechts van het bericht";
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

	//DROPDOWNS
	$lang['do_nothing'] = "Doe niets ...";
	$lang['delete_whole_spam'] = "Delete alle spam entries";
	$lang['mark_all_no_spam_deactivate'] = "Markeer alle entries als 'geen spam' en activeer deze";
	$lang['mark_all_no_spam_activate'] = "Markeer alle entries als 'geen spam' MAAR niet activeren";
	$lang['mark_all_as_spam'] = "Markeer alle entries als spam";
	$lang['activate_all_entries'] = "Activeer alle entries";
	$lang['deactivate_all_entries'] = "Deactiveer alle entries";
	$lang['delete_all_entries'] = "Delete alle entries";
	$lang['put_all_ips_on_banlist'] = "- Voeg alle nieuwe ip adressen toe aan IP-banlist";
	$lang['put_all_emails_on_banlist'] = "- Voeg alle nieuwe emails toe aan E-Mail banlist";
	$lang['put_all_domains_on_banlist'] = "- Voeg alle nieuwe domeinen toe aan Domain banlist";
	$lang['put_all_on_banlists_and_delete_everything'] = "- Voeg alle nieuwe email en ip adressen toe aan de banlists en verwijder de logentries";
	$lang['show_banned_by_ip_only'] = "-- Laat alleen banned by ip zien";
	$lang['show_banned_by_email_only'] = "-- Laat alleen banned by email zien";
	$lang['show_banned_by_domain_only'] = "-- Laat alleen banned by domain zien";
	$lang['show_banned_by_keystroke_only'] = "-- Laat alleen banned by keystroke zien";
	$lang['show_banned_by_captcha_only'] = "-- Laat alleen blocked by captcha zien";
	$lang['export_as_sql_dump'] = "--- Exporteer als SQL Dump";
	$lang['export_as_csv'] = "--- Exporteer als CSV";

	// CONFIRMS
	$lang['confirm_general'] = "Accepteer veranderingen?";
	$lang['confirm_delete'] = "Weet je zeker dat je deze entry wil verwijderen?";
	$lang['confirm_delete_spam'] = "Delete alle spam entries?";
	$lang['confirm_add_to_permanent_ip_blocklist'] = "Weet je zeker dat je deze wil toevoegen aan de IP banlist?";
	$lang['confirm_add_to_permanent_email_blocklist'] = "Weet je zeker dat je deze wil toevoegen aan de E-Mail banlist?";
	$lang['confirm_add_to_permanent_domain_blocklist'] = "Weet je zeker dat je deze wil toevoegen aan de Domain banlist?";
	$lang['confirm_restore_backup'] = "Weet je zeker dat je deze backup wil terugzetten?";
	$lang['confirm_delete_backup'] = "Weet je zeker dat je deze backup wil verwijderen?";
	$lang['confirm_changes_smiley'] = "Aanvaard veranderingen in bestaande smilies?";

	// MAILS
	$lang['standard_mail'] = "mail()";
	$lang['phpmailer'] = "phpmailer";
	$lang['sendmail_user_notification_title'] = "Je bericht op {DOMAIN} is geactiveerd";
	$lang['sendmail_user_comment_title'] = "Aan je bericht op {DOMAIN} is een commentaar toegevoegd";
	$lang['sendmail_adduser_title'] = "Je gebruiker gegevens op {DOMAIN}";
	$lang['sendmail_adduser_text'] = "Je bent geregistreerd op {DOMAIN} door een administrator. Hier zijn je gegevens:<br /><br />Gebruikernaam: {ADDUSER_NAME}<br />Wachtwoord: {ADDUSER_PASSWORD}<br /><br />Je kan hier inloggen: {ADDUSER_URL}";
	$lang['sendmail_admin_text'] = "{NAME} heeft een nieuw bericht in het gastenboek aangemaakt.<br /><br />Datum: {DATE}<br />Tijd: {TIME}<br /><br />---<br />{MESSAGE}<br />---<br /><br />{URL_TO_GB}";
	$lang['sendmail_user_text'] = "Hallo {NAME},<br /><br />Bedankt voor je bericht in ons gastenboek.";
	$lang['sendmail_user_text_moderated'] = "Hallo {NAME},<br /><br />Bedankt voor je bericht in ons gastenboek. Na beoordeling zal ik dit z.s.m. activeren.";
	$lang['sendmail_user_notification_text'] = "Hallo {NAME},<br /><br />Je bericht op {DOMAIN} is nu geactiveerd. Je kan het hier bekijken: {URL_TO_GB}";
	$lang['sendmail_comment_text'] = "Hallo {NAME},<br /><br />Aan jou bericht<br /><br />---<br />{MESSAGE}<br />---<br /><br />is net een commentaar toegevoegd. Je kan het hier bekijken: {URL_TO_GB}";
	$lang['sendmail_contactmail_text'] = "Je hebt een e-mail van {NAME} over het gastenboek van {DOMAIN}. Hier volgt het bericht:<br /><br />---<br />{MESSAGE}<br />---<br /><br />Datum: {DATE}<br />Tijd: {TIME}";
	$lang['sendmail_contactmail_text_copy'] = "Je hebt een email gestuurd naar {NAME} met het gastenboek van {DOMAIN}. Hier een copie van dit bericht:<br /><br />---<br />{MESSAGE}<br />---<br /><br />Datum: {DATE}<br />Tijd: {TIME}";
	$lang['sendmail_new_password_title'] = "Nieuw wachtwoord: Authenticatie";
	$lang['sendmail_new_password_text'] = "Hallo {NAME},<br /><br />Voor jou account is een nieuw wachtwoord gecreeerd. Om dit te valideren klik op de link hieronder binnen de volgende 24h. totdat het nieuwe is geactiveerd blijft het oude geldig.<br /><br />Als de link niet binnen 24h geklikt wordt verloopt het nieuwe wachtwoord.<br /><br />{NEW_PASSWORD_LINK}";
	$lang['sendmail_new_password_created_title'] = "Het nieuwe wachtwoord is geactiveerd.";
	$lang['sendmail_new_password_created_text'] = "Hallo {NAME},<br /><br />je nieuwe wachtwoord is geactiveerd. Hierbij je	vernieuwde gebruiker gegevens.<br /><br />Usernaam: {NAME}<br />Wachtwoord: {NEW_PASSWORD}";

	// NAVIGATION
	$lang['settings'] = "Instellingen";
	$lang['settings_general'] = "General";
	$lang['settings_look'] = "Look & feel";
	$lang['settings_bbcodes'] = "BBCodes";
	$lang['settings_emoticons'] = "Emoticons";
	$lang['settings_gravatar'] = "Gravatar";
	$lang['settings_security'] = "Security";
	$lang['settings_mails'] = "E-Mails";
	$lang['settings_database'] = "Database";
	$lang['activate'] = "Berichten activeren";
	$lang['deactivate'] = "Berichten deactiveren";
	$lang['delete'] = "Berichten verwijderen";
	$lang['edit'] = "Berichten bewerken";
	$lang['spam'] = "Spam entries";
	$lang['edit_smilies'] = "Bewerk smilies";
	$lang['edit_users'] = "Gebruiker administratie";
	$lang['banlists'] = "Manage banlists";
	$lang['banlist_ips'] = "IP banlist";
	$lang['banlist_emails'] = "E-Mail banlist";
	$lang['banlist_domains'] = "Domain banlist";
	$lang['spam_log'] = "Spam log";
	$lang['stats'] = "Statistieken";
	$lang['license'] = "Licentie";
	$lang['forum'] = "Forum";
	$lang['bugreport'] = "Bug rappoteren";
	$lang['version'] = "Versie";
	$lang['manual'] = "Documentatie";
	$lang['fb_nav'] = "MGB on Facebook";
	$lang['to_guestbook'] = "Naar het gastenboek";
	$lang['paypal'] = "Als je MGB goed vindt, kan je een donatie aan het project geven om verdere ontwikkelingen te steunen.";

	// SETTINGS
	$lang['edit_caption_general'] = "Algemene instellingen";
	$lang['edit_caption_look'] = "Look &amp; feel";
	$lang['edit_caption_bbcodes'] = "BBCodes";
	$lang['edit_caption_smilies'] = "Emoticons";
	$lang['edit_caption_gravatars'] = "Gravatar-support";
	$lang['edit_caption_security'] = "Security";
	$lang['edit_caption_antispam'] = "Anti-Spam";
	$lang['edit_caption_captcha'] = "Captcha";
	$lang['edit_caption_recaptcha'] = "reCaptcha";
	$lang['edit_caption_dynamic_fieldnames'] = "Dynamische Fieldvariables";
	$lang['edit_caption_akismet'] = "Akismet-Plugin";
	$lang['edit_caption_time_lock'] = "Time lock";
	$lang['edit_caption_mail_settings'] = "eMail settings";
	$lang['edit_caption_smtp_settings'] = "De volgende gegevens zijn alleen nodig als je mail wil versturen met phpmailer (smtp) en als je server authenticatie vereist.";
	$lang['edit_caption_email'] = "e-mail";
	$lang['edit_caption_database'] = "Database informatie";
	$lang['edit_caption_database_backups'] = "Database Backups";
	$lang['edit_caption_keystroke'] = "Keystroke";
	$lang['edit_save_message'] = "Instellingen succesvol opgeslagen.";
	$lang['edit_title'] = "Titel:";
	$lang['edit_h_author'] = "Auteur:";
	$lang['edit_h_domain'] = "Domein:";
	$lang['edit_gb_path'] = "Pad naar het gastenboek:";
	$lang['edit_h_keywords'] = "Keywords:";
	$lang['edit_h_description'] = "Beschrijving:";
	$lang['edit_timezone'] = "Timezone:";
	$lang['edit_announcement_message'] = "Announcement message:";
	$lang['edit_admin_name'] = "Naam van administrator:";
	$lang['edit_admin_email'] = "E-mail adres van administrator:";
	$lang['edit_admin_gbemail'] = "E-mail adres van gastenboek:";
	$lang['edit_caching'] = "Caching:";
	$lang['edit_sendmail_admin'] = "E-mail bericht versturen:";
	$lang['edit_sendmail_admin_text'] = "Tekst voor bericht:";
	$lang['edit_sendmail_user'] = "Bedankt mail naar de gebruiker:";
	$lang['edit_sendmail_user_text'] = "Tekst voor bedankje (not moderated):";
	$lang['edit_sendmail_user_text_moderated'] = "Tekst voor bedankje (moderated):";
	$lang['edit_sendmail_user_notification_text'] = "Tekst voor activatiemail:";
	$lang['edit_sendmail_comment_text'] = "Tekst voor commentaar mail:";
	$lang['edit_sendmail_contactmail_text'] = "Tekst voor e-mail over het gastenboek:";
	$lang['edit_sendmail_contactmail_text_copy'] = "tekst voor een copie van een mail door het gastenboek:";
	$lang['edit_template_path'] = "Template:";
	$lang['edit_template_style_path'] = "Template-Style:";
	$lang['edit_iconset_path'] = "Iconset:";
	$lang['edit_language_path'] = "Taal:";
	$lang['edit_badwords'] = "Badwords:";
	$lang['edit_bbcode'] = "BBcodes:";
	$lang['edit_allow_img_tag'] = "IMG-Tag toestaan:";
	$lang['edit_max_img_width'] = "Maximum Breedte van afbeelding:";
	$lang['edit_max_img_height'] = "Maximum Hoogte van afbeelding:";
	$lang['edit_center_img'] = "Centreer afbeeldingen:";
	$lang['edit_allow_flash_tag'] = "FLASH-Tag toestaan:";
	$lang['edit_max_flash_width'] = "Maximum Breedte van Flash:";
	$lang['edit_max_flash_height'] = "Maximum Hoogte van Flash:";
	$lang['edit_center_flash'] = "Centreer Flash:";
	$lang['edit_smileys'] = "Smilies:";
	$lang['edit_smileys_break'] = "Aantal smilies per regel:";
	$lang['edit_smileys_order'] = "Volgorde van smilies:";
	$lang['edit_blocktime'] = "Blocktime:";
	$lang['edit_captcha'] = "Captcha:";
	$lang['edit_captcha_method'] = "Soort captcha:";
	$lang['edit_recaptcha_pub_key'] = "reCaptcha Public Key:";
	$lang['edit_recaptcha_private_key'] = "reCaptcha Private Key:";
	$lang['edit_recaptcha_style'] = "reCaptcha Style:";
	$lang['edit_captcha_length'] = "Lengte van Captcha:";
	$lang['edit_captcha_salt'] = "Salt:";
	$lang['edit_captcha_hash_method'] = "Hash:";
	$lang['edit_captcha_double_hash'] = "Throw the dice twice:";
	$lang['edit_captcha_coords'] = "Captcha co&ouml;rdinaten:";
	$lang['edit_captcha_color'] = "Captcha tekstkleur:";
	$lang['edit_captcha_angle'] = "Captcha hoek:";
	$lang['edit_wrong_captcha_count'] = "Maximum aantal verkeerde captchas:";
	$lang['edit_akismet_plugin'] = "Akismet-Plugin:";
	$lang['edit_akismet_api'] = "Akismet API Key:";
	$lang['edit_akismet_mark_as_spam'] = "Spam markering:";
	$lang['edit_time_lock'] = "Wachttijd tot volgende bericht:";
	$lang['edit_time_lock_value'] = "Minimum Wachttijd:";
	$lang['edit_time_lock_maxtime'] = "Maximum Wachttijd:";
	$lang['edit_time_lock_spam_count'] = "Maximum aantal keren dat het formulier te vroeg verzonden wordt:";
	$lang['edit_user_notification'] = "Gebruiker bericht:";
	$lang['edit_user_show_email'] = "Gebruiker mail in het gastenboek:";
	$lang['edit_session_timeout'] = "Sessie timeout:";
	$lang['edit_password_min_length'] = "Minimum lengte voor wachtwoorden:";
	$lang['edit_moderated'] = "Gecontroleerd Gastenboek:";
	$lang['edit_require_email'] = "eMail noodzakelijk:";
	$lang['edit_entries_per_page'] = "Berichten per pagina:";
	$lang['edit_entries_order'] = "Volgorde van de berichten:";
	$lang['edit_entries_order_asc_desc'] = "Sorteervolgorde:";
	$lang['edit_entries_numbering'] = "Nummervolgorde:";
	$lang['edit_spam_protection'] = "E-mail spam beveiliging:";
	$lang['edit_spam_mail'] = "E-Mail address voor spam berichtgeving:";
	$lang['edit_ipblocker'] = "IP-Blocker:";
	$lang['edit_wordwrap'] = "Wordwrap:";
	$lang['edit_dateform'] = "Datum formaat:";
	$lang['edit_gravatar_show'] = "activeer gravatars:";
	$lang['edit_gravatar_rating'] = "Gravatar rating:";
	$lang['edit_gravatar_type'] = "Niet geregistreerde gravatars:";
	$lang['edit_gravatar_size'] = "Gravatar grootte:";
	$lang['edit_gravatar_position'] = "Plaats:";
	$lang['edit_banlist_ips'] = "IP banlist is actief:";
	$lang['edit_banlist_emails'] = "E-Mail banlist is actief:";
	$lang['edit_banlist_domains'] = "Domain banlist is actief:";
	$lang['edit_banlist_log'] = "Log blocked spam entries:";
	$lang['edit_debug_mode'] = "Debug Mode:";
	$lang['edit_general_info'] = "Algemene informatie:";
	$lang['edit_server_name'] = "Host:";
	$lang['edit_database_name'] = "Database naam:";
	$lang['edit_server_document_root'] = "Root directory:";
	$lang['edit_database_type'] = "Database type:";
	$lang['edit_database_version'] = "Database versie:";
	$lang['edit_database_prefix'] = "Prefix voor deze MGB Installatie:";
	$lang['edit_php_version'] = "PHP Versie:";
	$lang['edit_backup'] = "Backup:";
	$lang['edit_no_backup'] = "Er is geen backup";
	$lang['edit_database_backup_full'] = "Complete Backup:";
	$lang['edit_database_backup_entries'] = "Alleen Entries:";
	$lang['edit_database_backup_banlist_ips'] = "Alleen IP banlist:";
	$lang['edit_database_backup_banlist_emails'] = "Alleen E-Mail banlist:";
	$lang['edit_database_backup_banlist_domains'] = "Alleen Domain banlist:";
	$lang['edit_create_db_backup_full'] = "Create";
	$lang['edit_restore_db_backup_full'] = "Restore";
	$lang['edit_delete_db_backup_full'] = "Delete";
	$lang['edit_create_db_backup_entries'] = "Create";
	$lang['edit_restore_db_backup_entries'] = "Restore";
	$lang['edit_delete_db_backup_entries'] = "Delete";
	$lang['edit_create_db_backup_banlist_ips'] = "Create";
	$lang['edit_restore_db_backup_banlist_ips'] = "Restore";
	$lang['edit_delete_db_backup_banlist_ips'] = "Delete";
	$lang['edit_create_db_backup_banlist_emails'] = "Create";
	$lang['edit_restore_db_backup_banlist_emails'] = "Restore";
	$lang['edit_delete_db_backup_banlist_emails'] = "Delete";
	$lang['edit_create_db_backup_banlist_domains'] = "Create";
	$lang['edit_restore_db_backup_banlist_domains'] = "Restore";
	$lang['edit_delete_db_backup_banlist_domains'] = "Delete";
	$lang['edit_delete_backup_successfull'] = "Backup is succesvol verwijderd!";
	$lang['edit_restore_backup_successfull'] = "Backup is succesvol teruggezet!";
	$lang['edit_mailer_method'] = "Used mailer:";
	$lang['edit_smtp_server'] = "SMTP Server:";
	$lang['edit_smtp_port'] = "SMTP Port:";
	$lang['edit_smtp_user'] = "SMTP Username:";
	$lang['edit_smtp_password'] = "SMTP Password:";
	$lang['edit_smtp_auth'] = "SMTP Authentication:";
	$lang['edit_keystroke'] = "Keystroke:";
	$lang['edit_keystroke_max_cps'] = "Maximum aantal karakters per seconde:";
	$lang['edit_keystroke_ban_time'] = "Bantijd:";
	$lang['edit_dynamic_fieldnames'] = "Dynamische Fieldvariables:";
	$lang['edit_dynamic_fieldnames_method'] = "Type variabele:";
	$lang['edit_dynamic_fieldnames_length'] = "Lengte:";

	$lang['edit_expl_title'] = "Titel van het gastenboek.";
	$lang['edit_expl_h_author'] = "Naam van de auteur van de webpagina.";
	$lang['edit_expl_h_domain'] = "Top Level Domein (TLD) waar het gastenboek is geinstalleerd <b>zonder http://</b> aan het begin en <b>/</b> op het eind. (www.voorbeeld.net)";
	$lang['edit_expl_gb_path'] = "Het pad relatief aan hetTLD waar het gastenboek is geinstalleerd.";
	$lang['edit_expl_h_keywords'] = "Keywords gescheiden door komma`s.";
	$lang['edit_expl_h_description'] = "Een korte beschrijving van de pagina.";
	$lang['edit_expl_timezone'] = "From PHP5 onwards you must set a timezone. <a href='http://www.php.net/manual/en/timezones.php' target='_blank'>List of all available timezones</a>.";
	$lang['edit_expl_announcement_message'] = "Deze tekst zal getoond worden over gastenboek entries in index.php. Daar blijft het totdat jij dit verwijderd. BBCodes and smileys zijn ook mogelijk.";
	$lang['edit_expl_admin_name'] = "De administratornaam of gewoon ''admin''.";
	$lang['edit_expl_admin_email'] = "Naar dit adres worden berichten over nieuwe gastenboek berichten gestuurd.";
	$lang['edit_expl_admin_gbemail'] = "Wordt gebruikt als afzender adres.";
	$lang['edit_expl_caching'] = "If caching is active, the guestbook entries will be loaded from the cache rather than from the database. This can decrease server load on pages with many visits.<br><br><b>ATTENTION: This feature has to be regarded as experimental. If you discover problems with the display of new entries or something similar, I recommend to deactivate this option.</b>";
	$lang['edit_expl_sendmail_admin'] = "Indien deze optie is geactiveerd, krijgt de admin e-mails wanneer er nieuwe berichten zijn.";
	$lang['edit_expl_sendmail_admin_text'] = "Deze tekst wordt naar de admin gestuurd bij nieuwe berichten.<br><br>Beschikbare placeholder: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_user'] = "Indien deze optie is geactiveerd, krijgt de gebruiker een bedank-bericht.";
	$lang['edit_expl_sendmail_user_text'] = "Deze tekst wordt naar de gebruiker gestuurd wanneer <b>bericht activatie inactief is</b> en als de Thank-You mail optie geactiveerd is.<br><br>Beschikbare placeholders: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_user_text_moderated'] = "Deze tekst wordt naar de gebruiker gestuurd wanneer <b>bericht activatie actief is</b> en als de Thank-You mail optie geactiveerd is.<br><br>Beschikbare placeholders: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_user_notification_text'] = "Deze tekst wordt naar de gebruiker gestuurd zodra zijn bericht is geactiveerd. Dit moet hij wel accepteren wanneer hij zijn bericht plaatst.<br><br>Beschikbare placeholder: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_comment_text'] = "Deze tekst wordt naar de gebruiker gestuurd, wanneer een admin een commentaar aan zijn bericht toevoegd. Dit moet hij wel accepteren wanneer hij zijn bericht plaatst.<br><br>Beschikbare placeholder: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_contactmail_text'] = "Deze tekst wordt naar de gebruikers gestuurd, als zij een e-mail krijgen over spam beveiliging.<br><br>Beschikbare placeholder: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_contactmail_text_copy'] = "Deze tekst wordt naar de verzender gestuurd samen met een copie van zijn bericht verstuurd door het gastenboek terwijl spam-protectie actief is.<br><br>Beschikbare placeholders: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_template_path'] = "De template die gebruikt gaat worden.";
	$lang['edit_expl_template_style_path'] = "De gewenste stijl van de template. Je kan dit niet selecteren totdat deze geladen is.";
	$lang['edit_expl_iconset_path'] = "De gewenste grafic-set die de icons levert, smileys en captcha-achtergronden onafhankelijk van de template.";
	$lang['edit_expl_language_path'] = "De taal die gebruikt wordt.<br><br><b>ATTENTIE:</b> Sinds versie <b>0.6.5</b> zijn talen die caracterset latin9 (iso-8859-15) gebruiken <b>NIET LANGER</b> ondersteund. Als je problemen hebt met missende variabelen, lege tekstvelden, enz, probeer over te schakelen naar een utf-8 taal en verwijder alle ''latin9''-talen uit de map ''language''.<br><br>Als je dan nog problemen hebt met umlauts of speciale caracters voer dan ''convert_ansi.php'' in de map 'install' uit.";
	$lang['edit_expl_language_author'] = "Auteur:";
	$lang['edit_expl_language_charset'] = "Tekenset:";
	$lang['edit_expl_badwords'] = "Vul hier ongewenste woorden in gescheiden door comma`s, deze worden vervangen door sterren (*). Laat leeg om te deactiveren.";
	$lang['edit_expl_bbcode'] = "Laat de gebruiker toe om tekst te bewerken.";
	$lang['edit_expl_allow_img_tag'] = "De implementatie van afbeeldingen in een gastenboek bericht komt met enkele security risks. Beelden kunnen malware bevatten, of een beeld mag juridisch gezien niet gepubliceerd worden. Heel veel en grote afbeeldingen kunnen het laden van het gastenboek vertragen.<br><br><b>De IMG-Tag zou enkel in een gemodereerd gastenboek mogen geactiveerd worden.</b>";
	$lang['edit_expl_max_img_width'] = "Definieerd de maximum breedte van een afbeelding.<br><br><b>ATTENTIE: Dit werkt enkel als <a href='http://de2.php.net/manual/en/function.getimagesize.php' target='_blank' title='php.net'>getimagesize();</a> werkt, of als de hoogte en breedte in de [img]-Tag zijn aangegeven zoals hier -> [img=width,height]address of image[/img]).</b>";
	$lang['edit_expl_max_img_height'] = "Definieerd de maximum hoogte van een afbeelding.<br><br><b>ATTENTIE: Dit werkt enkel als <a href='http://de2.php.net/manual/en/function.getimagesize.php' target='_blank' title='php.net'>getimagesize();</a> werkt, of als de hoogte en breedte in de [img]-Tag zijn aangegeven zoals hier -> [img=width,height]address of image[/img]).</b>";
	$lang['edit_expl_center_img'] = "Definieerd of [img]-Tag afbeeldingen gecentreerd worden weergegeven.";
	$lang['edit_expl_allow_flash_tag'] = "Laat het invoegen van flash video toe, zoals van youtube.<br><br><b>Voor de veiligheid moet je dit enkel activeren als je een gecontroleerd gastenboek hebt.</b>";
	$lang['edit_expl_max_flash_width'] = "Maximum breedte van een flashvideo.";
	$lang['edit_expl_max_flash_height'] = "Maximum hoogte van een flashvideo.";
	$lang['edit_expl_center_flash'] = "Plaatst een flashvideo in het midden.";
	$lang['edit_expl_smileys'] = "Laat de gebruiker toe om smileys te gebruiken.";
	$lang['edit_expl_smileys_break'] = "Maximaal aantal smilies per regel in ''newentry.php''. Kan nuttig zijn indien er veel smilies gebruikt worden.";
	$lang['edit_expl_smileys_order'] = "Geeft aan hoe smilies gesorteerd zijn. Oplopend of Aflopend.";
	$lang['edit_expl_blocktime'] = "Geeft het aantal bans nadat de gebruiker is toegevoegd aan een banlist.";
	$lang['edit_expl_captcha'] = "Indien geactiveerd moet er een catcha-code ingevuld worden om een bericht toe te voegen of een e-mail te verzenden.";
	$lang['edit_expl_captcha_method'] = "Je kan kiezen tussen een veiligheidscode, of een rekensom die de gebruiker moet oplossen.";
	$lang['edit_expl_recaptcha_pub_key'] = "Deze sleutel is nodig voor reCaptcha, en kan <a href=\"https://www.google.com/recaptcha/admin/create\">hier</a> verkregen worden.";
	$lang['edit_expl_recaptcha_private_key'] = "Deze sleutel is ook nodig voor reCaptcha. Je krijgt hem samen met de public key.";
	$lang['edit_expl_recaptcha_style'] = "Bepaald de opmaak van reCaptcha.";
	$lang['edit_expl_captcha_length'] = "Alleen voor security code. <b>Niet voor mathematical captcha of reCaptcha!</b><br><br>Minimum: <b>3</b><br>Maximum: <b>9</b>";
	$lang['edit_expl_captcha_salt'] = "Een ''Salt'' is een willekeurig gekozen woord of letter en nummer combinatie dat in de hash gemixd wordt om zo de captcha te genereren. Zo kun je een  ''personal touch'' geven aan de hash die niemand anders kent. Dit maakt de captcha nog veiliger.<br><br>Verander deze na de installatie, dit is echter niet verplicht. De waarde die je nu ziet is willekeurig gekozen tijdens de installatie.  Als je geen ''Salt'' wil gebruiken kan je dit veld leeg laten.";
	$lang['edit_expl_captcha_hash_method'] = "Bepaald de hash-methode om de captcha te genereren.";
	$lang['edit_expl_captcha_double_hash'] = "Wanneer deze optie is geactiveerd zijn de willekeurig gegenereerde letters en cijfers nog willekeuriger.";
	$lang['edit_expl_captcha_coords'] = "Definieert de plaats waar de tekst begint in de achtergrond. Het begin is de <b>Linker onderkant van het eerste caracter</b>.";
	$lang['edit_expl_captcha_color'] = "Definieert de tekstkleur van de captcha. De waarde moet in HTML-formaat zijn zonder de '#'.<br><br><b>Juist: <span class='newer_version'>505050</span><br>Fout: <span class='old_version'>#505050</span></b>";
	$lang['edit_expl_captcha_angle'] = "Deze twee waarden definieren willekeurig de hoek waarmee de captcha wordt getekend.<br><br>The left value has to be <b>lower</b> than the right value.";
	$lang['edit_expl_wrong_captcha_count'] = "Maximum aantal keren dat een captcha verkeerd mag ingevuld worden. Bij het bereiken van het limiet wordt hij/zij aan de <b>spam lijst</b> toegevoegd.";
	$lang['edit_expl_akismet_plugin'] = "Akismet is een externe anti-spam-service, die nieuwe berichten controleert op spam. de akismet-plugin kan hier gedownload worden <a href='http://www.m-gb.org/index.php?id=download_gb' title='Download Akismet Plugin'>http://www.m-gb.org/</a>.<br><br><b>ATTENTIE: Met het gebruik van de 'akismet'-plugin accepteer je het verzenden van data naar een server in de USA. Indien je hier niet mee accoord bent MAG JE 'Akismet' NIET GEBRUIKEN. Ook de Users moeten hiermee accoord gaan als je deze plugin activeerd.</b>";
	$lang['edit_expl_akismet_api'] = "Om Akismet te kunnen gebruiken heb je een <a href='http://akismet.com/signup/#free' title='Akismet API Key'>API Key</a> nodig. Meld je aan voor een gratis account en vul je key hier in.";
	$lang['edit_expl_akismet_check_ok'] = "<span class='same_version' style='font-size: 14px;'>Akismet is geistalleerd!</span>";
	$lang['edit_expl_akismet_check_fail'] = "<span class='old_version' style='font-size: 14px;'>Akismet is NIET geistalleerd!</span>";
	$lang['edit_expl_akismet_mark_as_spam'] = "Indien deze optie is geactiveerd, worden positieve Akismet entries gemarkeerd als spam en verschijnen in het administratie panel hier kan je ze zelf controleren en bekijken wat je ermee doet.";
	$lang['edit_expl_time_lock'] = "Indien deze optie is geselecteerd wordt er op de achtergrond en teller gestart die voorkomt dat het nieuwe bericht te snel wordt verstuurd. Indien de gebruiker te snel is met zijn bericht verschijnt er een bericht met de tijd die hij nog moet wachten totdat hij zijn bericht kan verzenden.";
	$lang['edit_expl_time_lock_value'] = "Minimum wachttijdtijd tot het verzenden van het bericht.";
	$lang['edit_expl_time_lock_maxtime'] = "Maximum tijd om een bericht aan te maken. Als het te lang duurt herstart de teller.";
	$lang['edit_expl_time_lock_spam_count'] = "Maximum aantal keren dat men een formulier mag verzenden gedurende de tijd die is gedefineerd door ''time lock''. Bij het bereiken van het limiet wordt hij/zij aan de <b>spam lijst</b> toegevoegd..<br><br>Minimum: <b>5</b><br>Maximum: <b>99</b>";
	$lang['edit_expl_user_notification'] = "Laat de gebruiker toe om te beslissen of hij een e-mail wil ontvangen wanneer zijn bericht wordt geactiveerd.";
	$lang['edit_expl_user_show_email'] = "Laat de gebruiker toe om te beslissen of zijn e-mail adres getoond wordt in het gastenboek of niet. Indien hij de keuze uitschakeld kan alleen de admin hem een e-mail sturen.";
	$lang['edit_expl_session_timeout'] = "Een inactieve gebruiker wordt automatisch uitgelogd indien de tijd is verstreken. Uitgedrukt in <b>seconden</b>. Waarde moet >= <b>60</b>.";
	$lang['edit_expl_password_min_length'] = "Definieert de minimum lengte van wachtwoorden van Administrators / Moderators.";
	$lang['edit_expl_moderated'] = "Indien geactiveerd moeten posts eerst geactiveerd worden door de admin.";
	$lang['edit_expl_require_email'] = "If activated, an email address must be provided by the user to post a new entry.<br><br><b>ATTENTION: The use of Akismet overrides this setting.</b>";
	$lang['edit_expl_entries_per_page'] = "Aantal posts per pagina. De waarde <b>mag niet 0 zijn</b>.";
	$lang['edit_expl_entries_order'] = "Defineerd de volgorde waarin posts genummerd worden";
	$lang['edit_expl_entries_order_asc_desc'] = "Sorteervolgorde van berichten.";
	$lang['edit_expl_entries_numbering'] = "Nummering van berichten.<br><br><b>Attentie:</b> Dit heeft niets te maken met de sorteervolgorde.";
	$lang['edit_expl_spam_protection'] = "Wanneer geactiveerd krijgt de gebruiker een contact-form, als hij op het eMail-symbool in een  post klikt. Op deze manier zullen e-mail adressen <b>niet</b> getoond worden.";
	$lang['edit_expl_spam_mail'] = "Verzendadres voor nieuwe of geblokkerde spam meldingen. Niets invullen om deze functie uit te schakelen.";
	$lang['edit_expl_ipblocker'] = "Voorkomt meerder posts van 1 gebruiker in rij.";
	$lang['edit_expl_wordwrap'] = "Geeft het aantal caracters aan voordat een heel lang woord wordt afgebroken. <b>0</b> om te deactiveren.";
	$lang['edit_expl_dateform'] = "De manier waarop de datum getoond wordt. Aanpassen is mogelijk met de PHP-functie <a class='admin' href='http://www.php.net/manual/en/function.date.php' title='date()' target='_blank'>date()</a>.";
	$lang['edit_expl_gravatar_show'] = "Gravatars (Global Recognized Avatars) zijn kleine afbeeldingen die naast de post van de gebruiker getoond worden. Zij hangen af van, als de gebruiker een <a class=\"admin\" href=\"http://site.gravatar.com/\" target=\"_blank\" title=\"Gravatar Service\">registred</a> is zijn e-mail adres bij deze service.";
	$lang['edit_expl_gravatar_rating'] = "Definieerd tot welke rating gravatars getoond worden.<br><br><b>G</b> = voor elke leeftijd<br><b>PG</b> = light violence illustration, provocative dressed people and gestures<br><b>R</b> = intensive violence illustration, obscenity<br><b>X</b> = explicit sexual pictures";
	$lang['edit_expl_gravatar_type'] = "Hier geef je aan hoe een gravatar wordt weergegeven indien het email adres van de gebruikers niet geregistreerd is bij de service.";
	$lang['edit_expl_gravatar_size'] = "Grootte van de gravatar in <b>pixels</b>.";
	$lang['edit_expl_gravatar_position'] = "Plaatst de gravatar links of rechts van het bericht.";
	$lang['edit_expl_banlist_ips'] = "Bij een nieuw berichten in het gastenboek wordt gecontroleerd of het IP-adres in deze lijst voorkomt, zo ja wordt de gebruiker geblokkeerd.";
	$lang['edit_expl_banlist_emails'] = "Bij een nieuw berichten in het gastenboek wordt gecontroleerd of het emailadres in deze lijst voorkomt, zo ja wordt de gebruiker geblokkeerd.";
	$lang['edit_expl_banlist_domains'] = "Bij een nieuw berichten in het gastenboek wordt gecontroleerd of het domein van het emailadres in deze lijst voorkomt, zo ja wordt de gebruiker geblokkeerd.";
	$lang['edit_expl_banlist_log'] = "Wanneer deze optie geactiveerd is zullen blocking acties opgeslagen worden in een logfile.";
	$lang['edit_expl_debug_mode'] = "Wanneer deze optie geactiveerd is zal het gastenboek interressante achtergrondinfo tonen over wat er zoal gebeurt in de code. The Matrix has you!";
	$lang['edit_expl_database_backup_full'] = "Complete backup van de MGB database.";
	$lang['edit_expl_database_backup_entries'] = "Een backup van alle gastenboek entries.";
	$lang['edit_expl_database_backup_banlist_ips'] = "Een backup van de IP-banlist.";
	$lang['edit_expl_database_backup_banlist_emails'] = "Een backup van de E-Mail banlist.";
	$lang['edit_expl_database_backup_banlist_domains'] = "Een backup van de Domein banlist.";
	$lang['edit_expl_mailer_method'] = "Stelt de mailing methode van het gastenboek in.<br><br><b>- mail()</b> - Standaard mailer of php.<br><b>- phpmailer</b> - Een php class die hier gedownload kan worden <a href='https://github.com/Synchro/PHPMailer' target='_blank' title='phpmailer'>Github</a>. Plaats het in ''plugins/phpmailer'' na het downloaden.";
	$lang['edit_expl_smtp_server'] = "Adres van jou smtp server.";
	$lang['edit_expl_smtp_port'] = "Poort van jou smtp server.<br><br><b>Default: 25</b>";
	$lang['edit_expl_smtp_user'] = "Gebruikersnaam, vaak je email-adres.";
	$lang['edit_expl_smtp_password'] = "Wachtwoord van jou smtp account.<br><br><b>ATTENTIE:</b> In het geval dat jou wachtwoord opgeslagen moet worden <b>zonder encryptie</b> kies dan een wachtwoord ANDERS dan jou MGB wachtwoord of elk ander kritiek wachtwoord dat je gebruikt. Iedereen die toegang heeft tot de mail configuratie kan je wachtwoord zien in de source code van deze pagina.";
	$lang['edit_expl_smtp_auth'] = "Heeft deze server authenticatie nodig?";
	$lang['edit_expl_keystroke'] = "Herkent een mogelijke spam robot aan de snelheid van het typen. Spam robots wachten niet tot hun moeder een kop koffie brengt. Een normale gebruiker typt niet zo snel.";
	$lang['edit_expl_keystroke_max_cps'] = "Toegestane aantal karakters per seconde. Zet deze waarde niet TE laag. Er zijn snelle typers op het internet.<br><br><b>Default: 8</b>";
	$lang['edit_expl_keystroke_ban_time'] = "Tijd dat een user tijdelijk is geblokkeerd indien hij te snel typt. In <b>secondren</b>.";
	$lang['edit_expl_dynamic_fieldnames'] = "Wanneer geactiveerd zullen de naam variabelen van de input velden in <i>newentry.php</i> en <i>email.php</i> vervangen worden met willekeurig gegenereerde waardes.<br><br>Spambots vullen deze automatisch aan de hand van de naam. Spambots ''zien'' deze niet meer. Dit zou moeten helpen tegen spam. Totdat iemand een bot schrijft die hiermee overweg kan. Jammer maar zo is het nu eenmaal.<br><br><b>Het gebruik van deze functie is aan te raden.</b>";
	$lang['edit_expl_dynamic_fieldnames_method'] = "Bepaalt de functie die gebruikt wordt om de waarde van de variabele te genereren.<br><br><b>mt_rand():</b> PHP functie. Genereert enkel numerieke waarden.<br><b>generate_key_and_pw():</b> MGB functie. Genereert een mix van nummers en letters.";
	$lang['edit_expl_dynamic_fieldnames_length'] = "Definieerd de lengte van de willekeurige waarde. Mag niet < dan 3 en niet > dan 255.<br><br><b>ATTENTIE: Werkt alleen voor generate_key_and_pw().</b>";

	// EDIT.INC.PHP
	$lang['id'] = "ID:";
	$lang['ip'] = "IP:";
	$lang['date'] = "Datum:";
	$lang['time'] = "Tijd:";
	$lang['name'] = "Naam:";
	$lang['city'] = "Plaats:";
	$lang['email'] = "E-mail:";
	$lang['icq'] = "ICQ:";
	$lang['aim'] = "AIM:";
	$lang['msn'] = "MSN:";
	$lang['fb'] = "Facebook:";
	$lang['twitter'] = "Twitter:";
	$lang['hp'] = "Homepage:";
	$lang['message'] = "Bericht:";
	$lang['user_notification'] = "Bericht voor activatie of commentaar:";
	$lang['user_show_email'] = "Laat e-mail adres in het gastenboek zien:";
	$lang['comment'] = "Commentaar:";

	// SMILIES.INC.PHP
	$lang['add_smilies_descr'] = "Hier kan je smilies bewerken of verwijderen.<br><br>Alle smilies moeten in de map <b>'images/smilies/'</b> staan in de root directory van het gastenboek. Vul de naam van het bestand in de <b>lege tekstbox onder bestandsnaam</b>, de vervangende tekst en de afmetingen, en druk op <b>Opslaan</b>.<br><br>Je kan meer dan 1 vervangende tekst opgeven per smilie. Gescheiden door een <b>comma en een spatie</b>. De <b>eerste</b> caractercombinatie zal gebruikt worden om de smilie in de tekst in te voegen in ''newentry.php''.<br><br><span class='same_version'>Juist:</span> :smile:, :), :-)<br><span class='old_version'>Fout:</span> :smile:,:),:-)<br><br><b>Let op: Indien je bestaande smilies veranderd, die al gebruikt zijn in berichten, kunnen deze niet correct meer worden weergegeven! Je zal deze berichten handmatig moeten aanpassen.</b>";
	$lang['smiley_path'] = "Bestandsnaam";
	$lang['smiley_replacement'] = "Vervangende tekst";
	$lang['add_new_smiley'] = "Smiley toevoegen";
	$lang['delete_checked_smilies'] = "... verwijder uit lijst, behoud niet aangevinkt";
	$lang['keep_checked_smilies'] = "... behoud, verwijder niet aangevinkt";
	$lang['smiley_width'] = "Breedte";
	$lang['smiley_height'] = "Hoogte";
	$lang['smilies'] = "Smilies";
	$lang['checked_smilies'] = "Aangevinkte smilies ...";
	$lang['check_all'] = "Check all";
	$lang['uncheck_all'] = "Uncheck all";
	$lang['invert_all'] = "selectie omkeren";

	// EDIT_USER.INC.PHP
	$lang['user_is_active'] = "Gebruiker is actief:";
	$lang['r_user_type'] = "Gebruiker is:";
	$lang['r_settings'] = "Verander settings:";
	$lang['r_settings_database'] = "Manage backups:";
	$lang['r_activate'] = "Berichten activeren:";
	$lang['r_deactivate'] = "Berichten deactiveren:";
	$lang['r_delete'] = "Berichten verwijderen:";
	$lang['r_edit'] = "Berichten aanpassen:";
	$lang['r_spam'] = "Manage spam:";
	$lang['r_blocklists'] = "Manage banlists:";
	$lang['r_edit_smilies'] = "Bewerk smilies";
	$lang['old_password'] = "Uw huidige wachtwoord:";
	$lang['new_password_1'] = "Nieuw wachtwoord:";
	$lang['new_password_2'] = "Bevestig nieuw wachtwoord:";
	$lang['delete_user'] = "Bevestig:";
	$lang['edit_user_caption_rights'] = "Rechten (alleen voor moderators)";
	$lang['edit_user_caption_password'] = "Wachtwoord voor deze gebruiker:";
	$lang['edit_user_caption_delete_user'] = "Verwijder deze gebruiker:";
	$lang['edit_user_caption_old_password'] = "Uw huidige wachtwoord:";
	$lang['user_add'] = "Gebruiker toevoegen";
	$lang['user_edit'] = "Gebruiker aanpassen";
	$lang['edit_user_caption_send_account_data'] = "Stuur gebruiker	gegevens";
	$lang['send_account_data'] = "Stuur per e-mail?";
	// VERSION.INC.PHP
	$lang['current_version'] = "geinstallerde versie:";
	$lang['stable_version'] = "nieuwste stabiele versie:";
	$lang['unstable_version'] = "nieuwste instabiele versie:";
	$lang['old_version'] = "Uw versie is te oud.<br>Een update wordt aanbevolen.<br><br><a href='http://www.m-gb.org/index.php?id=download_gb' class='admin' target='_blank' title='Update now'>To the new version</a>";
	$lang['same_version'] = "U gebruikt de nieuwste versie.<br>Een update is niet nodig.";
	$lang['newer_version'] = "Uw versie is nieuwer dan de nieuwste stabiele versie.<br>Een update is niet nodig.";
	$lang['new_version_available'] = "Een nieuwe versie is beschikbaar: <a href='http://www.m-gb.org/files/latest/mgb-latest.zip' class='admin' target='_blank' title='Upgrade now!'>{LATEST_VERSION}</a>";

	// LOSTPASSWORD.PHP
	$lang['lostpassword_mail'] = "Uw e-mail adres:";
	$lang['get_new_pw'] = "Aanvraag nieuw wachtwoord";
	$lang['lostpassword_success'] = "De aanvraag wordt verwerkt. Zodadelijk ontvangt u een e-mail<br>met een bevestigings-link. Klik hierop om uw nieuw wachtwoord te bevestigen.";
	$lang['lostpassword_no_success'] = "Jou verzoek kan niet afgehandeld worden, er is een probleem met de mailserver.";
	$lang['lostpassword_success_created'] = "Uw nieuwe login details zijn<br>naar u gestuurd per e-mail.";
	$lang['lostpassword_no_success_created'] = "Jou verzoek kan niet afgehandeld worden, er is een probleem met de mailserver.";
?>
