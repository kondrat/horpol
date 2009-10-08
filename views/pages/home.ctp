<?php $this->pageTitle = 'Хороший пол'; ?>

<cake:nocache>
	<?php echo $this->element('staticpages/banner', array('pageName'=>1) ); ?>	
</cake:nocache>	

<cake:nocache>
	<?php echo $this->element('news/twoNews', array('cache' => array('key' => 'twoNews', 'time' => '+300 days') ) ); ?>
</cake:nocache>	

		<p class='menulup' style="margin-bottom: 0;" align='right'><?php echo $html->link('Все новости', array('controller'=>'news','action'=>'index'), array('class' => 'news_all_link')); ?></p>

<div class="maincontent">
							
		<h1>ГЛАВНАЯ СТРАНИЦА</h1>
		<hr>
	<?php //echo $this->element('staticpages/statec_page', array('cache' => array('key' => 'static_pages_1', 'time' => '+300 days') ) ); ?>
	<?php echo $this->element('staticpages/static_page', array('pageName'=>1) ); ?>		


</div>





