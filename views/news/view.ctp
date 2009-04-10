<?php $this->pageTitle = 'Новости | '.date( 'd.m.y', strtotime($news['News']['created']) ).' '.$news['News']['name'] ; ?>

<div class="news">
	<?php //debug($listNews);
		//App::import('Core', 'Flay');
	?>
	
	
	<span class="newspage">
		<div class="news_header_color"><?php echo date( 'd.m.y', strtotime($news['News']['created']) ).' '.$news['News']['name']; ?></div>
		<?php echo $news['News']['body']; ?>
	</span>
	
	<?php foreach($listNews as $list): ?>
		<span class="newspage">
			<p><?php echo $html->link( date( 'd.m.y', strtotime($list['News']['created']) ).' '.$list['News']['name'] , array('controller' => 'News', 'action' => 'view', $list['News']['id']), array('class' => 'menulup') ) ;?></p>
			<?php 
				App::import('Vendor', 'fly2');
				$fly2 = new fly2();
			?>
 		
			<?php echo $html->link( $fly2->fragment(strip_tags($list['News']['body']), 70), array('controller' => 'News', 'action' => 'view', $list['News']['id']), array('class' => 'menul'),false,false,true ); ?>
		</span>
	<?php endforeach ?>
	<span class="newspage">
		<p><?php echo $html->link('Все новости', array('action'=>'index')); ?></p>
	</span>

</div>



