<?php debug($image); ?>
<h1><?php echo $html->link('Add image', array('action' => 'add') ); ?> </h1>
<p>
    <?php
    	echo $paginator->counter( array( 'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true) ));
    ?>
</p>
<div class="paging">
	<?php  echo $paginator->sort('Сортировать по дате','created');?>
	<table>
		<tr>
			<td><?php  echo $paginator->prev('Назад', array(), null, array('class'=>'disabled'));?></td>
  			<td><?php  echo $paginator->numbers();?></td>
			<td><?php echo $paginator->next('Вперед', array(), null, array('class'=>'disabled'));?></td>
		</tr>
	</table>
</div>
