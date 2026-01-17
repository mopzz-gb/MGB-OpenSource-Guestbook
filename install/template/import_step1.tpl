<center>
<div class="explanation"><span class="install_general">{LANG_EXPL_IMPORT}</span></div>
<br>
<br>
<form action="{IMPORT_FORM_ACTION}" method="post">
<input type="hidden" name="sent" value="{VALUE_SENT}">
<table class="data" summary="db data" cellspacing="0" cellpadding="1">
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
		<td class="data_r"><input class="install_textbox" type="text" name="db_password" size="30" value="{POST_DB_PASSWORD}"></td>
	</tr>
	<tr>
		<td class="data_l"><span class="install_general_bold">{LANG_OLDGB_PATH}</span></td>
		<td class="data_r"><input class="install_textbox" type="text" name="oldgb_path" size="30" value="{POST_OLDGB_PATH}"></td>
	</tr>
	<tr>
		<td class="data_l"><span class="install_general_bold">{LANG_IMPORT_SETTINGS}</span></td>
		<td class="data_r"><input type="checkbox" name="import_settings" value="1"{IMPORT_SETTINGS_CHECKED}></td>
	</tr>
</table>
<br>
{TEMPLATE_WARNINGS}
<br>
<input type="submit" class="install_button" name="next" value="{LANG_NEXT_STEP}">
</form>
</center>