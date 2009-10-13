<?php  $content = $this->requestAction('banners/statpage/'.$pageName); ?>
<?php if( isset($content['Banner']['0']['logo']) ):?>
<div>
	<?php echo $html->image('banner/'.$content['Banner']['0']['logo']); ?>
</div>
<?php endif ?>
