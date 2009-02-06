<div class="products form">
<?php echo $form->create('Category');?>
	<fieldset>
 		<legend>Создание новой категории</legend>
	<?php
		echo $form->input('name', array('label' => 'Имя Категории') );
		echo $form->input('body',array('label'=>'Описание'));
		echo $form->select('Category.type', array( 1 => 'first', 2 => 'second',3 => 'third') , array(3), array('label'=>'тип'),false
						);
		//array( 1 => 'first', 2 => 'second',3 => 'third')
	?>
	</fieldset>
	<hr />
<?php echo $form->end('Сохранить');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Список категорий', array('action'=>'index'));?></li>
		<li><?php //echo $html->link(__('List Brands', true), array('controller'=> 'brands', 'action'=>'index')); ?> </li>
		<li><?php //echo $html->link(__('New Brand', true), array('controller'=> 'brands', 'action'=>'add')); ?> </li>
	</ul>
</div>
