<form action="{URL_SETTINGS}" method="post">
<input type="hidden" name="sent_settings" value="1">
<center>
<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}">
<br>
<br>
<table class="settings" summary="settings_telemetry" cellspacing="0" cellpadding="2">
	<tr>
		<td colspan="2" class="settings_overall">
		<center><span class="edit_caption">{LANG_EDIT_CAPTION_TELEMETRY}</span></center> 
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_TELEMETRY}</b></span><br>
		<span>{LANG_EDIT_EXPL_TELEMETRY}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="telemetry" size="1">
			<option{SELECTED_TELEMETRY_0} value="0">{LANG_NO}</option>
			<option{SELECTED_TELEMETRY_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_TELEMETRY_PING}</b></span><br>
		<span>{LANG_EDIT_EXPL_TELEMETRY_PING}</span>
		</td>
		<td class="settings_r">
		<input class="textbox" name="telemetry_ping" maxlength="255" size="12" value="{EDIT_TELEMETRY_PING}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_TELEMETRY_INSTALL_ID}</b></span><br>
		<span>{LANG_EDIT_EXPL_TELEMETRY_INSTALL_ID}</span>
		</td>
		<td class="settings_r">
		<textarea name="telemetry_install_id" rows="3" cols="10" disabled>{EDIT_TELEMETRY_INSTALL_ID}</textarea>		
		</td>
	</tr>
</table>
<br>
<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}">
</center>
</form>