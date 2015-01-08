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

		echo $this->Html->script('layout');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

		echo $this->Html->css($assets_links);
		echo $this->Html->script($assets_links);
	?>
</head>
<body>
	<div class = "navigation-wrap">
		<div class = "navigation-arrow"></div>
		<div class = "navigation-body">
			<p id = "navigationText">My Calendar</p>
		</div>
	</div>
	<div class = "docs-top">
		<h2 class = "docs-title">언제만날래?</h2>
		<div class = "top-menu-area">
			<div class = "top-menu-contents profile-area">
				<img class = "top-profile-img" src = "/schedule/img/profiles/nobinson94.jpg"/>
				<p class = "top-profile-name">Nobinson94</p>
			</div>
			<input type = "button" class = "top-menu-contents icon-btn calendar-btn" navigation = "Calendar"/>
			<input type = "button" class = "top-menu-contents icon-btn group-btn" navigation = "Meetings"/>
			<div class = "top-menu-contents add-btn-area" navigation = "New">
				<div class = "add-btn-border">
					<input type = "button" class = "icon-btn add-btn" />
				</div>
				<div class = "down-arrow"></div>
			</div>
			<input type = "button" class = "top-menu-contents icon-btn logout-btn" navigation = "Sign Out"/>
		</div>
	</div>
	<div class = "docs-center">
		<?php echo $this->fetch('content'); ?>
	</div>
</body>
</html>