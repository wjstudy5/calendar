<?php
	echo $this->Html->script('Meetings/jquery.steps', array('inline' => false));
?>

<div id = "meeting-name" class = "meeting-name">일정 이름</div>
<div id = "meeting-wizard" class = "meeting-wizard">
    <h3>달력 선택</h3>
    <section>
        <div id = "calendar-1" class =""><img src=""></div>
        <div id = "calendar-2" class =""><img src=""></div>
        <div id = "calendar-3" class =""><img src=""></div>
    </section>
    <h3>기간 선택</h3>
    <section>
        <div id = "start-day">시작일</div>
        <div id = "end-day">종료일</div>
    </section>
    <h3>소멸 날짜</h3>
    <section>
        <div id = "delete-day"></div>
    </section>
</div>
