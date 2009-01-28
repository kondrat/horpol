<div class="users view">
<h2>Администратор</h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<hr />

		<dt<?php if ($i % 2 == 0) echo $class;?>>Имя пользователя</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['username']; ?>
			&nbsp;
		</dd>
		<hr />
		<dt<?php if ($i % 2 == 0) echo $class;?>>Статус</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['role']; ?>
			&nbsp;
		</dd>
		<hr />
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['email']; ?>
			&nbsp;
		</dd>
		<hr />



	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Редактировать', array('action'=>'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $html->link('Изменить пароль', array('action'=>'newpassword'), null, null, null ); ?> </li>
	</ul>
</div>