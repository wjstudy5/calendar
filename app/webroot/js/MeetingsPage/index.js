$( document ).ready(function() {
	$(document).on('click','.meeting-show-all',function() {
		$('.meeting-user').removeClass('clicked');
		$('.meeting-add').removeClass('clicked');
		$('.meeting-calendar-user').removeClass('selected');
		$(this).addClass('clicked');
		$('.meeting-info').addClass('selected');
		$('.meeting-calendar-all').addClass('selected');
	});

	$(document).on('click','.meeting-user',function() {
		$('.meeting-calendar-user').removeClass('selected');
		$('.meeting-info').removeClass('selected');
		$('.meeting-user').removeClass('clicked');
		$('.meeting-calendar-all').removeClass('selected');
		$('.meeting-show-all').removeClass('clicked');
		$('.meeting-add').removeClass('clicked');
		$(this).addClass('clicked');
		$('.meeting-calendar-user[user-name =' + $(this).children('.meeting-user-btn').val() + ']').addClass('selected');
	});

	$(document).on('click','.meeting-add', function() {
		$('.meeting-calendar-user').removeClass('selected');
		$('.meeting-calendar-all').removeClass('selected');
		$('.meeting-info').removeClass('selected');
		$('.meeting-user').removeClass('clicked');
		$('.meeting-show-all').removeClass('clicked');
		$(this).addClass('clicked');
	});

	// $('.date-btn').on('click', function() {
	// 	$('.date-btn').removeClass('clicked');
	// 	$(this).addClass('clicked');
	// 	$('.meeting-selected-date-content').html($(this).val());
	// });

	$(".meeting-calendar-all").mousedown(function() {
		return false;
	});
	$(".meeting-calendar-all").mouseup(function() {
		return false;
	});
	$(".meeting-calendar-all").mouseover(function() {
		return false;
	});

	$(".meeting-show-all").on('click',function() {
		var userNum = $(".meeting-user").length;
		var ratio = Math.pow(10,1/userNum);
		$(".meeting-calendar-all").find(".content-day.selected").removeClass("selected");
		$(".meeting-calendar-all").find(".content-day").css({
			opacity: function(index,value) {
				return parseFloat(0.1);
			} 
		});
		$(".content-day.selected").each(function() {
			var time = $(this).closest("tr").attr("time");
			var day = $(this).attr("day");
			var contentDay = $(this).closest(".meeting-calendar").children(".meeting-calendar-all").find('tr[time ="' + time + '"]').find(".content-day[day ='" + String(day) + "']");
			contentDay.addClass("selected");
			contentDay.css({
				opacity: function(index,value) {
					return parseFloat(value) * ratio;
				}
			});
		});
	});
})