<?php //debug($categories); ?>
<<<<<<< HEAD:views/sub_categories/catlist.ctp
=======
<?php //debug($this->params);?>
>>>>>>> ec844de8c47dabe98e93be055f311ebd25476b91:views/sub_categories/catlist.ctp
<?php //echo $form->input('category_id', array( 'type' => 'select', 'empty' => 'None',  'options' => $categories, 'label' => 'Список Категорий') );?>
<div class="products form">

	<fieldset>
 		<legend>Выберете категорию</legend>
 		<div style="line-height: 1.5em;">
 		<?php foreach( $categories as $category ): ?>
 		
 			<?php if( isset($category['SubCategory']) && $category['SubCategory'] != array() ): ?>
 				<?php echo $html->link( $category['Category']['name'], array('action' => 'index','category:'.$category['Category']['id']) );?>&nbsp;&nbsp;</span><span style="font-size: smaller; color: #777;"><?php echo 'Всего подразделов:';?></span>&nbsp;&nbsp;<?php echo count($category['SubCategory']);?>
 			<?php else: ?>
 				<span style="font-weight: bold;"><?php echo $category['Category']['name']; ?>&nbsp;&nbsp;</span><span style="font-size: smaller; color: rgb(255, 94, 94);"><?php echo 'Подразделы отсутствуют';?></span>&nbsp;&nbsp;<span style="font-size: smaller;"><?php echo $html->link('Создать', array('action' =>'add','category:'.$category['Category']['id']) );?></span>
 			<?php endif ?>
 			<br />
 		<?php endforeach ?>
		</div>
	</fieldset>

</div>
<div class="actions">
	<ul>
		<li><?php //echo $html->link('Список категорий', array('action'=>'index'));?></li>
		<li><?php //echo $html->link(__('List Brands', true), array('controller'=> 'brands', 'action'=>'index')); ?> </li>
		<li><?php //echo $html->link(__('New Brand', true), array('controller'=> 'brands', 'action'=>'add')); ?> </li>
	</ul>
</div>
<hr />
<?php echo $html->link('Управление Категориями', array('controller' => 'categories', 'action' => 'index') );?>