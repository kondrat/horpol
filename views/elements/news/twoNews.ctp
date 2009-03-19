<?php 
	//App::import('Core', 'Flay');
	App::import('Vendor', 'fly2');
	$fly2 = new fly2();
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
										<?php echo $html->link( $fly2->fragment($singlNews['News']['body'], 70) , array('controller' => 'News', 'action' => 'view', $singlNews['News']['id']) ); ?>
										 
									</span>
								<?php 
									$i++;
									endforeach 
								?>
																
							</div>

							<div style="clear:both;"></div>

