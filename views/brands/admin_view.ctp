<? echo $javascript->link(array('jquery.jeditable.mini','brandEdit'),false);?>
<?php $html->addCrumb('Главная', array('controller'=>'pages','action'=>'index')); ?>
<?php $html->addCrumb('Бренды', array('controller'=>'brands','action'=>'index')); ?>
<?php $html->addCrumb($brand['Brand']['name'], array()); ?>
<div class="span-22 push-1">

	<dl class="viewCat">
		
		<dt>[Логотип:]&nbsp;<a class="editButton" id="brandLogoEdit">Редактировать</a></dt>
		<dd>
			<div class="span-24 brandLogo" style="margin-bottom:1em;">
				<div style="padding:8px;background-color:#eee;float:left;">
					<?php echo $html->image('catalog/'.$brand['Brand']['logo'],array('class'=>'brandShadow')); ?>
				</div>
				<div class="span-10 push-1 brandFrom hide" style="margin-bottom:1em;">
				<?php echo $form->create('Brand', array('action'=>'edit','id'=>'storyEditForm', 'type' => 'file'));?>
					<?php echo $form->input('Brand.id',array('value'=>$brand['Brand']['id']));?>
					<?php echo $form->input('Brand.userfile', array('type'=>'file', 'label'=>false ) ); ?>
					<div style="margin:.5em;">
						<?php echo $form->submit('OK',array('id'=>'tuda','class'=>'span-3','div'=>false,'style'=>'margin-right:1em;'));?>
						<?php echo $form->button('Отмена',array('class'=>'span-3 barndLogoCancel'));?>
					</div>
				<?php echo $form->end();?>
				<div class="brandFormError"></div>
				</div>
			</div>
				
		</dd>
		
		<dt>[Название:]&nbsp;<a class="editButton" id="brandNameEdit">Редактировать</a></dt>
		<dd>
			<div class="span-24"><h3 class="edit_name" id="<?php echo $brand['Brand']['id']; ?>_name"><?php echo $brand['Brand']['name']; ?></h3></div>
		</dd>
	
		<dt>[Страна-изготовитель:]&nbsp;<a class="editButton" id="brandOriginEdit">Редактировать</a></dt>
		<dd>
			<span class="edit_origin" id="<?php echo trim($brand['Brand']['id']); ?>_origin"><?php echo ($brand['Brand']['origin']!=null)?$brand['Brand']['origin']:'Не указана'; ?></span>
		</dd>
		
		<dt style="margin-bottom:.5em;">[Описание:]&nbsp;<a class="editButton" id="brandBodyEdit">Редактировать</a></dt>
			<div id="mmm"></div>
			<div id="ttt" style="width:740px;"></div>
		<dd style="width:697px;">
			<span class="edit_body" id="<?php echo trim($brand['Brand']['id']);?>_body"><?php echo ($brand['Brand']['body']!=null)?$brand['Brand']['body']:'Описане отсутствует'; ?></span>		
		</dd>
	
		<dt>[Дата создания:]</dt>
		<dd>
			<?php //echo $time->relativeTime($brand['Brand']['created'],array('format' =>'d:n:Y','end'=>'+ 1 week'), false); ?>
			<?php echo date('j.n.Y',strtotime($brand['Brand']['created'])); ?>
		</dd>
	</dl>
	
</div>

<div class="span-23 last push-1 deleteButton brandDelBut">

	<?php echo $html->link('Удалить Бренд', array('action'=>'delete', $brand['Brand']['id']), null, sprintf(__('Вы подтверждаете удаление Бренда %s?', true), $brand['Brand']['name'])); ?>

</div>



