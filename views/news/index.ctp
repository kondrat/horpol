<div class="news">

	<p>НОВОСТИ</p>
	<?php //debug($listNews);?>
	

	
	
	<?php foreach($listNews as $list): ?>
		<span class="newspage">
			<p><?php echo $html->link( date( 'd.m.y', strtotime($list['News']['created']) ).' '.$list['News']['name'] , array('controller' => 'News', 'action' => 'view', $list['News']['id']), array('class' => 'menulup') ) ;?></p>		
			<?php 
				App::import('Core', 'Flay');
				echo $html->link( Flay::fragment($list['News']['body'],86) , array('controller' => 'News', 'action' => 'view', $list['News']['id']), array('class' => 'menul') ); 
			?>
		</span>
	<?php endforeach ?>

	
</div>