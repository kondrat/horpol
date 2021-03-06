 $(document).ready(function() {
 		var curNews;
 		$('.newsHead').hover(function(){
 			curNews= $(this).next();
			curNews.css({'background-position':'0 -32px'});		
			},function(){
			curNews.css({'background-position':'0 0'});			
		});

     $('.edit_name').editable( 
     	path + "news/newsEditName",      
    	{    	 
     	   id        : 'data[News][id]',
         name      : 'data[News][name]',
        // type      : 'textarea',
         width		 : 500,
         cssclass : 'catEdForm',
         cancel    : '<div class="span-2"><input type="submit" class="span-3" value="Отменить" /></div><hr />',
         submit    : '<div class="clear" /><div class="span-2"><input type="submit" class="clear span-2" value="OK" /></div>',
         indicator : '<img src="'+path +'img/icons/ajax-loader.gif">',
         tooltip   : 'Редактировать название',
         callback : function(value, settings) {

        	 	flashMessage('заголовок новости изменен','message');	
        }

     });

	var origText = '';
	
	$('.edit_body').click(function(){
		var id = parseInt($(this).attr('id'));
		origText = $(this).html();
		$('#mmm').append('<div style="margin:150px 330px; auto;width:740px;height:400px"><img src="'+path +'img/icons/ajax-loader2.gif"></div>');
		$(this).html('');
		$('#ttt').load( 
			path + "news/newsEditBody",
			{ 'data[News][id]': id },
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
	

	var origData = '';
	
	$('.edit_data').click(function(){
		var id = parseInt($(this).attr('id'));
		origData = $(this).html();
		$(this).html('');
		$('#dataInput').append('<img src="'+path +'img/icons/ajax-loader.gif">');
	
		$('#dataInput').load( 
			path + "news/newsEditData",
			{ 'data[News][id]': id },
			function(){
				//flashMessage('Описание отредактировано','message');
			}
		);

	});
	
	
	$('input.newsDataCancel').live('click',function(){
		$('#dataInput').empty();
		$('.edit_data').html(origData);
	});

	$('#newsDataSubmit').live('click',function(){
		$('.edit_data').html('<img src="'+path +'img/icons/ajax-loader.gif">');
		$(this).parents("#NewsEditForm").ajaxSubmit({
			success: function(responseText, responseCode) {
				if(responseText.data != null){
					flashMessage('Дата изменена','message');
					$('.edit_data').text(responseText.data);
				} else {
					flashMessage('Изменения не были сохранены. Проверьте дату','er');
					$('.edit_data').text(origData);
				}
					//alert(responseText.data);
					$('#ajax-save-message').hide().html(responseText).fadeIn();					
				},
			resetForm: true,
			dataType:  'json'
			});
		$('#dataInput').empty();
		
		return false;
	})




	
	$('#newsNameEdit').click(function(){
		$('.edit_name').trigger('click');
	});
	$('#newsDataEdit').click(function(){
		$('.edit_data').trigger('click');
	});
	$('#newsBodyEdit').click(function(){
		$('.edit_body').trigger('click');
	});
	




 });
