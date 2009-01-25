	<?php echo $form->create('User', array('action' => 'reg' ) ); ?>
	<fieldset>
	<legend>Регистрационная форма:</legend>

		<?php echo $form->input('username' ); ?>
		<?php echo $form->error( 'username', array('class' => 'error', 'style' => 'color: red') ); ?>
			
        <?php echo $form->input('password1' , array('type' => 'password') ); ?>
        <?php echo $form->error( 'password1', array('class' => 'error', 'style' => 'color: red') ); ?>

		<?php echo $form->input('password2', array('type' => 'password' ) ); ?>
     	<?php echo $form->error( 'password2', array('class' => 'error', 'style' => 'color: red') ); ?>

		<?php echo $form->input('role', array('type' => 'select', 'value' => 1, 'options' => array( 1 => 'admin', 2 => 'user'), 'class' => 'form')); ?>
     	<?php echo $form->error( 'role', array('class' => 'error', 'style' => 'color: red') ); ?>

</fieldset>

	<div align="left">
		<?php echo $form->submit('Регистрация' ); ?>
	</div>
		<?php echo $form->end(); ?>


