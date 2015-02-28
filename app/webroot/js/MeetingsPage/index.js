$( document ).ready(function() {
	var name = $.cookie("nickname");
	selectSidebar(name);

	$(document).on('click','.meeting-show-all',function() {
		$.cookie("nickname","all");
		location.reload();
	});

	$(document).on('click','.meeting-user',function() {
		$.cookie("nickname",$(this).attr("user-name"));
		location.reload();	
	});

	$(document).on('click','.meeting-add', function() {
		$('.meeting-calendar-user').removeClass('selected');
		$('.meeting-calendar-all').removeClass('selected');
		$('.meeting-info').removeClass('selected');
		$('.meeting-user').removeClass('clicked');
		$('.meeting-show-all').removeClass('clicked');
		$('.meeting-add').addClass('clicked');
		$('.meeting-calendar-new').addClass('selected');
		$('#myModal').modal('show');
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

	$(document).on('click','.calendar-user-save',function() {
		var type = $(this).closest(".meeting-center").attr("calendar-type");
		var meetingsId = $(this).closest(".meeting-center").attr("meetings-id");
		var userName = $(this).closest(".meeting-calendar-user").attr("user-name");

		var cellInfo = new Object();
		var cellArray = new Array();
		var index = 0;
		$(this).closest(".meeting-calendar-user").find(".content-day.selected").each(function() {
			cellInfo.day = $(this).attr("day");
			cellInfo.time = $(this).closest("tr").attr("time");
			cellArray[index++] = cellInfo;
			cellInfo = new Object();
		});
		var jsonString = JSON.stringify({calendar: cellArray});
		post_to_url("http://localhost/calendar/meetingspage/update/" + type + "/" + meetingsId ,{'data' : jsonString, 'userName' : userName});
	});
	$(document).on('click',".new-user-cancel",function() {
		$(".nickname-input").val('');
		location.reload();
	});
	$(document).on('click','.new-user-submit',function() {
		var newNickname = $(".nickname-input").val();
		var error = false;
		$(".modal-title.nickname-error").hide();
		$(".meeting-user-btn").each(function() {
			if ($(this).val() == newNickname) {
				error = true;
			}
		});
		if ($(".nickname-input").val() == "") {
			error = true;
		}
		if (error) {
			$(".modal-title.nickname-error").show();
			$(".nickname-input").val('');
		} else {
			$("#myModal").modal('hide');
		}
	});
	
	$(document).on('click','.calendar-new-save',function() {
		var type = $(this).closest(".meeting-center").attr("calendar-type");
		var meetingsId = $(this).closest(".meeting-center").attr("meetings-id");
		var userName = $(".nickname-input").val();

		var cellInfo = new Object();
		var cellArray = new Array();
		var index = 0;
		$(this).closest(".meeting-calendar-new").find(".content-day.selected").each(function() {
			cellInfo.day = $(this).attr("day");
			cellInfo.time = $(this).closest("tr").attr("time");
			cellArray[index++] = cellInfo;
			cellInfo = new Object();
		});
		var jsonString = JSON.stringify({calendar: cellArray});
		post_to_url("http://localhost/calendar/meetingspage/update/" + type + "/" + meetingsId ,{'data' : jsonString, 'userName' : userName});
	})
});

function selectSidebar (name) {
	if (name != null) {
		if (name == "all") {
			var userNum = $(".meeting-user").length;
			var ratio = Math.pow(10,1/userNum);
			var allCalendar = $(".meeting-calendar-all");
			mergeCalendar (ratio,allCalendar);

			$('.meeting-user').removeClass('clicked');
			$('.meeting-add').removeClass('clicked');
			$('.meeting-calendar-user').removeClass('selected');
			$('.meeting-calendar-new').removeClass('selected');
			$('.meeting-show-all').addClass('clicked');
			$('.meeting-info').addClass('selected');
			$('.meeting-calendar-all').addClass('selected');
		} else {
			$('.meeting-calendar-user').removeClass('selected');
			$('.meeting-info').removeClass('selected');
			$('.meeting-user').removeClass('clicked');
			$('.meeting-calendar-all').removeClass('selected');
			$('.meeting-calendar-new').removeClass('selected');
			$('.meeting-show-all').removeClass('clicked');
			$('.meeting-add').removeClass('clicked');
			$('.meeting-user[user-name =' + name + ']').addClass('clicked');
			$('.meeting-calendar-user[user-name =' + name + ']').addClass('selected');		
		}
	}
}

/*
 * path : 전송 URL
 * params : 전송 데이터 {'q':'a','s':'b','c':'d'...}으로 묶어서 배열 입력
 * method : 전송 방식(생략가능)
 */
function post_to_url(path, params, method) {
    method = method || "post"; // Set method to post by default, if not specified.
    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);
    for(var key in params) {
        var hiddenField = document.createElement("input");
        hiddenField.setAttribute("type", "hidden");
        hiddenField.setAttribute("name", key);
        hiddenField.setAttribute("value", params[key]);
        form.appendChild(hiddenField);
    }
    document.body.appendChild(form);
    form.submit();
}
