<?php
	class Type3CalendarHelper extends AppHelper {
		public function show($user = NULL) {
			$day = array("sun","mon","tue","wed","thu","fri","sat");
			$userNum = sizeof($user);
			$index = 0;
			ob_start();?> 
<div class = 'calendar'>
	<table class = 'weekly-calendar'>
		<thead class = 'calendar-head'>
			<tr>
				<th class = 'weekly-axis' ></th>
				<th class = 'day-head weekly-sun'>Sun</th>
				<th class = 'day-head weekly-mon'>Mon</th>
				<th class = 'day-head weekly-tue'>Tue</th>
				<th class = 'day-head weekly-wed'>Wed</th>
				<th class = 'day-head weekly-thu'>Thu</th>
				<th class = 'day-head weekly-fri'>Fri</th>
				<th class = 'day-head weekly-sat'>Sat</th>
			</tr>
		</thead>
		<tbody class = 'calendar-content'>
			<?php for($time = 0; $time < 24; $time += 0.5): ?>
				<?php
					ob_start();
				?>
				<tr time = '<?php echo $time; ?>'>
					<td class = 'content-time'>
						<?php
							if (intval($time) == floatval($time)) {
								if ($time < 12) {
									echo $time.'am';
								} else {
									echo $time.'pm';
								}
							}
						?>
					</td>
					<?php 
						for($dayIndex = 0; $dayIndex < 7; $dayIndex++) {
							if ($user != NULL && $index < $userNum && $user[$index]['time'] == $time && $user[$index]['day'] == $day[$dayIndex]) {
								ob_start();
					?>
					<td day = '<?php echo $day[$dayIndex];?>' class = 'content-day content-<?php echo $day[$dayIndex];?> selected'></td>					
					<?php
								$index++;
								ob_end_flush();
							} else {
								ob_start();
					?>
					<td day = '<?php echo $day[$dayIndex];?>' class = 'content-day content-<?php echo $day[$dayIndex];?>'></td>
					<?php
								ob_end_flush();
							}
						}
					?>
				</tr>
				<?php
					ob_end_flush();
				?>
			<?php endfor ?>
		</tbody>
	</table>
</div>
			<?php $htmlCode = ob_get_clean();
			return $htmlCode;
		}
	}
?>
