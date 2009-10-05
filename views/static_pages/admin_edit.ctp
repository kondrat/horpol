<div class="staticPages form">
<?php echo $form->create('StaticPage');?>
	<fieldset>
 		<legend>'Редактировать страницу'</legend>
	<?php
		echo $form->input('id');
		//echo $form->input('body');
		echo $fck->load('StaticPage.body');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('StaticPage.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('StaticPage.id'))); ?></li>
		<li><?php echo $html->link(__('List StaticPages', true), array('action'=>'index'));?></li>
	</ul>
</div>
