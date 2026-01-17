<form action="{URL_SETTINGS}" method="post">
<input type="hidden" name="sent_settings" value="1">
<center>
<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}">
<br>
<br>
<table class="settings" summary="settings" cellspacing="0" cellpadding="2">
	<tr>
		<td colspan="2" class="settings_overall">
		<center><span class="edit_caption">{LANG_EDIT_CAPTION_GRAVATARS}</span></center>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_GRAVATAR_SHOW}</b></span><br>
		<span>{LANG_EDIT_EXPL_GRAVATAR_SHOW}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="gravatar_show" size="1">
			<option{SELECTED_GRAVATAR_SHOW_0} value="0">{LANG_NO}</option>
			<option{SELECTED_GRAVATAR_SHOW_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_GRAVATAR_RATING}</b></span><br>
		<span>{LANG_EDIT_EXPL_GRAVATAR_RATING}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="gravatar_rating" size="1">
			<option{SELECTED_GRAVATAR_RATING_0} value="0">G</option>
			<option{SELECTED_GRAVATAR_RATING_1} value="1">PG</option>
			<option{SELECTED_GRAVATAR_RATING_2} value="2">R</option>
			<option{SELECTED_GRAVATAR_RATING_3} value="3">X</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_GRAVATAR_TYPE}</b></span><br>
		<span>{LANG_EDIT_EXPL_GRAVATAR_TYPE}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="gravatar_type" size="1">
			<!-- <option{SELECTED_GRAVATAR_TYPE_0} value="0">{LANG_GRAVATAR_TYPE_0}</option> -->
			<option{SELECTED_GRAVATAR_TYPE_1} value="1">{LANG_GRAVATAR_TYPE_1}</option>
			<option{SELECTED_GRAVATAR_TYPE_2} value="2">{LANG_GRAVATAR_TYPE_2}</option>
			<option{SELECTED_GRAVATAR_TYPE_3} value="3">{LANG_GRAVATAR_TYPE_3}</option>
			<option{SELECTED_GRAVATAR_TYPE_4} value="4">{LANG_GRAVATAR_TYPE_4}</option>
			<option{SELECTED_GRAVATAR_TYPE_5} value="5">{LANG_GRAVATAR_TYPE_5}</option>
			<option{SELECTED_GRAVATAR_TYPE_6} value="6">{LANG_GRAVATAR_TYPE_6}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_GRAVATAR_SIZE}</b></span><br>
		<span>{LANG_EDIT_EXPL_GRAVATAR_SIZE}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr" name="gravatar_size" maxlength="4" size="4" value="{EDIT_GRAVATAR_SIZE}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_GRAVATAR_POSITION}</b></span><br>
		<span>{LANG_EDIT_EXPL_GRAVATAR_POSITION}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="gravatar_position" size="1">
			<option{SELECTED_GRAVATAR_POSITION_0} value="0">{LANG_GRAVATAR_POSITION_LEFT}</option>
			<option{SELECTED_GRAVATAR_POSITION_1} value="1">{LANG_GRAVATAR_POSITION_RIGHT}</option>
		</select>
		</td>
	</tr>
</table>
<br>
<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}">
</center>
</form>