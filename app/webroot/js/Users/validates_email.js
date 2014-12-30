
$(window).on('load', function() {
	registerEvents();
});

function registerEvents() {
	$('#formSubmit').on('click', function() {
		$('#emailValidationForm').submit();
	});
}