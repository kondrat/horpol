<div class="">

<?php echo $form->create('Category');?>
	<fieldset>
 		<legend>Редактировать категорию</legend>
	<?php
		echo $form->input('name', array('label' => 'Имя Категории') );
		echo $form->input('Category.type', array('options' => array( 1 => 'Первый тип', 2 => 'Второй тип',3 => 'Третий тип') , 'label'=>'Тип категории','empty' => '(Выберите тип)') );
		echo $form->input('title', array('label' => 'Заголовок ("Title" - отображается вверху страницы).') );
		echo $form->input('slogan',array('label'=>'Слоган','rows'=>2));
		echo $form->label('body','Описание');
		echo $fck->load('Category.body');
	?>
	</fieldset>
<?php echo $form->end('Сохранить');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Удалить категорию', array('action'=>'delete', $form->value('Category.id')), null, sprintf('Подтверждаете удаление %s?', $form->value('Category.name'))); ?></li>
		<li><?php echo $html->link('Список категорий', array('action'=>'index'));?></li>
	</ul>
</div>
