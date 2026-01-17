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
		<input class="textbox" name="timezone" maxlength="255" size="30" value="{TIMEZONE}">
		</td>
	</tr>
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_ANNOUNCEMENT_MESSAGE}</b></span><br>
		<span>{LANG_EDIT_EXPL_ANNOUNCEMENT_MESSAGE}</span>
		</td>
		<td class="settings_r">
		<textarea name="announcement_message" rows="5" cols="25">{EDIT_ANNOUNCEMENT_MESSAGE}</textarea>
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
	<tr>
		<td class="settings_l">
		<span><b>{LANG_EDIT_CACHING}</b></span><br>
		<span>{LANG_EDIT_EXPL_CACHING}</span>
		</td>
		<td class="settings_r">
		<select class="option" name="caching" size="1">
			<option{SELECTED_CACHING_0} value="0">{LANG_NO}</option>
			<option{SELECTED_CACHING_1} value="1">{LANG_YES}</option>
		</select>
		</td>
	</tr>
</table>
<br>
<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}">
</center>
</form>