<div class="">
<?php echo $form->create('SubCategory' );?>
	<fieldset>
 		<legend>Редактировать название подраздела</legend>
	<?php
		echo $form->input('id');
		echo $form->input('name', array('label' => 'Название подраздела'));
		echo $form->input('category_id', array('type' => 'hidden'));
		echo $form->input('brand_id', array('type' => 'hidden') );
		//echo $form->input('url');
		//echo $form->input('description');
	?>
	</fieldset>
<?php echo $form->end('Сохранить');?>
</div>
<div class="actions">
	<ul>
		<li><?php //echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('SubCategory.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('SubCategory.id'))); ?></li>
		<li><?php //echo $html->link(__('List Products', true), array('action'=>'index'));?></li>
		<li><?php //echo $html->link(__('List Dealers', true), array('controller'=> 'dealers', 'action'=>'index')); ?> </li>
		<li><?php //echo $html->link(__('New Dealer', true), array('controller'=> 'dealers', 'action'=>'add')); ?> </li>
	</ul>
</div>
