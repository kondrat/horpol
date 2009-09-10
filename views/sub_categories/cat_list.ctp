<?php echo $this->element('product/product', array('cache' => false ) ); ?>

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
	
<div class="span-24">
	<div class="span-15 push-1 setWrapper">
		<div class="span-">
			<div class="setItem">[ Категория: ]</div>				
			<div class="setItemMain"><span>[</span>&nbsp;<span>Массивная доска</span>&nbsp;<span>]</span></div>
		</div>
		<div class="span-">
			<div class="setItem">[ Бренд: ]</div>
			<div class="setItemMain"><span>[</span>&nbsp;<span>Zayac risak</span>&nbsp;<span>]</span></div>
		</div>
		<div class="span-">
			<div class="setItem">[ Подраздел: ]</div>
			<div class="setItemMain">[ Все Подразделы ]</div>
		</div>
		<div class="span-" style="border:1px solid silver; padding:0 4px">
			Выбрать
		</div>
	</div>
</div>
<div class="span-24">
	<div class="span-15 push-1 setWrapper">
		<div class="span-">
			<div class="setItem">[ Категория: ]</div>				
			<div class="setItemMain"><span>[</span>&nbsp;<span>Массивная доска</span>&nbsp;<span>]</span></div>
		</div>
		<div class="span-">
			<div class="setItem">[ Бренд: ]</div>
			<div class="setItemMain"><span>[</span>&nbsp;<span>Zayac risak</span>&nbsp;<span>]</span></div>
		</div>
		<div class="span-">
			<div class="setItem">[ Подраздел: ]</div>
			<div class="setItemMain">[ Все Подразделы ]</div>
		</div>
		<div class="span-" style="border:1px solid silver; padding:0 4px">
			Выбрать
		</div>
	</div>
</div>
<div class="span-24">
	<div class="span-15 push-1 setWrapper">
		<div class="span-">
			<div class="setItem">[ Категория: ]</div>				
			<div class="setItemMain"><span>[</span>&nbsp;<span>Массивная доска</span>&nbsp;<span>]</span></div>
		</div>
		<div class="span-">
			<div class="setItem">[ Бренд: ]</div>
			<div class="setItemMain"><span>[</span>&nbsp;<span>Zayac risak</span>&nbsp;<span>]</span></div>
		</div>
		<div class="span-">
			<div class="setItem">[ Подраздел: ]</div>
			<div class="setItemMain">[ Все Подразделы ]</div>
		</div>
		<div class="span-" style="border:1px solid silver; padding:0 4px">
			Выбрать
		</div>
	</div>
</div>



