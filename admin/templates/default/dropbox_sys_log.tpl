<form action="admin.php?action={ACTION}&amp;option=dropbox{PAGE_NR}{SID}" method="post">
<table class="dropbox" summary="dropbox" cellspacing="0" cellpadding="0">
	<tr>
		<td class="dropbox_l">
		<select class="option_very_long" name="dropbox" size="1">
			<option value="0">{LANG_DO_NOTHING}</option>
			{OPTION_SHOW_EVERYTHING}
			{OPTION_SHOW_ADMIN_ACTIONS}
			{OPTION_SHOW_BLOCK_ACTIONS}
			{OPTION_SHOW_LOGIN_FAILS}
			{OPTION_SHOW_SENT_EMAILS}
			{OPTION_DELETE_ALL_ENTRIES}
		</select>
		</td>
		<td class="dropbox_r">
		<input type="submit" class="button" name="{LANG_GO" value="{LANG_GO}">
		</td>
	</tr>
</table>
</form>
<br>