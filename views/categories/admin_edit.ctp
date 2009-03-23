<div class="">

<?php echo $form->create('Category');?>
	<fieldset>
 		<legend>Редактировать категорию</legend>
	<?php
		echo $form->input('id');
		echo $form->input('name', array('label' => 'Имя категории') );
		echo $form->label('body','Описание');
		echo $fck->load('Category.body');
		//echo $form->input('body', array('label' => 'Описание') );
		//echo $form->input('url');
	?>
	</fieldset>
<?php echo $form->end('Сохранить');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Удалить категорию', array('action'=>'delete', $form->value('Category.id')), null, sprintf('Подтверждаете удаление %s?', $form->value('Category.name'))); ?></li>
		<li><?php echo $html->link('Список категорий', array('action'=>'index'));?></li>
		<li><?php //echo $html->link(__('List Brands', true), array('controller'=> 'brands', 'action'=>'index')); ?> </li>
		<li><?php //echo $html->link(__('New Brand', true), array('controller'=> 'brands', 'action'=>'add')); ?> </li>
	</ul>
</div>
