function AddSmiley(Smileys) {
	var txtarea = window.document.forms['formular'].elements['message'];
	Smileys = ' ' + Smileys + ' ';
	if (txtarea.createTextRange && txtarea.caretPos) {
		var caretPos = txtarea.caretPos;
		caretPos.text = caretPos.Smileys.charAt(caretPos.Smileys.length - 1) == ' ' ? caretPos.Smileys + Smileys + ' ' : caretPos.Smileys + Smileys;
		txtarea.focus();
	} else {
		txtarea.value  += Smileys;
		txtarea.focus();
	}
}