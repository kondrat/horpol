<?php echo $this->element('product/product', array('firstStep'=>'prevStep','secondStep'=>'disableStep','thirdStep'=>'disableStep','cache' => false ) ); ?>

<div class="span-24" style="margin-bottom:2em;">
	<div class="categories span-24">
		[Категории:]
	</div>
		<?php foreach ($categories as $category):?>			
				<div style="position:relative; float:left;" class="category">
					<?php echo $html->link(strip_tags($category['Category']['name']),array('action'=>'index','cat:'.$category['Category']['id']),false,false,false);?>
					<div style="position:absolute;top:2px;right:2px;z-index:10;"><?php echo $html->image('icons/'.$category['Category']['type'].'_type.png',array('title'=>'Тип категории'));?></div>
					&nbsp;|&nbsp;
				</div>				
		<?php endforeach; ?>

</div>


	<div class="categories span-24" style="margin-bottom:1em;">
		[Быстрый переход:] <span style="font-size:150%; color:teal;">Пять последних подразделов</span>
	</div>
	
		<?php if(isset($categoriesLast) && $categoriesLast != array() ):?>
			<?php foreach($categoriesLast as $catLast):?>
				<div class="span-24">
					<div class="span-21 setWrapperQuick">
						<div class="span- quickGo" style="border:1px solid silver; padding:0 4px">
							<?php echo $html->link('Перейти',array('action'=>'index','cat:'.$catLast['BrandsCategory']['Category']['id'],'brand:'.$catLast['BrandsCategory']['Brand']['id'],'subcat:'.$catLast['SubCategory']['id']));?>
						</div>
						<div class="span-" style="">
							<div class="setItem">[ Категория: ]</div>				
							<div class="setItemMain quickCat"><span>[</span>&nbsp;<span><?php echo $catLast['BrandsCategory']['Category']['name'];?></span>&nbsp;<span>]</span></div>
						</div>
						<div class="span-" style="">
							<div class="setItem">[ Бренд: ]</div>
							<div class="setItemMain quickBrand"><span>[</span>&nbsp;<span><?php echo $catLast['BrandsCategory']['Brand']['name'];?></span>&nbsp;<span>]</span></div>
							<?php echo $html->image('catalog/'.$catLast['BrandsCategory']['Brand']['logo'],array('class'=>'quickGoImg'));?>
						</div>
						<div class="span-">
							<div class="setItem">[ Подраздел: ]</div>
							<div class="setItemMain quickSubCat"><span>[</span>&nbsp;<span><?php echo $catLast['SubCategory']['name'];?></span>&nbsp;<span>]</span></div>
						</div>

					</div>
				</div>
			<?php endforeach ?>
		<?php endif ?>
			



