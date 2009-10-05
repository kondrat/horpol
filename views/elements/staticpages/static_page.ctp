<?php  $content = $this->requestAction('static_pages/view/'.$pageName); ?>
<div class="pageContent">
	<?php echo($content['StaticPage']['body']);?>
</div>
