<div class="products form">
<?php echo $form->create('Brand', array( 'type' => 'file') );?>
	<fieldset>
 		<legend>Добавить новый Бренд</legend>

		<b>Загрузка Логотипа:</b> 
		<?php echo $form->input('Brand.userfile', array('label' => false, 'type'=>'file')); ?>
	<?php
		echo $form->input('name', array( 'label' => 'Название Бренда', 'error' => false) );
		echo $form->error('name', array('class' => 'error', 'style' => 'color: red') );
		//echo $form->input('body', array('label' => 'Описание') );
		echo $form->label('body','Описание');
		echo $fck->load('Brand.body');
	?>
	</fieldset>
	<hr />
<?php echo $form->end('Сохранить');?>
</div>
