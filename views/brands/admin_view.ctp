<? echo $javascript->link(array('jquery.jeditable.mini','brandEdit'),false);?>
<?php $html->addCrumb('Главная', array('controller'=>'pages','action'=>'index')); ?>
<?php $html->addCrumb('Бренды', array('controller'=>'brands','action'=>'index')); ?>
<?php $html->addCrumb($brand['Brand']['name'], array()); ?>
<div class="span-22 push-1">

	<dl class="viewCat">
		
		<dt>[Логотип:]&nbsp;<span class="catEditButton" id="catNameEdit">Редактировать<div></div></span></dt>
		<dd>
			<div class="span-24" style="margin-bottom:1em;"><div style="padding:8px;background-color:#eee;float:left;"><?php echo $html->image('catalog/'.$brand['Brand']['logo'],array('class'=>'brandShadow')); ?></div></div>
		</dd>
		
		<dt>[Название:]&nbsp;<span class="catEditButton" id="catNameEdit">Редактировать<div></div></span></dt>
		<dd>
			<div class="span-24"><h3 class="edit_name" id="<?php echo $brand['Brand']['id']; ?>_name"><?php echo $brand['Brand']['name']; ?></h3></div>
		</dd>
	
		<dt>[Страна-изготовитель:]&nbsp;<span class="catEditButton" id="catSloganEdit">Редактировать<div></div></span></dt>
		<dd>
			<span class="edit_slogan" id="<?php echo trim($brand['Brand']['id']); ?>_slogan"><?php echo ($brand['Brand']['origin']!=null)?$brand['Brand']['origin']:'Не указана'; ?></span>
		</dd>
		
		<dt style="margin-bottom:.5em;">[Описание:]&nbsp;<span class="catEditButton" id="catBodyEdit">Редактировать<div></div></span></dt>
			<div id="mmm"></div>
			<div id="ttt" style="width:740px;"></div>
		<dd style="width:697px;">
			<span class="edit_body" id="<?php echo trim($brand['Brand']['id']); ?>_body"><?php echo ($brand['Brand']['body']!=null)?$brand['Brand']['body']:'Описане отсутствует'; ?></span>		
		</dd>
	
		<dt>[Дата создания:]</dt>
		<dd>
			<?php //echo $time->relativeTime($brand['Brand']['created'],array('format' =>'d:n:Y','end'=>'+ 1 week'), false); ?>
			<?php echo date('j.n.Y',strtotime($brand['Brand']['created'])); ?>
		</dd>
	</dl>
	
</div>

<div class="span-23 last push-1 catDeleteButton">

	<?php echo $html->link('Удалить Бренд', array('action'=>'delete', $brand['Brand']['id']), null, sprintf(__('Вы подтверждаете удаление Бренда %s?', true), $brand['Brand']['name'])); ?>

</div>



