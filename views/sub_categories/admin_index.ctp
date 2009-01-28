<?php //debug($subCat);?>
<?php 
	//debug($brands);
	//debug($this->params);
	foreach ($brands as $v ) {
		$brandToSelect[$v['Brand']['id']] = $v['Brand']['name']; 
	}

?>

<div>
<h3>Категория:&nbsp;<?php echo $subCat['0']['Category']['name']; ?></h3>
<p><?php echo $html->link('Создать новый подраздел с выбором бренда', array('action'=>'add','category:'.$this->params['named']['category']),array('style'=>'font-weight: bold; color:#777;')); ?></p>

<p><?php echo $html->link('Другая категория', array('action' => 'index') );?></p>
<p style="margin: 10px;">
	<?php echo $form->create(null, array('type'=> 'get', 'url' => array('controller' => 'sub_categories', 'action' => 'index','category:'.$this->params['named']['category']) ) ); ?>
	<?php echo $form->input('brand',array('options' => $brandToSelect, 'empty' => 'все бренды', 'label'=>'Бренды категории ', 'class' => 'selBrand', 'div'=> false)); ?>
	<?php echo $form->submit('Выбрать бренд', array('div' => false) );?>
	<?php echo $form->end(); ?>
</p>
<br />
		<?php 
			$toPage['category'] = $this->params['named']['category'];
			if (isset($this->params['named']['brand']) && $this->params['named']['brand'] != null) {
				$toPage['brand'] = $this->params['named']['brand'];
			}
			$this->passedArgs = $toPage;	 
			$paginator->options(array('url' => $this->passedArgs )); 
		?>
		
		
	<?php if( isset($this->params['paging']['SubCategory']['pageCount']) && $this->params['paging']['SubCategory']['pageCount'] > 1 ): ?>
		<p><?php echo $paginator->counter(array('format' => __('Страница %page% из %pages%.', true)));?></p>
		<div class="paging">
			<table>
				<tr>
					<td><?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?></td>
		  			<td><?php echo $paginator->numbers();?></td>
					<td><?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?></td>
				</tr>
			</table>
		</div>
	<? endif ?>

<table cellpadding="4" cellspacing="0" border="1">
<tr>
	<th><?php echo $paginator->sort('Бренд','brand_id');?></th>
	<th><?php echo $paginator->sort('Подраздел','name');?></th>
	<th><?php echo $paginator->sort('Товаров в подразделе','product_count');?></th>
	<th class="actions">Действия</th>
</tr>
<?php
$i = 0;
foreach ($subCat as $subcategory):
	$class = null;
	$background = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
		$background = " background-color: #F4F4F4";
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $html->image( 'catalog/'.$subcategory['Brand']['logo']); ?>
		</td>
		<td>
			<p style="margin-top: 10px; font-size: larger; font-weight: bold;"><?php echo $subcategory['SubCategory']['name']; ?></p>
			
				<?php echo $html->link('Создать новый подраздел для данного бренда', array('action'=>'add','category:'.$subcategory['Category']['id'],'brand:'.$subcategory['Brand']['id']),array('style'=>'font-weight: bold; color:#777;'.$background)); ?>

		</td>
		<td>
			<?php if ( $subcategory['SubCategory']['product_count'] > 0 ): ?>
				<p style="margin-top: 5px; font-size: larger; font-weight: bold;"><span style="font-size: smaller">Кол-во товаров:</span>&nbsp;<?php echo $subcategory['SubCategory']['product_count']; ?></p>
				<?php echo $html->link('Посмотреть товары подраздела',array('controller' => 'products', 'action' => 'index',$subcategory['SubCategory']['id']),array('style'=>'font-size:smaller; color:#777;') );?>
			<?php else: ?>
				<p style="margin-top: 10px;  font-weight: bold; color: #FF5E5E;">Товары отсутствуют</p>
			<?php endif ?>
			<p><?php echo $html->link('Добавить товар в этот подраздел', array('controller'=>'products', 'action'=>'add','category:'.$subcategory['Category']['id'],'brand:'.$subcategory['Brand']['id'],'cat:'.$subcategory['SubCategory']['id'],'cache:'.false),array('style'=>'font-size: smaller;color:#006200;'.$background ) );?></p>
				
		</td>
		<td class="actions">
			<p style="margin-top: 15px;"><?php echo $html->link('Редактировать название подраздела', array('action'=>'edit', $subcategory['SubCategory']['id']),array('style' => $background)); ?></p>
			<?php if ( $subcategory['SubCategory']['product_count'] > 0 ): ?>
				<p><?php echo $html->link('Удалить подраздел и <span style="font-size: larger;color:red;">все товары?</span>', array('action'=>'delete', $subcategory['SubCategory']['id']), array('style'=>'font-size:smaller; color:#777;'.$background), sprintf('Подтвердить удаление %s?', $subcategory['SubCategory']['name']), false );?></p>
			<?php else: ?>
				<p><?php echo $html->link('Удалить пустой подраздел?', array('action'=>'delete', $subcategory['SubCategory']['id']), array('style'=>'font-size:smaller; color:#777;'.$background), sprintf('Подтвердить удаление %s?', $subcategory['SubCategory']['name']) );?></p>
			<?php endif ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>

