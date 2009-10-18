<?php $html->addCrumb('Главная', array('controller'=>'pages','action'=>'index')); ?>
<?php $html->addCrumb('Баннеры', array('controller'=>'banners','action'=>'index')); ?>
<?php $html->addCrumb('Добавить Баннер', array()); ?>

<div class="banners form">
<?php echo $form->create('Banner', array( 'type' => 'file') );?>
	<fieldset id="brandAdd">
 		<legend>Добавить новый баннер</legend>
 		<?php echo $form->label('type','[Тип Баннера:]',array('style'=>'margin-bottom:.5em;') );?> 
		<?php echo $form->input('type', array('label'=>false,'options' => array('1'=>'Первый тип (длинный)','2'=>'Второй тип (короткий)')) );?>
		<?php echo $form->label('url','[Ссылка Баннера:]',array('style'=>'margin-bottom:.5em;') );?> 
		<?php echo $form->input('url', array('rows' => '1', 'cols' => '5','label' => false)); ?>
		<?php echo $form->label('userfile','[Загрузка Баннера:]',array('style'=>'margin-bottom:.5em;') );?> 
		<?php echo $form->input('Banner.userfile', array('label' => false, 'type'=>'file')); ?>

	</fieldset>
<?php echo $form->end('Сохранить');?>
</div>
