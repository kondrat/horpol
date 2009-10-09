<?php $this->pageTitle = $cat['Category']['title']; ?>

<div>	
	<?php if(isset($cat['Banner']['0']['logo'])&&$cat['Banner']['0']['logo']!= null):?>
		<?php echo $html->image('banner/'.$cat['Banner']['0']['logo']); ?>
	<?php endif ?>	
</div>	

	<h1><?php echo $cat['Category']['name'];?></h1>
	<div class="slogan">
		<?php echo $cat['Category']['slogan'];?><!-- Здесь только лучшее от природы и производителей<br /> Каждая фабрика-яркая индивидуальность<br/><br/><br />-->
	</div>
	<?php foreach($brands['Brand'] as $brand): ?>
		<div class="tumb2">
			<?php echo $html->link( $html->image( 'catalog/'.$brand['logo'], array('alt' => $brand['name'])), array('controller' => 'sub_categories', 'action' => 'index', 'category:'.$cat['Category']['id'], 'brand:'.$brand['id']),null, null, false ); ?>
			<p>
				<?php echo $html->link( $cat['Category']['name'].'<br />'.$brand['name'], array('controller' => 'sub_categories', 'action' => 'index', 'category:'.$cat['Category']['id'], 'brand:'.$brand['id']), array('class' => "catalogmenu"),false, false ); ?>
			</p>
		</div>
	<?php endforeach ?>	
	<div style="clear:both"></div>
	<hr />
	<div class="maincontent">
		<?php echo $cat['Category']['body']; ?>
	</div>	


