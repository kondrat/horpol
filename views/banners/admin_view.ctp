<?php echo $javascript->link(array('bannerEdit'),false);?>
<?php $html->addCrumb('Главная', array('controller'=>'pages','action'=>'index')); ?>
<?php $html->addCrumb('Баннеры', array('controller'=>'banners','action'=>'index')); ?>
<?php $html->addCrumb('Редактировать', array()); ?>


<div class="span-22 push-1">
	
	<dl class="viewCat">


		<dt>[Логотип:]&nbsp;<a class="editButton" id="brandLogoEdit">Редактировать</a></dt>
		<dd>
			
			<div class="span-24 brandLogo" style="margin-bottom:1em;">
				<div style="padding:8px;background-color:#eee;float:left;">
					<?php echo $form->input('Banner.id',array('value'=>$banner['Banner']['id']));?>
					<?php echo $form->input('Banner.type',array('type'=>'hidden','value'=>$banner['Banner']['type']));?>
					<?php echo $html->image('banner/'.$banner['Banner']['logo'],array('class'=>'bannerLogo')); ?>
				</div>
				<div class="span-10  brandFrom hide" style="margin-bottom:1em;">
				<?php echo $form->create('Banner', array('action'=>'edit','id'=>'storyEditForm', 'type' => 'file'));?>
					<?php echo $form->input('Banner.id',array('value'=>$banner['Banner']['id']));?>
					<?php echo $form->input('Banner.userfile', array('type'=>'file', 'label'=>false ) ); ?>
					<div style="margin:.5em;">
						<?php echo $form->submit('OK',array('id'=>'tuda','class'=>'span-3','div'=>false,'style'=>'margin-right:1em;'));?>
						<?php echo $form->button('Отмена',array('class'=>'span-3 barndLogoCancel'));?>
					</div>
				<?php echo $form->end();?>
				<div class="brandFormError"></div>
				</div>
			</div>
		</dd>
		<dt>[Дата создания:]</dt>
		<dd>
			<?php echo date('j.n.Y',strtotime($banner['Banner']['created'])); ?>
		</dd>
	</dl>

</div>
<div class="span-23 last push-1 deleteButton catDelBut">
	<?php echo $html->link('Удалить Баннер', array('action'=>'delete', $banner['Banner']['id']), null, 'Вы подтверждаете удаление Баннера'); ?>
</div>
