<div class="staticPages form">
<?php echo $form->create('StaticPage');?>
	<fieldset>
 		<legend>Создать описание</legend>
	<?php
		echo $fck->load('StaticPage.body');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>

