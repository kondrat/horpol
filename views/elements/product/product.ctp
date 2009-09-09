<?php ?> 
<div class="span-24">
	<div class="span-20 prepend-3 step">
		<ul>
		<li class="">
			<div>1</div>
			<?php echo $html->link('Выбрать Категорию',array('controller'=>'sub_categories','action'=>'index'),array('id'=>'catSelect') );?>
		</li>
		<li class="stepSpace">&raquo;</li>
		<li class="">
			<div>2</div>
			<?php echo $html->link('Выбрать Бренд',array('controller'=>'sub_categories','action'=>'index'),array('id'=>'brandSelect') );?>
		</li>
		<li class="stepSpace">&raquo;</li>
		<li class="">
			<div>3</div>
			<?php echo $html->link('Выбрать Подраздел',array('controller'=>'sub_categories','action'=>'index'),array('id'=>'subcatSelect') );?>			
		</li>
		<li class="stepSpace">&raquo;</li>
		<li class="">
			<div>4</div>
			<?php echo $html->link('Выбрать Товары',array());?>
			
		</li>
	</ul>
</div>
<div class="span-24">
	<div class="span-15 setWrapper">
		<div class="span-" style="">
			<div class="setItem">[ Категория: ]</div>			
			<?php
				if(isset($catSelected)) {
					$cat = $catSelected;
					$catSelectedClass = 'catSelected';
				} else {
					$cat = 'Все Категории';
					$catSelectedClass = null;
				}
			?>			
			<div id="cat" class="setItemMain <?php echo $catSelectedClass;?> "><span>[</span>&nbsp;<span class="catText"><?php echo $cat;?></span>&nbsp;<span>]</span></div>
		</div>
		<div class="span-" style="">
			<div class="setItem">[ Бренд: ]</div>
			<?php
				if(isset($brandSelected)) {
					$brand = $brandSelected;
					$brandSelectedClass = 'brandSelected';
				} else {
					$brand = 'Все Бренды';
					$brandSelectedClass = null;
				}
			?>			
			<div id="brand" class="setItemMain <?php echo $brandSelectedClass;?> "><span>[</span>&nbsp;<span class="brandText"><?php echo $brand;?></span>&nbsp;<span>]</span></div>
		</div>
		<div class="span-" style="">
			<div class="setItem">[ Подраздел: ]</div>
			<div id="subcat" class="setItemMain">[ Все Подразделы ]</div>
		</div>
	</div>
</div>
