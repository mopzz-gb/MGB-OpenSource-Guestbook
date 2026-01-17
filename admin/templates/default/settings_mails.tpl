<form action="{URL_SETTINGS}" method="post">
<input type="hidden" name="sent_settings" value="1">
<center>
<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}">
<br>
<br>
<table class="settings" summary="settings" cellspacing="0" cellpadding="2">
	<tr>
		<td colspan="2" class="settings_overall">
		<center><span class="edit_caption">{LANG_EDIT_CAPTION_MAIL_SETTINGS}</span></center>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_MAILER_METHOD}</b></span><br>
		<span>{LANG_EDIT_EXPL_MAILER_METHOD}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="mailer_method" size="1">
			<option{SELECTED_MAILER_METHOD_0} value="0">{LANG_STANDARD_MAIL}</option>
			<option{SELECTED_MAILER_METHOD_1} value="1">{LANG_PHPMAILER}</option>
		</select>
		</td>
	</tr>
	<tr>
		<td colspan="2" class="settings_overall">
		<span><b>{LANG_EDIT_CAPTION_SMTP_SETTINGS}</b></span>
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_SMTP_SERVER}</b></span><br>
		<span>{LANG_EDIT_EXPL_SMTP_SERVER}</span>
		</td>
		<td class="settings_r">
		<input class="textbox" name="smtp_server" maxlength="255" size="30" value="{EDIT_SMTP_SERVER}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_SMTP_PORT}</b></span><br>
		<span>{LANG_EDIT_EXPL_SMTP_PORT}</span>
		</td>
		<td class="settings_r">
		<input class="textbox_nr" name="smtp_port" maxlength="6" size="30" value="{EDIT_SMTP_PORT}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_SMTP_USER}</b></span><br>
		<span>{LANG_EDIT_EXPL_SMTP_USER}</span>
		</td>
		<td class="settings_r">
		<input class="textbox" name="smtp_user" maxlength="255" size="30" autocomplete="off" value="{EDIT_SMTP_USER}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_SMTP_PASSWORD}</b></span><br>
		<span>{LANG_EDIT_EXPL_SMTP_PASSWORD}</span>
		</td>
		<td class="settings_r">
		<input class="textbox" name="smtp_password" type="password" maxlength="255" size="30" autocomplete="off" value="{EDIT_SMTP_PASSWORD}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_SMTP_AUTH}</b></span><br>
		<span>{LANG_EDIT_EXPL_SMTP_AUTH}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="smtp_auth" size="1">
			<option{SELECTED_SMTP_AUTH_0} value="0">{LANG_NO}</option>
			<option{SELECTED_SMTP_AUTH_1} value="1">{LANG_YES}</option>
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
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_SPAM_MAIL}</b></span><br>
		<span>{LANG_EDIT_EXPL_SPAM_MAIL}</span>
		</td>
		<td class="settings_r">
		<input class="textbox" name="spam_mail" maxlength="100" size="30" value="{EDIT_SPAM_MAIL}">
		</td>
	</tr>
</table>
<br>
<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}">
</center>
</form>