$(document).ready( function(){
    
 		var bgPosition = '';
    $('.prevStep #catSelect,.activeStep #catSelect').hover(function(){
    			bgPosition = $('#stepIcon1').css("background-position");
    			$('#stepIcon1').css({'background-position':'0px 0px'});
    		}, function() {
    			$('#stepIcon1').css({'background-position':bgPosition}); 
    	}); 
 
 		var bgPosition2 = '';
    $('.prevStep #brandSelect,.activeStep #brandSelect').hover(function(){
    			var bgPosition2 = $('#stepIcon1').css("background-position");
    			$('#stepIcon2').css({'background-position':'-20px 0px'});
    		}, function() {
    			$('#stepIcon2').css({'background-position':bgPosition2}); 
    	}); 
    	 
  		
  	var bgPosition3 = '';
    $('.prevStep #subcatSelect,.activeStep #subcatSelect').hover(function(){
    			var bgPosition3 = $('#stepIcon1').css("background-position");
    			$('#stepIcon3').css({'background-position':'-40px 0px'});
    		}, function() {
    			$('#stepIcon3').css({'background-position':bgPosition3}); 
    	}); 
 //
    $('.disableStep a').click(function(){
    	return false;
    });
    
    
});
