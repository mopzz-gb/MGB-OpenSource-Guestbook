<form action="{URL_BLOCKLISTS}" method="post" name="blocklists">
<table summary="blocklists" class="blocklists" cellspacing="0" cellpadding="3">
	<tr>
		<td colspan="2"><span>{LANG_BLOCKLISTS_DESCR}</span></td>
	</tr>
	<tr>
		<td colspan="2"><span>&nbsp;</span></td>
	</tr>
	<tr>
		<td colspan="2">
		<input type="hidden" name="blocklists_sent" value="1">
		<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}" onClick="return confirm('{LANG_BLOCKLISTS_CONFIRM_SAVE}'); submit();"></td>
	</tr>
	<tr>
		<td class="dropbox_l"><input type="checkbox" name="checkbox_mails" value="1"{BLOCKLIST_MAILS_CHECKED}>&nbsp;<span>{LANG_BLOCKLISTS_MAILS_CHECK}</span></td>
		<td class="dropbox_r"><span>{HOW_MUCH_ENTRIES_MAILS}</span></td>
	</tr>
	<tr>
		<td colspan="2"><textarea class="blocklist_textarea" name="textarea_mails">{ENTRIES_MAILS}</textarea></td>
	</tr>
	<tr>
		<td class="dropbox_l"><input type="checkbox" name="checkbox_domains" value="2"{BLOCKLIST_DOMAINS_CHECKED}>&nbsp;<span>{LANG_BLOCKLISTS_DOMAINS_CHECK}</span></td>
		<td class="dropbox_r"><span>{HOW_MUCH_ENTRIES_DOMAINS}</span></td>
	</tr>
	<tr>
		<td colspan="2"><textarea class="blocklist_textarea" name="textarea_domains">{ENTRIES_DOMAINS}</textarea></td>
	</tr>
	<tr>
		<td class="dropbox_l"><input type="checkbox" name="checkbox_ips" value="3"{BLOCKLIST_IPS_CHECKED}>&nbsp;<span>{LANG_BLOCKLISTS_IPS_CHECK}</span></td>
		<td class="dropbox_r"><span>{HOW_MUCH_ENTRIES_IPS}</span></td>
	</tr>
	<tr>
		<td colspan="2"><textarea class="blocklist_textarea" name="textarea_ips">{ENTRIES_IPS}</textarea></td>
	</tr>
	<tr>
		<td colspan="2"><span>&nbsp;</span></td>
	</tr>
	<tr>
		<td class="dropbox_l"><input type="checkbox" name="checkbox_log" value="4"{BLOCKLIST_LOG_CHECKED}>&nbsp;<span>{LANG_BLOCKLISTS_LOG}</span></td>
		<td class="dropbox_r"><input type="submit" class="button" name="{LANG_BLOCKLISTS_DEL_LOG}" value="{LANG_BLOCKLISTS_DEL_LOG}" onClick="return confirm('{LANG_BLOCKLISTS_CONFIRM_DEL_LOG}'); submit();"></td>
	</tr>
</table>
</form>
{BLOCKLISTS_LOG}