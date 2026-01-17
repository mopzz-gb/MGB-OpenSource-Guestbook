<form action="{URL_SETTINGS}" method="post">
<input type="hidden" name="sent_settings" value="1">
<center>
<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}">
<br>
<br>
<table class="settings" summary="settings" cellspacing="0" cellpadding="2">
	<tr>
		<td colspan="2" class="settings_overall">
		<center><span class="edit_caption">{LANG_EDIT_CAPTION_LOOK}</span></center>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_TEMPLATE_PATH}</b></span><br>
		<span>{LANG_EDIT_EXPL_TEMPLATE_PATH}</span>
		</td>
		<td class="settings_r">
		<select class="option_long" name="template_path" size="1">{EDIT_OPTION_TEMPLATE_PATH}</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_TEMPLATE_STYLE_PATH}</b></span><br>
		<span>{LANG_EDIT_EXPL_TEMPLATE_STYLE_PATH}</span>
		</td>
		<td class="settings_r">
		<select class="option_long" name="template_style_path" size="1">{EDIT_OPTION_TEMPLATE_STYLE_PATH}</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_ICONSET_PATH}</b></span><br>
		<span>{LANG_EDIT_EXPL_ICONSET_PATH}</span>
		</td>
		<td class="settings_r">
		<select class="option_long" name="iconset_path" size="1">{EDIT_OPTION_ICONSET_PATH}</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_LANGUAGE_PATH}</b></span><br>
		<span>{LANG_EDIT_EXPL_LANGUAGE_PATH}</span>
		</td>
		<td class="settings_r">
		<select class="option_long" name="language_path" size="1">{EDIT_OPTION_LANGUAGE_PATH}</select>
		<span>
		<br>
		<br>
			<b>&nbsp;{LANG_EDIT_EXPL_LANGUAGE_AUTHOR}</b>&nbsp;{LANG_EDIT_AUTHOR_NAME}
		<br>
			<b>&nbsp;{LANG_EDIT_EXPL_LANGUAGE_VERSION}</b>&nbsp;{LANG_EDIT_VERSION}
		<br>
			<b>&nbsp;{LANG_EDIT_EXPL_LANGUAGE_CHARSET}</b>&nbsp;{LANG_EDIT_CHARSET}</span>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_BADWORDS}</b></span><br>
		<span>{LANG_EDIT_EXPL_BADWORDS}</span>
		</td>
		<td class="settings_r">
		<input class="textbox" name="badwords" maxlength="1000" size="30" value="{EDIT_BADWORDS}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_USER_NOTIFICATION}</b></span><br>
		<span>{LANG_EDIT_EXPL_USER_NOTIFICATION}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="user_notification" size="1">
			<option{SELECTED_USER_NOTIFICATION_0} value="0">{LANG_NO}</option>
			<option{SELECTED_USER_NOTIFICATION_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_USER_SHOW_EMAIL}</b></span><br>
		<span>{LANG_EDIT_EXPL_USER_SHOW_EMAIL}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="user_show_email" size="1">
			<option{SELECTED_USER_SHOW_EMAIL_0} value="0">{LANG_NO}</option>
			<option{SELECTED_USER_SHOW_EMAIL_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_ENTRIES_PER_PAGE}</b></span><br>
		<span>{LANG_EDIT_EXPL_ENTRIES_PER_PAGE}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr" name="entries_per_page" maxlength="2" size="2" value="{EDIT_ENTRIES_PER_PAGE}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_ENTRIES_ORDER}</b></span><br>
		<span>{LANG_EDIT_EXPL_ENTRIES_ORDER}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="entries_order" size="1">
			<option{SELECTED_ENTRIES_ORDER_0} value="ID">{LANG_ID}</option>
			<option{SELECTED_ENTRIES_ORDER_1} value="name">{LANG_NAME}</option>
			<option{SELECTED_ENTRIES_ORDER_2} value="city">{LANG_CITY}</option>
			<option{SELECTED_ENTRIES_ORDER_3} value="email">{LANG_EMAIL}</option>
			<option{SELECTED_ENTRIES_ORDER_4} value="icq">{LANG_ICQ}</option>
			<option{SELECTED_ENTRIES_ORDER_5} value="aim">{LANG_AIM}</option>
			<option{SELECTED_ENTRIES_ORDER_6} value="hp">{LANG_HP}</option>
			<option{SELECTED_ENTRIES_ORDER_7} value="message">{LANG_MESSAGE}</option>
			<option{SELECTED_ENTRIES_ORDER_8} value="comment">{LANG_COMMENT}</option>
			<option{SELECTED_ENTRIES_ORDER_9} value="timestamp">{LANG_TIMESTAMP}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_ENTRIES_ORDER_ASC_DESC}</b></span><br>
		<span>{LANG_EDIT_EXPL_ENTRIES_ORDER_ASC_DESC}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="entries_order_asc_desc" size="1">
			<option{SELECTED_ENTRIES_ORDER_ASC_DESC_0} value="ASC">{LANG_ASC}</option>
			<option{SELECTED_ENTRIES_ORDER_ASC_DESC_1} value="DESC">{LANG_DESC}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_ENTRIES_NUMBERING}</b></span><br>
		<span>{LANG_EDIT_EXPL_ENTRIES_NUMBERING}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="entries_numbering" size="1">
			<option{SELECTED_ENTRIES_NUMBERING_0} value="0">{LANG_ASC}</option>
			<option{SELECTED_ENTRIES_NUMBERING_1} value="1">{LANG_DESC}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_WORDWRAP}</b></span><br>
		<span>{LANG_EDIT_EXPL_WORDWRAP}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr" name="wordwrap" maxlength="3" size="3" value="{EDIT_WORDWRAP}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_DATEFORM}</b></span><br>
		<span>{LANG_EDIT_EXPL_DATEFORM}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr" name="dateform" maxlength="255" size="5" value="{EDIT_DATEFORM}">
		</td>
	</tr>
</table>
<br>
<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}">
</center>
</form>