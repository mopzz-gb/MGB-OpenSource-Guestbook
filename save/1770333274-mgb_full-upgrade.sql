-- MGB OpenSource Guestbook SQL Dump
-- Version: 0.6.9.3
-- https://www.m-gb.org/
--
-- Host: 10.35.232.188
-- Database: k41057_mgb_dev
-- Tables: banlist_domains, banlist_emails, banlist_ips, entries, settings, smilies, spam, spam_log, user
-- --------------------------------------------------------;

-- Reason for backup: Upgrading database to a newer version;

-- --------------------------------------------------------;

CREATE TABLE IF NOT EXISTS `mgb_captcha` (
`code` varchar(11) NOT NULL PRIMARY KEY
) DEFAULT CHARSET=utf8mb4 ;

INSERT INTO `mgb_captcha` (`code`) VALUES
(ABCDEF);

CREATE TABLE IF NOT EXISTS `mgb_captcha_math` (
`math` varchar(20) NOT NULL PRIMARY KEY ,
`sum` int NOT NULL
) DEFAULT CHARSET=utf8mb4 ;

INSERT INTO `mgb_captcha_math` (`math`, `sum`) VALUES
(1+2+3, 6);

CREATE TABLE IF NOT EXISTS `mgb_entries` (
`ID` int NOT NULL auto_increment PRIMARY KEY ,
`name` varchar(255) NOT NULL ,
`city` varchar(255) NOT NULL ,
`email` varchar(255) NOT NULL ,
`icq` varchar(255) NOT NULL ,
`aim` varchar(255) NOT NULL ,
`msn` varchar(255) NOT NULL ,
`hp` varchar(255) NOT NULL ,
`message` mediumtext NOT NULL ,
`comment` mediumtext NOT NULL ,
`ip` varchar(15) NOT NULL ,
`timestamp` varchar(255) NOT NULL ,
`user_notification` tinyint(1) NOT NULL ,
`user_show_email` tinyint(1) NOT NULL ,
`checked` tinyint(1) NOT NULL ,
`isspam` tinyint(1) NOT NULL
) DEFAULT CHARSET=utf8mb4 ;

CREATE TABLE IF NOT EXISTS `mgb_lastip` (
`lastIP` varchar(15) NOT NULL PRIMARY KEY
) DEFAULT CHARSET=utf8mb4 ;

