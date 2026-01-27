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
		<span>{LANG_HP}</span>
		</td>
		<td class="settings_r">
			<input type="checkbox" name="show_field_hp" value="show_field_hp"{CHECKED_HP}>
		</td>
	</tr>
	<tr>
		<td class="settings_l" width="100%">
		<span>{LANG_MASTODON}</span>
		</td>
		<td class="settings_r">
			<input type="checkbox" name="show_field_mastodon" value="show_field_mastodon"{CHECKED_MASTODON}>
		</td>
	</tr>
	<tr>
		<td class="settings_l" width="100%">
		<span>{LANG_BLUESKY}</span>
		</td>
		<td class="settings_r">
			<input type="checkbox" name="show_field_bluesky" value="show_field_bluesky"{CHECKED_BLUESKY}>
		</td>
	</tr>
	<tr>
		<td class="settings_l" width="100%">
		<span>{LANG_W}</span>
		</td>
		<td class="settings_r">
			<input type="checkbox" name="show_field_w" value="show_field_w"{CHECKED_W} disabled>
		</td>
	</tr>
	<tr>
		<td class="settings_l" width="100%">
		<span>{LANG_EU_VOICE}</span>
		</td>
		<td class="settings_r">
			<input type="checkbox" name="show_field_eu_voice" value="show_field_eu_voice"{CHECKED_EU_VOICE} disabled>
		</td>
	</tr>
	<tr>
		<td class="settings_l" width="100%">
		<span>{LANG_EU_VIDEO}</span>
		</td>
		<td class="settings_r">
			<input type="checkbox" name="show_field_eu_video" value="show_field_eu_video"{CHECKED_EU_VIDEO} disabled>
		</td>
	</tr>
	<tr>
		<td class="settings_l" width="100%">
		<span>{LANG_MONNETT}</span>
		</td>
		<td class="settings_r">
			<input type="checkbox" name="show_field_monnett" value="show_field_monnett"{CHECKED_MONNETT} disabled>
		</td>
	</tr>
</table>
<br>
<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}">
</center>
</form>
