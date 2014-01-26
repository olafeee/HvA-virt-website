//************************************************************/
//* Rabobank Nederland www.rabobank.nl						 */
//* Revision number:   $Revision: 00000 $					 */	
//************************************************************/

//====================================
//Utils
//====================================
var SAMUtil = {};
SAMUtil.Dom = {
	getById : function(id) {
		if (typeof id === "object") {
			return id;
		}
		return document.getElementById(id);
	}
};
SAMUtil.addEvent = function(obj, method, fun) {
	if (obj) {
		if (obj.attachEvent) {
			obj["e" + method + fun] = fun;
			obj[method + fun] = function() {
				obj["e" + method + fun](window.event);
			};
			obj.attachEvent("on" + method, obj[method + fun]);
		} else {
			obj.addEventListener(method, fun, false);
		}
	}
};
SAMUtil.preventDefault = function(event) {
	if (event.preventDefault) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}
};
SAMUtil.setFocusOnFirstInputField = function(form) {
	if (!form) {
		form = document.forms[0];
	}
	var elems = form.elements;
	for ( var i = 0; i < elems.length; i++) {
		var field = elems[i];
		if (field.type == 'text' && !field.value) {
			field.focus();
			break;
		}
	}
};
SAMUtil.setFocusOnField = function(id) {
	var focusField = SAMUtil.Dom.getById(id);
	if (focusField) {
		SAMUtil.focusAtEnd(focusField);
	}
};
SAMUtil.focusAtEnd = function(elem) {
    var elemLen = elem.value.length;
    // For IE Only
    if (document.selection) {
        // Set focus
        elem.focus();
        // Use IE Ranges
        var oSel = document.selection.createRange();
        // Reset position to 0 & then set at end
        oSel.moveStart('character', -elemLen);
        oSel.moveStart('character', elemLen);
        oSel.moveEnd('character', 0);
        oSel.select();
    }
    else if (elem.selectionStart || elem.selectionStart == '0') {
        // Firefox/Chrome
        elem.selectionStart = elemLen;
        elem.selectionEnd = elemLen;
        elem.focus();
    }
};
SAMUtil.showInnerHTMLInAlert = function(id) {
	var errorDiv = SAMUtil.Dom.getById(id);
	if (errorDiv) {
		var showAlert = function() {
			alert(errorDiv.innerHTML.replace(/<br\s*[\/]?>/gi, "\n"));
		};
		setTimeout(showAlert, 750);
	}
};
SAMUtil.fireFrameBuster = function() {
	if (top.location != self.location) {
		var winName = 'RASS';
		top.location.href = self.location;
		window.name = winName;
	}
};

SAMUtil.fetchSigningImage = function(signingUrlId, signingImageContainerId) {
	var signingImgUrlDiv = SAMUtil.Dom.getById(signingUrlId);
	var signingImgContainerDiv = SAMUtil.Dom.getById(signingImageContainerId);
	if (signingImgUrlDiv && signingImgContainerDiv) {
		var signingImgUrl = signingImgUrlDiv.innerHTML;
		var signImage = new Image();
		signImage.src = signingImgUrl;
		signingImgContainerDiv.appendChild(signImage);
		signingImgContainerDiv.removeChild(signingImgUrlDiv);
	}
};


// ====================================
// Form Validator
// ====================================
var FormValidator = {};
FormValidator.validatables = new Array();
FormValidator.setValidatables = function() {
	for ( var i = 0; i < arguments.length; i++) {
		this.validatables.push(arguments[i]);
	}
};
FormValidator.validateAll = function(e) {
	var evnt = e || window.event;
	var focusSet = false;
	var errorTxts = '';
	for ( var i = 0; i < FormValidator.validatables.length; i++) {
		var validatable = FormValidator.validatables[i];
		var error = validatable.validate();
		if (error) {
			if (!focusSet) {
				validatable.focus();
				focusSet = true;
			}
			errorTxts += error + '\n';
		}
	}
	if (errorTxts) {
		alert(errorTxts);
		SAMUtil.preventDefault(evnt);
	}
};

FormValidator.lastSubmitTime = null;
FormValidator.resubmitCheck = function(e) {
	var evnt = e || window.event;
	var submitTime = new Date();
	if (FormValidator.lastSubmitTime && FormValidator.lastSubmitTime + 21000 > submitTime.getTime()) {
		alert('Het verzoek is al verzonden. Een ogenblik geduld.');
		SAMUtil.preventDefault(evnt);
	} else {
		FormValidator.lastSubmitTime = submitTime.getTime();
	}
};

