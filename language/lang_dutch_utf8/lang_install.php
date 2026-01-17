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
	lang_install.php - Dutch
	========================

	This languagefile was translated by Gerard Vandeninden gerard@brookstruefriends.nl
	*/

	// header
	$lang['h_title'] = "Welkom bij de installatie van MGB {MGB_VERSION}";

	// general
	$lang['next_step'] = "&raquo; volgende &raquo;";
	$lang['yes'] = "ja";
	$lang['no'] = "nee";
	$lang['active'] = "actief";
	$lang['inactive'] = "inactief";

	// installation
	$lang['title'] = "Installatie van MGB {MGB_VERSION}";

	$lang['eula_expl'] = "Het MGB OpenSource gastenboek wordt onder de GNU/GPL licentie voor vrije software gedistribueerd (GPLv2). Als  je dit gastenboek wil gebruiken, voor welk doel dan ook, dan moet je de bepalingen van deze licentie accepteren. Lees deze licentieovereenkomst daarom aandachtig.";
	$lang['eula_agree'] = "Ja ik ben het eens met de bepalingen van de GNU/GPL.";
	$lang['eula_disagree'] = "Ik ben het <strong>niet</strong> eens met de bepalingen van de GNU/GPL.";

	$lang['thanks'] = "Bedankt voor het aanvaarden van de GNU/GPL licentie en het kiezen van MGB OpenSource gastenboek.";
	$lang['expl_step1'] = "Hier zijn een paar belangrijke punten voor de installatie. Je kan aan de symbolen zien of je MGB op je server kan installeren.";
	$lang['expl_step2'] = "Vul de login details voor de database en de administrator in.";
	$lang['expl_step3'] = "Gefeliciteerd! De MGB ".MGB_VERSION." is succesvol op je server geinstalleerd. Je kan nu,voor de veiligheid, de folder ''install'' verwijderen. Je kan hem ook hernoemen.<br><br>Nu kan je in het admin gedeelte inloggen. We raden aan om de usernaam te veranderen als je de standaard ''admin'' gebruikt.<br><br>Veel plezier met nieuwe gastenboek! :)";
	$lang['expl_step3_fail'] = "Er heeft zich een fout voorgedaan. Start de installatie opnieuw en controleer alle ingevoerde details zorgvuldig.";

	// step 1
	$lang['srvcfg_server'] = "Server:";
	$lang['srvcfg_phpversion'] = "PHP Versie:";
	$lang['srvcfg_mysqlversion'] = "MySQL Versie:";
	$lang['srvcfg_gd'] = "GD Libary:";
	$lang['srvcfg_writable'] = "Config overschrijfbaar:";
	$lang['srvcfg_reg_globals'] = "register_globals:";

	// errormessages step 1
	$lang['error_1'] = "Uw versie van PHP is te oud. We raden een update aan.";
	$lang['error_2'] = "Uw versie van MySQL is te oud. We raden een update aan..";
	$lang['error_3'] = "De GD library is niet beschikbaar. Het gastenboek werkt wel maar dan zonder captcha.";
	$lang['error_4'] = "De configuratie is niet overschrijfbaar. Pas de rechten (met een FTP-Client) van de folder naar 'writeable' (chmod 755).";
	$lang['error_5'] = "register_globals is geactiveerd. Dit is een veiligheids risico. Het zou gedeactiveerd moeten zijn.";
	$lang['no_error'] = "Alle waardes zijn OK klik op ''volgende''";

	// step 2
	$lang['db_title'] = "Database informatie:";
	$lang['db_hostname'] = "Host:";
	$lang['db_dbname'] = "Database naam:";
	$lang['db_username'] = "Usernaam";
	$lang['db_password'] = "Wachtwoord:";
	$lang['db_prefix'] = "Tabel prefix:";

	$lang['admin_title'] = "Administrator account:";
	$lang['admin_name'] = "Naam:";
	$lang['admin_username'] = "Usernaam:";
	$lang['admin_password'] = "Wachtwoord:";
	$lang['admin_email'] = "e-mail adres:";
	$lang['admin_gbemail'] = "Gastenboek e-mail adres:";

	$lang['post_admin_name'] = "Naam van Webmaster";
	$lang['post_admin_username'] = "Naam van admin";

	// errormessages step 2
	$lang['error_1_step2'] = "Vul ALLE velden in a.u.b.!";
	$lang['error_2_step2'] = "Minstens een van e-mail adressen is ongeldig.";
	$lang['error_3_step2'] = "De connectie met de database kan niet gemaakt worden. Controleer de verbindings instellingen.";
	$lang['error_4_step2'] = "Er is al een installatiue met deze prefix. Kies een andere prefix a.u.b..";
	$lang['error_5_step2'] = "De prefix die je hebt gekozen bevat speciale tekens die niet zijn toegestaan. Probeer een andere prefix.";

	$lang['to_administration'] = "Naar de admin-pagina";
	$lang['import'] = "Importeer berichten van een oudere versie (ALLEEN 0.5.x of ouder)";
	$lang['to_guestbook'] = "Naar het gastenboek";
	$lang['to_install'] = "Probeer opnieuw";
?>
