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
	lang_main.php - Turkish
	=======================

	Translated by Mustafa Dündar
	*/

	// INDEX.PHP
	$lang['install_directory_exists'] = "Kurulum dizini silinmedi.<br>Keni güvenliðin için þimdi yap!<br>Güncelleþtirmeden sonra çalýþtýrmayý <a href=\"install/upgrade.php\" title=\"Upgrade\">upgrade.php</a> unutma!<br>If you experience some problems with umlauts after upgrading, maybe <a href=\"install/convert_ansi.php\" title=\"Convert to utf8\">convert_ansi.php</a> can help.";
	$lang['new_entry'] = "Kayýt";
	$lang['new_entry_descr'] = "Burada bir Ziyaretci Defterine yazabilirsin";
	$lang['contact'] = "Ýletiþim";
	$lang['contact_descr'] = "Sen burada Yönetici ile iliþgiye girebilirsin";
	$lang['adminpanel'] = "Yönetim";
	$lang['adminpanel_descr'] = "Oturum açmak için";
	$lang['entry'] = "Giriþ";
	$lang['entries'] = "Giriþler";
	$lang['no_entries'] = "Malesef hiç bir <br>giriþ yapýlmamýþtýr.";
	$lang['entries_on_pages'] = "Giriþler {PAGES} Sayfa";
	$lang['page_first'] = "Ýlk sayfaya ";
	$lang['page_first_symbol'] = "&laquo;";
	$lang['page_forwards'] = "Bir Sayfa ileri git";
	$lang['page_forwards_symbol'] = "&rsaquo;";
	$lang['page_last'] = "Son Sayfa";
	$lang['page_last_symbol'] = "&raquo;";
	$lang['page_backwards'] = "Bir sayfa geri git";
	$lang['page_backwards_symbol'] = "&lsaquo;";
	$lang['anchor']	= "Bu giriþe doðrudan git";
	$lang['from'] = "dan";
	$lang['at'] = "için";
	$lang['oclock']	= "Saat";
	$lang['comment'] = "Yorum";
	$lang['email_yes'] = "eMail {ENTRY_NAME}";
	$lang['email_no'] = "{ENTRY_NAME} Ziyaretçi Defterinden e-Posta almak istemiyorsanýz.";
	$lang['hp_of'] = "Anasayfa {ENTRY_NAME}";
	$lang['gravatar'] = "Gravator {ENTRY_NAME}";
	$lang['quote'] = "Quote of";

	// NEWENTRY.PHP
	$lang['new_entry_name'] = "Adýn:";
	$lang['new_entry_city'] = "Oturduðun yer:";
	$lang['new_entry_email'] = "eMail:";
	$lang['new_entry_icq'] = "ICQ:";
	$lang['new_entry_aim'] = "AIM:";
	$lang['new_entry_msn'] = "MSN:";
	$lang['new_entry_fb'] = "Facebook:";
	$lang['new_entry_twitter'] = "Twitter:";
	$lang['new_entry_hp'] = "Ýnternet Sitesi:";
	$lang['new_entry_message'] = "Senin Mesajýn:";
	$lang['necessary_fields'] = "[ (*) iþaretli yerleri doldurmanýz gerekir ]";
	$lang['user_notification'] = "Eðer bir giriþ veya Mesaj yazýldýðýnda e-Posta ile haber verilir.";
	$lang['user_show_email'] = "Ýletiþim Formu aracýlýðý ile bana diger kullanýcýlardan e-Posta yazmasý için izin ver. Spam önlemek için benim e-Posta adresimi gösterme.";
	$lang['user_accept_akismet_service'] = "This entry will be checked by the 'Akismet' plugin on spam. I am aware of the precondition, that some of my personal data will be sent to a server in the United States of America and I do accept this.";
	$lang['send'] = "Kayýt";
	$lang['preview'] = "Önizleme";
	$lang['security_code'] = "Güvenlik Kodu";
	$lang['captcha_refresh'] = "Generate new captcha code";
	$lang['captcha_what_is_that'] = "Bu nedir?";
	$lang['captcha_wikipedia'] = "http://tr.wikipedia.org/wiki/Captcha";
	$lang['captcha_tooltip'] = "Yeni bir giriþ otomatik kayýtlarý engellemek için bir güvenlik kodu gerektirir. Lütfen bütün harfleri büyük gir. Eðer Kod okunamzise boþ yaz ''Eintragen''. Yeni bir Kod oluþturulur. Önceki verdiðin deðerler kalýr. Eðer yeni Cod oluþmazise saðtarafta ''Aktualisieren'' bas.";
	$lang['back_to_mainpage'] = "Ana Sayfaya geri dön";
	$lang['back'] = "Geri";
	$lang['entry_success_mod'] = "Yorum baþarýyla kaydedildi. <br>O, Yönetici tarafýndan incelenir, sonra yayýnlanýr.";
	$lang['entry_success'] = "Yorum baþarýyla kaydedildi. Bunu hemen görebilirsiniz.";
	$lang['forwarding'] = "5 saniye içinde otamatik olarak yönlendirileceksiniz. Deðilse Anasayfaya ''Geri'' bas.";
	$lang['sendmail_admin_title'] = "Yeni giriþ '{NAME}'";
	$lang['sendmail_user_title'] = "Kayýt {DOMAIN}";

	// EMAIL.PHP
	$lang['email_name'] = "Senin Ýsmin:";
	$lang['email_email'] = "Senin eMail:";
	$lang['email_message'] = "Senin Haberin:";
	$lang['email_sent_to'] = "Bu eMail ona gönderilecektir:";
	$lang['email_send'] = "gönder";
	$lang['email_caption'] = "e-Posta '{NAME}' Ziyaretçi Defteri üzerine {DOMAIN} den";
	$lang['email_caption_copy'] = "Email to '{NAME}' through the guestbook of {DOMAIN} - Copy";
	$lang['email_sender'] = "Gönderen:";
	$lang['email_receiver'] = "Alýcý:";
	$lang['email_from'] = "üzerinde:";
	$lang['email_sendcopytome'] = "Bu e-Postanin bir kopyasýný istiyorum.";
	$lang['email_success'] = "Senin e-Postan kullanýcýya baþarýyla gönderilmiþtir.";
	$lang['email_fail'] = "E-Posta gönderilemedi. Posta sunucusu ile ilgili bir sorun olabilir.";

	// ERRORMESSAGES
	$lang['errormessage'][1] = "Bir mesaj girin!";
	$lang['errormessage'][2] = "Geçerli bir eMail adresi girin!";
	$lang['errormessage'][3] = "Lütfen isminizi giriniz!";
	$lang['errormessage'][4] = "geçerli bir <br>eMail adresi deðil!";
	$lang['errormessage'][5] = "geçerli býr <br>ICQ numarasý deðil!";
	$lang['errormessage'][6] = "IP Blogu bir daha giriþe yasaklý!";
	$lang['errormessage'][7] = "Güvenlik kodu yanlýþ veya girilmedi!";
	$lang['errormessage'][8] = "Bu Kullanýcý e-Posta almak istemiyor!";
	$lang['errormessage'][9] = "E-Posta giderken bir hata oluþtu!";
	$lang['errormessage'][10] = "Spam-protection: The entry form was sent too fast. Please wait {TIME_LOCK_REST} more seconds. Thank you.";
	$lang['errormessage'][11] = "The Akismet data privacy agreement was not accepted. It MUST be accepted to save the entry.";
	$lang['errormessage'][12] = "This email is forbidden for new entries.";
	$lang['errormessage'][13] = "This domain range is forbidden for new entries.";
	$lang['errormessage'][14] = "This ip address is forbidden for new entries.";
	$lang['errormessage'][15] = "is no valid facebook name.";
	$lang['errormessage'][16] = "is no valid twitter name.";
	$lang['errormessage'][17] = "You typed too fast! Are you a spamrobot? You have been banned for {KEYSTROKE_BAN_TIME} seconds. If this is a mistake, please report it to the Administrator.";
	$lang['errormessage'][18] = "You have been banned for too fast typing. Please wait {KEYSTROKE_BAN_TIME_REST} seconds before you can send the form again.";

	// BBCODES
	$lang['bbcodes'] = "BBCodes:";
	$lang['bbcode_bold'] = "Yað";
	$lang['bbcode_help_bold'] = "Displays text bold";
	$lang['bbcode_italic'] = "Ýtalik";
	$lang['bbcode_help_italic'] = "Displays text italic";
	$lang['bbcode_url'] = "Baðlantý";
	$lang['bbcode_help_url'] = "Inserts a hyperlink. Possibilities: [url]http://www.test.tr/[/url] or [url=http://www.test.tr/]Test[/url] or [url=http://www.test.tr/][img]url of image[/img][/url]";
	$lang['bbcode_img'] = "Image";
	$lang['bbcode_help_img'] = "Inserts an image. Possibilities: [img]url of image[/img] or [img=width,height]url of image[/img]";
	$lang['bbcode_flash'] = "Flash";
	$lang['bbcode_help_flash'] = "Inserts a flash video. Possibilities: [flash=width,height]url of video[/flash]";
	$lang['bbcode_quote'] = "Quote";
	$lang['bbcode_help_quote'] = "Inserts a quote. Possibilites: [quote]QUOTE[/quote] or [quote=Name]QUOTE[/quote]";
	$lang['bbcode_textsize'] = "Yazý tipi boyutu";
	$lang['bbcode_extrasmall'] = "Minik";
	$lang['bbcode_small'] = "Küçük";
	$lang['bbcode_default'] = "Standart";
	$lang['bbcode_big'] = "Birleþik";
	$lang['bbcode_extrabig'] = "Kocaman";
	$lang['bbcode_textcolor'] = "Yazý tipi rengi";
	$lang['bbcode_help_size'] = "Yayý tipi boyutu";
	$lang['smileys'] = "Smilies:";
?>
