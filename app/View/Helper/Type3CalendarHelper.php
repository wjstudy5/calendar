<?php
	class Type3CalendarHelper extends AppHelper {
		public function show($user) {
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
			<?php endfor ?>
		</tbody>
	</table>
</div>
			<?php $htmlCode = ob_get_clean();
			return $htmlCode;
		}
	}
?>
