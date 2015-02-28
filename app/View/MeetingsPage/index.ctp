
<!-- MeetingsPageController/index.ctp -->
<?php echo $this->Html->script('weeklyCalendar/weeklyCalendar.js') ?>
<?php echo $this->Html->css('weeklyCalendar/weeklyCalendar.css') ?>

	<div class = "meeting-sidebar">
		<div class = "meeting-btn-group">
			<div class = "meeting-show-all meeting-btn">
				<div class = "vertical-line"></div>
				<input type = "button" class = "meeting-show-all-btn" value = "전체보기"/>
			</div>

			<!-- create sidebar button for each user-->
			<?php foreach ($nicknames as $nickname): ?>
			<div user-name = '<?php echo $nickname; ?>' class = "meeting-user meeting-btn">
				<div class = "vertical-line"></div>
				<input type = "button" class = "meeting-user-btn" value = "<?php echo $nickname; ?>"/>
			</div>
			<?php endforeach ?>
			
			<div class = "meeting-add meeting-btn">
				<div class = "vertical-line"></div>
				<input type = "button" class = "user-add-btn" value= "새로 추가하기"/>
			</div>
		</div>
	</div>
	<div class = "meeting-center" calendar-type = "<?php echo $type; ?>" meetings-id = "<?php echo $meetingsId; ?>">
		<div class = "meeting-calendar">
			<div class = "meeting-calendar-all">
				<!-- create all calendar-->
				<?php
					if ($type == 3) {
						echo $this->Type3Calendar->show();
					} 
				?>
			</div>

			<!-- create calendar for each user-->
			<?php foreach ($calendar as $user): ?>
				<div user-name = "<?php echo $user['0']['nickname']; ?>" class = "meeting-calendar-user">
					<?php
						if ($type == 3) {
							echo $this->Type3Calendar->show($user);
						} 
					?>
					<input type = "button" class = "calendar-save calendar-user-save" value = "save"/>
				</div>
			<?php endforeach ?>

			<div class = "meeting-calendar-new">
				<?php
					if ($type == 3) {
						echo $this->Type3Calendar->show();
					} 
				?>
				<input type = "button" class = "calendar-save calendar-new-save" value = "save"/>
				<div id="myModal" class="modal fade">
				    <div class="modal-dialog modal-sm">
				        <div class="modal-content">
				            <div class="modal-header">
				                <h4 class="modal-title">닉네임을 입력하세요.</h4>
				                <h4 class="modal-title nickname-error">다시입력하세요.</h4>
				            </div>
				            <div class="modal-body">
				                <input type = "text" class = "nickname-input" />
				            </div>
				            <div class="modal-footer">
				                <button type="button" class="btn btn-default new-user-cancel" data-dismiss="modal">Cancel</button>
				                <button type="button" class="btn btn-primary new-user-submit">New</button>
				            </div>
				        </div>
				    </div>
				</div>
			</div>
		<div class = "meeting-info">
			<!-- <div class = "meeting-recommended-date">
				<div class = "horizontal-line"></div>
				<div class = "meeting-recommended-date-title">이때 만날까?</div>
				<div class = "meeting-recommended-date-content">
					<input type = "button" class = "btn btn-default date-btn" value = "1월  1일" />
					<input type = "button" class = "btn btn-default date-btn" value = "2월  1일"/>
					<input type = "button" class = "btn btn-default date-btn" value = "3월  1일"/>
				</div>
			</div> -->
			<!-- <div class = "meeting-selected-date">
				<div class = "horizontal-line"></div>
				<div class = "meeting-selected-date-title">이때 만나자!</div>
				<div class = "meeting-selected-date-content">일정을 선택해주세요.</div>
			</div> -->
		</div>
	</div>