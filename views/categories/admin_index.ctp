<?php //debug($cat);?>

<div class="categorys index">
<h2>Основные категории (меню с левой стороны)</h2>
<p><?php echo $html->link('Создать новую категорию', array('action'=>'add')); ?></p>
<br />
<<<<<<< HEAD:views/categories/admin_index.ctp
=======
	<?php if( isset($this->params['paging']['Category']['pageCount']) && $this->params['paging']['Category']['pageCount'] > 1 ): ?>
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
>>>>>>> ec844de8c47dabe98e93be055f311ebd25476b91:views/categories/admin_index.ctp
<table cellpadding="4" cellspacing="0" border="1">
<tr>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('Описание','body');?></th>
	<th class="actions">Действия</th>
</tr>
<?php
$i = 0;
foreach ($cat as $category):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>

		<td>
			<p style="margin-top: 20px; font-size: larger; font-weight: bold;"><?php echo $category['Category']['name']; ?></p>
		</td>
		<td style="width: 480px;" >
			<?php App::import('Core', 'Flay');?>
			<p style="padding: 5px 10px; text-align: left;"><?php echo Flay::fragment( $category['Category']['body'],190); ?></p>
		</td>
		<td class="actions">
			<?php echo $html->link('Редактировать', array('action'=>'edit', $category['Category']['id'])); ?>
			<?php // echo $html->link('Удалить', array('action'=>'delete', $category['Category']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $category['Category']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>

<div class="actions">
	<ul>
		<li><?php //echo $html->link('Создать новую категорию', array('action'=>'add')); ?></li>
		<li><?php //echo $html->link(__('List Brands', true), array('controller'=> 'brands', 'action'=>'index')); ?> </li>
		<li><?php //echo $html->link(__('New Brand', true), array('controller'=> 'brands', 'action'=>'add')); ?> </li>
	</ul>
</div>
