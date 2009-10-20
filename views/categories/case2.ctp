<?php echo $javascript->link(array('jquery/jquery.fancybox-1.2.1.pack','horpol'),false);?>
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
	
<div class="maincontent-case2">	
	<?php if ( isset($products) && $products != array() ) : ?>	
			<?php foreach($products['SubCategory'][0]['Product'] as $product): ?>
			<div class="tumb">
				
				<?php
							$imagePathS = $imagePathB  = null;
							if($product['logo1'] != null) {
								$imagePathS = 'catalog/s/'.$product['logo1'];
								$imagePathB = '/img/catalog/b/'.$product['logo1'];								
								echo $html->link( $html->image($imagePathS,array('alt'=> $product['name']) ),$imagePathB,array('class'=>'bigProd'),false,false );
																
							} elseif($product['logo'] != null) {
								echo  $html->image( 'catalog/'.$product['logo'], array('alt' => $product['name'] ) );							
							} else {
								echo  $html->image( 'catalog/s/product_logo.jpg', array('alt' => $product['name'] ) );
							}
				?>								
				<p style="font-family: verdana, sans-serif;"> <?php echo $product['name'];?></p>
			
			</div>
			<?php endforeach ?>
		<?php else: ?>
			<?php echo 'В данном разделе отсутствуют товары'; ?>
		<?php endif ?>
</div>
