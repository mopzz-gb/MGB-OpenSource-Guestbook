<form action="admin.php?action=spam&amp;option=dropbox{PAGE_NR}{SID}" method="post">
<table class="dropbox" summary="dropbox" cellspacing="0" cellpadding="0">
	<tr>
		<td class="dropbox_l">
		<select class="option_very_long" name="dropbox" size="1">
			<option value="0">{LANG_DO_NOTHING}</option>
			{SEPARATOR}
			<option value="1">{LANG_DELETE_WHOLE_SPAM}</option>
			<option value="2">{LANG_MARK_ALL_NO_SPAM_DEACTIVATE}</option>
			<option value="3">{LANG_MARK_ALL_NO_SPAM_ACTIVATE}</option>
			{SEPARATOR}
			{OPTION_SNEAK_EVERYTHING}
			{SEPARATOR}
			{OPTION_PUT_ALL_IPS_ON_BANLIST}
			{OPTION_PUT_ALL_EMAILS_ON_BANLIST}
			{OPTION_PUT_ALL_DOMAINS_ON_BANLIST}
		</select>
		</td>
		<td class="dropbox_r">
		<input type="submit" class="button" name="{LANG_GO" value="{LANG_GO}">
		</td>
	</tr>
</table>
</form>
<br>