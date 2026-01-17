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
	lang_install.php - Turkish
	==========================

	Translated by Mustafa Dündar
	*/

	// header
	$lang['h_title'] = "MGB {MGB_VERSION} kurulumuna Hoþgeldiniz";

	// general
	$lang['next_step'] = "&raquo; Devam &raquo;";
	$lang['cancel'] = "Cancel";
	$lang['yes'] = "Evet";
	$lang['no'] = "Hayýr";
	$lang['active'] = "Çevrimci";
	$lang['inactive'] = "Çevrim dýþý";

	// installation
	$lang['title'] = "MGB {MGB_VERSION} kurulumu";

	$lang['eula_expl'] = "MGB OpenSource defteri özgür yazýlým GNU / GPL lisansý altýnda (GPLv2) daðýtýlýr. Eðer Ziyaretçi Defterini ne amaçla olursa olsun kullanmak istiyorsanýz, Lisan ý dikkatle okuyunuz.";
	$lang['eula_agree'] = "GNU/GPL koþullarýna katýlýyorum.";
	$lang['eula_disagree'] = "GNU/GPL kosullarýna <b>katýlmýyorum</b>.";

	$lang['thanks'] = "GNU/GPL koþullarýný kabul ettiðiniz ve MGB Açýk Kaynak Müþteri Yorum Defterini kullanmayý kabul ettýðiniz için Teþekkürler.";
	$lang['expl_step1'] = "Kurulum için gerekli olan bazý önemli bilgiler görüntülenir. Semboller sayesinde MGB nýn sisteme yüklenip yüklenemiyeceðini hemen görebilirsiniz.";
	$lang['expl_step2'] = "Lütfen þimdi kendi veritabaný ve administrator bilgilerinizi giriniz.";
	$lang['expl_step3'] = "Tebrikler! MGB ".MGB_VERSION." baþarýlý bir sunucu üzerine kurulmuþtur. Þimdi kendi güvenliðin için dizin ''install'' sil. alternativ olarak onun dizin adýný deðiþtirebilirsiniz.<br><br>Sen þuanda administrator olarak giriþ yapabilirsin. Kullanýcý adýnýzý deðiþtirebilirsiniz, eðer standart isim olarak ''admin'' verdiyseniz.<br><br>Eski verileri, eski MGB kurumundan alabilirsiniz.<br><br>Yeni Müþteri Ziyaretçi Defteri ile Keyfini çýkarýn:)";
	$lang['expl_step3_fail'] = "Bir hata oluþtu. Verdiðiniz deðerleri tekrar kontrol ederek yeni baþtan kurunuz.";

	// step 1
	$lang['srvcfg_server'] = "Sunucu:";
	$lang['srvcfg_phpversion'] = "PHP Sürümü:";
	$lang['srvcfg_mysqlversion'] = "MySQL Sürümü:";
	$lang['srvcfg_gd'] = "GD Kütüphanesi:";
	$lang['srvcfg_writable'] = "Yazýlabilir Config:";
	$lang['srvcfg_reg_globals'] = "register_globals:";

	// errormessages step 1
	$lang['error_1'] = "PHP sürümü eskidir, bir güncelleþtirme önerilir.";
	$lang['error_2'] = "MySQL sürümü eskidir, bir güncelleþtirme önerilir.";
	$lang['error_3'] = "GD Kütüphane mevcut deðildir. Güvenlik kontrolü olmadan Ziyaretçi Defteri kullanýlabilir";
	$lang['error_4'] = "Yazýlamaz Config. Bir FTP programý ile klasörün deðerlerini 755 ver.";
	$lang['error_5'] = "register_globals etkindir. Bu bir güvenlük riski demektir. O devre dýþý býrakýlmalýdýr.";
	$lang['no_error'] = "Tüm deðerler Tamamdýr, Lütfen  ''Ýleri'' tuþunu týklayýnýz";

	// step 2
	$lang['db_title'] = "Veritabanýbilgileri:";
	$lang['db_hostname'] = "Host:";
	$lang['db_dbname'] = "Veritabaný adý:";
	$lang['db_username'] = "Kullanýcý adý:";
	$lang['db_password'] = "Þifre:";
	$lang['db_prefix'] = "Tablo öneki:";

	$lang['admin_title'] = "Yöneticihesabý:";
	$lang['admin_name'] = "Ýsim:";
	$lang['admin_username'] = "Kullanýcý adý:";
	$lang['admin_password'] = "Þifre:";
	$lang['admin_email'] = "eMail:";
	$lang['admin_gbemail'] = "Ziyaretçi Defteri eMail:";

	$lang['post_admin_name'] = "Webmaster";
	$lang['post_admin_username'] = "admin";

	// errormessages step 2
	$lang['error_1_step2'] = "Lütfen tüm alanlarý doldurunuz!";
	$lang['error_2_step2'] = "iki e-Posta adreslerinden en az biri geçersiz.";
	$lang['error_3_step2'] = "Veritabanýna olan baðlantý baþarýsýz, Kimlik bilgilerinizi kontrol ediniz.";
	$lang['error_4_step2'] = "Veritabanýnda belirtilen öneki ile yükleme zaten var. Lütfen baþka bir öneki seçiniz.";
	$lang['error_5_step2'] = "Belirtilen önek özel karekter içeriyor, bu nedenle geçersizdir. Sadece (-) Bir tire ve / veya çizgi (_) ye izin var.";

	$lang['to_administration'] = "Yönetimi için";
	$lang['import'] = "Eski yüklemedeki kayýtlarý aktar";
	$lang['to_guestbook'] = "Ziyaretçi Defteri kaydol";
	$lang['to_install'] = "Try again";
?>
