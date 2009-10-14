<?php $html->addCrumb('Главная', array('controller'=>'pages','action'=>'index')); ?>
<?php $html->addCrumb('Альбомы ', array('controller'=>'albums','action'=>'index')); ?>
<?php //$html->addCrumb($brand['Brand']['name'], array()); ?>

<div class="">
<?php echo $form->create('Image', array( 'type' => 'file') );?>
	<fieldset>
 		<legend>Добавить фото</legend>
	<?php
		echo $form->label('Album','Выберите альбом').'<br />';
		echo $form->input('Album', array('value' =>$this->params['named']['album'], 'label'=>false) );

		echo $form->label('name','Описание фотографии').'<br />';
		echo $form->input('name', array('label' => false, 'style' => 'width: 259px') );
		
	?>
	
		<?php echo $form->label('name','Загрузка фотографии').'<br />';?>
		<?php echo $form->input('Image.userfile', array('type'=>'file', 'label'=>false) ); ?>
	<br />

	<?php echo $form->end('Сохранить');?>
	</fieldset>
</div>

	

