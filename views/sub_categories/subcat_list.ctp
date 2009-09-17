<?php echo $this->element('product/product', array('firstStep'=>'prevStep','secondStep'=>'prevStep','thirdStep'=>'activeStep','forthStep'=>'nextStep','cache' => false ) ); ?>

<?php 
			if(isset($this->params['named']['cat'])){
				$catId = 'cat:'.$this->params['named']['cat'];
			} else {
				$catId = null;
			}
			if(isset($this->params['named']['brand'])){
				$brandId = 'brand:'.$this->params['named']['brand'];
			} else {
				$brandId = null;
			}
?>
<div class="span-24 subCategoryWrapper" style="margin-bottom:1em;">
	<?php if(isset($subCategories) && $subCategories != array()):?>
	<ul class="subCategory">
		<?php foreach ($subCategories as $subCategory):?>			
				<li class="span-10" style="float:left;">
					<?php echo $html->link($subCategory['SubCategory']['name'],array('action'=>'index',$catId,$brandId,'subcat:'.$subCategory['SubCategory']['id']),false,false,false);?>
					<span style="font-size:smaller;">товаров:&nbsp;</span><span style="font-weight:bold;color:maroon;"><?php echo $pc = (isset($subCategory['SubCategory']['product_count'])?$subCategory['SubCategory']['product_count']:'0');?></span>
				</li>
		<?php endforeach; ?>
	</ul>
	<?php else: ?>
		<h3>Создать новый подраздел</h3>
	<?php endif ?>
	
			<div class="page">
			<?php if( isset($this->params['paging']['Product']['pageCount']) && $this->params['paging']['Product']['pageCount'] > 1 ): ?>
				<?php $paginator->options(array('url' => $this->passedArgs )); ?>
				<?php echo $paginator->prev($html->image('icons/left_arrow.png',array('class'=>'pageImgPrev','alt'=>__('Prev',true) ) ), array('escape' => false ) , $html->image('icons/left_arrow_disable.png'),  array('escape' => false ,'class'=>'menuPage'));?>
  				<?php echo $paginator->numbers( array('modulus'=>'5','separator'=>' &middot; ', 'class' => 'menuPage' ), null );?>
				<?php echo $paginator->next( $html->image('icons/right_arrow.png',array('class'=>'pageImgNext','alt'=>__('Next',true) ) ), array('escape' => false ), $html->image('icons/right_arrow_disable.png'), array('escape' => false ,'class'=>'menuPage'));?>
			<?php endif ?>
			</div>
	
</div>

<div class="span-24">
	<?php if(isset($products)): ?>
		<?php if($products != array()):?>
			<?php foreach($products as $product): ?>
				<div class="span-7">
					<?php echo $html->link( $html->image('catalog/'.$product['Product']['logo'],array('alt'=>$product['Product']['name']) ),array(),false,false,false );?>
					<?php echo $product['Product']['name'];?>
				</div>
			<?php endforeach ?>
		<?php else: ?>
			<div class="span-4 push-5" style="color:red;border-top:1px solid silver;">NO Produts yet</div>
		<?php endif ?>
	<?php endif?>
</div>
	<?php //echo $paginator->sort('Бренд','name');?>
	<?php //echo $paginator->sort('Логотип','logo');?>




