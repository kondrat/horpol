//changing name of the category and url of the link
$(document).ready( function(){
		var prev = null;
	
		$('.category a').click(function() {
			
			var liContent = $(this).text();
			
			if (prev != null) {
				prev.removeClass('currentCat').parent('.category').removeClass('act2');;
			}				
			prev = $(this);				
		 	$(this).addClass('currentCat').parent('.category').addClass('act2');				

			$('#cat span.catText').text(liContent);
			$('#cat span').addClass('catSelected');
			var cat = $(this).attr('href');		
			$('#catSelect').attr('href',cat);
			return false;
		});
});
$(document).ready( function(){
		$('.category').hover(function(){
			$(this).addClass('act3');		
		},function(){
			$(this).removeClass('act3');
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
});

//Tips
$(document).ready( function(){
	$(".catInfoTip").qtip({
	   content: 'Значок обозначает тип категории',
	   position: {
	      corner: {
	         target: 'topRight',
	         tooltip: 'bottomLeft'
	      }
	   },
	  style: { 
	      name: 'blue'
	   }

	});
	
	$(".last5InfoTip").qtip({
	   content: 'означает тип категории',
	   position: {
	      corner: {
	         target: 'topRight',
	         tooltip: 'bottomLeft'
	      }
	   },
	  style: { 
	      name: 'blue'
	   }

	});	
	
});