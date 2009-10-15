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
		<div class="span-22 " style="font-size:12pt;">
			<div class="category" style="float:left;">
				<a>Главная</a>
				<?php $checked = (isset($staticpages['Banner']['0']['id'])&&$staticpages['Banner']['0']['id'] == $banner['Banner']['id'])?true:false;?>
				<?php echo $form->checkbox('StaticPage.StaticPage][',array('class' => 'selectable','checked'=>$checked,'value' =>'1')); ?>
			</div>
		</div>
	</div>	
	<div class="span-24" style="margin-bottom:2em;">
		<div class="categories span-24">
			[Страницы категорий:]
		</div>
		

			<?php echo $form->input('Banner.id', array('type'=>'hidden', 'value' => $banner['Banner']['id'])); ?>

			<?php foreach ($categories as $category):?>			
					<div style="position:relative; float:left;" class="category">					
						<a><?php echo strip_tags($category['Category']['name']);?></a>&nbsp;&nbsp;&nbsp;
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
				<?php echo $form->input('Banner.id', array('type'=>'hidden', 'value' => $banner['Banner']['id'])); ?>
				<?php foreach($new as $n):?>
				
				<div class="span-23 push-1" style="background-color:#eee;padding:1em 0 0 1em;">
					<div class="categories span-23">
						[Категория:]
					</div>
					<div class="category2" style="">
						<a style="text-decoration:none;"><?php echo strip_tags($n['cat']['name']);?></a>&nbsp;&nbsp;&nbsp;
						<div style="position:absolute;top:2px;right:0px;z-index:10;"><?php echo $html->image('icons/'.$n['cat']['type'].'_type.png',array('title'=>'Тип категории'));?></div>
					</div>
					<div class="categories span-23">
						[Связанные бренды:]
					</div>
					<div class="span-23">
						
							<?php foreach($n['item'] as $itt):?>	
									<div class="bannerLi" style="float:left;margin:0.3em 1em .3em 0;  padding:0em .2em .3em .5em;">
										[&nbsp;<a><?php echo	$itt['Brand']['name'];?></a>&nbsp;]
										<?php $checked = (isset($itt['Banner']['0']['id'])&&$itt['Banner']['0']['id'] == $banner['Banner']['id'])?true:false;?>
										<?php echo $form->checkbox('BrandsCategory.BrandsCategory][',array('class' => 'selectable','checked'=>$checked, 'value' =>$itt['BrandsCategory'])); ?>
									</div>
							<?php endforeach; ?>	
						
					</div>
				</div>
				<?php endforeach; ?>
			<div class="span-24">
				<?php echo $form->submit('Прикрепить баннер',array('class'=>'span-5'));?>
			<?php echo $form->end();?>	
			</div>
			
			
		<?php else: ?>
		
	<?php endif ?>



				
</div>


