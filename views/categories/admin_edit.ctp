<div class="">

<?php echo $form->create('Category');?>
	<fieldset>
 		<legend>Редактировать категорию</legend>
	<?php
		echo $form->input('id');
		echo $form->input('name', array('label' => 'Имя категории') );
		echo $form->input('body', array('label' => 'Описание') );
		//echo $form->input('url');
	?>
	</fieldset>
<?php echo $form->end('Сохранить');?>
</div>
<div class="actions">
	<ul>
<<<<<<< HEAD:views/categories/admin_edit.ctp
		<li><?php echo $html->link('Удалить категорию', array('action'=>'delete', $form->value('Product.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Product.id'))); ?></li>
=======
		<li><?php echo $html->link('Удалить категорию', array('action'=>'delete', $form->value('Category.id')), null, sprintf('Подтверждаете удаление %s?', $form->value('Category.name'))); ?></li>
>>>>>>> ec844de8c47dabe98e93be055f311ebd25476b91:views/categories/admin_edit.ctp
		<li><?php echo $html->link('Список категорий', array('action'=>'index'));?></li>
		<li><?php //echo $html->link(__('List Brands', true), array('controller'=> 'brands', 'action'=>'index')); ?> </li>
		<li><?php //echo $html->link(__('New Brand', true), array('controller'=> 'brands', 'action'=>'add')); ?> </li>
	</ul>
</div>
