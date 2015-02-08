$(document).ready(function() {

	var globalMouseDown = false;
	var globalMouseUp = false;
	var startCell,endCell;

	$(document).mouseup(function() {
		globalMouseUp = true;
		globalMouseDown = false;
	});

	$(document).mousedown(function() {
		globalMouseDown = true;
		globalMouseUp = false;
	});

	$(".content-day").mousedown(function() {
		startCell = $(this);
	});

	$(".content-day").mousemove(function() {
		if (globalMouseDown) {
			endCell = $(this);
			selectTableByDrag (startCell,endCell,"selecting");
		}
	});

	$(".content-day").mouseup(function() {
		if (globalMouseDown) {
			endCell = $(this);
			selectTableByDrag (startCell,endCell,"selected");
		}
	});

	$(".event-box").mouseenter(function() {
		$(this).css('opacity',0.1);
	});
	$(".event-box").mouseleave(function() {
		$(this).css('opacity',1);
	});
})

function makeDivByDrag (startCell,endCell) {
	var TOP,LEFT,WIDTH,HEIGHT;
	var left1,left2,top1,top2;
	var htmlCode;

	left1 = $(startCell).offset().left;
	left2 = $(endCell).offset().left;
	top1 = $(startCell).offset().top;
	top2 = $(endCell).offset().top
	
	LEFT = (left1 < left2) ? left1 : left2;
	TOP = (top1 < top2) ? top1 : top2;
	WIDTH = (left1 - left2 > 0) ? left1 - left2 : left2 - left1;
	HEIGHT = (top1 - top2 > 0) ? top1 - top2 : top2 - top1;

	$(".calendar").append("<div class = \"event-box\" ")
}

function selectTableByDrag (startCell,endCell,condition) {
	var startDay,startTime;
	var endDay,endTime;
	var leftTopDay,leftTopTime;
	var rightBottomDay,rightBottomTime;
	var state;
	var thisCalendar;

	thisCalendar = $(startCell).closest(".calendar");
	state = $(startCell).hasClass("selected");

	startDay = $(startCell).attr("day");
	startDay = changeDayToCode(startDay);
	startTime = $(startCell).parent("tr").attr("time");
	startTime = parseFloat(startTime);
	endDay = $(endCell).attr("day");
	endDay = changeDayToCode(endDay);
	endTime = $(endCell).parent("tr").attr("time");
	endTime = parseFloat(endTime);
	
	leftTopDay = (startDay < endDay) ? startDay : endDay;
	leftTopTime = (startTime < endTime) ? startTime : endTime;
	rightBottomDay = (startDay <= endDay) ? endDay : startDay;
	rightBottomTime = (startTime <= endTime) ? endTime : startTime;

	$(thisCalendar).find(".content-day").removeClass("selecting");
	$(thisCalendar).find(".content-day").removeClass("selecting-cancel");
	for (var timeIndex = leftTopTime; timeIndex <= rightBottomTime; timeIndex = timeIndex + 0.5) {
		$(thisCalendar).find(".calendar-content").children("tr").each(function() {
			if ($(this).attr("time") == timeIndex) {
				$(this).children(".content-day").each(function() {
					var daycode = changeDayToCode($(this).attr("day"));
					if (daycode >= leftTopDay && daycode <= rightBottomDay) {
						if(state) {
							if (condition == "selecting") {
								$(this).addClass("selecting-cancel");
							} else if (condition == "selected") {
								$(this).removeClass("selected");
							}
						} else {
							if (condition == "selecting") {
								$(this).addClass("selecting");
							} else {
								$(this).addClass("selected");
							}
						}
					}
				});
			}
		});
	}
	startDay = undefined;
	startTime = undefined;
	endDay = undefined;
	endTime = undefined;
}


//for문을 이용하기위해 요일을 숫자로 변환한다.
function changeDayToCode (day) {
	switch (day) {
		case "sun" : return 1; break;
		case "mon" : return 2; break;
		case "tue" : return 3; break;
		case "wed" : return 4; break;
		case "thu" : return 5; break;
		case "fri" : return 6; break;
		case "sat" : return 7; break;
		default : return false;
	}
};

function changeCodeToDay (code) {
	switch (code) {
		case 1 : return "sun"; break;
		case 2 : return "mon"; break;
		case 3 : return "tue"; break;
		case 4 : return "wed"; break;
		case 5 : return "thu"; break;
		case 6 : return "fri"; break;
		case 7 : return "sat"; break;
	}
}