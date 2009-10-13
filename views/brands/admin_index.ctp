<?php echo $javascript->link(array('brandIndex'),false);?>
<?php $html->addCrumb('Главная', array('controller'=>'pages','action'=>'index')); ?>
<?php $html->addCrumb('Бренды', array()); ?>

<div class="actions span-24">
		<h3><?php echo $html->link('Добавить новый Брeнд', array('action'=>'add')); ?></h3>
</div>
	<div class="span-24" style="margin-bottom:1em;">
		<div class="page">
			<?php if( isset($this->params['paging']['Brand']['pageCount']) && $this->params['paging']['Brand']['pageCount'] > 1 ): ?>
				<?php echo $paginator->prev($html->image('icons/left_arrow.png',array('class'=>'pageImgPrev','alt'=>__('Prev',true) ) ), array('escape' => false ) , $html->image('icons/left_arrow_disable.png'),  array('escape' => false ,'class'=>'menuPage'));?>
  				<?php echo $paginator->numbers( array('modulus'=>'5','separator'=>' &middot; ', 'class' => 'menuPage' ), null );?>
				<?php echo $paginator->next( $html->image('icons/right_arrow.png',array('class'=>'pageImgNext','alt'=>__('Next',true) ) ), array('escape' => false ), $html->image('icons/right_arrow_disable.png'), array('escape' => false ,'class'=>'menuPage'));?>
			<?php endif ?>
		</div>
	</div>



<?php $i = 0;?>
<?php foreach ($br as $brand):
	$class = null;
	if($i%6 == 0){
		$class = 'clear';
	}
	$background = null;
?>
		<div class="brand <?php echo $class;?>">
			<div style="text-align:center;border:1px solid silver;padding:3px;">
				<?php echo $html->link($html->image( 'catalog/'.$brand['Brand']['logo'], array('alt'=>$brand['Brand']['name'],'title'=>$brand['Brand']['name']) ), array('action'=>'view',$brand['Brand']['id']), false, false,false); ?>
			</div>
			<div class="lens"></div><?php //echo $html->image('icons/lens.png',array('class'=>'lens'));?>
			<div style="font-weight:bold;text-align:center;">&laquo;<?php echo $brand['Brand']['name']; ?>&raquo;</div>
		</div>
<?php $i++;?>
<?php endforeach; ?>

	<?php //echo $paginator->sort('Бренд','name');?>
	<?php //echo $paginator->sort('Логотип','logo');?>




