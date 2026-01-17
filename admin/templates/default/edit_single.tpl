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
		<span>{LANG_ICQ}</span>
		</td>
		<td class="edit_r">
		<input class="textbox" type="text" name="icq" size="30" value="{ENTRY_ICQ}">
		</td>
	</tr>
	<tr>
		<td class="edit_l" align="left">
		<span>{LANG_AIM}</span>
		</td>
		<td class="edit_r">
		<input class="textbox" type="text" name="aim" size="30" value="{ENTRY_AIM}">
		</td>
	</tr>
	<tr>
		<td class="edit_l" align="left">
		<span>{LANG_MSN}</span>
		</td>
		<td class="edit_r">
		<input class="textbox" type="text" name="msn" size="30" value="{ENTRY_MSN}">
		</td>
	</tr>
	<tr>
		<td class="edit_l" align="left">
		<span>{LANG_FB}</span>
		</td>
		<td class="edit_r">
		<input class="textbox" type="text" name="fb" size="30" value="{ENTRY_FB}">
		</td>
	</tr>
	<tr>
		<td class="edit_l" align="left">
		<span>{LANG_TWITTER}</span>
		</td>
		<td class="edit_r">
		<input class="textbox" type="text" name="twitter" size="30" value="{ENTRY_TWITTER}">
		</td>
	</tr>
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