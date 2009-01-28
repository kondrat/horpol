<?php //debug($products); ?>
<?php //debug($this->params);?>
<?php //debug($dataToShow);?>
<div class="products index">
<h2>Список товаров&nbsp;<span style="font-size: smaller;">
							<?php //echo $html->link('все товары', array('action' => 'index') );?>
						</span></h2>
	<?php if ( isset($this->params['pass'][0]) && (int)$this->params['pass'][0] != null ): ?>
 			<table cellpadding="4" cellspacing="0" border="1" style=" width: 550px;">
				<tr>
					<th>Категория</th>
					<th>Брэнд</th>
					<th>Подраздел</th>	
				</tr>
				<tr>
					<td><p style="margin-top: 20px; font-size: larger; font-weight: bold;"><?php echo $dataToShow[0]['subCategory']['Category']['name']; ?></p></td>
					<td><?php echo $html->link( $html->image('catalog/'.$dataToShow[0]['subCategory']['Brand']['logo']), array('controller'=>'Brands', 'action' => 'index', $dataToShow['0']['subCategory']['Brand']['id']), null, null, false); ?></td>
					
 					<td><?php echo '<p style="margin-top: 20px; font-size: larger; font-weight: bold;">'.$dataToShow['0']['subCategory']['name'].'</p>';?></td>
				</tr>
			</table>
			<p><?php echo $html->link('Назад в подраздел <em style="color: red;">'.$dataToShow['0']['subCategory']['name'].'</em>',array('controller' => 'sub_categories', 'action'=>'index','category:'.$dataToShow['0']['subCategory']['category_id']),false,false,false );?>		
			<div class="actions">
				<ul>
					<li><?php echo $html->link('Добавить новый товар', array('action'=>'add','category:'.$dataToShow['0']['subCategory']['category_id'],'brand:'.$dataToShow['0']['subCategory']['brand_id'],'cat:'.$dataToShow['0']['subCategory']['id'],'cache:'.false )); ?></li>
			
				</ul>
			</div>						
			
	<?php endif ?>
	
	

		<?php if( isset($this->params['paging']['Product']['pageCount']) && $this->params['paging']['Product']['pageCount'] > 1 ): ?>
			<p>
				<?php echo $paginator->counter(array('format' => __('Страница %page% из %pages%.', true)));?>
			</p>
			<div class="paging">
				<table>
					<tr>
						<td><?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?></td>
			  			<td><?php echo $paginator->numbers();?></td>
						<td><?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?></td>
					</tr>
				</table>
			</div>
		<?php endif ?>


<?php echo $form->create(null, array('url' => array('controller' => 'products', 'action' => 'delall'))); ?>
<?php echo $javascript->link(array('jquery-1.2.6','horpol'),false);?>

<table cellpadding="4" cellspacing="0" border="1">
<tr>
	<th style=" width: 20px;"><input type="checkbox" id="selectall" style="margin: 3px 0 4px 10px;"></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th>logo</th>
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
</div>
