<?php //debug($this->params); ?>
<div class="products form">

<?php 
		if (isset($categoryData['Category']['id']) ) {
			echo $form->create( null, array('url' => array('controller' => 'sub_categories', 'action' => 'add', 'category:'.$categoryData['Category']['id']) ) );
		} else {
			echo $form->create('SubCategory');
		} 

?>

	<fieldset>
 		<legend>Новый подраздел</legend>
	<?php
		if (!isset($categoryData) ) {
			echo $form->input('category_id', array( 'type' => 'select', 'empty' => 'None',  'options' => $cat, 'label'=>'Категория') );
			echo '<li>'.$html->link('или создайте новую категорию', array('controller'=> 'categories', 'action'=>'add')).'</li>';
		} else {
			echo '<h3>Категория:&nbsp;'.$categoryData['Category']['name'].'</h3>';
		}
		
		
		
		echo '<br />';
		
		
		
		echo $form->input('brand_id', array('type' => 'select', 'empty' => 'None', 'options' => $brands, 'label' => 'Бренд'));	
		echo '<li>'.$html->link('или создайте новый брэнд', array('controller'=> 'brands', 'action'=>'add')).'</li>';	
	?>
	</fieldset>
	<hr />
	<?php echo $form->submit('Далее ->', array( 'name' => 'category') );?>
<?php echo $form->end();?>
</div>
