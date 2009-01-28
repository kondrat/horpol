<?php //debug($this->params);?>
<?php //debug($subcat);?>
<div class="products form">

<?php echo $form->create( null, array('url' => array('controller' => 'sub_categories', 'action' => 'add','category:'.$par1,'brand:'.$par2)) ); ?>
	<fieldset>
 		<legend>Новый подраздел</legend>
			<table cellpadding="4" cellspacing="0" border="1" style=" width: 550px;">
				<tr>
					<th>Категория</th>
					<th>Брэнд</th>
				</tr>
				<tr>
					<td><p style="margin-top: 20px; font-size: larger; font-weight: bold;"><?php echo $categoryData['Category']['name'];?></p></td>
					<td><?php echo $html->link( $html->image('catalog/'.$brandData['Brand']['logo']), array('controller'=>'Brands', 'action' => 'index', $brandData['Brand']['id']), null, null, false);?></td>
				</tr>
			</table>
			<?php if( isset($subcat) && $subcat != array() ):?>
				<p style="font-weight: bold; font-size: smaller; color: #777; margin: 0 0 5px 7px;">Существующие:</p>
				<div style="width: 550px;">
				<?php foreach($subcat as $singlSubCat):?>
					<p style= "float:left; margin: 0 7px 0 0; font-weight: bold; border: 1px solid; padding: 0 2px"><?php echo $singlSubCat['SubCategory']['name'];?></p>
				<?php endforeach ?>
				</div>
				<div style="clear:both;"></div>
			<?php else:?>
				<p style="font-weight: bold; color: #777; margin: 0 0 5px 7px;">Ни одного подраздела еще не создано.</p>
			<?php endif ?>

	<?php
		//echo $form->input('category_id', array( 'type' => 'select', 'empty' => 'None',  'options' => $cat));
		//echo $form->input('brand_id', array('type' => 'select', 'empty' => 'None', 'options' => $brands));
		
		echo $form->input('name',array('label' => 'Название') );
		//echo $form->input('url');
		
		
		
	?>
	</fieldset>
<?php echo $form->submit('Сохранить' );?>

<?php echo $form->end();?>

</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Список подразделов', array('controller'=> 'sub_categories', 'action'=>'index')); ?> </li>
		<li><?php //echo $html->link(__('List Brands', true), array('controller'=> 'brands', 'action'=>'index')); ?> </li>
		<li><?php //echo $html->link(__('List Categories', true), array('controller'=> 'categories','action'=>'index'));?></li>
	</ul>
</div>
