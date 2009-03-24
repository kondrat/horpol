<div class="maincontent">
	<br />

	
	
		<p style="font-size:larger;"><?php echo date( 'd.m.y', strtotime($news['News']['created']) ).' '.$news['News']['name']; ?></p>
		<br />


	<p><?php echo $news['News']['body']; ?></p>
		<br />
			<p style="font-size:smaller;"><?php echo $html->link('Редактировать новость', array('action'=>'edit', $news['News']['id']), array('style' => "color: #777;") ); ?></p>
			<p style="font-size:smaller;"><?php echo $html->link('Удалить новость', array('action'=>'delete', $news['News']['id']), array('style' => "color:#FF5E5E;"), sprintf('Удалить новость от %s?', date( 'd.m.y', strtotime($news['News']['created'])) ) ); ?></p>

		<br />	
		<hr />
		<br />
	<?php foreach($listNews as $list): ?>
	<?php echo $html->link( date( 'd.m.y', strtotime($list['News']['created']) ).' '.$list['News']['name'] , array('controller' => 'News', 'action' => 'view', $list['News']['id']), array('class' => 'menulup') ) ;?>

		<p>
			<?php
				App::import('Vendor', 'fly2');
				$fly2 = new fly2();
				echo  $fly2->fragment(strip_tags($list['News']['body']), 70);
			?>
		<p>
	<br />
	<?php endforeach ?>
	
<p>
	<?php echo $html->link('Все новости', array('action'=>'index')); ?>
</p>

</div>



