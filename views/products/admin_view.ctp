<?php echo $javascript->link(array('jquery/jquery.fancybox-1.2.1.pack','jquery/jquery.jeditable.mini','prodEdit'),false);?>
<?php echo $html->css('jquery.fancybox'); ?>
<?php $html->addCrumb('Главная', array('controller'=>'pages','action'=>'index')); ?>

	<?php $html->addCrumb('Товары', array('controller'=>'sub_categories','action'=>'index')); ?>

<?php $html->addCrumb($product['Product']['name'], array()); ?>
<div class="span-22 push-1">

	<dl class="viewCat">
		
		<dt>[Логотип:]&nbsp;<a class="editButton" id="brandLogoEdit">Редактировать</a></dt>
		<dd>
			<div class="span-24 brandLogo" style="margin-bottom:1em;">
				<div style="padding:8px;background-color:#eee;float:left;">				
						<?php
									$logoClass = $logoWarring = $imagePathS = $imagePathB  = null;
									if($product['Product']['logo1'] != null) {
										$imagePathS = '/img/catalog/s/'.$product['Product']['logo1'];
										$imagePathB = '/img/catalog/b/'.$product['Product']['logo1'];																		
									} elseif($product['Product']['logo'] != null) {
										$imagePathS = '/img/catalog/'.$product['Product']['logo'];
										$imagePathB = '/img/catalog/b/product_logo.jpg';
										$logoWarring = $html->image('icons/warning.png');
									} else {
										$imagePath = '/img/catalog/s/product_logo.jpg';
									}
						?>					
					<?php echo $html->link( $html->image($imagePathS,array('alt'=>$product['Product']['name'],'class'=>'prodShadow') ),$imagePathB,array('class'=>'bigProd'),false,false );?>				
				</div>
				<div class="span-10 push-1 brandFrom hide" style="margin-bottom:1em;">
				<?php echo $form->create('Product', array('action'=>'edit','id'=>'storyEditForm', 'type' => 'file'));?>
					<?php echo $form->input('Product.id',array('value'=>$product['Product']['id']));?>
					<div style="position:relative;height:0%;">
							<?php echo $form->input('photoType',array('options' => array('Фото','Текстура'),'label'=>false,'div'=>false) );?>
							<div class="infoTip16" style="left:95px;position:absolute;top:8px;"></div>
					</div>										
					<?php echo $form->input('Product.userfile1', array('type'=>'file', 'label'=>false ) ); ?>
					<div style="margin:.5em;">
						<?php echo $form->submit('OK',array('id'=>'tuda','class'=>'span-3','div'=>false,'style'=>'margin-right:1em;'));?>
						<?php echo $form->button('Отмена',array('class'=>'span-3 barndLogoCancel'));?>
					</div>
				<?php echo $form->end();?>
				<div class="brandFormError"></div>
				</div>
			</div>
				
		</dd>
		
		<dt>[Название:]&nbsp;<a class="editButton" id="brandNameEdit">Редактировать</a></dt>
		<dd>
			<div class="span-24"><h3 class="edit_name" id="<?php echo $product['Product']['id']; ?>_name"><?php echo $product['Product']['name']; ?></h3></div>
		</dd>
		
		<dt style="margin-bottom:.5em;">[Описание:]&nbsp;<a class="editButton" id="brandBodyEdit">Редактировать</a></dt>
			<div id="mmm"></div>
			<div id="ttt" style="width:740px;"></div>
		<dd style="width:697px;">
			<span class="edit_body" id="<?php echo trim($product['Product']['id']);?>_body"><?php echo ($product['Product']['content1']!=null)?$product['Product']['content1']:'Описане отсутствует'; ?></span>		
		</dd>
	
		<dt>[Дата создания:]</dt>
		<dd>
			<?php //echo $time->relativeTime($product['Product']['created'],array('format' =>'d:n:Y','end'=>'+ 1 week'), false); ?>
			<?php echo date('j.n.Y',strtotime($product['Product']['created'])); ?>
		</dd>
	</dl>
	
</div>

<div class="span-23 last push-1 deleteButton brandDelBut">

	<?php echo $html->link('Удалить Товар', array('action'=>'delete', $product['Product']['id']), null, sprintf(__('Вы подтверждаете удаление Товара %s?', true), $product['Product']['name'])); ?>

</div>




