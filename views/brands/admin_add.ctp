<?php $html->addCrumb('Главная', array('controller'=>'pages','action'=>'index')); ?>
<?php $html->addCrumb('Бренды', array('controller'=>'brands','action'=>'index')); ?>
<?php $html->addCrumb('Добавить Бренд', array()); ?>
<div class="products form">
<?php echo $form->create('Brand', array( 'type' => 'file') );?>
	<fieldset  id="brandAdd">
 		<legend>Создание нового Бренда</legend>

		<?php echo $form->label('userfile','[Загрузка Логотипа:]',array('style'=>'margin-bottom:.5em;') );?> 
		<?php echo $form->input('Brand.userfile', array('label' => false, 'type'=>'file')); ?>
		<?php echo $form->label('name','[Название Бренда:]' );?>
		<?php echo $form->input('name', array( 'label' => false) );?>
		<?php echo $form->label('name','[Страна-изготовитель:]' );?>
		<?php echo $form->input('origin', array( 'label' => false) );?>		
		<?php echo $form->label('body','[Описание:]');?>
		<div>
			<?php echo $fck->load('Brand.body');?>
		</div>
	</fieldset>
<?php echo $form->end('Сохранить');?>
</div>
