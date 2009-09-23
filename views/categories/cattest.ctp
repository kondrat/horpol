	<?php
		echo $form->create(null,array('url'=>array('controller'=>'categories','action' => 'edit','admin'=>true) ) );
		echo $form->hidden('Category.id');
		echo $fck->load('Category.body');
		echo $form->button('Отмена');
		echo $form->end('Сохранить');
	?>
