<?php echo $this->element('product/product', array('cache' => false ) ); ?>

<div class="categories span-7 push-7">
	<ul class="category">
		<?php foreach ($categories as $category):?>			
				<li>
					<?php echo $html->link($category['Category']['name'],array('action'=>'index','cat:'.$category['Category']['id']),false,false,false);?>
				</li>
		<?php endforeach; ?>
	</ul>
</div>



