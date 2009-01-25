<?php $this->pageTitle = 'Admin page'; ?>
<div class="mainAdminPage">

	<div class="mainAdminPage">
		<p> Управление товарами </p>
		<?php echo $html->link('Добавить товар в каталог', array('controller' => 'products', 'action' => 'add') ) ?>
		<br />
		<?php echo $html->link('Управление товарами', array('controller' => 'sub_categories', 'action' => 'index') ) ?>
		<br />
		<br />
		<hr />
		<br />
		<?php echo $html->link('Управление Категориями', array('controller'=> 'categories', 'action'=>'index')); ?>
		<br />
		<?php echo $html->link('Управление Брендами', array('controller'=> 'brands', 'action'=>'index'));	?>

	
	</div>
	
		<br />
	
	<div class="mainAdminPage">
		<p> Управление ФотоАльбомом </p>
		<?php echo $html->link('Посмотреть альбомы', array('controller' => 'albums', 'action' => 'index') ) ?>
		<br />
		<?php echo $html->link('Добавить фото', array('controller' => 'images', 'action' => 'add') ) ?>
	
	</div>	
	
		<br />
	
	<div class="mainAdminPage">
		<p> Управление Новостями </p>
		<?php echo $html->link('Добавить новость', array('controller' => 'news', 'action' => 'add') ) ?>
		<p><?php echo $html->link('Все новости', array('controller' => 'news', 'action'=>'index')); ?></p>	
	</div>
	
		<br />	
	<div class="mainAdminPage">
		<p>Данные администратора</p>
		<?php echo $html->link('Изменить пароль', array('controller' => 'users', 'action' => 'newpassword') ) ?>
		<br />
		<?php echo $html->link('Посмотреть данные', array('controller' => 'users', 'action' => 'view') ) ?>	
	</div>
		
		<br />		
	<div class="mainAdminPage">
		<p> Управление кешированием</p>
		<?php echo $html->link('Отчистить Cache', array('controller' => 'users', 'action' => 'clearcache') ) ?>	
	</div>
	
		<br />			
		
</div>


