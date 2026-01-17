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

	==========================
	lang_install.php - Italian
	==========================

	This language file was translated by Christian Castelli alias VooDoo (voodoo81people@gmail.com)
	*/

	// header
	$lang['h_title'] = "Benvenuto nell'installazione di MGB {MGB_VERSION}";

	// general
	$lang['next_step'] = "&raquo; continua &raquo;";
	$lang['yes'] = "si";
	$lang['no'] = "no";
	$lang['active'] = "attivo";
	$lang['inactive'] = "inattivo";

	// installation
	$lang['title'] = "Installazione di MGB {MGB_VERSION}";

	$lang['eula_expl'] = "Il guestbook OpenSource MGB è distribuito sotto licenza GNU/GPL license per il software libero (GPLv2). Se vuoi usare il guestbook, a prescindere dallo scopo, devi aderire alla licenza. Per favore leggila attentamente.";
	$lang['eula_agree'] = "Accetto alle condizioni della licenza GNU/GPL.";
	$lang['eula_disagree'] = "<strong>NON</strong> accetto le condizioni della licenza GNU/GPL.";

	$lang['thanks'] = "Grazie per aver accettato la licenza GNU/GPL e per l'utilizzo del guestbook OpenSource MGB.";
	$lang['expl_step1'] = "Qui ci sono un paio di informazioni importanti necessarie per l'installazione. Puoi osservare attraverso i simboli se puoi installare MGB nel tuo server.";
	$lang['expl_step2'] = "Per favore immetti i deettagli di login per il tuo database così come per l'account di amministratore che deve essere creato.";
	$lang['expl_step3'] = "Congratulazioni! MGB {MGB_VERSION} è stato installato con successo sul tuo server. Per favore cancella la cartella ''install'' per tua sicurezza. Alternativamente puoi anche solo rinominarla.<br><br>Ora puoi loggarti nel pannello amministrativo. Ti suggeriamo di cambiare username nel caso tu abbia scleto quello standar ''admin''.<br><br>Divertiti con il tuo nuovo guestbook! :)";
	$lang['expl_step3_fail'] = "E' avvenuto un errore. Per favore ricomincia l'installazione da capo e controlla i dati che hai fornito.";

	// step 1
	$lang['srvcfg_server'] = "Server:";
	$lang['srvcfg_phpversion'] = "Versione PHP:";
	$lang['srvcfg_mysqlversion'] = "Versione MySQL:";
	$lang['srvcfg_gd'] = "Libreria GD:";
	$lang['srvcfg_writable'] = "Permessi di scrittura:";
	$lang['srvcfg_reg_globals'] = "register_globals:";

	// errormessages step 1
	$lang['error_1'] = "La tua versione di PHP è più vecchia di quella richiesta. Ti consigliamo un aggiornamento.";
	$lang['error_2'] = "La tua versione di MySQL è più vecchia di quella richiesta. Ti consigliamo un aggiornamento.";
	$lang['error_3'] = "La libreria GD non è disponibile. Il guestbook funzionerà senza captcha.";
	$lang['error_4'] = "La configurazione non ha i permessi in scrittura. Per favore setta i permessi (con un FTP-Client) della cartella in modo che sia scrivibile (chmod 755).";
	$lang['error_5'] = "register_globals è attivo. questo è un rischio in termini di sicurezza. Dovrebbe essere disattivato.";
	$lang['no_error'] = "Tutti i valori sono corretti! Clicca su 'avanti'";

	// step 2
	$lang['db_title'] = "Informazioni sul database:";
	$lang['db_hostname'] = "Host:";
	$lang['db_dbname'] = "Nome del database:";
	$lang['db_username'] = "Username:";
	$lang['db_password'] = "Password:";
	$lang['db_prefix'] = "Prefisso per le tabelle:";

	$lang['admin_title'] = "Account dell'amministratore:";
	$lang['admin_name'] = "Nome:";
	$lang['admin_username'] = "Username:";
	$lang['admin_password'] = "Password:";
	$lang['admin_email'] = "eMail:";
	$lang['admin_gbemail'] = "Guestbook eMail:";

	$lang['post_admin_name'] = "Webmaster";
	$lang['post_admin_username'] = "admin";

	// errormessages step 2
	$lang['error_1_step2'] = "Per favore riempi tutti i campi!";
	$lang['error_2_step2'] = "Almeno uno dei due indirizzi eMail forniti non è valido.";
	$lang['error_3_step2'] = "Non è possibile stabilire una connessione con il database. Per favore controlla le informazioni del database.";
	$lang['error_4_step2'] = "Esiste già un'installazione che usa il prefisso scelto. Prego scegliere un altro prefisso.";
	$lang['error_5_step2'] = "Il prefisso scelto contiene caratteri speciali che non sono permessi. Scegli un altro prefisso.";

	$lang['to_administration'] = "Vai al pannell oamministrativo";
	$lang['import'] = "Importa i post da una vecchia versione(0.5.x o più vecchia soltanto)";
	$lang['to_guestbook'] = "Vai al guestbook";
	$lang['to_install'] = "Prova di nuovo";
?>
