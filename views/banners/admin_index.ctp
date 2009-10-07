<?php echo $javascript->link(array('bannerIndex'),false);?>
<?php $html->addCrumb('Главная', array('controller'=>'pages','action'=>'index')); ?>
<?php $html->addCrumb('Баннеры', array()); ?>

<div class="actions span-24">
		<h3><?php echo $html->link('Добавить новый Баннер', array('action'=>'add')); ?></h3>
</div>

<div class="span-24">
	<div class="span-23 push-1">
		<div class="span-1">
			<?php echo $html->link('все',array('controller'=>'banners','action'=>'index'));?>
		</div>
		<div class="span-2">
			<?php echo $html->link('длинные',array('controller'=>'banners','action'=>'index','type:1'));?>
		</div>
		<div class="span-2">
			<?php echo $html->link('короткие',array('controller'=>'banners','action'=>'index','type:2'));?>
		</div>
	</div>
				<?php foreach ($banners as $banner):?>
						<div class="span-18 push-1"><?php echo $html->image('banner/'.$banner['Banner']['logo']); ?></div>
						<div class="span-4" style="margin:1em 0 .5em;"><?php echo $html->link('Добавить на страницу',array('controller'=>'banners','action'=>'append',$banner['Banner']['id']),array('class'=>'tagBanner'));?></div>
						<div class="span-4"><?php echo $html->link('Редактировать',array('controller'=>'banners','action'=>'view',$banner['Banner']['id']),array('class'=>'categoryEditButton'));?></div>
						
				<?php endforeach; ?>				
</div>


							<?php //echo $html->link(__('View', true), array('action' => 'view', $banner['Banner']['id'])); ?>
							<?php //echo $html->link(__('Edit', true), array('action' => 'edit', $banner['Banner']['id'])); ?>
							<?php //echo $html->link(__('Delete', true), array('action' => 'delete', $banner['Banner']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $banner['Banner']['id'])); ?>
