


<div class="">
<?php echo $form->create('Album', array( 'type' => 'file'));?>
	<fieldset>
 		<legend>Добавить Альбом</legend>
	<?php
		//echo $form->input('created', array('dateFormat' => 'DMY','timeFormat' => 'NONE', 'minYear' => 2007, 'maxYear' => 2020, 'label' => 'Дата&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;') );
		echo $form->input('name', array('label' => 'Заголовок альбома', 'style' => 'width: 259px') );
	?>

<?php echo $form->end('Сохранить');?>
</div>

</fieldset>	

<p>
	<?php echo $html->link('Все альбомы', array('action'=>'index')); ?>
</p>

