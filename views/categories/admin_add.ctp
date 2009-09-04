<div class="products form">
<?php echo $form->create('Category');?>
	<fieldset>
 		<legend>Создание новой категории</legend>
	<?php
		echo $form->input('name', array('label' => 'Имя Категории') );
		echo $form->input('Category.type', array('options' => array( 1 => 'Первый тип', 2 => 'Второй тип',3 => 'Третий тип') , 'label'=>'Тип категории','empty' => '(Выберите тип)') );
		echo $form->input('title', array('label' => 'Заголовок ("Title" - отображается вверху страницы).') );
		echo $form->input('slogan',array('label'=>'Слоган','rows'=>2,'default'=>'Здесь только лучшее от природы и производителей. <br />Каждая фабрика-яркая индивидуальность'));
		echo $form->label('body','Описание');
		echo $fck->load('Category.body');
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
