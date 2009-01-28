<?php 
	App::import('Core', 'Flay');
	$twoNews = $this->requestAction('news/index');	
?>						
							
							<div class="news">
								<p>
									<?php 
										//echo $html->link('НОВОСТИ', array('controller'=>'news', 'action'=> 'index') );  
										echo 'НОВОСТИ';
									?>
								</p>
								
								
								<?php 
									$i = 1;
									foreach($twoNews as $singlNews ): 
								?>
									<?php echo '<span class="news'.$i.'">';?>
									<p>
									
										<?php echo $html->link( date( 'd.m.y', strtotime($singlNews['News']['created']) ).' '.$singlNews['News']['name'] , array('controller' => 'News', 'action' => 'view', $singlNews['News']['id']) ) ;?>
									</p>
										<?php echo $html->link( Flay::fragment($singlNews['News']['body'], 130) , array('controller' => 'News', 'action' => 'view', $singlNews['News']['id']) ); ?>
										 
									</span>
								<?php 
									$i++;
									endforeach 
								?>
								
								
							</div>
<<<<<<< HEAD:views/elements/news/twoNews.ctp
							<div style="clear:both;"></div>
=======
							<div style="clear:both"></div>
>>>>>>> ec844de8c47dabe98e93be055f311ebd25476b91:views/elements/news/twoNews.ctp
