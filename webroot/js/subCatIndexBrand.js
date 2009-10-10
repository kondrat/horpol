
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
