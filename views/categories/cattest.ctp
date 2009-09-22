	<?php

		echo $form->create('Category');
		echo $form->label('body','Описание');
		echo $fck->load('Category.body');
		echo $form->end('Сохранить');
	?>
