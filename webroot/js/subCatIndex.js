$(document).ready( function(){

      (function($) {
        jQuery.fn.backgroundPosition = function() {
          var p = $(this).css('background-position');
          if(typeof(p) === 'undefined') return $(this).css('background-position-x') + ' ' + $(this).css('background-position-y');
          else return p;
        };
      })(jQuery);

    
 		var bgPositionPr1 = '';
    $('.prevStep #catSelect').hover(function(){
    			bgPositionPr1 = $('#stepIcon1').backgroundPosition();
    			$('#stepIcon1').css({'background-position':'0px 0px'});
    		}, function() {
    			//alert(bgPositionPr1);
    			$('#stepIcon1').css({'background-position':bgPositionPr1}); 
    	}); 
    	
 		var bgPositionAc1 = '';
    $('.activeStep #catSelect').hover(function(){    	
    			bgPositionAc1 = $('#stepIcon1').backgroundPosition();
    			$('#stepIcon1').css({'background-position':'0px 0px'});
    		}, function() {
    			$('#stepIcon1').css({'background-position':bgPositionAc1}); 
    }); 
    	
    	 
 		var bgPositionPr2 = '';
    $('.prevStep #brandSelect').hover(function(){
    			bgPositionPr2 = $('#stepIcon2').backgroundPosition();
    			$('#stepIcon2').css({'background-position':'-20px 0px'});
    		}, function() {   			
    			$('#stepIcon2').css({'background-position':bgPositionPr2});
 
    	}); 
    	 
  		var bgPositionAc2 = '';
    $('.activeStep #brandSelect').hover(function(){
    			bgPositionAc2 = $('#stepIcon2').backgroundPosition();
    			$('#stepIcon2').css({'background-position':'-20px 0px'});
    		}, function() {
    			$('#stepIcon2').css({'background-position':bgPositionAc2}); 
    	}); 
    	
    	   	 		
  	var bgPositionPr3 = '';
    $('.prevStep #subcatSelect').hover(function(){
    			bgPositionPr3 = $('#stepIcon3').backgroundPosition();
    			$('#stepIcon3').css({'background-position':'-40px 0px'});
    		}, function() {
    			$('#stepIcon3').css({'background-position':bgPositionPr3}); 
    	}); 

  	var bgPositionAc3 = '';
    $('.activeStep #subcatSelect').hover(function(){
    			bgPositionAc3 = $('#stepIcon3').backgroundPosition();
    			$('#stepIcon3').css({'background-position':'-40px 0px'});
    		}, function() {
    			$('#stepIcon3').css({'background-position':bgPositionAc3}); 
    	}); 



    $('.disableStep a').click(function(){
    	return false;
    });
    
    
});
