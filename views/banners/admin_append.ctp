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
		<?php echo $form->create('Banner',array('action'=>'glue'));?>
		<div class="span-22">
			Главная
			<?php $checked = (isset($staticpages['Banner']['0']['id'])&&$staticpages['Banner']['0']['id'] == $banner['Banner']['id'])?true:false;?>
			<?php echo $form->checkbox('StaticPage.StaticPage',array('class' => 'selectable','checked'=>$checked,'value' =>'1')); ?>
		</div>
	</div>	
	<div class="span-24" style="margin-bottom:2em;">
		<div class="categories span-24">
			[Страницы категорий:]
		</div>
		

			<?php echo $form->input('Banner.id', array('type'=>'hidden', 'value' => $banner['Banner']['id'])); ?>
			<?php //echo $form->input('Category'); ?>
			<?php foreach ($categories as $category):?>			
					<div style="position:relative; float:left;" class="category">
						
						
						<?php echo $html->link(strip_tags($category['Category']['name']),array('action'=>'index'),false,false,false);?>&nbsp;&nbsp;&nbsp;
						<div style="position:absolute;top:2px;right:25px;z-index:10;"><?php echo $html->image('icons/'.$category['Category']['type'].'_type.png',array('title'=>'Тип категории'));?></div>
						<?php $checked = (isset($category['Banner']['0']['id'])&&$category['Banner']['0']['id'] == $banner['Banner']['id'])?true:false;?>
						<?php echo $form->checkbox('Category.Category][',array('class' => 'selectable','checked'=>$checked, 'value' =>$category['Category']['id'])); ?>
						
					</div>				
			<?php endforeach; ?>

	</div>	
			<?php echo $form->submit('Прикрепить баннер',array('class'=>'span-5'));?>
			<?php echo $form->end();?>
	<?php elseif($banner['Banner']['type']==2):?>
		<?php echo $form->create('Banner',array('action'=>'glue2'));?>
		<?php foreach($new as $n):?>
		<div class="category">
			<a><?php echo $n['cat'];?></a>
		</div>
		<ul>
			<?php foreach($n['item'] as $itt):?>	
					<li style="display:inline;">
						<a><?php echo	$itt['Brand']['name'];?></a>
						<?php $checked = (isset($itt['Banner']['0']['id'])&&$itt['Banner']['0']['id'] == $banner['Banner']['id'])?true:false;?>
						<?php echo $form->checkbox('Category.Category][',array('class' => 'selectable','checked'=>$checked, 'value' =>$itt['Brand']['id'])); ?>
					</li>
			<?php endforeach; ?>	
		</ul>	
		<?php endforeach; ?>
			<?php echo $form->submit('Прикрепить баннер',array('class'=>'span-5'));?>
			<?php echo $form->end();?>	
		<?php else: ?>
		
	<?php endif ?>



				
</div>


