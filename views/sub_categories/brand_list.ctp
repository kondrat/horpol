<?php echo $javascript->link(array('jquery/jquery.qtip.min','jquery/jquery.timers','subCatIndex','subCatIndexBrand'),false);?>
<?php echo $this->element('product/product', array('firstStep'=>'prevStep','secondStep'=>'prevStep','thirdStep'=>'disableStep','cache' => false ) ); ?>
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
<div class="span-24" style="margin-bottom:1em;">
	<div class="span-5 categories">[Связанные бренды:]</div>		
</div>

<div class="span-24">
	<?php if($brands!=array()):?>
	<?php $i = 0;?>
		<?php foreach ($brands as $brand):?>
			<?php $clear = ($i%6 == 0)?'clear':null;?>
				<div class="brand <?php echo $clear;?>">
					<div class="brandImg" style="text-align:center;border:1px solid #eee;padding:3px;">
						<?php echo $html->link($html->image( 'catalog/'.$brand['Brand']['logo']),array('action'=>'index',$catId,'brand:'.$brand['Brand']['id']),array('class'=>'brImg'),false,false); ?>
					</div>
					<div class="brandName" style="font-weight:bold;text-align:center;">
						<?php echo $html->link($brand['Brand']['name'],array('action'=>'index',$catId,'brand:'.$brand['Brand']['id']),array('class'=>'brA'),false,false); ?>
					</div>
				</div>
				<?php $i++;?>
		<?php endforeach; ?>
	<? else: ?>
		<p style="margin-left:2em;">С данной категорией пока не связан ни один бренд</p>
	<? endif ?>
</div>

<div id="allBrandsWrapper" class="span-24">
		<div class="span-24" style="margin:1em 0;">
			<div class="span-5 categories" id="brandsAll">[Остальные бренды:]</div>		
		</div>
	<div class="span-24">
	<?php $j = 0;?>
	<?php foreach ($brandsAll as $brand):?>
		<?php $clear = ($j%6 == 0)?'clear':null;?>
			<div class="brand <?php echo $clear;?>">
				<div class="brandImg" style="text-align:center;border:1px solid #eee;padding:3px;">
					<?php echo $html->link($html->image( 'catalog/'.$brand['Brand']['logo']),array('action'=>'index',$catId,'brand:'.$brand['Brand']['id']),array('class'=>'brImg'),false,false); ?>
				</div>
				<div class="brandName" style="font-weight:bold;text-align:center;">
					<?php echo $html->link($brand['Brand']['name'],array('action'=>'index',$catId,'brand:'.$brand['Brand']['id']),array('class'=>'brA'),false,false); ?>
				</div>
			</div>
		<?php $j++;?>
	<?php endforeach; ?>
	</div>
</div>




