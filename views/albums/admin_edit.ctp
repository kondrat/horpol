<?php $html->addCrumb('Главная', array('controller'=>'pages','action'=>'index')); ?>
<?php $html->addCrumb('Альбомы ', array('controller'=>'albums','action'=>'index')); ?>
<?php //$html->addCrumb($brand['Brand']['name'], array()); ?>


<p style="margin-bottom: 10px">
	<?php echo $html->link('Все Альбомы', array('action'=>'index'), array('style'=> "font-size: smaller; color: #777;") ); ?>
</p>
<p>
	<?php echo $html->link('Добавить Фотографию', array('controller' => 'images', 'action'=>'add','album:'.$albumId)); ?>
</p>
<div class="span-21 push-1">
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

<div class="span-24">
	<?php $i = 1;?>
	<?php foreach($images as $image): ?>
		<?php $class=($i%6 == 0 )?'last':null;?>
	
	
		<div class="span-4 <?php echo $class;?>">
			<?php echo $html->link( $html->image( 'gallery/s/'.$image['Image']['image'], array('alt' => $image['Image']['name'])), array('controller' => 'images', 'action' => 'view', $image['Image']['id']),null, null, false ); ?>
			<p>
				<?php echo $image['Image']['name'];?>
			</p>
		</div>
		<?php $i++;?>
	<?php endforeach ?>	
</div>

