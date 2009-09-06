<div class="banners form">
<?php echo $form->create('Banner');?>
	<fieldset>
 		<legend><?php __('Add Banner');?></legend>
	<?php
		echo $form->input('type');
		echo $form->input('comment');
		echo $form->input('body');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Banners', true), array('action' => 'index'));?></li>
	</ul>
</div>
