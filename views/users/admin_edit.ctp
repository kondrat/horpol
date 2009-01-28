<div class="users form">
<?php echo $form->create('User');?>
	<fieldset>
 		<legend>Редактировать данные администратора</legend>
	<?php
		echo $form->input('id');
		echo $form->input('username');
		echo $form->input('email');
		
	?>
	</fieldset>
<?php echo $form->end('Редактировать');?>
</div>
<div class="actions">
	<ul>
		<li><?php // echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('User.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('User.id'))); ?></li>
	</ul>
</div>
