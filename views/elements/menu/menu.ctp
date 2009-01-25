<?php $items = array(
	'Главная' => array('controller' => 'pages', 'action' => 'index'),
	'Выход' => array('controller' => 'users', 'action' => 'logout'),
	//'Услуги' => '/pages/service/',
	//'Фотогаллерея' => array('controller' => 'albums', 'action' => 'index'),
	//'Контакты' => '/pages/contacs/'
	); 
	

?>

	<tr align="center">
		
                      <? $here = Router::url(substr($this->here, strlen($this->webroot)-1)) ?>
                      <? foreach ($items as $name => $link): ?>
                          <? if (Router::url($link) == $here): ?>

		<td width="74" class= "menuImgUp"> <?php echo $html->link( $name, $link, array('class' => 'menuup' ) )  ?></td>		

                              
                          <? else: ?>
		<td width="74" class= "menuImg"> <?php echo $html->link( $name, $link, array('class' => 'menu' ) )  ?></td>		
		
                              
                          <? endif ?>
                 		  	<? if ( $name != 'Контакты'): ?>
								<td width="4"></td>
							<? endif ?>
                          
                      <? endforeach ?>
		<td width="60"></td>	
	</tr>