
  	<?php echo $form->create('User', array('action' => 'reset','class' => 'styled account_form') ); ?>

		<fieldset class="fieldSetLog">
  		<legend>Восcтановить пароль</legend>
         <div class="fieldWrapper">     
         				<?php echo $form->input('email', array('type' => 'text', 'class' => 'form',  'label' => 'Email:','div'=>array('class'=>'fieldLog')) );?>
         </div> 			
          			<?php //echo $form->error( 'email', array('class' => 'error', 'style' => 'color: red') ); ?>	
		</fieldset>
				<p><?php echo $form->submit('Послать мне новый пароль', array ('class' => 'submit1') ); ?></p>

 		<?php echo $form->end(); ?>