FormValidator.initSubmitEvents = function(idSubmitButton, form) {
	SAMUtil.addEvent(SAMUtil.Dom.getById(idSubmitButton), "click", FormValidator.validateAll);
	if (!form) {
		form = document.forms[0];
	}
	SAMUtil.addEvent(form, "submit", FormValidator.resubmitCheck);

};

// ====================================
// FormField object
// ====================================
var FormField = {};
FormField.inputValidator = function(id, name, minLength) {
	this.field = SAMUtil.Dom.getById(id);
	this.name = name;
	this.numeric = true;
	this.minLength = minLength;
	this.pattern = null;
	this.trimFor = null;
	this.message = null;
	this.crossFieldValidation = null;
	this.focus = function() {
		this.field.focus();
	};
	this.validateLength = function() {
		var val = this.field.value;
		if (this.minLength) {
			if (val.length < this.minLength || val.length > this.field.maxLength) {
				return false;
			}
		} else {
			if (val.length != this.field.maxLength) {
				return false;
			}
		}
		return true;
	};
	this.validateNumeric = function() {
		if (this.numeric) {
			return !isNaN(this.field.value);
		}
		return true;
	};
	this.validate = function() {
		if (this.field && this.field.name) {
			var isValid = this.validateNumeric() && this.validateLength();
			if (!isValid) {
				if (this.message != null) {
					return this.message;
				}
				var length = this.minLength ? this.minLength : this.field.maxLength;
				var fieldType = (this.numeric) ? 'cijfers' : 'karakters';
				return this.name + ' moet uit ' + length + ' ' + fieldType + ' bestaan.';
			}
			if (this.pattern != null) {
				var value = this.field.value;
				if ( this.trimFor != null ) {
					value = value.replace(new RegExp(this.trimFor, "g"),'');
				}
				var match = new RegExp(this.pattern).test(value);
				if ( !match ) {
					if ( this.message != null ) {
						return this.message;
					}
					return this.name + ' heeft niet het juiste formaat.';
				}
			}
			if (this.crossFieldValidation != null) {
				if (!this.crossFieldValidation()) {
					if ( this.message != null ) {
						return this.message;
					}
					return this.name + ' heeft niet het juiste formaat.';
				}
			}
		}
		return null;
	};
};
// ====================================
// FormField object
// ====================================
var Tooltip = {};
Tooltip.openTooltip = function(e) {
	evnt = e || window.event;
	targ = evnt.target || evnt.srcElement;
	var posx = 0;
	var posy = 0;
	var offset = 5;
	var curtitle = this.title;
	this.title = '';
	objuri = targ.href;
	if (objuri) {
		ainfoobj = objuri.split("#");
		infoobj = ainfoobj[1];
	}
	;
	// check if the tooltip is open
	if (document.getElementById("tooltip")) {
		Tooltip.closeTooltip();
	}
	var brich = document.getElementById(infoobj);
	if (brich != null) {
		curtitle = brich.innerHTML;
	}
	;
	var ttnode = document.createElement("div");
	document.body.appendChild(ttnode);
	ttnode.innerHTML = curtitle;
	ttnode.className = "tooltip";
	ttnode.id = "tooltip";
	SAMUtil.addEvent(ttnode, "click", Tooltip.closeTooltip);
	if (e.pageX || e.pageY) {
		posx = e.pageX + offset;
		posy = e.pageY + offset;
	} else if (e.clientX || e.clientY) {
		posx = e.clientX + document.documentElement.scrollLeft + offset;
		posy = e.clientY + document.documentElement.scrollTop + offset;
	}
	if (posx + ttnode.clientWidth > document.documentElement.clientWidth)
		posx = posx - ttnode.clientWidth - 2 * offset;
	if (e.clientY + ttnode.clientHeight > document.documentElement.clientHeight)
		posy = posy - ttnode.clientHeight - 2 * offset;
	ttnode.style.left = posx + "px";
	ttnode.style.top = posy + "px";
};

Tooltip.closeTooltip = function(e) {
	var ttnode = document.getElementById("tooltip");
	document.body.removeChild(ttnode);
};
