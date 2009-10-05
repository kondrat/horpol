	<?php
		echo $form->create(null,array('url'=>array('controller'=>'static_pages','action' => 'edit','admin'=>true) ) );
		//echo $form->value('id');
		echo $form->hidden('StaticPage.id');
		echo $fck->load('StaticPage.body');
	?>
	<div class="span-24" style="margin:1em 0;">
	<?php
		echo $form->submit('Сохранить',array('class'=>'span-3','div'=>array('class'=>'span-3') ) );
		echo $form->button('Отмена',array('class'=>'span-3 catBodyCancel','id'=>'pageBodyCancel') );
	?>
	</div>
	<?php
		echo $form->end();
	?>
