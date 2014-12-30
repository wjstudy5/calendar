<?php
	echo $this->Html->css('Home/index', array('inline' => false));
?>
<div class = "center">
	<div class = "menu-area">
		<input type = "button" class = "menu-btn" value = "회원가입"/>
		<input type = "button" class = "menu-btn" value = "언제만날래 로그인"/>
		<input type = "button" class = "menu-btn" value = "구글계정으로 로그인"/>
	</div>
	<div class = "text-area">
		<h1 class = "title-text">언제만날래?</h1>
		<h4 class = "subtitle-text">회원가입 없이 만들고 링크로 공유하는 약속잡기</h4>
		<h4 class = "subtitle-text">30초의 회원가입으로, 내 일정 저장 &amp 관리 서비스를 받아보실 수 있습니다</h4>
	</div>
</div>
<div class = "new-meetings-area">
	<p class = "block-label">새 일정 시작하기</p>
	<div class = "new-meetings-input">
		<input type = "text" class = "form-control" placeholder = "일정 이름"/>
	</div>
</div>
<div class = "users-area">
	<p class = "block-label users-area-label">내 스케줄 관리하기</p>
	<p class = "users-area-text">간단한 회원가입 후 더 많은 서비스를 받아보세요</p>
</div>