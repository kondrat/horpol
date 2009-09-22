 $(document).ready(function() {
     $('.edit').editable('/save', {
         indicator : 'Saving...',
         tooltip   : 'Click to edit...'
     });

     $('.edit_area').editable( 
     	path + "/categories/catEdit",      
     {    	 
     	   id        : 'data[Post][id]',
         name      : 'data[Post][name]',

        // type      : 'textarea',
         width		 : 500,
         cssclass : 'catEdForm',
         cancel    : '<div class="span-2"><input type="submit" class="span-3" value="Отменить" /></div>',
         submit    : '<div class="span-2"><input type="submit" class="clear span-2" value="OK" /></div>',
         indicator : '<img src="'+path +' /img/icons/ajax-loader.gif">',
         tooltip   : 'Click to edit...'
     });

/*     
     $('.edit_test').editable( 
     	path + "/categories/catEditTest",      
     {    	 
     	  // id        : 'data[Post][id]',
        // name      : 'data[Post][name]',

         loadurl  : path + "/categories/cattest",
         loadtype : "POST",
         //type    : 'textarea',
         submit  : 'OK'

     });
*/
	$('.edit_test').click(function(){
		$('#ttt').load( path + "/categories/cattest");

	});

 });
