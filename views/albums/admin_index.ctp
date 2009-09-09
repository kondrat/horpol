<div class="actions span-24">
		<h3><?php echo $html->link('Добавить новый Фотоальбом', array('action'=>'add'),array('id'=>'albumNew')); ?></h3>
</div>
<div class="span-24">
	<div class="span-7 push-1 albumAdd" id="albumAddForm">
		<?php echo $form->create('Album');?>
			<?php
				echo $form->input('name', array('label' => 'Заголовок альбома', 'style' => 'width: 259px') );
			?>
		<?php echo $form->submit('Сохранить',array('class'=>'span-3'));?>
		<?php echo $form->end();?>
	</div>
</div>
	<?php $i = 1;?>		
	<?php foreach($albums as $album): ?>
		<?php if( $i%6 == 0 ) {
						 $last = 'last';
					}else {
						$last = null;
					}
		?>
		<div class="span-4 thumbAdmin <?php echo $last;?> ">
			<div style="text-align:center;">
			<?php if( isset($album['Image']['0']['image']) && $album['Image']['0']['image'] != null): ?>
				<?php echo $html->link( $html->image( 'gallery/s/'.$album['Image']['0']['image'], array('class'=>'thumbImg','alt'=>$album['Album']['name'])), array('controller' => 'albums', 'action' => 'edit',$album['Album']['id']),null, null, false ); ?>
			<?php else: ?>
				<?php echo $html->link( $html->image( 'gallery/s/default.jpg', array('class'=>'thumbImg','alt'=>$album['Album']['name'])), array('controller' => 'albums', 'action' => 'edit',$album['Album']['id']),null, null, false ); ?>
			<?php endif ?>
			<?php echo $html->image('icons/lens.png',array('class'=>'lens'));?>
		</div>
			<div style="font-weight:bold;text-align:center;">&laquo;<?php echo $album['Album']['name']; ?>&raquo;</div>
		
			<div style="text-align:center;font-size:90%;line-height:0.4em;">
				Кол-во фото:&nbsp;<?php echo $album['Album']['image_count']; ?>
			</div>
		</div>
		<?php $i++;?>
	<?php endforeach ?>	
	<div style="clear:both"></div>
