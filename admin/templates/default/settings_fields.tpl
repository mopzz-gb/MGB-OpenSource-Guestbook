<form action="{URL_SETTINGS}" method="post">
<input type="hidden" name="sent_settings" value="1">
<center>
<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}">
<br>
<br>
<table class="settings" summary="settings" cellspacing="0" cellpadding="2">
	<tr>
		<td colspan="2" class="settings_overall">
		<center><span class="edit_caption">{LANG_EDIT_CAPTION_FIELDS}</span></center>
		</td>
	</tr>
	<tr>
		<td class="settings_l" width="100%">
		<span>{LANG_CITY}</span>
		</td>
		<td class="settings_r">
			<input type="checkbox" name="show_field_city" value="show_field_city"{CHECKED_CITY}>
		</td>
	</tr>
	<tr>
		<td class="settings_l" width="100%">
		<span>{LANG_ICQ}</span>
		</td>
		<td class="settings_r">
			<input type="checkbox" name="show_field_icq" value="show_field_icq"{CHECKED_ICQ}>
		</td>
	</tr>
	<tr>
		<td class="settings_l" width="100%">
		<span>{LANG_AIM}</span>
		</td>
		<td class="settings_r">
			<input type="checkbox" name="show_field_aim" value="show_field_aim"{CHECKED_AIM}>
		</td>
	</tr>
	<tr>
		<td class="settings_l" width="100%">
		<span>{LANG_FB}</span>
		</td>
		<td class="settings_r">
			<input type="checkbox" name="show_field_fb" value="show_field_fb"{CHECKED_FB}>
		</td>
	</tr>
	<tr>
		<td class="settings_l" width="100%">
		<span>{LANG_TWITTER}</span>
		</td>
		<td class="settings_r">
			<input type="checkbox" name="show_field_twitter" value="show_field_twitter"{CHECKED_TWITTER}>
		</td>
	</tr>
		<tr>
		<td class="settings_l" width="100%">
		<span>{LANG_HP}</span>
		</td>
		<td class="settings_r">
			<input type="checkbox" name="show_field_hp" value="show_field_hp"{CHECKED_HP}>
		</td>
	</tr>
</table>
<br>
<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}">
</center>
</form>
