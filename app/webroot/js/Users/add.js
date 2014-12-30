
/*--------------------- global variables -------------------------*/
var emailPopups = null;

/*--------------------- onload function --------------------------*/
$(window).on('load', function() {
	registerEvents();
});

/*--------------------- registering events ----------------------*/
function registerEvents() {
	$('#emailInput').on('click', function() {
		console.log(emailPopups);
		if (emailPopups == null || emailPopups.closed) {
			emailPopups = window.open('./email/unique', '', 'width=500px, height=600px');
		} else {
		}
	});	
}