<?php echo $this->element('product/product', array('firstStep'=>'activeStep','secondStep'=>'disableStep','thirdStep'=>'disableStep','cache' => false ) ); ?>

<div class="categories span-24">
	<ul class="category">
		<?php foreach ($categories as $category):?>			
				<li>
					<?php echo $html->link(strip_tags($category['Category']['name']),array('action'=>'index','cat:'.$category['Category']['id']),false,false,false);?>
				</li>
				&nbsp;|&nbsp;
		<?php endforeach; ?>
	</ul>
</div>


	<div class="actions span-24">
		<h3><?php echo $html->link('Быстрый переход: <span style="font-size:smaller;">Пять последних подкатегорий</span>', array(),array(),false,false); ?></h3>
	</div>
	
		<?php if(isset($categoriesLast) && $categoriesLast != array() ):?>
			<?php foreach($categoriesLast as $catLast):?>
				<div class="span-24">
					<div class="span-21 setWrapperQuick">
						<div class="span- quickGo" style="border:1px solid silver; padding:0 4px">
							<?php echo $html->link('Перейти',array('action'=>'index','cat:'.$catLast['Category']['id'],'brand:'.$catLast['Brand']['id'],'subcat:'.$catLast['SubCategory']['id']));?>
						</div>
						<div class="span-" style="">
							<div class="setItem">[ Категория: ]</div>				
							<div class="setItemMain quickCat"><span>[</span>&nbsp;<span><?php echo $catLast['Category']['name'];?></span>&nbsp;<span>]</span></div>
						</div>
						<div class="span-" style="">
							<div class="setItem">[ Бренд: ]</div>
							<div class="setItemMain quickBrand"><span>[</span>&nbsp;<span><?php echo $catLast['Brand']['name'];?></span>&nbsp;<span>]</span></div>
							<?php echo $html->image('catalog/'.$catLast['Brand']['logo'],array('class'=>'quickGoImg'));?>
						</div>
						<div class="span-">
							<div class="setItem">[ Подраздел: ]</div>
							<div class="setItemMain quickSubCat"><span>[</span>&nbsp;<span><?php echo $catLast['SubCategory']['name'];?></span>&nbsp;<span>]</span></div>
						</div>

					</div>
				</div>
			<?php endforeach ?>
		<?php endif ?>
			



