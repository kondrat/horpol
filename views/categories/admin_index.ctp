<? echo $javascript->link(array('jquery/jquery-ui-1.7.2.custom.min','catSort'),false);?>
<?php $html->addCrumb('Главная', array('controller'=>'pages','action'=>'index')); ?>
<?php $html->addCrumb('Категории', array()); ?>
<div class="actions span-24">
		<h3><?php echo $html->link('Добавить категорию', array('action'=>'add')); ?></h3>
</div>

<div id="sortableList" class="span-20 prepend-4">
<?php
$i = 0;
foreach ($categories as $category):
	/*
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
	*/
?>
	<?php //echo $class;?>


			<div id="item_<?php echo $category['Category']['id'];?>" class="span-14 categoryIndex">
				<div class="span-1 moveCat last"></div>
				<div class="span-1"><?php echo $html->image( 'icons/'.$category['Category']['type'].'_type.png');?></div>
				<div class="span-5"><?php echo $category['Category']['name']; ?></div>
				<div class="span-3 last"><?php echo $html->link('Редактировать', array('action'=>'view', $category['Category']['id']),array('class'=>'categoryEditButton') ); ?></div>			
			</div>



			<?php // echo $html->link('Удалить', array('action'=>'delete', $category['Category']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $category['Category']['id'])); ?>

<?php endforeach; ?>
</div>

