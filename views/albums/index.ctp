	<h1>Фотоальбомы</h1>
	<div class="maincontent">
		<?php //debug($albums);?>
	</div>
	<?php foreach($albums as $album): ?>
		<?php if( isset($album['Image']['0']['image']) && $album['Image']['0']['image'] != null): ?>
<<<<<<< HEAD:views/albums/index.ctp
		<div class="tumb3">
=======
		<div class="tumb2">
>>>>>>> ec844de8c47dabe98e93be055f311ebd25476b91:views/albums/index.ctp
			<div class="album"><?php echo $html->link( $html->image( 'gallery/s/'.$album['Image']['0']['image'], array('alt' => $album['Album']['name'], 'class' => 'album')), array('controller' => 'images', 'action' => 'index',$album['Album']['id']),null, null, false ); ?></div>
			<p> Фотографий:&nbsp;<?php echo $album['Album']['image_count'];?></p>
			<p>
				<span><?php echo $album['Album']['name']; ?></span>
			</p>
		</div>
		<?php endif ?>
	<?php endforeach ?>	
	<div style="clear:both"></div>
	
	<div class="maincontent">
	</div>	
	

	
	

	
