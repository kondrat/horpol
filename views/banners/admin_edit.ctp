<div class="banners form">
<?php echo $form->create('Banner');?>
	<fieldset>
 		<legend><?php __('Edit Banner');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('type');
		echo $form->input('comment');
		echo $form->input('body');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Banner.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Banner.id'))); ?></li>
		<li><?php echo $html->link(__('List Banners', true), array('action' => 'index'));?></li>
	</ul>
</div>
