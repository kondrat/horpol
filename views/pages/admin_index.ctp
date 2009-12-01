<?php $this->pageTitle = 'Главная страница'; ?>

<div class="span-21 push-1 error" style="display:none">
	<h3>Панель в стадии разработки</h3>
</div>


<div class="span-21 push-1">
	<div class="span-7">	
		<div class="mainAdminPage">
			<p>Данные администратора</p>
			<?php echo $html->link('Изменить пароль', array('controller' => 'users', 'action' => 'newpassword') ) ?>
			<br />
			<?php echo $html->link('Посмотреть данные', array('controller' => 'users', 'action' => 'view') ) ?>	
		</div>
	</div>		

	<div class="span-7">		
		<div class="mainAdminPage">
			<p> Управление кешированием</p>
			<?php echo $html->link('Отчистить Cache', array('controller' => 'users', 'action' => 'clearcache') ) ?>	
		</div>				
	</div>
</div>


