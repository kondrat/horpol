<? echo $javascript->link(array('jquery.jeditable.mini','catEdit'),false);?>

<div class="span-22 push-1">

	<dl class="viewCat">
		<dt>[Название:]&nbsp;<span class="catEditButton" id="catNameEdit">Редактировать<div></div></span></dt>
		<dd>
			<div class="span-24"><h3 style="color:#911B3B;margin-bottom:0.5em;" class="edit_name" id="<?php echo $category['Category']['id']; ?>_name"><?php echo $category['Category']['name']; ?></h3></div>
		</dd>
		<hr />
		<dt>[Тип категории:]&nbsp;<span class="catEditButton" id="catTypeEdit">Редактировать<div></div></span></dt>
		<dd>
			<span class="edit_type" id="<?php echo trim($category['Category']['id']); ?>_type"><?php echo $this->element('category/category_type',array('catType'=> $category['Category']['type']) ); ?></span>
		</dd>
		<hr />
		<dt>[Слоган:]&nbsp;<span class="catEditButton" id="catSloganEdit">Редактировать<div></div></span></dt>
		<dd>
			<span class="edit_slogan" id="<?php echo trim($category['Category']['id']); ?>_slogan" style="text-align:center;"><?php echo  $category['Category']['slogan']; ?></span>
		</dd>
		<hr />
		<dt style="margin-bottom:.5em;">[Описание:]&nbsp;<span class="catEditButton" id="catBodyEdit">Редактировать<div></div></span></dt>
			<div id="mmm"></div>
			<div id="ttt" style="width:740px;"></div>
		<dd style="width:697px;">
			<span class="edit_body" id="<?php echo trim($category['Category']['id']); ?>_body"><?php echo trim($category['Category']['body']); ?></span>		
		</dd>
		<hr />
		<dt>[Дата создания:]</dt>
		<dd>
			<?php //echo $time->relativeTime($category['Category']['created'],array('format' =>'d:n:Y','end'=>'+ 1 week'), false); ?>
			<?php echo date('j.n.Y',strtotime($category['Category']['created'])); ?>
		</dd>
	</dl>
	
</div>

<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Category', true), array('action'=>'edit', $category['Category']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Category', true), array('action'=>'delete', $category['Category']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $category['Category']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Categories', true), array('action'=>'index')); ?> </li>
	</ul>
</div>
