<form action="{URL_SETTINGS}" method="post">
<input type="hidden" name="sent_settings" value="1">
<center>
<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}">
<br>
<br>
<table class="settings" summary="settings_bbcode" cellspacing="0" cellpadding="2">
	<tr>
		<td colspan="2" class="settings_overall">
		<center><span class="edit_caption">{LANG_EDIT_CAPTION_BBCODES}</span></center>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_BBCODE}</b></span><br>
		<span>{LANG_EDIT_EXPL_BBCODE}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="bbcode" size="1">
			<option{SELECTED_BBCODE_0} value="0">{LANG_NO}</option>
			<option{SELECTED_BBCODE_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_ALLOW_IMG_TAG}</b></span><br>
		<span>{LANG_EDIT_EXPL_ALLOW_IMG_TAG}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="allow_img_tag" size="1">
			<option{SELECTED_ALLOW_IMG_TAG_0} value="0">{LANG_NO}</option>
			<option{SELECTED_ALLOW_IMG_TAG_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_MAX_IMG_WIDTH}</b></span><br>
		<span>{LANG_EDIT_EXPL_MAX_IMG_WIDTH}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr" name="max_img_width" maxlength="3" size="3" value="{EDIT_MAX_IMG_WIDTH}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_MAX_IMG_HEIGHT}</b></span><br>
		<span>{LANG_EDIT_EXPL_MAX_IMG_HEIGHT}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr" name="max_img_height" maxlength="3" size="3" value="{EDIT_MAX_IMG_HEIGHT}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_CENTER_IMG}</b></span><br>
		<span>{LANG_EDIT_EXPL_CENTER_IMG}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="center_img" size="1">
			<option{SELECTED_CENTER_IMG_0} value="0">{LANG_NO}</option>
			<option{SELECTED_CENTER_IMG_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_ALLOW_FLASH_TAG}</b></span><br>
		<span>{LANG_EDIT_EXPL_ALLOW_FLASH_TAG}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="allow_flash_tag" size="1">
			<option{SELECTED_ALLOW_FLASH_TAG_0} value="0">{LANG_NO}</option>
			<option{SELECTED_ALLOW_FLASH_TAG_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_MAX_FLASH_WIDTH}</b></span><br>
		<span>{LANG_EDIT_EXPL_MAX_FLASH_WIDTH}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr" name="max_flash_width" maxlength="3" size="3" value="{EDIT_MAX_FLASH_WIDTH}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_MAX_FLASH_HEIGHT}</b></span><br>
		<span>{LANG_EDIT_EXPL_MAX_FLASH_HEIGHT}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr" name="max_flash_height" maxlength="3" size="3" value="{EDIT_MAX_FLASH_HEIGHT}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_CENTER_FLASH}</b></span><br>
		<span>{LANG_EDIT_EXPL_CENTER_FLASH}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="center_flash" size="1">
			<option{SELECTED_CENTER_FLASH_0} value="0">{LANG_NO}</option>
			<option{SELECTED_CENTER_FLASH_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
</table>
<br>
<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}">
</center>
</form>