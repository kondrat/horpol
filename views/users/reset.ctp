
  	<?php echo $form->create('User', array('action' => 'reset','class' => 'styled account_form') ); ?>


              	<div > Введите Ваш email.</div>
				<br />
         			
          			<?php echo $form->text('email', array('size' => 60) ); ?>
          			
          			<?php echo $form->error( 'email', array('class' => 'error', 'style' => 'color: red') ); ?>	

				<p>
          			<?php echo $form->submit('Послать мне новый пароль', array ('class' => 'submit1') ); ?>
          		</p>

 		<?php echo $form->end(); ?>




