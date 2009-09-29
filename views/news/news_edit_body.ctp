	<?php
		echo $form->create(null,array('url'=>array('controller'=>'news','action' => 'edit','admin'=>true) ) );
		echo $form->hidden('News.id');
		echo $fck->load('News.body');
	?>
	<div class="span-24" style="margin:1em 0;">
	<?php
		echo $form->submit('Сохранить',array('class'=>'span-3','div'=>array('class'=>'span-3') ) );
		echo $form->button('Отмена',array('class'=>'span-3 catBodyCancel','id'=>'catBodyCancel') );
	?>
	</div>
	<?php
		echo $form->end();
	?>
