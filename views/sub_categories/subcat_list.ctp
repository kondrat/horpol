<?php echo $javascript->link(array('jquery/jquery.fancybox-1.2.1.pack','subCatIndex','subCatIndexSubCat'),false);?>
<?php echo $html->css('jquery.fancybox'); ?>
<?php echo $this->element('product/product', array('firstStep'=>'prevStep','secondStep'=>'prevStep','thirdStep'=>'prevStep','cache' => false ) ); ?>

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
			
			if(isset($subCategories['BrandsCategory']['id'])){
				$brandsCatVal = $subCategories['BrandsCategory']['id'];
			} else {
				$brandsCatVal = null;
			}
			if(isset($this->params['named']['subcat'])){
				$subcatId = 'subcat:'.$this->params['named']['subcat'];
				$subcatIdVal = $this->params['named']['subcat'];
			} else {
				$subcatId = null;
				$subcatIdVal = null;
			}
?>
<div class="span-24 subCategoryWrapper" style="margin-bottom:1em;">
	<?php if(!isset($products)): ?>	
	<div class="span-24 subCategoryAddWrapper" style="margin-bottom:1em;">		

			
		<div class="span-13 subCategoryAdd hide">
		<?php echo $form->create('SubCategory',array('action'=>'addInline'));?>
			<?php echo $form->input('brand_category_id', array( 'type' => 'hidden','value'=> $brandsCatVal) );?>
			<?php echo $form->input('category_id', array( 'type' => 'hidden','value'=> $catIdVal) );?>
			<?php echo $form->input('brand_id', array( 'type' => 'hidden','value'=> $brandIdVal ) );?>
			<?php echo $form->label('name','[Название:]');?><br />
			<?php echo $form->input('name',array('style'=>'width:450px;','label'=>false));?>
			<?php echo $form->error('name', 'text error');?>
			<div id="SubCategoryNameError" style="padding:5px;"></div>
			<div class="span-3">
				<?php echo $form->submit('Сохранить',array('class'=>'span-3 newSubCat'));?>
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
	
	<div id="subCategoryEditWrapper" class="span-24  hide" style="margin-bottom:1em;">	
		<div class="span-13 subCategoryEdit">
		<?php echo $form->create('SubCategory',array('action'=>'edit'));?>
			<?php echo $form->input('id', array('id'=>'SubCategoryIdEdit', 'type' => 'hidden','value'=> '' ) );?>
			<?php echo $form->label('name','[Название:]');?><br />
			<?php echo $form->input('name',array('id'=>'SubCategoryNameEdit','style'=>'width:450px;','label'=>false));?>
			<?php echo $form->error('name', 'text error');?>
			<div id="SubCategoryNameEditError" style="padding:5px;"></div>
			<div class="span-3">
				<?php echo $form->submit('Сохранить',array('class'=>'span-3 SubCatEditSubmit'));?>
			</div>
			<?php echo $form->button('Отменить',array('class'=>'span-3 subCategoryEditCancel'));?>
		<?php echo $form->end();?>
			<div class="test">
				<div class="fancy_bg fancy_bg_e"></div>
				<div class="fancy_bg fancy_bg_se"></div>
				<div class="fancy_bg fancy_bg_s"></div>
				<div class="fancy_bg fancy_bg_sw"></div>
				<div class="fancy_bg fancy_bg_w"></div>
			</div>
		</div>	
	</div>
			
	<div class="span-24"><h3 style="z-index:0;margin-bottom:1em;"><?php echo $html->link('Создать новый подраздел',array('action'=>'add'),array('class'=>'subCatAdd') );?></h3></div>	
	
	<?php endif ?>
	<?php if(isset($subCategories) && $subCategories != array()):?>
	<div class="subCategory span-24">
		<?php $i = 0;?>
		<?php foreach ($subCategories['SubCategory'] as $subCategory):?>	
			<?php $class=(($i%2) == 0)?"clear":null;?>		
					<div class="span-10 <?php echo $class;?> subCatItem" >
						<div style="float:left;margin-right:.5em;">
							<?php echo $html->link($subCategory['name'],array('action'=>'index',$catId,$brandId,'subcat:'.$subCategory['id']),array('class'=>'subCatChoise'),false,false);?>
							<span style="font-size:smaller;">товаров:&nbsp;</span><span style="font-weight:bold;color:maroon;"><?php echo $pc = (isset($subCategory['product_count'])?$subCategory['product_count']:'0');?></span>
						</div>
						<?php if(!isset($products)): ?>
							<span id="<?php echo $subCategory['id'];?>_name" class="subCatEdit"></span>
							<span><?php echo $html->link('',array('action'=>'delete', $subCategory['id']), array('class'=>'subCatDel'), sprintf('Удалть Подраздел %s и ВСЕ ТОВАРЫ подраздела!?', $subCategory['name']) );?></span>
						<?php endif ?>
						<div class="span-10 edit_name"></div>
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
	
								<div class="oldPictPlace hide">
									<?php echo $html->image('catalog/s/product_logo.jpg',array('class'=>'prodShadow'));?>
								</div>
								
								<div id="productEditWrapper" class="span-8 hide" >
									<?php echo $form->create('Product',array('action'=>'editProduct', 'type' => 'file','id'=>"productEditForm"));?>
										<?php echo $form->hidden('Product.subcategory_id',array('value'=> $subcatIdVal));?>
										<?php echo $form->hidden('Product.id',array('value'=> '','id'=>'ProductIdEdit'));?>
										<?php echo $form->label('Product.userfile1','[Логотип:]');?>
										<?php echo $form->input('Product.userfile1', array('type'=>'file', 'label'=>false ) ); ?>
										<div id="ProductFileError" ></div>
										<div style="position:relative;height:30px;">
											<?php echo $form->input('photoType',array('options' => array('Фото','Текстура'),'label'=>false,'div'=>false) );?>
											<div class="infoTip16" style="left:95px;position:absolute;top:8px;"></div>
										</div>
										<?php echo $form->label('Product.name','[Название:]');?>
										<?php echo $form->input('Product.name',array('style'=>'width:250px;','id'=>'ProductNameEdit','label'=>false));?>
										<?php echo $form->error('Pruduct.name', 'text error');?>
										<div id="ProductNameError" ></div>
										<div id="SubCategoryNameError" style="padding:5px;"></div>
										<div class="span-3">
											<?php echo $form->submit('Сохранить',array('class'=>'span-3 subb'));?>
										</div>
										<?php echo $form->button('Закрыть',array('class'=>'span-3 productEditCancel'));?>
										<?php echo $form->end();?>
										<div class="test">
											<div class="fancy_bg fancy_bg_e"></div>
											<div class="fancy_bg fancy_bg_se"></div>
											<div class="fancy_bg fancy_bg_s"></div>
											<div class="fancy_bg fancy_bg_sw"></div>
											<div class="fancy_bg fancy_bg_w"></div>
										</div>
								</div>


	
	<div class="span-24 productAddWrapper">
		
								<div class="span-9 productItemAdd hide">
								<?php echo $form->create('Product',array('action'=>'addProduct', 'type' => 'file'));?>
									<?php echo $form->hidden('Product.subcategory_id',array('value'=> $subcatIdVal));?>
									<?php echo $form->label('Product.userfile','[Логотип:]');?>
									<?php echo $form->input('Product.userfile', array('type'=>'file', 'label'=>false ) ); ?>
									<div id="ProductFileError" ></div>
									<div style="position:relative;height:30px;">
										<?php echo $form->input('photoType',array('options' => array('Фото','Текстура'),'label'=>false,'div'=>false) );?>
										<div class="infoTip16" style="left:95px;position:absolute;top:8px;"></div>
									</div>
									<?php echo $form->label('Product.name','[Название:]');?>
									<?php echo $form->input('Product.name',array('style'=>'width:250px;','label'=>false));?>
									<?php echo $form->error('Pruduct.name', 'text error');?>
									<div id="ProductNameError" ></div>
									<div id="SubCategoryNameError" style="padding:5px;"></div>
									<div class="span-3">
										<?php echo $form->submit('Сохранить',array('class'=>'span-3 newProduct'));?>
									</div>
									<?php echo $form->button('Закрыть',array('class'=>'span-3 productAddCancel'));?>
								<?php echo $form->end();?>
									<div class="test">
										<div class="fancy_bg fancy_bg_e"></div>
										<div class="fancy_bg fancy_bg_se"></div>
										<div class="fancy_bg fancy_bg_s"></div>
										<div class="fancy_bg fancy_bg_sw"></div>
										<div class="fancy_bg fancy_bg_w"></div>				
									</div>
								</div>				
			
	</div>	
		
