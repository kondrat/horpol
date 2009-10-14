 $(document).ready(function() {

		$('#brandLogoEdit,.barndLogoCancel').click(function(){
			$('.brandFrom').toggle();
		});
		
		$('#tuda').click( function(){ 
			 $('.brandShadow').attr('src',path+"img/icons/ajax-loader4.gif");
		});
		
		var oldImg = $('.brandShadow').attr('src');
							
		$("#storyEditForm").ajaxForm({
			url: path+'brands/brandEditLogo',	
			dataType:  'json',			
			success: 
					function(data) {
							//console.log(data);
							if( data.img != null) {
								flashMessage('Изменения сохранены','message');
								$('.brandShadow').hide().attr('src',path+"img/catalog/"+data.img).fadeIn();
								$('.brandFrom').hide();
							} else if (data.error != null) {
								flashMessage('Изменения не были сохранены','er');
								$('.brandShadow').hide().attr('src',oldImg).fadeIn();
								$('.brandFormError').html('<div class="error">'+data.error+'</div>');
								//console.log(data.error);
							}
											
					},
			
			resetForm: true
				
		});
		
		

     $('.edit_name').editable( 
     	path + "brands/brandEditName",      
    	{    	 
     	   id        : 'data[Brand][id]',
         name      : 'data[Brand][name]',
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
        	 	flashMessage('Бренд <span style="color:#911B3B;">'+value+'</span> переименован','message');	
        }

     });
    
     $('.edit_origin').editable( 
     	path + "brands/brandEditOrigin",      
    	{    	 
     	   id        : 'data[Brand][id]',
         name      : 'data[Brand][origin]',
        // type      : 'textarea',
         width		 : 500,
         cssclass : 'catEdForm',
         cancel    : '<div class="span-2"><input type="submit" class="span-3" value="Отменить" /></div><hr />',
         submit    : '<div class="clear" /><div class="span-2"><input type="submit" class="clear span-2" value="OK" /></div>',
         indicator : '<img src="'+path +'img/icons/ajax-loader.gif">',
         tooltip   : 'Редактировать',
	        callback : function(value, settings) {
	        	 	flashMessage('Изменения сохранены','message');	
	        }	
     });

	var origText = '';
	
	$('.edit_body').click(function(){
		var id = parseInt($(this).attr('id'));
		origText = $(this).html();
		$('#mmm').append('<div style="margin:150px 330px; auto;width:740px;height:400px"><img src="'+path +'img/icons/ajax-loader2.gif"></div>');
		$(this).html('');
		$('#ttt').load( 
			path + "brands/brandEditBody",
			{ 'data[Brand][id]': id },
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
	

	
	$('#brandNameEdit').click(function(){
		$('.edit_name').trigger('click');
	});
	$('#brandOriginEdit').click(function(){
		$('.edit_origin').trigger('click');
	});
	$('#brandBodyEdit').click(function(){
		$('.edit_body').trigger('click');
	});
	



 });
