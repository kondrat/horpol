
	<?php echo $form->create('User', array('action' => 'login' ) ); ?>
	
	<fieldset class="fieldSetLog">
	<legend>Вход</legend>
		<div class="fieldWrapper">
			<?php echo $form->input('username', array('type' => 'text', 'class' => 'form',  'label' => 'Логин:','div'=>array('class'=>'fieldLog')) );?>
	
			<?php echo $form->input('password', array( 'class' => 'form',  'label' => 'Пароль:','div'=>array('class'=>'fieldLog') ) );?>
			
			<p><?php echo $html->link("Забыли пароль?", array('admin'=> false, 'action' => 'reset'), array('class' => 'dm' ) ); ?></p>
		</div>		
	</fieldset>

	<?php echo $form->end( "Войти" ); ?>
	



