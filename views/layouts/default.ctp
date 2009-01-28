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
		echo $javascript->link( array('jquery-1.2.6', 'cookie', 'jquery.pngFix.pack') , true);
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
<<<<<<< HEAD:views/layouts/default.ctp
	<cake:nocache>	
<!--LiveInternet counter--><script type="text/javascript"><!--
new Image().src = "http://counter.yadro.ru/hit?r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random();//--></script><!--/LiveInternet-->
	
	
=======
	
	<cake:nocache>
>>>>>>> ec844de8c47dabe98e93be055f311ebd25476b91:views/layouts/default.ctp
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
<<<<<<< HEAD:views/layouts/default.ctp
					<?php echo $html->image('header.gif', array("class" => "img") );?><script language="javascript">
=======
					<?php echo $html->image('header.png', array("class" => "img") );?><script language="javascript">
>>>>>>> ec844de8c47dabe98e93be055f311ebd25476b91:views/layouts/default.ctp
						var flashName = 'flaming_cursor2';																		
									if(jQuery.cookie("firstVisit") == 1 ){
										var flashName = 'flaming_cursor2';
									} else {
										var flashName = 'flaming_cursor';
									}

						if (AC_FL_RunContent == 0) {
							alert("This page requires AC_RunActiveContent.js.");
						} else {
							AC_FL_RunContent(
								'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0',
								'width', '698',
								'height', '393',
<<<<<<< HEAD:views/layouts/default.ctp
								'src', '/'+ flashName,
=======
								'src',  '/horpol/' + flashName,
>>>>>>> ec844de8c47dabe98e93be055f311ebd25476b91:views/layouts/default.ctp
								'quality', 'high',
								'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
								'align', 'middle',
								'play', 'true',
								'loop', 'true',
								'scale', 'showall',
								'wmode', 'window',
								'devicefont', 'false',
								'id', flashName,
								'class','pict1',
<<<<<<< HEAD:views/layouts/default.ctp
								//'bgcolor', '#ffffff',
								'background', '/img/low.jpg',
=======
								'background', '/horpol/img/low.jpg',
								//'bgcolor', '#000000',
>>>>>>> ec844de8c47dabe98e93be055f311ebd25476b91:views/layouts/default.ctp
								'name', flashName,
								'menu', 'true',
								'allowFullScreen', 'false',
								'allowScriptAccess','sameDomain',
<<<<<<< HEAD:views/layouts/default.ctp
								'movie', '/'+ flashName,
=======
								'movie', '/horpol/' + flashName,
>>>>>>> ec844de8c47dabe98e93be055f311ebd25476b91:views/layouts/default.ctp
								'salign', ''
								); //end AC code
								//alert(flashName);
						}
						
					</script><noscript>
						<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="698" height="393" id="flaming_cursor2" align="middle">
						<param name="allowScriptAccess" value="sameDomain" />
						<param name="allowFullScreen" value="false" />
<<<<<<< HEAD:views/layouts/default.ctp
						<param name="movie" value="flaming_cursor2.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#000000" /><embed class="pict" src="flaming_cursor2.swf" quality="high" bgcolor="#000000" width="698" height="393" name="flaming_cursor2" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
					</object></noscript>			
										
=======
						<param name="movie" value="../horpol/flaming_cursor2.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#000000" /><embed class="pict" src="../horpol/flaming_cursor2.swf" quality="high" bgcolor="#000000" width="698" height="393" name="flaming_cursor2" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
						</object>
					</noscript>					
>>>>>>> ec844de8c47dabe98e93be055f311ebd25476b91:views/layouts/default.ctp
					<span class="upmenu"><?php echo $html->link('<span>ГЛАВНАЯ</span>','/',null,null,false);?></span>
					<span class="upmenu"><?php echo $html->link('<span>О КОМПАНИИ</span>',array('controller'=> 'pages', 'action'=>'company'),null,null,false);?></span>
					<span class="upmenu"><?php echo $html->link('<span>УСЛУГИ</span>',array('controller'=> 'pages', 'action'=>'service'),null,null,false);?></span>
					<span class="upmenu"><?php echo $html->link('<span>ФОТОГАЛЕРЕЯ</span>',array('controller'=> 'albums', 'action'=>'index'),null,null,false);?></span>
					<span class="upmenu"><?php echo $html->link('<span>КОНТАКТЫ</span>',array('controller'=> 'pages', 'action'=>'contacts'),null,null,false);?></span>					
					<br clear="all" />
<<<<<<< HEAD:views/layouts/default.ctp
			</div>		
=======
			</div>
>>>>>>> ec844de8c47dabe98e93be055f311ebd25476b91:views/layouts/default.ctp
				
	
			
	
				
		<div id="frame2col">
		
			<div id="contentleft2col">
					
					<?php echo $this->element('menu/leftMainMenu', array('cache' => array('key' => 'leftMenu', 'time' => '+30 days') ) ); ?>
						
						
						<div class="other">
							<p>Другие направления:</p>	
						
							<?php echo $html->image('hotpol.jpg' );?><br />
<<<<<<< HEAD:views/layouts/default.ctp
								<span class="othermenu"><a href="http://hot.horpol.ru" target="_blank"><span>ТЕПЛЫЕ ПОЛЫ</span></a></span>	
							<?php echo $html->image('electro.jpg' );?>
								<span class="othermenu"><a href="http://vimar.horpol.ru" target="_blank"><span>ЭЛЕКТРИКА VIMAR</span></a></span>			
=======
								<span class="othermenu"><a href="index.html"><span>ТЕПЛЫЕ ПОЛЫ</span></a></span>	
							<?php echo $html->image('electro.jpg' );?>
								<span class="othermenu"><a href="index.html"><span>ЭЛЕКТРИКА VIMAR</span></a></span>			
>>>>>>> ec844de8c47dabe98e93be055f311ebd25476b91:views/layouts/default.ctp
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
<<<<<<< HEAD:views/layouts/default.ctp
			<span class="copyright">Copiright 2008 Maris Interior<br>
				<?php if($this->params['action'] == 'display' && $this->params['pass']['0'] == 'home' ): ?>
					<a href="http://www.borovikova.ru">Дизайн и разработка сайта</a>
				<?php endif ?>
			</span>
=======
			<span class="copyright">Copiright 2008 Maris Interior<br><a href="http://www.borovikova.ru">Дизайн и разработка сайта</a></span>
>>>>>>> ec844de8c47dabe98e93be055f311ebd25476b91:views/layouts/default.ctp
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
<script type="text/javascript">
	jQuery(document).ready(function(){
		if(jQuery.cookie("firstVisit") == null){
			jQuery.cookie("firstVisit", '1', { path: '/', expires: null });
		}
	});
</script>
<<<<<<< HEAD:views/layouts/default.ctp
<br />
	<span style="margin-left: 150px;">
		<cake:nocache>
			<!--LiveInternet logo--><a href="http://www.liveinternet.ru/click"
			target=_blank><img src="http://counter.yadro.ru/logo?58.2"
			title="LiveInternet"
			alt="" border=0 width=88 height=31></a><!--/LiveInternet-->	
		</cake:nocache>
	</span>
=======


>>>>>>> ec844de8c47dabe98e93be055f311ebd25476b91:views/layouts/default.ctp
</body>
</html>