<?php $javascript->link(array('jquery.fancybox-1.2.1.pack','horpol'), false);?>



<?php $html->addCrumb( 'Фотоальбомы', array('controller' => 'albums', 'action' => 'index'), array('class' => '') ); ?>
<?php $html->addCrumb( '<span>'.$images['0']['Album']['name'].'</span>', null, array('class' => 'temp') ); ?>
<h1><?php echo $html->getCrumbs( ' &raquo; ' );?></h1>

<div class="maincontent">
	<?php //debug($images); ?>
</div>
	<p  >
	<?php foreach($images as $image): ?>
		<div class="tumbAlbum test1">
			<?php //echo $html->link( $html->image( 'gallery/s/'.$image['Image']['image'], array('alt' => $image['Image']['name'])), array('controller' => 'images', 'action' => 'view',$image['Image']['id']),null, null, false ); ?>
			<p class="album_image"> <?php echo $html->link( $html->image( 'gallery/s/'.$image['Image']['image'], array('alt' => $image['Image']['name'] ) ), '/img/gallery/b/'.$image['Image']['image'] ,array('title' => $image['Image']['name'], 'rel' => 'group1'), null, false ); ?><p>

			<p><span><?php echo $image['Image']['name']; ?></span></p>
		</div>
	<?php endforeach ?>	
	</p>
	<div style="clear:both"></div>
	
