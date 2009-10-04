<?php $html->addCrumb('Главная', array('controller'=>'pages','action'=>'index')); ?>
<?php $html->addCrumb('Альбомы', array('controller'=>'albums','action'=>'index')); ?>
<?php $html->addCrumb($album['Album']['name'], array()); ?>

<div class="">

<div class="actions span-24">
	<h3><?php echo $html->link('Добавить Фотографию', array('controller' => 'images', 'action'=>'add','album:'.$album['Album']['id'])); ?></h3>
</div>
<div class="span-24">
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
	<?php foreach($album['Image'] as $image): ?>
		<?php $class=($i%6 == 0 )?'last':null;?>
	
	
		<div class="span-4 <?php echo $class;?>">
			<?php echo $html->link( $html->image( 'gallery/s/'.$image['image'], array('alt' => $image['name'])), array('controller' => 'images', 'action' => 'view', $image['id']),null, null, false ); ?>
			<p>
				<?php echo $image['name'];?>
			</p>
		</div>
		<?php $i++;?>
	<?php endforeach ?>	
</div>




