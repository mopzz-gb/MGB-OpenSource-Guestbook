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

	=======================
	lang_main.php - Italian
	=======================

	This language file was translated by Christian Castelli alias VooDoo (voodoo81people@gmail.com)
	*/

	// INDEX.PHP
	$lang['install_directory_exists'] = "La directory 'install' esiste già.<br />Per tua sicurezza dovresti cancellarla!<br>Ma non scordarti di lanciare <a href=\"install/upgrade.php\" title=\"Upgrade\">upgrade.php</a> dopo un aggiornamento!<br>If you experience some problems with umlauts after upgrading, maybe <a href=\"install/convert_ansi.php\" title=\"Convert to utf8\">convert_ansi.php</a> can help.";
	$lang['new_entry'] = "scrivi un nuovo post";
	$lang['new_entry_descr'] = "qui puoi scrivere un nuovo post nel guestbook";
	$lang['contact'] = "contatti";
	$lang['contact_descr'] = "Qui puoi contattare l'amministratore";
	$lang['adminpanel'] = "amministrazione";
	$lang['adminpanel_descr'] = "Vai al Login";
	$lang['entry'] = "post";
	$lang['entries'] = "post";
	$lang['no_entries'] = "Non ci sono post al momento.<br>Vuoi essere il primo?"; // "Vuoi essere il primo?" stands for do u want to be the first?
	$lang['entries_on_pages'] = "Post in {PAGES} pagine";
	$lang['page_first'] = "Prima pagina";
	$lang['page_first_symbol'] = "&laquo;";
	$lang['page_forwards'] = "Sfoglia una pagina in avanti";
	$lang['page_forwards_symbol'] = "&rsaquo;";
	$lang['page_last'] = "Ultima pagina";
	$lang['page_last_symbol'] = "&raquo;";
	$lang['page_backwards']	= "Sfoglia una pagina indietro";
	$lang['page_backwards_symbol'] = "&lsaquo;";
	$lang['anchor']	= "Vai direttamente a questo post";
	$lang['from'] = "da";
	$lang['at'] = "a";
	$lang['oclock']	= "am/pm(?!)";
	$lang['comment'] = "commento";
	$lang['email_yes'] = "eMail da {ENTRY_NAME}";
	$lang['email_no'] = "{ENTRY_NAME} non riceverà e-mail dal guestbook.";
	$lang['hp_of'] = "Homepage per {ENTRY_NAME}";
	$lang['gravatar'] = "Gravatar per {ENTRY_NAME}";
	$lang['quote'] = "Citazione di";

	// NEWENTRY.PHP
	$lang['new_entry_name'] = "Nome:";
	$lang['new_entry_city'] = "Città:";
	$lang['new_entry_email'] = "eMail:";
	$lang['new_entry_icq'] = "ICQ:";
	$lang['new_entry_aim'] = "AIM:";
	$lang['new_entry_msn'] = "MSN:";
	$lang['new_entry_fb'] = "Facebook:";
	$lang['new_entry_twitter'] = "Twitter:";
	$lang['new_entry_hp'] = "Homepage:";
	$lang['new_entry_message'] = "Il tuo messaggio:";
	$lang['necessary_fields'] = "[ I campi necessari sono marcati con un asterisco (*) ]";
	$lang['user_notification'] = "Notifica via e-mail se il post è stato pubblicato o un commento è stato postato.";
	$lang['user_show_email'] = "Mostra il mio indirizzo e-mail nel guestbook per permettere ad altri utenti di spedirti una mail. Se la protezione antispam è attivata, nessuno vedrà direttamente l'indirizzo eMail ma potrà comunque spedirtela attraverso un form.";
	$lang['user_accept_akismet_service'] = "Questo post verrà controllato dal plugin 'Akismet' nello spam. Sono consapevole delle circostanze, che i miei dati personali saranno inviati ad un server negli Stati Uniti d'America e lo accetto.";
	$lang['send'] = "Invia";
	$lang['preview'] = "Previsione";
	$lang['security_code'] = "codice di sicurezza (captcha)";
	$lang['captcha_refresh'] = "Generate new captcha code";
	$lang['captcha_what_is_that'] = "Cos'è questo?";
	$lang['captcha_wikipedia'] = "http://it.wikipedia.org/wiki/CAPTCHA";
	$lang['captcha_tooltip'] = "Un nuovo post nel guestbook entry una eMail richiede di risolvere il captcha per impedire post automatici da parte di programmi. Per favore digita tutte le lettere MAIUSCOLE. Se il codice è illeggibile, lascia il campo vuoto e clicca su ''Invia''. In questo modo verrà generato un nuovo captcha. I dati negli altri campi verranno mantenuti. Se non viene generato un nuovo codice, per favore eseguire un clic con il tasto destro del mouse e ''ricaricare'' oppure premere [CTRL]+[R].";
	$lang['back_to_mainpage'] = "Torna alla pagina principale";
	$lang['back'] = "Indietro";
	$lang['entry_success_mod'] = "Il tuo post è stato salvato con successo.<br>Sarà validato dall'admin e poi pubblicato.";
	$lang['entry_success'] = "Il tuo post è stato salvato con successo. Puoi vederlo subito.";
	$lang['forwarding'] = "Sarai redirettato automaticamente entro 5 secondi. Se così non fosse, clicca su ''Torna alla pagina principale''.";
	$lang['sendmail_admin_title'] = "Nuovo post da '{NAME}'";
	$lang['sendmail_user_title'] = "Il tuo post presso {DOMAIN}";

	// EMAIL.PHP
	$lang['email_name'] = "Il tuo nome:";
	$lang['email_email'] = "La tua eMail:";
	$lang['email_message'] = "Il tuo messaggio:";
	$lang['email_sent_to'] = "Questa eMail verrà spedita a:";
	$lang['email_send'] = "Invia";
	$lang['email_caption'] = "eMail da '{NAME}' sul guestbook di {DOMAIN}";
	$lang['email_caption_copy'] = "Email to '{NAME}' through the guestbook of {DOMAIN} - Copy";
	$lang['email_sender'] = "Mittente:";
	$lang['email_receiver'] = "Destinatario:";
	$lang['email_from'] = "da:";
	$lang['email_sendcopytome'] = "Voglio ricevere una copia di questa eMail.";
	$lang['email_success'] = "La tua email è stata spedita con successo all'utente.";
	$lang['email_fail'] = "La tua eMail non può essere inviata. Forse c'è qualche problema con il mailserver.";

	// ERRORMESSAGES
	$lang['errormessage'][1] = "Per favore inserisci un messaggio!";
	$lang['errormessage'][2] = "Per favore fornisci un indirizzo e-mail valido!";
	$lang['errormessage'][3] = "Per favore inserisci il tuo nome!";
	$lang['errormessage'][4] = "non è un indirizzo<br>valido!";
	$lang['errormessage'][5] = "non è un numero<br>ICQ valido!";
	$lang['errormessage'][6] = "Il blocco IP ti vieta di postare ulteriormente!";
	$lang['errormessage'][7] = "Il captcha non è stato risolto oppure è stato risolto incorrettamente!";
	$lang['errormessage'][8] = "Quest'utente non riceverà e-mail!";
	$lang['errormessage'][9] = "E' avvenuto un errore nel tentativo di spedire la tua e-mail!";
	$lang['errormessage'][10] = "Protezione spam: la frase è stata inviata troppo velocemente. Per favore aspetta altri {TIME_LOCK_REST} secondi, grazie.";
	$lang['errormessage'][11] = "L'accordo di privacy sull'utilizzo dei dati da parte di Akismet non è stato accettato. DEVE essere accettato per salvare il post.";
	$lang['errormessage'][12] = "This email is forbidden for new entries.";
	$lang['errormessage'][13] = "This domain range is forbidden for new entries.";
	$lang['errormessage'][14] = "This ip address is forbidden for new entries.";
	$lang['errormessage'][15] = "is no valid facebook name.";
	$lang['errormessage'][16] = "is no valid twitter name.";
	$lang['errormessage'][17] = "You typed too fast! Are you a spamrobot? You have been banned for {KEYSTROKE_BAN_TIME} seconds. If this is a mistake, please report it to the Administrator.";
	$lang['errormessage'][18] = "You have been banned for too fast typing. Please wait {KEYSTROKE_BAN_TIME_REST} seconds before you can send the form again.";

	// BBCODES
	$lang['bbcodes'] = "BBCodes:";
	$lang['bbcode_bold'] = "grassetto";
	$lang['bbcode_help_bold'] = "Mostra il testo in grassetto";
	$lang['bbcode_italic'] = "corsivo";
	$lang['bbcode_help_italic'] = "Mostra il testo in corsivo";
	$lang['bbcode_url'] = "ancora";
	$lang['bbcode_help_url'] = "Inserisce un collegamento. Opzioni: [url]http://www.test.it/[/url] o [url=http://www.test.it/]Test[/url] o [url=http://www.test.it/][img]url dell'immagine[/img][/url]";
	$lang['bbcode_img'] = "Immagine";
	$lang['bbcode_help_img'] = "Inserisce un'immagine. Opzioni: [img]url dell'immagine[/img] o [img=width,height]url dell'immagine[/img]";
	$lang['bbcode_flash'] = "Flash";
	$lang['bbcode_help_flash'] = "Inserisce un video flash. Opzioni: [flash=larghezza,altezza]url del video[/flash]";
	$lang['bbcode_quote'] = "Citazione";
	$lang['bbcode_help_quote'] = "Inserisce una citazione. Opzioni: [quote]CITAZIONE[/quote] o [quote=Nome]CITAZIONE[/quote]";
	$lang['bbcode_textsize'] = "grandezza del testo";
	$lang['bbcode_extrasmall'] = "piccolissimo";
	$lang['bbcode_small'] = "piccolo";
	$lang['bbcode_default'] = "normale";
	$lang['bbcode_big'] = "grande";
	$lang['bbcode_extrabig'] = "grandissimo";
	$lang['bbcode_textcolor'] = "colore del testo";
	$lang['bbcode_help_size'] = "grandezza del testo";
	$lang['smileys'] = "smileys:";
?>
