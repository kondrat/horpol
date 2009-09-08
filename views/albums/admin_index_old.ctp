<div class="actions">
		<h3><?php echo $html->link('Добавить новый Фотоальбом', array('action'=>'add')); ?></h3>
</div>		
	<?php foreach($albums as $album): ?>
		<div class="span-4 thumbAdmin">
			<?php if( isset($album['Image']['0']['image']) && $album['Image']['0']['image'] != null): ?>
				<?php echo $html->link( $html->image( 'gallery/s/'.$album['Image']['0']['image'], array('alt' => $album['Album']['name'])), array('controller' => 'albums', 'action' => 'edit',$album['Album']['id']),null, null, false ); ?>
			<?php else: ?>
				<?php echo $html->link( $html->image( 'gallery/s/default.jpg', array('alt' => $album['Album']['name'])), array('controller' => 'albums', 'action' => 'edit',$album['Album']['id']),null, null, false ); ?>
			<?php endif ?>
			<p>
				<i><?php echo $album['Album']['name']; ?></i>
			</p>
			<p>
				Кол-во фото:&nbsp;<?php echo $album['Album']['image_count']; ?>
			</p>
			<p>
				<?php echo $html->link('Редактировать',array('controller' => 'albums', 'action' => 'edit',$album['Album']['id']),null, null, false ); ?>
			</p>
			<p>
				<?php echo $html->link('Удалить',array('controller' => 'albums', 'action' => 'delete',$album['Album']['id']), array('style'=> "font-size: smaller; color: #777;"), sprintf('Вы уверены, что хотите удалить %s, содержащий %s фото?', $album['Album']['name'],  $album['Album']['image_count']), false ); ?>
			</p>
		</div>
		<?php //echo $html->link('Редактировать');?>
	<?php endforeach ?>	
	<div style="clear:both"></div>