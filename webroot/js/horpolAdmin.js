
//-----------------------------------------------------------------------------------
$(document).ready(function(){
	$("#selectall").click(selectAll);
});

	function selectAll() {

		var checked = $("#selectall").attr("checked");

		$(".selectable").each(function(){
			var subChecked = $(this).attr("checked");
					if (subChecked != checked) {
						$(this).click();
					}
				});
	}

//------------------------------------------------------------------------------------
$(document).ready( function(){
		var $alert = $('#flashMessage');
		if($alert.length) {
				var alerttimer = window.setTimeout(function () {
					$alert.trigger('click');
				}, 5000);
				$alert.animate({height: $alert.css('line-height') || '52px'}, 800)
				.click(function () {
					window.clearTimeout(alerttimer);
					$alert.animate({height: '0'}, 400);
					$alert.css({'border':'none'});
					
				});
		}
	
});
//------------------------------------------------------------------------------------
/*
$(document).ready(function() {
	$("div.test1 a").fancybox({	'hideOnContentClick': true,
								'zoomSpeedIn': 0, 'zoomSpeedOut': 0,
								'overlayShow': true,
								'overlayOpacity': 0.9
								});
}); 
*/

$(document).ready( function(){
		$('.category li a').click(function() {
			var liContent = $(this).text();
			$('#cat span.catText').text(liContent);
			$('#cat span').addClass('catSelected');
			var cat = $(this).attr('href');		
			$('#catSelect').attr('href',cat);
			return false;
		});
});

$(document).ready( function(){
		$('.brA').click(function() {
			var brandContent = $(this).text();		
			$('#brand span.brandText').text(brandContent);
			$('#brand').addClass('brandSelected');
			var brandSelect = $(this).attr('href');			
			$('#brandSelect').attr('href',brandSelect);
			return false;
		});
		$('.brImg').click(function() {
			var brandContent = $(this).parents('.brand').find('.brA').text();	
			$('#brand span.brandText').text(brandContent);
			$('#brand').addClass('brandSelected');
			var brandSelect = $(this).attr('href');			
			$('#brandSelect').attr('href',brandSelect);
			return false;
		});
});

$(document).ready( function(){
		$('#albumNew').click(function() {
  				if ( $("#albumAddForm").is(":hidden") ) {
            $("#albumAddForm").fadeIn();
						//$(".projectTitle").text('close id').css({'color' : 'sienna'});
          } else {
            $("#albumAddForm").fadeOut();
						//$(".projectTitle").text('switch projects').css({'color' : '#000'});
          }
			return false;
		});
});
