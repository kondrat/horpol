<div class="products form">
<?php echo $form->create('Product', array( 'type' => 'file'));?>
	<fieldset>
 		<legend>Редактировать товар</legend>
 		<p style="margin-bottom: 20px;">
 		<?php echo $html->image('catalog/'.$this->data['Product']['logo']); ?>
 		</p>
	<?php
		echo $form->input('id');
		//echo $form->input('subcategory_id');
		echo $form->input('name',array('label' => 'Название товара') );
		echo $form->input('logo', array('type' => 'hidden') );
		echo $form->input('subcategory_id', array('type' => 'hidden') );
		if (isset($catType['Category']['type']) && $catType['Category']['type'] ==3 ) {
			echo $form->input('content1',array('label' => 'Описание товара'));
		}
		//echo $form->input('url');
		//echo $form->input('price');
	?>
		<b>Загрузка Нового Логотипа:</b> 
		<?php echo $form->input('Product.userfile', array('label' => false, 'type'=>'file')); ?>
	</fieldset>
<?php echo $form->end('Сохранить');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Удалить товар', array('action'=>'delete', $form->value('Product.id')), null, sprintf('Подтвердить удаление %s?', $form->value('Product.name'))); ?></li>
		<li><?php //echo $html->link(__('List Products', true), array('action'=>'index'));?></li>

	</ul>
</div>
