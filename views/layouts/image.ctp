<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $html->meta('icon');

		echo $html->css('style');
	
		echo $html->css('jquery.fancybox');
	?>
		<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>-->

	<?php
		echo $javascript->link( array('jquery-1.3.2.min','jquery.easing.1.3', 'jquery.pngFix.pack') , true);
	?>
		<script type="text/javascript"> 
		    $(document).ready(function(){ 
		        $(document).pngFix(); 
		    }); 
		</script> 
	<?php
		echo $scripts_for_layout;
	?>


</head>
<body>
	
	<cake:nocache>
		<?php //debug($this->params);?>
	<?php 
		if ($session->check('Auth.User.role') == 'admin') {
			echo $this->element('admin/adminPanel', array('cache' => true) );
		}
	?>
	</cake:nocache>

	<div class="fieldup"></div>	
	<div align="center">
		
			<div class="header-photo">
				
					<?php echo $html->image('header.gif', array("class" => "img2") );?><?php echo $html->image('high.jpg', array("class" => "pict") );?>
					<span class="upmenu"><?php echo $html->link('<span>ГЛАВНАЯ</span>','/',null,null,false);?></span>
					<span class="upmenu"><?php echo $html->link('<span>О КОМПАНИИ</span>',array('controller'=> 'pages', 'action'=>'company'),null,null,false);?></span>
					<span class="upmenu"><?php echo $html->link('<span>УСЛУГИ</span>',array('controller'=> 'pages', 'action'=>'service'),null,null,false);?></span>
					<span class="upmenu"><?php echo $html->link('<span>ФОТОГАЛЕРЕЯ</span>',array('controller'=> 'albums', 'action'=>'index'),null,null,false);?></span>
					<span class="upmenu"><?php echo $html->link('<span>КОНТАКТЫ</span>',array('controller'=> 'pages', 'action'=>'contacts'),null,null,false);?></span>					
					<br clear="all" />
			</div>
				
	
			
	
				
		<div id="frame2col">
		
			<div id="contentleft2col">
					
					<?php echo $this->element('menu/leftMainMenu', array('cache' => array('key' => 'leftMenu', 'time' => '+30 days') ) ); ?>
						
						
						<div class="other">
							<p>Другие направления:</p>	
						
							<?php echo $html->image('hotpol.jpg' );?><br />
								<span class="othermenu"><a href="index.html"><span>ТЕПЛЫЕ ПОЛЫ</span></a></span>	
							<?php echo $html->image('electro.jpg' );?>
								<span class="othermenu"><a href="index.html"><span>ЭЛЕКТРИКА VIMAR</span></a></span>			
						</div>		
			</div>
	
			<div id="contentcenter2col">
				
							<cake:nocache>						
							<p style="color:red; font-weight: bold;"><?php $session->flash(); ?></p>
							</cake:nocache>	
							
				
							<?php echo $content_for_layout; ?>
								
								
								
								

					
			</div><!--contentcenter2col-->
					
					<br clear="all" />
		</div><!--frame2col-->
		
			
		
	</div>






	<div class="footer" align="center">
		<div class="footerin">
			<span class="copyright">Copiright 2008 Maris Interior<br><a href="http://www.borovikova.ru">Дизайн и разработка сайта</a></span>
			<span class="footermenu">
				<?php echo $html->link('ГЛАВНАЯ', '/') ?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
				<?php echo $html->link('О КОМПАНИИ', array('controller' => 'pages', 'action' => 'company')) ?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
				<?php echo $html->link('УСЛУГИ', array('controller' => 'pages', 'action' => 'service')) ?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
				<?php echo $html->link('ФОТОГАЛЛЕРЕЯ', array('controller' => 'albums', 'action' => 'index')) ?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
				<?php echo $html->link('КОНТАКТЫ', array('controller' => 'pages', 'action' => 'contacts')) ?>
			</span>
		</div>
	</div>

<br><br>



</body>
</html>