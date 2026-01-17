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

	========================
	lang_admin.php - Italian
	========================

	This language file was translated by Christian Castelli alias VooDoo (voodoo81people@gmail.com)
	*/

	// GENERAL
	$lang['no'] = "no";
	$lang['yes'] = "si";
	$lang['min'] = "minimum";
	$lang['max'] = "maximum";
	$lang['save'] = "Salva";
	$lang['asc'] = "Crescente";
	$lang['desc'] = "Decrescente";
	$lang['administrator'] = "amministratore";
	$lang['moderator'] = "moderatore";
	$lang['forever'] = "Forever";
	$lang['one_month'] = "1 Month";
	$lang['one_day'] = "1 Day";
	$lang['one_hour'] = "1 Hour";
	$lang['one_minute'] = "1 Minute";
	$lang['never'] = "Never";
	$lang['time_second'] = "Second";
	$lang['time_seconds'] = "Seconds";
	$lang['time_minute'] = "Minute";
	$lang['time_minutes'] = "Minutes";
	$lang['time_hour'] = "Hour";
	$lang['time_hours'] = "Hours";
	$lang['time_day'] = "Day";
	$lang['time_days'] = "Days";
	$lang['time_month'] = "Month";
	$lang['time_months'] = "Months";
	$lang['time_year'] = "Year";
	$lang['time_years'] = "Years";
	$lang['age'] = "Age";
	$lang['old'] = "old";

	// LOGIN.INC.PHP
	$lang['title'] = "MGB OpenSource Guestbook - Amministrazione";
	$lang['login_username'] = "Username:";
	$lang['login_password'] = "Password:";
	$lang['login_lostpassword'] = "Ho dimenticato la password";
	$lang['login'] = "Login";
	$lang['logout'] = "Logout";
	$lang['login_ok'] = "Benvenuto <b>{SESSION_USERNAME}</b>.";
	$lang['logged_in'] = "Sei loggato come <b>{SESSION_USERNAME}</b>";
	$lang['logged_out'] = "Per favore fornisci username e password per loggarti.";
	$lang['please_wait'] = "Ti sei sloggato con successo.<br>Aspetta un momento...";

	// errormessages
	$lang['errormessage'][1] = "Per favore riempi tutti i campi!";
	$lang['errormessage'][2] = "Questa combinazione di username/password non esiste.";
	$lang['errormessage'][3] = "Il tuo account è statao disattivato dall'amministratore.";
	$lang['errormessage'][4] = "Non hai accesso a questo sito.";
	$lang['errormessage'][5] = "La password fornita è sbagliata.";
	$lang['errormessage'][6] = "Le nuove password non sono le stesse.";
	$lang['errormessage'][7] = "L'indirizzo eMail fornito non è valido o il campo è vuoto.";
	$lang['errormessage'][8] = "Non puoi rimuovere i tuoi stessi privilegi amministrativi, disabilita o cancella il tuo account.";
	$lang['errormessage'][9] = "La tua sessione è scaduta poichè rimasta inattiva per troppo tempo.";
	$lang['errormessage'][10] = "Nella tua ultima visita non ti sei sloggato correttamente. Il sistema lo ha fatto per te.<br><br>Premi sempre per la tua stessa sicurezza il bottone ''Logout'' per sloggarti dal sistema. Grazie.";
	$lang['errormessage'][11] = "Questo username o quest'indirizzo eMail sono già in uso.";
	$lang['errormessage'][12] = "La chiave non è valida o già scaduta.";
	$lang['errormessage'][13] = "E' già stata richiesta una nuova password per questo account.<br>Non è possibile richiederne una nuova finchè la nuova password non è utilizzata o scaduta.";
	$lang['errormessage'][14] = "eMail non può essere inviata. Forse c'è un problema con il mailserver.";
	$lang['errormessage'][15] = "Il numero della versione non può essere recuperato perchè <a href=\"http://php.net/manual/it/function.fopen.php\">fopen()</a> è disattivata sul tuo server.<br> Contatta il tuo host provider per risolvere il problema.<br><br>Nel frattempo puoi dare un'occhiata alla nuova versione su http://www.m-gb.org/.";
	$lang['errormessage'][16] = "La password fornita è troppo corta. Password sicure dovrebbero avere almeno {PASSWORD_MIN_LENGTH} caratteri.";
	$lang['errormessage'][17] = "SQL Dump could not be created.<br>Please make sure that directory 'save' is writable.";
	$lang['errormessage'][18] = "CSV could not be created.<br>Please make sure that directory 'save' is writable.";
	$lang['errormessage'][19] = "An Error occured while deleting the backup!";
	$lang['errormessage'][20] = "No backup was selected";
	$lang['errormessage'][21] = "An Error occured while restoring the backup!";
	$lang['errormessage'][22] = "There was an error while deleting the table!";

	// ERRORMESSAGES EMPTY VALUES
	$lang['empty_needed_value'][1] = "Missing title";
	$lang['empty_needed_value'][2] = "Missing author";
	$lang['empty_needed_value'][3] = "Missing timezone";
	$lang['empty_needed_value'][4] = "Missing admin name";
	$lang['empty_needed_value'][5] = "Missing admin email";
	$lang['empty_needed_value'][6] = "Missing guestbook email";
	$lang['empty_needed_value'][7] = "Missing entries per site";
	$lang['empty_needed_value'][8] = "Missing date format";
	$lang['empty_needed_value'][9] = "Missing maximum width for image";
	$lang['empty_needed_value'][10] = "Missing maximum height for image";
	$lang['empty_needed_value'][11] = "Missing maximum width for flash";
	$lang['empty_needed_value'][12] = "Missing maximum height for flash";
	$lang['empty_needed_value'][13] = "Missing value for emoticons line break";
	$lang['empty_needed_value'][14] = "Missing Gravatar size";
	$lang['empty_needed_value'][15] = "Wrong or missing value for minimum password length";
	$lang['empty_needed_value'][16] = "Wrong or missing value for Captcha length";
	$lang['empty_needed_value'][17] = "Wrong or missing value for maximum number of sign-in tries while user is blocked by time lock";
	$lang['empty_needed_value'][18] = "Missing value for Captcha angle";
	$lang['empty_needed_value'][19] = "Wrong or missing value for session timeout";
	$lang['empty_needed_value'][20] = "Missing Captcha X-coordinates";	// ? "Missing Captcha X-Coords";
	$lang['empty_needed_value'][21] = "Missing Captcha Y-coordinates";	// ? "Missing Captcha Y-Coords";
	$lang['empty_needed_value'][22] = "Missing Captcha color";
	$lang['empty_needed_value'][23] = "To activate Akismet an API Key is needed";
	$lang['empty_needed_value'][24] = "Missing minimum time for time lock";
	$lang['empty_needed_value'][25] = "Missing maximum time for time lock";
	$lang['empty_needed_value'][26] = "Wrong or missing value for sign in attempts";
	$lang['empty_needed_value'][27] = "Missing E-Mail text: admin";
	$lang['empty_needed_value'][28] = "Missing E-Mail text: Thank-You-Mail (unmoderated)";
	$lang['empty_needed_value'][29] = "Missing E-Mail text: Thank-You-Mail (moderated)";
	$lang['empty_needed_value'][30] = "Missing E-Mail text: activation-mail";
	$lang['empty_needed_value'][31] = "Missing E-Mail text: comment-notification";
	$lang['empty_needed_value'][32] = "Missing E-Mail text: contact-mail";
	$lang['empty_needed_value'][33] = "Missing E-Mail text: contact-mail (copy)";
	$lang['empty_needed_value'][34] = "Missing value for wrong captcha count";
	$lang['empty_needed_value'][35] = "Missing public or private key for reCaptcha<br>or reCaptcha is not installed properly";
	$lang['empty_needed_value'][36] = "SMTP Server data missing";
	$lang['empty_needed_value'][37] = "SMTP Port data missing";
	$lang['empty_needed_value'][38] = "SMTP username missing";
	$lang['empty_needed_value'][39] = "SMTP password missing";
	$lang['empty_needed_value'][40] = "phpmailer couldn't be found in directory ''plugins/phpmailer/''.";
	$lang['empty_needed_value'][41] = "Salt contains forbidden characters.";
	$lang['empty_needed_value'][42] = "The length of the dynamic fieldvariables must not be empty or zero. It must neither be smaller than 3 nor bigger than 255.";

	// SPAM TYPES
	$lang['spam_entry_type'][1] = "Blocked by ip banlist.";
	$lang['spam_entry_type'][2] = "On spam list, but not in banlist.";
	$lang['spam_entry_type'][3] = "Blocked by email banlist.";
	$lang['spam_entry_type'][4] = "Blocked by domain banlist.";
	$lang['spam_entry_type'][5] = "Blocked by time lock.";
	$lang['spam_entry_type'][6] = "Updated by Akismet.";
	$lang['spam_entry_type'][7] = "New entry by Akismet.";
	$lang['spam_entry_type'][8] = "Updated by wrong captcha.";
	$lang['spam_entry_type'][9] = "New entry by wrong captcha.";
	$lang['spam_entry_type'][10] = "Captcha ok, but on spam list.";
	$lang['spam_entry_type'][11] = "Blocked by Keystroke.";

	// SPAM.INC.PHP
	$lang['spam_add_to_ip_banlist'] = "Add to ip banlist.";
	$lang['spam_add_to_email_banlist'] = "Add to email banlist.";
	$lang['spam_add_to_domain_banlist'] = "Add to domain banlist.";
	$lang['spam_added_to_ip_list'] = " has been added to ip banlist.";
	$lang['spam_added_to_email_list'] = " has been added to email banlist.";
	$lang['spam_added_to_domain_list'] = " has been added to domain banlist.";
	$lang['spam_is_already_on_ip_list'] = " is already on ip banlist.";
	$lang['spam_is_already_on_email_list'] = "  is already on email banlist.";
	$lang['spam_is_already_on_domain_list'] = "  is already on domain banlist.";
	$lang['updated_ips'] = "{COUNTER} ips have been updated in {SECONDS} seconds.";
	$lang['updated_emails'] = "{COUNTER} emails have been updated in {SECONDS} seconds.";
	$lang['updated_domains'] = "{COUNTER} domains have been updated in {SECONDS} seconds.";

	// GENERAL STRINGS
	$lang['back_to_mainpage'] = "Torna alla pagina principale";
	$lang['back'] = "Indietro";
	$lang['go'] = "Vai!";
	$lang['entry'] = "Post";
	$lang['entries'] = "Post";
	$lang['no_entries'] = "Non ci sono post disponibili.";
	$lang['no_deactivated_entries'] = "Non ci sono post diattivati.";
	$lang['no_activated_entries'] = "Non ci sono post attivati";
	$lang['no_spam_entries'] = "Non sono presenti post marcati come spam";
	$lang['entries_on_pages'] = "Post in {PAGES} pagine";
	$lang['page_first'] = "Prima pagina";
	$lang['page_first_symbol'] = "&laquo;";
	$lang['page_forwards'] = "Sfoglia una pagina in avanti";
	$lang['page_forwards_symbol'] = "&rsaquo;";
	$lang['page_last'] = "Ultima pagina";
	$lang['page_last_symbol'] = "&raquo;";
	$lang['page_backwards'] = "Sfoglia una pagina indietro";
	$lang['page_backwards_symbol'] = "&lsaquo;";
	$lang['captcha_method_code'] = "Codice di sicurezza";
	$lang['captcha_method_math'] = "Matematica";
	$lang['activate_entry'] = "Attiva questo post";
	$lang['deactivate_entry'] = "Disattiva questo post";
	$lang['delete_entry'] = "Cancella questo post";
	$lang['mark_as_spam'] = "Marca come spam";
	$lang['nospam_entry'] = "Marca come 'non spam' e attivalo";
	$lang['nospam_deactivate_entry'] = "Marca come 'non spam' ma lascialo disattivato";
	$lang['active'] = "Questo post è stato attivato nel guestbook";
	$lang['inactive'] = "Questo post non è stato attivato nel guestbook";
	$lang['edit_entry'] = "Edita il post";
	$lang['timestamp'] = "Timestamp";
	$lang['quote'] = "Citazione di";

	// GRAVATAR
	$lang['gravatar_position_left'] = "A sinistra";
	$lang['gravatar_position_right'] = "a destra";
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
	$lang['do_nothing'] = "Non fare nulla ...";
	$lang['delete_whole_spam'] = "Cancella tutti i post marcati come spam";
	$lang['mark_all_no_spam_deactivate'] = "Marca tutti i post come 'non spam' e attivali";
	$lang['mark_all_no_spam_activate'] = "Marca tutti i post come 'non spam' ma lasciali disattivati";
	$lang['mark_all_as_spam'] = "Marca tutti i post come spam";
	$lang['activate_all_entries'] = "Attiva tutti i post";
	$lang['deactivate_all_entries'] = "Disattiva tutti i post";
	$lang['delete_all_entries'] = "Cancella tutti i post";
	$lang['put_all_ips_on_banlist'] = "- Add all new ips to IP banlist";
	$lang['put_all_emails_on_banlist'] = "- Add all new emails to E-Mail banlist";
	$lang['put_all_domains_on_banlist'] = "- Add all new domains to Domain banlist";
	$lang['put_all_on_banlists_and_delete_everything'] = "- Put all new emails and ips on banlists and delete all log entries";
	$lang['show_banned_by_ip_only'] = "-- Show banned by ip only";
	$lang['show_banned_by_email_only'] = "-- Show banned by email only";
	$lang['show_banned_by_domain_only'] = "-- Show banned by domain only";
	$lang['show_banned_by_keystroke_only'] = "-- Show banned by keystroke only";
	$lang['show_banned_by_captcha_only'] = "-- Show blocked by captcha only";
	$lang['export_as_sql_dump'] = "--- Export as SQL Dump";
	$lang['export_as_csv'] = "--- Export as CSV";

	// CONFIRMS
	$lang['confirm_general'] = "Accept changes?";
	$lang['confirm_delete'] = "Really delete entry?";
	$lang['confirm_delete_spam'] = "Delete all spam entries?";
	$lang['confirm_add_to_permanent_ip_blocklist'] = "Really add to IP banlist?";
	$lang['confirm_add_to_permanent_email_blocklist'] = "Really add to E-Mail banlist?";
	$lang['confirm_add_to_permanent_domain_blocklist'] = "Really add to Domain banlist?";
	$lang['confirm_restore_backup'] = "Really restore backup?";
	$lang['confirm_delete_backup'] = "Really delete backup?";
	$lang['confirm_changes_smiley'] = "Accept changes in existing emoticons?";

	// MAILS
	$lang['standard_mail'] = "mail()";
	$lang['phpmailer'] = "phpmailer";
	$lang['sendmail_user_notification_title'] = "Il tuo post presso {DOMAIN} e\' stato attivato";
	$lang['sendmail_user_comment_title'] = "al tuo post presso {DOMAIN} è stato fatto un commento";
	$lang['sendmail_adduser_title'] = "I tuoi dati utenti presso {DOMAIN}";
	$lang['sendmail_adduser_text'] = "Sei stato registrato con successo presso {DOMAIN} dall'amministratore. Qui di seguito i tuoi dati utente:<br /><br />Username: {ADDUSER_NAME}<br />Password: {ADDUSER_PASSWORD}<br /><br />Puoi loggarti qui: {ADDUSER_URL}";
	$lang['sendmail_admin_text'] = "{NAME} ha lasciato un nuovo post nel guestbook.<br /><br />Data: {DATE}<br />Ora: {TIME}<br /><br />---<br />{MESSAGE}<br />---<br /><br />{URL_TO_GB}";
	$lang['sendmail_user_text'] = "Ciao {NAME},<br /><br />grazie per aver postato nel mio guestbook.";
	$lang['sendmail_user_text_moderated'] = "Ciao {NAME},<br /><br />grazie per aver postato nel mio guestbook. Attivero\' il tuo post il prima possibile,non appena ci avrò dato un\'occhiata.";
	$lang['sendmail_user_notification_text'] = "Ciao {NAME},<br /><br />Il tuo post presso {DOMAIN} e\' stato or ora attivato. Lo puoi vedere qui: {URL_TO_GB}";
	$lang['sendmail_comment_text'] = "Ciao {NAME},<br /><br />riguardo al tuo post<br /><br />---<br />{MESSAGE}<br />---<br /><br />è stato inserito un commento. Puoi vederlo qui: {URL_TO_GB}";
	$lang['sendmail_contactmail_text'] = "Hai ricevuto una eMail da {NAME} attraverso il guestbook di {DOMAIN}. Di seguito il messaggio:<br /><br />---<br />{MESSAGE}<br />---<br /><br />Data: {DATE}<br />Ora: {TIME}";
	$lang['sendmail_contactmail_text_copy'] = "You sent an email to {NAME} through the guestbook of {DOMAIN}. Here\'s a copy of the message:<br /><br />---<br />{MESSAGE}<br />---<br /><br />Date: {DATE}<br />Time: {TIME}";
	$lang['sendmail_new_password_title'] = "Nuova password: Autenticazione";
	$lang['sendmail_new_password_text'] = "Ciao {NAME},<br /><br />e\' stata generata una nuova password per il tuo account. Per autenticarla, per favore clicca il link sottostante nelle prossime 24 ore. finchè la nuova password non verrà attivata, sarà quella vecchia a rimanere in vigore.<br /><br />Se il link non verrà cliccato nelle prossime 24 ore,la password scadrà.<br /><br />{NEW_PASSWORD_LINK}";
	$lang['sendmail_new_password_created_title'] = "La nuova password è stata attivata.";
	$lang['sendmail_new_password_created_text'] = "Ciao {NAME},<br /><br />Hai attivato la tua nuova password. di seguito troverai i tuoi nuovi dati.<br /><br />Username: {NAME}<br />Password: {NEW_PASSWORD}";

	// NAVIGATION
	$lang['settings'] = "Settaggi";
	$lang['settings_general'] = "General";
	$lang['settings_look'] = "Look &amp; feel";
	$lang['settings_bbcodes'] = "BBCodes";
	$lang['settings_emoticons'] = "Emoticons";
	$lang['settings_gravatar'] = "Gravatar";
	$lang['settings_security'] = "Security &amp; Anti-Spam";
	$lang['settings_mails'] = "E-Mails";
	$lang['settings_database'] = "Database";
	$lang['activate'] = "Attiva il post";
	$lang['deactivate'] = "Disattiva il post";
	$lang['delete'] = "Cancella il post";
	$lang['edit'] = "Modifica il post";
	$lang['spam'] = "Spam";
	$lang['edit_smilies'] = "Modifica smilies";
	$lang['edit_users'] = "Amministrazione utenti";
	$lang['banlists'] = "Manage banlists";
	$lang['banlist_ips'] = "IP banlist";
	$lang['banlist_emails'] = "E-Mail banlist";
	$lang['banlist_domains'] = "Domain banlist";
	$lang['spam_log'] = "Spam log";
	$lang['stats'] = "Statistiche";
	$lang['license'] = "Licenza";
	$lang['forum'] = "Forum";
	$lang['bugreport'] = "Riporta un bug";
	$lang['version'] = "Versione";
	$lang['manual'] = "Documentazione";
	$lang['fb_nav'] = "MGB on Facebook";
	$lang['to_guestbook'] = "Vai al guestbook";
	$lang['paypal'] = "Se ti piace MGB e pensi sia utile, puoi considerare di effettuare una donazione per supportare il suo sviluppo futuro.";

	// SETTINGS.INC.PHP
	$lang['edit_caption_general'] = "Settaggi generali";
	$lang['edit_caption_look'] = "Look &amp; feel";
	$lang['edit_caption_bbcodes'] = "BBCodes";
	$lang['edit_caption_smilies'] = "Emoticons";
	$lang['edit_caption_gravatars'] = "Supporto gravatar";
	$lang['edit_caption_security'] = "Sicurezza";
	$lang['edit_caption_antispam'] = "Anti-Spam";
	$lang['edit_caption_captcha'] = "Captcha";
	$lang['edit_caption_recaptcha'] = "reCaptcha";
	$lang['edit_caption_dynamic_fieldnames'] = "Dynamic Fieldvariables";
	$lang['edit_caption_akismet'] = "Akismet-Plugin";
	$lang['edit_caption_time_lock'] = "Sign lock";
	$lang['edit_caption_mail_settings'] = "eMail settings";
	$lang['edit_caption_smtp_settings'] = "The following data is only needed if you want to send mails by phpmailer (smtp) and if your server needs authentication.";
	$lang['edit_caption_email'] = "eMail";
	$lang['edit_caption_database'] = "Database information";
	$lang['edit_caption_database_backups'] = "Database Backups";
	$lang['edit_caption_keystroke'] = "Keystroke";
	$lang['edit_save_message'] = "Salvataggio settaggi avvenuto con successo.";
	$lang['edit_title'] = "Titolo:";
	$lang['edit_h_author'] = "Autore:";
	$lang['edit_h_domain'] = "Dominio:";
	$lang['edit_gb_path'] = "Percoso al guestbook:";
	$lang['edit_h_keywords'] = "Parole chiave:";
	$lang['edit_h_description'] = "Descrizione:";
	$lang['edit_timezone'] = "Timezone:";
	$lang['edit_announcement_message'] = "Announcement message:";
	$lang['edit_admin_name'] = "Nome dell'admin:";
	$lang['edit_admin_email'] = "eMail dell'admin:";
	$lang['edit_admin_gbemail'] = "Guestbook email:";
	$lang['edit_caching'] = "Caching:";
	$lang['edit_sendmail_admin'] = "notifica via eMail:";
	$lang['edit_sendmail_admin_text'] = "Testo per le notifiche via eMail:";
	$lang['edit_sendmail_user'] = "eMail di ringraziamenti per l'utente:";
	$lang['edit_sendmail_user_text'] = "testo per l'eMail di ringraziamenti (not moderated):";
	$lang['edit_sendmail_user_text_moderated'] = "testo per l'eMail di ringraziamenti (moderated):";
	$lang['edit_sendmail_user_notification_text'] = "Testo per la eMail di attivazione:";
	$lang['edit_sendmail_comment_text'] = "Testo per la notifica dei commenti:";
	$lang['edit_sendmail_contactmail_text'] = "Testo per eMail sul guestbook:";
	$lang['edit_sendmail_contactmail_text_copy'] = "Text for a copy of an eMail through the guestbook:";
	$lang['edit_template_path'] = "Template:";
	$lang['edit_template_style_path'] = "Stile del template:";
	$lang['edit_iconset_path'] = "Set di icone:";
	$lang['edit_language_path'] = "File del linguaggio:";
	$lang['edit_badwords'] = "Parolacce:";
	$lang['edit_bbcode'] = "Codice BB:";
	$lang['edit_allow_img_tag'] = "IMG-Tag:";
	$lang['edit_max_img_width'] = "Larghezza massima dell'immagine::";
	$lang['edit_max_img_height'] = "Altezza massima dell'immagine:";
	$lang['edit_center_img'] = "Mostra le immagini centrate:";
	$lang['edit_allow_flash_tag'] = "FLASH-Tag:";
	$lang['edit_max_flash_width'] = "Larghezza massima oggetti flash:";
	$lang['edit_max_flash_height'] = "Altezza massima oggetti flash:";
	$lang['edit_center_flash'] = "Mostra gli oggetti flash centrati:";
	$lang['edit_smileys'] = "Smilies:";
	$lang['edit_smileys_break'] = "Ritorno a capo per lo smiley:";
	$lang['edit_smileys_order'] = "Ordinamento degli smilies:";
	$lang['edit_blocktime'] = "Blocktime:";
	$lang['edit_captcha'] = "Captcha:";
	$lang['edit_captcha_method'] = "Metodo captcha:";
	$lang['edit_recaptcha_pub_key'] = "reCaptcha Public Key:";
	$lang['edit_recaptcha_private_key'] = "reCaptcha Private Key:";
	$lang['edit_recaptcha_style'] = "reCaptcha Style:";
	$lang['edit_captcha_length'] = "Length of Captcha:";
	$lang['edit_captcha_salt'] = "Salt:";
	$lang['edit_captcha_hash_method'] = "Hash:";
	$lang['edit_captcha_double_hash'] = "Throw the dice twice:";
	$lang['edit_captcha_coords'] = "Coordinate captcha:";
	$lang['edit_captcha_color'] = "Colore captcha:";
	$lang['edit_captcha_angle'] = "Angolo captcha:";
	$lang['edit_wrong_captcha_count'] = "Maximum number of wrong captchas:";
	$lang['edit_akismet_plugin'] = "Akismet-Plugin:";
	$lang['edit_akismet_api'] = "Akismet API Key:";
	$lang['edit_akismet_mark_as_spam'] = "Marcatura spam:";
	$lang['edit_time_lock'] = "Sign lock:";
	$lang['edit_time_lock_value'] = "Tempo minimo per il sign lock:";
	$lang['edit_time_lock_maxtime'] = "Tempo massimo per il sign lock:";
	$lang['edit_time_lock_spam_count'] = "Maximum allowed number for sending the form too early:";
	$lang['edit_user_notification'] = "Notifica utente:";
	$lang['edit_user_show_email'] = "Usermail presso il guestbook:";
	$lang['edit_session_timeout'] = "timeout della sesseione:";
	$lang['edit_password_min_length'] = "Lunghezza minima per le passwords:";
	$lang['edit_moderated'] = "Guestbook moderato:";
	$lang['edit_require_email'] = "eMail required:";
	$lang['edit_entries_per_page'] = "Post per pagina:";
	$lang['edit_entries_order'] = "Ordine dei post:";
	$lang['edit_entries_order_asc_desc'] = "Sequenza d'ordinamento:";
	$lang['edit_entries_numbering'] = "Sequenza di numerazione:";
	$lang['edit_spam_protection'] = "Protezione eMail contro lo spam :";
	$lang['edit_spam_mail'] = "E-Mail address for spam notification:";
	$lang['edit_ipblocker'] = "IP-Blocker:";
	$lang['edit_wordwrap'] = "Ritorno a capo automatico:";
	$lang['edit_dateform'] = "Formato della data:";
	$lang['edit_gravatar_show'] = "Mostra gravatars:";
	$lang['edit_gravatar_rating'] = "Votazione gravatar:";
	$lang['edit_gravatar_type'] = "Gravatar non registrati:";
	$lang['edit_gravatar_size'] = "Dimensione gravatar:";
	$lang['edit_gravatar_position'] = "Posizione:";
	$lang['edit_banlist_ips'] = "IP banlist is active:";
	$lang['edit_banlist_emails'] = "E-Mail banlist is active:";
	$lang['edit_banlist_domains'] = "Domain banlist is active:";
	$lang['edit_banlist_log'] = "Log blocked spam entries:";
	$lang['edit_debug_mode'] = "Debug Mode:";
	$lang['edit_general_info'] = "General information:";
	$lang['edit_server_name'] = "Host:";
	$lang['edit_database_name'] = "Database name:";
	$lang['edit_server_document_root'] = "Root directory:";
	$lang['edit_database_type'] = "Database type:";
	$lang['edit_database_version'] = "Database version:";
	$lang['edit_database_prefix'] = "Prefix for this MGB Installation:";
	$lang['edit_php_version'] = "PHP Version:";
	$lang['edit_backup'] = "Backup:";
	$lang['edit_no_backup'] = "There is no backup";
	$lang['edit_database_backup_full'] = "Complete Backup:";
	$lang['edit_database_backup_entries'] = "Entries only:";
	$lang['edit_database_backup_banlist_ips'] = "IP banlist only:";
	$lang['edit_database_backup_banlist_emails'] = "E-Mail banlist only:";
	$lang['edit_database_backup_banlist_domains'] = "Domain banlist only:";
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
	$lang['edit_delete_backup_successfull'] = "Backup was deleted successfully!";
	$lang['edit_restore_backup_successfull'] = "Backup was restored successfully!";
	$lang['edit_mailer_method'] = "Used mailer:";
	$lang['edit_smtp_server'] = "SMTP Server:";
	$lang['edit_smtp_port'] = "SMTP Port:";
	$lang['edit_smtp_user'] = "SMTP Username:";
	$lang['edit_smtp_password'] = "SMTP Password:";
	$lang['edit_smtp_auth'] = "SMTP Authentication:";
	$lang['edit_keystroke'] = "Keystroke:";
	$lang['edit_keystroke_max_cps'] = "Maximum number of characters per second:";
	$lang['edit_keystroke_ban_time'] = "Bantime:";
	$lang['edit_dynamic_fieldnames'] = "Dynamic Fieldvariables:";
	$lang['edit_dynamic_fieldnames_method'] = "Type of variable:";
	$lang['edit_dynamic_fieldnames_length'] = "Length:";

	$lang['edit_expl_title'] = "Titolo del guestbook.";
	$lang['edit_expl_h_author'] = "I nomi degli autori della pagina internet.";
	$lang['edit_expl_h_domain'] = "Top Level Domain (TLD) dove il guestbook è situato <b>senza http://</b> all'inizio e <b>/</b> alla fine. (example.net)";
	$lang['edit_expl_gb_path'] = "Il percorso relativo al Top Level Domain (TLD) dove il guestbook è situato.";
	$lang['edit_expl_h_keywords'] = "Parole chiave separate da una virgola.";
	$lang['edit_expl_h_description'] = "Breve descrizione della pagina.";
	$lang['edit_expl_timezone'] = "From PHP5 onwards you must set a timezone. <a href='http://www.php.net/manual/en/timezones.php' target='_blank'>List of all available timezones</a>.";
	$lang['edit_expl_announcement_message'] = "This text will be shown above guestbook entries in index.php. It will stay there until you delete it. Formatting the text with BBCodes and smileys is also possible.";
	$lang['edit_expl_admin_name'] = "Il nome dell'amministratore o semplicemente ''admin''.";
	$lang['edit_expl_admin_email'] = "Verso quest'indirizzo eMailverranno spedite le notifiche di nuovi post.";
	$lang['edit_expl_admin_gbemail'] = "Saranno usati come mittenti per gli indirizzi eMail.";
	$lang['edit_expl_caching'] = "If caching is active, the guestbook entries will be loaded from the cache rather than from the database. This can decrease server load on pages with many visits.<br><br><b>ATTENTION: This feature has to be regarded as experimental. If you discover problems with the display of new entries or something similar, I recommend to deactivate this option.</b>";
	$lang['edit_expl_sendmail_admin'] = "Se quest'opzione è attivata, l'amministratore riceverà una eMail se verranno fatti nuovi post.";
	$lang['edit_expl_sendmail_admin_text'] = "Questo testo verrà spedito all'amministratore per le notifiche via eMail.<br><br>Segnaposto disponibili: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_user'] = "Se quest'azione è attivata, l'utente riceverà una email di ringraziamenti.";
	$lang['edit_expl_sendmail_user_text'] = "This text will be send to the user, if <b>entry activation is inactive</b> and if the Thank-You mail option is activated.<br><br>Available placeholders: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_user_text_moderated'] = "This text will be send to the user, if <b>entry activation is active</b> and if the Thank-You mail option is activated.<br><br>Available placeholders: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_user_notification_text'] = "Questo testo verrà spedito all'utente non appena il suo post verrà sbloccato. Come requisito serve che l'utente accetti questo all'atto di postare.<br><br>Segnaposto disponibil: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_comment_text'] = "Questo testo verrà spedito all'utente se l'admin avrà postato un commento al suo commento. Come requisito serve che l'utente accetti questo all'atto di postare.<br><br>Segnaposto disponibil: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_contactmail_text'] = "Questo testo verrà spedito all'utente se riceverà un'email dal guestbook mentre è attiva la protezione anti-spam.<br><br>Segnaposto disponibili: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_contactmail_text_copy'] = "This text will be delivered to sender with a copy of his message sent through the guestbook while spam-protection is activated.<br><br>Available placeholders: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_template_path'] = "Il template che verrà usato.";
	$lang['edit_expl_template_style_path'] = "Lo stile desiderato del template. Non puoi selezionarlo fintanto che il template non viene caricato.";
	$lang['edit_expl_iconset_path'] = "Il set grafico desiderato che fornisce icone, smileys e sfondi per i captcha indipendenti dal template udsato.";
	$lang['edit_expl_language_path'] = "Il linguaggio usato.<br><br><b>ATTENZIONE:</b> dalla versione <b>0.6.5</b> le lingue nel set di caratteri latin9 (iso-8859-15) <b>non sono più</b> supportate! Se trovi dei problemi, quali variabili mancanti, campi di testo vuoti e così via, per favore cambia il set di caratteri  in uno basato su utf-8. Inoltre rimuovi ogni linguaggio basato su latin9 dalla cartella ''language''.<br><br>Dopo di che è possibile risolvere ogni problema di caratteri speciali o accentati eseguendo ''convert_ansi.php'' nella cartella ''install''.";
	$lang['edit_expl_language_author'] = "Author:";
	$lang['edit_expl_language_charset'] = "Set di caratteri:";
	$lang['edit_expl_badwords'] = "Fornisci qui le parole indesiderate separate da una virgola, le quali saranno rimpiazzate da asterischi (*). Lascia vuoto per non attivare la funzione.";
	$lang['edit_expl_bbcode'] = "Permette all'utente di formattare il testo.";
	$lang['edit_expl_allow_img_tag'] = "L'implementazione delle immagini in un post del guestbook contiene alcuni rischi di sicurezza. Le immagini potrebbero contenere malware o un utente potrebbe fornire un'immagine che viola i termini legali. Inoltre immagini molto grosse riducono la velocità di caricamento del guestbook.<br><br><b>Il tag IMG dovrebbe venir attivato solamente se il guestbook è moderato.</b>";
	$lang['edit_expl_max_img_width'] = "Definisce la massima larghezza di un'immagine.<br><br><b>ATTENZIONE: disponibile solo quando <a href='http://de2.php.net/manual/en/function.getimagesize.php' target='_blank' title='php.net'>getimagesize();</a> funziona o se le dimensioni vengono fornite al tag [img] in questo modo -> [img=width,height]URL dell'immagine[[/img]).</b>";
	$lang['edit_expl_max_img_height'] = "Definisce la massima altezza di un'immagine.<br><br><b>ATTENZIONE: disponibile solo quando <a href='http://de2.php.net/manual/en/function.getimagesize.php' target='_blank' title='php.net'>getimagesize();</a> funziona o se le dimensioni vengono fornite al tag [img] in questo modo -> [img=width,height]URL dell'immagine[/img]).</b>";
	$lang['edit_expl_center_img'] = "Definisce se i tag [img] delle immagini vengono mostrati centrati.";
	$lang['edit_expl_allow_flash_tag'] = "Permette all'utente di inserire video flash, come se provenissero da Youtube.<br><br><b>Per ragioni di sicurezza il BBCode per i video flash dovrebbe venir attivato solamente se il guestbook è moderato.</b>";
	$lang['edit_expl_max_flash_width'] = "Definisce la massima larghezza di un video flash.";
	$lang['edit_expl_max_flash_height'] = "Definisce la massima altezza di un video flash.";
	$lang['edit_expl_center_flash'] = "Definisce se i tag video [flash] vengono mostrati centrati.";
	$lang['edit_expl_smileys'] = "Permette all'utente di aggiungere smileys.";
	$lang['edit_expl_smileys_break'] = "Definisce dopo quanti smilies c'è un ritorno a capo nella lista degli smilies in ''newentry.php''. Può esser d'aiuto se vengono usati molti smilies.";
	$lang['edit_expl_smileys_order'] = "Indica come vengono ordinati gli smilies. Crescente o descrescente.";
	$lang['edit_expl_blocktime'] = "Defines the period of time a user is banned after he was added to one of the banlists.";
	$lang['edit_expl_captcha'] = "Se attivato un codice di verifica deve essere immesso per aggiungere un nuovo post o spedire una mail ad un utente.";
	$lang['edit_expl_captcha_method'] = "Puoi scegliere fra un codice di sicurezza o una formula matematica che l'utente deve risolvere.";
	$lang['edit_expl_recaptcha_pub_key'] = "This key is needed by reCaptcha. You can get it <a href=\"https://www.google.com/recaptcha/admin/create\">here</a>.";
	$lang['edit_expl_recaptcha_private_key'] = "This key is also needed by reCaptcha. You will get it with your public key.";
	$lang['edit_expl_recaptcha_style'] = "Defines the look of reCaptcha.";
	$lang['edit_expl_captcha_length'] = "For security code only. <b>Not for mathematical captcha or reCaptcha!</b><br><br>Minimum: <b>3</b><br>Maximum: <b>9</b>";
	$lang['edit_expl_captcha_salt'] = "A ''Salt'' is a randomly chosen word or a combination out of characters and numbers that is mixed into the hash that generates the captcha. Thus it is possible to give a ''personal touch'' to the hash that is known by nobody except you. Makes the captcha more safer.<br><br>You should change it after installation, but this is not required. The value you see here was chosen randomly during installation. It should be okay. If you don't want to use a ''Salt'' you can leave it blank.";
	$lang['edit_expl_captcha_hash_method'] = "Sets the Hash method that is used to generate the captcha.";
	$lang['edit_expl_captcha_double_hash'] = "If this option is activated the randomly generated numbers and letters will be ''more'' random.";
	$lang['edit_expl_captcha_coords'] = "Definisce le coordinate dove il testo inizia ad esser disegnato nell'immagine di sfondo. Il punto d'origine è <b>l'angolo sinistro più basso del primo carattere</b>.";
	$lang['edit_expl_captcha_color'] = "Definisce il colore del testo del captcha. Il valore dev'essere il formato HTML senza '#'.<br><br><b>Giusto: <span class='newer_version'>505050</span><br>Sbagliato: <span class='old_version'>#505050</span></b>";
	$lang['edit_expl_captcha_angle'] = "Entrambi questi valori definiscono l'insieme dei gradi per la renderizzazione casuale del captcha.<br><br>The left value has to be <b>lower</b> than the right value.";
	$lang['edit_expl_wrong_captcha_count'] = "This value defines how often the user is allowed to wrongly type a given captcha. If he reaches this limit, he will be put on the <b>spam list</b>.";
	$lang['edit_expl_akismet_plugin'] = "Akismet è un servizio esterno anti-spam, che controlla i post alla ricerca di spam. Il plugin akismet può essere scaricato da <a href='http://www.m-gb.org/index.php?id=download_gb' title='Scarica Akismet Plugin'>http://www.m-gb.org/</a>.<br><br><b>ATTENZIONE: usando il plugin 'akismet' accetti la trasmissione di dati verso server negli Stati Uniti d'America. Se non accetti queste condizioni NON DEVI USARE 'Akismet'. Inoltre anche i tuoi utenti devono accettare queste condizioni se attivi il plugin.</b>";
	$lang['edit_expl_akismet_api'] = "Per usare Akismet hai bisogno dell'<a href='http://akismet.com/signup/#free' title='Akismet API Key'>API Key</a>. Registrati gratuitamente e inseriscila qui dopo la registrazione.";
	$lang['edit_expl_akismet_check_ok'] = "<span class='same_version' style='font-size: 14px;'>Akismet è installato!</span>";
	$lang['edit_expl_akismet_check_fail'] = "<span class='old_version' style='font-size: 14px;'>Akismet NON è installato!</span>";
	$lang['edit_expl_akismet_mark_as_spam'] = "Se quest'opzione è abilitata, i post positivi secondo Akismet sono marcati come spam e appariranno nel pannello amministrativo così che tu possa controllarli e decidere cosa farne.";
	$lang['edit_expl_time_lock'] = "Se quest'opzione è abilitata, si attiva in background un contatore che previene l'invio della frase troppo velocemente. Se l'utente è troppo veloce nel postare, appare un messaggio che lo invita ad attendere per alcuni secondi, fintanto che potrà firmare il guestbook.";
	$lang['edit_expl_time_lock_value'] = "Tempo minimo che l'utente deve aspettare per inviare la frase.";
	$lang['edit_expl_time_lock_maxtime'] = "Tempo massimo consentito all'utente per firmare il guestbook. Se ci mette troppo tempo, il contatore ricomincia.";
	$lang['edit_expl_time_lock_spam_count'] = "Maximum number of attempts a user is allowed to send the form during the time that is defined for ''time lock''. If he reaches this limit he will be added to the <b>spam list</b>.<br><br>Minimum: <b>5</b><br>Maximum: <b>99</b>";
	$lang['edit_expl_user_notification'] = "Permette all'utente di decidere se sarà avvertito via email se il suo post sarà attivato.";
	$lang['edit_expl_user_show_email'] = "Permette all'utente di decidere se il suo indirizzo eMail verrà mostrato nel guestbook oppure no. Se disabilita la checkbox nessuno all'infuori dell'amministratore potrà spedirgli una mail.";
	$lang['edit_expl_session_timeout'] = "Un utente inattivo verrà automaticamente sloggato se questo periodo scade. Espresso in <b>secondi</b>. Il valore dev'essere maggiore o uguale a (>=) <b>60</b>.";
	$lang['edit_expl_password_min_length'] = "Definisce la lunghezza minima delle password di Amministratori / Moderatori.";
	$lang['edit_expl_moderated'] = "Se attivato, i post devono essere attivati per essere mostrati nel guestbook.";
	$lang['edit_expl_require_email'] = "If activated, an email address must be provided by the user to post an new entry.<br><br><b>ATTENTION: The use of Akismet overrides this setting.</b>";
	$lang['edit_expl_entries_per_page'] = "Indica quanti post verranno mostrati per pagina. Il valore <b>non deve essere 0</b>.";
	$lang['edit_expl_entries_order'] = "Definisce l'ordine attraverso il quale i post vengono numerati";
	$lang['edit_expl_entries_order_asc_desc'] = "Definisce la sequenza con cui i post vengono ordinati.";
	$lang['edit_expl_entries_numbering'] = "Definisce la sequenza con cui vengono numerati i post.<br><br><b>ATTENZIONE:</b> questo non ha niente a che fare con l'ordinamento dei post, ma solo come vengono numerati.";
	$lang['edit_expl_spam_protection'] = "Se attivato, l'utente verrà portato ad un form dei contatti, se clicca sul simbolo della mail in un post per spedirgli una email. Per cui gli indirizzi eMail <b>NON</b> verranno mostrati direttamente.";
	$lang['edit_expl_spam_mail'] = "Notification mails about new spam entries or blocked spam entries will be sent to this address. Leave empty to deactivate this function.";
	$lang['edit_expl_ipblocker'] = "Evita post multipli in serie da parte di un utente.";
	$lang['edit_expl_wordwrap'] = "Indica il numero di caratteri dopo i quali una parola molto lunga verrà troncata. <b>0</b> per disattivare.";
	$lang['edit_expl_dateform'] = "Il form per dire come la data verrà mostrata. La formattazione è fatta attraverso la funzione PHP <a class='admin' href='http://www.php.net/manual/it/function.date.php' title='date()' target='_blank'>date()</a>.";
	$lang['edit_expl_gravatar_show'] = "Gravatars (Global Recognized Avatars) sono piccole immagini che verranno mostrate a fianco dei post dell'utente. Dipendono dal fatto che l'utente sia <a class=\"admin\" href=\"http://site.gravatar.com/\" target=\"_blank\" title=\"Gravatar Service\">registrato</a> con il suo indirizzo eMail a questo servizio.";
	$lang['edit_expl_gravatar_rating'] = "Definisce a quale grado i gavatars saranno mostrati.<br><br><b>G</b> = per ogni età<br><b>PG</b> = illustrazione leggermente violenta, persone vestite provocatoriamente e gesti<br><b>R</b> = illustrazioni di violenza intensa, oscenità<br><b>X</b> = immagini a sfondo sessuale esplicito";
	$lang['edit_expl_gravatar_type'] = "Qui puoi settare come i gravatar verranno visualizzati se le email degli utenti non sono registrate al servizio.";
	$lang['edit_expl_gravatar_size'] = "Definisce la grandezza del gravatar in <b>pixel</b>.";
	$lang['edit_expl_gravatar_position'] = "Mostra il gravatar a sinistra o a destra del messaggio.";
	$lang['edit_expl_banlist_ips'] = "New entries in the guestbook will be verified by this list. If the IP of the user is on this list, he will be blocked.";
	$lang['edit_expl_banlist_emails'] = "New entries in the guestbook will be verified by this list. If the E-Mail of the user is on this list, he will be blocked.";
	$lang['edit_expl_banlist_domains'] = "New entries in the guestbook will be verified by this list. If the users E-Mail domain is on this list, he will be blocked.";
	$lang['edit_expl_banlist_log'] = "If this option is activated, blocking actions of the guestbook will be saved in a log file.";
	$lang['edit_expl_debug_mode'] = "When activated, the guestbook will show some interesting background information of what's going on inside the code. The Matrix has got you!";
	$lang['edit_expl_database_backup_full'] = "A complete backup of the MGB Database.";
	$lang['edit_expl_database_backup_entries'] = "A backup of all guestbook entries.";
	$lang['edit_expl_database_backup_banlist_ips'] = "A backup of the IP banlist.";
	$lang['edit_expl_database_backup_banlist_emails'] = "A backup of the E-Mail banlist.";
	$lang['edit_expl_database_backup_banlist_domains'] = "A backup of the Domain banlist.";
	$lang['edit_expl_mailer_method'] = "Sets the mailing method of the guestbook.<br><br><b>- mail()</b> - Standard mailer of php.<br><b>- phpmailer</b> - A php class that can be downloaded at <a href='https://github.com/Synchro/PHPMailer' target='_blank' title='phpmailer'>Github</a>. Put it into ''plugins/phpmailer'' after download.";
	$lang['edit_expl_smtp_server'] = "Address of your smtp server.";
	$lang['edit_expl_smtp_port'] = "Port of your smtp server.<br><br><b>Default: 25</b>";
	$lang['edit_expl_smtp_user'] = "Your username. Often the same as your eMail address.";
	$lang['edit_expl_smtp_password'] = "Password of your smtp account.<br><br><b>ATTENTION:</b> In case the smtp password must be stored <b>without encryption</b> it is very unsafe to choose a password that is identical to your MGB password or other highly sensitive passwords you use. Everyone who has access to mail configuration will be able to see it in the source code of this page.";
	$lang['edit_expl_smtp_auth'] = "Does the server need an authentication?";
	$lang['edit_expl_keystroke'] = "Identifies a possible spam robot by the speed of typing. Spam robots do not wait 'til their mum brought them a mug of coffee. They need speed. A normal user isn't that fast at typing.";
	$lang['edit_expl_keystroke_max_cps'] = "This value defines how much characters per second are allowed. You shouldn't set this too low. There are many fast typers out there.<br><br><b>Default: 8</b>";
	$lang['edit_expl_keystroke_ban_time'] = "Period of time the user is temporarily banned when he types too fast. Defined in <b>seconds</b>.";
	$lang['edit_expl_dynamic_fieldnames'] = "When activated the name variables of the input boxes in <i>newentry.php</i> and <i>email.php</i> will be replaced by randomly generated values.<br><br>Spambots do fill them automatically by their name. They don't ''see'' them anymore. This should help a lot against spam. Until someone writes a bot which can handle this. Sad but true.<br><br><b>Using this function is recommended.</b>";
	$lang['edit_expl_dynamic_fieldnames_method'] = "Sets the function that is used to generate the random value for the variable.<br><br><b>mt_rand():</b> PHP function. Generates only numeric values.<br><b>generate_key_and_pw():</b> MGB function. Generates a mix out of numbers and characters.";
	$lang['edit_expl_dynamic_fieldnames_length'] = "Defines the length of the random value. Must not be < than 3 and not > than 255.<br><br><b>ATTENTION: Works for generate_key_and_pw() only.</b>";

	// EDIT.INC.PHP
	$lang['id'] = "ID:";
	$lang['ip'] = "IP:";
	$lang['date'] = "Data:";
	$lang['time'] = "Ora:";
	$lang['name'] = "Nome:";
	$lang['city'] = "Città:";
	$lang['email'] = "eMail:";
	$lang['icq'] = "ICQ:";
	$lang['aim'] = "AIM:";
	$lang['msn'] = "MSN:";
	$lang['fb'] = "Facebook:";
	$lang['twitter'] = "Twitter:";
	$lang['hp'] = "Homepage:";
	$lang['message'] = "Messaggio:";
	$lang['user_notification'] = "Notifica per attivazione o commenti:";
	$lang['user_show_email'] = "Mostra gli indirizzi eMail nel guestbook:";
	$lang['comment'] = "Commenti:";

	// SMILIES.INC.PHP
	$lang['add_smilies_descr'] = "Qui puoi modificare o rimuovere gli smilies.<br><br>Tutti gli milies devono essere messi nella cartella <b>'images/smilies/'</b> nella directory principale del guestbook. Devi solo mettere il nome del file dentro <b>l'area di testo vuota</b> e poi cliccare <b>salva</b>.<br><br>Puoi impostare più di un segnaposto per uno smiley. Separali con una <b>virgola e uno spazio</b>. Il <b>primo</b> segnaposto  nella linea sarà utilizzato per inserire gli smiley nella textarea in ''newentry.php''.<br><br><span class='same_version'>Corretto:</span> :smile:, :), :-)<br><span class='old_version'>Sbagliato:</span> :smile:,:),:-)<br><br><b>Attenzione: se cambi gli smilies o i segnaposto esistenti già in uso in alcuni post, quest'ultimi non potranno essere più ripristinati! Dovrai modificare manualmente tutte le occorenze.</b>";
	$lang['smiley_path'] = "Nome del file";
	$lang['smiley_replacement'] = "Segnaposto";
	$lang['add_new_smiley'] = "Aggiungi smiley";
	$lang['checked_smilies'] = "Smilies controllati...";
	$lang['delete_checked_smilies'] = "... rimuovi dalla lista, mantieni quelli non contrassegnati";
	$lang['keep_checked_smilies'] = "... mantieni, rimuovi quelli non contrassegnati";
	$lang['smiley_width'] = "Larghezza";
	$lang['smiley_height'] = "Altezza";
	$lang['smilies'] = "Smilies";
	$lang['check_all'] = "Check all";
	$lang['uncheck_all'] = "Uncheck all";
	$lang['invert_all'] = "Invert selection";

	// EDIT_USER.INC.PHP
	$lang['user_is_active'] = "L'utente è attivo:";
	$lang['r_user_type'] = "L'utente è:";
	$lang['r_settings'] = "Cambia i settaggi:";
	$lang['r_settings_database'] = "Manage backups:";
	$lang['r_activate'] = "Attiva i post:";
	$lang['r_deactivate'] = "Disattiva i post:";
	$lang['r_delete'] = "Cancella i post:";
	$lang['r_edit'] = "Modifica i post:";
	$lang['r_spam'] = "Gestisci spam:";
	$lang['r_blocklists'] = "Manage banlists:";
	$lang['r_edit_smilies'] = "Modifica smilies";
	$lang['old_password'] = "La tua password corrente:";
	$lang['new_password_1'] = "Nuova password:";
	$lang['new_password_2'] = "Digita di nuovo:";
	$lang['delete_user'] = "Conferma:";
	$lang['edit_user_caption_rights'] = "Permessi (solo per i moderatori)";
	$lang['edit_user_caption_password'] = "Password dell'utente:";
	$lang['edit_user_caption_delete_user'] = "Cancella quest'utente:";
	$lang['edit_user_caption_old_password'] = "La tua password corrente:";
	$lang['user_add'] = "Aggiungi un utente";
	$lang['user_edit'] = "Modifica l'utente";
	$lang['edit_user_caption_send_account_data'] = "Spedisci i dati dell'account";
	$lang['send_account_data'] = "Spedire via eMail?";

	// VERSION.INC.PHP
	$lang['current_version'] = "versione installata:";
	$lang['stable_version'] = "ultima versione stabile:";
	$lang['unstable_version'] = "ultima versione instabile:";
	$lang['old_version'] = "La tua versione è vecchia.<br>Si raccomanda un aggiornamento.<br><br><a href='http://www.m-gb.org/index.php?id=download_gb' class='admin' target='_blank' title='Update now'>Vai alla nuova versione</a>";
	$lang['same_version'] = "Stai usando l'ultima versione disponibile.<br>Non si necessita di un aggiornamento.";
	$lang['newer_version'] = "La tua versione è più recente dell'ultima versione stabile.<br>Non si necessita di un aggiornamento.";
	$lang['new_version_available'] = "&Egrave; disponibile una nuova versione: <a href='http://www.m-gb.org/files/latest/mgb-latest.zip' class='admin' target='_blank' title='Upgrade now!'>{LATEST_VERSION}</a>";

	// LOSTPASSWORD.PHP
	$lang['lostpassword_mail'] = "il tuo indirizzo eMail:";
	$lang['get_new_pw'] = "richiedi una nuova password";
	$lang['lostpassword_success'] = "La tua richiesta è terminata. Riceverai a breve una eMail<br>con un link di conferma. cliccaci sopra per attivare la tua nuova password.";
	$lang['lostpassword_no_success'] = "Non è stato possibile gestire la tua richiesta.  C'è stato un problema con il mailserver.";
	$lang['lostpassword_success_created'] = "I tuoi nuovi dati di login sono stati<br>spediti via eMail.";
	$lang['lostpassword_no_success_created'] = "Non è stato possibile gestire la tua richiesta.  C'è stato un problema con il mailserver.";
?>
