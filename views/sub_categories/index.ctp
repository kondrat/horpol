
<?php 
	if( isset($products) ) {
		$this->pageTitle = $subCats['Category']['name'].' '.$brand['Brand']['name'].' | '.$products['SubCategory']['name']; 
	} else {
		$this->pageTitle = $subCats['Category']['name'].' '.$brand['Brand']['name']; 
	}
?>

<div class="cat">

	<?php echo $html->image('catalog/'.$brand['Brand']['logo'], array('class'=> 'catimg')); ?>
	<?php echo $html->image('banner/banner_test20.png', array('class'=> 'catimg','style'=>'margin-left:35px;')); ?>
	<br />

	<ul>
		<?php foreach( $subCats['SubCategory'] as $sub ): ?>
		<li><?php echo $html->image('point.gif');?>&nbsp;&nbsp;
			<?php if( isset($products) && $sub['name'] == $products['SubCategory']['name']): ?>
				<?php echo $html->link($sub['name'], array('action' => 'index','category:'.$this->params['named']['category'],'brand:'.$brand['Brand']['id'],'subcat:'.$sub['id']), array('class' => 'catalogmenu', 'id' => 'catalog-link') ); ?>
			<?php else: ?>
				<?php echo $html->link($sub['name'], array('action' => 'index','category:'.$this->params['named']['category'],'brand:'.$brand['Brand']['id'],'subcat:'.$sub['id']), array('class' => 'catalogmenu') ); ?>			
			<?php endif ?> 
		</li>
		<?php endforeach ?>
	</ul>
		
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
					if($product['logo'] == null) {
						$product['logo'] = 'default.jpg';
					}
				?>
				<?php echo  $html->image( 'catalog/'.$product['logo'], array('alt' => $product['name'] ) ); ?>
				<p style="font-family: verdana, sans-serif;"> <?php echo $product['name'];?></p>
			</div>
			<?php endforeach ?>
		<?php else: ?>
			<?php echo $brand['Brand']['body'];?>
		<?php endif ?>
	
</div>

