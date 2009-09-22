<? echo $javascript->link(array('jquery.jeditable.mini','catEdit'),false);?>
<div class="span-22 push-1">

	<dl class="viewCat">
		<dt>[Название:]</dt>
		<dd>
			<div id="catNameEdit">edit</div>
			<div class="span-15"><h3 style="color:#911B3B;margin-bottom:0.5em;" class="edit_area" id="<?php echo $category['Category']['id']; ?>"><?php echo $category['Category']['name']; ?></h3></div>
		</dd>
		<dt>[Тип категории:]</dt>
		<dd>
			<?php echo $category['Category']['type']; ?>
		</dd>
		<dt>[Описание:]</dt>
		<dd style="width:697px; height:3em;overflow:hidden;">
			<?php echo trim($category['Category']['body']); ?>
		</dd>
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
