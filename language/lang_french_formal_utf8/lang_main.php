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

	======================
	lang_main.php - French
	======================

	Français formel (Vous)
	This languagefile was translated by Jürgen Schäfer ==> juergen.schaefer(at)minetoshsoft.com
	*/

	// INDEX.PHP
	$lang['install_directory_exists'] = "Le dossier d'installation n'a pas encore été supprimé.<br>Pour votre propre sécurité, faites-le maintenant, s'il vous plaît!<br>Mais, n'oubliez pas d'exécuter le fichier <a href=\"install/upgrade.php\" title=\"Upgrade\">upgrade.php</a> après une mise à jour!<br>Si vous avez des problèmes avec des «Umlauts», l'exécution du fichier <a href=\"install/convert_ansi.php\" title=\"Convert\">convert_ansi.php</a> peut vous aider.";
	$lang['new_entry'] = "Nouvelle contribution";
	$lang['new_entry_descr'] = "Ici vous pouvez écrire une nouvelle entrée pour le livre d'hôtes";
	$lang['contact'] = "Contact";
	$lang['contact_descr'] = "Ici vous pouvez contacter l’administrateur";
	$lang['adminpanel'] = "Administration";
	$lang['adminpanel_descr'] = "Login";
	$lang['entry'] = "Entrée";
	$lang['entries'] = "Entrées";
	$lang['no_entries'] = "Malheureusement, il y a<br>aucune entrée.";
	$lang['entries_on_pages'] = "Entrées sur {PAGES} pages";
	$lang['page_first'] = "Aller à la première page";
	$lang['page_first_symbol'] = "&laquo;";
	$lang['page_forwards'] = "Aller à la page suivante";
	$lang['page_forwards_symbol'] = "&rsaquo;";
	$lang['page_last'] = "Aller à la dernière page";
	$lang['page_last_symbol'] = "&raquo;";
	$lang['page_backwards'] = "Aller à la page précédente";
	$lang['page_backwards_symbol'] = "&lsaquo;";
	$lang['anchor']	= "Aller directement à cette entrée";
	$lang['from'] = "de";
	$lang['at'] = "à";
	$lang['oclock'] = "heures";
	$lang['comment'] = "Commentaire";
	$lang['email_yes'] = "E-Mail de {ENTRY_NAME}";
	$lang['email_no'] = "{ENTRY_NAME} ne veut pas recevoir de courriels par le livre d’hôtes.";
	$lang['hp_of'] = "Site Internet de {ENTRY_NAME}";
	$lang['gravatar'] = "Gravatar de {ENTRY_NAME}";
	$lang['quote'] = "Citation de";

	// NEWENTRY.PHP
	$lang['new_entry_name'] = "Votre nom:";
	$lang['new_entry_city'] = "Ville:";
	$lang['new_entry_email'] = "E-Mail:";
	$lang['new_entry_icq'] = "ICQ:";
	$lang['new_entry_aim'] = "AIM:";
	$lang['new_entry_msn'] = "MSN:";
	$lang['new_entry_fb'] = "Facebook:";
	$lang['new_entry_twitter'] = "Twitter:";
	$lang['new_entry_hp'] = "Site Internet:";
	$lang['new_entry_message'] = "Votre message:";
	$lang['necessary_fields'] = "[ Les champs obligatoires sont marqués d'un astérisque (*) ]";
	$lang['user_notification'] = "M’avertir par e-Mail, quand l'entrée est activée, ou quand un commentaire a été déposé.";
	$lang['user_show_email'] = "Autoriser les autres utilisateurs à m'écrire un e-Mail à partir du formulaire de contact. Pour éviter les spams, mon adresse E-Mail n’est pas affichée.";
	$lang['user_accept_akismet_service'] = "Cette entrée sera vérifiée par 'Akismet' pour la recherche de spam. Je suis conscient du fait qu'avec l'envoi de mon entrée, des données personnelles sont aussi envoyées sur un serveur situé aux Etats-Unis, et je l'accepte.";
	$lang['send'] = "Envoyer";
	$lang['preview'] = "Aperçu";
	$lang['security_code'] = "Code de sécurité – Captcha";
	$lang['captcha_refresh'] = "Générer un nouveau Captcha";
	$lang['captcha_what_is_that'] = "Qu’est ce que c’est?";
	$lang['captcha_wikipedia'] = "http://fr.wikipedia.org/wiki/Captcha";
	$lang['captcha_tooltip'] = "L’envoi d’une nouvelle contribution nécessite l’entrée d'un code de sécurité pour empêcher les enregistrements automatiques. Entrez tous les lettres en MAJUSCULES, s’il vous plaît. Si le code n’est pas lisible, laissez le champ vide et cliquez sur ''Envoyer''. Ensuite, un nouveau code sera généré. Vos entrées seront conservées. S’il n’y a pas de nouveau code, cliquez à droit et ensuite sur ''Actualiser'', s’il vous plaît.";
	$lang['back_to_mainpage'] = "Retour à la page principale";
	$lang['back'] = "Retour";
	$lang['entry_success_mod'] = "Votre entrée a été enregistrée avec succès.<br>Elle sera évaluée par l’administrateur, puis activée.";
	$lang['entry_success'] = "Votre entrée a été enregistrée avec succès. Vous pouvez la regarder immédiatement.";
	$lang['forwarding'] = "Vous allez être redirigé automatiquement dans 5 secondes. Sinon, cliquez sur ''Retour à la page principale'', s’il vous plaît..";
	$lang['sendmail_admin_title'] = "Nouvelle entrée dans le livre d’hôtes de '{NAME}'";
	$lang['sendmail_user_title'] = "Votre entrée chez {DOMAIN}";

	// EMAIL.PHP
	$lang['email_name'] = "Votre nom:";
	$lang['email_email'] = "Votre adresse e-Mail:";
	$lang['email_message'] = "Votre message:";
	$lang['email_sent_to'] = "Cet e-Mail est envoyé à:";
	$lang['email_send'] = "Envoyer";
	$lang['email_caption'] = "E-Mail de '{NAME}' par le livre d’hôtes de {DOMAIN}";
	$lang['email_caption_copy'] = "E-Mail à '{NAME}' par le livre d’hôtes de {DOMAIN} – Copie du message";
	$lang['email_sender'] = "Expéditeur:";
	$lang['email_receiver'] = "Destinataire:";
	$lang['email_from'] = "via:";
	$lang['email_sendcopytome'] = "Je voudrais recevoir une copie de cet e-Mail.";
	$lang['email_success'] = "Votre e-Mail a été envoyé avec succès à l’utilisateur.";
	$lang['email_fail'] = "L'envoi de l'e-Mail a échoué. Probablement, une erreur s'est produite au niveau du serveur mail.";

	// ERRORMESSAGES
	$lang['errormessage'][1] = "Entrez un message, s'il vous plaît!";
	$lang['errormessage'][2] = "Entrez une adresse e-Mail valide, s'il vous plaît!";
	$lang['errormessage'][3] = "Entrez votre nom, s'il vous plaît!";
	$lang['errormessage'][4] = "n’est pas une adresse <br>e-Mail valide!";
	$lang['errormessage'][5] = "n’est pas un numéro <br>ICQ valide!";
	$lang['errormessage'][6] = "La barrière IP interdit une autre entrée!";
	$lang['errormessage'][7] = "Le code de sécurité n’a pas été saisi ou il est incorrect!";
	$lang['errormessage'][8] = "Cet utilisateur ne veut pas recevoir d’e-Mails!";
	$lang['errormessage'][9] = "Une erreur s'est produite lors de l'envoi de l'e-Mail!";
	$lang['errormessage'][10] = "Protection anti-spam : L'entrée a été envoyée trop rapidement. Attendez encore {TIME_LOCK_REST} secondes. Merci.";
	$lang['errormessage'][11] = "La clause Akismet concernant les données privées (The Akismet data privacy agreement) n'a pas été acceptée. Il FAUT l’accepter pour enregistrer l'entrée.";
	$lang['errormessage'][12] = "Cette adresse e-Mail est interdite pour les entrées.";
	$lang['errormessage'][13] = "Ce domaine est interdite pour les entrées.";
	$lang['errormessage'][14] = "Cette adresse IP est interdite pour les entrées.";
	$lang['errormessage'][15] = "n'est pas un nom Facebook valide. Attention: Les Umlauts et/ou les caractères spéciaux ne sont pas permis! Par exemple: '&auml;' devient 'a'.";
	$lang['errormessage'][16] = "n'est pas un nom Twitter valide. Attention: Les Umlauts et/ou les caractères spéciaux ne sont pas permis! Par exemple: '&auml;' devient 'a'.";
	$lang['errormessage'][17] = "La saisie très rapide répétée de caractères indique que vous êtes un robot spam. Vous êtes bloqué pour une période de {KEYSTROKE_BAN_TIME} secondes. Si c'est une erreur, vous pouvez contacter l'administrateur.";
	$lang['errormessage'][18] = "Vous êtes bloqué à cause d'une saisie de caractères trop rapide. Vous êtes soupçonné d'être un robot spam. Attendez encore {KEYSTROKE_BAN_TIME_REST} secondes, s'il vous plait.";

	// BBCODES
	$lang['bbcodes'] = "BBCodes:";
	$lang['bbcode_bold'] = "Gras";
	$lang['bbcode_help_bold'] = "Afficher le texte en gras";
	$lang['bbcode_italic'] = "Italique";
	$lang['bbcode_help_italic'] = "Afficher le texte en italique";
	$lang['bbcode_url'] = "Lien";
	$lang['bbcode_help_url'] = "Insère un lien. Possibilités: [url]http://www.test.fr/[/url] ou [url=http://www.test.fr/]Test[/url] ou [url=http://www.test.fr/][img]adresse d'image[/img][/url]";
	$lang['bbcode_img'] = "Image";
	$lang['bbcode_help_img'] = "Insère une image. Possibilités: [img]adresse d'image[/img] ou [img=Largeur,Hauteur]adresse d'image[/img]";
	$lang['bbcode_flash'] = "Flash";
	$lang['bbcode_help_flash'] = "Insère une vidéo Flash. -> [flash=Largeur,Hauteur]URL[/flash]";
	$lang['bbcode_quote'] = "Citation";
	$lang['bbcode_help_quote'] = "Insère une citation. Possibilités: [quote]citation[/quote] ou [quote=Nom de l'auteur de la citation]citation[/quote]";
	$lang['bbcode_textsize'] = "Taille de police";
	$lang['bbcode_extrasmall'] = "Minuscule";
	$lang['bbcode_small'] = "Petit";
	$lang['bbcode_default'] = "Standard";
	$lang['bbcode_big'] = "Grand;";
	$lang['bbcode_extrabig'] = "Géant";
	$lang['bbcode_textcolor'] = "Couleur de police";
	$lang['bbcode_help_size'] = "Taille de police";
	$lang['smileys'] = "Smileys:";
?>
