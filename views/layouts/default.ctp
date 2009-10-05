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
		echo $html->css('horPolStyle');	
		echo $html->css('jquery.fancybox');
		echo $javascript->codeBlock('var path = "'.Configure::read('path').'";' );
	?>

	<?php
		echo $javascript->link( array('jquery-1.3.2.min','jquery.easing.1.3', 'cookie', 'jquery.pngFix.pack') , true);
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
	
		<!--LiveInternet counter--><script type="text/javascript"><!--
		new Image().src = "http://counter.yadro.ru/hit?r"+
		escape(document.referrer)+((typeof(screen)=="undefined")?"":
		";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
		screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
		";"+Math.random();//--></script><!--/LiveInternet-->	

	
		<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
		</script>
		<script type="text/javascript">
		try {
		var pageTracker = _gat._getTracker("UA-8421821-1");
		pageTracker._trackPageview();
		} catch(err) {}</script>
		

	<cake:nocache>
	<?php 
		if ($session->check('Auth.User.role') == 'admin') {
			echo $this->element('admin/adminPanel', array('cache' => true) );
		}
	?>
	</cake:nocache>

	<div class="fieldup"></div>	
	<div align="center">
		
			<div class="header-photo">
					<?php echo $html->image('header.gif', array("class" => "img") );?><script language="javascript">
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
								//'src',  flashName,
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
								'background', '/img/low.jpg',
								'name', flashName,
								'menu', 'true',
								'allowFullScreen', 'false',
								'allowScriptAccess','sameDomain',
								'movie', path+'/'+ flashName,
								'salign', ''
								); //end AC code
								
						}
						
					</script><noscript>
						<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="698" height="393" id="flaming_cursor2" align="middle">
						<param name="allowScriptAccess" value="sameDomain" />
						<param name="allowFullScreen" value="false" />
						<param name="movie" value="flaming_cursor2.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#000000" /><embed class="pict" src="flaming_cursor2.swf" quality="high" bgcolor="#000000" width="698" height="393" name="flaming_cursor2" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
					</object></noscript>			
										
					<span class="upmenu"><?php echo $html->link('<span>ГЛАВНАЯ</span>','/',null,null,false);?></span>
					<span class="upmenu"><?php echo $html->link('<span>О КОМПАНИИ</span>',array('controller'=> 'pages', 'action'=>'company'),null,null,false);?></span>
					<span class="upmenu"><?php echo $html->link('<span>УСЛУГИ</span>',array('controller'=> 'pages', 'action'=>'service'),null,null,false);?></span>
					<span class="upmenu"><?php echo $html->link('<span>ФОТОГАЛЕРЕЯ</span>',array('controller'=> 'albums', 'action'=>'index'),null,null,false);?></span>
					<span class="upmenu"><?php echo $html->link('<span>КОНТАКТЫ</span>',array('controller'=> 'pages', 'action'=>'contacts'),null,null,false);?></span>					
					<br clear="all" />
			</div>		
				
	
			
	
				
		<div id="frame2col">
		
			<div id="contentleft2col">
					
					<?php echo $this->element('menu/leftMainMenu', array('cache' => array('key' => 'leftMenu', 'time' => '+300 days') ) ); ?>
					
						
						<div class="other">
							<p>Другие направления:</p>	
						
							<?php echo $html->image('hotpol.jpg' );?><br />
								<span class="othermenu"><a href="http://hot.horpol.ru" target="_blank"><span>ТЕПЛЫЕ ПОЛЫ</span></a></span>	
							<?php echo $html->image('electro.jpg' );?>
								<span class="othermenu"><a href="http://vimar.horpol.ru" target="_blank"><span>ЭЛЕКТРИКА VIMAR</span></a></span>			
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
			<span class="copyright">Copiright 2008 Maris Interior<br>
				<?php if($this->params['action'] == 'display' && $this->params['pass']['0'] == 'home' ): ?>
					<a href="http://www.borovikova.ru">Дизайн и разработка сайта</a>
				<?php endif ?>
			</span>

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

<br />
	<span style="margin-left: 150px;">
		<cake:nocache>
			<!--LiveInternet logo--><a href="http://www.liveinternet.ru/click"
			target=_blank><img src="http://counter.yadro.ru/logo?58.2"
			title="LiveInternet"
			alt="" border=0 width=88 height=31></a><!--/LiveInternet-->	
		</cake:nocache>
	</span>

	
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-8423322");
pageTracker._initData();
pageTracker._trackPageview();
</script>

		<cake:nocache>
<!-- Yandex.Metrika -->
<script src="//mc.yandex.ru/resource/watch.js" type="text/javascript"></script>
<script type="text/javascript">
try { var yaCounter198036 = new Ya.Metrika(198036); } catch(e){}
</script>
<noscript><div style="position: absolute;"><img src="//mc.yandex.ru/watch/198036" alt="" /></div></noscript>
<!-- Yandex.Metrika -->
		</cake:nocache>	
	
</body>
</html>