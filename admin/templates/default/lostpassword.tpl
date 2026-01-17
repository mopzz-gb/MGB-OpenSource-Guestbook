{TEMPLATE_HEADER}
<center><br>{TEMPLATE_ERRORMESSAGE}
<form action="lostpassword.php" method="post">
<input type="hidden" name="sent" value="1">
<table summary="lostpassword" cellspacing="2" cellpadding="0">
	<tr>
		<td class="login_l"><span>{LANG_LOSTPASSWORD_MAIL}</span></td>
		<td class="login_r"><input class='login' name='email' maxlength='100' size='20' value=''></td>
	</tr>
</table>
<br>
<input class='login_button' type='submit' value='{LANG_GET_NEW_PW}'>
</form>
<br>
</center>
{TEMPLATE_COPYRIGHT}
{TEMPLATE_FOOTER}