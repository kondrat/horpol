	<?php
		echo $form->create(null,array('url'=>array('controller'=>'news','action' => 'newsEditData','admin'=>true) ) );
			echo $form->input('News.id');
			echo $form->input('created', array('dateFormat' => 'DMY','timeFormat' => 'NONE', 'minYear' => 2007, 'maxYear' => 2020, 'label' => false ) );
	?>
	<div class="span-24" style="margin:1em 0;">
	<?php
		echo $form->submit('Сохранить',array('class'=>'span-3','div'=>array('class'=>'span-3') ) );
		echo $form->button('Отмена',array('class'=>'span-3 newsDataCancel','id'=>'newsDataCancel') );
	?>
	</div>
	<?php
		echo $form->end();
	?>