<div class="span-24">
	
		<?php echo $form->create(null, array('url' => array('controller' => 'products', 'action' => 'delall'),'name'=>'form2' ) ); ?>			
		<div class="span-24">
			<div class="span-4">
				<h3  style="margin-bottom:1em;"><?php echo $html->link('Добавить товар',array('controller'=>'products','action'=>'add'),array('class'=>'productAdd') );?></h3>
			</div>
			<div class="span-4">		
				<input type="button" class="span-4" id="selectall" value="Выбрать все" name="sel" />
			</div>
			<div class="span-10">
					<?php echo $form->submit('Удалить выбранное', array('class'=>'span-5','onclick' => 'return confirm("Удалить выбранные товары?")') );?>		
			</div>
		</div>
		<div class="span-5" style="margin-bottom:.5em;">
			<?php echo $html->image('icons/warning.png');?> - отсутствует большое фото
		</div>
		<div class="span-19 last" style="margin-bottom:.5em;">
			<?php echo $html->image('icons/camera1.png');?> - "старое" фото (для контроля)
		</div>	

	
				<div class="span-24 productItemWrapper">
				<?php if($products != array()):?>
				
					<?php foreach($products as $product): ?>
					
						<?php
									$logoClass = $logoWarring = $imagePathS = $imagePathB  = null;
									if($product['Product']['logo1'] != null) {
										$imagePathS = '/img/catalog/s/'.$product['Product']['logo1'];
										$imagePathB = '/img/catalog/b/'.$product['Product']['logo1'];	

																		
									} elseif($product['Product']['logo'] != null) {
										$imagePathS = '/img/catalog/'.$product['Product']['logo'];
										$imagePathB = '/img/catalog/b/product_logo.jpg';
										$logoClass = 'oldLogo';
										$logoWarring = $html->image('icons/warning.png');
									} else {
										$imagePath = '/img/catalog/s/product_logo.jpg';
									}
						?>
					
					
					
						<div class="productItem <?php echo $logoClass;?>" >
							<div class="span-4">							
									<?php echo $html->link( $html->image($imagePathS,array('alt'=>$product['Product']['name']) ),$imagePathB,array('class'=>'bigProd'),false,false );?>
							</div>
							<div class="span-1 last"><?php echo $form->checkbox('Product.id.'.$product['Product']['id'], array('class' => 'selectable', 'value' =>$product['Product']['id']) ); ?></div>
							<div class="span-1 last logWarring" style=""><?php echo $logoWarring;?></div>
							<div class="span-1 productEdit" id="<?php echo $product['Product']['id'];?>"></div>
							<?php if($subCategories['Category']['type'] == 3):?>
								<div class="span-1"><?php echo $html->link($html->image('icons/3_type.png'),array('controller'=>'products','action'=>'view',$product['Product']['id']),false,false,false);?></div>
							<?php endif ?>
							<?php if($product['Product']['logo'] != null):?>
								<div class="span-1 oldPict">
									<?php echo $html->image('catalog/'.$product['Product']['logo'],array('class'=>'hide'));?>
								</div>
							<?php endif ?>
							<div class="productNameVal"><?php echo $product['Product']['name'];?></div>																		
						</div>
						
					<?php endforeach ?>
				
					
				<?php else: ?>
					<div class="span-20 push-6 noProductYet">Товары еще не добавлены</div>
					<div style="height:200px;width:1px;"></div>
				<?php endif ?>
				</div>
			

		<?php else: ?>
			<div style="height:200px;width:1px;"></div>
		<?php endif	?>



	<?php echo $form->end();?>
</div>

		


