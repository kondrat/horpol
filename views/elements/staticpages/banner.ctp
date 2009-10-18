<?php  $content = $this->requestAction('banners/statpage/'.$pageName); ?>
<?php if( isset($content['Banner']['0']['logo']) ):?>
<div>
	<?php if($content['Banner']['0']['url'] != null ):?>
		<?php echo $html->link($html->image('banner/'.$content['Banner']['0']['logo'],array('class'=>'','style'=>'border:none')),$content['Banner']['0']['url'],array(),false,false)  ; ?>
	<?php else: ?>
		<?php echo $html->image('banner/'.$content['Banner']['0']['logo'],array('class'=>'bannerLogo')); ?>
	<?php endif ?>
</div>
<?php endif ?>
