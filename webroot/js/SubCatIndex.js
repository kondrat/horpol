$(document).ready( function(){
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
