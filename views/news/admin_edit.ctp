



<div class="">
<?php echo $form->create('News');?>
	<fieldset>
 		<legend>Редактировать новость</legend>
	<?php
		echo $form->input('id');
		echo $form->input('created', array('dateFormat' => 'DMY','timeFormat' => 'NONE', 'minYear' => 2007, 'maxYear' => 2020, 'label' => 'Дата&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;') );
		echo $form->input('name', array('label' => 'Заголовок ', 'style' => 'width: 259px') );
		
		echo $form->label('body','Новость&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', array('style' => '') );
		echo '<br />';
		echo $fck->load('News.body');		
		
		//echo $form->input('body', array('label' => 'Новость&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', 'style' => 'height: 300px') );
	?>
	</fieldset>
<?php echo $form->end('Сохранить');?>
</div>
<p>
	<?php echo $html->link('Все новости', array('action'=>'index')); ?>
</p>
<p>
	<?php echo $html->link('Добавить новость', array('action'=>'add')); ?>
</p>
