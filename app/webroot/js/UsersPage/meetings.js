var upperBtn, belowBtn, deleteBtn, createBtn;

window.onload = function() {
	upperBtn = document.getElementById("upperBtn");
	belowBtn = document.getElementById("belowBtn");
	deleteBtn = document.getElementById("deleteBtn");
	createBtn = document.getElementById("createBtn");

	belowBtn.onclick = function() {belowBtnClick()};
}


function belowBtnClick() {
	if ($("#belowBtn").find(".edit-btn-icon").hasClass("edit-btn-icon")) {
		$("#belowBtn").find(".edit-btn-icon").attr("class", "cancel-btn-icon");
		$("#belowBtn").find(".side-btn-text").html("취소");

		$("#deleteBtn").removeClass("hidden");
		$("#createBtn").removeClass("hidden");

		$("#upperBtn").find(".sync-btn-icon").attr("class", "update-btn-icon");
		$("#upperBtn").find(".side-btn-text").html("수정");
	} else {
		$("#belowBtn").find(".cancel-btn-icon").attr("class", "edit-btn-icon");
		$("#belowBtn").find(".side-btn-text").html("수정/추가/삭제");

		$("#deleteBtn").addClass("hidden");
		$("#createBtn").addClass("hidden");

		$("#upperBtn").find(".update-btn-icon").attr("class", "sync-btn-icon");
		$("#upperBtn").find(".side-btn-text").html("동기화");
	}
}