<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php __('Hor Pol:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $html->meta('icon');

		echo $html->css('cake.generic');
		echo $html->css('adminStyle');

		echo $scripts_for_layout;
	?>
</head>
<body>
	<div class="userZone">
		<?php echo $html->link('На Сайт', '/'); ?>
	</div>
	<div id="container">
		<h1 class="admin" align="center" style="background-color:#ff5e5e">Admin page</h1>
		
		<?php 
			
			if ( $session->check('Auth.User.id') ) {
				echo '<div>';
					echo '<p class="username"> Пользователь: '.$session->read('Auth.User.username').'</p>';
					//echo '<p class= "logout">'.$html->link('Выход', array('controller' => 'users', 'action' => 'logout') ).'</p>'; 
				echo '</div>';
			}
		?>
		<div style="clear:both"></div>
		<?php echo $this->element('menu/menu'); ?>
			
		<div id="content">

			<?php $session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">

		</div>
	</div>
	<?php echo $cakeDebug; ?>
</body>
</html>