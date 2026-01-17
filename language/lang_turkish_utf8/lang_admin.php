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
	lang_admin.php - Turkish
	========================

	Translated by Mustafa Dündar
	*/

	// GENERAL
	$lang['no'] = "Hayýr";
	$lang['yes'] = "Evet";
	$lang['min'] = "minimum";
	$lang['max'] = "maximum";
	$lang['save'] = "Kaydet";
	$lang['asc'] = "Yükselen";
	$lang['desc'] = "Azalan";
	$lang['administrator'] = "Yönetici";
	$lang['moderator'] = "Moderatör";
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
	$lang['title'] = "MGB OpenSource Guestbook - Yönetimi";
	$lang['login_username'] = "Kullanýcý adý:";
	$lang['login_password'] = "Þifre:";
	$lang['login_lostpassword'] = "Þifremi unuttum";
	$lang['login'] = "Giriþ";
	$lang['logout'] = "Cýkýþ";
	$lang['login_ok'] = "Hoþgeldiniz <b>{SESSION_USERNAME}</b>.";
	$lang['logged_in'] = "Giriþ yapýldý <b>{SESSION_USERNAME}</b>";
	$lang['logged_out'] = "Giriþ yapabilmen için Kullanýcý adýný ve Þifreni ver.";
	$lang['please_wait'] = "Baþarýlý giriþ yapýlmýþtýr.<br>Lütfen biraz bekleyiniz...";

	// ERRORMESSAGES
	$lang['errormessage'][1] = "Lütfen tüm alanlarý doldurunuz!";
	$lang['errormessage'][2] = "Bu kullanýcý adý / Þifre kombinasyonu yoktur.";
	$lang['errormessage'][3] = "Kullanýcý Hesabýnýz Yönetici tarafýndan devre dýþý býrakýldý.";
	$lang['errormessage'][4] = "Senin bu Sayfa eriþim hakkýn yok.";
	$lang['errormessage'][5] = "Vermiþ olduðun Þifre yanlýþ.";
	$lang['errormessage'][6] = "Yeni verilen Þifre ayni deðil.";
	$lang['errormessage'][7] = "Verilen e-Posta adresi geçerli deðil veya hiç verilmemiþtir.";
	$lang['errormessage'][8] = "Sen kendine Yönetici durumunu veremezsin, ya kendi kullanýcý hesabýný devre dýþý býrak veya sil.";
	$lang['errormessage'][9] = "Sen uzun zaman etkin oldadýðýn için otomatik olarak dýþarý çýkarýldýnýz.";
	$lang['errormessage'][10] = "Son ziyaretinizde düzgün cýkýþ yapmadýðýnýz için, sistem sizi dýþarý attý.<br><br>Lütfen kendi güvenliðiniz için devamlý ''Cýkýþ'' Tuþunu kullanarak cýkýþ yapýnýz. Teþekkürler.";
	$lang['errormessage'][11] = "Bu Kullanýcý adý veya e-Posta adresi kullanýlmaktadýr.";
	$lang['errormessage'][12] = "Bu anahtar geçersiz veya süresi dolmuþtur.";
	$lang['errormessage'][13] = "Kullanýcý Hesabýnýz için yeni Þifre talep edilmiþtir.<br>Yeni bir Þifre Talebi, yenisi aktiv olana kadar veya süresi bitene kadar mümkün deðildir.";
	$lang['errormessage'][14] = "e-Posta gönderilemedi. Posta sunucusu ile ilgili bir sorun olabilir.";
	$lang['errormessage'][15] = "Sürümü tespit edilemedi, çünki <a href=\"http://php.net/manual/tr/function.fopen.php\">fopen()</a> sunucu devredýþý býrakýlmýþtýr.<br>Setze Dich gegebenenfalls mit Deinem Hoster in Verbindung.<br><br>Bu zaman içinde en son sürümü hakkýnda http://www.m-gb.org/ den bilgi alabilirsin.";
	$lang['errormessage'][16] = "Your new password is too short. Secure passwords should have at least {PASSWORD_MIN_LENGTH} characters.";
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
	$lang['back_to_mainpage'] = "Geri Anasayfa";
	$lang['back'] = "Geri";
	$lang['go'] = "Haydi!";
	$lang['entry'] = "Kayýt";
	$lang['entries'] = "Kayýtlar";
	$lang['no_entries'] = "Kayýtlar yoktur.";
	$lang['no_deactivated_entries'] = "Hiç bir girdisi devredýþý býrakýlmadý";
	$lang['no_activated_entries'] = "Aktiv kayýt yoktur.";
	$lang['no_spam_entries'] = "Spam girişi yok.";
	$lang['entries_on_pages'] = "Kayýtlar {PAGES} Sayfa";
	$lang['page_first'] = "ilk Sayfa";
	$lang['page_first_symbol'] = "&laquo;";
	$lang['page_forwards'] = "Bir Sayfa ileri";
	$lang['page_forwards_symbol'] = "&rsaquo;";
	$lang['page_last'] = "son Sayfa";
	$lang['page_last_symbol'] = "&raquo;";
	$lang['page_backwards'] = "bir Sayfa Geri";
	$lang['page_backwards_symbol'] = "&lsaquo;";
	$lang['captcha_method_code'] = "Güvenlik Kodu";
	$lang['captcha_method_math'] = "Matematiksel";
	$lang['activate_entry'] = "Bu Kayýtý aktifleþtir";
	$lang['deactivate_entry'] = "Bu Kayýtý devredýþý býrak";
	$lang['delete_entry'] = "Bu Kayýtý sil";
	$lang['mark_as_spam'] = "Spam olarak işaretleyin";
	$lang['nospam_entry'] = "'Spam değil' olarak işaretleyin ve onaylayın";
	$lang['nospam_deactivate_entry'] = "'Spam değil' olarak işaretleyin ama devre dışı tutun";
	$lang['active'] = "Bu Kayýt Müþteri Defterinde etkindir.";
	$lang['inactive'] = "Bu Kayýt Müþteri Defterinde etkin deðildir.";
	$lang['edit_entry'] = "Bu Kayýtý düzenle";
	$lang['timestamp'] = "Timestamp";
	$lang['quote'] = "Quote of";

	// GRAVATAR
	$lang['gravatar_position_left'] = "Left side of entry";
	$lang['gravatar_position_right'] = "Right side of entry";
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
	$lang['do_nothing'] = "Hiç bir işlem seçilmedi...";
	$lang['delete_whole_spam'] = "Tüm Spamları sil";
	$lang['mark_all_no_spam_deactivate'] = "Tüm Girişleri ''Spam değil'' olarak işaretleyin fakat devre dışı tutun";
	$lang['mark_all_no_spam_activate'] = "Tüm Girişleri ''Spam değil'' olarak işaretleyin ve onaylayın";
	$lang['mark_all_as_spam'] = "Tüm Girişleri Spam olarak işaretleyin";
	$lang['activate_all_entries'] = "Tüm Girişleri onaylayın";
	$lang['deactivate_all_entries'] = "Tüm Girişleri devre dışı tutun";
	$lang['delete_all_entries'] = "Tüm Girişleri silin";
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
	$lang['sendmail_user_notification_title'] = "Senin Kayýtýn {DOMAIN} aktifleþmiþtir";
	$lang['sendmail_user_comment_title'] = "Senin Kayýtýna {DOMAIN} Yorum yapýlmýþtýr";
	$lang['sendmail_adduser_title'] = "Kullanýcý verileri {DOMAIN}";
	$lang['sendmail_adduser_text'] = "Kullanýcý verileri Yönetici tarafýndan {DOMAIN} de giriþ yapýlmýþtýr. Burada Kullnýcý verileri:<br /><br />Kullanýcý adý: {ADDUSER_NAME}<br />Þifre: {ADDUSER_PASSWORD}<br /><br />Sen buraya giriþ yapabilirsin: {ADDUSER_URL}";
	$lang['sendmail_admin_text'] = "{NAME} Ziyaretci Defterinde yeni bir Kayýt býrakmýþtýr.<br /><br />Tarih: {DATE}<br />Zaman: {TIME}<br /><br />---<br />{MESSAGE}<br />---<br /><br />{URL_TO_GB}";
	$lang['sendmail_user_text'] = "Merhaba {NAME},<br /><br />Ziyaaretci Defterinindeki Kayýt için çok Teþekkür ederim.";
	$lang['sendmail_user_text_moderated'] = "Merhaba {NAME},<br /><br />Ziyaaretci Defterinindeki Kayýt için çok Teþekkür ederim. Kayýt kýsa bir süre incelemeden sonra serbest býrakýlacaktýr.";
	$lang['sendmail_user_notification_text'] = "Merhaba {NAME},<br /><br />{DOMAIN} Kayýtýnýz biraz önce etkinleþmiþtir. Siz onu burada görebilirsiniz: {URL_TO_GB}";
	$lang['sendmail_comment_text'] = "Merhaba {NAME},<br /><br />Kayýtýna<br /><br />---<br />{MESSAGE}<br />---<br /><br />biraz önce Yorum yapýlmýþtýr. Siz onu burada görebilirsiniz: {URL_TO_GB}";
	$lang['sendmail_contactmail_text'] = "Ziyaretçi Defterine {DOMAIN}, {NAME} den e-Posta aldýnýz. Haber:<br /><br />---<br />{MESSAGE}<br />---<br /><br />Tarih: {DATE}<br />Zaman: {TIME}";
	$lang['sendmail_contactmail_text_copy'] = "You sent an email to {NAME} through the guestbook of {DOMAIN}. Here\'s a copy of the message:<br /><br />---<br />{MESSAGE}<br />---<br /><br />Date: {DATE}<br />Time: {TIME}";
	$lang['sendmail_new_password_title'] = "Yeni Þifre: onay";
	$lang['sendmail_new_password_text'] = "Merhaba {NAME},<br /><br />Hesabýnýz için yeni bir Þifre oluþturulmuþtur. Bunu doðrulamak için 24 saat içinde aþaðýdaki linki týklayýnýz. Yeni Þifre aktifleþinceye kadar eski Þifre aktif kalacaktýr.<br /><br />24 saat içinde link e basýlmaz ise, yeni Þifre devreye girmez.<br /><br />{NEW_PASSWORD_LINK}";
	$lang['sendmail_new_password_created_title'] = "Yeni Þifre aktifleþti";
	$lang['sendmail_new_password_created_text'] = "Merhaba {NAME},<br /><br />Baþarýlý olarak yeni Þifrenizi tastiklediniz. Yeni giriþ bilgileri.<br /><br />Kullanýcý adý: {NAME}<br />Þifre: {NEW_PASSWORD}";

	// NAVIGATION
	$lang['settings'] = "Yapýlandýrma";
	$lang['settings_general'] = "General";
	$lang['settings_look'] = "Look &amp; feel";
	$lang['settings_bbcodes'] = "BBCodes";
	$lang['settings_emoticons'] = "Emoticons";
	$lang['settings_gravatar'] = "Gravatar";
	$lang['settings_security'] = "Security &amp; Anti-Spam";
	$lang['settings_mails'] = "E-Mails";
	$lang['settings_database'] = "Database";
	$lang['activate'] = "Kayýt onaylamak";
	$lang['deactivate'] = "Kayýt devredýþý";
	$lang['delete'] = "Kayýt Sil";
	$lang['edit'] = "Kayýt düzenle";
	$lang['spam'] = "Spam olarak işaretlenmiş Girişler";
	$lang['edit_smilies'] = "Edit smilies";
	$lang['edit_users'] = "Kullanýcý yönetimi";
	$lang['banlists'] = "Manage banlists";
	$lang['banlist_ips'] = "IP banlist";
	$lang['banlist_emails'] = "E-Mail banlist";
	$lang['banlist_domains'] = "Domain banlist";
	$lang['spam_log'] = "Spam log";
	$lang['stats'] = "Ýstatistik";
	$lang['license'] = "Lisans";
	$lang['forum'] = "forum";
	$lang['bugreport'] = "Hata bildirmek";
	$lang['version'] = "Versiyon";
	$lang['manual'] = "Belge";
	$lang['fb_nav'] = "MGB on Facebook";
	$lang['to_guestbook'] = "Ziyaretçi Defteri kaydol";
	$lang['paypal'] = "Eðer MGB yararlý bulursanýz, geliþimesini desteklemek isterseniz, baðýþ için çekinmeyin.";

	// SETTINGS.INC.PHP
	$lang['edit_caption_general'] = "Genel Ayarlar";
	$lang['edit_caption_look'] = "Görünüm";
	$lang['edit_caption_bbcodes'] = "BBCodes";
	$lang['edit_caption_smilies'] = "Emoticons";
	$lang['edit_caption_gravatars'] = "Gravatar desteði";
	$lang['edit_caption_security'] = "Güvenlik";
	$lang['edit_caption_antispam'] = "Anti-Spam";
	$lang['edit_caption_captcha'] = "Captcha";
	$lang['edit_caption_recaptcha'] = "reCaptcha";
	$lang['edit_caption_dynamic_fieldnames'] = "Dynamic Fieldvariables";
	$lang['edit_caption_akismet'] = "Akismet-Plugin";
	$lang['edit_caption_time_lock'] = "Sign lock";
	$lang['edit_caption_mail_settings'] = "eMail settings";
	$lang['edit_caption_smtp_settings'] = "The following data is only needed if you want to send mails by phpmailer (smtp) and if your server needs authentication.";
	$lang['edit_caption_email'] = "e-Posta";
	$lang['edit_caption_database'] = "Database information";
	$lang['edit_caption_database_backups'] = "Database Backups";
	$lang['edit_caption_keystroke'] = "Keystroke";
	$lang['edit_save_message'] = "Ayarlar baþarýyla güncellendi.";
	$lang['edit_title'] = "Baþlýk:";
	$lang['edit_h_author'] = "Yazar:";
	$lang['edit_h_domain'] = "Domain:";
	$lang['edit_gb_path'] = "Ziyaretçi Defteri Yol:";
	$lang['edit_h_keywords'] = "Anahtar Kelimeler:";
	$lang['edit_h_description'] = "Açýklama:";
	$lang['edit_timezone'] = "Timezone:";
	$lang['edit_announcement_message'] = "Announcement message:";
	$lang['edit_admin_name'] = "Admin Adý:";
	$lang['edit_admin_email'] = "Admin e-Posta:";
	$lang['edit_admin_gbemail'] = "Ziyaretçi Defteri e-Posta:";
	$lang['edit_caching'] = "Caching:";
	$lang['edit_sendmail_admin'] = "e-Posta Uyarýlarý:";
	$lang['edit_sendmail_admin_text'] = "e-Posta Uyarýlarý için Metin:";
	$lang['edit_sendmail_user'] = "Kullanýcýlara Teþekkür e-Postasý:";
	$lang['edit_sendmail_user_text'] = "Teþekkür e-Postasý Metini (not moderated):";
	$lang['edit_sendmail_user_text_moderated'] = "Teþekkür e-Postasý Metini (moderated):";
	$lang['edit_sendmail_user_notification_text'] = "Aktivasyon e-Posta Metini:";
	$lang['edit_sendmail_comment_text'] = "Yorum Bildirimi Metini:";
	$lang['edit_sendmail_contactmail_text'] = "Ziyaretçi Defteri e-Posta Metini:";
	$lang['edit_sendmail_contactmail_text_copy'] = "Text for a copy of an eMail through the guestbook:";
	$lang['edit_template_path'] = "Þablon:";
	$lang['edit_template_style_path'] = "Þablon-Tarzý:";
	$lang['edit_iconset_path'] = "Grafik Seti:";
	$lang['edit_language_path'] = "Dil Dosyasý:";
	$lang['edit_badwords'] = "Sözcük sansür:";
	$lang['edit_bbcode'] = "Forum Kodlarý:";
	$lang['edit_allow_img_tag'] = "IMG-Tag:";
	$lang['edit_max_img_width'] = "Maximum width of image:";
	$lang['edit_max_img_height'] = "Maximum height of image:";
	$lang['edit_center_img'] = "Display images centered:";
	$lang['edit_allow_flash_tag'] = "FLASH-Tag:";
	$lang['edit_max_flash_width'] = "Maximum width of flash:";
	$lang['edit_max_flash_height'] = "Maximum height of flash:";
	$lang['edit_center_flash'] = "Display flash centered:";
	$lang['edit_smileys'] = "Smilies:";
	$lang['edit_smileys_break'] = "Smiley line break:";
	$lang['edit_smileys_order'] = "Sorting of smilies:";
	$lang['edit_blocktime'] = "Blocktime:";
	$lang['edit_captcha'] = "Güvenlik sorusu (''Captcha''):";
	$lang['edit_captcha_method'] = "Captchas Türü:";
	$lang['edit_recaptcha_pub_key'] = "reCaptcha Public Key:";
	$lang['edit_recaptcha_private_key'] = "reCaptcha Private Key:";
	$lang['edit_recaptcha_style'] = "reCaptcha Style:";
	$lang['edit_captcha_length'] = "Length of Captcha:";
	$lang['edit_captcha_salt'] = "Salt:";
	$lang['edit_captcha_hash_method'] = "Hash:";
	$lang['edit_captcha_double_hash'] = "Throw the dice twice:";
	$lang['edit_captcha_coords'] = "Captcha coordinates:";
	$lang['edit_captcha_color'] = "Captcha text color:";
	$lang['edit_captcha_angle'] = "Captcha angle:";
	$lang['edit_wrong_captcha_count'] = "Maximum number of wrong captchas:";
	$lang['edit_akismet_plugin'] = "Akismet-Eklentisi:";
	$lang['edit_akismet_api'] = "Akismet API Anahtarý (gerekli):";
	$lang['edit_akismet_mark_as_spam'] = "Spam-İşareti:";
	$lang['edit_time_lock'] = "Sign lock:";
	$lang['edit_time_lock_value'] = "Minimum time for sign lock:";
	$lang['edit_time_lock_maxtime'] = "Maximum time for sign lock:";
	$lang['edit_time_lock_spam_count'] = "Maximum allowed number for sending the form too early:";
	$lang['edit_user_notification'] = "Kullanýcý bildirimi:";
	$lang['edit_user_show_email'] = "Müþteri Kitabý kullanýcý e-Posta:";
	$lang['edit_session_timeout'] = "Oturum Sonaerme zamaný:";
	$lang['edit_password_min_length'] = "Minimum length for passwords:";
	$lang['edit_moderated'] = "Modernes Müþteri Defteri:";
	$lang['edit_require_email'] = "eMail required:";
	$lang['edit_entries_per_page'] = "Sayfa baþýna giriþ adedi:";
	$lang['edit_entries_order'] = "Numaralandýrma sýrasý:";
	$lang['edit_entries_order_asc_desc'] = "Sequence of ordering:";
	$lang['edit_entries_numbering'] = "Sequence of numbering:";
	$lang['edit_spam_protection'] = "e-Posta Spam korumasý:";
	$lang['edit_spam_mail'] = "E-Mail address for spam notification:";
	$lang['edit_ipblocker'] = "IP-Barikat:";
	$lang['edit_wordwrap'] = "Satýrsonu:";
	$lang['edit_dateform'] = "Tarih Biçimi:";
	$lang['edit_gravatar_show'] = "Gravatars Göster:";
	$lang['edit_gravatar_rating'] = "Gravatars sýnýflandýrma:";
	$lang['edit_gravatar_type'] = "Unregistered gravatars:";
	$lang['edit_gravatar_size'] = "Gravatar size:";
	$lang['edit_gravatar_position'] = "Position:";
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

	$lang['edit_expl_title'] = "Müþteri Defteri Baþlýðý.";
	$lang['edit_expl_h_author'] = "Yazarýn web sitesinin adý.";
	$lang['edit_expl_h_domain'] = "Konuk kitap Domain <b>olmadan http://</b> Baþta, ve <b>/</b> sonda. (ornek.de)";
	$lang['edit_expl_gb_path'] = "Ziyaretçi Defterinin Domain e relatif yolu.";
	$lang['edit_expl_h_keywords'] = "Anahtar kelimeler virgülle ayrýlacak";
	$lang['edit_expl_h_description'] = "Sayfanýn kýsa bir açýklamasý.";
	$lang['edit_expl_timezone'] = "From PHP5 onwards you must set a timezone. <a href='http://www.php.net/manual/en/timezones.php' target='_blank'>List of all available timezones</a>.";
	$lang['edit_expl_announcement_message'] = "This text will be shown above guestbook entries in index.php. It will stay there until you delete it. Formatting the text with BBCodes and smileys is also possible.";
	$lang['edit_expl_admin_name'] = "Admin ismi veya sadece ''Admin''.";
	$lang['edit_expl_admin_email'] = "Yeni gelen mesajlar bu adresse gönderilecektir.";
	$lang['edit_expl_admin_gbemail'] = "E-Postalar için gönderici adresi olarak kullanýlýr.";
	$lang['edit_expl_caching'] = "If caching is active, the guestbook entries will be loaded from the cache rather than from the database. This can decrease server load on pages with many visits.<br><br><b>ATTENTION: This feature has to be regarded as experimental. If you discover problems with the display of new entries or something similar, I recommend to deactivate this option.</b>";
	$lang['edit_expl_sendmail_admin'] = "Bu seçenek etkinse, yeni bir kayýt geldiðinde yöneticiye bir e-Posta gönderilir.";
	$lang['edit_expl_sendmail_admin_text'] = "Bu metin aktif e-Posta bildirimi ile yöneticiye gönderilecektir.<br><br>Mevcut yer tutucularý: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_user'] = "Bu seçenek etkinleþtirildiðinde, kullanýcý giriþi için bir teþekkür e-Posta gönderilir.";
	$lang['edit_expl_sendmail_user_text'] = "This text will be send to the user, if <b>entry activation is inactive</b> and if the Thank-You mail option is activated.<br><br>Available placeholders: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_user_text_moderated'] = "This text will be send to the user, if <b>entry activation is active</b> and if the Thank-You mail option is activated.<br><br>Available placeholders: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_user_notification_text'] = "Bu Metin, Kullanýcýya kýsa sürede gönderilen katlýlarý etkinleþirse gönderilir. Ön koþulu kullanýcý olduðunu ve giriþe razý olduðunu bildirmesidir.<br><br>Mevcut yer tutucularý: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_comment_text'] = "Eðer Admin veya Moderator tarafýndan bir yorum yapýldýðý taktirde, bu Metin kullanýcýya gönderilir. Ön koþulu kullanýcý olduðunu ve giriþe razý olduðunu bildirmesidir.<br><br>Mevcut yer tutucularý: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_contactmail_text'] = "Bu Metin kullanýcýlarýna etkin bir e-Posta Spamkoruma yönünde Ziyaretçi Defteri tarafýndan gelir ise gönderilir.<br><br>Mevcut yer tutucularý: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_contactmail_text_copy'] = "This text will be delivered to sender with a copy of his message sent through the guestbook while spam-protection is activated.<br><br>Available placeholders: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_template_path'] = "Kullanýlan Þablon.";
	$lang['edit_expl_template_style_path'] = "Ýstenýlen Þablon-Stili. Ýlgili Þablon yüklendikten sonra seçilebilir.";
	$lang['edit_expl_iconset_path'] = "Ýstediðiniz Grafikseti, ikonlar, simgeler ve Captcha Duvarkaðýtlarý ne olursa olsun Þablonu saðlar.";
	$lang['edit_expl_language_path'] = "The language which will be used.<br><br><b>ATTENTION:</b> Since version <b>0.6.5</b> languages that use the character-set latin9 (iso-8859-15) are <b>NO LONGER</b> supported. If you discover problems with missing variables, empty text fields and so on, try to switch to an utf-8-based language and delete all 'latin9'-languages in the folder 'language'.<br><br>Should you then discover problems with umlauts or special chars, please execute 'convert_ansi.php' in the folder 'install'.";
	$lang['edit_expl_language_author'] = "Author:";
	$lang['edit_expl_language_charset'] = "Charset:";
	$lang['edit_expl_badwords'] = "Ziyaretci Defterinde yýldýz tarafýndan deðiþtirilmesi gereken ve istenmeyen kelimeleri virgül ile ayýrarak giriniz. Devre dýþý kalmasý için boþ býrakýnýz.";
	$lang['edit_expl_bbcode'] = "Metin biçimlendirmesi kullanýcý tarafýndan olabilir.";
	$lang['edit_expl_allow_img_tag'] = "The implementation of images in a guest-book entry contains some security risks. Images could include malware, or a user could provide an image that is juristic ominous. Many and large pictures also reduce the loading speed of the guest-book.<br><br><b>The IMG-Tag should only be activated if the guest-book is moderated.</b>";
	$lang['edit_expl_max_img_width'] = "Defines the maximum width of an image.<br><br><b>ATTENTION: This only works if <a href='http://de2.php.net/manual/tr/function.getimagesize.php' target='_blank' title='php.net'>getimagesize();</a> is working, or if width and height are provided with the [img]-Tag like here -> [img=width,height]address of image[/img]).</b>";
	$lang['edit_expl_max_img_height'] = "Defines the maximum height of an image.<br><br><b>ATTENTION: This only works if <a href='http://de2.php.net/manual/tr/function.getimagesize.php' target='_blank' title='php.net'>getimagesize();</a> is working, or if width and height are provided with the [img]-Tag like here -> [img=width,height]address of image[/img]).</b>";
	$lang['edit_expl_center_img'] = "Defines if [img]-Tag images are displayed centered.";
	$lang['edit_expl_allow_flash_tag'] = "Allows the user to insert flash videos, like they come from youtube.<br><br><b>For security reasons the BBCode for flash videos should only be activated if the guestbook is moderated.</b>";
	$lang['edit_expl_max_flash_width'] = "Defines the maximum widht of a flashvideo.";
	$lang['edit_expl_max_flash_height'] = "Defines the maximum height of a flashvideo.";
	$lang['edit_expl_center_flash'] = "Defines if [flash]-Tag videos are displayed centered.";
	$lang['edit_expl_smileys'] = "Smiles eklemesini kullanýcýya saðlar.";
	$lang['edit_expl_smileys_break'] = "Defines after how much smilies there is a line break in the list of smilies in ''newentry.php''. Can be very helpful if much smilies are used.";
	$lang['edit_expl_smileys_order'] = "Indicates how smilies are sorted. Ascending or descending.";
	$lang['edit_expl_blocktime'] = "Defines the period of time a user is banned after he was added to one of the banlists.";
	$lang['edit_expl_captcha'] = "Bir Kullanýcý yeni bir giriþ ve e-Posta yazý yazmasýný etkinleþtirmesi için bir güvenlik kodu vermesi gerekir.";
	$lang['edit_expl_captcha_method'] = "Kullanýcý bir aritmetik problemi çözmek için bir güvenlik kodu veya matematiksel bir Captcha arasýnda seçim yapabilirsiniz.";
	$lang['edit_expl_recaptcha_pub_key'] = "This key is needed by reCaptcha. You can get it <a href=\"https://www.google.com/recaptcha/admin/create\">here</a>.";
	$lang['edit_expl_recaptcha_private_key'] = "This key is also needed by reCaptcha. You will get it with your public key.";
	$lang['edit_expl_recaptcha_style'] = "Defines the look of reCaptcha.";
	$lang['edit_expl_captcha_length'] = "For security code only. <b>Not for mathematical captcha or reCaptcha!</b><br><br>Minimum: <b>3</b><br>Maximum: <b>9</b>";
	$lang['edit_expl_captcha_salt'] = "A ''Salt'' is a randomly chosen word or a combination out of characters and numbers that is mixed into the hash that generates the captcha. Thus it is possible to give a ''personal touch'' to the hash that is known by nobody except you. Makes the captcha more safer.<br><br>You should change it after installation, but this is not required. The value you see here was chosen randomly during installation. It should be okay. If you don't want to use a ''Salt'' you can leave it blank.";
	$lang['edit_expl_captcha_hash_method'] = "Sets the Hash method that is used to generate the captcha.";
	$lang['edit_expl_captcha_double_hash'] = "If this option is activated the randomly generated numbers and letters will be ''more'' random.";
	$lang['edit_expl_captcha_coords'] = "Sets the coordinates where the text starts to be drawn into the background picture. Origin is the <b>lower left edge of the first character</b>.";
	$lang['edit_expl_captcha_color'] = "Sets the text color of the captcha. The value has to be in the HTML-Format and without the number sign '#'.<br><br><b>Right: <span class='newer_version'>505050</span><br>Wrong: <span class='old_version'>#505050</span></b>";
	$lang['edit_expl_captcha_angle'] = "These values both define the array of degrees, the captcha text is randomly designed with. The left value has to be <b>lower</b> than the right value.";
	$lang['edit_expl_wrong_captcha_count'] = "This value defines how often the user is allowed to wrongly type a given captcha. If he reaches this limit, he will be put on the <b>spam list</b>.";
	$lang['edit_expl_akismet_plugin'] = "Akismet harici bir hizmettir, yeni giriþlerde spam kontrol eder ve olumlu bir sonuçta giriþi yazar. Akismet eklentisi <a href='http://www.m-gb.org/index.php?id=download_gb' title='Download Akismet eklentisi'>http://www.m-gb.org/</a> indirilir.<br><br><b>ATTENTION: With using the plugin 'akismet' you accept the transmission of data to a server in the United States of America. If you don't comply with that circumstance you MUST NOT USE 'Akismet'. Also your users have to agree with that if you activate the plugin.</b>";
	$lang['edit_expl_akismet_api'] = "Akismet i kullanabilmek için, Akismet-eklentisi <a href='http://akismet.com/signup/#free' title='Akismet API Anahtar'>API Key</a> lazýmdýr. Burada kayýt ver.";
	$lang['edit_expl_akismet_check_ok'] = "<span class='same_version'>Akismet yüklenmiþtir!</span>";
	$lang['edit_expl_akismet_check_fail'] = "<span class='old_version'>Akismet yüklenmemiþtir!</span>";
	$lang['edit_expl_akismet_mark_as_spam'] = "Bu seçenek aktifse, Akısmet tarfından yeni Spam mesajı olarak tanımlanacak ve Yönetimde Span Katagorisinde görünecektir.";
	$lang['edit_expl_time_lock'] = "If this option is enabled, a counter that prevents sending the formular too fast runs in the background of a new entry. If the user is too fast with his entry, a message appears that tells him how many seconds he have to wait, until he can sign the guestbook.";
	$lang['edit_expl_time_lock_value'] = "Minimum time a user has to wait to send the formular.";
	$lang['edit_expl_time_lock_maxtime'] = "Maximum time a user has the chance to sign the guestbook. If it takes too long, the counter restarts.";
	$lang['edit_expl_time_lock_spam_count'] = "Maximum number of attempts a user is allowed to send the form during the time that is defined for ''time lock''. If he reaches this limit he will be added to the <b>spam list</b>.<br><br>Minimum: <b>5</b><br>Maximum: <b>99</b>";
	$lang['edit_expl_user_notification'] = "Kullanýcýya giriþ mesajý aktive edildiðinde, haberi e-Posta ile mi almasýnýn gerektiðine karar verir.";
	$lang['edit_expl_user_show_email'] = "Kullanýcýya e-Postanýn Ziyaretçi Defterinde gösterilip gösterilmemesine izin verir.kutusunu devredýþý býrakýrsa, kimse ona eriþemez, Yönetici e-Posta yazabilir";
	$lang['edit_expl_session_timeout'] = "Kullanýcý verilen zamandan sonra halendaha etkin deðil ise devre dýþý býrakýlýr. Deðer <b>Saniye</b>. Þu Deðerler arasýnda olmadýr >= <b>60</b>.";
	$lang['edit_expl_password_min_length'] = "Defines the minimum length of passwords for Administrators / Moderators.";
	$lang['edit_expl_moderated'] = "Ziyaretçi Defterinde giriþlerin görünebilmesi için önceden aktif olarak etkinleþmesi gerekir.";
	$lang['edit_expl_require_email'] = "If activated, an email address must be provided by the user to post an new entry.<br><br><b>ATTENTION: The use of Akismet overrides this setting.</b>";
	$lang['edit_expl_entries_per_page'] = "Bir sayfada kaç tane Giriþin görüntüleneceðini gösterir. Deðer <b>0</b> olamaz.";
	$lang['edit_expl_entries_order'] = "Giriþlerin sayýlý sýrasýnýn nasýl olmasý gerektiðini belirtir.";
	$lang['edit_expl_entries_order_asc_desc'] = "Defines the sequence in which entries are sorted.";
	$lang['edit_expl_entries_numbering'] = "Defines the sequence in which entries are numbered.<br><br><b>Attention:</b> This has nothing to do with the sorting of entries. This means just how they are numbered.";
	$lang['edit_expl_spam_protection'] = "e-Posta ikonunu týklayarak Ýletiþim Formuna katýlým aktýv olduðunda açýlýr ve diðer Kullanýcý e-mail gönderebilir. Böylece e-mail adresi direk olarak <b>gösterilmez</b>.";
	$lang['edit_expl_spam_mail'] = "Notification mails about new spam entries or blocked spam entries will be sent to this address. Leave empty to deactivate this function.";
	$lang['edit_expl_ipblocker'] = "Arka arkaya birden fazla giriþi önler.";
	$lang['edit_expl_wordwrap'] = "Kaç Karakter sayýsýndan sonra, uzun bir kelime, ayrýlmalýdýr. <b>0</b> Deaktivasyon.";
	$lang['edit_expl_dateform'] = "Göründüðü gibi Tarihi gösterir. Biçimlendirme php funktionu <a class='admin' href='http://www.php.net/manual/tr/function.date.php' title='date()' target='_blank'>date()</a> mümkündür.";
	$lang['edit_expl_gravatar_show'] = "Gravatars (Global Recognized Avatars) kullanýcý giriþi yanýnda görünen küçük resimlerdir. Onlar, Kullanýcý e-Posta adresinde service <a class='admin' href='http://site.gravatar.com' target='_blank' title='Gravatar Service'>kayýtlý</a> iseler, baðlýdýr.";
	$lang['edit_expl_gravatar_rating'] = "Gravatar larýn hangi sýnýflandýrmaya kadar görüntüleneceðini gösterir.<br><br><b>G</b> = Tüm yaþlar<br><b>PG</b> = hafif Þiddet, kýþkýrtýcý görüntülü Ýnsanlar <br><b>R</b> = Yoðun Þiddet<br><b>X</b> = cinsel resimleri";
	$lang['edit_expl_gravatar_type'] = "Here you can set how gravatars will be displayed if the users email adress is not registered at the service.";
	$lang['edit_expl_gravatar_size'] = "Defines the size of the gravatar in <b>pixels</b>.";
	$lang['edit_expl_gravatar_position'] = "Displays the gravatar on the left or right side of the message.";
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
	$lang['date'] = "Tarih:";
	$lang['time'] = "Zaman:";
	$lang['name'] = "Ýsim:";
	$lang['city'] = "Ýkametgah:";
	$lang['email'] = "e-Posta:";
	$lang['icq'] = "ICQ:";
	$lang['aim'] = "AIM:";
	$lang['msn'] = "MSN:";
	$lang['fb'] = "Facebook:";
	$lang['twitter'] = "Twitter:";
	$lang['hp'] = "Ýnternet Sitesi:";
	$lang['message'] = "Kayýt:";
	$lang['user_notification'] = "Bir yayýn veya yorum Bildirilmesi:";
	$lang['user_show_email'] = "Ziyaretçi Defterindeki e-Posta larý göster:";
	$lang['comment'] = "Yorum:";

	// SMILIES.INC.PHP
	$lang['add_smilies_descr'] = "Here you can edit, add or remove smilies.<br><br>All smilies need to be in the folder <b>'images/smilies/'</b> in the root directory of the guest book. You only need to put the filename into the <b>empty text-field</b> and then press <b>Save</b>.<br><br>You may also add several placeholders. Separate each of them with <b>a comma and a space</b>. To add smileys in ''newentry.php'', the first of the given placeholders will be used.<br><br><span class='same_version'>Right:</span> :smile:, :), :-)<br><span class='old_version'>Wrong:</span> :smile:,:),:-)<br><br><b>Please note: If you change or delete existing smilies or placeholders already used in entries, they won't be displayed correctly anymore! You will have to edit these entries by hand.</b>";
	$lang['smiley_path'] = "Filename";
	$lang['smiley_replacement'] = "Placeholder";
	$lang['add_new_smiley'] = "Add smiley";
	$lang['checked_smilies'] = "Checked smilies ...";
	$lang['delete_checked_smilies'] = "... removed from list, keep unchecked";
	$lang['keep_checked_smilies'] = "... kept, remove unchecked";
	$lang['smiley_width'] = "Width";
	$lang['smiley_height'] = "Height";
	$lang['smilies'] = "Smilies";
	$lang['check_all'] = "Check all";
	$lang['uncheck_all'] = "Uncheck all";
	$lang['invert_all'] = "Invert selection";

	// EDIT_USER.INC.PHP
	$lang['user_is_active'] = "Kullanýcý aktif:";
	$lang['r_user_type'] = "Kullanýcý:";
	$lang['r_settings'] = "Yapýlandýrma deðiþikliði:";
	$lang['r_settings_database'] = "Manage backups:";
	$lang['r_activate'] = "Girdileri onaylayýn:";
	$lang['r_deactivate'] = "Girdileri devredýþý býrakýn:";
	$lang['r_delete'] = "Girdileri Silin:";
	$lang['r_edit'] = "Girdileri düzenleyin:";
	$lang['r_spam'] = "Spam yönetmek:";
	$lang['r_blocklists'] = "Manage banlists:";
	$lang['r_edit_smilies'] = "Edit smilies";
	$lang['old_password'] = "Mevcut Þifre:";
	$lang['new_password_1'] = "Þifre:";
	$lang['new_password_2'] = "Þifre onaylayýnýz:";
	$lang['delete_user'] = "Onaylayýnýz:";
	$lang['edit_user_caption_rights'] = "Sadece yöneticiler için haklar";
	$lang['edit_user_caption_password'] = "Bu kullanýcýnýn Þifresi:";
	$lang['edit_user_caption_delete_user'] = "Bu kullanýcýyý silin";
	$lang['edit_user_caption_old_password'] = " Mevcut Þifreniz:";
	$lang['user_add'] = "Kullanýcý eklemek";
	$lang['user_edit'] = "Kullanýcý düzenleyin";
	$lang['edit_user_caption_send_account_data'] = "Veri gönderme";
	$lang['send_account_data'] = "e-Posta ile gönderme?";

	// VERSION.INC.PHP
	$lang['current_version'] = "Yüklü sürüm:";
	$lang['stable_version'] = "En son kararlý sürüm:";
	$lang['unstable_version'] = "Son kararsýz sürüm:";
	$lang['old_version'] = "Sürümün eski.<br>Bir güncelleþtirme önerilir.<br><br><a href='http://www.m-gb.org/index.php?id=download_gb' class='admin' target='_blank' title='Þimdi güncelleþtir'>En son sürüm için</a>";
	$lang['same_version'] = "En son sürüme sahipsin.<br>Bir güncelleþtirme gerekli deðildir.";
	$lang['newer_version'] = "Mevcut sürüm kararlý sürümden daha yeni.<br>Bir güncelleþtirme gerekli deðildir.";
	$lang['new_version_available'] = "Daha yeni bir sürüm mevcuttur: <a href='http://www.m-gb.org/files/latest/mgb-latest.zip' class='admin' target='_blank' title='Şimdi yenileyiniz'>{LATEST_VERSION}</a>";

	// LOSTPASSWORD.PHP
	$lang['lostpassword_mail'] = "Senin e-Posta adressin:";
	$lang['get_new_pw'] = "Yeni Þifre iste";
	$lang['lostpassword_success'] = "Ýsteðiniz düzenlenmiþtir. Kýsa zamanda bir e-Posta ile <br>onaylink alacaksýnýz. Ona yeni Þifrenizi etkinleþtirmek için týklayýnýz.";
	$lang['lostpassword_no_success'] = "Your demand couldn't be treated successfully. There was an error with the mailserver.";
	$lang['lostpassword_success_created'] = "Senin giriþ bilgilerin<br>sana e-Posta ile gönderilmiþtir.";
	$lang['lostpassword_no_success_created'] = "Your demand couldn't be treated successfully. There was an error with the mailserver.";
?>
