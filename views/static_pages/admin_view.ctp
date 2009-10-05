<? echo $javascript->link(array('jquery.jeditable.mini','pagesEdit'),false);?>
<?php $html->addCrumb('Главная', array('controller'=>'pages','action'=>'index')); ?>
<?php $html->addCrumb('Статические страницы', array('controller'=>'static_pages','action'=>'index')); ?>
<?php $html->addCrumb('Редактировать страницу', array()); ?>
<div class="span-22 push-1">

	<dl class="viewCat">
		<dt>[Заголовок:]</dt>
		<dd>
			<div class="span-24"><h3 style="color:#911B3B;"><?php echo $staticPage['StaticPage']['name']; ?></h3></div>
		</dd>
		
		<dt style="margin-bottom:.5em;">[Содержание:]&nbsp;<a class="editButton" id="pagesBodyEdit">Редактировать</a></dt>
			<div id="mmm"></div>
			<div id="ttt" style="width:740px;"></div>
		<dd style="width:697px;">
			<span class="edit_body" id="<?php echo trim($staticPage['StaticPage']['id']); ?>_body"><?php echo ($staticPage['StaticPage']['body']!=null)? $staticPage['StaticPage']['body']:'Описане отсутствует'; ?></span>		
		</dd>
		
		
		
		<dt>[Дата изменения:]</dt>
		<dd>
			<div class="span-24"><h4><?php echo date( 'd.m.Y', strtotime($staticPage['StaticPage']['modified']) ); ?></h4></div>
		</dd>
		
		<dt>[Дата создания:]</dt>
		<dd>
			<div class="span-24"><h4><?php echo date( 'd.m.Y', strtotime($staticPage['StaticPage']['created']) ); ?></h4></div>
		</dd>
		
	</dl>
</div>