<form action="{URL_SETTINGS}" method="post">
<input type="hidden" name="sent_settings" value="1">
<center>
<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}">
<br>
<br>
<table class="settings" summary="settings_usage" cellspacing="0" cellpadding="2">
	<tr>
		<td colspan="2" class="settings_overall">
		<center><span class="edit_caption">{LANG_EDIT_CAPTION_AUS}</span></center> <!-- AUS = Anonymous Usage Statistics -->
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_AUS_ALLOW}</b></span><br>
		<span>{LANG_EDIT_EXPL_AUS_ALLOW}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="aus_allow" size="1">
			<option{SELECTED_AUS_ALLOW_0} value="0">{LANG_NO}</option>
			<option{SELECTED_AUS_ALLOW_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_AUS_PING_ADDRESS}</b></span><br>
		<span>{LANG_EDIT_EXPL_AUS_PING_ADDRESS}</span>
		</td>
		<td class="settings_r">
		<input class="textbox" name="aus_ping_address" maxlength="255" size="12" value="{EDIT_AUS_PING_ADDRESS}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_AUS_INSTALL_ID}</b></span><br>
		<span>{LANG_EDIT_EXPL_AUS_INSTALL_ID}</span>
		</td>
		<td class="settings_r">
		<input class="textbox" name="aus_install_id" maxlength="255" size="12" value="{EDIT_AUS_INSTALL_ID}">
		</td>
	</tr>
</table>
<br>
<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}">
</center>
</form>