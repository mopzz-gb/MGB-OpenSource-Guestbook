<tr>
	<td colspan="3">
		<table style="border: none; width: 100%;" summary="helptable" cellspacing="0" cellpadding="0">
			<tr>
				<td class="signin_l2" align="left">
				<span>{LANG_BBCODES}</span>
				</td>
				<td class="signin_r2" align="center">
				<input type="button" class="main_button_bbcode" name="{LANG_BBCODE_BOLD}" value="{LANG_BBCODE_BOLD}" onClick="insert('[b]', '[/b]')" onmousemove="window.status='{LANG_BBCODE_BOLD}';" onmouseout="window.status=' ';" title="{LANG_BBCODE_HELP_BOLD}" alt="{LANG_BBCODE_HELP_BOLD}">
				<input type="button" class="main_button_bbcode" name="{LANG_BBCODE_ITALIC}" value="{LANG_BBCODE_ITALIC}" onClick="insert('[i]', '[/i]')" onmousemove="window.status='{LANG_BBCODE_ITALIC}';" onmouseout="window.status=' ';" title="{LANG_BBCODE_HELP_ITALIC}" alt="{LANG_BBCODE_HELP_ITALIC}">
				<input type="button" class="main_button_bbcode" name="{LANG_BBCODE_URL}" value="{LANG_BBCODE_URL}" onClick="insert('[url]', '[/url]')" onmousemove="window.status='{LANG_BBCODE_URL}';" onmouseout="window.status=' ';" title="{LANG_BBCODE_HELP_URL}" alt="{LANG_BBCODE_HELP_URL}">
				{TEMPLATE_BBCODE_IMG}
				{TEMPLATE_BBCODE_FLASH}
				<br>
				<input type="button" class="main_button_bbcode" name="{LANG_BBCODE_QUOTE}" value="{LANG_BBCODE_QUOTE}" onClick="insert('[quote]', '[/quote]')" onmousemove="window.status='{LANG_BBCODE_URL}';" onmouseout="window.status=' ';" title="{LANG_BBCODE_HELP_QUOTE}" alt="{LANG_BBCODE_HELP_QUOTE}">
				<select class="main_option" name="textsize" onchange="insert('[size=' + this.form.textsize.options[this.form.textsize.selectedIndex].value + ']','[/size]','message');this.selectedIndex=0">

				<option value="">{LANG_BBCODE_TEXTSIZE}</option>
				<option value="8">{LANG_BBCODE_EXTRASMALL}</option>
				<option value="10">{LANG_BBCODE_SMALL}</option>
				<option value="12">{LANG_BBCODE_DEFAULT}</option>
				<option value="16">{LANG_BBCODE_BIG}</option>
				<option value="24">{LANG_BBCODE_EXTRABIG}</option>
				</select>

				<select class="main_option" name="textcolor" onchange="insert('[color=' + this.form.textcolor.options[this.form.textcolor.selectedIndex].value + ']','[/color]','message');this.selectedIndex=0">

				<option value="">{LANG_BBCODE_TEXTCOLOR}</option>
				<option value="#800000" style="color: #800000;">Maroon</option>
				<option value="#B22222" style="color: #B22222;">Firebrick</option>
				<option value="#FF0000" style="color: #FF0000;">Red</option>
				<option value="#FFA07A" style="color: #FFA07A;">Lightsalmon</option>
				<option value="#C71585" style="color: #C71585;">Mediumvioletred</option>
				<option value="#FF00FF" style="color: #FF00FF;">Fuchsia</option>
				<option value="#FFC0CB" style="color: #FFC0CB;">Pink</option>
				<option value="#9400D3" style="color: #9400D3;">Darkviolet</option>
				<option value="#000080" style="color: #000080;">Navy</option>
				<option value="#0000FF" style="color: #0000FF;">Blue</option>
				<option value="#87CEEB" style="color: #87CEEB;">Skyblue</option>
				<option value="#00FFFF" style="color: #00FFFF;">Aqua</option>
				<option value="#008000" style="color: #008000;">Green</option>
				<option value="#00FF00" style="color: #00FF00;">Lime</option>
				<option value="#FFFF00" style="color: #FFFF00;">Yellow</option>
				<option value="#FFA500" style="color: #FFA500;">Orange</option>
				<option value="#8B4513" style="color: #8B4513;">Saddlebrown</option>
				<option value="#D2B48C" style="color: #D2B48C;">Tan</option>
				<option value="#E6E6FA" style="color: #E6E6FA;">Lavender</option>
				<option value="#FFFFFF" style="color: #FFFFFF;">White</option>
				<option value="#C0C0C0" style="color: #C0C0C0;">Silver</option>
				<option value="#808080" style="color: #808080;">Gray</option>
				<option value="#000000" style="color: #000000;">Black</option>
				</select>
				</td>
			</tr>
		</table>
	</td>
</tr>
