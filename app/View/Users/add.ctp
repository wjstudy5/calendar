<?php echo $this->Html->script('plugins/md5', array('inline' => false)); ?>
<div class = "users-top">
	<div class = "signup-text-area">
		<h3 class = "signup-text-title">회원가입</h3>
		<p class = "signup-text-subtitle">간단한 회원가입으로 더 많은 서비스를 받아보세요</p>
	</div>
</div>
<form id = "usersForm" method = "POST" action = "./create">
	<div class = "inputs-area">
		<div class = "users-input-wrap">
			<input type = "text" id = "emailInput" name = "data[User][email]" class = "form-control users-input email" placeholder = "e-mail" readonly/>
		</div>
		<div class = "users-input-wrap">
			<input type = "password" id = "passwordInput" class = "form-control users-input password" placeholder = "password"/>
			<input type = "hidden" id = "encryptedPassword" name = "data[User][password]" />
		</div>
		<div class = "google-sync-area">
			<p class = "google-sync-nav">추가정보</p>
			<label class = "google-sync-label">google 계정</label>
			<input type = "button" class = "btn btn-default google-sync-btn" value = "구글 계정 연동하기"/>
		</div>
		<div class = "submit-btn-area">
			<input type = "button" id = "submitBtn" class = "btn btn-primary submit-btn" value = "제출하기" />
			<input type = "button" id = "cancelBtn" class = "btn btn-default cancel-btn" value = "돌아가기" />
		</div>
	</div>
</form>