<? echo $javascript->link(array('newsEdit'),false);?>
<?php $html->addCrumb('Главная', array('controller'=>'pages','action'=>'index')); ?>
<?php $html->addCrumb('Новости', array()); ?>

<div class="actions span-24">
		<h3><?php echo $html->link('Добавить новость', array('controller' => 'news', 'action' => 'add') ) ?></h3>
</div>


		<div class="page">
			<?php if( isset($this->params['paging']['News']['pageCount']) && $this->params['paging']['News']['pageCount'] > 1 ): ?>
				<?php echo $paginator->prev($html->image('icons/left_arrow.png',array('class'=>'pageImgPrev','alt'=>__('Prev',true) ) ), array('escape' => false ) , $html->image('icons/left_arrow_disable.png'),  array('escape' => false ,'class'=>'menuPage'));?>
  				<?php echo $paginator->numbers( array('modulus'=>'5','separator'=>' &middot; ', 'class' => 'menuPage' ), null );?>
				<?php echo $paginator->next( $html->image('icons/right_arrow.png',array('class'=>'pageImgNext','alt'=>__('Next',true) ) ), array('escape' => false ), $html->image('icons/right_arrow_disable.png'), array('escape' => false ,'class'=>'menuPage'));?>
			<?php endif ?>
		</div>
	
	
<div class="span-24">	
	<?php foreach($allnews as $list): ?>
	<div class="span-20 push-1 newsWrapper">
		<div class="span-2">
			<?php echo $html->link( date( 'd.m.y', strtotime($list['News']['created']) ) , array('controller' => 'News', 'action' => 'view', $list['News']['id']), array('class' => '') ) ;?>
		</div>
		<?php echo $html->link( $list['News']['name'] , array('controller' => 'News', 'action' => 'view', $list['News']['id']), array('class' => 'newsHead') ) ;?>
		<span class="newsTest"></span>



		<div class="span-21  prepend-2">
		<?php 
			App::import('Vendor', 'fly2');
			$fly2 = new fly2();
			echo  $fly2->fragment(strip_tags($list['News']['body']), 70); 
		?>
		</div>

			<p style="font-size:smaller;"><?php //echo $html->link('Редактировать новость', array('action'=>'edit', $list['News']['id']), array('style' => "color: #777;") ); ?></p>
			<p style="font-size:smaller;"><?php //echo $html->link('Удалить новость', array('action'=>'delete', $list['News']['id']), array('style' => "color:#FF5E5E;"), sprintf('Удалить новость от %s?', date( 'd.m.y', strtotime($list['News']['created'])) ) ); ?></p>
	</div>
	<?php endforeach ?>
</div>

	
