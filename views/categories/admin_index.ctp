<div class="actions span-24">
		<h3><?php echo $html->link('Добавить категорию', array('action'=>'add')); ?></h3>
</div>

		<div class="page">
			<?php if( isset($this->params['paging']['Category']['pageCount']) && $this->params['paging']['Category']['pageCount'] > 1 ): ?>
				<?php echo $paginator->prev($html->image('icons/left_arrow.png',array('class'=>'pageImgPrev','alt'=>__('Prev',true) ) ), array('escape' => false ) , $html->image('icons/left_arrow_disable.png'),  array('escape' => false ,'class'=>'menuPage'));?>
  				<?php echo $paginator->numbers( array('modulus'=>'5','separator'=>' &middot; ', 'class' => 'menuPage' ), null );?>
				<?php echo $paginator->next( $html->image('icons/right_arrow.png',array('class'=>'pageImgNext','alt'=>__('Next',true) ) ), array('escape' => false ), $html->image('icons/right_arrow_disable.png'), array('escape' => false ,'class'=>'menuPage'));?>
			<?php endif ?>
		</div>

<table cellpadding="4" cellspacing="0" border="1">
<tr>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('Описание','body');?></th>
	<th><?php echo $paginator->sort('title');?></th>
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
		<td>
			<p style="margin-top: 20px; font-size: larger; font-weight: bold;"><?php echo $category['Category']['title']; ?></p>
		</td>
		<td class="actions">
			<?php echo $html->link('Редактировать', array('action'=>'edit', $category['Category']['id'])); ?>
			<?php // echo $html->link('Удалить', array('action'=>'delete', $category['Category']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $category['Category']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>


<div class="actions">
	<ul>
		<li><?php //echo $html->link('Создать новую категорию', array('action'=>'add')); ?></li>
		<li><?php //echo $html->link(__('List Brands', true), array('controller'=> 'brands', 'action'=>'index')); ?> </li>
		<li><?php //echo $html->link(__('New Brand', true), array('controller'=> 'brands', 'action'=>'add')); ?> </li>
	</ul>
</div>
