<form action="{FORM_ACTION}" method="post" id="editentry">
<input type="hidden" name="sent_edit" value="1">
<table summary="edit" class="edit" cellspacing="0" cellpadding="3">
	<tr>
		<td class="edit_l" align="left">
		<span>{LANG_ID}</span>
		</td>
		<td class="edit_r">
		<span>{ENTRY_ID}</span>
		</td>
	</tr>
	<tr>
		<td class="edit_l" align="left">
		<span>{LANG_IP}</span>
		</td>
		<td class="edit_r">
		<span>{ENTRY_IP}</span>
		</td>
	</tr>
	<tr>
		<td class="edit_l" align="left">
		<span>{LANG_DATE}</span>
		</td>
		<td class="edit_r">
		<input class="textbox" type="text" name="date" size="30" value="{ENTRY_DATE}">
		</td>
	</tr>
	<tr>
		<td class="edit_l" align="left">
		<span>{LANG_TIMESTAMP}</span>
		</td>
		<td class="edit_r">
		<input class="textbox" type="text" name="time" size="30" value="{ENTRY_TIME}">
		</td>
	</tr>	
	<tr>
		<td class="edit_l" align="left">
		<span>{LANG_NAME}</span>
		</td>
		<td class="edit_r">
		<input class="textbox" type="text" name="name" size="30" value="{ENTRY_NAME}">
		</td>
	</tr>	
	<tr>
		<td class="edit_l" align="left">
		<span>{LANG_CITY}</span>
		</td>
		<td class="edit_r">
		<input class="textbox" type="text" name="city" size="30" value="{ENTRY_CITY}">
		</td>
	</tr>
	<tr>
		<td class="edit_l" align="left">
		<span>{LANG_EMAIL}</span>
		</td>
		<td class="edit_r">
		<input class="textbox" type="text" name="email" size="30" value="{ENTRY_EMAIL}">
		</td>
	</tr>
	<tr>
		<td class="edit_l" align="left">
		<span>{LANG_MASTODON}</span>
		</td>
		<td class="edit_r">
		<input class="textbox" type="text" name="social_mastodon" size="30" value="{ENTRY_MASTODON}">
		</td>
	</tr>
	<tr>
		<td class="edit_l" align="left">
		<span>{LANG_BLUESKY}</span>
		</td>
		<td class="edit_r">
		<input class="textbox" type="text" name="social_bluesky" size="30" value="{ENTRY_BLUESKY}">
		</td>
	</tr>
	<!--
	<tr>
		<td class="edit_l" align="left">
		<span>{LANG_W}</span>
		</td>
		<td class="edit_r">
		<input class="textbox" type="text" name="social_w" size="30" value="{ENTRY_W}">
		</td>
	</tr>
	<tr>
		<td class="edit_l" align="left">
		<span>{LANG_EU_VOICE}</span>
		</td>
		<td class="edit_r">
		<input class="textbox" type="text" name="social_eu_voice" size="30" value="{ENTRY_EU_VOICE}">
		</td>
	</tr>
	<tr>
		<td class="edit_l" align="left">
		<span>{LANG_EU_VIDEO}</span>
		</td>
		<td class="edit_r">
		<input class="textbox" type="text" name="social_eu_video" size="30" value="{ENTRY_EU_VIDEO}">
		</td>
	</tr>
	<tr>
		<td class="edit_l" align="left">
		<span>{LANG_MONNETT}</span>
		</td>
		<td class="edit_r">
		<input class="textbox" type="text" name="social_monnett" size="30" value="{ENTRY_MONNETT}">
		</td>
	</tr>
	-->
	<tr>
		<td class="edit_l" align="left">
		<span>{LANG_HP}</span>
		</td>
		<td class="edit_r">
		<input class="textbox" type="text" name="hp" size="30" value="{ENTRY_HP}">
		</td>
	</tr>
	<tr>
		<td class="edit_l" align="left">
		<span>{LANG_MESSAGE}</span>
		</td>
		<td class="edit_r">
		<textarea name="message" rows="5" cols="25">{ENTRY_MESSAGE}</textarea>
		</td>
	</tr>
	<tr>
		<td class="edit_l" align="left">
		<span>{LANG_USER_NOTIFICATION}</span>
		</td>
		<td class="edit_r">
		<input type="checkbox" name="user_notification" value="1"{CHECKED_NOTIFY}>
		</td>
	</tr>
	<tr>
		<td class="edit_l" align="left">
		<span>{LANG_USER_SHOW_EMAIL}</span>
		</td>
		<td class="edit_r">
		<input type="checkbox" name="user_show_email" value="1"{CHECKED_SHOW_EMAIL}>
		</td>
	</tr>
	<tr>
		<td class="edit_l" align="left">
		<span>{LANG_COMMENT}</span>
		</td>
		<td class="edit_r">
		<textarea name="comment" rows="5" cols="25">{ENTRY_COMMENT}</textarea>
		</td>
	</tr>	
</table>
<div class="gap">
<input class="button" type="submit" value="{LANG_SAVE}">
</div>
</form>