<?php 
	//debug($items);
	//$items = array(); 
	 $items = $this->requestAction('categories/index'); 

?>
			<div class="leftmenu">
				<ul>		
                      <? $here = Router::url(substr($this->here, strlen($this->webroot)-1)) ?>
                      <? foreach ($items as $link): ?>
                          <? if (Router::url( array('controller' => 'categories', 'action' => 'brand', $link['Category']['id']) ) == $here): ?>
						<li class= "menuImg"> <?php echo $html->link( $link['Category']['name'], array('controller' => 'categories', 'action' => 'brand', $link['Category']['id']), array('class' => 'menu' ),false, false )  ?></li>
						<?php //echo '<li>'.$html->link( $name, $link, array('class' => 'menuup' ) ).'</li>' ?>			                             
                          <? else: ?>
						<li class= "menuImg"> <?php echo $html->link( $link['Category']['name'], array('controller' => 'categories', 'action' => 'brand', $link['Category']['id']), array('class' => 'menu' ),false, false )  ?></li>
                          <? endif ?>
                      <? endforeach ?>
				</ul>
			</div>
