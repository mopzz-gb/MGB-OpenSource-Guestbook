<center>
<div class="explanation"><span class="install_general">{LANG_EULA_EXPL}</span></div>
<br>
<br>
<iframe src="../admin/gpl.html" style="border:1px solid #B9B9B9; height:400px; width:500px;"><a href="../admin/gpl.html" target="_blank">GNU GPL</a></iframe>
<br>
<br>
<form action="{INSTALL_FORM_ACTION}" method="post">
<input type="hidden" name="step" value="1">
<table summary="end user license agreement">
	<tr>
		<td><input type="radio" name="eula_agreement" value="1"></td>
		<td><span class="install_general">{LANG_EULA_AGREE}</span></td>
	</tr>
	<tr>
		<td><input type="radio" name="eula_agreement" value="0" checked></td>
		<td><span class="install_general">{LANG_EULA_DISAGREE}</span></td>
	</tr>
</table>
<br>
<input type="submit" class="install_button" name="next" value="{LANG_NEXT_STEP}">
</form>
</center>