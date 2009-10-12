<? echo $javascript->link(array('jquery/jquery.jeditable.mini','catEdit'),false);?>
<?php $html->addCrumb('Главная', array('controller'=>'pages','action'=>'index')); ?>
<?php $html->addCrumb('Категории', array('controller'=>'categories','action'=>'index')); ?>
<?php $html->addCrumb($category['Category']['name'], array()); ?>
<div class="span-22 push-1">

	<dl class="viewCat">
		<dt>[Название:]&nbsp;<a class="editButton" id="catNameEdit">Редактировать</a></dt>
		<dd>
			<div class="span-24"><h3 style="color:#911B3B;" class="edit_name" id="<?php echo $category['Category']['id']; ?>_name"><?php echo $category['Category']['name']; ?></h3></div>
		</dd>
		
		<dt>[Тип категории:]&nbsp;<a class="editButton" id="catTypeEdit">Редактировать</a></dt>
		<dd>
			<span class="edit_type" id="<?php echo trim($category['Category']['id']); ?>_type"><?php echo $this->element('category/category_type',array('catType'=> $category['Category']['type']) ); ?></span>
		</dd>
		
		<dt>[Слоган:]&nbsp;<a class="editButton" id="catSloganEdit">Редактировать</a></dt>
		<dd>
			<span class="edit_slogan" id="<?php echo trim($category['Category']['id']); ?>_slogan" style="text-align:center;"><?php echo ($category['Category']['slogan']!=null)?$category['Category']['slogan']:'Слоган отсутствует'; ?></span>
		</dd>
		
		<dt style="margin-bottom:.5em;">[Описание:]&nbsp;<a class="editButton" id="catBodyEdit">Редактировать</a></dt>
			<div id="mmm"></div>
			<div id="ttt" style="width:740px;"></div>
		<dd style="width:697px;">
			<span class="edit_body" id="<?php echo trim($category['Category']['id']); ?>_body"><?php echo ($category['Category']['body']!=null)?$category['Category']['body']:'Описане отсутствует'; ?></span>		
		</dd>
	
		<dt>[Дата создания:]</dt>
		<dd>
			<?php //echo $time->relativeTime($category['Category']['created'],array('format' =>'d:n:Y','end'=>'+ 1 week'), false); ?>
			<?php echo date('j.n.Y',strtotime($category['Category']['created'])); ?>
		</dd>
	</dl>
	
</div>

<div class="span-23 last push-1 deleteButton catDelBut">

	<?php echo $html->link('Удалить категорию', array('action'=>'delete', $category['Category']['id']), null, sprintf(__('Вы подтверждаете удаление категории %s?', true), $category['Category']['name'])); ?>

</div>
