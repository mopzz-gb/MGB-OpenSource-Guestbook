<form action="{URL_SETTINGS}" method="post">
<input type="hidden" name="sent_settings" value="1">
<center>
<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}">
<br>
<br>
<table class="settings" summary="settings_smilies" cellspacing="0" cellpadding="2">
	<tr>
		<td colspan="2" class="settings_overall">
		<center><span class="edit_caption">{LANG_EDIT_CAPTION_SMILIES}</span></center>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_SMILEYS}</b></span><br>
		<span>{LANG_EDIT_EXPL_SMILEYS}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="smileys" size="1">
			<option{SELECTED_SMILEYS_0} value="0">{LANG_NO}</option>
			<option{SELECTED_SMILEYS_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_SMILEYS_BREAK}</b></span><br>
		<span>{LANG_EDIT_EXPL_SMILEYS_BREAK}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr" name="smileys_break" maxlength="2" size="2" value="{EDIT_SMILEYS_BREAK}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_SMILEYS_ORDER}</b></span><br>
		<span>{LANG_EDIT_EXPL_SMILEYS_ORDER}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="smileys_order" size="1">
			<option{SELECTED_SMILEYS_ORDER_0} value="ASC">{LANG_ASC}</option>
			<option{SELECTED_SMILEYS_ORDER_1} value="DESC">{LANG_DESC}</option>
		</select>
		</td>
	</tr>
</table>
<br>
<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}">
</center>
</form>