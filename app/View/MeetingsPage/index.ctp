
<!-- MeetingsPageController/index.ctp -->
	<div class = "meeting-sidebar">
		<div class = "meeting-btn-group">
			<div class = "meeting-show-all meeting-btn">
				<div class = "vertical-line"></div>
				<input type = "button" class = "meeting-show-all-btn" value = "전체보기"/>
			</div>

			<?php foreach ($nicknames as $nickname): ?>
			<div class = "meeting-user meeting-btn">
				<div class = "vertical-line"></div>
				<input type = "button" class = "meeting-user-btn" value = "<?php echo $nickname; ?>"/>
			</div>
			<?php endforeach ?>

			<div class = "meeting-add meeting-btn">
				<div class = "vertical-line"></div>
				<input type = "button" class = "meeting-add-btn" value= "새로 추가하기"/>
			</div>
		</div>
	</div>
	<div class = "meeting-center">
		<div class = "meeting-calendar">
		</div>
		<div class = "meeting-info hidden">
			<div class = "meeting-recommended-date">
				<div class = "horizontal-line"></div>
				<div class = "meeting-recommended-date-title">이때 만날까?</div>
				<div class = "meeting-recommended-date-content">
					<input type = "button" class = "btn btn-default date-btn" value = "1월  1일" />
					<input type = "button" class = "btn btn-default date-btn" value = "2월  1일"/>
					<input type = "button" class = "btn btn-default date-btn" value = "3월  1일"/>
				</div>
			</div>
			<div class = "meeting-selected-date">
				<div class = "horizontal-line"></div>
				<div class = "meeting-selected-date-title">이때 만나자!</div>
				<div class = "meeting-selected-date-content"></div>
			</div>
		</div>
	</div>
	<div class = "meeting-add-btn">
		<div class = "meeting-add-accept">
		</div>
		<div class = "meeting-add-reset">
	</div>