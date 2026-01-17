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

	=====================
	lang_main.php - Dutch
	=====================

	This languagefile was translated by Gerard Vandeninden gerard@brookstruefriends.nl
	*/

	// INDEX.PHP
	$lang['install_directory_exists'] = "De installatiedirectory bestaat al.<br />Je deze het beste verwijderen!!<br>Maar vergeet niet <a href=\"install/upgrade.php\" title=\"Upgrade\">upgrade.php</a> te starten na een update!<br>If you experience some problems with umlauts after upgrading, maybe <a href=\"install/convert_ansi.php\" title=\"Convert to utf8\">convert_ansi.php</a> can help.";
	$lang['new_entry'] = "Een bericht toevoegen";
	$lang['new_entry_descr'] = "Hier kan je een nieuw gasteboek bericht aanmaken";
	$lang['contact'] = "contact";
	$lang['contact_descr'] = "Hier kan je een bericht versturen naar de webmaster";
	$lang['adminpanel'] = "administratie";
	$lang['adminpanel_descr'] = "Ga naar Login";
	$lang['entry'] = "bericht";
	$lang['entries'] = "berichten";
	$lang['no_entries'] = "Er zijn op dit moment<br>geen berichten.";
	$lang['entries_on_pages'] = "berichten op {PAGES} Pagina`s";
	$lang['page_first'] = "Eerste pagina";
	$lang['page_first_symbol'] = "&laquo;";
	$lang['page_forwards'] = "1 pagina vooruit";
	$lang['page_forwards_symbol'] = "&rsaquo;";
	$lang['page_last'] = "Laatste pagina";
	$lang['page_last_symbol'] = "&raquo;";
	$lang['page_backwards'] = "1 pagina terug";
	$lang['page_backwards_symbol'] = "&lsaquo;";
	$lang['anchor'] = "Ga rechtstreeks naar dit bericht";
	$lang['from'] = "uit";
	$lang['at'] = "om";
	$lang['oclock'] = "";
	$lang['comment'] = "commentaar";
	$lang['email_yes'] = "e-mail van {ENTRY_NAME}";
	$lang['email_no'] = "{ENTRY_NAME} krijgt geen mails van het gastenboek.";
	$lang['hp_of'] = "Homepage van {ENTRY_NAME}";
	$lang['gravatar'] = "Gravatar van {ENTRY_NAME}";
	$lang['quote'] = "Zitat von";

	// NEWENTRY.PHP
	$lang['new_entry_name'] = "Uw Naam:";
	$lang['new_entry_city'] = "Plaats:";
	$lang['new_entry_email'] = "e-mail:";
	$lang['new_entry_icq'] = "ICQ:";
	$lang['new_entry_aim'] = "AIM:";
	$lang['new_entry_msn'] = "MSN:";
	$lang['new_entry_fb'] = "Facebook:";
	$lang['new_entry_twitter'] = "Twitter:";
	$lang['new_entry_hp'] = "Homepage:";
	$lang['new_entry_message'] = "Uw bericht:";
	$lang['necessary_fields'] = "[ Verplichte velden zijn gemarkeerd met een ster (*) ]";
	$lang['user_notification'] = "Waarschuw per e-mail indien het bericht isgeactiveerd of wanneer er een comment is toegevoegd.";
	$lang['user_show_email'] = "Laat mijn e-mail adres zien in het gastenboek zodat andere gebruikers mij kunnen mailen. Als spam protectie is geactiveerd kan niemand je adres zien wel kunnen ze jou mailen door middel van een e-mail formulier.";
	$lang['user_accept_akismet_service'] = "Dit bericht wordt door 'Akismet' op Spam onderzocht. Ik ben mij bewust, dat wanneer ik dit bericht verzend, persoonlijke gegevens van mij naar een server in de USA verstuurd worden, en accepteer dit.";
	$lang['send'] = "Verzenden";
	$lang['preview'] = "Preview";
	$lang['security_code'] = "Beveiligings-code (captcha)";
	$lang['captcha_refresh'] = "Generate new captcha code";
	$lang['captcha_what_is_that'] = "Wat is dit?";
	$lang['captcha_wikipedia'] = "http://nl.wikipedia.org/wiki/Captcha";
	$lang['captcha_tooltip'] = "Een nieuwe gastenboek entry vereist het invoeren van de captcha-code, dit om geautomatiseerd invoeren te voorkomen. Typ enkel HOOFDLETTERS. Als de code onleesbaar is, laat dan het veld leeg en klik op ''Verzenden''. Er zal een nieuwe captcha gegenereerd worden. Je andere velden blijven dan ingevuld. Als er geen nieuwe captcha gegenereerd wordt klik dan op ''vernieuwen'' of typ [CTRL]+[R].";
	$lang['back_to_mainpage'] = "Terug naar de hoofdpagina";
	$lang['back'] = "Terug";
	$lang['entry_success_mod'] = "Je bericht is opgeslagen.<br>Het wordt door de admin geevalueerd en dan geactiveerd.";
	$lang['entry_success'] = "Je bericht is opgeslagen. Je kan het nu bekijken.";
	$lang['forwarding'] = "Je wordt automatisch doorgeschakeld in 5 seconden. Anders klik op ''Terug naar de hoofdpagina''.";
	$lang['sendmail_admin_title'] = "Nieuwe gastenboek vermelding van '{NAME}'";
	$lang['sendmail_user_title'] = "Jouw gastenboek vermelding bij {DOMAIN}";

	// EMAIL.PHP
	$lang['email_name'] = "Uw naam:";
	$lang['email_email'] = "Uw e-mail:";
	$lang['email_message'] = "Uw bericht:";
	$lang['email_sent_to'] = "Dit bericht wordt verzonden naar:";
	$lang['email_send'] = "Verzenden";
	$lang['email_caption'] = "E-mail van '{NAME}' over het gastenboek van {DOMAIN}";
	$lang['email_caption_copy'] = "E-mail to '{NAME}' through the guestbook of {DOMAIN} - Copy";
	$lang['email_sender'] = "Afzender:";
	$lang['email_receiver'] = "Ontvanger:";
	$lang['email_from'] = "Van:";
	$lang['email_sendcopytome'] = "Ik wil graag een copie naar mijn adres.";
	$lang['email_success'] = "Uw e-mail is succesvol verzonden.";
	$lang['email_fail'] = "De e-mail kon niet verzonden worden. Er is misschien een probleem met de mailserver.";

	// ERRORMESSAGES
	$lang['errormessage'][1] = "Vul een bericht in A.U.B.!";
	$lang['errormessage'][2] = "Vul een geldig emailadres in A.U.B.!";
	$lang['errormessage'][3] = "Vul Uw naam in A.U.B.!";
	$lang['errormessage'][4] = "is geen geldig<br>emailadres!";
	$lang['errormessage'][5] = "is geen geldige<br>ICQ nummer!";
	$lang['errormessage'][6] = "De IP blokkade verhinderd een volgende bericht!";
	$lang['errormessage'][7] = "De captcha was niet of verkeerd ingevuld!";
	$lang['errormessage'][8] = "Deze gebruiker wil geen email ontvangen!";
	$lang['errormessage'][9] = "Er is een fout opgetreden bij het verzenden van de mail!";
	$lang['errormessage'][10] = "Spam-protectie: Het invulformulier is te snel verzonden. Wacht {TIME_LOCK_REST} seconden A.U.B.!";
	$lang['errormessage'][11] = "De Akismet privacy agreement is niet geaccepteerd. Dit moet geaccepteerd worden om het bericht te kunnen plaatsen.";
	$lang['errormessage'][12] = "Uw emailadres mag geen berichten plaatsen.";
	$lang['errormessage'][13] = "Uw domein mag geen berichten plaatsen.";
	$lang['errormessage'][14] = "Uw IP-adres mag geen berichten plaatsen.";
	$lang['errormessage'][15] = "is geen geldige facebook naam.";
	$lang['errormessage'][16] = "is geen geldige twitter naam.";
	$lang['errormessage'][17] = "You typed too fast! Are you a spamrobot? You have been banned for {KEYSTROKE_BAN_TIME} seconds. If this is a mistake, please report it to the Administrator.";
	$lang['errormessage'][18] = "You have been banned for too fast typing. Please wait {KEYSTROKE_BAN_TIME_REST} seconds before you can send the form again.";

	// BBCODES
	$lang['bbcodes'] = "BBCodes:";
	$lang['bbcode_bold'] = "vet";
	$lang['bbcode_help_bold'] = "Vet";
	$lang['bbcode_italic'] = "cursief";
	$lang['bbcode_help_italic'] = "Cursief";
	$lang['bbcode_url'] = "website invoegen";
	$lang['bbcode_help_url'] = "Hyperlink invoegen. Voorbeeld: [url]http://www.voorbeeld.net/[/url] of [url=http://www.voorbeeld.net/]Test[/url] of [url=http://www.voorbeeld.net/][img]url van afbeelding[/img][/url]";
	$lang['bbcode_img'] = "Afbeelding invoegen";
	$lang['bbcode_help_img'] = "Afbeelding invoegen. Voorbeeld: [img]url van afbeelding[/img] of [img=width,height]url van afbeelding[/img]";
	$lang['bbcode_flash'] = "Flash";
	$lang['bbcode_help_flash'] = "Flash invoegen. -> [flash=width,height]URL[/flash]";
	$lang['bbcode_quote'] = "Citaat";
	$lang['bbcode_help_quote'] = "Citaat invoegen. Voorbeeld: [quote]QUOTE[/quote] of [quote=Name]QUOTE[/quote]";
	$lang['bbcode_textsize'] = "tekst grootte";
	$lang['bbcode_extrasmall'] = "extraklein";
	$lang['bbcode_small'] = "klein";
	$lang['bbcode_default'] = "standaard";
	$lang['bbcode_big'] = "groot";
	$lang['bbcode_extrabig'] = "extra groot";
	$lang['bbcode_textcolor'] = "tekst kleur";
	$lang['bbcode_help_size'] = "tekst grootte";
	$lang['smileys'] = "smileys:";
?>
