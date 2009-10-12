<?php $this->pageTitle = 'Главная страница'; ?>

<div class="span-21 push-1 error">
	<h3>Панель в стадии разработки</h3>
	<p>Недоступно:</p>
	<ul>
		<li>one</li>
		<li>two</li>
	</ul>
</div>


<div class="span-6">
	<div class="mainAdminPage">	
		<p>Управление Баннерами</p>

			<p><?php echo $html->link('Главная страница и категории',array('controller'=>'banners','action'=>'index'));?></p>
			<p><?php echo $html->link('Категории и бренды',array('controller'=>'banners','action'=>'index'));?></p>

	</div>
	
</div>


<div class="span-6">
	<div class="mainAdminPage">
		<p>Управление Статическими страницами</p>

			<p><?php echo $html->link('Статические страницы',array('controller'=>'StaticPages','action'=>'index'));?></p>

	</div>
</div>


<div class="span-6">

	<div class="mainAdminPage">
		<p> Управление товарами </p>
		<?php echo $html->link('Добавить товар в каталог', array('controller' => 'products', 'action' => 'add') ) ?>
		<br />
		<?php echo $html->link('Управление товарами', array('controller' => 'sub_categories', 'action' => 'index') ) ?>
		<br />



		<?php echo $html->link('Управление Категориями', array('controller'=> 'categories', 'action'=>'index')); ?>
		<br />
		<?php echo $html->link('Управление Брендами', array('controller'=> 'brands', 'action'=>'index'));	?>
	
	</div>
</div>	

<div class="span-6 last">
	
	<div class="mainAdminPage">
		<p> Управление ФотоАльбомом </p>
		<?php echo $html->link('Посмотреть альбомы', array('controller' => 'albums', 'action' => 'index') ) ?>
		<br />
		<?php echo $html->link('Добавить фото', array('controller' => 'images', 'action' => 'add') ) ?>
	
	</div>	
</div>	
<hr />
<div class="span-6  clear">	
	<div class="mainAdminPage">
		<p> Управление Новостями </p>
		<?php echo $html->link('Добавить новость', array('controller' => 'news', 'action' => 'add') ) ?>
		<p><?php echo $html->link('Все новости', array('controller' => 'news', 'action'=>'index')); ?></p>	
	</div>
</div>	

<div class="span-6">	
	<div class="mainAdminPage">
		<p>Данные администратора</p>
		<?php echo $html->link('Изменить пароль', array('controller' => 'users', 'action' => 'newpassword') ) ?>
		<br />
		<?php echo $html->link('Посмотреть данные', array('controller' => 'users', 'action' => 'view') ) ?>	
	</div>
</div>		

<div class="span-6">		
	<div class="mainAdminPage">
		<p> Управление кешированием</p>
		<?php echo $html->link('Отчистить Cache', array('controller' => 'users', 'action' => 'clearcache') ) ?>	
	</div>		
		
</div>
	<hr />
	<div class="span-22 push-1">
		<?php echo $html->link('New DB table brand_category',array('controller'=>'categories','action'=>'catbrand','go:1'));?>
	</div>

