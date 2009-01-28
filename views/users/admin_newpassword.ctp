<fieldset>
 	<legend>Смена пароля</legend>
<?php echo $form->create('User', array('action' => 'newpassword','class' => 'styled account_form') ); ?>


<div > Текущий пароль</div>
		<?php echo $form->text('password', array('type' => 'password', 'style' => "width: 250px; margin-left: 8px") ); ?>	
		<?php echo $form->error( 'password', array('class' => 'error', 'style' => 'color: red') ); ?>
	<br />
<div > Новый пароль</div>
		<?php echo $form->input('password1' , array('type' => 'password', 'label' => false, 'style' => "width: 250px;") ); ?>


<div > Повтор нового пароля</div>		
		<?php echo $form->input('password2', array('type' => 'password', 'label' => false, 'style' => "width: 250px;" ) ); ?>

</fieldset>	
<div style="margin: 10px 0 0 30px;">
	<?php echo $form->end('Изменить'); ?>
</div>




