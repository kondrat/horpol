<div class="span-24">
	<div class="span-24 step actions">		
		<div class="<?php echo (isset($firstStep))?$firstStep:null;?>" style="float:left;">
			<div style="text-align:center;"><?php echo $html->image('icons/1step.jpg',array('alt'=>'1'));?></div>
			<h3><?php echo $html->link('Выбрать Категорию',array('controller'=>'sub_categories','action'=>'index'),array('id'=>'catSelect') );?></h3>
		</div>

		<h3 class="stepSpace">&raquo;</h3>
		
		<div class="<?php echo (isset($secondStep))?$secondStep:null;?>" style="float:left;">
			<div style="text-align:center;"><?php echo $html->image('icons/2step.jpg',array('alt'=>'2'));?></div>
			<h3><?php echo $html->link('Выбрать Бренд',array('controller'=>'sub_categories','action'=>'index'),array('id'=>'brandSelect') );?></h3>
		</div>
		
		<h3 class="stepSpace">&raquo;</h3>
		
		<div class="<?php echo (isset($thirdStep))?$thirdStep:null;?>" style="float:left;">
			<div style="text-align:center;"><?php echo $html->image('icons/3step.jpg',array('alt'=>'3'));?></div>		
			<h3><?php echo $html->link('Выбрать Подраздел',array('controller'=>'sub_categories','action'=>'index'),array('id'=>'subcatSelect') );?></h3>
		</div>
		
		<h3 class="stepSpace">&raquo;</h3>
		
		<div class="<?php echo (isset($forthStep))?$forthStep:null;?>" style="float:left;">
			<div style="text-align:center;"><?php echo $html->image('icons/4step.jpg',array('alt'=>'4'));?></div>		
			<h3><?php echo $html->link('Выбрать Товары',array());?></h3>
		</div>
	
	</div>
	<div class="span-24">
	<div class="span-20 push-1 setWrapper">
	
		
		<div class="span-" style="background-color:#eee;padding:8px;">
			<div class="setItemMain"><?php echo $html->image('catalog/brand_logo.jpg',array('class'=>'brandShadow'));?></div>
		</div>	
		
		
		
			
		<div class="span-" style="">
			<div class="setItem">[ Категория: ]</div>			
			<?php
				if(isset($catSelected)) {
					$cat = $catSelected;
					$catSelectedClass = 'catSelected';
				} else {
					$cat = 'Категория не выбрана';
					$catSelectedClass = null;
				}
			?>			
			<div id="cat" class="setItemMain <?php echo $catSelectedClass;?> "><span>[</span>&nbsp;<span class="catText"><?php echo $cat;?></span>&nbsp;<span>]</span></div>
		</div>
		<div class="span-" style="">
			<div class="setItem">[ Бренд: ]</div>
			<?php
				if(isset($brandSelected)) {
					$brand = $brandSelected['Brand']['name'];
					$brandSelectedClass = 'brandSelected';
				} else {
					$brand = 'Бренды не выбран';
					$brandSelectedClass = null;
				}
			?>			
			<div id="brand" class="setItemMain <?php echo $brandSelectedClass;?> "><span>[</span>&nbsp;<span class="brandText"><?php echo $brand;?></span>&nbsp;<span>]</span></div>
		</div>
		<div class="span-" style="">
			<div class="setItem">[ Подраздел: ]</div>
			<div id="subcat" class="setItemMain">[ Подразделы не выбран ]</div>
		</div>
	</div>
</div>
