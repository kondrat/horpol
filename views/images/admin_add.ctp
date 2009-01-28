
<div class="">
<?php echo $form->create('Image', array( 'type' => 'file') );?>
	<fieldset>
 		<legend>Добавить фото</legend>
	<?php
		if ($session->check('Album.Name')){
			echo 'Альбом: <span style="font-size: larger; font-weight:bold; font-style: italic">'.$session->read('Album.Name').'</span>';
			
			echo '<br />';
			echo $html->link('добавить в другой альбом',array('controller'=> 'albums','action' => 'index') );
		} else {
			echo $form->input('Album', array('value' => $selected, 'label'=>'Выберите альбом') );
		}
		echo '<p>'.$html->link('или создайте новый альбом', array('controller' => 'albums', 'action' => 'add') ).'</p>';
		echo '<br />';
		//echo $form->input('created', array('dateFormat' => 'DMY','timeFormat' => 'NONE', 'minYear' => 2007, 'maxYear' => 2020, 'label' => 'Дата&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;') );
		echo $form->input('name', array('label' => 'Описание фотографии', 'style' => 'width: 259px') );
		
	?>
	

		<?php echo $form->input('Image.userfile', array('type'=>'file', 'label'=>'Загрузка фотографии') ); ?>
			<br/>
		<?php //echo $form->input('data/extra_field'); ?>
		<br/>
	<?php //`echo $form->submit('Загрузить логотип', array('name' => 'logo') );?>	

<?php echo $form->end('Сохранить');?>
</div>

</fieldset>	

