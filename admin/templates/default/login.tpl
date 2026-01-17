<center>{TEMPLATE_ERRORMESSAGE}
<form action="admin.php" method="post">
<input type="hidden" name="sent" value="1">
<table summary="login" cellspacing="2" cellpadding="0">
	<tr>
		<td class="login_l"><span>{LANG_LOGIN_USERNAME}</span></td>
		<td class="login_r"><input class='login' name='username' maxlength='100' size='20' value=''></td>
	</tr>
	<tr>
		<td class="login_l"><span>{LANG_LOGIN_PASSWORD}</span></td>
		<td class="login_r"><input class='login' type='password' name='password' maxlength='100' size='20' value=''></td>
	</tr>
</table>
<br>
<span><a class="admin" href="lostpassword.php" target="_blank" title="{LANG_LOGIN_LOSTPASSWORD}">{LANG_LOGIN_LOSTPASSWORD}</a></span>
<br>
<br>
<input class='login_button' type='submit' value='{LANG_LOGIN}'>
</form>
<br>
</center>