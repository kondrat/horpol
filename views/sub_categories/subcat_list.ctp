<?php echo $javascript->link(array('subCatIndex'),false);?>
<?php echo $this->element('product/product', array('firstStep'=>'prevStep','secondStep'=>'prevStep','thirdStep'=>'activeStep','forthStep'=>'nextStep','cache' => false ) ); ?>

<?php 
			if(isset($this->params['named']['cat'])){
				$catId = 'cat:'.$this->params['named']['cat'];
				$catIdVal = $this->params['named']['cat'];
			} else {
				$catId = null;
				$catIdVal = null;
			}
			if(isset($this->params['named']['brand'])){
				$brandId = 'brand:'.$this->params['named']['brand'];
				$brandIdVal = $this->params['named']['brand'];
			} else {
				$brandId = null;
				$brandIdVal = null;
			}
?>
<div class="span-24 subCategoryWrapper" style="margin-bottom:1em;">
	<div class="span-24 subCategoryAddWrapper" style="margin-bottom:1em;">
		<div class="span-24">
			<h3 style="margin-bottom:0em;"><?php echo $html->link('Создать новый подраздел',array('action'=>'add'),array('class'=>'subCatAdd') );?></h3>
		</div>
		<div class="span-13 subCategoryAdd hide">
		<?php echo $form->create('SubCategory',array('action'=>'addInline'));?>
			<?php echo $form->input('category_id', array( 'type' => 'hidden','value'=> $catIdVal) );?>
			<?php echo $form->input('brand_id', array( 'type' => 'hidden','value'=> $brandIdVal ) );?>
			<?php echo $form->label('name','[Название:]');?><br />
			<?php echo $form->input('name',array('style'=>'width:450px;','label'=>false));?>
			<?php echo $form->error('name', 'text error');?>
			<div id="SubCategoryNameError" style="padding:5px;"></div>
			<div class="span-3">
				<?php echo $form->submit('Сохранить',array('class'=>'span-3'));?>
			</div>
			<?php echo $form->button('Отменить',array('class'=>'span-3 subCategoryAddCancel'));?>
		<?php echo $form->end();?>
			<div class="test">
				<!--<div class="fancy_bg fancy_bg_n"></div>
				<div class="fancy_bg fancy_bg_ne"></div>-->
				<div class="fancy_bg fancy_bg_e"></div>
				<div class="fancy_bg fancy_bg_se"></div>
				<div class="fancy_bg fancy_bg_s"></div>
				<div class="fancy_bg fancy_bg_sw"></div>
				<div class="fancy_bg fancy_bg_w"></div>
				<!--<div class="fancy_bg fancy_bg_nw"></div>-->
			</div>
		</div>
	</div>
	
	<?php if(isset($subCategories) && $subCategories != array()):?>
	<div class="subCategory span-24">
		<?php $i = 0;?>
		<?php foreach ($subCategories as $subCategory):?>	
		<?php $class=(($i%2) == 0)?"clear":null;?>		
				<div class="span-10 push-1 <?php echo $class;?>">
					<?php echo $html->link($subCategory['SubCategory']['name'],array('action'=>'index',$catId,$brandId,'subcat:'.$subCategory['SubCategory']['id']),false,false,false);?>
					<span style="font-size:smaller;">товаров:&nbsp;</span><span style="font-weight:bold;color:maroon;"><?php echo $pc = (isset($subCategory['SubCategory']['product_count'])?$subCategory['SubCategory']['product_count']:'0');?></span>
				</div>
		<?php $i++;?>
		<?php endforeach; ?>
	</div>
	<?php else: ?>
		<div style="height:200px;width:1px;"></div>
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

<div class="span-24" >
	<?php if(isset($products)): ?>
	
		<div class="span-23">
			<h3 style="margin-bottom:0em;"><?php echo $html->link('Добавить товар',array('controller'=>'products','action'=>'add'),array('class'=>'productAdd') );?></h3>
		</div>		
	
	
		<?php if($products != array()):?>
			<?php foreach($products as $product): ?>
				<div class="span-7">
					<?php echo $html->link( $html->image('catalog/'.$product['Product']['logo'],array('alt'=>$product['Product']['name']) ),array(),false,false,false );?>
					<?php echo $product['Product']['name'];?>
				</div>
			<?php endforeach ?>
		<?php else: ?>
			<div class="span-20 push-6 " style="color:red; margin-top:2em;">Товары еще не добавлены</div>
			<div style="height:200px;width:1px;"></div>
		<?php endif ?>
		<?php else: ?>
			<div style="height:200px;width:1px;"></div>
		<?php endif	?>
</div>
	<?php //echo $paginator->sort('Бренд','name');?>
	<?php //echo $paginator->sort('Логотип','logo');?>




