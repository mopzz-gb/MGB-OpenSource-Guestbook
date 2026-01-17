<form action="{URL_SMILIES}" method="post" name="addsmilies" onSubmit="return ConfirmSubmission()">
<table summary="smilies" class="smilies" cellspacing="0" cellpadding="3">
	<tr>
		<td colspan="6"><span>{LANG_ADD_SMILIES_DESCR}</span></td>
	</tr>
	<tr>
		<td colspan="6"><span>&nbsp;</span></td>
	</tr>
	<tr>
		<td class="smiley_path_descr"><span><b>{LANG_SMILEY_PATH}</b></span></td>
		<td class="smiley_replacement_descr"><span><b>{LANG_SMILEY_REPLACEMENT}</b></span></td>
		<td class="smiley_width_descr"><span><b>{LANG_SMILEY_WIDTH}</b></span></td>
		<td class="smiley_height_descr"><span><b>{LANG_SMILEY_HEIGHT}</b></span></td>
		<td class="smiley_image_descr">&nbsp;</td>
		<td class="smiley_check">&nbsp;</td>
	</tr>
	{TEMPLATE_SMILIES_SINGLE}
	<tr>
		<td colspan="6"><span>&nbsp;</span></td>
	</tr>
	<tr>
		<td colspan="6"><span>{SMILEY_COUNT}&nbsp;{LANG_SMILIES}&nbsp;|&nbsp;<a href="javascript:CheckAll()">{LANG_CHECK_ALL}</a>&nbsp;&middot;&nbsp;<a href="javascript:UncheckAll()">{LANG_UNCHECK_ALL}</a>&nbsp;&middot;&nbsp;<a href="javascript:InvertAll()">{LANG_INVERT_ALL}</a></span></td>
	</tr>
	<tr>
		<td colspan="6"><span>&nbsp;</span></td>
	</tr>
	<tr>
		<td colspan="6">
			<table summary="dropbox" class="dropbox" cellspacing="0" cellpadding="0">
				<tr>
					<td colspan="2"><span>{LANG_CHECKED_SMILIES}</span></td>
				</tr>
				<tr>
					<td colspan="2"><span>&nbsp;</span></td>
				</tr>
				<tr>
					<td class="dropbox_l">
					<select class="option_very_long" name="dropbox" size="1">
						<option value="0">{LANG_DO_NOTHING}</option>
						{OPTION_DELETE_CHECKED_SMILIES}
						{OPTION_KEEP_CHECKED_SMILIES}
					</select>
					</td>
					<td class="dropbox_r">
					<input type="hidden" name="sent_smilies" value="1">
					<input type="submit" class="button" name="{LANG_SAVE}" value="{LANG_SAVE}" onClick="return confirm('{LANG_CONFIRM_CHANGES_SMILEY}'); submit();">
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</form>