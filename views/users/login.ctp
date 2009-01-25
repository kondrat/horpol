	<br />
	<?php echo $form->create('User', array('action' => 'login' ) ); ?>
	
	<fieldset>
	<legend>Вход: </legend>
		<?php echo $form->input('username', array('type' => 'text', 'size' => 20,'class' => 'form',  'label' => false) );?>
		<?php echo $form->error( 'username', array('class' => 'error', 'style' => 'color: red') ); ?>

		<?php echo $form->input('password', array( 'size' => 20,'class' => 'form',  'label' => false) );?>

		<?php //echo $html->link("Забыли пароль?", array( 'action' => 'password_reset'), array('class' => 'dm' ) ); ?>
		<p><?php echo $html->link("Забыли пароль?", array('admin'=> false, 'action' => 'reset'), array('class' => 'dm' ) ); ?></p>
		
		<?php //echo $html->link( 'Регистрация', array( 'action' => 'reg' ), array('class' => 'dm' ) ); ?>
	</fieldset>
	<br />
	<?php echo $form->end( "Войти" ); ?>
	



