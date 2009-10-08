<?php  $content = $this->requestAction('banners/statpage/'.$pageName); ?>
<div>
	<?php echo $html->image('banner/'.$content['Banner']['0']['logo']); ?>
</div>
