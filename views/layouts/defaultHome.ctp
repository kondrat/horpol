<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	
<head>
	<?php echo $html->charset(); ?>
	<title>
		Хороший пол
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $html->meta('icon');

		echo $html->css('style');
	
		echo $html->css('fancy');
	?>
		<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>-->

	<?php
		echo $javascript->link( array('jquery-1.2.6','jquery.pngFix.pack') , true);
	?>
		<script type="text/javascript"> 
		    $(document).ready(function(){ 
		        $(document).pngFix(); 
		    }); 
		</script> 
	<?php
		echo $scripts_for_layout;
	?>
	<script language="javascript">AC_FL_RunContent = 0;</script>
	<?php
		echo $javascript->link( array('AC_RunActiveContent') , true);
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
				
					<?php echo $html->image('header.png', array("class" => "img") );?><script language="javascript">
						if (AC_FL_RunContent == 0) {
							alert("This page requires AC_RunActiveContent.js.");
						} else {
							AC_FL_RunContent(
								'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0',
								'width', '698',
								'height', '393',
								'src', <?php echo "'/horpol/".$flashName."'"; ?>,
								'quality', 'high',
								'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
								'align', 'middle',
								'play', 'true',
								'loop', 'true',
								'scale', 'showall',
								'wmode', 'window',
								'devicefont', 'false',
								'id', <?php echo "'".$flashName."'"; ?>,
								'class','pict',
								'bgcolor', '#000000',
								'name', <?php echo "'".$flashName."'"; ?>,
								'menu', 'true',
								'allowFullScreen', 'false',
								'allowScriptAccess','sameDomain',
								'movie', <?php echo "'/horpol/".$flashName."'"; ?>,
								'salign', ''
								); //end AC code
						}
					</script>
					<noscript>
						<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="698" height="393" id="<?php echo "'".$flashName."'"; ?>" align="middle">
						<param name="allowScriptAccess" value="sameDomain" />
						<param name="allowFullScreen" value="false" />
						<param name="movie" value="<?php echo "'".$flashName."'"; ?>.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#000000" />	<embed class="pict" src="<?php echo "'".$flashName."'"; ?>.swf" quality="high" bgcolor="#000000" width="698" height="393" name="<?php echo "'".$flashName."'"; ?>" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
						</object>
					</noscript>					
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