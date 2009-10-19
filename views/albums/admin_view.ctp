<?php echo $javascript->link(array('jquery/jquery.fancybox-1.2.1.pack','jquery/jquery.jeditable.mini','jquery/jquery.qtip.min','albumIndex'),false);?>
<?php echo $html->css('jquery.fancybox'); ?>
<?php $html->addCrumb('Главная', array('controller'=>'pages','action'=>'index')); ?>
<?php $html->addCrumb('Альбомы', array('controller'=>'albums','action'=>'index')); ?>
<?php $html->addCrumb($album['Album']['name'], array()); ?>

<div class="">

<div class="actions span-24 subCategoryAddWrapper">
	<h3 style="z-index:0;"><?php echo $html->link('Добавить Фотографию', array('controller' => 'images', 'action'=>'add','album:'.$album['Album']['id']),array('class'=>'subCatAdd')); ?></h3>

		<div class="span-8 photoAdd hide">
		<?php echo $form->create('Image',array('action'=>'add', 'type' => 'file'));?>
			<?php echo $form->input('album_id', array( 'type' => 'hidden','value'=> $album['Album']['id'] ) );?>
			<?php echo $form->label('Image.userfile','[Логотип:]');?>
			<?php echo $form->input('Image.userfile', array('type'=>'file', 'label'=>false ) ); ?>
			<div id="ProductFileError" ></div>
			<?php echo $form->label('name','[Название:]');?><br />
			<?php echo $form->input('name',array('style'=>'width:250px;','label'=>false));?>
			<div id="ProductNameError" ></div>
			<div id="SubCategoryNameError" style="padding:5px;"></div>
			<div class="span-3">
				<?php echo $form->submit('Сохранить',array('class'=>'span-3 newSubCat'));?>
			</div>
			<?php echo $form->button('Закрыть',array('class'=>'span-3 subCategoryAddCancel'));?>
		<?php echo $form->end();?>
			<div class="test">
				<div class="fancy_bg fancy_bg_e"></div>
				<div class="fancy_bg fancy_bg_se"></div>
				<div class="fancy_bg fancy_bg_s"></div>
				<div class="fancy_bg fancy_bg_sw"></div>
				<div class="fancy_bg fancy_bg_w"></div>
			</div>
		</div>
	</div>
	
	<div class="span-24 imageAddWrapper">	
		<div id="imageEditWrapper" class="span-8 hide" >
		<?php echo $form->create('Image',array('action'=>'add', 'type' => 'file','id'=>'imageEditForm'));?>
		<?php echo $form->input('id', array('id'=>'imageIdEdit', 'type' => 'hidden','value'=> '' ) );?>
			<?php echo $form->input('album_id', array( 'type' => 'hidden','value'=> $album['Album']['id'] ) );?>
			<?php echo $form->label('Image.userfile','[Логотип:]');?>
			<?php echo $form->input('Image.userfile', array('type'=>'file', 'label'=>false ) ); ?>
			<?php echo $form->label('name','[Название:]');?><br />
			<?php echo $form->input('name',array('id'=>'imageNameEdit','style'=>'width:250px;','label'=>false,'value'=> ''));?>
			<div id="ProductNameError" ></div>
			<div id="SubCategoryNameError" style="padding:5px;"></div>
			<div class="span-3">
				<?php echo $form->submit('Сохранить',array('class'=>'span-3 subb'));?>
			</div>
			<?php echo $form->button('Закрыть',array('class'=>'span-3 imageEditCancel'));?>
		<?php echo $form->end();?>
			<div class="test">
				<div class="fancy_bg fancy_bg_e"></div>
				<div class="fancy_bg fancy_bg_se"></div>
				<div class="fancy_bg fancy_bg_s"></div>
				<div class="fancy_bg fancy_bg_sw"></div>
				<div class="fancy_bg fancy_bg_w"></div>
			</div>
		</div>
	</div>
	
</div>






<div class="span-22 push-1">

	<dl class="viewCat">
				<dt>[Название:]&nbsp;<a class="editButton" id="albumNameEdit">Редактировать</a></dt>
				<dd>
					<div class="span-24"><h3 class="edit_name" id="<?php echo $album['Album']['id']; ?>_name"><?php echo $album['Album']['name']; ?></h3></div>
				</dd>
				<dt>[Фотографии:]</dt>
				<dd>
					
				<?php echo $form->create(null, array('url' => array('controller' => 'images', 'action' => 'delall') ) ); ?>			
				<div class="span-24" style="margin-bottom:1em;">
					<div class="span-4">		
						<input type="button" class="span-4" id="selectall" value="Выбрать все" name="sel" />
					</div>
					<div class="span-10">
							<?php echo $form->submit('Удалить выбранное', array('class'=>'span-5','onclick' => 'return confirm("Удалить выбранные Фото?")') );?>		
					</div>
				</div>						
					
					
				<div class="span-24 imageItemWrapper" style="margin-bottom:1em;">		

				
							
					<?php foreach($album['Image'] as $image): ?>	
									
						<div class="photoItem">
							<div class="span-3"><?php echo $html->link( $html->image( 'gallery/s/'.$image['image'], array('alt' => $image['name'])), '/img/gallery/b/'.$image['image'],array('class'=>'bigImage'), null, false ); ?></div>
							<div class="span-1 last" style="margin: 0  0 5px 2px;"><?php echo $form->checkbox('Image.id.'.$image['id'], array('class' => 'selectable', 'value' =>$image['id']) ); ?></div>							
							<div class="span-1 last imageEdit" id="<?php echo $image['id'];?>"></div>
							<div class="span-4 last photoNameVal">
								<?php if($image['name'] != null):?>
									<?php echo $image['name'];?>
								<?php endif ?>
							</div>
						</div>
						
					<?php endforeach ?>	
				</div>
				</dd>
				<dt>[Дата создания:]</dt>
				<dd>
					<?php echo date('j.n.Y',strtotime($album['Album']['created'])); ?>
				</dd>
	</dl>
		<?php echo $form->end();?>
</div>
<div class="span-23 last push-1 deleteButton catDelBut">	
	<?php echo $html->link('Удалить Альбом', array('action'=>'delete', $album['Album']['id']), null, sprintf(__('Вы подтверждаете удаление Альбома %s?', true), $album['Album']['name'])); ?>	
</div>	
	



