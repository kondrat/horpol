<?php echo $this->element('product/product', array('cache' => false ) ); ?>
		<div class="page">
			<?php if( isset($this->params['paging']['Brand']['pageCount']) && $this->params['paging']['Brand']['pageCount'] > 1 ): ?>
				<?php echo $paginator->prev($html->image('icons/left_arrow.png',array('class'=>'pageImgPrev','alt'=>__('Prev',true) ) ), array('escape' => false ) , $html->image('icons/left_arrow_disable.png'),  array('escape' => false ,'class'=>'menuPage'));?>
  				<?php echo $paginator->numbers( array('modulus'=>'5','separator'=>' &middot; ', 'class' => 'menuPage' ), null );?>
				<?php echo $paginator->next( $html->image('icons/right_arrow.png',array('class'=>'pageImgNext','alt'=>__('Next',true) ) ), array('escape' => false ), $html->image('icons/right_arrow_disable.png'), array('escape' => false ,'class'=>'menuPage'));?>
			<?php endif ?>
		</div>


<div class="span-24" style="">
	<h5 style="border-bottom:1px solid silver;margin-bottom:1em;float:left;margin-left:1em;">Бренды категории <span style="color:teal;">&laquo;<?php echo $catSelected;?>&raquo;</span></h5>
	<h5 style="border-bottom:1px solid silver;margin-bottom:1em;float:left;margin-left:1em;">Все Бренды</h5>
</div>
<?php 
			if(isset($this->params['named']['cat'])){
				$catId = 'cat:'.$this->params['named']['cat'];
			} else {
				$catId = null;
			}
?>
<?php foreach ($brands as $brand):?>
		<div class="brand">
			<div class="brandImg" style="text-align:center;border:1px solid silver;padding:3px;">
				<?php //echo $brand['Brand']['id'];?>
				<?php echo $html->link($html->image( 'catalog/'.$brand['Brand']['logo']),array('action'=>'index',$catId,'brand:'.$brand['Brand']['id']),array('class'=>'brImg'),false,false); ?>
			</div>
			<div class="brandName" style="font-weight:bold;text-align:center;">
				&laquo;<?php echo $html->link($brand['Brand']['name'],array('action'=>'index',$catId,'brand:'.$brand['Brand']['id']),array('class'=>'brA'),false,false); ?>&raquo;
			</div>
		</div>

<?php endforeach; ?>

	<?php //echo $paginator->sort('Бренд','name');?>
	<?php //echo $paginator->sort('Логотип','logo');?>




