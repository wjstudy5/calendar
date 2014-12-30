$( document ).ready(function() {


	$(document).on('click','.meeting-show-all',function() {
		$(this).addClass('clicked');
		$('.meeting-user').removeClass('clicked');
		$('.meeting-add').removeClass('clicked');
		$('.meeting-info').removeClass('hidden');
		$('.meeting-show-all-btn').click();
	});

	$(document).on('click','.meeting-user',function() {
		$('.meeting-info').addClass('hidden');
		$(this).addClass('clicked');
		$('.meeting-show-all').removeClass('clicked');
		$('.meeting-add').removeClass('clicked');
		$('.meeting-user-btn').click();
	});

	$(document).on('click','.meeting-add', function() {
		$('.meeting-info').addClass('hidden');
		$(this).addClass('clicked');
		$('.meeting-user').removeClass('clicked');
		$('.meeting-show-all').removeClass('clicked');
		$('.meeting-add-btn').click();
	});

	$('.date-btn').on('click', function() {
		$('.date-btn').removeClass('clicked');
		$(this).addClass('clicked');
		$('.meeting-selected-date-content').html($(this).val());
	})
})