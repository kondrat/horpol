<?php echo $html->image('gallery/b/'.$image['Image']['image']);?>
<br />
<?php echo $form->create('Image');?>
	<fieldset>
 		<legend>Редактировать Фото:&nbsp;<span style="font-size: smaller; color: #777;"><?php echo $form->value('name');?></span></legend>
	<?php
		echo $form->input('id');
		//echo $form->input('created', array('dateFormat' => 'DMY','timeFormat' => 'NONE', 'minYear' => 2007, 'maxYear' => 2020, 'label' => 'Дата&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;') );
		echo $form->input('name', array('label' => 'Заголовок ', 'style' => 'width: 259px') );
	?>
	</fieldset>
<?php echo $form->end('Сохранить');?>

<?php echo $html->link('Удалить '.$image['Image']['name'], array('action' => 'delete',$image['Image']['id']), null, sprintf('Удалить   %s?', $image['Image']['name']) ); ?>
<br />
<?php //debug($image);?>
