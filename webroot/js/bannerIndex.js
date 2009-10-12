//changing name of the category and url of the link
$(document).ready( function(){
		var prev = null;
	
		$('.bannerLi a').click(function() {
			
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
		$('.category,.bannerLi').hover(function(){
			$(this).addClass('act3');		
		},function(){
			$(this).removeClass('act3');
    });
});


$(document).ready( function(){
	$("input:checked").parent().addClass('act2');
	
	$(":checkbox").click(function(){
		var check = $(this).parent();
		if ($(this).is(":checked")) {
			$(this).parent().addClass('act4');			
		} else {
			$(this).parent().removeClass('act4');
			$(this).parent().removeClass('act2');
		}

		
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