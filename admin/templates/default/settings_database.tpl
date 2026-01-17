<form action="{URL_SETTINGS}" method="post">
<input type="hidden" name="sent_settings" value="1">
<center>
<!-- <input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}">
<br>
<br> -->
<table class="settings" summary="settings" cellspacing="0" cellpadding="2">
	<tr>
		<td colspan="2" class="settings_overall">
		<center><span class="edit_caption">{LANG_EDIT_CAPTION_DATABASE}</span></center>
		</td>
	</tr>
	<tr>
		<td class="settings_l" colspan="2">
		<span><b>{LANG_EDIT_SERVER_NAME}</b>&nbsp;{SERVER_NAME}<br>
		<b>{LANG_EDIT_DATABASE_NAME}</b>&nbsp;{DATABASE_NAME}<br>
		<b>{LANG_EDIT_DATABASE_TYPE}</b>&nbsp;{DATABASE_TYPE}<br>
		<b>{LANG_EDIT_DATABASE_CLIENT_VERSION}</b>&nbsp;{DATABASE_CLIENT_VERSION}<br>
		<b>{LANG_EDIT_DATABASE_SERVER_VERSION}</b>&nbsp;{DATABASE_SERVER_VERSION}<br>
		<b>{LANG_EDIT_DATABASE_PREFIX}</b>&nbsp;{DATABASE_PREFIX}<br>
		<b><a href="admin.php?action=settings_database&amp;db_action=show_phpinfo" target="_blank">{LANG_EDIT_PHP_VERSION}</a></b>&nbsp;{PHP_VERSION}<br>
		<b>{LANG_EDIT_SERVER_DOCUMENT_ROOT}</b>&nbsp;{SERVER_DOCUMENT_ROOT}</span>
		</td>
	</tr>
	<tr>
		<td colspan="2" class="settings_overall">
		<center><span class="edit_caption">{LANG_EDIT_CAPTION_DATABASE_BACKUPS}</span></center>
		</td>
	</tr>
	<tr>
		<td class="settings_l_backup">
		<span><b>{LANG_EDIT_DATABASE_BACKUP_FULL}</b></span><br>
		<span>{LANG_EDIT_EXPL_DATABASE_BACKUP_FULL}</span>
		</td>
		<td class="settings_r_backup">
		<select class="backups" name="database_backup_full" size="5">
		{EDIT_OPTION_DATABASE_BACKUPS_FULL}
		</select>
		<br><br>
		<span>{LANG_EDIT_BACKUP}</span>
		<input type="submit" class="button" name="edit_create_db_backup_full" value="{LANG_EDIT_CREATE_DB_BACKUP_FULL}">
		<input type="submit" class="button" name="edit_restore_db_backup_full" value="{LANG_EDIT_RESTORE_DB_BACKUP_FULL}" onClick="return confirm('{LANG_CONFIRM_RESTORE_BACKUP}'); submit();">
		<input type="submit" class="button" name="edit_delete_db_backup_full" value="{LANG_EDIT_DELETE_DB_BACKUP_FULL}" onClick="return confirm('{LANG_CONFIRM_DELETE_BACKUP}'); submit();">
		</td>
	</tr>
	<tr>
		<td class="settings_l_backup">
		<span><b>{LANG_EDIT_DATABASE_BACKUP_ENTRIES}</b></span><br>
		<span>{LANG_EDIT_EXPL_DATABASE_BACKUP_ENTRIES}</span>
		</td>
		<td class="settings_r_backup">
		<select class="backups" name="database_backup_entries" size="5">
		{EDIT_OPTION_DATABASE_BACKUPS_ENTRIES}
		</select>
		<br><br>
		<span>{LANG_EDIT_BACKUP}</span>
		<input type="submit" class="button" name="edit_create_db_backup_entries" value="{LANG_EDIT_CREATE_DB_BACKUP_ENTRIES}">
		<input type="submit" class="button" name="edit_restore_db_backup_entries" value="{LANG_EDIT_RESTORE_DB_BACKUP_ENTRIES}" onClick="return confirm('{LANG_CONFIRM_RESTORE_BACKUP}'); submit();">
		<input type="submit" class="button" name="edit_delete_db_backup_entries" value="{LANG_EDIT_DELETE_DB_BACKUP_ENTRIES}" onClick="return confirm('{LANG_CONFIRM_DELETE_BACKUP}'); submit();">
		</td>
	</tr>
	<tr>
		<td class="settings_l_backup">
		<span><b>{LANG_EDIT_DATABASE_BACKUP_BANLIST_IPS}</b></span><br>
		<span>{LANG_EDIT_EXPL_DATABASE_BACKUP_BANLIST_IPS}</span>
		</td>
		<td class="settings_r_backup">
		<select class="backups" name="database_backup_banlist_ips" size="5">
		{EDIT_OPTION_DATABASE_BACKUPS_BANLIST_IPS}
		</select>
		<br><br>
		<span>{LANG_EDIT_BACKUP}</span>
		<input type="submit" class="button" name="edit_create_db_backup_banlist_ips" value="{LANG_EDIT_CREATE_DB_BACKUP_BANLIST_IPS}">
		<input type="submit" class="button" name="edit_restore_db_backup_banlist_ips" value="{LANG_EDIT_RESTORE_DB_BACKUP_BANLIST_IPS}" onClick="return confirm('{LANG_CONFIRM_RESTORE_BACKUP}'); submit();">
		<input type="submit" class="button" name="edit_delete_db_backup_banlist_ips" value="{LANG_EDIT_DELETE_DB_BACKUP_BANLIST_IPS}" onClick="return confirm('{LANG_CONFIRM_DELETE_BACKUP}'); submit();">
		</td>
	</tr>
	<tr>
		<td class="settings_l_backup">
		<span><b>{LANG_EDIT_DATABASE_BACKUP_BANLIST_EMAILS}</b></span><br>
		<span>{LANG_EDIT_EXPL_DATABASE_BACKUP_BANLIST_EMAILS}</span>
		</td>
		<td class="settings_r_backup">
		<select class="backups" name="database_backup_banlist_emails" size="5">
		{EDIT_OPTION_DATABASE_BACKUPS_BANLIST_EMAILS}
		</select>
		<br><br>
		<span>{LANG_EDIT_BACKUP}</span>
		<input type="submit" class="button" name="edit_create_db_backup_banlist_emails" value="{LANG_EDIT_CREATE_DB_BACKUP_BANLIST_EMAILS}">
		<input type="submit" class="button" name="edit_restore_db_backup_banlist_emails" value="{LANG_EDIT_RESTORE_DB_BACKUP_BANLIST_EMAILS}" onClick="return confirm('{LANG_CONFIRM_RESTORE_BACKUP}'); submit();">
		<input type="submit" class="button" name="edit_delete_db_backup_banlist_emails" value="{LANG_EDIT_DELETE_DB_BACKUP_BANLIST_EMAILS}" onClick="return confirm('{LANG_CONFIRM_DELETE_BACKUP}'); submit();">
		</td>
	</tr>
	<tr>
		<td class="settings_l_backup">
		<span><b>{LANG_EDIT_DATABASE_BACKUP_BANLIST_DOMAINS}</b></span><br>
		<span>{LANG_EDIT_EXPL_DATABASE_BACKUP_BANLIST_DOMAINS}</span>
		</td>
		<td class="settings_r_backup">
		<select class="backups" name="database_backup_banlist_domains" size="5">
		{EDIT_OPTION_DATABASE_BACKUPS_BANLIST_DOMAINS}
		</select>
		<br><br>
		<span>{LANG_EDIT_BACKUP}</span>
		<input type="submit" class="button" name="edit_create_db_backup_banlist_domains" value="{LANG_EDIT_CREATE_DB_BACKUP_BANLIST_DOMAINS}">
		<input type="submit" class="button" name="edit_restore_db_backup_banlist_domains" value="{LANG_EDIT_RESTORE_DB_BACKUP_BANLIST_DOMAINS}" onClick="return confirm('{LANG_CONFIRM_RESTORE_BACKUP}'); submit();">
		<input type="submit" class="button" name="edit_delete_db_backup_banlist_domains" value="{LANG_EDIT_DELETE_DB_BACKUP_BANLIST_DOMAINS}" onClick="return confirm('{LANG_CONFIRM_DELETE_BACKUP}'); submit();">
		</td>
	</tr>
</table>
<!-- <br>
<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}"> -->
</center>
</form>