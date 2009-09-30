
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
//changing name of the category and url of the link
$(document).ready( function(){
		var prev = null;
	
		$('.category li a').click(function() {
			
			var liContent = $(this).text();
			
			if (prev != null) {
				prev.removeClass('currentCat');
			}				
			prev = $(this);				
		 	$(this).addClass('currentCat');				

			$('#cat span.catText').text(liContent);
			$('#cat span').addClass('catSelected');
			var cat = $(this).attr('href');		
			$('#catSelect').attr('href',cat);
			return false;
		});
});
//changing name of the brand and url of the link
$(document).ready( function(){
		$('.brandName').click(function() {
			var brandContent = $(this).prev();
			$(brandContent).trigger('click');
			return false;
		});
		$('.brandImg').click(function() {
			var brandContent = $(this).parents('.brand').find('.brA').text();	
			$('#brand span.brandText').text(brandContent);
			$('#brand').addClass('brandSelected');
			var brandSelect = $(this).find('.brImg').attr('href');		
			$('#brandSelect').attr('href',brandSelect);
			var brandImg = $(this).find('img').attr('src');
			$('.brandShadow').attr({src:brandImg});
			return false;
		});


	$('.brand').hover(function(){
		$(this).children().css({'border-color':'#000'});
	},function(){
		$(this).children().css({'border-color':'silver'});	
	});
	
});

//changing name of the subCategory and url of the link
$(document).ready( function(){
		var prev = null;
		$('.subCategory div a').click(function() {
			
			var liContent = $(this).text();
			
			if (prev != null) {
				prev.removeClass('currentSubCat');
			}				
			prev = $(this);				
		 	$(this).addClass('currentSubCat');				

			$('#subcat span.subCatText').text(liContent);
			$('#subcat span').addClass('subCatSelected');
			var subCat = $(this).attr('href');		
			$('#subcatSelect').attr('href',subCat);
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
$(document).ready( function(){
		$('#brandsAll').click(function() {
				//$("#allBrandsWrapper").slideUp();
  				if ( $("#allBrandsWrapper").is(":hidden") ) {
            $("#allBrandsWrapper").fadeIn();
          } else {
            $("#allBrandsWrapper").fadeOut();
          }	          	
			return false;
		});
});
$(document).ready( function(){
	//var showLogo,quickCat,quickSubCat;
	var brandShadow = $('.brandShadow').attr('src');
		$('.setWrapperQuick').hover(function(){
			$(this).addClass('act');
			var quickGoImg = $(this).find('.quickGoImg').attr('src');			 
			$('.brandShadow').attr({src:quickGoImg});			
		},function(){
			$(this).removeClass('act');
			$('.brandShadow').attr({src:brandShadow});
    });
    
    
    $('.activeStep #catSelect').hover(function(){
    	$('#stepIcon1').css({'background-position':'0 0px'});
    },function() {
    	$('#stepIcon1').css({'background-position':'0 -40px'});    	
    });
    
    $('.activeStep #brandSelect').hover(function(){
    	$('#stepIcon2').css({'background-position':'-20px 0px'});
    },function() {
    	$('#stepIcon2').css({'background-position':'-20px -40px'});    	
    });
    
     $('.activeStep #subcatSelect').hover(function(){
    	$('#stepIcon3').css({'background-position':'-40px 0px'});
    },function() {
    	$('#stepIcon3').css({'background-position':'-40px -40px'});    	
    });
       
    $('.prevStep #catSelect').hover(function(){
    	$('#stepIcon1').css({'background-position':'0 0'});
    },function() {
    	$('#stepIcon1').css({'background-position':'0 -20px'});    	
    });
    $('.prevStep #brandSelect').hover(function(){
    	$('#stepIcon2').css({'background-position':'-20px 0'});
    },function() {
    	$('#stepIcon2').css({'background-position':'-20px -20px'});    	
    });    
    

    $('.disableStep a').click(function(){
    	return false;
    });
});
