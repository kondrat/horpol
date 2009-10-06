<?php $html->addCrumb('Главная', array('controller'=>'pages','action'=>'index')); ?>
<?php $html->addCrumb('Баннеры', array('controller'=>'banners','action'=>'index')); ?>
<?php $html->addCrumb('Добавить Баннер', array()); ?>

<div class="banners form">
<?php echo $form->create('Banner', array( 'type' => 'file') );?>
	<fieldset id="brandAdd">
 		<legend>Добавить новый баннер</legend>
	<?php echo $form->input('type', array('options' => array('1'=>'Первый тип (длинный)','2'=>'Второй тип (короткий)')) );?>
		<?php echo $form->label('userfile','[Загрузка Баннера:]',array('style'=>'margin-bottom:.5em;') );?> 
		<?php echo $form->input('Banner.userfile', array('label' => false, 'type'=>'file')); ?>

	</fieldset>
<?php echo $form->end('Сохранить');?>
</div>