CREATE TABLE IF NOT EXISTS `mgb_settings` (
`title` varchar(255) NOT NULL DEFAULT MGB 0.6.x OpenSource Guestbook PRIMARY KEY ,
`h_author` varchar(255) NOT NULL DEFAULT Jürgen ,
`h_domain` varchar(255) NOT NULL DEFAULT dev.m-gb.org ,
`gb_path` varchar(255) NOT NULL DEFAULT /dev/ ,
`h_keywords` varchar(255) NOT NULL ,
`h_description` varchar(255) NOT NULL ,
`admin_name` varchar(255) NOT NULL DEFAULT Jürgen ,
`admin_email` varchar(255) NOT NULL DEFAULT mopzz@m-gb.org ,
`admin_gbemail` varchar(255) NOT NULL DEFAULT noreply@m-gb.org ,
`sendmail_admin` tinyint(1) NOT NULL ,
`sendmail_admin_text` mediumtext NOT NULL ,
`sendmail_user` tinyint(1) NOT NULL ,
`sendmail_user_text` mediumtext NOT NULL ,
`sendmail_user_notification_text` mediumtext NOT NULL ,
`sendmail_comment_text` mediumtext NOT NULL ,
`sendmail_contactmail_text` mediumtext NOT NULL ,
`template_path` varchar(255) NOT NULL DEFAULT mgbModern ,
`template_style_path` varchar(255) NOT NULL DEFAULT blue ,
`iconset_path` varchar(255) NOT NULL DEFAULT default ,
`language_path` varchar(255) NOT NULL DEFAULT lang_english_utf8 ,
`badwords` mediumtext NOT NULL ,
`bbcode` tinyint(1) NOT NULL DEFAULT 1 ,
`allow_img_tag` tinyint(1) NOT NULL ,
`max_img_width` int NOT NULL DEFAULT 400 ,
`max_img_height` int NOT NULL DEFAULT 400 ,
`center_img` tinyint(1) NOT NULL DEFAULT 1 ,
`allow_flash_tag` tinyint(1) NOT NULL ,
`max_flash_width` int NOT NULL DEFAULT 400 ,
`max_flash_height` int NOT NULL DEFAULT 400 ,
`center_flash` tinyint(1) NOT NULL DEFAULT 1 ,
`smileys` tinyint(1) NOT NULL DEFAULT 1 ,
`smileys_break` tinyint NOT NULL DEFAULT 11 ,
`smileys_order` varchar(4) NOT NULL DEFAULT ASC ,
`captcha` tinyint(1) NOT NULL DEFAULT 1 ,
`captcha_method` tinyint(1) NOT NULL ,
`captcha_coords_x` int NOT NULL DEFAULT 20 ,
`captcha_coords_y` int NOT NULL DEFAULT 25 ,
`captcha_color` varchar(6) NOT NULL DEFAULT 505050 ,
`captcha_angle_1` int NOT NULL DEFAULT -10 ,
`captcha_angle_2` int NOT NULL DEFAULT 5 ,
`akismet_plugin` tinyint(1) NOT NULL DEFAULT 1 ,
`akismet_api` varchar(50) NOT NULL ,
`akismet_mark_as_spam` tinyint(1) NOT NULL ,
`time_lock` tinyint(1) NOT NULL DEFAULT 1 ,
`time_lock_value` int NOT NULL DEFAULT 30 ,
`time_lock_maxtime` int NOT NULL DEFAULT 180 ,
`user_notification` tinyint(1) NOT NULL DEFAULT 1 ,
`user_show_email` tinyint(1) NOT NULL DEFAULT 1 ,
`session_timeout` int NOT NULL DEFAULT 900 ,
`password_min_length` tinyint NOT NULL DEFAULT 8 ,
`moderated` tinyint(1) NOT NULL DEFAULT 1 ,
`entries_per_page` tinyint NOT NULL DEFAULT 10 ,
`entries_order` varchar(11) NOT NULL DEFAULT ID ,
`entries_order_asc_desc` varchar(4) NOT NULL DEFAULT DESC ,
`entries_numbering` tinyint(1) NOT NULL DEFAULT 1 ,
`spam_protection` tinyint(1) NOT NULL DEFAULT 1 ,
`ipblocker` tinyint(1) NOT NULL ,
`wordwrap` tinyint NOT NULL DEFAULT 60 ,
`dateform` varchar(5) NOT NULL DEFAULT d.m.Y ,
`gravatar_show` tinyint(1) NOT NULL ,
`gravatar_rating` tinyint(1) NOT NULL ,
`gravatar_type` tinyint(1) NOT NULL DEFAULT 1 ,
`gravatar_size` int NOT NULL DEFAULT 50 ,
`gravatar_position` tinyint(1) NOT NULL DEFAULT 1 ,
`version` varchar(20) NOT NULL
) DEFAULT CHARSET=utf8mb4 ;

INSERT INTO `mgb_settings` (`title`, `h_author`, `h_domain`, `gb_path`, `h_keywords`, `h_description`, `admin_name`, `admin_email`, `admin_gbemail`, `sendmail_admin`, `sendmail_admin_text`, `sendmail_user`, `sendmail_user_text`, `sendmail_user_notification_text`, `sendmail_comment_text`, `sendmail_contactmail_text`, `template_path`, `template_style_path`, `iconset_path`, `language_path`, `badwords`, `bbcode`, `allow_img_tag`, `max_img_width`, `max_img_height`, `center_img`, `allow_flash_tag`, `max_flash_width`, `max_flash_height`, `center_flash`, `smileys`, `smileys_break`, `smileys_order`, `captcha`, `captcha_method`, `captcha_coords_x`, `captcha_coords_y`, `captcha_color`, `captcha_angle_1`, `captcha_angle_2`, `akismet_plugin`, `akismet_api`, `akismet_mark_as_spam`, `time_lock`, `time_lock_value`, `time_lock_maxtime`, `user_notification`, `user_show_email`, `session_timeout`, `password_min_length`, `moderated`, `entries_per_page`, `entries_order`, `entries_order_asc_desc`, `entries_numbering`, `spam_protection`, `ipblocker`, `wordwrap`, `dateform`, `gravatar_show`, `gravatar_rating`, `gravatar_type`, `gravatar_size`, `gravatar_position`, `version`) VALUES
(MGB 0.7.1, Jürgen, www.dev.m-gb.org, /dev/, , , Jürgen, mopzz@m-gb.org, noreply@m-gb.org, 1, {NAME} hat einen neuen Eintrag im Gästebuch hinterlassen.<br /><br />Datum: {DATE}<br />Zeit: {TIME}<br /><br />---<br />{MESSAGE}<br />---<br /><br />{URL_TO_GB}, 1, Hallo {NAME},<br /><br />vielen Dank für Deinen Eintrag in meinem Gästebuch. Der Eintrag ist sofort verfügbar.<br /><br />{URL_TO_GB}, Hallo {NAME},<br /><br />Dein Eintrag auf {DOMAIN} wurde soeben freigeschaltet. Du kannst ihn Dir hier ansehen: {URL_TO_GB}, Hallo {NAME},<br /><br />zu Deinem Eintrag<br /><br />---<br />{MESSAGE}<br />---<br /><br />wurde soeben ein Kommentar verfasst. Du kannst ihn Dir hier ansehen: {URL_TO_GB}, Du hast eine E-Mail von {NAME} über das Gästebuch von {DOMAIN} erhalten. Hier die Nachricht:<br /><br />---<br />{MESSAGE}<br />---<br /><br />Datum: {DATE}<br />Zeit: {TIME}<br /><br />Beinhaltet diese E-Mail Spam? Du kannst hier den Webmaster kontaktieren: {URL_TO_GB}, mgbModern, blue, default, lang_german_utf8, , 1, 0, 400, 400, 1, 0, 400, 400, 1, 1, 11, ASC, 1, 0, 20, 25, 505050, -10, 5, 0, , 1, 1, 30, 180, 1, 1, 900, 8, 1, 10, ID, DESC, 1, 1, 0, 60, d.m.Y, 0, 0, 1, 50, 1, 0.6.9.3);

