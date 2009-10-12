<? echo $javascript->link(array('jquery/jquery.jeditable.mini','newsEdit'),false);?>
<?php $html->addCrumb('Главная', array('controller'=>'pages','action'=>'index')); ?>
<?php $html->addCrumb('Новости', array('action'=>'index')); ?>
<?php $html->addCrumb('Редактировать новость', array()); ?>
<div class="span-22 push-1">

	<dl class="viewCat">
		<dt>[Дата:]&nbsp;<a class="editButton" id="newsDataEdit">Редактировать</a></dt>
			<div id="dataInput"></div>
		<dd>
			<div class="span-24"><h4 class="edit_data" id="<?php echo $news['News']['id']; ?>_data"><?php echo date( 'd.m.Y', strtotime($news['News']['created']) ); ?></h4></div>
		</dd>
		<dt>[Заголовок:]&nbsp;<a class="editButton" id="newsNameEdit">Редактировать</a></dt>
		<dd>
			<div class="span-24"><h3 style="color:#911B3B;" class="edit_name" id="<?php echo $news['News']['id']; ?>_name"><?php echo $news['News']['name']; ?></h3></div>
		</dd>
		<dt style="margin-bottom:.5em;">[Новость:]&nbsp;<a class="editButton" id="newsBodyEdit">Редактировать</a></dt>
			<div id="mmm"></div>
			<div id="ttt" style="width:740px;"></div>
		<dd style="width:697px;">
			<span class="edit_body" id="<?php echo trim($news['News']['id']); ?>_body"><?php echo ($news['News']['body']!=null)?$news['News']['body']:'Описане отсутствует'; ?></span>		
		</dd>
	</dl>
	
	<div class="span-23 last deleteButton catDelBut">
				<?php echo $html->link('Удалить новость', array('action'=>'delete', $news['News']['id']), null, sprintf('Удалить новость от %s?', date( 'd.m.y', strtotime($news['News']['created'])) ) ); ?>
	</div>	
	





</div>



