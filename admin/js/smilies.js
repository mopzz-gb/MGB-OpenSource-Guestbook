// THIS FUNCTIONS CHECK/UNCHECK ALL SMILIES AT ONCE

// Invert all
function InvertAll() {
	for(var i=0; i < document.addsmilies.elements.length; ++i) {
		if(document.addsmilies.elements[i].type == "checkbox") {
			if (document.addsmilies.elements[i].checked == true) {
				document.addsmilies.elements[i].checked = false;
			} else {
				document.addsmilies.elements[i].checked = true;
			}
		}
	}
}

// Check all
function CheckAll() {
	for(var i=0; i < document.addsmilies.elements.length; ++i) {
		if(document.addsmilies.elements[i].type == "checkbox") {
			document.addsmilies.elements[i].checked = true;
		}
	}
}

// Uncheck all
function UncheckAll() {
	for(var i=0; i < document.addsmilies.elements.length; ++i) {
		if(document.addsmilies.elements[i].type == "checkbox") {
			document.addsmilies.elements[i].checked = false;
		}
	}
}