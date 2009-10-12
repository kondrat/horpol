<?php echo $javascript->link(array('jquery/jquery.jeditable.mini','jquery/jquery.qtip.min','albumIndex'),false);?>
<?php $html->addCrumb('Главная', array('controller'=>'pages','action'=>'index')); ?>
<?php $html->addCrumb('Альбомы', array('controller'=>'albums','action'=>'index')); ?>
<?php $html->addCrumb($album['Album']['name'], array()); ?>

<div class="">

<div class="actions span-24">
	<h3><?php echo $html->link('Добавить Фотографию', array('controller' => 'images', 'action'=>'add','album:'.$album['Album']['id'])); ?></h3>
</div>
<div class="span-22 push-1">

	<dl class="viewCat">
				<dt>[Название:]&nbsp;<a class="editButton" id="albumNameEdit">Редактировать</a></dt>
				<dd>
					<div class="span-24"><h3 class="edit_name" id="<?php echo $album['Album']['id']; ?>_name"><?php echo $album['Album']['name']; ?></h3></div>
				</dd>
			
			<div class="span-24">
				<?php $i = 1;?>
				<?php foreach($album['Image'] as $image): ?>
					<?php $class=($i%6 == 0 )?'last':null;?>
				
				
					<div class="span-4 <?php echo $class;?>">
						<?php echo $html->link( $html->image( 'gallery/s/'.$image['image'], array('alt' => $image['name'])), array('controller' => 'images', 'action' => 'view', $image['id']),null, null, false ); ?>
						<p>
							<?php echo $image['name'];?>
						</p>
					</div>
					<?php $i++;?>
				<?php endforeach ?>	
			</div>
	</dl>
</div>




