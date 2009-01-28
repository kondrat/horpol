<?php //debug($session->read('CatBrandData') ); ?>
<div class="products form">
<?php //echo $form->create('SubCategory');?>
<?php 
		if (isset($par1) && isset($par2)) {
			echo $form->create( null, array('url' => array('controller' => 'products', 'action' => 'add', 'category:'.$par1, 'brand:'.$par2)) );
		} else {
			echo $form->create('Product');
		} 

?>

	<fieldset>
 		<legend>Добавить товар</legend>
 		<p style="color: #777; font-weight: bold; font-size: 16px; margin-bottom: 10px;">Выберете Категорию товара и Бренд</p>
	<?php
		echo $form->input('category_id', array( 'type' => 'select', 'empty' => 'None',  'options' => $cat, 'label' => 'Список Категорий'));
		echo '<li>'.$html->link('Или создайте новую категорию', array('controller'=> 'categories', 'action'=>'add')).'</li>';
		echo '<br />';
		echo $form->input('brand_id', array('type' => 'select', 'empty' => 'None', 'options' => $brands, 'label' => 'Список Брендов' ));	
		echo '<li>'.$html->link('Или создайте новый бренд', array('controller'=> 'brands', 'action'=>'add')).'</li>';	
	?>
	</fieldset>
	<?php echo $form->submit('Далее ->', array( 'name' => 'category') );?>
<?php echo $form->end();?>
</div>
