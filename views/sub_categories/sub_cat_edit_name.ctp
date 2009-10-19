	<?php
		echo $form->create(null,array('url'=>array('controller'=>'sub_categories','action' => 'edit','admin'=>true) ) );
		echo $form->hidden('SubCategory.id');
		echo $form->hidden('SubCategory.brand_category_id');
		echo $form->input('SubCategory.name',array('label'=>false,'id'=>'subCatEditName','style'=>'width:360px;'));
	?>
	<div class="span-24" style="margin:0em 0;">
		<div id="SubCategoryEditError"></div>
	<?php
		echo $form->submit('Сохранить',array('class'=>'span-3  subCatEditSubmit','div'=>array('class'=>'span-3') ) );
		echo $form->button('Отмена',array('class'=>'span-3 catBodyCancel','id'=>'catBodyCancel') );
	?>
	</div>
	<?php
		echo $form->end();
	?>
