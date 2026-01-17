<center>
<div class="explanation"><span class="install_general">{LANG_EXPL_STEP2}</span></div>
<br>
<br>
<form action="{INSTALL_FORM_ACTION}" method="post">
<input type="hidden" name="step" value="{VALUE_STEP}">
<input type="hidden" name="sent" value="{VALUE_SENT}">
<table class="data" summary="db data" cellspacing="0" cellpadding="2">
	<tr>
		<td class="data_overall" colspan="2"><center><span class="install_general_bold">{LANG_DB_TITLE}</span></center></td>
	</tr>
	<tr>
		<td class="data_l"><span class="install_general_bold">{LANG_DB_HOSTNAME}</span></td>
		<td class="data_r"><input class="install_textbox" type="text" name="db_hostname" size="30" value="{POST_DB_HOSTNAME}"></td>
	</tr>
	<tr>
		<td class="data_l"><span class="install_general_bold">{LANG_DB_DBNAME}</span></td>
		<td class="data_r"><input class="install_textbox" type="text" name="db_dbname" size="30" value="{POST_DB_DBNAME}"></td>
	</tr>
	<tr>
		<td class="data_l"><span class="install_general_bold">{LANG_DB_USERNAME}</span></td>
		<td class="data_r"><input class="install_textbox" type="text" name="db_username" size="30" value="{POST_DB_USERNAME}"></td>
	</tr>
	<tr>
		<td class="data_l"><span class="install_general_bold">{LANG_DB_PASSWORD}</span></td>
		<td class="data_r"><input class="install_textbox" type="password" name="db_password" size="30" value="{POST_DB_PASSWORD}"></td>
	</tr>
	<tr>
		<td class="data_l"><span class="install_general_bold">{LANG_DB_PREFIX}</span></td>
		<td class="data_r"><input class="install_textbox" type="text" name="db_prefix" size="30" value="{POST_DB_PREFIX}"></td>
	</tr>
</table>
<br>
<table class="data" summary="user data" cellspacing="0" cellpadding="2">
	<tr>
		<td class="data_overall" colspan="2"><center><span class="install_general_bold">{LANG_ADMIN_TITLE}</span></center></td>
	</tr>
	<tr>
		<td class="data_l"><span class="install_general_bold">{LANG_ADMIN_NAME}</span></td>
		<td class="data_r"><input class="install_textbox" type="text" name="admin_name" size="30" value="{POST_ADMIN_NAME}"></td>
	</tr>
	<tr>
		<td class="data_l"><span class="install_general_bold">{LANG_ADMIN_USERNAME}</span></td>
		<td class="data_r"><input class="install_textbox" type="text" name="admin_username" size="30" value="{POST_ADMIN_USERNAME}"></td>
	</tr>
	<tr>
		<td class="data_l"><span class="install_general_bold">{LANG_ADMIN_PASSWORD}</span></td>
		<td class="data_r"><input class="install_textbox" type="password" name="admin_password" size="30" value="{POST_ADMIN_PASSWORD}"></td>
	</tr>
	<tr>
		<td class="data_l"><span class="install_general_bold">{LANG_ADMIN_EMAIL}</span></td>
		<td class="data_r"><input class="install_textbox" type="text" name="admin_email" size="30" value="{POST_ADMIN_EMAIL}"></td>
	</tr>
	<tr>
		<td class="data_l"><span class="install_general_bold">{LANG_ADMIN_GBEMAIL}</span></td>
		<td class="data_r"><input class="install_textbox" type="text" name="admin_gbemail" size="30" value="{POST_ADMIN_GBEMAIL}"></td>
	</tr>
</table>
<br>
{TEMPLATE_WARNINGS}
<br>
<input type="submit" class="install_button" name="next" value="{LANG_NEXT_STEP}">
</form>
</center>