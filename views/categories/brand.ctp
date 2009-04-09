<?php $this->pageTitle = $cat['Category']['title']; ?>	
	<h1><?php echo $cat['Category']['name'];?></h1>
	<div class="slogan"><br/>Здесь только лучшее от природы и производителей<br /> Каждая фабрика-яркая индивидуальность<br/><br/><br /></div>
	<?php foreach($brands as $brand): ?>
		<div class="tumb2">
			<?php echo $html->link( $html->image( 'catalog/'.$brand['Brand']['logo'], array('alt' => $brand['Brand']['name'])), array('controller' => 'sub_categories', 'action' => 'index', 'category:'.$cat['Category']['id'], 'brand:'.$brand['Brand']['id']),null, null, false ); ?>
			<p>
				<?php echo $html->link( $cat['Category']['name'].'<br />'.$brand['Brand']['name'], array('controller' => 'sub_categories', 'action' => 'index', 'category:'.$cat['Category']['id'], 'brand:'.$brand['Brand']['id']), array('class' => "catalogmenu"),false, false ); ?>
			</p>
		</div>
	<?php endforeach ?>	
	<div style="clear:both"></div>
	<hr />
	<div class="maincontent">
		<?php echo $cat['Category']['body']; ?>
	</div>	


