<div class="staticPages view">
<h2><?php  __('StaticPage');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $staticPage['StaticPage']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Body'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $staticPage['StaticPage']['body']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $staticPage['StaticPage']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $staticPage['StaticPage']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit StaticPage', true), array('action'=>'edit', $staticPage['StaticPage']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete StaticPage', true), array('action'=>'delete', $staticPage['StaticPage']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $staticPage['StaticPage']['id'])); ?> </li>
		<li><?php echo $html->link(__('List StaticPages', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New StaticPage', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
