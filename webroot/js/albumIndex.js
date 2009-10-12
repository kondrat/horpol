 $(document).ready(function() {
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
		
		$('.thumbAdmin').hover(function(){
			$(this).find('.lens').css({'background-position':'0 -32px'});
		},function(){
			$(this).find('.lens').css({'background-position':'0 0'});	
		});		
		
		
     $('.edit_name').editable( 
     	path + "/albums/albumEditName",      
    	{    	 
     	   id        : 'data[Album][id]',
         name      : 'data[Album][name]',
         width		 : 500,
         cssclass : 'catEdForm',
         cancel    : '<div class="span-2"><input type="submit" class="span-3" value="Отменить" /></div><hr />',
         submit    : '<div class="clear" /><div class="span-2"><input type="submit" class="clear span-2" value="OK" /></div>',
         indicator : '<img src="'+path +' /img/icons/ajax-loader.gif">',
         tooltip   : 'Редактировать название',
         callback : function(value, settings) {
         		//console.log(this);
         		//console.log(value);
        	 	//console.log(settings);
        	 	flashMessage('Альбом <span style="color:#911B3B;">'+value+'</span> переименован','message');	
        }

     });		
	$('#albumNameEdit').click(function(){
		$('.edit_name').trigger('click');
	});	




		
 });
