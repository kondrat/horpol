<?php echo $this->element('product/product', array('firstStep'=>'prevStep','secondStep'=>'prevStep','thirdStep'=>'activeStep','forthStep'=>'nextStep','cache' => false ) ); ?>





<div class="actions span-24">
		<h3><?php echo $html->link('Добавить новый товар', array('action'=>'add','category:'.$dataToShow['0']['SubCategory']['category_id'],'brand:'.$dataToShow['0']['SubCategory']['brand_id'],'cat:'.$dataToShow['0']['SubCategory']['id'],'cache:'.false )); ?></h3>
</div>





	<?php if ( isset($this->params['pass'][0]) && (int)$this->params['pass'][0] != null ): ?>
 			<table cellpadding="4" cellspacing="0" border="1" style=" width: 550px;">
				<tr>
					<th>Категория</th>
					<th>Брэнд</th>
					<th>Подраздел</th>	
				</tr>
				<tr>
					<td><p style="margin-top: 20px; font-size: larger; font-weight: bold;"><?php echo $dataToShow[0]['SubCategory']['Category']['name']; ?></p></td>
					<td><?php echo $html->link( $html->image('catalog/'.$dataToShow[0]['SubCategory']['Brand']['logo']), array('controller'=>'Brands', 'action' => 'index', $dataToShow['0']['SubCategory']['Brand']['id']), null, null, false); ?></td>
					
 					<td><?php echo '<p style="margin-top: 20px; font-size: larger; font-weight: bold;">'.$dataToShow['0']['SubCategory']['name'].'</p>';?></td>
				</tr>
			</table>

			<p><?php echo $html->link('Назад в подраздел <em style="color: red;">'.$dataToShow['0']['SubCategory']['name'].'</em>',array('controller' => 'sub_categories', 'action'=>'index','category:'.$dataToShow['0']['SubCategory']['category_id']),false,false,false );?>		
					

			
	<?php endif ?>
	
		<?php 
			$paginator->options(array('url' => $this->passedArgs )); 			
		?>	

		<div class="page">
			<?php if( isset($this->params['paging']['Product']['pageCount']) && $this->params['paging']['Product']['pageCount'] > 1 ): ?>
				<?php echo $paginator->prev($html->image('icons/left_arrow.png',array('class'=>'pageImgPrev','alt'=>__('Prev',true) ) ), array('escape' => false ) , $html->image('icons/left_arrow_disable.png'),  array('escape' => false ,'class'=>'menuPage'));?>
  				<?php echo $paginator->numbers( array('modulus'=>'5','separator'=>' &middot; ', 'class' => 'menuPage' ), null );?>
				<?php echo $paginator->next( $html->image('icons/right_arrow.png',array('class'=>'pageImgNext','alt'=>__('Next',true) ) ), array('escape' => false ), $html->image('icons/right_arrow_disable.png'), array('escape' => false ,'class'=>'menuPage'));?>
			<?php endif ?>
		</div>







<?php echo $form->create(null, array('url' => array('controller' => 'products', 'action' => 'delall'))); ?>

<table cellpadding="4" cellspacing="0" border="1">
<tr>
	<th style=" width: 20px;"><input type="checkbox" id="selectall" style="margin: 3px 0 4px 10px;"></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th>logo</th>
	<?php if ($dataToShow[0]['SubCategory']['Category']['type'] == 3): ?>
		<th>Описание</th>
	<?php endif ?>
	<th class="actions">Действия</th>
</tr>
<?php
$i = 0;
foreach ($products as $product):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td><?php echo $form->checkbox('Product.id.'.$product['Product']['id'], array('class' => 'selectable', 'value' =>$product['Product']['id'], 'style' => 'margin: 35px 5px 10px 5px;' ) ); ?></td>	
		<td>
			<p style="margin-top: 20px; font-size: larger; font-weight: bold;"><?php echo $product['Product']['name']; ?></p>
		</td>
		<td>
			<?php echo $html->image('catalog/'.$product['Product']['logo']); ?>
		</td>
		<?php if ($dataToShow[0]['SubCategory']['Category']['type'] == 3): ?>
			<td>
				<?php echo $product['Product']['content1']; ?>
			</td>
		<?php endif ?>
		<td class="actions">
			<?php //echo $html->link(__('View', true), array('action'=>'view', $product['Product']['id'])); ?>
			<?php echo $html->link('Редактировать', array('action'=>'edit', $product['Product']['id'])); ?>
			<?php echo $html->link('Удалить', array('action'=>'delete', $product['Product']['id']), null, sprintf('Удалть товар %s?', $product['Product']['name'])); ?>
		</td>
	</tr>
<?php endforeach; ?>

</table>
<?php echo $form->submit('Удалить выбранное', array('onclick' => 'return confirm("Удалть выбранные товары?")') );?>
<?php $form->end();?>

