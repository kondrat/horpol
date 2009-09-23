 $(document).ready(function() {
 	$('.edit_type').editable('/save', {
     	data   : " {'1':'Товары без описания (Основная)','2':'Товары с описанием (пр: Химия)','3':'Товары без Бренда (пр: Винтаж)', 'selected':'1'}",
     	id        : 'data[Category][id]',
      name      : 'data[Category][type]',
     	type   : 'select',
     	submit : 'OK'

	});

     $('.edit_area').editable( 
     	path + "/categories/catEdit",      
     {    	 
     	   id        : 'data[Category][id]',
         name      : 'data[Category][name]',

        // type      : 'textarea',
         width		 : 500,
         cssclass : 'catEdForm',
         cancel    : '<div class="span-2"><input type="submit" class="span-3" value="Отменить" /></div>',
         submit    : '<div class="clear" /><div class="span-2"><input type="submit" class="clear span-2" value="OK" /></div>',
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
		var id = parseInt($(this).attr('id'));
		var origText = $(this).html();
		$(this).html('');
		$('#ttt').load( 
			path + "/categories/cattest",
			{ 'data[Category][id]': id }
		);

	});

	$('#catNameEdit').click(function(){
		$('.edit_area').trigger('click');
	});

	$('.catEditButton').hover(function(){
		$(this).addClass('catEditButtonHover');
	},function(){
		$(this).removeClass('catEditButtonHover');
	});



 });
