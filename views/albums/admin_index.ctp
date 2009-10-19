<?php echo $javascript->link(array('jquery/jquery.qtip.min','albumIndex'),false);?>
<?php $html->addCrumb('Главная', array('controller'=>'pages','action'=>'index')); ?>
<?php $html->addCrumb('Альбомы', array()); ?>
<div class="actions span-24">
		<h3><?php echo $html->link('Добавить новый Фотоальбом', array('action'=>'add'),array('id'=>'albumNew')); ?></h3>
</div>
<div class="span-24" style="position:relative;">
	<div class="span-8  albumAdd" id="albumAddForm">
		<div class="albumAddFormWrapper">
		<?php echo $form->create('Album');?>
			<?php
				echo $form->input('name', array('label' => 'Заголовок альбома', 'style' => 'width: 259px') );
			?>
		<?php echo $form->submit('Сохранить',array('class'=>'span-3'));?>
		<?php echo $form->end();?>
		</div>
		<div class="test">
			<!--<div class="fancy_bg fancy_bg_n"></div>
			<div class="fancy_bg fancy_bg_ne"></div>-->
			<div class="fancy_bg fancy_bg_e"></div>
			<div class="fancy_bg fancy_bg_se"></div>
			<div class="fancy_bg fancy_bg_s"></div>
			<div class="fancy_bg fancy_bg_sw"></div>
			<div class="fancy_bg fancy_bg_w"></div>
			<!--<div class="fancy_bg fancy_bg_nw"></div>-->
		</div>
	</div>
</div>
	
	<?php foreach($albums as $album): ?>

		<div class="thumbAdmin">
			<div style="text-align:center;">
			<?php if( isset($album['Image']['0']['image']) && $album['Image']['0']['image'] != null): ?>
				<?php echo $html->link( $html->image( 'gallery/s/'.$album['Image']['0']['image'], array('class'=>'thumbImg','alt'=>$album['Album']['name'])), array('controller' => 'albums', 'action' => 'view',$album['Album']['id']),null, null, false ); ?>
			<?php else: ?>
				<?php echo $html->link( $html->image( 'gallery/s/default.jpg', array('class'=>'thumbImg','alt'=>$album['Album']['name'])), array('controller' => 'albums', 'action' => 'view',$album['Album']['id']),null, null, false ); ?>
			<?php endif ?>
			<div class="lens"></div>
		</div>
			<div style="font-weight:bold;text-align:center;line-height:1em;">&laquo;<?php echo $album['Album']['name']; ?>&raquo;</div>
		
			<div style="text-align:center;font-size:90%;line-height:1em;">
				Кол-во фото:&nbsp;<?php echo $album['Album']['image_count']; ?>
			</div>
		</div>
	<?php endforeach ?>	
	<div style="clear:both"></div>
