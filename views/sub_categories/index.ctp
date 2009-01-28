<div class="cat">
	<?php //debug($brand); ?>
	<?php echo $html->image('catalog/'.$brand['Brand']['logo'], array('class'=> 'catimg')); ?>	
	<br />
	<?php //debug($subCat);?>
	<ul>
		<?php foreach( $subCat as $sub ): ?>
		<li><?php echo $html->image('point.gif');?>&nbsp;&nbsp;
			<?php if( isset($products) && $sub['SubCategory']['name'] == $products['SubCategory']['name']): ?>
				<?php echo $html->link($sub['SubCategory']['name'], array('action' => 'index','category:'.$category,'brand:'.$brand['Brand']['id'],'cat:'.$sub['SubCategory']['id']), array('class' => 'catalogmenu', 'id' => 'catalog-link') ); ?>
			<?php else: ?>
				<?php echo $html->link($sub['SubCategory']['name'], array('action' => 'index','category:'.$category,'brand:'.$brand['Brand']['id'],'cat:'.$sub['SubCategory']['id']), array('class' => 'catalogmenu') ); ?>			
			<?php endif ?> 
		</li>
		<?php endforeach ?>
	</ul>
		
</div>
<<<<<<< HEAD:views/sub_categories/index.ctp
	<div style="margin-bottom: 10px;clear:both;"></div>
	<hr />
=======
	<div style="clear:both;"></div>
	<hr style="margin-top: 20px;" />
>>>>>>> ec844de8c47dabe98e93be055f311ebd25476b91:views/sub_categories/index.ctp
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
				<?php echo  $html->image( 'catalog/'.$product['logo'], array('alt' => '' ) ); ?>
				<p style="font-family: verdana, sans-serif;"> <?php echo $product['name'];?></p>
			</div>
			<?php endforeach ?>
		<?php else: ?>
			<?php echo $brand['Brand']['body'];?>
		<?php endif ?>
	
	
	</div>
</div>

