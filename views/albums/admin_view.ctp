	<?php //debug($album);?>
	
	<? if ( in_array($session->read('Auth.User.group_id'), array(1,2,3) ) ): ?>
		<p><?php echo $html->link('Добавить новость', array('action'=>'add')); ?></p>
	<? endif ?>
	
	<span class='menulup' >
		<?php echo date( 'd.m.y', strtotime($album['Album']['created']) ).' '.$album['Album']['name']; ?>
	</span>
		<? if ( in_array($session->read('Auth.User.role'), array('admin') ) ): ?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo $html->link('Удалить альбом', array('action'=>'delete', $album['Album']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $album['Album']['id'])); ?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo $html->link('Редактировать альбом', array('action'=>'edit', $album['Album']['id'])); ?>
		<? endif ?>		
	

<p>
	<?php echo $html->link('Добавить картинку', array('controller' => 'images', 'action'=>'add', $this->params['pass'][0])); ?>
</p>	
<p>
	<?php echo $html->link('Все альбомы', array('action'=>'index')); ?>
</p>



