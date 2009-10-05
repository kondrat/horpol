<? echo $javascript->link(array('newsEdit'),false);?>
<?php $html->addCrumb('Главная', array('controller'=>'pages','action'=>'index')); ?>
<?php $html->addCrumb('Статические страницы', array()); ?>
<div class="span-24">
	
	
	<div class="span-24">	
		<?php foreach($staticPages as $list): ?>
		<div class="span-20 push-1 newsWrapper">
	
			<?php echo $html->link( $list['StaticPage']['name'] , array('controller' => 'static_pages', 'action' => 'view', $list['StaticPage']['id']), array('class' => 'newsHead') ) ;?>
			<span class="newsTest"></span>
	
		</div>
		<?php endforeach ?>
	</div>
</div>

