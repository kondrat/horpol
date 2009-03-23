<div class="">
<?php //debug($this->data);?>

<?php echo $form->create('Brand', array( 'type' => 'file') );?>
	<fieldset>
 		<legend>Редактировать Бренд</legend>
 		<?php echo $html->image('catalog/'.$this->data['Brand']['logo']); ?>
	<?php
		echo $form->input('id');
		echo $form->input('name', array('label' => 'Название Бренда') );
		//echo $form->input('body', array('label' => 'Описание') );
		echo $form->label('body','Описание');
		echo $fck->load('Brand.body');
		echo $form->input('logo', array('type' => 'hidden') );
	?>
		<b>Загрузка Нового Логотипа:</b> 
		<?php echo $form->input('Brand.userfile', array('label' => false, 'type'=>'file')); ?>
	</fieldset>
<?php echo $form->end('Сохранить');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Список Брэндов', array('action'=>'index'));?></li>
	</ul>
</div>
