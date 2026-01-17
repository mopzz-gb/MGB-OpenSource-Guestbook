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
	lang_admin.php - English
	========================

	This languagefile was translated by Christian Rech alias HeyJ (mail@heyj.de)
	and edited by Jürgen Schäfer ==> juergen.schaefer(at)minetoshsoft.com
	*/

	// GENERAL
	$lang['no'] = "No";
	$lang['yes'] = "Yes";
	$lang['min'] = "minimum";
	$lang['max'] = "maximum";
	$lang['save'] = "Save";
	$lang['asc'] = "Ascending";
	$lang['desc'] = "Descending";
	$lang['administrator'] = "Administrator";
	$lang['moderator'] = "Moderator";
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
	$lang['title'] = "MGB OpenSource Guestbook - Administration";
	$lang['login_username'] = "Username:";
	$lang['login_password'] = "Password:";
	$lang['login_lostpassword'] = "I forgot my password";
	$lang['login'] = "Login";
	$lang['logout'] = "Logout";
	$lang['login_ok'] = "Welcome <b>{SESSION_USERNAME}</b>.";
	$lang['logged_in'] = "You are logged in as <b>{SESSION_USERNAME}</b>";
	$lang['logged_out'] = "Please provide your username and your password to log in.";
	$lang['please_wait'] = "You logged in successfully.<br>Please wait a moment...";

	// ERRORMESSAGES
	$lang['errormessage'][1] = "Please fill in all fields!";
	$lang['errormessage'][2] = "This username/password combination does not exist.";
	$lang['errormessage'][3] = "Your user account was deactivated by the administrator.";
	$lang['errormessage'][4] = "You do not have access to this site.";
	$lang['errormessage'][5] = "The provided password is wrong.";
	$lang['errormessage'][6] = "The new passwords are not identical.";
	$lang['errormessage'][7] = "The provided eMail address is not valid or the field was empty.";
	$lang['errormessage'][8] = "You cannot remove your own administrator rights, or deactivate or delete your account.";
	$lang['errormessage'][9] = "You have been inactive for too long and thus were deactivated automatically.";
	$lang['errormessage'][10] = "On your last visit you did not log out correctly. The system did it for you.<br><br>Please, for your own security, always use the ''Logout'' button to log out of the system. Thank you.";
	$lang['errormessage'][11] = "This username or this eMail address is already in use.";
	$lang['errormessage'][12] = "This key is invalid or already expired.";
	$lang['errormessage'][13] = "A new password was already requested for this user account.<br>It is not possible to request another password until the new password is activated or expired.";
	$lang['errormessage'][14] = "The email could not be sent. Maybe there's a problem with the mail server.";
	$lang['errormessage'][15] = "The version number could not be retrieved because <a href=\"http://php.net/manual/en/function.fopen.php\">fopen()</a> is deactivated on your server.<br>Please contact your host to solve the problem.<br><br>In the meantime you can check for the latest version on http://www.m-gb.org/.";
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
	$lang['empty_needed_value'][43] = "Missing API-key of www.stopforumspam.com!";
	$lang['empty_needed_value'][44] = "Missing Public or Scoring Key for Ayah (Are you a human?),<br> or the Ayah-Plugin is not installed.";
	$lang['empty_needed_value'][45] = "Invalid value for the number of lines of the captcha.";

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
	$lang['spam_entry_type'][12] = "Wrong HTTP_REFERER";
	$lang['spam_entry_type'][13] = "No HTTP_REFERER, direct call";

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
	$lang['report_spam'] = "Sends the entry to www.stopforumspam.com and thereby helps to limit spam.";
	$lang['report_successfull'] = "Transmission successful!";
	$lang['report_failed'] = "Transmission failed!";
	$lang['sfs_username'] = "Username";
	$lang['sfs_email'] = "E-mail";
	$lang['sfs_ip'] = "IP";

	// GENERAL STRINGS
	$lang['back_to_mainpage'] = "Back to the main page";
	$lang['back'] = "Backwards";
	$lang['go'] = "Go!";
	$lang['entry'] = "Entry";
	$lang['entries'] = "Entries";
	$lang['no_entries'] = "No entries available.";
	$lang['no_deactivated_entries'] = "No deactivated entries available.";
	$lang['no_activated_entries'] = "No activated entries available.";
	$lang['no_spam_entries'] = "No spam entries available.";
	$lang['entries_on_pages'] = "Entries on {PAGES} pages";
	$lang['page_first'] = "First page";
	$lang['page_first_symbol'] = "&laquo;";
	$lang['page_forwards'] = "One page forward";
	$lang['page_forwards_symbol'] = "&rsaquo;";
	$lang['page_last'] = "Last page";
	$lang['page_last_symbol'] = "&raquo;";
	$lang['page_backwards'] = "One page backward";
	$lang['page_backwards_symbol'] = "&lsaquo;";
	$lang['captcha_method_code'] = "Securitycode";
	$lang['captcha_method_math'] = "Mathematical";
	$lang['captcha_method_ayah'] = "Are you a human?";
	$lang['activate_entry'] = "Activate this entry";
	$lang['deactivate_entry'] = "Deactivate this entry";
	$lang['delete_entry'] = "Delete this entry";
	$lang['mark_as_spam'] = "Mark as spam";
	$lang['nospam_entry'] = "Mark entry as 'no spam' and activate it";
	$lang['nospam_deactivate_entry'] = "Mark entry as 'no spam' but let it deactivated";
	$lang['active'] = "This entry is activated in the guestbook";
	$lang['inactive'] = "This entry is not activated in the guestbook";
	$lang['edit_entry'] = "Edit this entry";
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
	$lang['do_nothing'] = "Do nothing ...";
	$lang['delete_whole_spam'] = "Delete all spam entries";
	$lang['mark_all_no_spam_deactivate'] = "- Mark all entries as 'no spam' and activate them";
	$lang['mark_all_no_spam_activate'] = "- Mark all entries as 'no spam' but let them deactivated";
	$lang['mark_all_as_spam'] = "- Mark all entries as spam";
	$lang['activate_all_entries'] = "- Activate all entries";
	$lang['deactivate_all_entries'] = "- Deactivate all entries";
	$lang['delete_all_entries'] = "- Delete all entries";
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
   	$lang['sneak_everything'] = "Sneak all entries!";

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
	$lang['confirm_report_to_stopforumspam'] = "Do you really want to transmit this entry to www.stopforumspam.com?";
	$lang['confirm_report_spam'] = "Sneak it!"; 	// to tell / to snitch

	// MAILS
	$lang['standard_mail'] = "mail()";
	$lang['phpmailer'] = "phpmailer";
	$lang['sendmail_user_notification_title'] = "Your entry at {DOMAIN} has been activated.";
	$lang['sendmail_user_comment_title'] = "Concerning your entry at {DOMAIN} a comment was posted.";
	$lang['sendmail_adduser_title'] = "Your user data at {DOMAIN}";
	$lang['sendmail_adduser_text'] = "You were registered successfully at {DOMAIN} by an administrator. Your user data:<br /><br />Username: {ADDUSER_NAME}<br />Password: {ADDUSER_PASSWORD}<br /><br />You can login here: {ADDUSER_URL}";
	$lang['sendmail_admin_text'] = "{NAME} has posted a new entry in the guestbook.<br /><br />Date: {DATE}<br />Time: {TIME}<br /><br />---<br />{MESSAGE}<br />---<br /><br />{URL_TO_GB}";
	$lang['sendmail_user_text'] = "Hello {NAME},<br /><br />thank you for your entry in my guestbook.";
	$lang['sendmail_user_text_moderated'] = "Hello {NAME},<br /><br />thank you for your entry in my guestbook. After reviewing it, I will activate it as soon as possible.";
	$lang['sendmail_user_notification_text'] = "Hello {NAME},<br /><br />Your entry at {DOMAIN} has just been activated. You can look at it here: {URL_TO_GB}";
	$lang['sendmail_comment_text'] = "Hello {NAME},<br /><br />concerning your entry<br /><br />---<br />{MESSAGE}<br />---<br /><br />a comment has just been posted. You can look at it here: {URL_TO_GB}";
	$lang['sendmail_contactmail_text'] = "You received an email from {NAME} through the guestbook of {DOMAIN}. The message:<br /><br />---<br />{MESSAGE}<br />---<br /><br />Date: {DATE}<br />Time: {TIME}";
	$lang['sendmail_contactmail_text_copy'] = "You sent an email to {NAME} through the guestbook of {DOMAIN}. Here\'s a copy of the message:<br /><br />---<br />{MESSAGE}<br />---<br /><br />Date: {DATE}<br />Time: {TIME}";
	$lang['sendmail_new_password_title'] = "New password: Authentication";
	$lang['sendmail_new_password_text'] = "Hello {NAME},<br /><br /> a new password has been generated for your account. To validate it, please click on the link below within the next 24 hours. Until the activation of the new password, the old one will stay active.<br /><br />If the link is not clicked within the next 24 hours, the new password will expire.<br /><br />{NEW_PASSWORD_LINK}";
	$lang['sendmail_new_password_created_title'] = "The new password is activated";
	$lang['sendmail_new_password_created_text'] = "Hello {NAME},<br /><br />You have validated your new password. Enclosed you will find your new user details.<br /><br />Username: {NAME}<br />Password: {NEW_PASSWORD}";

	// NAVIGATION
	$lang['settings'] = "Settings";
	$lang['settings_general'] = "General";
	$lang['settings_look'] = "Look &amp; feel";
	$lang['settings_fields'] = "Form fields";
	$lang['settings_bbcodes'] = "BBCodes";
	$lang['settings_emoticons'] = "Emoticons";
	$lang['settings_gravatar'] = "Gravatar";
	$lang['settings_security'] = "Security &amp; Anti-Spam";
	$lang['settings_mails'] = "E-Mails";
	$lang['settings_database'] = "Database";
	$lang['activate'] = "Activate entry";
	$lang['deactivate'] = "Deactivate entry";
	$lang['delete'] = "Delete entry";
	$lang['edit'] = "Edit entry";
	$lang['spam'] = "Spam entries";
	$lang['edit_smilies'] = "Edit emoticons";
	$lang['edit_users'] = "User administration";
	$lang['banlists'] = "Manage banlists";
	$lang['banlist_ips'] = "IP banlist";
	$lang['banlist_emails'] = "E-Mail banlist";
	$lang['banlist_domains'] = "Domain banlist";
	$lang['spam_log'] = "Spam log";
	$lang['stats'] = "Statistics";
	$lang['license'] = "License";
	$lang['forum'] = "Forum";
	$lang['bugreport'] = "Report bug";
	$lang['version'] = "Version";
	$lang['manual'] = "Documentation";
	$lang['fb_nav'] = "MGB on Facebook";
	$lang['to_guestbook'] = "To the guestbook";
	$lang['paypal'] = "If you like MGB and think it is useful, you may donate to the project to support its future development.";

	// SETTINGS.INC.PHP
	$lang['edit_caption_general'] = "General settings";
	$lang['edit_caption_look'] = "Look &amp; feel";
	$lang['edit_caption_bbcodes'] = "BBCodes";
	$lang['edit_caption_smilies'] = "Emoticons";
	$lang['edit_caption_gravatars'] = "Gravatar-support";
	$lang['edit_caption_security'] = "Security";
	$lang['edit_caption_antispam'] = "Anti-Spam";
	$lang['edit_caption_captcha'] = "Captcha";
	$lang['edit_caption_recaptcha'] = "reCaptcha";
	$lang['edit_caption_dynamic_fieldnames'] = "Dynamic Fieldvariables";
	$lang['edit_caption_akismet'] = "Akismet-Plugin";
	$lang['edit_caption_time_lock'] = "Sign lock";
	$lang['edit_caption_mail_settings'] = "eMail settings";
	$lang['edit_caption_smtp_settings'] = "The following data is only needed if you want to send mails by phpmailer (smtp) and if your server needs authentication.";
	$lang['edit_caption_email'] = "E-Mail";
	$lang['edit_caption_database'] = "Database information";
	$lang['edit_caption_database_backups'] = "Database Backups";
	$lang['edit_caption_keystroke'] = "Keystroke";
	$lang['edit_caption_fields'] = "Activate / deactivate form fields";
	$lang['edit_caption_check_against_anti_spam_sites'] = "Check back visitors in anti-spam-pages";
	$lang['edit_caption_captcha_settings'] = "General Captcha settings";
	$lang['edit_caption_mgb_captcha'] = "MGB's own captcha";
	$lang['edit_caption_ayah'] = "Ayah (Are you a human?)";
	$lang['edit_caption_http_referer'] = "HTTP Referer validation";
	$lang['edit_save_message'] = "Saved settings successfully.";
	$lang['edit_title'] = "Title:";
	$lang['edit_h_author'] = "Author:";
	$lang['edit_h_domain'] = "Domain:";
	$lang['edit_gb_path'] = "Path to the guestbook:";
	$lang['edit_h_keywords'] = "Keywords:";
	$lang['edit_h_description'] = "Description:";
	$lang['edit_timezone'] = "Timezone:";
	$lang['edit_announcement_message'] = "Announcement message:";
	$lang['edit_admin_name'] = "Admin Name:";
	$lang['edit_admin_email'] = "Admin email:";
	$lang['edit_admin_gbemail'] = "Guestbook email:";
	$lang['edit_caching'] = "Caching:";
	$lang['edit_sendmail_admin'] = "Notification email:";
	$lang['edit_sendmail_admin_text'] = "Text for notification email:";
	$lang['edit_sendmail_user'] = "Thank-You mail to the user:";
	$lang['edit_sendmail_user_text'] = "Text for Thank-You mail (not moderated):";
	$lang['edit_sendmail_user_text_moderated'] = "Text for Thank-You mail (moderated):";
	$lang['edit_sendmail_user_notification_text'] = "Text for activation-mail:";
	$lang['edit_sendmail_comment_text'] = "Text for comment-notification:";
	$lang['edit_sendmail_contactmail_text'] = "Text for eMail through the guestbook:";
	$lang['edit_sendmail_contactmail_text_copy'] = "Text for a copy of an eMail through the guestbook:";
	$lang['edit_template_path'] = "Template:";
	$lang['edit_template_style_path'] = "Template-Style:";
	$lang['edit_iconset_path'] = "Icon set:";
	$lang['edit_language_path'] = "Language file:";
	$lang['edit_badwords'] = "Bad words:";
	$lang['edit_bbcode'] = "BBcodes:";
	$lang['edit_allow_img_tag'] = "IMG-Tag:";
	$lang['edit_max_img_width'] = "Maximum width of image:";
	$lang['edit_max_img_height'] = "Maximum height of image:";
	$lang['edit_center_img'] = "Display images centered:";
	$lang['edit_allow_flash_tag'] = "FLASH-Tag:";
	$lang['edit_max_flash_width'] = "Maximum width of flash:";
	$lang['edit_max_flash_height'] = "Maximum height of flash:";
	$lang['edit_center_flash'] = "Display flash centered:";
	$lang['edit_smileys'] = "Emoticons:";
	$lang['edit_smileys_break'] = "Emoticons line break:";
	$lang['edit_smileys_order'] = "Sorting of emoticons:";
	$lang['edit_blocktime'] = "Blocktime:";
	$lang['edit_captcha'] = "Captcha:";
	$lang['edit_captcha_method'] = "Sort of captcha:";
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
	$lang['edit_akismet_plugin'] = "Akismet-Plugin:";
	$lang['edit_akismet_api'] = "Akismet API Key:";
	$lang['edit_akismet_mark_as_spam'] = "Spam marking:";
	$lang['edit_time_lock'] = "Sign lock:";
	$lang['edit_time_lock_value'] = "Minimum time for sign lock:";
	$lang['edit_time_lock_maxtime'] = "Maximum time for sign lock:";
	$lang['edit_time_lock_spam_count'] = "Maximum allowed number for sending the form too early:";
	$lang['edit_user_notification'] = "User notification:";
	$lang['edit_user_show_email'] = "User mail in the guestbook:";
	$lang['edit_session_timeout'] = "Session timeout:";
	$lang['edit_password_min_length'] = "Minimum length of passwords:";
	$lang['edit_moderated'] = "Moderated guestbook:";
	$lang['edit_require_email'] = "eMail required:";
	$lang['edit_entries_per_page'] = "Entries per page:";
	$lang['edit_entries_order'] = "Sorting of entries:";
	$lang['edit_entries_order_asc_desc'] = "Sequence of sorting:";
	$lang['edit_entries_numbering'] = "Sequence of numbering:";
	$lang['edit_spam_protection'] = "Email spam protection:";
	$lang['edit_spam_mail'] = "E-Mail address for spam notification:";
	$lang['edit_ipblocker'] = "IP-Blocker:";
	$lang['edit_wordwrap'] = "Word wrap:";
	$lang['edit_dateform'] = "Date format:";
	$lang['edit_gravatar_show'] = "Show gravatars:";
	$lang['edit_gravatar_rating'] = "Gravatar rating:";
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
	$lang['edit_direct_access'] = "Prohibit direct access to forms:";
	$lang['edit_direct_access_text'] = "URL of Referer:";
	$lang['edit_search_engines_excluded'] = "Exclude search engines:";
	$lang['edit_search_engines'] = "Identifier of search engines:";
	$lang['edit_check_against_anti_spam_sites'] = "Check back in anti-spam-pages:";
	$lang['edit_username_frequency'] = "Frequency of usernames:";
	$lang['edit_email_frequency'] = "Frequency of e-mail addresses:";
	$lang['edit_ip_frequency'] = "Frequency of IPs:";
	$lang['edit_for_ban_required'] = "Required for refusal:";
	$lang['edit_sfs_mark_as_spam'] = "Mark as spam:";
	$lang['edit_stopforumspam_api_key'] = "API-key of www.stopforumspam.com";
	$lang['edit_ayah_pub_key'] = "Ayah Public Key:";
	$lang['edit_ayah_score_key'] = "Ayah Scoring Key:";
	$lang['edit_captcha_add_noise'] = "Perturbations ('Noise'):";
	$lang['edit_captcha_noise_color'] = "Colour of perturbations:";
	$lang['edit_captcha_noise_count'] = "Number:";

	$lang['edit_expl_title'] = "The title of the guestbook.";
	$lang['edit_expl_h_author'] = "The name of the author of the internet page.";	// The authors name of the internet page
	$lang['edit_expl_h_domain'] = "Top Level Domain (TLD) where the guestbook is located <b>without http://</b> on the beginning and <b>/</b> at the end. (www.example.net)";
	$lang['edit_expl_gb_path'] = "The path relative to the TLD where the guestbook is located.";
	$lang['edit_expl_h_keywords'] = "Keywords separated by commas.";
	$lang['edit_expl_h_description'] = "A short description of the page.";
	$lang['edit_expl_timezone'] = "From PHP5 onwards you must set a timezone. <a href='http://www.php.net/manual/en/timezones.php' target='_blank'>List of all available timezones</a>.";
	$lang['edit_expl_announcement_message'] = "This text will be shown above guestbook entries in index.php. It will stay there until you delete it. Formatting the text with BBCodes and smileys is also possible.";
	$lang['edit_expl_admin_name'] = "The administrators name or simply ''admin''.";
	$lang['edit_expl_admin_email'] = "Email address to which notifications about new entries will be sent.";
	$lang['edit_expl_admin_gbemail'] = "Will be used as email sender address.";
	$lang['edit_expl_caching'] = "If caching is active, the guestbook entries will be loaded from the cache rather than from the database. This can decrease server load on pages with many visits.<br><br><b>ATTENTION: This feature has to be regarded as experimental. If you discover problems with the display of new entries or something similar, I recommend to deactivate this option.</b>";
	$lang['edit_expl_sendmail_admin'] = "If this option is active, the administrator receives an eMail when new entries are posted.";
	$lang['edit_expl_sendmail_admin_text'] = "This text will be send to the administrator if notification by email is active.<br><br>Available placeholders: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_user'] = "If this option is active, the user will receive a Thank-You mail.";
	$lang['edit_expl_sendmail_user_text'] = "This text will be send to the user, if <b>entry activation is inactive</b> and if the Thank-You mail option is activated.<br><br>Available placeholders: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_user_text_moderated'] = "This text will be send to the user, if <b>entry activation is active</b> and if the Thank-You mail option is activated.<br><br>Available placeholders: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_user_notification_text'] = "This text will be send to the user as soon as his contribution becomes activated. This requires that the user agreed to this at his entry.<br><br>Available placeholders: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_comment_text'] = "This text will be send to the user, if an administrator or moderator posted a comment to his entry. This requires that the user agreed to this at his entry.<br><br>Available placeholders: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_contactmail_text'] = "This text will be send to users, when they receive an email through the guestbook while spam-protection is activated.<br><br>Available placeholders: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_contactmail_text_copy'] = "This text will be delivered to sender with a copy of his message sent through the guestbook while spam-protection is activated.<br><br>Available placeholders: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_template_path'] = "The template to be used.";
	$lang['edit_expl_template_style_path'] = "The style of the template. You cannot select it until the desired template was loaded.";
	$lang['edit_expl_iconset_path'] = "The desired graphic-set which provides icons, Emoticons and captcha-backgrounds independent from the template.";
	$lang['edit_expl_language_path'] = "The language which will be used.<br><br><b>ATTENTION:</b> Since version <b>0.6.5</b> languages that use the character-set latin9 (iso-8859-15) are <b>NO LONGER</b> supported. If you discover problems with missing variables, empty text fields and so on, try to switch to an utf-8-based language and delete all 'latin9'-languages in the folder 'language'.<br><br>Should you then discover problems with umlauts or special chars, please execute 'convert_ansi.php' in the folder 'install'.";
	$lang['edit_expl_language_author'] = "Author:";
	$lang['edit_expl_language_charset'] = "Charset:";
	$lang['edit_expl_badwords'] = "Enter unwanted bad words, separated by comma, which will be replaced by asterisks (*) in the guest book. Leave empty to deactivate.";
	$lang['edit_expl_bbcode'] = "Let's the user format the text.";
	$lang['edit_expl_allow_img_tag'] = "The implementation of images in a guest-book entry contains some security risks. Images could include malware, or a user could provide an image that is juristic ominous. Many and large pictures also reduce the loading speed of the guest-book.<br><br><b>The IMG-Tag should only be activated if the guest-book is moderated.</b>";
	$lang['edit_expl_max_img_width'] = "Defines the maximum width of an image.<br><br><b>ATTENTION: This only works if <a href='http://de2.php.net/manual/en/function.getimagesize.php' target='_blank' title='php.net'>getimagesize();</a> is working, or if width and height are provided with the [img]-Tag like here -> [img=width,height]address of image[/img]).</b>";
	$lang['edit_expl_max_img_height'] = "Defines the maximum height of an image.<br><br><b>ATTENTION: This only works if <a href='http://de2.php.net/manual/en/function.getimagesize.php' target='_blank' title='php.net'>getimagesize();</a> is working, or if width and height are provided with the [img]-Tag like here -> [img=width,height]address of image[/img]).</b>";
	$lang['edit_expl_center_img'] = "Defines if [img]-Tag images are displayed centered.";
	$lang['edit_expl_allow_flash_tag'] = "Allows the user to insert flash videos, like they come from youtube.<br><br><b>For security reasons the BBCode for flash videos should only be activated if the guestbook is moderated.</b>";
	$lang['edit_expl_max_flash_width'] = "Defines the maximum widht of a flash video.";
	$lang['edit_expl_max_flash_height'] = "Defines the maximum height of a flash video.";
	$lang['edit_expl_center_flash'] = "Defines if [flash]-Tag videos are displayed centered.";
	$lang['edit_expl_smileys'] = "Enables the user to add emoticons.";
	$lang['edit_expl_smileys_break'] = "Defines the number of emoticons before a line break will be inserted into the list of them in <i>newentry.php</i>. Can be very helpful if many emoticons are used.";
	$lang['edit_expl_smileys_order'] = "Indicates how emoticons are sorted. Ascending or descending.";
	$lang['edit_expl_blocktime'] = "Defines the period of time a user is banned after he was added to one of the banlists.";
	$lang['edit_expl_captcha'] = "If activated, a security code has to be entered to post a new entry or to send an e-mail.";
	$lang['edit_expl_captcha_method'] = "You can choose between a security code, or a mathematical formula the user has to solve.";
	$lang['edit_expl_recaptcha_pub_key'] = "This key is needed by reCaptcha. You can get it <a href=\"https://www.google.com/recaptcha/admin/create\">here</a>.";
	$lang['edit_expl_recaptcha_private_key'] = "This key is also needed by reCaptcha. You will get it with your public key.";
	$lang['edit_expl_recaptcha_style'] = "Defines the look of reCaptcha.";
	$lang['edit_expl_captcha_length'] = "For security code only. <b>Not for mathematical captcha or reCaptcha!</b><br><br>Minimum: <b>3</b><br>Maximum: <b>9</b>";
	$lang['edit_expl_captcha_salt'] = "A ''Salt'' is a randomly chosen word or a combination out of characters and numbers that is mixed into the hash that generates the captcha. Thus it is possible to give a ''personal touch'' to the hash that is known by nobody except you. Makes the captcha more safer.<br><br>You should change it after installation, but this is not required. The value you see here was chosen randomly during installation. It should be okay. If you don't want to use a ''Salt'' you can leave it blank.";
	$lang['edit_expl_captcha_hash_method'] = "Sets the Hash method that is used to generate the captcha.";
	$lang['edit_expl_captcha_double_hash'] = "If this option is activated the randomly generated numbers and letters will be ''more'' random.";
	$lang['edit_expl_captcha_coords'] = "Sets the coordinates where the text starts to be drawn into the background picture. Origin is the <b>lower left edge of the first character</b>.";
	$lang['edit_expl_captcha_color'] = "Sets the text color of the captcha. The value has to be in the HTML-Format and without the number sign '#'.<br><br><b>Right: <span class='newer_version'>505050</span><br>Wrong: <span class='old_version'>#505050</span></b>";
	$lang['edit_expl_captcha_angle'] = "These values both define the array of degrees the captcha text is randomly designed with. The left value has to be <b>lower</b> than the right value.";
	$lang['edit_expl_wrong_captcha_count'] = "This value defines how often the user is allowed to wrongly type a given captcha. If he reaches this limit, he will be put on the <b>spam list</b>.";
	$lang['edit_expl_akismet_plugin'] = "Akismet is an external anti-spam-service, that checks new entries on spam. The akismet-plugin can be downloaded at <a href='http://www.m-gb.org/index.php?id=download_gb' title='Download Akismet Plugin'>http://www.m-gb.org/</a>.<br><br><b>ATTENTION: When using the 'Akismet' plugin, you accept the transmission of data to a server in the United States of America. If you don't comply with that precondition you MUST NOT USE 'Akismet'. Your users also need to agree to that condition if you activate the 'Akismet' plugin.</b>";
	$lang['edit_expl_akismet_api'] = "In order to use Akismet you need an <a href='http://akismet.com/signup/#free' title='Akismet API Key'>API Key</a>. Sign in for free and enter it here after registration.";
	$lang['edit_expl_akismet_check_ok'] = "<span class='same_version' style='font-size: 14px;'>Akismet is installed!</span>";
	$lang['edit_expl_akismet_check_fail'] = "<span class='old_version' style='font-size: 14px;'>Akismet is NOT installed!</span>";
	$lang['edit_expl_akismet_mark_as_spam'] = "If this option is enabled, positive Akismet entries are marked as spam and appear in the administration panel so you can check them for yourself and decide what to do with them.";
	$lang['edit_expl_time_lock'] = "If this option is enabled, a counter will run in the background during the editing of a new entry, preventing that the entry form will be sent too soon. If the user is editing his entry too quickly, a message will appear telling him how many seconds he'll have to wait until he can sign the guest book.";
	$lang['edit_expl_time_lock_value'] = "Minimum time a user has to wait to send the entry form.";
	$lang['edit_expl_time_lock_maxtime'] = "Maximum value for time period, within which the user can sign the guest book. If the user takes too long editing his entry, the counter restarts.";
	$lang['edit_expl_time_lock_spam_count'] = "Maximum number of attempts a user is allowed to send the form during the time that is defined for ''time lock''. If he reaches this limit he will be added to the <b>spam list</b>.<br><br>Minimum: <b>5</b><br>Maximum: <b>99</b>";
	$lang['edit_expl_user_notification'] = "Enables the user to decide whether he wants to be notified by e-mail or not, when his contribution becomes activated.";
	$lang['edit_expl_user_show_email'] = "Enables the user to decide whether his e-mail address will be shown in the guestbook or not. If he disables the checkbox, only the administrator will be able to send him e-mails.";
	$lang['edit_expl_session_timeout'] = "Indicates the period of time after which an inactive user will be logged out automatically. Expressed in <b>seconds</b>. Value must be >= <b>60</b>.";
	$lang['edit_expl_password_min_length'] = "Defines the minimum length of passwords for Administrators / Moderators.";
	$lang['edit_expl_moderated'] = "If this option is enabled, contributions need to be activated before they show up in the guestbook.";
	$lang['edit_expl_require_email'] = "If activated, an email address must be provided by the user to post a new entry.<br><br><b>ATTENTION: The use of Akismet overrides this setting.</b>";
	$lang['edit_expl_entries_per_page'] = "Indicates the number of entries per page. The value <b>must not be 0</b>.";
	$lang['edit_expl_entries_order'] = "Defines the order in which entries are numbered";
	$lang['edit_expl_entries_order_asc_desc'] = "Defines the sequence in which entries are sorted.";
	$lang['edit_expl_entries_numbering'] = "Defines the sequence in which entries are numbered.<br><br><b>Attention:</b> This has nothing to do with the sorting of entries. It applies solely to the way entries are numbered.";
	$lang['edit_expl_spam_protection'] = "If this option is active, one may open a contact form window by clicking on the e-mail icon beneath a guest book entry. This contact form allows sending email to the corresponding guest book user. The user's email address will <b>not</b> be revealed.";
	$lang['edit_expl_spam_mail'] = "Notification mails about new spam entries or blocked spam entries will be sent to this address. Leave empty to deactivate this function.";
	$lang['edit_expl_ipblocker'] = "Avoids serial entries by a single user.";
	$lang['edit_expl_wordwrap'] = "Indicates the number of characters after which a very long word will be moved automatically to the beginning of the next line. <b>0</b> to deactivate.";
	$lang['edit_expl_dateform'] = "The format in which the date will be displayed. To set up the date format you may use the php function <a class='admin' href='http://www.php.net/manual/en/function.date.php' title='date()' target='_blank'>date()</a>.";
	$lang['edit_expl_gravatar_show'] = "Gravatars (Global Recognized Avatars) are small icons showing up adjacent to a user's guest book entry. To activate them, the user has to <a class=\"admin\" href=\"http://site.gravatar.com/\" target=\"_blank\" title=\"Gravatar Service\">register</a> himself with his email address at the gravatar service.";
	$lang['edit_expl_gravatar_rating'] = "Defines up to which rating gavatars will be shown.<br><br><b>G</b> = for all ages<br><b>PG</b> = illustration of soft violence, persons dressed in stimulating manners and provoking gestures<br><b>R</b> = illustration of severe violence, obscenities<br><b>X</b> = explicit sexual pictures";
	$lang['edit_expl_gravatar_type'] = "Here you can set how gravatars will be displayed if the user's email address is not registered at the service.";
	$lang['edit_expl_gravatar_size'] = "Sets the size of the gravatar in <b>pixels</b>.";
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
	$lang['edit_expl_direct_access'] = "If this option is active, direct access to <i>newentry.php</i> and <i>email.php</i> will be refused. Spam-bots often call the forms directly to save time when making an entry. An entry will only be allowed if the variable <i>&#36;_SERVER['HTTP_REFERER']</i> is <b>not empty</b> or if it contains a specifically defined URL (or a part of it).<br><br><b>INFO: The referer is transmitted automatically by the browser while loading a new page. Generally, it contains the URL of the Internet-page, which directs to the new page (e.g. through a hyperlink).</b>";
	$lang['edit_expl_direct_access_text'] = "Here you may enter one or several specific URL's (separated by commas), which must be contained in the referer to an entry form to allow access. It is recommended to indicate the main domain of the internet-site from which guests will get to the guest-book.<br><br><b>- Leave empty to deny access only in the case of an empty referer. This means in the case of a direct call.<br>- Please separate individual domains with commas.</b>";
	$lang['edit_expl_search_engines_excluded'] = "Specifies whether search engines are excluded from this rule or not.";
	$lang['edit_expl_search_engines'] = "Please enter the search engine identifiers, which are sent in the HTTP_REFERER (separated by commas). The individual referers will then be checked for these identifiers<br><br><b>Default settings after installation: Googlebot/, Baiduspider, bingbot/, MJ12bot/, Exabot, ia_archiver, msnbot/, Yahoo! Slurp, SEO search Crawler/, crawleradmin.t-info@telekom.de</b>";
	$lang['edit_expl_check_against_anti_spam_sites'] = "If this option is active each visitor to <i>newentry.php</i> and <i>email.php</i> will be verified using the anti-spam lists of <a href='http://www.stopforumspam.com' target='_blank'>stopforumspam.com</a>. If this returns a positive result, the user will be blocked immediately before he can leave an entry.<br><br><b>This option should be used as a first anti-spam filter.</b>";
	$lang['edit_expl_username_frequency'] = "How often must the user-name be listed as spam at www.stopforumspam.com until he gets blocked?";
	$lang['edit_expl_email_frequency'] = "How often must the e-mail address be listed as spam at www.stopforumspam.com until it gets blocked?";
	$lang['edit_expl_ip_frequency'] = "How often must the IP be listed as spam at www.stopforumspam.com until it gets blocked?";
	$lang['edit_expl_for_ban_required'] = "Choose the options necessary for a denial of an entry.";
	$lang['edit_expl_sfs_mark_as_spam'] = "If this option is set to <b>Yes</b>, denied entries will be accepted, but marked as spam. They will appear under <i>Spam-Entries</i> in the administration. Otherwise, the user will see an error message and the entry will not be accepted.";
	$lang['edit_expl_stopforumspam_api_key'] = "If you want to report spam-entries by yourself, you have to enter an API-key here. To get an API-key you have to register at the <a href='http://www.stopforumspam.com/forum/' target='_blank'>forum</a> of the site. Afterwards you have to register a <a href='http://www.stopforumspam.com/signup' target='_blank'>API-Key</a>.<br><br><b>ATTENTION: The API-key is not necessary to check users using the anti-spam list. It is only needed if you want to report spam by yourself.</b>";
	$lang['edit_expl_ayah_pub_key'] = "To be able to use 'Are you a human?', you must enter the public key. You may ask for one together with the 'Scoring Key' at <a href='http://www.areyouahuman.com/' target='_blank'>areyouahuman.com</a>.";
	$lang['edit_expl_ayah_score_key'] = "Enter the 'Scoring Key' of 'Are you a human?' here.";
	$lang['edit_expl_captcha_add_noise'] = "Adds random lines of variable length, colour and direction to the captcha.";
	$lang['edit_expl_captcha_noise_color'] = "Determines the colour of the lines. If no colour is selected, a random colour will be chosen for each line, creating 'multi-coloured' lines. The entries must be in hexadecimal notation without the '#'.<br><br><b>Right: <span class='newer_version'>505050</span><br>Wrong: <span class='old_version'>#505050</span></b>";
	$lang['edit_expl_captcha_noise_count'] = "Determines the number of the lines.";

	// EDIT.INC.PHP
	$lang['id'] = "ID:";
	$lang['ip'] = "IP:";
	$lang['date'] = "Date:";
	$lang['timestamp'] = "Time:";
	$lang['name'] = "Name:";
	$lang['city'] = "City:";
	$lang['email'] = "eMail:";
	$lang['icq'] = "ICQ:";
	$lang['aim'] = "AIM:";
	$lang['msn'] = "MSN:";
	$lang['fb'] = "Facebook:";
	$lang['twitter'] = "Twitter:";
	$lang['hp'] = "Homepage:";
	$lang['message'] = "Message:";
	$lang['user_notification'] = "Notification of activation or comment:";
	$lang['user_show_email'] = "Show email address in the guestbook:";
	$lang['comment'] = "Comment:";

	// SMILIES.INC.PHP
	$lang['add_smilies_descr'] = "Here you can edit, add or remove emoticons.<br><br>All smilies need to be in the folder <b>'images/smilies/'</b> in the root directory of the guest book. You only need to put the filename into the <b>empty text-field</b> and then press <b>Save</b>.<br><br>You may also add several placeholders. Separate each of them with <b>a comma and a space</b>. To add emoticons in <i>newentry.php</i>, the first of the given placeholders will be used.<br><br><span class='same_version'>Right:</span> :smile:, :), :-)<br><span class='old_version'>Wrong:</span> :smile:,:),:-)<br><br><b>Please note: If you change or delete existing emoticons or placeholders already used in entries, they won't be displayed correctly anymore! You will have to edit these entries by hand.</b>";
	$lang['smiley_path'] = "Filename";
	$lang['smiley_replacement'] = "Placeholder";
	$lang['add_new_smiley'] = "Add emoticon";
	$lang['checked_smilies'] = "Checked emoticons will be ...";
	$lang['delete_checked_smilies'] = "... removed from list, keep unchecked";
	$lang['keep_checked_smilies'] = "... kept, remove unchecked";
	$lang['smiley_width'] = "Width";
	$lang['smiley_height'] = "Height";
	$lang['smilies'] = "Emoticons";
	$lang['check_all'] = "Check all";
	$lang['uncheck_all'] = "Uncheck all";
	$lang['invert_all'] = "Invert selection";

	// EDIT_USER.INC.PHP
	$lang['user_is_active'] = "User is active:";
	$lang['r_user_type'] = "User is:";
	$lang['r_settings'] = "Change settings:";
	$lang['r_settings_database'] = "Manage backups:";
	$lang['r_activate'] = "Activate post:";
	$lang['r_deactivate'] = "Deactivate post:";
	$lang['r_delete'] = "Delete post:";
	$lang['r_edit'] = "Edit post:";
	$lang['r_spam'] = "Manage spam list:";
	$lang['r_blocklists'] = "Manage banlists:";
	$lang['r_edit_smilies'] = "Edit emoticons";
	$lang['old_password'] = "Your current password:";
	$lang['new_password_1'] = "New password:";
	$lang['new_password_2'] = "Retype new password:";
	$lang['delete_user'] = "Confirm:";
	$lang['edit_user_caption_rights'] = "Permissions (moderators only)";
	$lang['edit_user_caption_password'] = "Password of this user:";
	$lang['edit_user_caption_delete_user'] = "Delete this user:";
	$lang['edit_user_caption_old_password'] = "Your current password:";
	$lang['user_add'] = "Add user";
	$lang['user_edit'] = "Edit user";
	$lang['edit_user_caption_send_account_data'] = "Send account data";
	$lang['send_account_data'] = "Send per email?";

	// VERSION.INC.PHP
	$lang['current_version'] = "Installed version:";
	$lang['stable_version'] = "Newest stable version:";
	$lang['unstable_version'] = "Newest instable version:";
	$lang['old_version'] = "Your version is outdated.<br>An update is recommended.<br><br><a href='http://www.m-gb.org/index.php?id=download_gb' class='admin' target='_blank' title='Update now'>Show the latest version</a>";
	$lang['same_version'] = "You are using the latest version.<br>An update is not necessary.";
	$lang['newer_version'] = "Your version is newer than the latest stable version.<br>An update is not necessary.";
	$lang['new_version_available'] = "A new version is available: <a href='http://www.m-gb.org/files/latest/mgb-latest.zip' class='admin' target='_blank' title='Upgrade now!'>{LATEST_VERSION}</a>";

	// LOSTPASSWORD.PHP
	$lang['lostpassword_mail'] = "Your eMail address:";
	$lang['get_new_pw'] = "Request a new password";
	$lang['lostpassword_success'] = "Your demand was treated successfully. You will soon receive an email<br>with a confirmation-link. Click this link to activate your new password.";
	$lang['lostpassword_no_success'] = "Your demand couldn't be treated successfully. There was an error with the mailserver.";
	$lang['lostpassword_success_created'] = "Your new login data were<br>sent to you by email.";
	$lang['lostpassword_no_success_created'] = "Your demand couldn't be treated successfully. There was an error with the mailserver.";
?>
