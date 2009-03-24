<div class="maincontent">

<p style="font-size:larger;"><?php echo $html->link('Добавить новость', array('controller' => 'news', 'action' => 'add') ) ?></p>
<br />
<br />



	<?php if( isset($this->params['paging']['News']['pageCount']) && $this->params['paging']['News']['pageCount'] > 1 ): ?>
		<p><?php echo $paginator->counter(array('format' => __('Страница %page% из %pages%.', true)));?></p>
		
		<div class="paging">
			<?php echo $paginator->sort('Сортировать по дате','created');?>
			<table>
				<tr>
					<td><?php echo $paginator->prev('Назад', array(), null, array('class'=>'disabled'));?></td>
		  			<td><?php echo $paginator->numbers();?></td>
					<td><?php echo $paginator->next('Вперед', array(), null, array('class'=>'disabled'));?></td>
				</tr>
			</table>
		</div>
	<?php endif ?>
	<?php //debug($listNews);?>
	
	
	
	<?php foreach($News as $list): ?>
		<?php echo $html->link( date( 'd.m.y', strtotime($list['News']['created']) ).' '.$list['News']['name'] , array('controller' => 'News', 'action' => 'view', $list['News']['id']), array('class' => 'menulup') ) ;?>

		<br />
		<p>
		<?php 
			App::import('Vendor', 'fly2');
			$fly2 = new fly2();
			echo  $fly2->fragment(strip_tags($list['News']['body']), 70); 
		?>
		</p>
		<br />
			<p style="font-size:smaller;"><?php echo $html->link('Редактировать новость', array('action'=>'edit', $list['News']['id']), array('style' => "color: #777;") ); ?></p>
			<p style="font-size:smaller;"><?php echo $html->link('Удалить новость', array('action'=>'delete', $list['News']['id']), array('style' => "color:#FF5E5E;"), sprintf('Удалить новость от %s?', date( 'd.m.y', strtotime($list['News']['created'])) ) ); ?></p>

		<br />
		<hr />
		<br />
	<?php endforeach ?>


	
</div>