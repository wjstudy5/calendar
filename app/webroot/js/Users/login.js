
$(window).on('load', function() {
	checkLoginStatus();
	registerEvents();
});

function registerEvents() {
	$('#submitBtn').on('click', function() {
		$('#encryptedPassword').val($.md5($('#passwordInput').val()));
		$('#loginForm').submit();
	});
}
function checkLoginStatus() {
	if ($('#loginStatus').val() == 'success') {
		window.close();
		if (window.opener) {
			window.opener.location.replace('/schedule');
		} else {
			location.replace('/schedule');
		}
	}	
}