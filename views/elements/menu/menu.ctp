<?php $items = array(
	'Главная' => array('controller' => 'pages', 'action' => 'index'),
	'Товары' => array('controller' => null, 'action' => null),
	'Фотоальбомы' => array('controller' => 'albums', 'action' => 'index'),
	'Новости' => array('controller' => 'news', 'action' => 'index'),
	'Баннеры' => array('controller' => 'banners', 'action' => 'index'),
	); 
	

?>

	<tr align="center">		
                      <? $here = Router::url(substr($this->here, strlen($this->webroot)-1)) ?>
                      <? foreach ($items as $name => $link): ?>
                          <? if (Router::url($link) == $here): ?>
															<td width="74"> <?php echo $html->link( $name, $link, array('class' => 'menuActive' ) );  ?>&nbsp;</td>		                             
                          <? else: ?>
														<td width="74"> <?php echo $html->link( $name, $link, array('class' => 'menu' ) );  ?>&nbsp;</td>                          
                          <? endif ?>                   
                      <? endforeach ?>
	</tr>