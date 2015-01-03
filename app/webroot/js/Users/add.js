
/*--------------------- global variables -------------------------*/
var emailPopups = null;

var formChecker = {
	checkEmail: function() {
		if ($('#emailInput').val()) {
			return true;
		} else {
			alert('이메일을 입력해 주세요');
			return false;
		}
	},
	checkPassword: function() {
		var passwordInput = $('#passwordInput').val();
		if (passwordInput) {
			$('#encryptedPassword').val($.md5(passwordInput));
			return true;
		} else {
			alert('비밀번호를 확인해 주세요');
			return false;
		}		
	}
};

/*--------------------- onload function --------------------------*/
$(window).on('load', function() {
	registerEvents();
});

/*--------------------- registering events ----------------------*/
function registerEvents() {
	$('#emailInput').on('click', function() {
		if (emailPopups == null || emailPopups.closed) {
			emailPopups = window.open('./email/unique', '', 'width=500px, height=600px');
		} else {
		}
	});
	$('#submitBtn').on('click', function() {
		(formChecker.checkEmail() && formChecker.checkPassword()) ? $('#usersForm').submit() : null;
	});
}