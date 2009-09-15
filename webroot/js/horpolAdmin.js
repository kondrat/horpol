
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
			$('#brandSelect').attr('href',cat);
			return false;
		});
});
//changing name of the brand and url of the link
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
			$('#subcatSelect').attr('href',brandSelect);
			var brandImg = $(this).children().attr('src');
			$('.brandShadow').attr({src:brandImg});
			//alert(brandImg);
			return false;
		});
});
//changing name of the subCategory and url of the link
$(document).ready( function(){
		var prev = null;
		$('.subCategory li a').click(function() {
			
			var liContent = $(this).text();
			
			if (prev != null) {
				prev.removeClass('currentSubCat');
			}				
			prev = $(this);				
		 	$(this).addClass('currentSubCat');				

			$('#subcat span.subCatText').text(liContent);
			$('#subcat span').addClass('subCatSelected');
			var subCat = $(this).attr('href');		
			$('#productSelect').attr('href',subCat);
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
	var showLogo,quickCat,quickSubCat;
		$('.setWrapperQuick').mouseover(function(){
			$(this).addClass('act');

			
		}).mouseout(function(){
			$(this).removeClass('act');
    })
});
