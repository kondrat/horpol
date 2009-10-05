<?php $this->pageTitle = 'О компании'; ?>
<div class="maincontent">
<h1>О компании</h1>
<br><br>
	<?php //echo $this->element('staticpages/statec_page', array('cache' => array('key' => 'static_pages_3', 'time' => '+300 days') ) ); ?>
	<?php echo $this->element('staticpages/static_page', array('pageName'=>3) ); ?>
</div>
