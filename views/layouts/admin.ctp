<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php __('Хороший пол. Панель управления:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $html->meta('icon');
		echo $html->css('horPolAdminStyle');
		echo $html->css('screen');
		//echo $html->css('print');
		echo '<!--[if IE]>';
		echo $html->css('ie');
		//echo $html->css('adminStyle-ie');if we will need this
		echo '<![endif]-->';


		echo $scripts_for_layout;
	?>
</head>
<body>
	<div class="container showgrid.">

		<div class="header span-24" style="margin-bottom:5px;">
			<div class="span-4">
				<div class="userZone"><?php echo $html->link('Хороший пол', '/'); ?></div>
			</div>
			<div class="span-15 ">
				<h3>Панель управления: <span style="color:teal;font-size:120%;"><?php if(isset($headerName))echo $headerName;?></span></h3>
			</div>
			<div class="span-5 last">
				<?php if ( $session->check('Auth.User.id') ): ?>
							<p class="username"> Пользователь:&nbsp;&laquo;<?php echo $session->read('Auth.User.username');?>&raquo;</p>
							<?php echo $html->link('Выход',array('controller'=>'users','action'=>'logout'));?>
				<?php endif ?>
			</div>
		</div>
		<div class="span-24"><?php echo $this->element('menu/menu'); ?></div>
		
			
		<div class="span-24">

			<?php $session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>

		<div class="footer span-24" style="margin:10px 0;">
			<div class="span-3">
				<?php echo date('Y');?>&nbsp;&copy;&nbsp;<a href="http://www.imkg.ru">imkg.ru</a>
			</div>
		</div>

	</div>
	<?php echo $cakeDebug; ?>
</body>
</html>