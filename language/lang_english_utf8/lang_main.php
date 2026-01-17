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
	lang_main.php - English
	=======================

	This languagefile was translated by Christian Rech alias HeyJ (mail@heyj.de)
	and edited by Jürgen Schäfer ==> juergen.schaefer(at)minetoshsoft.com
	*/

	// INDEX.PHP
	$lang['install_directory_exists'] = "The install directory still exists.<br />You should delete it for your own security!<br>But don't forget to launch <a href=\"install/upgrade.php\" title=\"Upgrade\">upgrade.php</a> after you have updated your installation!<br>If you experience some problems with umlauts after upgrading, maybe <a href=\"install/convert_ansi.php\" title=\"Convert to utf8\">convert_ansi.php</a> can help.";
	$lang['new_entry'] = "Post an entry";
	$lang['new_entry_descr'] = "Create a new guestbook entry";
	$lang['contact'] = "Contact";
	$lang['contact_descr'] = "Contact the administrator";
	$lang['adminpanel'] = "Administration";
	$lang['adminpanel_descr'] = "Login";
	$lang['entry'] = "entry";
	$lang['entries'] = "entries";
	$lang['no_entries'] = "Currently there are no <br>entries.";
	$lang['entries_on_pages'] = "Entries on {PAGES} pages";
	$lang['page_first'] = "First page";
	$lang['page_first_symbol'] = "&laquo;";
	$lang['page_forwards'] = "One page forward";
	$lang['page_forwards_symbol'] = "&rsaquo;";
	$lang['page_last'] = "Last page";
	$lang['page_last_symbol'] = "&raquo;";
	$lang['page_backwards'] = "One page backward";
	$lang['page_backwards_symbol'] = "&lsaquo;";
	$lang['anchor']	= "Go directly to this entry";
	$lang['from'] = "from";
	$lang['at'] = "at";
	$lang['oclock']	= "hours";
	$lang['comment'] = "Comment";
	$lang['email_yes'] = "Email to {ENTRY_NAME}";
	$lang['email_no'] = "{ENTRY_NAME} refuses e-mails from the guestbook.";
	$lang['hp_of'] = "Homepage of {ENTRY_NAME}";
	$lang['gravatar'] = "Gravatar of {ENTRY_NAME}";
	$lang['quote'] = "Quote of";

	// NEWENTRY.PHP
	$lang['new_entry_name'] = "Your Name:";
	$lang['new_entry_city'] = "City:";
	$lang['new_entry_email'] = "email:";
	$lang['new_entry_icq'] = "ICQ:";
	$lang['new_entry_aim'] = "AIM:";
	$lang['new_entry_msn'] = "MSN:";
	$lang['new_entry_fb'] = "Facebook:";
	$lang['new_entry_twitter'] = "Twitter:";
	$lang['new_entry_hp'] = "Homepage:";
	$lang['new_entry_message'] = "Your message:";
	$lang['necessary_fields'] = "[ Mandatory fields are marked with an asterisk (*) ]";
	$lang['user_notification'] = "Notify me per email when the entry is activated or a comment was posted.";
	$lang['user_show_email'] = "Show my email in the guestbook so that other users can contact me. If spam protection is activated, my email address will be invisible and users may contact me using the contact-form.";
	$lang['user_accept_akismet_service'] = "This entry will be checked by the 'Akismet' plugin on spam. I am aware of the precondition, that some of my personal data will be sent to a server in the United States of America and I do accept this.";
	$lang['send'] = "Submit";
	$lang['preview'] = "Preview";
	$lang['security_code'] = "Security code";
	$lang['captcha_refresh'] = "Generate new captcha code";
	$lang['captcha_what_is_that'] = "What is this?";
	$lang['captcha_wikipedia'] = "http://en.wikipedia.org/wiki/Captcha";
	$lang['captcha_tooltip'] = "A new guestbook entry or sending an email requires to transcribe the captcha-code in order to avoid automated posts (spam). Please type all letters as CAPITAL LETTERS. Should the code be unreadable, leave the captcha text field empty and click on ''Submit''. A new captcha-code will be generated while all your entries will be kept. If no new code is generated, please make a right click and then click on ''reload'' or press [CTRL]+[R].";
	$lang['back_to_mainpage'] = "Back to the main page";
	$lang['back'] = "Backwards";
	$lang['entry_success_mod'] = "Your entry was saved successfully.<br>It will be reviewed by the admin and then activated.";
	$lang['entry_success'] = "Your entry was saved successfully. You can look at it right now.";
	$lang['forwarding'] = "You will be forwarded automatically in 5 seconds. If not, please click on ''Back to the main page''.";
	$lang['sendmail_admin_title'] = "New guestbook entry by '{NAME}'";
	$lang['sendmail_user_title'] = "Your guestbook entry at {DOMAIN}";

	// EMAIL.PHP
	$lang['email_name'] = "Your name:";
	$lang['email_email'] = "Your email:";
	$lang['email_message'] = "Your message:";
	$lang['email_sent_to'] = "This email will be send to:";
	$lang['email_send'] = "Send";
	$lang['email_caption'] = "Email from '{NAME}' through the guestbook of {DOMAIN}";
	$lang['email_caption_copy'] = "Email to '{NAME}' through the guestbook of {DOMAIN} - Copy";
	$lang['email_sender'] = "Sender:";
	$lang['email_receiver'] = "Addressee:";
	$lang['email_from'] = "from:";
	$lang['email_sendcopytome'] = "I would like to receive a copy of this email.";
	$lang['email_success'] = "Your email was sent successfully to the user.";
	$lang['email_fail'] = "Your email couldn't be sent. Maybe there is a problem with the mail server.";

	// ERRORMESSAGES
	$lang['errormessage'][1] = "Please enter a message!";
	$lang['errormessage'][2] = "Please provide a valid email address!";
	$lang['errormessage'][3] = "Please enter your Name!";
	$lang['errormessage'][4] = "is not a valid<br>email address!";
	$lang['errormessage'][5] = "is not a valid<br>ICQ number!";
	$lang['errormessage'][6] = "The IP lock prevents an additional entry!";
	$lang['errormessage'][7] = "The captcha was not or wrongly entered!";
	$lang['errormessage'][8] = "This user refuses to receive emails!";
	$lang['errormessage'][9] = "An error occurred while sending the email!";
	$lang['errormessage'][10] = "Spam-protection: The entry form was sent too fast. Please wait {TIME_LOCK_REST} more seconds. Thank you.";
	$lang['errormessage'][11] = "The Akismet data privacy agreement was not accepted. It MUST be accepted to save the entry.";
	$lang['errormessage'][12] = "This email is forbidden for new entries.";
	$lang['errormessage'][13] = "This domain range is forbidden for new entries.";
	$lang['errormessage'][14] = "This ip address is forbidden for new entries.";
	$lang['errormessage'][15] = "is no valid facebook name.";
	$lang['errormessage'][16] = "is no valid twitter name.";
	$lang['errormessage'][17] = "You typed too fast! Are you a spamrobot? You have been banned for {KEYSTROKE_BAN_TIME} seconds. If this is a mistake, please report it to the Administrator.";
	$lang['errormessage'][18] = "You have been banned for too fast typing. Please wait {KEYSTROKE_BAN_TIME_REST} seconds before you can send the form again.";
	$lang['errormessage'][19] = "The direct access to forms is not allowed. Please use the navigation menu on the main page and ensure your browser is transferring the referer. Thank you.";

	// BBCODES
	$lang['bbcodes'] = "BBCodes:";
	$lang['bbcode_bold'] = "Bold";
	$lang['bbcode_help_bold'] = "Displays text in bold type";
	$lang['bbcode_italic'] = "Italic";
	$lang['bbcode_help_italic'] = "Displays text in italic type";
	$lang['bbcode_url'] = "Anchor";
	$lang['bbcode_help_url'] = "Inserts a hyperlink. Possibilities: [url]http://www.test.com/[/url] or [url=http://www.test.com/]Test[/url] or [url=http://www.test.com/][img]url of image[/img][/url]";
	$lang['bbcode_img'] = "Image";
	$lang['bbcode_help_img'] = "Inserts an image. Possibilities: [img]url of image[/img] or [img=width,height]url of image[/img]";
	$lang['bbcode_flash'] = "Flash";
	$lang['bbcode_help_flash'] = "Inserts a flash video. Possibilities: [flash=width,height]url of video[/flash]";
	$lang['bbcode_quote'] = "Quote";
	$lang['bbcode_help_quote'] = "Inserts a quote. Possibilites: [quote]QUOTE[/quote] or [quote=Name]QUOTE[/quote]";
	$lang['bbcode_textsize'] = "Text size";
	$lang['bbcode_extrasmall'] = "Tiny";
	$lang['bbcode_small'] = "Small";
	$lang['bbcode_default'] = "Standard";
	$lang['bbcode_big'] = "Big";
	$lang['bbcode_extrabig'] = "Extra big";
	$lang['bbcode_textcolor'] = "Text color";
	$lang['bbcode_help_size'] = "Text size";
	$lang['smileys'] = "Emoticons:";
?>
