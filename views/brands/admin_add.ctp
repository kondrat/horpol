<div class="products form">
<?php echo $form->create('Brand', array( 'type' => 'file') );?>
	<fieldset>
 		<legend>Добавить новый Бренд</legend>
	<?php
		echo $form->input('name', array( 'label' => 'Название Бренда', 'error' => false) );
		echo $form->error('name', array('class' => 'error', 'style' => 'color: red') );
		echo $form->input('body', array('label' => 'Описание') );
	?>
		<b>Загрузка Логотипа:</b> 
		<?php echo $form->input('Brand.userfile', array('label' => false, 'type'=>'file')); ?>

	</fieldset>
	<hr />
<?php echo $form->end('Сохранить');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Список Брендов', array('controller'=> 'brands', 'action'=>'index')); ?> </li>
	</ul>
</div>
