<div class="news">
	<?php //debug($listNews);
		App::import('Core', 'Flay');
	?>
	
	
	<span class="newspage">
		<p><?php echo date( 'd.m.y', strtotime($news['News']['created']) ).' '.$news['News']['name']; ?></p>
		<?php echo $news['News']['body']; ?>
	</span>
	
	<?php foreach($listNews as $list): ?>
		<span class="newspage">
			<p><?php echo $html->link( date( 'd.m.y', strtotime($list['News']['created']) ).' '.$list['News']['name'] , array('controller' => 'News', 'action' => 'view', $list['News']['id']), array('class' => 'menulup') ) ;?></p>
		
			<?php echo $html->link( Flay::fragment($list['News']['body'],86), array('controller' => 'News', 'action' => 'view', $list['News']['id']), array('class' => 'menul') ); ?>
		</span>
	<?php endforeach ?>
	<span class="newspage">
		<p><?php echo $html->link('Все новости', array('action'=>'index')); ?></p>
	</span>

</div>



