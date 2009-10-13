			<?php
				if(isset($catSelected)) {
					$cat = $catSelected['name'];
					$catSelectedClass = 'catSelected';
				} else {
					$cat = 'Категория не выбрана';
					$catSelectedClass = null;
				}
			?>		
			<?php
				if(isset($brandSelected)&& isset($catSelected) ) {
					$brand = $brandSelected['name'];
					$catParam= 'cat:'.$catSelected['id'];
					$brandLogo = $brandSelected['logo'];
					$brandSelectedClass = 'brandSelected';
					$catBrandParam = 'cat:'.$catSelected['id'].'/'.'brand:'.$brandSelected['id'];
				} else {
					$catParam = null;
					$brand = 'Бренды не выбран';
					$brandLogo = 'brand_logo.jpg';
					$brandSelectedClass = null;
					$catBrandParam =  null;
				}
			?>	
			<?php
				if(isset($subCatSelected)) {
					$subCat = $subCatSelected;
					$subCatSelectedClass = 'subCatSelected';
				} else {
					$subCat = 'Подразделы не выбран';
					$subCatSelectedClass = null;
				}
			?>		

	<div class="span-24 step actions">		
		<div id="step1" class="<?php echo (isset($firstStep))?$firstStep:null;?>" style="float:left;">
			<div id="stepIcon1" class="stepIcon"></div>
			<h3><?php echo $html->link('Выбор Категории',array('controller'=>'sub_categories','action'=>'index'),array('id'=>'catSelect') );?></h3>
		</div>

		<h3 class="stepSpace">&raquo;</h3>
		
		<div id="step2" class="<?php echo (isset($secondStep))?$secondStep:null;?>" style="float:left;">
			<div id="stepIcon2" class="stepIcon"></div>
			<h3><?php echo $html->link('Выбор Бренда',array('controller'=>'sub_categories','action'=>'index',$catParam),array('id'=>'brandSelect') );?></h3>
		</div>
		
		<h3 class="stepSpace">&raquo;</h3>
		
		<div id="step3" class="<?php echo (isset($thirdStep))?$thirdStep:null;?>" style="float:left;">
			<div id="stepIcon3" class="stepIcon"></div>	
			<h3><?php echo $html->link('Выбор Подраздела',array('controller'=>'sub_categories','action'=>'index',$catBrandParam),array('id'=>'subcatSelect') );?></h3>
		</div>
		

		
		
		<div class="span-" style="background-color:#eee;padding:8px;float:right;">
			<div class="setItemMain"><?php echo $html->image('catalog/'.$brandLogo,array('class'=>'brandShadow'));?></div>
		</div>	
	
	

<div class="span-19">
	<div class="span-20 push-1 setWrapper">				
		<div class="span-" style="">
			<div class="setItem">[ Категория: ]</div>			
	
			<div id="cat" class="setItemMain <?php echo $catSelectedClass;?> "><span>[</span>&nbsp;<span class="catText"><?php echo $cat;?></span>&nbsp;<span>]</span></div>
		</div>
		<div class="span-" style="">
			<div class="setItem">[ Бренд: ]</div>
		
			<div id="brand" class="setItemMain <?php echo $brandSelectedClass;?> "><span>[</span>&nbsp;<span class="brandText"><?php echo $brand;?></span>&nbsp;<span>]</span></div>
		</div>
		<div class="span-" style="">
			<div class="setItem">[ Подраздел: ]</div>
			<div id="subcat" class="setItemMain <?php echo $subCatSelectedClass;?> ">[&nbsp;<span class="subCatText"><?php echo $subCat;?></span>&nbsp;]</div>
		</div>
	</div>
</div>
