 $(document).ready(function() {

		$('#brandLogoEdit,.barndLogoCancel').click(function(){
			$('.brandFrom').toggle();
		});
		
		$('#tuda').click( function(){ 
			 $('.bannerLogo').attr('src',path+"img/icons/ajax-loader5.gif");
		});
		
		var oldImg = $('.bannerLogo').attr('src');
							
		$("#storyEditForm").ajaxForm({
			url: path+'banners/bannerEditLogo',	
			dataType:  'json',			
			success: 
					function(data) {
							//console.log(data);
							if( data.img != null) {
								flashMessage('Изменения сохранены','message');
								$('.bannerLogo').hide().attr('src',path+"img/banner/"+data.img).fadeIn();
								$('.brandFrom').hide();
							} else if (data.error != null) {
								flashMessage('Изменения не были сохранены','er');
								$('.bannerLogo').hide().attr('src',oldImg).fadeIn();
								$('.brandFormError').html('<div class="error">'+data.error+'</div>');
								//console.log(data.error);
							}
											
					},
			
			resetForm: true
				
		});

     $('.edit_url').editable(
     	path + "banners/bannerEditUrl",      
    	{    	 
     	   id        : 'data[Banner][id]',
         name      : 'data[Banner][url]',
        // type      : 'textarea',
         width		 : 500,
         cssclass : 'catEdForm',
         cancel    : '<div class="span-2"><input type="submit" class="span-3" value="Отменить" /></div><hr />',
         submit    : '<div class="clear" /><div class="span-2"><input type="submit" class="clear span-2" value="OK" /></div>',
         indicator : '<img src="'+path +'img/icons/ajax-loader.gif">',
         tooltip   : 'Редактировать ссылку',
         placeholder : 'Редактировать ссылку',
         callback : function(value, settings) {
  					if(value != 0 ){
        	 		flashMessage('Ссылка изменена','message');
        	 	} else {
        	 		flashMessage('Неверный формат ссылки','er');
        	 	}	
        }

     });
     
     
     
	$('#bannerUrlEdit').click(function(){
		$('.edit_url').trigger('click');
	});

 });
