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
	lang_admin.php - French
	=======================

	Français informel (toi)
	This languagefile was translated by Jürgen Schäfer ==> juergen.schaefer(at)minetoshsoft.com
	*/

	// GENERAL
	$lang['no'] = "No";
	$lang['yes'] = "Oui";
	$lang['min'] = "Minimal";
	$lang['max'] = "Maximal";
	$lang['asc'] = "Ascendant";
	$lang['desc'] = "Descendant";
	$lang['save'] = "Enregistrer";
	$lang['administrator'] = "Administrator";
	$lang['moderator'] = "Modérateur";

	$lang['forever'] = "Pour toujours";
	$lang['one_month'] = "1 mois";
	$lang['one_day'] = "1 jour";
	$lang['one_hour'] = "1 heure";
	$lang['one_minute'] = "1 minute";
	$lang['never'] = "Jamais";
	$lang['time_second'] = "Seconde";
	$lang['time_seconds'] = "Secondes";
	$lang['time_minute'] = "Minute";
	$lang['time_minutes'] = "Minutes";
	$lang['time_hour'] = "Heure";
	$lang['time_hours'] = "Heures";
	$lang['time_day'] = "Jour";
	$lang['time_days'] = "Jours";
	$lang['time_month'] = "Mois";
	$lang['time_months'] = "Mois";
	$lang['time_year'] = "An";
	$lang['time_years'] = "Ans";
	$lang['age'] = "Age";
	$lang['old'] = "d'age";

	// LOGIN.INC.PHP
	$lang['title'] = "MGB – Le livre d'hôtes OpenSource – Administration";
	$lang['login_username'] = "Nom d’utilisateur:";
	$lang['login_password'] = "Mot de passe:";
	$lang['login_lostpassword'] = "J’ai oublié mon mot de passe";
	$lang['login'] = "Connexion";
	$lang['logout'] = "Quitter";
	$lang['login_ok'] = "Bienvenue <b>{SESSION_USERNAME}</b>.";
	$lang['logged_in'] = "Tu es connecté en tant que <b>{SESSION_USERNAME}</b>";
	$lang['logged_out'] = "Entre ton nom d'utilisateur et ton mot de passe pour te connecter, s’il te plaît.";
	$lang['please_wait'] = "Ta connexion a été effectuée avec succès.<br>Attends un moment, s'il te plaît...";

	// ERRORMESSAGES
	$lang['errormessage'][1] = "Remplis tous les champs, s'il te plaît!";
	$lang['errormessage'][2] = "Cette combinaison nom d'utilisateur / mot de passe n'existe pas.";
	$lang['errormessage'][3] = "Ton compte a été désactivé par un administrateur.";
	$lang['errormessage'][4] = "Tu n’as pas accès à cette page. Adresse-toi<br>éventuellement à un administrateur.";
	$lang['errormessage'][5] = "Le mot de passe n’est pas correct.";
	$lang['errormessage'][6] = "Les nouveaux mots de passe ne sont pas identiques.";
	$lang['errormessage'][7] = "Tu n’as pas donné d'adresse e-mail ou elle n’est pas valide.";
	$lang['errormessage'][8] = "Tu ne peux pas désactiver ton propre statut d’administrateur, ou désactiver ou supprimer ton propre compte d’utilisateur.";
	$lang['errormessage'][9] = "Tu as été inactif trop longtemps. Tu es, donc, déconnecté automatiquement.";
	$lang['errormessage'][10] = "Lors de la dernière visite, tu ne t'es pas déconnecté correctement. Le système l’a fait pour toi.<br><br>Pour ta propre sécurité, utilise toujours le bouton ''Quitter'' pour te déconnecter du système, sil te plaît. Merci.";
	$lang['errormessage'][11] = "Ce nom d’utilisateur ou cette adresse e-Mail sont déjà utilisés.";
	$lang['errormessage'][12] = "Cette clé est invalide ou a déjà expiré.";
	$lang['errormessage'][13] = "Il a déjà été demandé un nouveau mot de passe pour ce compte d’utilisateur.<br>Il n’est pas possible de demander un autre mot de passe avant l’activation ou l’expiration du nouveau mot de passe.";
	$lang['errormessage'][14] = "L’e-mail n'a pas pu être envoyé. Il peut y avoir un problème avec le serveur de messagerie ou l'adresse mail.";
	$lang['errormessage'][15] = "La version n'a pas pu être déterminée, parce que les fonctions <a href=\"http://php.net/manual/de/function.fopen.php\">fopen()</a> et cURL sont désactivées sur ton serveur.<br>Contacte éventuellement ton hébergeur Web.<br><br>En attendant, tu trouveras des informations sur la version la plus actuelle sur <a href=''http://www.m-gb.org/'' target='_blank' title='MGB Homepage'>m-gb.org/</a>.";
	$lang['errormessage'][16] = "Le nouveau mot de passe est trop court. Il doit avoir au moins {PASSWORD_MIN_LENGTH} caractères.";
	$lang['errormessage'][17] = "Impossible de créer SQL Dump.<br>Est-ce que le dossier 'save' est modifiable?";
	$lang['errormessage'][18] = "Impossible de créer CSV.<br> Est-ce que le dossier 'save' est modifiable?";
	$lang['errormessage'][19] = "Il a eu un problème pendant la suppression de la sauvegarde!";
	$lang['errormessage'][20] = "Tu n'as sélectionné aucune sauvegarde";
	$lang['errormessage'][21] = "Il a eu un problème pendant la restauration de la sauvegarde!";
	$lang['errormessage'][22] = "Il a eu un problème pendant la suppression du tableau concerné!";

	// ERRORMESSAGES EMPTY VALUES
	$lang['empty_needed_value'][1] = "Titre manquant";
	$lang['empty_needed_value'][2] = "Auteur manquant";
	$lang['empty_needed_value'][3] = "Fuseau horaire manquant";
	$lang['empty_needed_value'][4] = "Nom d'administrateur manquant";
	$lang['empty_needed_value'][5] = "Adresse e-Mail de l'administrateur manquante";
	$lang['empty_needed_value'][6] = "Adresse e-Mail du livre d'hôtes manquant";
	$lang['empty_needed_value'][7] = "Nombre d'entrées par page manquant";
	$lang['empty_needed_value'][8] = "Format de date manquant";
	$lang['empty_needed_value'][9] = "Valeur maximale pour la largeur des images manquante";
	$lang['empty_needed_value'][10] = "Valeur maximale pour la hauteur des images manquante";
	$lang['empty_needed_value'][11] = "Valeur maximale pour la largeur du Flash manquante";
	$lang['empty_needed_value'][12] = "Valeur maximale pour la hauteur du Flash manquante";
	$lang['empty_needed_value'][13] = "Valeur pour le retour à la ligne des smileys manquante";
	$lang['empty_needed_value'][14] = "Valeur pour la taille des Gravatars manquante";
	$lang['empty_needed_value'][15] = "Valeur pour la longueur minimale des mots de passe incorrecte ou manquante";
	$lang['empty_needed_value'][16] = "Valeurs pour la longueur du Captcha incorrectes ou manquantes";
	$lang['empty_needed_value'][17] = "Valeur maximale pour les essais d'envoi incorrecte ou manquante";
	$lang['empty_needed_value'][18] = "Valeur pour l'angle de Captcha manquante";
	$lang['empty_needed_value'][19] = "Valeur pour le temps maximal d'une session incorrecte ou manquante";
	$lang['empty_needed_value'][20] = "Coordonnés X du Captcha manquantes";
	$lang['empty_needed_value'][21] = "Coordonnés Y du Captcha manquantes";
	$lang['empty_needed_value'][22] = "La couleur du Captcha n'a pas été indiquée ou contient des caractères non valides.";
	$lang['empty_needed_value'][23] = "Il faut une clé API pour activer Akismet!";
	$lang['empty_needed_value'][24] = "Temps minimal pour le blocage d'envoi manquant";
	$lang['empty_needed_value'][25] = "Temps maximal pour le blocage d'envoi manquant";
	$lang['empty_needed_value'][26] = "Valeur pour le nombre d'essais d'envoi incorrecte ou manquante";
	$lang['empty_needed_value'][27] = "Pas de texte pour l'e-Mail: Admin";
	$lang['empty_needed_value'][28] = "Pas de texte pour l'e-Mail de remerciement à l'utilisateur (non modéré)";
	$lang['empty_needed_value'][29] = "Pas de texte pour l'e-Mail de remerciement à l'utilisateur (modéré)";
	$lang['empty_needed_value'][30] = "Pas de texte pour l'e-Mail d’activation";
	$lang['empty_needed_value'][31] = "Pas de texte pour l'e-Mail de notification de commentaire";
	$lang['empty_needed_value'][32] = "Pas de texte pour l'e-Mail de contact";
	$lang['empty_needed_value'][33] = "Pas de texte pour l'e-Mail de contact (copie)";
	$lang['empty_needed_value'][34] = "Valeur maximale pour les saisies incorrectes du Captcha manquante";
	$lang['empty_needed_value'][35] = "Il n'y a pas de clé publique ou privée pour reCaptcha,<br>ou le Plug-In reCaptcha n'est pas installé";
	$lang['empty_needed_value'][36] = "Le serveur SMTP n'est pas indiqué.";
	$lang['empty_needed_value'][37] = "Le port SMTP n'est pas indiqué.";
	$lang['empty_needed_value'][38] = "Le nom d'utilisateur SMTP n'est pas indiqué.";
	$lang['empty_needed_value'][39] = "Le mot de passe SMTP n'est pas indiqué.";
	$lang['empty_needed_value'][40] = "Impossible de trouver phpmailer dans le dossier ''plugins/phpmailer/''.";
	$lang['empty_needed_value'][41] = "Le Salt contient des caractères invalides.";
	$lang['empty_needed_value'][42] = "La valeur pour les variables dynamiques de champ ne doit pas être vide ou égale à zéro (0),<br>ni inférieure à trois (3) ou supérieure à 255.";

	// SPAM TYPES
	$lang['spam_entry_type'][1] = "Bloqué par la liste de blocage IP.";
	$lang['spam_entry_type'][2] = "Sur la liste spam, mais pas sur la liste de blocage.";
	$lang['spam_entry_type'][3] = "Bloqué par la liste de blocage e-Mail.";
	$lang['spam_entry_type'][4] = "Bloqué par la liste de blocage des domaines.";
	$lang['spam_entry_type'][5] = "Empêché par le blocage d'envoi.";
	$lang['spam_entry_type'][6] = "Actualisé par Akismet.";
	$lang['spam_entry_type'][7] = "Nouvelle entrée par Akismet.";
	$lang['spam_entry_type'][8] = "Actualisé par un Captcha erroné.";
	$lang['spam_entry_type'][9] = "Bloqué par un Captcha.";
	$lang['spam_entry_type'][10] = "Captcha correct, mais déjà sur la liste spam.";
	$lang['spam_entry_type'][11] = "Bloqué par le système de reconnaissance de la vitesse de saisie des caractères.";

	// SPAM.INC.PHP
	$lang['spam_add_to_ip_banlist'] = "Ajouter à la liste de blocage des IP";
	$lang['spam_add_to_email_banlist'] = "Ajouter à la liste de blocage des e-Mails";
	$lang['spam_add_to_domain_banlist'] = "Ajouter à la liste de blocage des domaines";
	$lang['spam_added_to_ip_list'] = " a été ajouté à la liste de blocage des IP!";
	$lang['spam_added_to_email_list'] = " a été ajouté à la liste de blocage des e-Mails!";
	$lang['spam_added_to_domain_list'] = " a été ajouté à la liste de blocage des domaines!";
	$lang['spam_is_already_on_ip_list'] = " est déjà sur la liste de blocage des IP.";
	$lang['spam_is_already_on_email_list'] = " est déjà sur la liste de blocage des e-Mails.";
	$lang['spam_is_already_on_domain_list'] = " est déjà sur la liste de blocage des domaines.";
	$lang['updated_ips'] = "{COUNTER} IPs ont été actualisés en {SECONDS} secondes.";
	$lang['updated_emails'] = "{COUNTER} eMails ont été actualisés en {SECONDS} secondes.";
	$lang['updated_domains'] = "{COUNTER} domaines ont été actualisées en {SECONDS} secondes.";

	// GENERAL STRINGS
	$lang['back_to_mainpage'] = "Retour à la page principale";
	$lang['back'] = "Retour";
	$lang['go'] = "Vas-y!";
	$lang['entry'] = "Entrée";
	$lang['entries'] = "Entrées";
	$lang['no_entries'] = "Aucune entrée.";
	$lang['no_deactivated_entries'] = "Aucune entrée désactivée.";
	$lang['no_activated_entries'] = "Aucune entrée activée.";
	$lang['no_spam_entries'] = "Aucune entrée spam.";
	$lang['entries_on_pages'] = "Entrées sur {PAGES} pages";
	$lang['page_first'] = "Aller à la première page";
	$lang['page_first_symbol'] = "&laquo;";
	$lang['page_forwards'] = "Aller à la page suivante";
	$lang['page_forwards_symbol'] = "&rsaquo;";
	$lang['page_last'] = "Aller à la dernière page";
	$lang['page_last_symbol'] = "&raquo;";
	$lang['page_backwards'] = "Aller à la page précédente";
	$lang['page_backwards_symbol'] = "&lsaquo;";
	$lang['captcha_method_code'] = "Code de sécurité";
	$lang['captcha_method_math'] = "Mathématique";
	$lang['activate_entry'] = "Activer cette entrée";
	$lang['deactivate_entry'] = "Désactiver cette entrée";
	$lang['delete_entry'] = "Supprimer cette entrée";
	$lang['mark_as_spam'] = "Marquer en tant que spam";
	$lang['nospam_entry'] = "Marquer comme 'pas un spam' et activer";
	$lang['nospam_deactivate_entry'] = "Marquer comme 'pas un spam', mais laisser désactivé";
	$lang['active'] = "Cette entrée est activée dans le livre d'hôtes";
	$lang['inactive'] = "Cette entrée n'est pas activée dans le livre d'hôtes";
	$lang['edit_entry'] = "Editer cette entrée";
	$lang['timestamp'] = "Indicateur de temps";
	$lang['quote'] = "Citation de";

	// GRAVATAR
	$lang['gravatar_position_left'] = "Côté gauche d'entrée";
	$lang['gravatar_position_right'] = "Côté droit d'entrée";
	$lang['gravatar_type_0'] = "Standard";
	$lang['gravatar_type_1'] = "Homme mystérieux";
	$lang['gravatar_type_2'] = "Icônes d'identité";
	$lang['gravatar_type_3'] = "Monstre-Id";
	$lang['gravatar_type_4'] = "Wavatar";
	$lang['gravatar_type_5'] = "Retro";

	// RECAPTCHA
	$lang['captcha_method_recaptcha'] = "reCaptcha";
	$lang['recaptcha_style_0'] = "rouge";
	$lang['recaptcha_style_1'] = "blanc";
	$lang['recaptcha_style_2'] = "Verre noir";
	$lang['recaptcha_style_3'] = "clair";

	// DROPDOWNS
	$lang['do_nothing'] = "Pas d'action sélectionnée...";
	$lang['delete_whole_spam'] = "Supprimer toutes les entrées spam";
	$lang['mark_all_no_spam_deactivate'] = "- Marquer toutes les entrées comme 'pas un spam', mais laisser les désactivées";
	$lang['mark_all_no_spam_activate'] = "- Marquer toutes les entrées comme 'pas un spam' et les activer";
	$lang['mark_all_as_spam'] = "- Marquer toutes les entrées en tant que spam";
	$lang['activate_all_entries'] = "- Activer toutes les entrées";
	$lang['deactivate_all_entries'] = "- Désactiver toutes les entrées";
	$lang['delete_all_entries'] = "- Supprimer toutes les entrées";

	$lang['put_all_ips_on_banlist'] = "- Ajouter tous les IP nouveaux dans la liste de blocage";
	$lang['put_all_emails_on_banlist'] = "- Ajouter tous les e-Mails nouveaux dans la liste de blocage";
	$lang['put_all_domains_on_banlist'] = "- Ajouter tous les domaines nouveaux dans la liste de blocage";
	$lang['put_all_on_banlists_and_delete_everything'] = "- Ajouter tous les nouveaux IP, e-Mails et domaines dans la liste de blocage et les supprimer ensuite";

	$lang['show_banned_by_ip_only'] = "-- Montrer seulement les entrées, qui ont été bloquées par les IP";
	$lang['show_banned_by_email_only'] = "-- Montrer seulement les entrées, qui ont été bloquées par les e-Mails";
	$lang['show_banned_by_domain_only'] = "-- Montrer seulement les entrées, qui ont été bloquées par les domaines";
	$lang['show_banned_by_keystroke_only'] = "-- Montrer seulement les entrées, qui ont été bloquées par le système de reconnaissance de la vitesse de saisie des caractères";
	$lang['show_banned_by_captcha_only'] = "-- Montrer seulement les entrées, qui ont été bloquées par Captcha";
	$lang['export_as_sql_dump'] = "--- Exporter comme SQL Dump";
	$lang['export_as_csv'] = "--- Exporter comme CSV";

	// CONFIRMS
	$lang['confirm_general'] = "Veux-tu vraiment exécuter les modifications?";
	$lang['confirm_delete'] = "Veux-tu vraiment supprimer cette entrée?";
	$lang['confirm_delete_spam'] = "Veux-tu vraiment supprimer toutes les entrées spam?";
	$lang['confirm_add_to_permanent_ip_blocklist'] = "Veux-tu vraiment l'ajouter à la liste de blocage des IP?";
	$lang['confirm_add_to_permanent_email_blocklist'] = "Veux-tu vraiment l'ajouter à la liste de blocage des e-Mails?";
	$lang['confirm_add_to_permanent_domain_blocklist'] = "Veux-tu vraiment l'ajouter à la liste de blocage des domaines?";
	$lang['confirm_restore_backup'] = "Veux-tu vraiment restaurer la sauvegarde?";
	$lang['confirm_delete_backup'] = "Veux-tu vraiment supprimer la sauvegarde?";
	$lang['confirm_changes_smiley'] = "Veux-tu vraiment exécuter les modifications des smileys existants?";

	// MAILS
	$lang['standard_mail'] = "mail()";
	$lang['phpmailer'] = "phpmailer";
	$lang['sendmail_user_notification_title'] = "Ton entrée sur {DOMAIN} a été activée";
	$lang['sendmail_user_comment_title'] = "Sur ton entrée sur {DOMAIN} un commentaire a été déposé";
	$lang['sendmail_adduser_title'] = "Tes données d’utilisateur sur {DOMAIN}";
	$lang['sendmail_adduser_text'] = "Tu es enregistré avec succès à {DOMAIN} par un administrateur. Voici tes données d'utilisateur:<br /><br />Nom d'utilisateur: {ADDUSER_NAME}<br />Mot de passe: {ADDUSER_PASSWORD}<br /><br />Tu peux te connecter ici: {ADDUSER_URL}";
	$lang['sendmail_admin_text'] = "{NAME} a déposé une nouvelle entrée dans le livre d’hôtes.<br /><br />Date: {DATE}<br />Heure: {TIME}<br /><br />---<br />{MESSAGE}<br />---<br /><br />{URL_TO_GB}";
	$lang['sendmail_user_text'] = "Bonjour {NAME},<br /><br />Merci beaucoup pour ton entrée dans mon livre d’hôtes. L'entrée est disponible dès maintenant.<br /><br />{URL_TO_GB}";
	$lang['sendmail_user_text_moderated'] = "Bonjour {NAME},<br /><br />Merci beaucoup pour ton entrée dans mon livre d’hôtes. Après examen, elle sera activée dès que possible.<br /><br />{URL_TO_GB}";
	$lang['sendmail_user_notification_text'] = "Bonjour {NAME},<br /><br />Ton entrée sur {DOMAIN} vient d’être activée. Tu peux la regarder ici: {URL_TO_GB}";
	$lang['sendmail_comment_text'] = "Bonjour {NAME},<br /><br />Sur ton entrée<br /><br />---<br />{MESSAGE}<br />---<br /><br />un commentaire vient d’être déposé. Tu peux le regarder ici: {URL_TO_GB}";
	$lang['sendmail_contactmail_text'] = "Tu as reçu un e-mail de {NAME} par le livre d’hôtes de {DOMAIN}. Voici le message:<br /><br />---<br />{MESSAGE}<br />---<br /><br />Date: {DATE}<br />Heure: {TIME}<br /><br />Cet e-Mail contient-il un spam? Tu peux contacter l'administrateur ici: {URL_TO_GB}";
	$lang['sendmail_contactmail_text_copy'] = "Tu as envoyé un message à {NAME} par le livre d’hôtes de {DOMAIN}. Tu trouveras ci-joint une copie:<br /><br />---<br />{MESSAGE}<br />---<br /><br />Date: {DATE}<br />Heure: {TIME}<br /><br />Cet e-Mail contient-il un spam? Si tu n’es pas l’expéditeur de cet e-Mail, tu peux contacter l'administrateur ici: {URL_TO_GB}";
	$lang['sendmail_new_password_title'] = "Nouveau mot de passe : Confirmation";
	$lang['sendmail_new_password_text'] = "Bonjour {NAME},<br /><br />Pour ton compte d’utilisateur, un nouveau mot de passe a été généré. Pour le confirmer, clique dans les prochaines 24 heures sur le lien ci-dessous. L’ancien mot de passe reste actif, jusqu'à ce que le nouveau mot de passe ait été activé.<br /><br />Le nouveau mot de passe expire, si tu ne cliques pas sur le lien ci-dessous dans les prochaines 24 heures.<br /><br />{NEW_PASSWORD_LINK}";
	$lang['sendmail_new_password_created_title'] = "Le nouveau mot de passe a été activé";
	$lang['sendmail_new_password_created_text'] = "Bonjour {NAME},<br /><br />Tu as confirmé ton nouveau mot de passe avec succès. S'il te plaît, trouve ci-joint les nouvelles données d’accès.<br /><br />Nom d’utilisateur: {NAME}<br />Mot de passe: {NEW_PASSWORD}";

	// NAVIGATION
	$lang['settings'] = "Configuration";
	$lang['settings_general'] = "Général";
	$lang['settings_look'] = "Aspect";
	$lang['settings_bbcodes'] = "BBCodes";
	$lang['settings_emoticons'] = "Emoticons";
	$lang['settings_gravatar'] = "Gravatar";
	$lang['settings_security'] = "Sécurité – Anti-Spam";
	$lang['settings_mails'] = "e-Mails";
	$lang['settings_database'] = "Base de données";
	$lang['activate'] = "Activer l'entrée";
	$lang['deactivate'] = "Désactiver l'entrée";
	$lang['delete'] = "Supprimer l'entrée";
	$lang['edit'] = "Éditer l'entrée";
	$lang['spam'] = "Entrées spam";
	$lang['edit_smilies'] = "Modifier les smileys";
	$lang['edit_users'] = "Administration des utilisateurs";
	$lang['banlists'] = "Administration des listes de blocage";
	$lang['banlist_ips'] = "Liste des IP";
	$lang['banlist_emails'] = "Liste des e-Mails";
	$lang['banlist_domains'] = "Liste des domaines";
	$lang['spam_log'] = "Compte-rendu spam";
	$lang['stats'] = "Statistique";
	$lang['license'] = "Licence";
	$lang['forum'] = "Forum";
	$lang['bugreport'] = "Signaler une erreur";
	$lang['version'] = "Version";
	$lang['manual'] = "Documentation";
	$lang['fb_nav'] = "MGB sur Facebook";
	$lang['to_guestbook'] = "Aller au livre d'hôtes";
	$lang['paypal'] = "Si tu trouves le MGB utile, nous t'invitons à faire un don pour soutenir son développement.";

	// SETTINGS
	$lang['edit_caption_general'] = "Paramètres généraux";
	$lang['edit_caption_look'] = "Apparence";
	$lang['edit_caption_bbcodes'] = "BBCodes";
	$lang['edit_caption_smilies'] = "Emoticons";
	$lang['edit_caption_gravatars'] = "Soutien Gravatar";
	$lang['edit_caption_security'] = "Options générales de sécurité";
	$lang['edit_caption_antispam'] = "Réglages Anti-Spam";
	$lang['edit_caption_captcha'] = "Réglages Captcha";
	$lang['edit_caption_recaptcha'] = "reCaptcha";
	$lang['edit_caption_dynamic_fieldnames'] = "Variables dynamiques de champ";
	$lang['edit_caption_akismet'] = "Akismet-Plugin";
	$lang['edit_caption_time_lock'] = "Blocage d'envoi d'entrée";
	$lang['edit_caption_mail_settings'] = "Configuration e-Mail";
	$lang['edit_caption_smtp_settings'] = "Les données suivantes sont nécessaires uniquement, si tu veux envoyer les e-Mails par SMPT (phpmailer). Si ce n'est pas le cas, laisse les vides.";
	$lang['edit_caption_email'] = "Textes e-Mail";
	$lang['edit_caption_database'] = "Informations – Base de données";
	$lang['edit_caption_database_backups'] = "Sauvegardes de la base de données";
	$lang['edit_caption_keystroke'] = "Système de reconnaissance de la vitesse de saisie des caractères";
	$lang['edit_save_message'] = "Les préférences ont été enregistrées avec succès.";
	$lang['edit_title'] = "Titre:";
	$lang['edit_h_author'] = "Auteur:";
	$lang['edit_h_domain'] = "Domaine:";
	$lang['edit_gb_path'] = "Chemin d'accès vers le livre d’hôtes:";
	$lang['edit_h_keywords'] = "Mots-clés:";
	$lang['edit_h_description'] = "Description:";
	$lang['edit_timezone'] = "Fuseau horaire:";
	$lang['edit_announcement_message'] = "Annonce:";
	$lang['edit_admin_name'] = "Nom de l’administrateur:";
	$lang['edit_admin_email'] = "E-Mail de l’administrateur:";
	$lang['edit_admin_gbemail'] = "E-Mail du livre d’hôtes:";
	$lang['edit_sendmail_admin'] = "E-Mail de notification:";
	$lang['edit_sendmail_admin_text'] = "Texte pour l'e-Mail de notification:";
	$lang['edit_sendmail_user'] = "E-Mail de remerciement à l'utilisateur:";
	$lang['edit_sendmail_user_text'] = "Texte d’e-Mail de remerciement (non modéré):";
	$lang['edit_sendmail_user_text_moderated'] = "Texte d’e-Mail de remerciement (modéré):";
	$lang['edit_sendmail_user_notification_text'] = "Texte pour l'e-Mail d’activation:";
	$lang['edit_sendmail_comment_text'] = "Texte de notification de commentaire:";
	$lang['edit_sendmail_contactmail_text'] = "Texte pour l'e-Mail par le livre d’hôtes:";
	$lang['edit_sendmail_contactmail_text_copy'] = "Texte pour la copie du e-Mail par le livre d’hôtes:";
	$lang['edit_template_path'] = "Modèle:";
	$lang['edit_template_style_path'] = "Style du modèle:";
	$lang['edit_iconset_path'] = "Jeu de dessins:";
	$lang['edit_language_path'] = "Fichier de langue:";
	$lang['edit_badwords'] = "Mots interdits:";
	$lang['edit_bbcode'] = "BBcodes:";
	$lang['edit_allow_img_tag'] = "IMG-Tag:";
	$lang['edit_max_img_width'] = "Largeur maximale des images:";
	$lang['edit_max_img_height'] = "Hauteur maximale des images:";
	$lang['edit_center_img'] = "Centrer les images:";
	$lang['edit_allow_flash_tag'] = "FLASH-Tag:";
	$lang['edit_max_flash_width'] = "Largeur maximale du flash:";
	$lang['edit_max_flash_height'] = "Hauteur maximale du flash:";
	$lang['edit_center_flash'] = "Centrer les flashs:";
	$lang['edit_smileys'] = "Smileys:";
	$lang['edit_smileys_break'] = "Smileys dans une ligne:";
	$lang['edit_smileys_order'] = "Trier les smileys:";
	$lang['edit_blocktime'] = "Temps de blocage:";
	$lang['edit_captcha'] = "Code de sécurité (''Captcha''):";
	$lang['edit_captcha_method'] = "Méthode du Captcha:";
	$lang['edit_recaptcha_pub_key'] = "Clé publique pour reCaptcha:";
	$lang['edit_recaptcha_private_key'] = "Clé privée pour reCaptcha:";
	$lang['edit_recaptcha_style'] = "Style du reCaptcha:";
	$lang['edit_captcha_length'] = "Longueur du Captcha:";
	$lang['edit_captcha_salt'] = "Salt:";
	$lang['edit_captcha_hash_method'] = "Méthode du Hash:";
	$lang['edit_captcha_double_hash'] = "Faire deux lancers de dés:";
	$lang['edit_captcha_coords'] = "Coordonnées du Captcha:";
	$lang['edit_captcha_color'] = "Couleur de la texte du Captcha:";
	$lang['edit_captcha_angle'] = "Angle du Captcha:";
	$lang['edit_wrong_captcha_count'] = "Nombre maximal de saisies erronées du Captcha:";
	$lang['edit_akismet_plugin'] = "Akismet-Plugin:";
	$lang['edit_akismet_api'] = "Clé API Akismet (obligatoire):";
	$lang['edit_akismet_mark_as_spam'] = "Marquage de spam:";
	$lang['edit_time_lock'] = "Blocage d'envoi d'entrée:";
	$lang['edit_time_lock_value'] = "Temps minimal pour le blocage d'envoi d'entrée:";
	$lang['edit_time_lock_maxtime'] = "Temps maximal pour le blocage d'envoi d'entrée:";
	$lang['edit_time_lock_spam_count'] = "Nombre maximal des essais d'envoi:";
	$lang['edit_user_notification'] = "Notification à l’utilisateur:";
	$lang['edit_user_show_email'] = "E-Mail d’utilisateur dans le livre d’hôtes:";
	$lang['edit_session_timeout'] = "Temps maximal d’une session:";
	$lang['edit_password_min_length'] = "Longueur minimale des mots de passe:";
	$lang['edit_moderated'] = "Livre d’hôtes modéré:";
	$lang['edit_require_email'] = "Saisie d'e-Mail obligatoire pendant l'entrée:";
	$lang['edit_entries_per_page'] = "Entrées par page:";
	$lang['edit_entries_order'] = "Classement des entrées:";
	$lang['edit_entries_order_asc_desc'] = "Séquence de classement:";
	$lang['edit_entries_numbering'] = "Séquence de numérotation:";
	$lang['edit_spam_protection'] = "Protection des e-Mails contre les spams:";
	$lang['edit_spam_mail'] = "Tu as la possibilité de recevoir des e-Mails d'information, s'il y a de nouvelles entrées spam ou si un nouveau spam a été confirmé. Ce e-Mail est envoyé à cette adresse:";
	$lang['edit_ipblocker'] = "Barrière IP:";
	$lang['edit_wordwrap'] = "Saut de ligne:";
	$lang['edit_dateform'] = "Format de la date:";
	$lang['edit_gravatar_show'] = "Montrer les gravatars:";
	$lang['edit_gravatar_rating'] = "Classification des gravatars:";
	$lang['edit_gravatar_type'] = "Gravatars non enregistrés:";
	$lang['edit_gravatar_size'] = "Taille des gravatars:";
	$lang['edit_gravatar_position'] = "Position des gravatars:";
	$lang['edit_banlist_ips'] = "Liste de blocage des IP active:";
	$lang['edit_banlist_emails'] = "Liste de blocage des e-Mails active:";
	$lang['edit_banlist_domains'] = "Liste de blocage des domaines active:";
	$lang['edit_banlist_log'] = "Compte-rendu de spams:";
	$lang['edit_debug_mode'] = "Mode De-bug:";
	$lang['edit_general_info'] = "Informations générales:";
	$lang['edit_server_name'] = "Hôte:";
	$lang['edit_database_name'] = "Nom de la base de données:";
	$lang['edit_server_document_root'] = "Dossier racine:";
	$lang['edit_database_type'] = "Type de la base de données:";
	$lang['edit_database_version'] = "Version de la base de données:";
	$lang['edit_database_prefix'] = "Le préfixe des tableaux SQL pour cette installation du MGB:";
	$lang['edit_php_version'] = "Version PHP:";
	$lang['edit_backup'] = "Sauvegarde:";
	$lang['edit_no_backup'] = "Pas de sauvegarde existante";
	$lang['edit_database_backup_full'] = "Complet:";
	$lang['edit_database_backup_entries'] = "Entrées:";
	$lang['edit_database_backup_banlist_ips'] = "Listes de blocage des IP:";
	$lang['edit_database_backup_banlist_emails'] = "Listes de blocage des e-Mails:";
	$lang['edit_database_backup_banlist_domains'] = "Listes de blocage des domaines:";
	$lang['edit_create_db_backup_full'] = "Créer";
	$lang['edit_restore_db_backup_full'] = "Restaurer";
	$lang['edit_delete_db_backup_full'] = "Supprimer";
	$lang['edit_create_db_backup_entries'] = "Créer";
	$lang['edit_restore_db_backup_entries'] = "Restaurer";
	$lang['edit_delete_db_backup_entries'] = "Supprimer";
	$lang['edit_create_db_backup_banlist_ips'] = "Créer";
	$lang['edit_restore_db_backup_banlist_ips'] = "Restaurer";
	$lang['edit_delete_db_backup_banlist_ips'] = "Supprimer";
	$lang['edit_create_db_backup_banlist_emails'] = "Créer";
	$lang['edit_restore_db_backup_banlist_emails'] = "Restaurer";
	$lang['edit_delete_db_backup_banlist_emails'] = "Supprimer";
	$lang['edit_create_db_backup_banlist_domains'] = "Créer";
	$lang['edit_restore_db_backup_banlist_domains'] = "Restaurer";
	$lang['edit_delete_db_backup_banlist_domains'] = "Supprimer";
	$lang['edit_delete_backup_successfull'] = "La sauvegarde a été supprimée avec succès!";
	$lang['edit_restore_backup_successfull'] = "La sauvegarde a été restaurée avec succès!";
	$lang['edit_mailer_method'] = "Méthode d'envoi:";
	$lang['edit_smtp_server'] = "Serveur SMTP:";
	$lang['edit_smtp_port'] = "Port SMTP:";
	$lang['edit_smtp_user'] = "Nom d'utilisateur SMTP:";
	$lang['edit_smtp_password'] = "Mot de passe SMTP:";
	$lang['edit_smtp_auth'] = "Authentification SMTP:";
	$lang['edit_keystroke'] = "Système de reconnaissance de la vitesse de saisie des caractères:";
	$lang['edit_keystroke_max_cps'] = "Nombre maximal de caractères par seconde:";
	$lang['edit_keystroke_ban_time'] = "Temps de blocage:";
	$lang['edit_dynamic_fieldnames'] = "Variables dynamiques de champ:";
	$lang['edit_dynamic_fieldnames_method'] = "Méthode des variables dynamiques:";
	$lang['edit_dynamic_fieldnames_length'] = "Longueur:";

	$lang['edit_expl_title'] = "Le titre sur le livre d’hôtes.";
	$lang['edit_expl_h_author'] = "Le nom de l’auteur du site.";
	$lang['edit_expl_h_domain'] = "Domaine sur lequel se trouve le livre d’hôtes <b>sans http://</b> au début, et <b>/</b> à la fin. (exemple.fr)";
	$lang['edit_expl_gb_path'] = "Le chemin d'accès relatif au domaine sur lequel se trouve le livre d’hôtes";
	$lang['edit_expl_h_keywords'] = "Mots-clés, séparés par des virgules.";
	$lang['edit_expl_h_description'] = "Une brève description de la page.";
	$lang['edit_expl_timezone'] = "Depuis la version PHP5, l'indication d'un fuseau horaire explicite est obligatoire. Indique ton fuseau horaire ici. Voir aussi: <a href='http://www.php.net/manual/de/timezones.php' target='_blank'> la liste des fuseaux horaire disponibles.</a>";
	$lang['edit_expl_announcement_message'] = "Ce texte s'affiche au dessus des entrées. Il subsiste jusqu'à sa suppression. Il est possible de le formater avec les BBCodes et les smileys.";
	$lang['edit_expl_admin_name'] = "Nom d’administrateur ou simplement ''Admin''.<br><br><b>ATTENTION: Ce nom ne devra pas être identique au nom d'utilisateur, qui est utilisé pour le log-in dans l’espace d'administration!</b>";
	$lang['edit_expl_admin_email'] = "À cette adresse sont envoyées les notifications concernant les nouvelles entrées..";
	$lang['edit_expl_admin_gbemail'] = "Utilisé comme adresse d'expédition des e-Mails.";
	$lang['edit_expl_sendmail_admin'] = "Si cette option est activée, l'administrateur va recevoir un e-Mail pour chaque nouvelle entrée.";
	$lang['edit_expl_sendmail_admin_text'] = "Ce texte sera envoyé à l'administrateur, si la notification par e-Mail est activée.<br><br>Champs disponibles: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_user'] = "Si cette option est activée, un e-Mail de remerciement sera envoyé à l’utilisateur pour son entrée dans le livre d’hôtes.";
	$lang['edit_expl_sendmail_user_text'] = "Ce texte sera envoyé à l’utilisateur, si l’option e-Mail de remerciement est activée et le livre d'hôtes <b>n'est pas modéré</b>.<br><br>Champs disponibles: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_user_text_moderated'] = "Ce texte sera envoyé à l’utilisateur, si l’option e-Mail de remerciement est activée et le livre d'hôtes <b>est modéré</b>.<br><br>Champs disponibles: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_user_notification_text'] = "Ce texte sera envoyé à l’utilisateur, dès que sa contribution aura été activée. La condition préalable est que l'utilisateur ait donné son accord.<br><br>Champs disponibles: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_comment_text'] = "Ce texte sera envoyé à l’utilisateur, si un administrateur ou un modérateur a déposé un commentaire concernant sa contribution. La condition préalable est que l'utilisateur ait donné son accord.<br><br>Champs disponibles: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_contactmail_text'] = "Ce texte sera envoyé aux utilisateurs qui reçoivent un e-mail par le livre d’hôtes, alors que la protection contre les spams est activée.<br><br>Champs disponibles: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_sendmail_contactmail_text_copy'] = "Ce texte sera envoyé a l'expéditeur d'un message par le livre d'hôtes, alors que la protection contre les spams est activée. Champs disponibles: {NAME}, {DATE}, {TIME}, {MESSAGE}, {DOMAIN}, {URL_TO_GB}";
	$lang['edit_expl_template_path'] = "Le modèle à utiliser.";
	$lang['edit_expl_template_style_path'] = "Le style du modèle à utiliser. Ne peut être sélectionné qu’après que le modèle correspondant soit chargé.";
	$lang['edit_expl_iconset_path'] = "Le jeu de dessins à utiliser, qui fournit les icônes, les smileys et les arrière-plans pour le code de sécurité quelque soit le modèle.";
	$lang['edit_expl_language_path'] = "La langue à utiliser.<br><br><b>ATTENTION:</b> Depuis la version <b>0.6.5</b>, les langues, qui utilisent le jeu de caractères latin9 (iso-8859-15) <b>NE SONT PLUS</b> supportées! Si tu as des problèmes avec des variables ou accents absents, champs de textes vides, etc., essaie un langage basé sur le code UTF-8 et efface tout langage ''latin9'' dans le dossier ''language''.<br><br><br><br>Si tu as, après ceci, encore des problèmes avec des « Umlauts » ou d'autres caractères spéciaux, exécute ''convert_ansi.php'' dans le dossier ''install'', s'il te plait.";
	$lang['edit_expl_language_author'] = "Auteur:";
	$lang['edit_expl_language_charset'] = "Jeu de caractères:";
	$lang['edit_expl_badwords'] = "Entre les mots indésirables, séparés par des virgules, qui doivent être remplacés par des astérisques dans le livre d’hôtes. Laisse vide pour désactiver.";
	$lang['edit_expl_bbcode'] = "Permet une mise en forme du texte par l'utilisateur.";
	$lang['edit_expl_allow_img_tag'] = "L'inclusion d'images dans l'entrée d'un livre d'hôtes présente quelques risques de sécurité. Les images peuvent contenir des logiciels ou scripts malfaisants ou un utilisateur peut placer des images indésirables ou juridiquement problématiques. De plus, un grand nombre d'images et des images de grande taille réduisent la vitesse de chargement du livre d'hôtes.<br><br><b>Le BBCode pour les images devrait être uniquement activé, si le livre d'hôtes est modéré.</b>";
	$lang['edit_expl_max_img_width'] = "Détermine la largeur maximale d'une image, qui a été ajoutée par un [img]-Tag.<br><br><b>ATTENTION : Ceci marche seulement, si <a href='http://de2.php.net/manual/de/function.getimagesize.php' target='_blank' title='php.net'>getimagesize();</a> fonctionne, ou si la largeur et la hauteur sont incluses dans le [img]-Tag, comme ici: ([img=Largeur,Hauteur]Adresse_d_image[/img]).</b>";
	$lang['edit_expl_max_img_height'] = "Détermine la hauteur maximale d'une image, qui a été ajoutée par un [img]-Tag.<br><br><b>ATTENTION : Ceci marche seulement, si <a href='http://de2.php.net/manual/de/function.getimagesize.php' target='_blank' title='php.net'>getimagesize();</a> fonctionne, ou si la largeur et la hauteur sont incluses dans le [img]-Tag, comme ici: ([img=Largeur,Hauteur]Adresse_d_image[/img]).</b>";
	$lang['edit_expl_center_img'] = "Détermine, si les images, qui ont été ajoutées via [img]-Tag, sont affichées au centre.";
	$lang['edit_expl_allow_flash_tag'] = "Permet à l'utilisateur d'insérer des vidéos flash – comme on les trouve sur Youtube – dans son entrée.<br><br><b>Pour des raisons de sécurité, et pour éviter la distribution de vidéos indésirables, le BBCode pour les vidéos flash doit être uniquement activé, si le livre d'hôtes est modéré.</b>";
	$lang['edit_expl_max_flash_width'] = "Détermine la largeur maximale d'une vidéo, qui a été ajoutée par un [flash]-Tag.";
	$lang['edit_expl_max_flash_height'] = "Détermine la hauteur maximale d'un vidéo, qui a été ajouté par un [flash]-Tag.";
	$lang['edit_expl_center_flash'] = "Détermine, si une vidéo, qui a été ajoutée via [flash]-Tag, est affichée au centre.";
	$lang['edit_expl_smileys'] = "Permet à l'utilisateur d'insérer des smileys.";
	$lang['edit_expl_smileys_break'] = "Détermine le nombre de smileys, à partir duquel un saut de ligne est inséré dans la liste des smileys dans ''newentry.php''. Cela peut être très pratique, si beaucoup de smileys sont utilisés.";
	$lang['edit_expl_smileys_order'] = "Indique comment les smileys sont triés : Ascendant ou descendant.";
	$lang['edit_expl_blocktime'] = "Détermine le temps, durant lequel un utilisateur reste bloqué après qu'il ait été ajouté à une liste de blocage.";
	$lang['edit_expl_captcha'] = "Si cette option est activée, on doit entrer un code de sécurité ou résoudre une équation mathématique pour déposer une nouvelle entrée et envoyer un e-Mail à un utilisateur.";
	$lang['edit_expl_captcha_method'] = "Tu peux choisir entre un Captcha classique, un Captcha mathématique, où l'utilisateur doit résoudre une tâche mathématique, et le ''reCaptcha'' de Google. <b>Pour utiliser reCaptcha, le <a href=\"http://code.google.com/p/recaptcha/downloads/list?q=label:phplib-Latest\" target=\"_blank\">Plugin</a> doit être dans le dossier ''plugins/recaptcha''.</b>.";
	$lang['edit_expl_recaptcha_pub_key'] = "Est nécessaire, si reCaptcha est activé. Tu peux la demander <a href=\"https://www.google.com/recaptcha/admin/create\">ici</a>.";
	$lang['edit_expl_recaptcha_private_key'] = "Est nécessaire, si reCaptcha est activé. Elle t'est envoyée avec la clé publique.";
	$lang['edit_expl_recaptcha_style'] = "Détermine l'aspect du reCaptcha. Il y a quatre possibilités différentes.";
	$lang['edit_expl_captcha_length'] = "Concerne que le code de sécurité (Captcha classique). <b>Ne concerne pas</b> le Captcha mathématique ou le reCaptcha. La valeur ne doit pas être inférieure à <b>3</b> et supérieure à <b>9</b>. Si seule une valeur minimale est indiquée, la longueur du Captcha reste toujours la même. Si, en plus, une valeur maximale est indiquée, la longueur du Captcha varie aléatoirement avec chaque nouveau Captcha.<br><br>Standard: <b>6</b>";
	$lang['edit_expl_captcha_salt'] = "Un ''Salt'' est un mot aléatoire ou une combinaison des chiffres et des lettres, qui sont intégrés dans le ''Hash'', qui produit le Captcha. Le ''Salt'' augmente encore la possibilité de générer un Captcha le plus aléatoire possible et qui n'est pas déchiffrable.<br><br>On ne devrait pas laisser la valeur, qui a été choisie aléatoirement pendant l'installation, mais choisir une autre valeur. Si besoin, le champ peut aussi rester vide.";
	$lang['edit_expl_captcha_hash_method'] = "Détermine la méthode Hash pour générer le Captcha.";
	$lang['edit_expl_captcha_double_hash'] = "Si tu as choisi ''Oui'' pour cette option, les chiffres aléatoires du code de sécurité sont générés une deuxième fois (''faire deux lancers de dés'').";
	$lang['edit_expl_captcha_coords'] = "Détermine les coordonnées du texte affiché sur l'image d'arrière plan. L'origine est le <b>coin inférieur gauche du premier caractère</b>.";
	$lang['edit_expl_captcha_color'] = "Détermine la couleur de texte du Captcha. La valeur doit être dans le format HTML, sans le dièse (#).<br><br><b>Correct : <span class='newer_version'>505050</span><br>Faux : <span class='old_version'>#505050</span></b>";
	$lang['edit_expl_captcha_angle'] = "Ces deux valeurs déterminent l'intervalle angulaire en degrés, selon lequel le texte du captcha est dessiné aléatoirement. La valeur gauche doit être <b>inférieure</b> à la valeur droite.";
	$lang['edit_expl_wrong_captcha_count'] = "Cette valeur détermine combien de fois un utilisateur peut saisir un Captcha erroné, avant qu'il soit mis sur la <b>liste spam</b>.";
	$lang['edit_expl_akismet_plugin'] = "Akismet est un service externe, qui vérifie si les nouvelles entrées sont des entrées spam. Si les nouvelles entrées sont considérées comme spam, elles sont bloquées. On peut télécharger le Plug-in Akismet sur <a href='http://www.m-gb.org/index.php?id=download_gb' title='Download Akismet Plugin'>http://www.m-gb.org/</a>.<br><br><b>ATTENTION: En utilisant le Plug-in 'akismet', tu acceptes le transfert des données vers un serveur situé aux Etats-Unis. Si tu n’es pas d'accord avec cette modalité, tu NE DOIS PAS UTILISER le Plug-in Akismet. De même, tes utilisateurs devront afin de valider une entrée accepter cette condition, si tu actives le Plug-in Akismet.</b>";
	$lang['edit_expl_akismet_api'] = "Pour utiliser Akismet, tu as besoin du Plug-in Akismet et d'une <a href='http://akismet.com/signup/#free' title='Akismet API Key'>Clé API</a>. Saisis-la ici après enregistrement.";
	$lang['edit_expl_akismet_check_ok'] = "<span class='same_version' style='font-size: medium'>Akismet est installé!</span>";
	$lang['edit_expl_akismet_check_fail'] = "<span class='old_version' style='font-size: medium'>Akismet N'EST PAS installé!</span>";
	$lang['edit_expl_akismet_mark_as_spam'] = "Si cette option est activée, les nouvelles entrées qui sont identifiées comme spam par Akismet, sont marquées comme spams et sont visibles dans la catégorie spam de l'administration.";
	$lang['edit_expl_time_lock'] = "Si cette option est activée, un compteur fonctionne en arrière plan lors de l'édition d'une nouvelle entrée. Cela évite que l'entrée ne soit envoyée trop rapidement. Si l'utilisateur a édité son entrée trop rapidement, un message va apparaître indiquant combien de secondes l'utilisateur devra encore attendre, avant qu'il puisse signer le livre d’or.";
	$lang['edit_expl_time_lock_value'] = "Temps minimal en secondes, durant lequel l'utilisateur doit attendre pour envoyer son entrée.";
	$lang['edit_expl_time_lock_maxtime'] = "Valeur maximale en secondes pour la période de temps, pendant laquelle l'utilisateur peut signer le livre d’or. Si l'utilisateur prend trop de temps pour éditer son entrée, le compteur du blocage d'entrée reprend à zéro.";
	$lang['edit_expl_time_lock_spam_count'] = "Le nombre maximal d'essais d'envoi qu'un utilisateur peut effectuer dans la période de blocage d'envoi, avant qu'il soit mis sur la <b>liste spam</b>.<br><br><b>Par exemple:</b> Si le temps de blocage d'envoi est réglé à 30 secondes et un utilisateur, malgré des avertissements lui disant qu'il doit encore attendre, essaie d'envoyer son entrée plus de fois que permis, il sera mis sur la liste spam. Mais, ça ne veut pas dire, qu'il est déjà bloqué. Seulement, lorsqu'il aura atteint le maximum de cette liste de spam, il sera bloqué définitivement.<br><br>Minimum: <b>5</b><br>Maximum: <b>99</b>";
	$lang['edit_expl_user_notification'] = "Permet à l'utilisateur de décider d'être informé par e-Mail lorsque son entrée a été activée.";
	$lang['edit_expl_user_show_email'] = "Permet à l'utilisateur de décider si son e-Mail est indiqué dans le livre d’hôtes ou non. S’il décoche cette case, personne sauf l’administrateur ne peut lui envoyer d’e-Mail.";
	$lang['edit_expl_session_timeout'] = "Un administrateur / modérateur est automatiquement déconnecté, s’il est inactif pendant cette période. Indication en <b>secondes</b>. La valeur doit être >= <b>60</b>.";
	$lang['edit_expl_password_min_length'] = "Détermine la longueur minimale des mots de passe. La valeur ne doit pas être inférieure à <b>6</b>. <br><br><b>ATTENTION:</b> Les mots de passe sûrs nécessitent au moins huit caractères ou plus et doivent inclure des caractères spéciaux!";
	$lang['edit_expl_moderated'] = "Si cette option est activée, les entrées doivent être déverrouillées avant qu'elles n’apparaissent dans le livre d’hôtes.";
	$lang['edit_expl_require_email'] = "Détermine, si pour chaque nouvelle entrée, l'indication d'une adresse e-Mail est obligatoire.<br><br><b>ATTENTION: Si tu utilises Akismet, cette option n'est pas opérationnelle.</b>";
	$lang['edit_expl_entries_per_page'] = "Indique le nombre d'entrées affichées sur une page. La valeur <b>ne doit pas être 0</b>.";
	$lang['edit_expl_entries_order'] = "Détermine le champ MySQL suivant lequel les entrées sont classées.";
	$lang['edit_expl_entries_order_asc_desc'] = "Détermine la séquence selon laquelle les entrées sont classées.";
	$lang['edit_expl_entries_numbering'] = "Détermine la séquence selon laquelle les entrées sont numérotées.<br><br><b>Attention :</b> Cela n'a rien à voir avec le classement des entrées. Cela concerne seulement la numérotation publique des entrées, visible par tous les visiteurs.";
	$lang['edit_expl_spam_protection'] = "Lorsque cette option est activée, en cliquant sur l'icône de e-Mail dans le message, un formulaire de contact s’ouvre, par lequel on peut alors envoyer un e-Mail. Les adresses e-Mail <b>ne sont pas</b> directement montrées.";
	$lang['edit_expl_spam_mail'] = "À cette adresse sont envoyés des e-Mails d'information concernant de nouvelles entrées spam ou des blocages de spam réussies. Laisse vide pour déactiver cette option.";
	$lang['edit_expl_ipblocker'] = "Empêche des entrées successives.<br><br><b>NE FONCTIONNE PAS COMPLÈTEMENT!</b>";
	$lang['edit_expl_wordwrap'] = "Indique le nombre de caractères au-delà duquel un très long mot est retourné à la ligne. <b>0</b> pour désactiver cette option.";
	$lang['edit_expl_dateform'] = "Le format pour la date. La mise en forme de la date est possible à l'aide de la fonction php <a class='admin' href='http://www.php.net/manual/en/function.date.php' title='date()' target='_blank'>date()</a>.";
	$lang['edit_expl_gravatar_show'] = "Les gravatars (Global Recognized Avatars) sont de petites images qui apparaissent à côté de l'entrée de l'utilisateur. La condition de leur apparition est que l'utilisateur soit enregistré avec son adresse e-Mail chez le service <a class=\"admin\" href=\"http://site.gravatar.com/\" target=\"_blank\" title=\"Gravatar Service\">gravatar.com</a>.";
	$lang['edit_expl_gravatar_rating'] = "Détermine jusqu'à quel niveau les gravatars sont montrés.<br><br><b>G</b> = Pour tous les âges<br><b>PG</b> = Représentations de la violence légère, de personnes habillées de façon provocante et des gestes provocants<br><b>R</b> = Représentations de la violence intensive, Obscénités<br><b>X</b> = des images sexuellement offensantes";
	$lang['edit_expl_gravatar_type'] = "Ici, tu peux ajuster l’apparence des gravatars, si l'adresse E-Mail de l'utilisateur n'est pas enregistrée au service.";
	$lang['edit_expl_gravatar_size'] = "Détermine la taille du gravatar en <b>pixels</b>.";
	$lang['edit_expl_gravatar_position'] = "Présente le gravatar sur le côté gauche ou droit du message.";
	$lang['edit_expl_banlist_ips'] = "Pendant l'activation, les visiteurs du livre d’hôtes sont vérifiés à l'aide de cette liste. Si le numéro IP d'un visiteur se trouve sur cette liste, ce dernier sera bloqué.";
	$lang['edit_expl_banlist_emails'] = "Pendant l'activation, les nouvelles entrées sont vérifiées grâce à cette liste. Si l'e-Mail d'un utilisateur se trouve sur cette liste, ce dernier sera bloqué.";
	$lang['edit_expl_banlist_domains'] = "Pendant l'activation, les nouvelles entrées sont vérifiées à l'aide de cette liste. Si le domaine d'e-Mail d'un utilisateur se trouve sur cette liste, l'utilisateur sera bloqué.";
	$lang['edit_expl_banlist_log'] = "Si cette option est active, les actions de blocage du livre d’hôtes sont enregistrées dans un rapport.";
	$lang['edit_expl_debug_mode'] = "Dans le mode De-bug, des informations intéressantes d'arrière plan sont affichées sur l’écran. Cela peut faciliter la recherche d'erreurs, si quelque chose ne fonctionne pas comme il faut.";
	$lang['edit_expl_database_backup_full'] = "Une sauvegarde complète de l'installation du MGB. Elle inclut toutes les entrées, tous les préférences, les listes de blocage. Simplement tout.";
	$lang['edit_expl_database_backup_entries'] = "Une sauvegarde complète de toutes les entrées du livre d'hôtes.";
	$lang['edit_expl_database_backup_banlist_ips'] = "Une sauvegarde de la liste de blocage des IP complète.";
	$lang['edit_expl_database_backup_banlist_emails'] = "Une sauvegarde de la liste de blocage des e-Mails complète.";
	$lang['edit_expl_database_backup_banlist_domains'] = "Une sauvegarde de la liste de blocage des domaines complète.";
	$lang['edit_expl_mailer_method'] = "Détermine la méthode avec laquelle les e-Mails du livre d'hôtes sont envoyés.<br><br><b>- mail()</b> - La méthode d'envoi standard intégrée dans PHP<br><b>- phpmailer</b> - Une classe qui peut être téléchargée sur <a href='https://github.com/Synchro/PHPMailer' target='_blank' title='phpmailer'>Github</a>. Après avoir téléchargée cette classe, il faut la copier dans le dossier ''plugins/phpmailer'' du livre d'hôtes. Elle permet l'envoi des e-Mails par SMPT. Il faut que les fonctions nécessaires pour cette classe soient activées par l'hébergeur Web.";
	$lang['edit_expl_smtp_server'] = "L'adresse de ton serveur STMP.";
	$lang['edit_expl_smtp_port'] = "Le port de ton serveur SMTP.<br><br><b>Standard: 25</b>";
	$lang['edit_expl_smtp_user'] = "Ton nom d'utilisateur pour t'enregistrer auprès de ton serveur SMTP. Souvent identique à ton adresse mail.";
	$lang['edit_expl_smtp_password'] = "Le mot de passe SMTP.<br><br><b>ATTENTION:</b> Le mot de passe SMTP doit être enregistré en <b>texte non-chiffré</b> dans la base de données. Il est, donc, dans le texte source de ce formulaire, visible pour toute personne ayant accès à la configuration mail. Le mot de passe SMTP ne devrait pas être identique au mot de passe d’administrateur, si plusieurs personnes ont accès à cette section.";
	$lang['edit_expl_smtp_auth'] = "Le serveur SMTP demande-t-il une authentification?";
	$lang['edit_expl_keystroke'] = "Perçoit si un utilisateur saisit une entrée trop rapidement. Normalement, les robots spam remplissent et envoient des formulaires en quelques millisecondes. Un utilisateur normal a besoin beaucoup plus de temps pour faire la même chose.";
	$lang['edit_expl_keystroke_max_cps'] = "Détermine combien des caractères par seconde un utilisateur peut saisir avant d'être considéré comme un ''robot spam''.<br><br><b>Standard: 8</b>";
	$lang['edit_expl_keystroke_ban_time'] = "Si un utilisateur est considéré comme un ''robot spam'', il va être bloqué pendant cette période, avant qu'il puisse essayer un nouvel envoi. En <b>secondes</b>.";
	$lang['edit_expl_dynamic_fieldnames'] = "Si cette option est active, les variables de champ, qui sont nécessaires pour enregistrer une nouvelle entrée (Nom, e-Mail, Adresse, etc.), sont créées dynamiquement.<br><br>Souvent, les robots spam ne remplissent que des champs qui portent des noms spécifiques et qui sont utiles à leur objectif. Si les variables sont créées dynamiquement, les robots ne peuvent plus ''voir'' les champs, parce qu'ils ne lisent que des variables du texte source. Et parce que les variables changent à chaque fois, les robots ne peuvent pas s'adapter. Un humain n'a pas ce problème, parce qu'il peut toujours lire les dénominations des champs, ce qu'un robot spam ne peut faire.<br><br><b>L’utilisation de cette option est recommandée.</b>";
	$lang['edit_expl_dynamic_fieldnames_method'] = "Détermine la fonction qui crée les variables aléatoires.<br><br><b>mt_rand():</b> Une fonction incluse dans PHP pour les meilleurs chiffres aléatoires. Elle ne génère cependant que des chiffres.<br><b>generate_key_and_pw():</b> La fonction interne de MGB qui génère une combinaison de chiffres et de lettres en majuscules et minuscules.";
	$lang['edit_expl_dynamic_fieldnames_length'] = "Détermine la longueur des variables dynamiques de champ. La valeur ne doit pas être inférieure à <b>3</b> et supérieure à <b>255</b>.<br><br><b>ATTENTION: Cette option n'est valide que pour la fonction ''generate_key_and_pw()'' du MGB.</b>";

	// EDIT.INC.PHP
	$lang['id'] = "ID:";
	$lang['ip'] = "IP:";
	$lang['date'] = "Date:";
	$lang['timestamp'] = "Heure:";
	$lang['name'] = "Nom:";
	$lang['city'] = "Ville:";
	$lang['email'] = "e-Mail:";
	$lang['icq'] = "ICQ:";
	$lang['aim'] = "AIM:";
	$lang['msn'] = "MSN:";
	$lang['fb'] = "Facebook:";
	$lang['twitter'] = "Twitter:";
	$lang['hp'] = "Site Internet:";
	$lang['message'] = "Entrée:";
	$lang['user_notification'] = "Notification d’activation ou d’un commentaire:";
	$lang['user_show_email'] = "Activer e-Mail dans le livre d’hôtes:";
	$lang['comment'] = "Commentaire:";

	// SMILIES.INC.PHP
	$lang['add_smilies_descr'] = "Ici, tu peux éditer, ajouter ou effacer des smileys.<br><br>Tous les smileys à utiliser doivent être dans le dossier <b>'images/smilies/'</b> du dossier racine du livre d'hôtes. Il faut seulement mettre le nom du fichier dans le <b>champ de texte vide</b> et cliquez <b>Save (Enregistrer)</b>.<br><br>Tu peux également ajouter plusieurs codes de smileys. Sépare chacun avec une <b>virgule et un espace</b>. Pour ajouter des smileys dans ''newentry.php'', le premier code de smiley dans la liste va être utilisé.<br><br><span class='same_version'>Correct:</span> :smile:, :), :-)<br><span class='old_version'>Faux:</span> :smile:,:),:-)<br><br><b>Note, s'il te plaît. : Si tu modifies ou effaces des smileys ou codes de smileys déjà utilisés dans une ou plusieurs entrées, ils ne pourront plus être affichés correctement ! Tu dois éditer alors ces entrées manuellement.</b>";
	$lang['smiley_path'] = "Nom du fichier";
	$lang['smiley_replacement'] = "Code de smiley";
	$lang['add_new_smiley'] = "Ajouter un smiley";
	$lang['checked_smilies'] = "Smileys marqués ...";
	$lang['delete_checked_smilies'] = "... effacer de la liste, garder les non-marqués";
	$lang['keep_checked_smilies'] = "... garder, effacer les non-marqués";
	$lang['smiley_width'] = "Largeur";
	$lang['smiley_height'] = "Hauteur";
	$lang['smilies'] = "Smileys";

	$lang['check_all'] = "Tout marquer";
	$lang['uncheck_all'] = "Enlever tous les marquages";
	$lang['invert_all'] = "Inverser les marquages";

	// EDIT_USER.INC.PHP
	$lang['user_is_active'] = "Utilisateur est actif:";
	$lang['r_user_type'] = "Utilisateur est:";
	$lang['r_settings'] = "Changer configuration:";

	$lang['r_settings_database'] = "Administration des sauvegardes:";

	$lang['r_activate'] = "Activer les entrées:";
	$lang['r_deactivate'] = "Désactiver les entrées:";
	$lang['r_delete'] = "Supprimer les entrées:";
	$lang['r_edit'] = "Éditer les entrées:";
	$lang['r_spam'] = "Administration – Spam:";
	$lang['r_blocklists'] = "Administration – Listes de blocage:";
	$lang['r_edit_smilies'] = "Éditer les smileys";
	$lang['old_password'] = "Ton mot de passe actuel:";
	$lang['new_password_1'] = "Mot de passe:";
	$lang['new_password_2'] = "Confirmer le mot de passe:";
	$lang['delete_user'] = "Confirmer:";
	$lang['edit_user_caption_rights'] = "Droits (pour les modérateurs seulement)";
	$lang['edit_user_caption_password'] = "Mot de passe de cet utilisateur:";
	$lang['edit_user_caption_delete_user'] = "Supprimer cet utilisateur";
	$lang['edit_user_caption_old_password'] = "Ton mot de passe actuel:";
	$lang['user_add'] = "Ajouter un utilisateur";
	$lang['user_edit'] = "Éditer utilisateur";
	$lang['edit_user_caption_send_account_data'] = "Envoyer les données";
	$lang['send_account_data'] = "Envoyer par e-Mail?";

	// VERSION.INC.PHP
	$lang['current_version'] = "Version installée:";
	$lang['stable_version'] = "Version stable la plus récente:";
	$lang['unstable_version'] = "Version instable la plus récente:";
	$lang['old_version'] = "Ta version est dépassée.<br>Une mise à jour est recommandée.<br><br><a href='http://www.m-gb.org/index.php?id=download_gb' class='admin' target='_blank' title='Actualiser maintenant'>À la version actuelle</a>";
	$lang['same_version'] = "Tu as déjà la version la plus récente.<br>Une mise à jour n’est pas nécessaire.";
	$lang['newer_version'] = "Ta version est plus récente que la dernière version stable disponible.<br>Une mise à jour n’est pas nécessaire.";
	$lang['new_version_available'] = "Une nouvelle version est disponible: <a href='http://www.m-gb.org/files/latest/mgb-latest.zip' class='admin' target='_blank' title='Actualiser maintenant'>{LATEST_VERSION}</a>";

	// LOSTPASSWORD.PHP
	$lang['lostpassword_mail'] = "Ton adresse e-Mail:";
	$lang['get_new_pw'] = "Demander un nouveau mot de passe";
	$lang['lostpassword_success'] = "Ta demande a été traitée. Tu recevras rapidement un e-Mail avec un lien de confirmation.<br>Clique sur ce lien pour activer ton nouveau mot de passe.";
	$lang['lostpassword_no_success'] = "Ta demande a échoué. Une erreur s'est produite au niveau du serveur mail.";
	$lang['lostpassword_success_created'] = "Tes nouvelles données d’accès <br>t'ont été envoyées par e-Mail.";

	$lang['lostpassword_no_success_created'] = "Une erreur s'est produite pendant l'envoi du mail.<br>L'envoi des données d'accès a échoué.";
?>