CREATE TABLE IF NOT EXISTS `mgb_smilies` (
`ID` int NOT NULL auto_increment PRIMARY KEY ,
`path` varchar(255) NOT NULL ,
`replacement` varchar(255) NOT NULL ,
`height` tinyint NOT NULL ,
`width` tinyint NOT NULL
) DEFAULT CHARSET=utf8mb4 ;

INSERT INTO `mgb_smilies` (`ID`, `path`, `replacement`, `height`, `width`) VALUES
(1, smiley_smile.gif, :smile:, :), :-), 15, 15),
(2, smiley_wink.gif, :wink:, ;), ;-), 15, 15),
(3, smiley_lol.gif, :lol:, 15, 15),
(4, smiley_biggrin.gif, :biggrin:, :D, :-D, 15, 15),
(5, smiley_cool.gif, :cool:, B), B-), 15, 15),
(6, smiley_fun.gif, :fun:, ^^, 15, 15),
(7, smiley_surprised.gif, :surprised:, :O, :-O, 15, 15),
(8, smiley_tongue.gif, :tongue:, :P, :-P, 15, 15),
(9, smiley_confused.gif, :confused:, :-/, 15, 15),
(10, smiley_eek.gif, :eek:, 8O, 8-O, 15, 15),
(11, smiley_doubt.gif, :doubt:, 15, 15),
(12, smiley_neutral.gif, :neutral:, :|, :-|, 15, 15),
(13, smiley_redface.gif, :redface:, 15, 15),
(14, smiley_rolleyes.gif, :rolleyes:, 15, 15),
(15, smiley_silenced.gif, :silenced:, 15, 15),
(16, smiley_sad.gif, :sad:, :(, :-(, 15, 15),
(17, smiley_cry.gif, :cry:, :'(, :'-(, 15, 15),
(18, smiley_doh.gif, :doh:, 15, 15),
(19, smiley_angry.gif, :angry:, 15, 15),
(20, icon_arrow.gif, :arrow:, ->, 15, 15),
(21, icon_exclaim.gif, :exclaim:, 15, 15),
(22, icon_question.gif, :question:, 15, 15);

CREATE TABLE IF NOT EXISTS `mgb_user` (
`ID` int NOT NULL auto_increment PRIMARY KEY ,
`user_name` varchar(255) NOT NULL ,
`user_password` varchar(255) NOT NULL ,
`user_key` varchar(16) NOT NULL ,
`user_email` varchar(255) NOT NULL ,
`user_is_active` tinyint(1) NOT NULL ,
`user_level` tinyint(1) NOT NULL ,
`r_settings` tinyint(1) NOT NULL ,
`r_activate` tinyint(1) NOT NULL ,
`r_deactivate` tinyint(1) NOT NULL ,
`r_delete` tinyint(1) NOT NULL ,
`r_edit` tinyint(1) NOT NULL ,
`r_spam` tinyint(1) NOT NULL ,
`r_edit_smilies` tinyint(1) NOT NULL ,
`logged_in` int NOT NULL ,
`logged_out` tinyint(1) NOT NULL ,
`np_key` varchar(16) NOT NULL ,
`np_expiration` varchar(255) NOT NULL
) DEFAULT CHARSET=utf8mb4 ;

INSERT INTO `mgb_user` (`ID`, `user_name`, `user_password`, `user_key`, `user_email`, `user_is_active`, `user_level`, `r_settings`, `r_activate`, `r_deactivate`, `r_delete`, `r_edit`, `r_spam`, `r_edit_smilies`, `logged_in`, `logged_out`, `np_key`, `np_expiration`) VALUES
(1, mopzz, e9210048086679eecfc1a748eb9148ce, 0, mopzz@m-gb.org, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1770328632, 1, , );

-- END OF FILE --