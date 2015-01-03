
$(window).on('load', function() {
	registerEvents();
});

function registerEvents() {
	$('#formSubmit').on('click', function() {
		isEmailValidate($('#emailValidationInput').val()) ? $('#emailValidationForm').submit() : window.alert('Invalid Email');
	});
	$('#emailSelectBtn').on('click', function() {
		window.opener.$('#emailInput').val($('#emailValidationInput').val());
		window.close();
	});
}

function isEmailValidate(emailString) {
	var emailTokens = emailString.split('@');
	if (emailTokens.length == 2 && emailTokens[1].indexOf('.') != -1) {
		return true;
	} else {
		return false;
	}
}