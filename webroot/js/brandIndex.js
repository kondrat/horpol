 $(document).ready(function() {
	$('.brand').hover(function(){
		$(this).children().css({'border-color':'#000'});
		$(this).find('.lens').css({'background-position':'0 -32px'});
	},function(){
		$(this).find('.lens').css({'background-position':'0 0'});	
		$(this).children().css({'border-color':'silver'});	
	});
 
});
