<form action="{URL_SETTINGS}" method="post">
<input type="hidden" name="sent_settings" value="1">
<center>
<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}">
<br>
<br>
<table class="settings" summary="settings" cellspacing="0" cellpadding="2">
	<tr>
		<td colspan="2" class="settings_overall">
		<center><span class="edit_caption">{LANG_EDIT_CAPTION_GENERAL}</span></center>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_TITLE}</b></span><br>
		<span>{LANG_EDIT_EXPL_TITLE}</span>
		</td>
		<td class="settings_r">
		<input class="textbox" name="title" maxlength="100" size="30" value="{EDIT_TITLE}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_H_AUTHOR}</b></span><br>
		<span>{LANG_EDIT_EXPL_H_AUTHOR}</span>
		</td>
		<td class="settings_r">
		<input class="textbox" name="h_author" maxlength="100" size="30" value="{EDIT_H_AUTHOR}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_H_DOMAIN}</b></span><br>
		<span>{LANG_EDIT_EXPL_H_DOMAIN}</span>
		</td>
		<td class="settings_r">
		<input class="textbox" name="h_domain" maxlength="100" size="30" value="{EDIT_H_DOMAIN}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_GB_PATH}</b></span><br>
		<span>{LANG_EDIT_EXPL_GB_PATH}</span>
		</td>
		<td class="settings_r">
		<input class="textbox" name="gb_path" maxlength="100" size="30" value="{EDIT_GB_PATH}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_H_KEYWORDS}</b></span><br>
		<span>{LANG_EDIT_EXPL_H_KEYWORDS}</span>
		</td>
		<td class="settings_r">
		<input class="textbox" name="h_keywords" maxlength="255" size="30" value="{EDIT_H_KEYWORDS}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_H_DESCRIPTION}</b></span><br>
		<span>{LANG_EDIT_EXPL_H_DESCRIPTION}</span>
		</td>
		<td class="settings_r">
		<input class="textbox" name="h_description" maxlength="255" size="30" value="{EDIT_H_DESCRIPTION}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_TIMEZONE}</b></span><br>
		<span>{LANG_EDIT_EXPL_TIMEZONE}</span>
		</td>
		<td class="settings_r">
		<input class="textbox" name="timezone" maxlength="255" size="30" value="{EDIT_TIMEZONE}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_ADMIN_NAME}</b></span><br>
		<span>{LANG_EDIT_EXPL_ADMIN_NAME}</span>
		</td>
		<td class="settings_r">
		<input class="textbox" name="admin_name" maxlength="100" size="30" value="{EDIT_ADMIN_NAME}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_ADMIN_EMAIL}</b></span><br>
		<span>{LANG_EDIT_EXPL_ADMIN_EMAIL}</span>
		</td>
		<td class="settings_r">
		<input class="textbox" name="admin_email" maxlength="100" size="30" value="{EDIT_ADMIN_EMAIL}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_ADMIN_GBEMAIL}</b></span><br>
		<span>{LANG_EDIT_EXPL_ADMIN_GBEMAIL}</span>
		</td>
		<td class="settings_r">
		<input class="textbox" name="admin_gbemail" maxlength="100" size="30" value="{EDIT_ADMIN_GBEMAIL}">
		</td>
	</tr>
</table>
<br>
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
			<b>&nbsp;{LANG_EDIT_EXPL_LANGUAGE_AUTHOR}</b>&nbsp;{LANG_EDIT_AUTHOR}
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
			<option{SELECTED_ENTRIES_ORDER_0} value="ID">{LANG_ENTRY_ID}</option>
			<option{SELECTED_ENTRIES_ORDER_1} value="name">{LANG_ENTRY_NAME}</option>
			<option{SELECTED_ENTRIES_ORDER_2} value="city">{LANG_ENTRY_CITY}</option>
			<option{SELECTED_ENTRIES_ORDER_3} value="email">{LANG_ENTRY_EMAIL}</option>
			<option{SELECTED_ENTRIES_ORDER_4} value="icq">{LANG_ENTRY_ICQ}</option>
			<option{SELECTED_ENTRIES_ORDER_5} value="aim">{LANG_ENTRY_AIM}</option>
			<option{SELECTED_ENTRIES_ORDER_6} value="msn">{LANG_ENTRY_MSN}</option>
			<option{SELECTED_ENTRIES_ORDER_7} value="hp">{LANG_ENTRY_HP}</option>
			<option{SELECTED_ENTRIES_ORDER_8} value="message">{LANG_ENTRY_MESSAGE}</option>
			<option{SELECTED_ENTRIES_ORDER_9} value="comment">{LANG_ENTRY_COMMENT}</option>
			<option{SELECTED_ENTRIES_ORDER_10} value="timestamp">{LANG_ENTRY_TIMESTAMP}</option>
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
		<input class="textbox_nr" name="dateform" maxlength="5" size="5" value="{EDIT_DATEFORM}">
		</td>
	</tr>
