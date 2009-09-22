 $(document).ready(function() {
     $('.edit').editable('/save', {
         indicator : 'Saving...',
         tooltip   : 'Click to edit...'
     });
     $('.edit_area button').addClass('span-4');
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

 });
