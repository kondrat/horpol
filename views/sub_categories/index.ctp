<?php echo $javascript->link(array('jquery/jquery.fancybox-1.2.1.pack','horpol'),false);?>
<?php 
	if( isset($products) ) {
		$this->pageTitle = $subCats['Category']['name'].' '.$brand['Brand']['name'].' | '.$products['SubCategory']['name']; 
	} else {
		$this->pageTitle = $subCats['Category']['name'].' '.$brand['Brand']['name']; 
	}
?>

<div class="cat">

	<?php echo $html->image('catalog/'.$brand['Brand']['logo'], array('class'=> 'catimg')); ?>
	
	<?php if( isset($subCats['Banner']['0']['logo']) ): ?>	
		<?php if($subCats['Banner']['0']['url'] != null ):?>
			<?php echo $html->link($html->image('banner/'.$subCats['Banner']['0']['logo'],array('class'=>'catimg','style'=>'margin-left:35px;border:none')),$subCats['Banner']['0']['url'],array(),false,false)  ; ?>
		<?php else: ?>
			<?php echo $html->image('banner/'.$subCats['Banner']['0']['logo'], array('class'=> 'catimg','style'=>'margin-left:35px;')); ?>
		<?php endif ?>		
	<?php endif ?>
	<br />

	
		<?php foreach( $subCats['SubCategory'] as $sub ): ?>
		
		<div class="catul">		
			<?php if( isset($products) && $sub['name'] == $products['SubCategory']['name']): ?>
				<?php echo $html->link($sub['name'].' <span class="lookHere">Посмотреть здесь</span>', array('action' => 'index','category:'.$this->params['named']['category'],'brand:'.$brand['Brand']['id'],'subcat:'.$sub['id']), array('class' => 'catalogmenu2', 'id' => 'catalog-link2'),false,false,false ); ?>
			
			<?php else: ?>
				<?php echo $html->link($sub['name'].' <span class="lookHere">Посмотреть здесь</span>', array('action' => 'index','category:'.$this->params['named']['category'],'brand:'.$brand['Brand']['id'],'subcat:'.$sub['id']), array('class' => 'catalogmenu2', 'id' => 'catalog-link2'),false,false,false ); ?>			
			<?php endif ?> 
			
		</div>
		
		<?php endforeach ?>
	
		
</div>

	<div style="clear:both;"></div>
	<hr style="margin-top: 20px;" />

<div class="maincontent">	
	<?php if (isset($products) ) : ?>	
		<h1><?php echo $products['SubCategory']['name'];?></h1>
		<?php //debug($products);?>
			<?php foreach($products['Product'] as $product): ?>
			<div class="tumb">
				
				<?php
							$imagePathS = $imagePathB  = null;
							if($product['logo1'] != null) {
								$imagePathS = 'catalog/s/'.$product['logo1'];
								$imagePathB = '/img/catalog/b/'.$product['logo1'];								
								echo $html->link( $html->image($imagePathS,array('alt'=> $product['name']) ),$imagePathB,array('class'=>'bigProd','title'=>$product['name']),false,false );
																
							} elseif($product['logo'] != null) {
								echo  $html->image( 'catalog/'.$product['logo'], array('alt' => $product['name'] ) );							
							} else {
								echo  $html->image( 'catalog/s/product_logo.jpg', array('alt' => $product['name'] ) );
							}
				?>				
				
				
				<?php  ?>
				
				
				
				
				
				
				<p style="font-family: verdana, sans-serif;"> <?php echo $product['name'];?></p>
			</div>
			<?php endforeach ?>
		<?php else: ?>
			<?php echo $brand['Brand']['body'];?>
		<?php endif ?>
	
</div>

