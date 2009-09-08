<?php echo $this->element('product/product', array('cache' => false ) ); ?>
		<div class="page">
			<?php if( isset($this->params['paging']['Brand']['pageCount']) && $this->params['paging']['Brand']['pageCount'] > 1 ): ?>
				<?php echo $paginator->prev($html->image('icons/left_arrow.png',array('class'=>'pageImgPrev','alt'=>__('Prev',true) ) ), array('escape' => false ) , $html->image('icons/left_arrow_disable.png'),  array('escape' => false ,'class'=>'menuPage'));?>
  				<?php echo $paginator->numbers( array('modulus'=>'5','separator'=>' &middot; ', 'class' => 'menuPage' ), null );?>
				<?php echo $paginator->next( $html->image('icons/right_arrow.png',array('class'=>'pageImgNext','alt'=>__('Next',true) ) ), array('escape' => false ), $html->image('icons/right_arrow_disable.png'), array('escape' => false ,'class'=>'menuPage'));?>
			<?php endif ?>
		</div>




<?php foreach ($categories as $category):?>
		<div class="brand">
			<div style="font-weight:bold;text-align:center;">&laquo;<?php echo $category['Category']['name']; ?>&raquo;</div>
		</div>

<?php endforeach; ?>

	<?php //echo $paginator->sort('Бренд','name');?>
	<?php //echo $paginator->sort('Логотип','logo');?>




