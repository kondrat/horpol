<?php $html->addCrumb('Главная', array('controller'=>'pages','action'=>'index')); ?>
<?php $html->addCrumb('Новости', array('action'=>'index')); ?>
<?php $html->addCrumb('Добавить новость', array()); ?>

<div class="">
<?php echo $form->create('News');?>
	<fieldset id="catAdd">
 		<legend>Добавить новость</legend>
	<?php

		
		echo $form->label('created','[Дата:]');
		echo $form->input('created', array('dateFormat' => 'DMY','timeFormat' => 'NONE', 'minYear' => 2007, 'maxYear' => 2020, 'label' => false) );
		echo $form->input('name', array('label' => '[Заголовок:] ', 'style' => 'width: 500px') );
		
		echo $form->label('body','[Новость:]', array('style' => '') );
		echo $fck->load('News.body');	
		//echo $form->input('body', array('label' => 'Новость&nbsp;&nbsp;&nbsp;&nbsp;', 'style' => 'height: 300px') );
	?>
	</fieldset>
<?php echo $form->end('Сохранить');?>
</div>


