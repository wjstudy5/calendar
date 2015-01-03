<?php echo $this->Html->script('plugins/md5', array('inline' => false)); ?>
<div class = "contents-wrap">
	<h1 class = "login-title">언제만날래?</h1>
	<div class = "login-area-wrap">
		<h2 class = "login-top">로그인</h2>
		<form id = "loginForm" method = "POST" action = "">
			<div class = "inputs-area">
				<p class = "inputs-label">e-mail</p>
				<input type = "text" name = "data[User][email]" class = "form-control input"/>
				<p class = "inputs-label">password</p>
				<input type = "password" id = "passwordInput" class = "form-control input"/>
				<input type = "hidden" id = "encryptedPassword" name = "data[User][password]" />
				<input type = "button" id = "submitBtn" class = "btn btn-primary submit-btn" value = "로그인" />
			</div>
		</form>
		<div class = "login-bottom">
			<ul class = "login-bottom-menu">
				<li>새 계정 만들기</a></li>
				<li>아이디/비밀번호 찾기</li>
			</ul>
		</div>
	</div>
</div>

<input type = "hidden" id = "loginStatus" value = "<?php echo $status; ?>" />