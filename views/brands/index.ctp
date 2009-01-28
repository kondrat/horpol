<?php debug($brands);?>

<div>
<h2><?php __('Brands');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<div class="paging">
	<table>
		<tr>
			<td><?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?></td>
  			<td><?php echo $paginator->numbers();?></td>
			<td><?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?></td>
		</tr>
	</table>
</div>
<table cellpadding="4" cellspacing="0" border="1">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php //echo $paginator->sort('title');?></th>
	<th><?php //echo $paginator->sort('description');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($categories as $product):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $product['Product']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($product['User']['username'], array('controller'=> 'users', 'action'=>'view', $product['User']['id'])); ?>
		</td>
		<td>
			<?php echo $product['Product']['title']; ?>
		</td>
		<td>
			<?php echo $product['Product']['description']; ?>
		</td>
		<td>
			<?php echo $product['Product']['created']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $product['Product']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $product['Product']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $product['Product']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $product['Product']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>

<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Brand', true), array('action'=>'add')); ?></li>
		<li><?php //echo $html->link(__('List Dealers', true), array('controller'=> 'users', 'action'=>'index')); ?> </li>
		<li><?php //echo $html->link(__('New User', true), array('controller'=> 'users', 'action'=>'add')); ?> </li>
	</ul>
</div>
