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

	=========================
	lang_install.php - French
	=========================

	Français informel (toi)
	This languagefile was translated by Jürgen Schäfer ==> juergen.schaefer(at)minetoshsoft.com
	*/

	// header
	$lang['h_title'] = "Bienvenue dans l’installation de MGB {MGB_VERSION}";

	// general
	$lang['next_step'] = "&raquo; Continuer &raquo;";
	$lang['cancel'] = "Annuler";
	$lang['yes'] = "Oui";
	$lang['no'] = "Non";
	$lang['active'] = "Actif";
	$lang['inactive'] = "Inactif";

	// installation
	$lang['title'] = "Installation de MGB {MGB_VERSION}";

	$lang['eula_expl'] = "Le livre d’hôtes OpenSource MGB est distribué sous licence GNU/GPL pour les logiciels libres (GPLv2). Si tu souhaites utiliser ce livre d'hôtes, quelqu’en soit le but, tu dois accepter les conditions de licence. Lis attentivement la licence, s’il te plaît.";
	$lang['eula_agree'] = "J’accepte les conditions de GNU/GPL.";
	$lang['eula_disagree'] = "Je <b>n’accepte pas</b> les conditions de GNU/GPL.";

	$lang['thanks'] = "Merci d’avoir accepté les conditions de GNU/GPL et d’avoir choisi le livre d’hôtes OpenSource MGB.";
	$lang['expl_step1'] = "Ici, tu trouves quelques informations importantes requises pour l'installation. Tu peux utiliser les icônes pour voir immédiatement si le MGB peut être installé sur ton serveur.";
	$lang['expl_step2'] = "Entre maintenant, s'il te plaît, les données d’accès pour ta base de données et pour le compte administrateur à créer.";
	$lang['expl_step3'] = "Félicitations! Le MGB ".MGB_VERSION." a été installé avec succès sur ton serveur. Supprime maintenant, s'il te plaît, pour ta propre sécurité, le dossier ''install''. Sinon, tu peux le renommer.<br><br>Tu peux maintenant te connecter à l’administration de ton livre d’hôtes. Il est recommandé de changer ton nom d'utilisateur, si tu as utilisé le nom de standard ''admin''.<br><br>Mais, tu peux maintenant également importer les anciennes entrées créées lors de l’installation d’une version antérieure de MGB (version 0.5.x ou antérieur SEULEMENT).<br><br>Tu peux désormais profiter de ton nouveau livre d’hôtes!";
	$lang['expl_step3_fail'] = "Une erreur s'est produite. S'il te plaît, relance l'installation et vérifie toutes tes données encore une fois.<br><br>Si l'installation échoue de nouveau, tu trouveras de l'aide ici:<br><a href='http://forum.m-gb.org/' target='_blank'>Forum du livre d'hôtes OpenSource MGB</a>";

	// step 1
	$lang['srvcfg_server'] = "Serveur:";
	$lang['srvcfg_phpversion'] = "Version PHP:";
	$lang['srvcfg_mysqlversion'] = "Version MySQL:";
	$lang['srvcfg_gd'] = "Bibliothek GD:";
	$lang['srvcfg_writable'] = "Configuration modifiable:";
	$lang['srvcfg_reg_globals'] = "register_globals:";

	// errormessages step 1
	$lang['error_1'] = "Ta version de PHP est dépassée. Une mise à jour est recommandée.<br><br><b>Mets la valeur de la variable ''".chr(36)."ignore_warnings'' dans la ligne 58 du fichier install.php à «1», si tu veux continuer malgré les avertissements.</b>";
	$lang['error_2'] = "Ta version de MySQL est dépassée. Une mise à jour est recommandée.<br><br><b>Mets la valeur de la variable ''".chr(36)."ignore_warnings'' dans la ligne 58 du fichier install.php à «1», si tu veux continuer malgré les avertissements.</b>";
	$lang['error_3'] = "La Bibliothèque GD n’est pas disponible. Le livre d'hôtes peut être utilisé, mais sans code de sécurité.";
	$lang['error_4'] = "La configuration ne peut être modifiée (enregistrement interdit). Utilise un logiciel FTP pour mettre les permissions (chmod) du dossier sur 755.";
	$lang['error_5'] = "Le register_globals est activé. Ceci implique un risque au niveau de la sécurité. Il devrait être désactivé.";
	$lang['no_error'] = "Toutes les valeurs sont correctes! Clique sur ''Continuer'', s’il te plait.";

	// step 2
	$lang['db_title'] = "Informations sur la base de données:";
	$lang['db_hostname'] = "Hôte:";
	$lang['db_dbname'] = "Nom de la base de données:";
	$lang['db_username'] = "Nom d’utilisateur:";
	$lang['db_password'] = "Mot de passe:";
	$lang['db_prefix'] = "Le préfixe du tableau:";

	$lang['admin_title'] = "Compte d’administrateur:";
	$lang['admin_name'] = "Nom:";
	$lang['admin_username'] = "Nom d’utilisateur:";
	$lang['admin_password'] = "Mot de passe:";
	$lang['admin_email'] = "E-Mail:";
	$lang['admin_gbemail'] = "E-Mail du livre d’hôtes:";

	$lang['post_admin_name'] = "Webmaster";
	$lang['post_admin_username'] = "admin";

	// errormessages step 2
	$lang['error_1_step2'] = "Remplis tous les champs, s'il te plaît!";
	$lang['error_2_step2'] = "Au moins une des deux adresses e-Mail n'est pas valide.";
	$lang['error_3_step2'] = "La connexion à la base de données a échoué. Vérifie tes données d’accès.";
	$lang['error_4_step2'] = "Il y a déjà une installation avec le préfixe spécifié dans la base de données. Choisis un autre préfixe, s'il te plaît.";
	$lang['error_5_step2'] = "Le préfixe spécifié contient des caractères spéciaux, et n'est donc pas valable. Ne sont autorisés que le trait de soulignement (_) et/ou le trait d'union (-).";

	$lang['to_administration'] = "Aller à l’administration";
	$lang['import'] = "Importer les entrées d'une version plus ancienne (0.5.x ou antérieure SEULEMENT)";
	$lang['to_guestbook'] = "Aller au livre d’hôtes";
	$lang['to_install'] = "Essayer l'installation de nouveau";
?>
