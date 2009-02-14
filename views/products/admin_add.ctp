<?php  //debug($this->data);?>
<?php //debug($session->read('CatBrandData') );?>
<div class="products form">


<?php echo $form->create( null, array('url' => array('controller' => 'products', 'action' => 'add'), 'type'=>'file' ), array() ); ?>
	<fieldset>
 		<legend>Добавить Товар</legend>
 			<table cellpadding="4" cellspacing="0" border="1" style=" width: 550px;">
				<tr>
					<th>Категория</th>
					<th>Бренд</th>
					<?php
					if ( $session->check('CatBrandData.ses') == true ) {
 						echo '<th>Подраздел</th>';
					}
					?>
				</tr>
				<tr>
					<td><p style="margin-top: 20px; font-size: larger; font-weight: bold;"><?php echo $session->read('CatBrandData.category.name'); ?></p></td>
					<td><?php echo $html->link( $html->image('catalog/'.$session->read('CatBrandData.brand.logo')), array('controller'=>'Brands', 'action' => 'index', $session->read('CatBrandData.brand.id')), null, null, false); ?></td>
					<?php
						if ( $session->check('CatBrandData.ses') == true ) {
 							echo '<td><p style="margin-top: 20px; font-size: larger; font-weight: bold;">'.$session->read('CatBrandData.subcatFinal.name').'</p></td>';
						}
					?>
				</tr>
			</table>
			<?php
				if ( $session->check('CatBrandData.ses') != true ) {
		 			echo $form->input('remember_cat', array('label' => 'Запомнить параметры', 'type' => 'checkbox','checked' => true ));
				} else {
					echo  $html->link('Сбросить параметры', array('controller'=> 'products', 'action'=>'add','cache:'.false), array('style' => 'color: #777') ).'<br />';
				}
			?>
			<br />	
			<hr />
			<br />	
 	<?php

		if ( $session->check('CatBrandData.ses') != true ) {
 			//echo $form->input('remember_cat', array('label' => 'remember SubCategory', 'type' => 'checkbox','checked' => true ));
		} else {

			//echo $html->link('Добавить подкатегорию', array('controller'=> 'sub_categories', 'action'=>'add','category:'.$session->read('CatBrandData.category.id'),'brand:'.$session->read('CatBrandData.brand.id')) );

		}
 	?>

	<?php
		if ( $session->check('CatBrandData.ses') != true ) {
 			foreach($session->read('CatBrandData.subcat') as $subcatID) {
 				$options[$subcatID['subCategory']['id']] = $subcatID['subCategory']['name'];
 			}
 				echo '<div class="input">';
 			echo $form->label('subcategory_id', 'Выберите подраздел  <span>'.$html->link('или добавьте новый подраздел', array('controller'=> 'sub_categories', 'action'=>'add','category:'.$session->read('CatBrandData.category.id'),'brand:'.$session->read('CatBrandData.brand.id')), array('style'=>'font-size:smaller; color: #777') ).'</span>');
 			echo $form->select('subcategory_id', array($options), null, array(), 'пусто' );
 			echo $form->error('subcategory_id');
 				echo '</div>';
		}
		echo $form->input('name',array('label'=>'Название товара'));
		if ( $session->read('CatBrandData.category.type') && $session->read('CatBrandData.category.type') == 3 ) {
			echo $form->input('content1',array('label'=>'Описание товара'));
		}
		echo $form->input('Product.userfile', array('label' => 'Загрузка Логотипа:', 'type'=>'file') );
		// echo $form->input('url');	
	?>
	</fieldset>
	<?php 
		echo $form->submit('Сохранить',array( ));
		echo $form->end()
	?>
</div>
<div class="actions">
	<ul>
		<li><?php //echo $html->link(__('List SubCategories', true), array('controller'=> 'sub_categories', 'action'=>'index')); ?> </li>
		<li><?php //echo $html->link(__('List Brands', true), array('controller'=> 'brands', 'action'=>'index')); ?> </li>
		<li><?php //echo $html->link(__('List Categories', true), array('controller'=> 'categories','action'=>'index'));?></li>
	</ul>
</div>
