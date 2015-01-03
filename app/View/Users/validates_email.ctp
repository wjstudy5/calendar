<div class = "top-area">
	<h1 class = "title-text">언제만날래?</h1>
	<form id = "emailValidationForm" method = "GET" action = ""> 
		<div class = "email-input-area">
			<p class = "email-nav">email 중복검사</p>
			<input type = "text" id = "emailValidationInput" name = "email" class = "form-control email-input" placeholder = "확인할 email을 입력하세요" value = "<?php echo $email; ?>"/>
			<div class = "search-btn-area">
				<input type = "button" id = "formSubmit" class = "btn btn-default search-btn" value = "확인"/>
			</div>
		</div>
	</form>
</div>
<div id = "validationResult" class = "result-area <?php echo $status; ?>">
	<div class = "inner-result failure">
		<p>이미 사용중인 이메일입니다.</p>
	</div>
	<div class = "inner-result success">
		<p>사용할 수 있는 이메일입니다.</p>
		<input type = "button" id = "emailSelectBtn" class = "btn btn-success email-submit-btn" value = "사용하기"/>
	</div>
</div>