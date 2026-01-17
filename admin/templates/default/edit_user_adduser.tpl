{TEMPLATE_ERRORMESSAGE}
<form action="{FORM_ACTION}" method="post" id="adduser">
<input type="hidden" name="sent_edit_user_adduser" value="1">
<table summary="edit_user_single" class="edit_user_single" cellspacing="0" cellpadding="3">
	<tr>
		<td class="edit_user_l" align="left">
		<span>{LANG_NAME}</span>
		</td>
		<td class="edit_user_r">
		<input class="textbox" type="text" name="name" size="30" value="{EDIT_USER_NAME}">
		</td>
	</tr>
	<tr>
		<td class="edit_user_l" align="left">
		<span>{LANG_EMAIL}</span>
		</td>
		<td class="edit_user_r">
		<input class="textbox" type="text" name="email" size="30" value="{EDIT_USER_EMAIL}">
		</td>
	</tr>
	<tr>
		<td class="edit_user_l" align="left">
		<span>{LANG_R_USER_TYPE}</span>
		</td>
		<td class="edit_user_r">
		<select class="option" name="user_level" size="1"><option{SELECTED_R_ADMIN} value="0">{LANG_ADMINISTRATOR}</option><option{SELECTED_R_MODERATOR} value="1">{LANG_MODERATOR}</option></select>
		</td>
	</tr>
	<tr>
		<td class="edit_user_l" align="left">
		<span>{LANG_USER_IS_ACTIVE}</span>
		</td>
		<td class="edit_user_r">
		<select class="option" name="user_is_active" size="1"><option{SELECTED_USER_IS_ACTIVE_0} value="0">{LANG_NO}</option><option{SELECTED_USER_IS_ACTIVE_1} value="1">{LANG_YES}</option></select>
		</td>
	</tr>
	<tr>
		<td colspan="2" class="edit_user_overall">
		<center><span class="edit_caption">{LANG_EDIT_USER_CAPTION_RIGHTS}</span></center>
		</td>
	</tr>
	<tr>
		<td class="edit_user_l" align="left">
		<span>{LANG_R_SETTINGS}</span>
		</td>
		<td class="edit_user_r">
		<select class="option" name="r_settings" size="1"><option{SELECTED_R_SETTINGS_0} value="0">{LANG_NO}</option><option{SELECTED_R_SETTINGS_1} value="1">{LANG_YES}</option></select>
		</td>
	</tr>
	<tr>
		<td class="edit_user_l" align="left">
		<span>{LANG_R_SETTINGS_DATABASE}</span>
		</td>
		<td class="edit_user_r">
		<select class="option" name="r_settings_database" size="1"><option{SELECTED_R_SETTINGS_DATABASE_0} value="0">{LANG_NO}</option><option{SELECTED_R_SETTINGS_DATABASE_1} value="1">{LANG_YES}</option></select>
		</td>
	</tr>
	<tr>
		<td class="edit_user_l" align="left">
		<span>{LANG_R_ACTIVATE}</span>
		</td>
		<td class="edit_user_r">
		<select class="option" name="r_activate" size="1"><option{SELECTED_R_ACTIVATE_0} value="0">{LANG_NO}</option><option{SELECTED_R_ACTIVATE_1} value="1">{LANG_YES}</option></select>
		</td>
	</tr>
	<tr>
		<td class="edit_user_l" align="left">
		<span>{LANG_R_DEACTIVATE}</span>
		</td>
		<td class="edit_user_r">
		<select class="option" name="r_deactivate" size="1"><option{SELECTED_R_DEACTIVATE_0} value="0">{LANG_NO}</option><option{SELECTED_R_DEACTIVATE_1} value="1">{LANG_YES}</option></select>
		</td>
	</tr>
	<tr>
		<td class="edit_user_l" align="left">
		<span>{LANG_R_DELETE}</span>
		</td>
		<td class="edit_user_r">
		<select class="option" name="r_delete" size="1"><option{SELECTED_R_DELETE_0} value="0">{LANG_NO}</option><option{SELECTED_R_DELETE_1} value="1">{LANG_YES}</option></select>
		</td>
	</tr>
	<tr>
		<td class="edit_user_l" align="left">
		<span>{LANG_R_EDIT}</span>
		</td>
		<td class="edit_user_r">
		<select class="option" name="r_edit" size="1"><option{SELECTED_R_EDIT_0} value="0">{LANG_NO}</option><option{SELECTED_R_EDIT_1} value="1">{LANG_YES}</option></select>
		</td>
	</tr>
	<tr>
		<td class="edit_user_l" align="left">
		<span>{LANG_R_SPAM}</span>
		</td>
		<td class="edit_user_r">
		<select class="option" name="r_spam" size="1"><option{SELECTED_R_SPAM_0} value="0">{LANG_NO}</option><option{SELECTED_R_SPAM_1} value="1">{LANG_YES}</option></select>
		</td>
	</tr>
	<tr>
		<td class="edit_user_l" align="left">
		<span>{LANG_R_EDIT_SMILIES}</span>
		</td>
		<td class="edit_user_r">
		<select class="option" name="r_edit_smilies" size="1"><option{SELECTED_R_EDIT_SMILIES_0} value="0">{LANG_NO}</option><option{SELECTED_R_EDIT_SMILIES_1} value="1">{LANG_YES}</option></select>
		</td>
	</tr>
	<tr>
		<td class="edit_user_l" align="left">
		<span>{LANG_R_BANLISTS}</span>
		</td>
		<td class="edit_user_r">
		<select class="option" name="r_banlists" size="1"><option{SELECTED_R_BANLISTS_0} value="0">{LANG_NO}</option><option{SELECTED_R_BANLISTS_1} value="1">{LANG_YES}</option></select>
		</td>
	</tr>
	<tr>
		<td colspan="2" class="edit_user_overall">
		<center><span class="edit_caption">{LANG_EDIT_USER_CAPTION_PASSWORD}</span></center>
		</td>
	</tr>
	<tr>
		<td class="edit_user_l" align="left">
		<span>{LANG_NEW_PASSWORD_1}</span>
		</td>
		<td class="edit_user_r">
		<input class="textbox" type="text" name="new_password_1" size="30" value="{EDIT_USER_NEW_PASSWORD_1}">
		</td>
	</tr>
	<tr>
		<td class="edit_user_l" align="left">
		<span>{LANG_NEW_PASSWORD_2}</span>
		</td>
		<td class="edit_user_r">
		<input class="textbox" type="text" name="new_password_2" size="30" value="{EDIT_USER_NEW_PASSWORD_2}">
		</td>
	</tr>
	<tr>
		<td colspan="2" class="edit_user_overall">
		<center><span class="edit_caption">{LANG_EDIT_USER_CAPTION_SEND_ACCOUNT_DATA}</span></center>
		</td>
	</tr>
	<tr>
		<td class="edit_user_l" align="left">
		<span>{LANG_SEND_ACCOUNT_DATA}</span>
		</td>
		<td class="edit_user_r">
		<input type="checkbox" name="send_account_data" value="1">
		</td>
	</tr>
	<tr>
		<td colspan="2" class="edit_user_overall">
		<center><span class="edit_caption">{LANG_EDIT_USER_CAPTION_OLD_PASSWORD}</span></center>
		</td>
	</tr>
	<tr>
		<td class="edit_user_l" align="left">
		<span>{LANG_OLD_PASSWORD}</span>
		</td>
		<td class="edit_user_r">
		<input class="textbox" type="password" name="old_password" size="30" value="">
		</td>
	</tr>
</table>
<div class="gap">
<input class="button" type="submit" value="{LANG_SAVE}">
</div>
</form>