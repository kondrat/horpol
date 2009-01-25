<?php //debug($br);?>

<div>
<h2>Брeнды</h2>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Добавить новый Брeнд', array('action'=>'add')); ?></li>
	</ul>
</div>
	<?php if( isset($this->params['paging']['Brand']['pageCount']) && $this->params['paging']['Brand']['pageCount'] > 1 ): ?>
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
	<?php endif ?>


<table cellpadding="4" cellspacing="0" border="1">
<tr>
	<th><?php echo $paginator->sort('Брэнд','name');?></th>
	<th><?php echo $paginator->sort('Логотип','logo');?></th>
	<th>Описание</th>
	<th class="actions">Действия</th>
</tr>
<?php
$i = 0;
foreach ($br as $brand):
	$class = null;
	$background = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
		$background = 'background-color:#F4F4F4';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<p style="margin-top: 20px; font-size: larger; font-weight: bold;"><?php echo $brand['Brand']['name']; ?></p>
		</td>
		<td>
			<?php echo $html->image( 'catalog/'.$brand['Brand']['logo'] ); ?>
		</td>
		<td style="width: 480px;" >
			<?php App::import('Core', 'Flay');?>
			<p style="padding: 5px 10px; text-align: left;"><?php echo Flay::fragment( $brand['Brand']['body'],190); ?></p>
		</td>
		<td class="actions">
			<p style="margin: 5px 0;"><?php echo $html->link('Редактировать', array('action'=>'edit', $brand['Brand']['id']),array('style' => $background) ); ?></p>
			<?php if( count($brand['SubCategory']) > 0 ):?>
				<p style="font-size: smaller;"><?php echo $html->link('Удалить Бренд с <span style="font-size: larger; font-weight: bold; color: red;">товарами и подразделами</span>', array('action'=>'delete', $brand['Brand']['id']), array('style' => 'color:#777;'.$background), sprintf('Удалить бренд %s?', $brand['Brand']['name']), false ); ?></p>
			<?php else: ?>
				<p style="font-size: smaller;"><?php echo $html->link('Удалить Бренд ', array('action'=>'delete', $brand['Brand']['id']),array('style' => 'color:#777;'.$background), sprintf('Удалить бренд %s?', $brand['Brand']['name']), false ); ?></p>
			<?php endif ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>


