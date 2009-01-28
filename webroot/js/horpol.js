//------------------------------------------------------------------------------------
$(document).ready(function() {
	// $("div.test1 a").fancybox();
	 //Activate FancyBox

	$("div.test1 a").fancybox({	'hideOnContentClick': true,
								'zoomSpeedIn': 0, 'zoomSpeedOut': 0,
								'overlayShow': true,
								'overlayOpacity': 0.9
								});

	// $("p#test2 a").fancybox({ 'hideOnContentClick': true }); 
	 //$("div.test1 a").fancybox({ 'zoomSpeedIn': 500, 'zoomSpeedOut': 800, 'overlayShow': true }); 
}); 

//-----------------------------------------------------------------------------------