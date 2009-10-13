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

			$("#step1").removeClass('prevStep').addClass('activeStep');
			$(".activeStep div#stepIcon1").css({'background-position':'0 -40px'});

			
			/*
	 		$("#step1").oneTime(500, function() {
				$(this).removeClass('activeStep').addClass('prevStep');
			});
			*/
			

			
			
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
	   content: '<h4>Значок обозначает тип категории:</h4> 1 - Товары без описания (Основной тип);<br />2 - Товары без Бренда (пример: Винтаж);<br />3 - Товары с описанием (пример: Лаки)',
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
	   content: 'Пять последних подразделов, в которые добавлялись товары',
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