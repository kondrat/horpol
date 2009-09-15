<?php echo $this->element('product/product', array('firstStep'=>'activeStep','secondStep'=>'nextStep','thirdStep'=>'disableStep','forthStep'=>'disableStep','cache' => false ) ); ?>

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
		<h3><?php echo $html->link('Пять последних подкатегорий', array(),array()); ?></h3>
	</div>
	
		<?php if(isset($categoriesLast) && $categoriesLast != array() ):?>
			<?php foreach($categoriesLast as $catLast):?>
				<div class="span-24">
					<div class="span-21 push-1 setWrapperQuick">
						<div class="span-" style="width:220px;">
							<div class="setItem">[ Категория: ]</div>				
							<div class="setItemMain quickCat"><span>[</span>&nbsp;<span><?php echo $catLast['Category']['name'];?></span>&nbsp;<span>]</span></div>
						</div>
						<div class="span-" style="width:130px;position:relative;">
							<div class="setItem">[ Бренд: ]</div>
							<div class="setItemMain"><span>[</span>&nbsp;<span><?php echo $catLast['Brand']['name'];?></span>&nbsp;<span>]</span></div>
							<div class="quickGoImgHide hide"><?php echo $html->image('catalog/'.$catLast['Brand']['logo'],array('class'=>'quickGoImg'));?></div>
						</div>
						<div class="span-">
							<div class="setItem">[ Подраздел: ]</div>
							<div class="setItemMain quickSubCat"><span>[</span>&nbsp;<span><?php echo $catLast['SubCategory']['name'];?></span>&nbsp;<span>]</span></div>
						</div>
						<div class="span- quickGo" style="border:1px solid silver; padding:0 4px">
							<?php echo $html->link('Перейти',array('controller'=>'products','action'=>'index',$catLast['SubCategory']['id']));?>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		<?php endif ?>
			



