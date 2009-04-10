<?php $this->pageTitle = 'Новости' ; ?>
<div class="news">

	<p>НОВОСТИ</p>
	<?php //debug($listNews);?>
	

	
	
	<?php foreach($listNews as $list): ?>
		<span class="newspage">
			<p><?php echo $html->link( date( 'd.m.y', strtotime($list['News']['created']) ).' '.$list['News']['name'] , array('controller' => 'News', 'action' => 'view', $list['News']['id']), array('class' => 'menulup') ) ;?></p>		
			<?php 
				App::import('Vendor', 'fly2');
				$fly2 = new fly2();
				echo $html->link( $fly2->fragment(strip_tags($list['News']['body']), 70) , array('controller' => 'News', 'action' => 'view', $list['News']['id']), array('class' => 'menul'),false,false,true ); 
			?>
		</span>
	<?php endforeach ?>

	
</div>