</table>
<br>
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
<br>
<br>
<table class="settings" summary="settings" cellspacing="0" cellpadding="2">
	<tr>
		<td colspan="2" class="settings_overall">
		<center><span class="edit_caption">{LANG_EDIT_CAPTION_SECURITY}</span></center>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_SESSION_TIMEOUT}</b></span><br>
		<span>{LANG_EDIT_EXPL_SESSION_TIMEOUT}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr" name="session_timeout" maxlength="4" size="4" value="{EDIT_SESSION_TIMEOUT}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_PASSWORD_MIN_LENGTH}</b></span><br>
		<span>{LANG_EDIT_EXPL_PASSWORD_MIN_LENGTH}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr" name="password_min_length" maxlength="2" size="2" value="{EDIT_PASSWORD_MIN_LENGTH}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_MODERATED}</b></span><br>
		<span>{LANG_EDIT_EXPL_MODERATED}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="moderated" size="1">
			<option{SELECTED_MODERATED_0} value="0">{LANG_NO}</option>
			<option{SELECTED_MODERATED_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_REQUIRE_EMAIL}</b></span><br>
		<span>{LANG_EDIT_EXPL_REQUIRE_EMAIL}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="require_email" size="1">
			<option{SELECTED_REQUIRE_EMAIL_0} value="0">{LANG_NO}</option>
			<option{SELECTED_REQUIRE_EMAIL_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_CAPTCHA}</b></span><br>
		<span>{LANG_EDIT_EXPL_CAPTCHA}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="captcha" size="1">
			<option{SELECTED_CAPTCHA_0} value="0">{LANG_NO}</option>
			<option{SELECTED_CAPTCHA_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_CAPTCHA_METHOD}</b></span><br>
		<span>{LANG_EDIT_EXPL_CAPTCHA_METHOD}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="captcha_method" size="1">
			<option{SELECTED_CAPTCHA_METHOD_0} value="0">{LANG_CAPTCHA_METHOD_CODE}</option>
			<option{SELECTED_CAPTCHA_METHOD_1} value="1">{LANG_CAPTCHA_METHOD_MATH}</option>
		</select>
		</td>
	</tr>
		<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_CAPTCHA_COORDS}</b></span><br>
		<span>{LANG_EDIT_EXPL_CAPTCHA_COORDS}</span>
		</td>
		<td class="settings_r">
		<span>X&nbsp;</span><input class="textbox_nr_short" name="captcha_coords_x" maxlength="3" size="3" value="{EDIT_CAPTCHA_COORDS_X}">&nbsp;&nbsp;
		<span>Y&nbsp;</span><input class="textbox_nr_short" name="captcha_coords_y" maxlength="3" size="3" value="{EDIT_CAPTCHA_COORDS_Y}">
		</td>
	</tr>
		<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_CAPTCHA_COLOR}</b></span><br>
		<span>{LANG_EDIT_EXPL_CAPTCHA_COLOR}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr" name="captcha_color" maxlength="6" size="6" value="{EDIT_CAPTCHA_COLOR}">
		</td>
	</tr>
		<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_CAPTCHA_ANGLE}</b></span><br>
		<span>{LANG_EDIT_EXPL_CAPTCHA_ANGLE}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr_short" name="captcha_angle_1" maxlength="4" size="4" value="{EDIT_CAPTCHA_ANGLE_1}">&nbsp;
		<input class="textbox_nr_short" name="captcha_angle_2" maxlength="4" size="4" value="{EDIT_CAPTCHA_ANGLE_2}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_AKISMET_PLUGIN}</b></span><br>
		<span>{LANG_EDIT_EXPL_AKISMET_PLUGIN}<br><br>{EDIT_AKISMET_CHECK_IMAGE}{LANG_EDIT_EXPL_AKISMET_CHECK}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="akismet_plugin" size="1">
			<option{SELECTED_AKISMET_PLUGIN_0} value="0">{LANG_NO}</option>
			<option{SELECTED_AKISMET_PLUGIN_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_AKISMET_API}</b></span><br>
		<span>{LANG_EDIT_EXPL_AKISMET_API}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr" name="akismet_api" maxlength="50" size="50" value="{EDIT_AKISMET_API}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_AKISMET_MARK_AS_SPAM}</b></span><br>
		<span>{LANG_EDIT_EXPL_AKISMET_MARK_AS_SPAM}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="akismet_mark_as_spam" size="1">
			<option{SELECTED_AKISMET_MARK_AS_SPAM_0} value="0">{LANG_NO}</option>
			<option{SELECTED_AKISMET_MARK_AS_SPAM_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_TIME_LOCK}</b></span><br>
		<span>{LANG_EDIT_EXPL_TIME_LOCK}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="time_lock" size="1">
			<option{SELECTED_TIME_LOCK_0} value="0">{LANG_NO}</option>
			<option{SELECTED_TIME_LOCK_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_TIME_LOCK_VALUE}</b></span><br>
		<span>{LANG_EDIT_EXPL_TIME_LOCK_VALUE}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr" name="time_lock_value" maxlength="3" size="50" value="{EDIT_TIME_LOCK_VALUE}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_TIME_LOCK_MAXTIME}</b></span><br>
		<span>{LANG_EDIT_EXPL_TIME_LOCK_MAXTIME}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr" name="time_lock_maxtime" maxlength="11" size="50" value="{EDIT_TIME_LOCK_MAXTIME}">
		</td>
	</tr>
	<!-- <tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_SPAM_PROTECTION}</b></span><br>
		<span>{LANG_EDIT_EXPL_SPAM_PROTECTION}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="spam_protection" size="1">
			<option{SELECTED_SPAM_PROTECTION_0} value="0">{LANG_NO}</option>
			<option{SELECTED_SPAM_PROTECTION_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr> -->
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_IPBLOCKER}</b></span><br>
		<span>{LANG_EDIT_EXPL_IPBLOCKER}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="ipblocker" size="1">
			<option{SELECTED_IPBLOCKER_0} value="0">{LANG_NO}</option>
			<option{SELECTED_IPBLOCKER_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
</table>
<br>
<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}">
<br>
<br>
<table class="settings" summary="settings" cellspacing="0" cellpadding="2">
	<tr>
		<td colspan="2" class="settings_overall">
		<center><span class="edit_caption">{LANG_EDIT_CAPTION_EMAIL}</span></center>
		</td>
	</tr>	
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_SENDMAIL_ADMIN}</b></span><br>
		<span>{LANG_EDIT_EXPL_SENDMAIL_ADMIN}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="sendmail_admin" size="1">
			<option{SELECTED_SENDMAIL_ADMIN_0} value="0">{LANG_NO}</option>
			<option{SELECTED_SENDMAIL_ADMIN_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_SENDMAIL_ADMIN_TEXT}</b></span><br>
		<span>{LANG_EDIT_EXPL_SENDMAIL_ADMIN_TEXT}</span>
		</td>
		<td class="settings_r">
		<textarea name="sendmail_admin_text" rows="5" cols="25">{EDIT_SENDMAIL_ADMIN_TEXT}</textarea>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_SENDMAIL_USER}</b></span><br>
		<span>{LANG_EDIT_EXPL_SENDMAIL_USER}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="sendmail_user" size="1">
			<option{SELECTED_SENDMAIL_USER_0} value="0">{LANG_NO}</option>
			<option{SELECTED_SENDMAIL_USER_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_SENDMAIL_USER_TEXT}</b></span><br>
		<span>{LANG_EDIT_EXPL_SENDMAIL_USER_TEXT}</span>
		</td>
		<td class="settings_r">
		<textarea name="sendmail_user_text" rows="5" cols="25">{EDIT_SENDMAIL_USER_TEXT}</textarea>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_SENDMAIL_USER_TEXT_MODERATED}</b></span><br>
		<span>{LANG_EDIT_EXPL_SENDMAIL_USER_TEXT_MODERATED}</span>
		</td>
		<td class="settings_r">
		<textarea name="sendmail_user_text_moderated" rows="5" cols="25">{EDIT_SENDMAIL_USER_TEXT_MODERATED}</textarea>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_SENDMAIL_USER_NOTIFICATION_TEXT}</b></span><br>
		<span>{LANG_EDIT_EXPL_SENDMAIL_USER_NOTIFICATION_TEXT}</span>
		</td>
		<td class="settings_r">
		<textarea name="sendmail_user_notification_text" rows="5" cols="25">{EDIT_SENDMAIL_USER_NOTIFICATION_TEXT}</textarea>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_SENDMAIL_COMMENT_TEXT}</b></span><br>
		<span>{LANG_EDIT_EXPL_SENDMAIL_COMMENT_TEXT}</span>
		</td>
		<td class="settings_r">
		<textarea name="sendmail_comment_text" rows="5" cols="25">{EDIT_SENDMAIL_COMMENT_TEXT}</textarea>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_SENDMAIL_CONTACTMAIL_TEXT}</b></span><br>
		<span>{LANG_EDIT_EXPL_SENDMAIL_CONTACTMAIL_TEXT}</span>
		</td>
		<td class="settings_r">
		<textarea name="sendmail_contactmail_text" rows="5" cols="25">{EDIT_SENDMAIL_CONTACTMAIL_TEXT}</textarea>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_SENDMAIL_CONTACTMAIL_TEXT_COPY}</b></span><br>
		<span>{LANG_EDIT_EXPL_SENDMAIL_CONTACTMAIL_TEXT_COPY}</span>
		</td>
		<td class="settings_r">
		<textarea name="sendmail_contactmail_text_copy" rows="5" cols="25">{EDIT_SENDMAIL_CONTACTMAIL_TEXT_COPY}</textarea>
		</td>
	</tr>
</table>
<br>
<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}">
</center>
</form>