<?php echo $javascript->link(array('bannerIndex'),false);?>
<?php $html->addCrumb('Главная', array('controller'=>'pages','action'=>'index')); ?>
<?php $html->addCrumb('Баннеры', array()); ?>

<div class="actions span-24">
		<h3><?php echo $html->link('Добавить новый Баннер', array('action'=>'add')); ?></h3>
</div>

<div class="span-24 banners index">


				<table cellpadding="0" cellspacing="0">
				<tr>
					<th>id</th>
					<th>logo</th>
					<th class="actions"><?php __('Actions');?></th>
				</tr>
				<?php
				$i = 0;
				foreach ($banners as $banner):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
					<tr<?php echo $class;?>>
						<td>
							<?php echo $banner['Banner']['id']; ?>
						</td>
						<td>
							<?php echo $html->image('banner/'.$banner['Banner']['logo']); ?>
						</td>
						<td class="actions">
							<?php echo $html->link(__('View', true), array('action' => 'view', $banner['Banner']['id'])); ?>
							<?php echo $html->link(__('Edit', true), array('action' => 'edit', $banner['Banner']['id'])); ?>
							<?php echo $html->link(__('Delete', true), array('action' => 'delete', $banner['Banner']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $banner['Banner']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</table>
				
				
				
</div>