<?php $this->pageTitle = $cat['Category']['title']; ?>	
	<h1><?php echo $cat['Category']['name'];?></h1>
	<div class="slogan">
		<?php echo $cat['Category']['slogan'];?><!-- Здесь только лучшее от природы и производителей<br /> Каждая фабрика-яркая индивидуальность<br/><br/><br />-->
	</div>
	
<div class="maincontent-case2">	
	<?php if ( isset($products) && $products != array() ) : ?>	
			<?php foreach($products['Product'] as $product): ?>
			<div class="tumb">
				<?php 
					if($product['logo'] == null) {
						$product['logo'] = 'default.jpg';
					}
				?>
				<?php echo  $html->image( 'catalog/'.$product['logo'], array('alt' => $product['name'] ) ); ?>
				<p style="font-family: verdana, sans-serif;"> <?php echo $product['name'];?></p>
			</div>
			<?php endforeach ?>
		<?php else: ?>
			<?php echo 'В данном разделе отсутствуют товары'; ?>
		<?php endif ?>
</div>
