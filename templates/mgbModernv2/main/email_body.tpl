{HEADER}
<br>
<table class="border_sendemail" summary="border_sendemail">
	<tr>
		<td class="border_sendemail_title">
		<center>
		<div class="gap">
		<span class="title">{TITLE}</span></div>
		</center>
		</td>
	</tr>
	<tr>
		<td class="border_sendemail_form">
		<center>
		{TEMPLATE_ERRORMESSAGE}
		<form action="{FORM_ACTION}" method="post" id="email">
		<input type="hidden" name="sent" value="1">
		<table summary="sendemail" class="sendemail" cellspacing="0" cellpadding="0">
			<tr>
				<td class="sendemail_l" align="left">
				<span>{LANG_EMAIL_NAME}</span>
				</td>
				<td class="sendemail_m" align="center">
				<input class="main_textbox" type="text" name="{FORM_ELEMENT_NAME}" size="30" value="{POST_NAME}">
				</td>
				<td class="sendemail_r" align="center">
				<span>*</span>
				</td>
			</tr>
			<tr>
				<td class="sendemail_l" align="left">
				<span>{LANG_EMAIL_EMAIL}</span>
				</td>
				<td class="sendemail_m" align="center">
				<input class="main_textbox" type="text" name="{FORM_ELEMENT_EMAIL}" size="30" value="{POST_EMAIL}">
				</td>
				<td class="sendemail_r" align="center">
				<span>*</span>
				</td>
			</tr>
			<tr>
				<td class="sendemail_l" align="left">
				<span>{LANG_EMAIL_MESSAGE}</span>
				</td>
				<td class="sendemail_m" align="center">
				<textarea name="{FORM_ELEMENT_MESSAGE}" rows="5" cols="25">{POST_MESSAGE}</textarea>
				</td>
				<td class="sendemail_r" align="center">
				<span>*</span>
				</td>
			</tr>
			<tr>
				<td class="sendemail_overall" colspan="3" align="center">
				<div class="gap">
				<span>{LANG_NECESSARY_FIELDS}</span></div>
				</td>
			</tr>
			<tr>
				<td class="sendemail_overall" colspan="3" align="center">
				<div class="gap">
				<span>{LANG_EMAIL_SENT_TO}&nbsp;<b>{EMAIL_RECEIVER}</b></span></div>
				</td>
			</tr>
			<tr>
				<td class="sendemail_overall" colspan="3" align="center">
					<table class="sendemail_user_box" summary="sendemail_user_box">
						<tr>
							<td class="sendemail_user_box_l" align="left">
							<input type="checkbox" name="user_sendcopytome" value="1"{CHECKED}>
							</td>
							<td class="sendemail_user_box_r" align="left">
							<span>{LANG_EMAIL_SENDCOPYTOME}</span>
							</td>
						</tr>
						{TEMPLATE_USER_ACCEPT_AKISMET_SERVICE}
					</table>
				</td>
			</tr>
			</table>
			{TEMPLATE_CAPTCHA}
			<div class="gap">
			<input class="main_button" type="submit" name="send_mail_button" value="{LANG_SEND}"></div>
			</form>
			</center>
			</td>
		</tr>
</table>
<br>
<span><a href="index.php{PARAMLANG_A}" title="{LANG_BACK}">{LANG_BACK_TO_MAINPAGE}</a></span>
<br>
<br>
<span class="copyright">-- <a href="admin/admin.php" target="_blank" title="{LANG_ADMINPANEL_DESCR}">{LANG_ADMINPANEL}</a> --</span><br>
{TEMPLATE_COPYRIGHT}
{TEMPLATE_FOOTER}