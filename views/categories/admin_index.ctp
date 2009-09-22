<? echo $javascript->link(array('jquery-ui-1.7.2.custom.min','catSort'),false);?>
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


			<div id="item_<?php echo $category['Category']['id'];?>" class="span-14" style="border:1px solid;float:left;padding:.5em;background-color:#fff;margin-bottom:.5em;">
				<div class="span-1 moveCat"></div>
				<div class="span-5"><?php echo $category['Category']['name']; ?></div>
				<div class="span-3 last"<?php echo $html->link('Редактировать', array('action'=>'view', $category['Category']['id'])); ?></div>			
			</div>



			<?php // echo $html->link('Удалить', array('action'=>'delete', $category['Category']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $category['Category']['id'])); ?>

<?php endforeach; ?>
</div>
<div id="infoSort" class="span-24">InfoSort</div>

