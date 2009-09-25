<?php $html->addCrumb('Главная', array('controller'=>'pages','action'=>'index')); ?>
<?php $html->addCrumb('Категории', array('controller'=>'categories','action'=>'index')); ?>
<?php $html->addCrumb('Добавить категорию', array()); ?>

<div class="products form">
<?php echo $form->create('Category');?>
	<fieldset id="catAdd">
 		<legend>Создание новой категории</legend>
 			<?php echo $form->label('name','[Название категории:]' );?>
			<?php echo $form->input('name', array('label' => false) );?>
			<?php echo $form->label('type','[Тип категории:]' );?>
			<?php echo $form->input('Category.type', array('options' => array( 1 => 'Товары без описания (Основной тип)', 2 => 'Товары с описанием (пример: Лаки)',3 => 'Товары без Бренда (пример: Винтаж)') , 'label'=>false,'empty' => false) );?>
			<?php //echo $form->label('title','[Заголовок ("Title" - отображается вверху страницы):]' );?>
			<?php //echo $form->input('title', array('label' => false) );?>
			<?php echo $form->label('slogan','[Слоган:]' );?>
			<?php echo $form->input('slogan',array('label'=>false,'rows'=>2,'default'=>'Здесь только лучшее от природы и производителей. <br />Каждая фабрика-яркая индивидуальность'));?>			
			<?php echo $form->label('body','[Описание:]');?>
		<div>
			<?php echo $fck->load('Category.body');?>
		</div>
	</fieldset>
<?php echo $form->end('Сохранить');?>
</div>

