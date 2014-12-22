<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>언제만날래?</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('settings');
		echo $this->Html->css('layout');
		
		echo $this->Html->script('jquery-2.1.1.min');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

		echo $this->Html->css($assets_links);
		echo $this->Html->script($assets_links);
	?>
</head>
<body>
	<div class = "docs-top">
		<h2 class = "docs-title">언제만날래?</h2>
		<div class = "login-area">
			<p class = "unlogin-text">비회원으로 사용중</p>
			<input type = "button" class = "login-btn login" value = "로그인" />
			<input type = "button" class = "login-btn signup" value = "회원가입" />
		</div>
	</div>
	<div class = "docs-center">
		<?php echo $this->fetch('content'); ?>
	</div>
</body>
</html>
