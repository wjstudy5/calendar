<?php
	class Type3CalendarHelper extends AppHelper {
		public function show($user) {
			$eventNum = sizeof($user);
			debug($eventNum);
			$index = 0;
			$day = array('sun','mon','tue','wed','thu','fri','sat');
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
					if ($user != NULL && $index < $eventNum && $user[$index]['time'] == (string)$time) {
						$index++;
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
							if ($day[$dayIndex] == $user[$index]['day']) {
								ob_start();
					?>
					<td day = '<?php echo $day[$dayIndex];?>' class = 'content-day content-<?php echo $day[$dayIndex];?> selected'></td>
					<?php
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
					} else {
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
					<td day = 'sun' class = 'content-day content-sun'></td>
					<td day = 'mon' class = 'content-day content-mon'></td>
					<td day = 'tue' class = 'content-day content-tue'></td>
					<td day = 'wed' class = 'content-day content-wed'></td>
					<td day = 'thu' class = 'content-day content-thu'></td>
					<td day = 'fri' class = 'content-day content-fri'></td>
					<td day = 'sat' class = 'content-day content-sat'></td>
				</tr>
				<?php
						ob_end_flush();
					}
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
