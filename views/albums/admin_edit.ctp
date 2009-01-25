
<div class="">
<br />
<p style="margin-bottom: 10px">
	<?php echo $html->link('Все Альбомы', array('action'=>'index'), array('style'=> "font-size: smaller; color: #777;") ); ?>
</p>
<p>
	<?php echo $html->link('Добавить Фотографию', array('controller' => 'images', 'action'=>'add',$albumId)); ?>
</p>
<?php echo $form->create('Album');?>
	<fieldset>
 		<legend>Редактировать альбом:&nbsp;<span style="font-size: smaller; color: #777;"><?php echo $form->value('name');?></span></legend>
	<?php
		echo $form->input('id');
		//echo $form->input('created', array('dateFormat' => 'DMY','timeFormat' => 'NONE', 'minYear' => 2007, 'maxYear' => 2020, 'label' => 'Дата&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;') );
		echo $form->input('name', array('label' => 'Заголовок ', 'style' => 'width: 259px') );
	?>
	</fieldset>
<?php echo $form->end('Сохранить');?>
</div>
	<div style= "width: 900px">
	<?php $i = 1;?>
	
	<?php foreach($images as $image): ?>
		<div class="thumb_admin">
			<?php echo $html->link( $html->image( 'gallery/s/'.$image['Image']['image'], array('alt' => $image['Image']['name'])), array('controller' => 'images', 'action' => 'view', $image['Image']['id']),null, null, false ); ?>
			<p>
				<?php echo $image['Image']['name'];?>
			</p>
		</div>
		<?php if ($i%5 == 0 ) {
					echo '<div style="clear:both; height: 20px"></div>';
				}
			$i++;
			?>
	<?php endforeach ?>	
	</div>
	<div style="clear:both"></div>
	


<?php //debug($images);?>
