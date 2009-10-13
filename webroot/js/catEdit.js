 $(document).ready(function() {
 	
	 	$('.edit_type').editable(
	 		path + "categories/catEditType", 
	 		{
	     	data   : " {'1':'Товары без описания (Основной тип)','2':'Товары без Бренда (пример: Винтаж)','3':'Товары с описанием (пример: Лаки)', 'selected':'1'}",
	     	id        : 'data[Category][id]',
	      name      : 'data[Category][type]',
	      cssclass : 'catEditType',
	     	type   : 'select',
	     	submit : '<div><input type="submit" class="span-2" value="OK" /></div>',
	     	cancel : '<div><input type="submit" class="span-3" value="Отменить" /></div><hr />',
	     	tooltip   : 'Редактировать тип',
	     	indicator : '<img src="'+path +'img/icons/ajax-loader3.gif">',
        callback : function(value, settings) {
        	 	flashMessage('Тип категории изменен','message');	
        }	
		});

     $('.edit_name').editable( 
     	path + "categories/catEditName",      
    	{    	 
     	   id        : 'data[Category][id]',
         name      : 'data[Category][name]',
        // type      : 'textarea',
         width		 : 500,
         cssclass : 'catEdForm',
         cancel    : '<div class="span-2"><input type="submit" class="span-3" value="Отменить" /></div><hr />',
         submit    : '<div class="clear" /><div class="span-2"><input type="submit" class="clear span-2" value="OK" /></div>',
         indicator : '<img src="'+path +'img/icons/ajax-loader.gif">',
         tooltip   : 'Редактировать название',
         callback : function(value, settings) {
         		//console.log(this);
         		//console.log(value);
        	 	//console.log(settings);
        	 	flashMessage('Категория <span style="color:#911B3B;">'+value+'</span> переименована','message');	
        }

     });
     
     $('.edit_slogan').editable( 
     	path + "categories/catEditSlogan",      
    	{    	 
     	   id        : 'data[Category][id]',
         name      : 'data[Category][slogan]',
        // type      : 'textarea',
         width		 : 500,
         cssclass : 'catEdForm',
         cancel    : '<div class="span-2"><input type="submit" class="span-3" value="Отменить" /></div><hr />',
         submit    : '<div class="clear" /><div class="span-2"><input type="submit" class="clear span-2" value="OK" /></div>',
         indicator : '<img src="'+path +'img/icons/ajax-loader.gif">',
         tooltip   : 'Редактировать слоган',
	        callback : function(value, settings) {
	        	 	flashMessage('Слоган изменен','message');	
	        }	
     });
/*     
     $('.edit_test').editable( 
     	path + "categories/catEditTest",      
     {    	 
     	  // id        : 'data[Post][id]',
        // name      : 'data[Post][name]',

         loadurl  : path + "categories/cattest",
         loadtype : "POST",
         //type    : 'textarea',
         submit  : 'OK'

     });
*/
	var origText = '';
	
	$('.edit_body').click(function(){
		var id = parseInt($(this).attr('id'));
		origText = $(this).html();
		$('#mmm').append('<div style="margin:150px 330px; auto;width:740px;height:400px"><img src="'+path +'img/icons/ajax-loader2.gif"></div>');
		$(this).html('');
		$('#ttt').load( 
			path + "categories/catEditBody",
			{ 'data[Category][id]': id },
			function(){
				$('#mmm').empty();
				//flashMessage('Описание отредактировано','message');
			}
		);

	});
	
	
	$('input.catBodyCancel').live('click',function(){
		$('#ttt').empty();
		$('.edit_body').html(origText);
	});
	

	
	$('#catNameEdit').click(function(){
		$('.edit_name').trigger('click');
	});
	$('#catSloganEdit').click(function(){
		$('.edit_slogan').trigger('click');
	});
	$('#catTypeEdit').click(function(){
		$('.edit_type').trigger('click');
	});
	$('#catBodyEdit').click(function(){
		$('.edit_body').trigger('click');
	});
	

 });
