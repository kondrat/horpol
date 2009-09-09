<?php echo $this->element('product/product', array('cache' => false ) ); ?>
		<div class="page">
			<?php if( isset($this->params['paging']['Brand']['pageCount']) && $this->params['paging']['Brand']['pageCount'] > 1 ): ?>
				<?php echo $paginator->prev($html->image('icons/left_arrow.png',array('class'=>'pageImgPrev','alt'=>__('Prev',true) ) ), array('escape' => false ) , $html->image('icons/left_arrow_disable.png'),  array('escape' => false ,'class'=>'menuPage'));?>
  				<?php echo $paginator->numbers( array('modulus'=>'5','separator'=>' &middot; ', 'class' => 'menuPage' ), null );?>
				<?php echo $paginator->next( $html->image('icons/right_arrow.png',array('class'=>'pageImgNext','alt'=>__('Next',true) ) ), array('escape' => false ), $html->image('icons/right_arrow_disable.png'), array('escape' => false ,'class'=>'menuPage'));?>
			<?php endif ?>
		</div>

<?php 
			if(isset($this->params['named']['cat'])){
				$catId = 'cat:'.$this->params['named']['cat'];
			} else {
				$catId = null;
			}
?>
<div class="span-24">
	<?php if(isset($subCategories) && $subCategories != array()):?>
	<ul class="subCategory">
		<?php foreach ($subCategories as $subCategory):?>			
				<li>
					<?php echo $html->link($subCategory['SubCategory']['name'],array('action'=>'index','subcat:'.$subCategory['SubCategory']['id']),false,false,false);?>
				</li>
		<?php endforeach; ?>
	</ul>
	<?php else: ?>
		<h3>Создать новый подраздел</h3>
	<?php endif ?>
</div>
	<?php //echo $paginator->sort('Бренд','name');?>
	<?php //echo $paginator->sort('Логотип','logo');?>




