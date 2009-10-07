<?php echo $javascript->link(array('bannerIndex'),false);?>
<?php $html->addCrumb('Главная', array('controller'=>'pages','action'=>'index')); ?>
<?php $html->addCrumb('Баннеры', array('controller'=>'banners','action'=>'index')); ?>
<?php $html->addCrumb('Добавить на страницу', array()); ?>

<div class="span-24 actions">
	<div class="span-24">
		<div class="span-18 push-1"><?php echo $html->image('banner/'.$banner['Banner']['logo']); ?></div>
	</div>

	<?php if($banner['Banner']['type']==1):?>
	
	<div class="span-24" style="margin-bottom:2em;">
		<div class="categories span-24">
			[Статические страницы:]
		</div>
		<div class="span-22">
			Главная
			<?php echo $form->checkbox('StaticPage.id.1',array('class' => 'selectable')); ?>
		</div>
	</div>	
	<div class="span-24" style="margin-bottom:2em;">
		<div class="categories span-24">
			[Страницы категорий:]
		</div>
		
		<?php echo $form->create('Banner',array('action'=>'glue'));?>
			<?php echo $form->input('Banner.id', array('type'=>'hidden', 'value' => $banner['Banner']['id'])); ?>
			<?php //echo $form->input('Category'); ?>
			<?php foreach ($categories as $category):?>			
					<div style="position:relative; float:left;" class="category">
						
						
						<?php echo $html->link(strip_tags($category['Category']['name']),array('action'=>'index'),false,false,false);?>&nbsp;&nbsp;&nbsp;
						<div style="position:absolute;top:2px;right:25px;z-index:10;"><?php echo $html->image('icons/'.$category['Category']['type'].'_type.png',array('title'=>'Тип категории'));?></div>
						<?php echo $form->checkbox('Category.Category][',array('class' => 'selectable', 'value' =>$category['Category']['id'])); ?>
						
					</div>				
			<?php endforeach; ?>

	</div>	
			<?php echo $form->submit('Прикрепить баннер',array('class'=>'span-5'));?>
			<?php echo $form->end();?>
	<?php elseif($banner['Banner']['type']==2):?>
	
	
	
	<?php else: ?>
	
	
	
	<?php endif ?>



				
</div>


