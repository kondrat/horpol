<?php 
			$items = array(
				'Главная' => array('controller' => 'pages', 'action' => 'index'),
				'Товары' => array('controller' => 'sub_categories', 'action' => 'index'),
				'Категории' => array('controller' => 'categories', 'action' => 'index'),
				'Бренды' => array('controller' => 'brands', 'action' => 'index'),
				'Фотоальбомы' => array('controller' => 'albums', 'action' => 'index'),
				'Новости' => array('controller' => 'news', 'action' => 'index'),
				'Баннеры' => array('controller' => 'banners', 'action' => 'index'),
			); 
?>
                      <?php $here = Router::url(substr($this->here, strlen($this->webroot)-1)); ?>
                      <?php foreach ($items as $name => $link): ?>
                          <?php if (Router::url($link) == $here): ?>
															<?php echo $html->link( $name, $link, array('class' => 'menuActive' ) ); ?>	                             
                          <?php else: ?>
														<?php echo $html->link( $name, $link, array('class' => 'menu' ) );  ?>                          
                          <?php endif ?> 
                                           
                      <?php endforeach ?>
