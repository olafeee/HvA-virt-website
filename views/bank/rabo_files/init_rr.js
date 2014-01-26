if (SAMUtil) {
	SAMUtil.addEvent(window, "load", function() {
		SAMUtil.fireFrameBuster();
		SAMUtil.fetchSigningImage('sign_img_url', 'algn_btn');
		var rekNrField = new FormField.inputValidator('AuthIdv4',
				'Het rekeningnummer', 9);
		var pasNrField = new FormField.inputValidator('AuthBpasNrv4',
				'Het pasnummer');
		var iCodeField = new FormField.inputValidator('AuthCdv4',
				'De toegangscode');
		var sCodeField = new FormField.inputValidator('SignCdv4',
				'De signeercode');
		FormValidator.setValidatables(rekNrField, pasNrField, iCodeField,
				sCodeField);
		FormValidator.initSubmitEvents('brt_but_submit');
		SAMUtil.setFocusOnFirstInputField();
		SAMUtil.addEvent(SAMUtil.Dom.getById('info'), "click",
				Tooltip.openTooltip);
		SAMUtil.addEvent(SAMUtil.Dom.getById('ibanInfo'), "click",
				Tooltip.openTooltip);
	});
}
