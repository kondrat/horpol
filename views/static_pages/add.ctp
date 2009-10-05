<div class="staticPages form">
<?php echo $form->create('StaticPage');?>
	<fieldset>
 		<legend><?php __('Add StaticPage');?></legend>
	<?php
		echo $form->input('body');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List StaticPages', true), array('action'=>'index'));?></li>
	</ul>
</div>
