<?php $this->pageTitle = 'Фотоальбомы | '.$images['0']['Album']['name'] ; ?>

<?php echo $javascript->link(array('jquery/jquery.fancybox-1.2.1.pack','horpol'),false);?>



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

	
		<div style="display:none;">
			<?php foreach($restImgs as $restImg): ?>
				<div class="tumbAlbum test1">
					<p class="album_image"> <?php echo $html->link( $html->image( 'gallery/s/'.$restImg['Image']['image'], array('alt' => $restImg['Image']['name'] ) ), '/img/gallery/b/'.$restImg['Image']['image'] ,array('title' => $restImg['Image']['name'], 'rel' => 'group1'), null, false ); ?><p>
				</div>		
			<?php endforeach ?>	
		</div>	
	
	</p>
	<div style="clear:both"></div>
		<?php 	 
			$paginator->options(array('url' => $this->passedArgs )); 
		?>	
		<?php if( isset($this->params['paging']['Image']['pageCount']) && $this->params['paging']['Image']['pageCount'] > 1 ): ?>
			<p class="counter">
				<?php echo $paginator->counter(array('format' => __('Страница %page% из %pages%.', true) ) );?>
			</p>
			<div class="paging">
				<table>
					<tr>
						<td><?php echo $paginator->prev('Назад', array(), null, array('class'=>'disabled'));?></td>
			  			<td><?php echo $paginator->numbers(array('separator' => ' '));?></td>
						<td><?php echo $paginator->next('Вперед', array(), null, array('class'=>'disabled'));?></td>
					</tr>
				</table>
			</div>
		<?php endif ?>	