 $(document).ready(function() {

		$('#brandLogoEdit,.barndLogoCancel').click(function(){
			$('.brandFrom').toggle();
		});
		
		$('#tuda').click( function(){ 
			 $('.prodShadow').attr('src',path+"img/icons/ajax-loader6.gif");
		});
		
		var oldImg = $('.prodShadow').attr('src');
							
		$("#storyEditForm").ajaxForm({
			url: path+'products/prodEditLogo',	
			dataType:  'json',			
			success: 
					function(data) {
							//console.log(data);
							if( data.img != null) {
								flashMessage('Изменения сохранены','message');
								$('.prodShadow').hide().attr('src',path+"img/catalog/s/"+data.img).fadeIn();
								$('a.bigProd').attr('href',path+"img/catalog/b/"+data.img);
								$('.brandFrom').hide();
							} else if (data.error != null) {
								flashMessage('Изменения не были сохранены','er');
								$('.prodShadow').hide().attr('src',oldImg).fadeIn();
								$('.brandFormError').html('<div class="error">'+data.error+'</div>');
							}											
					},
			
			resetForm: true
				
		});
		
		$("a.bigProd").fancybox({	
			hideOnContentClick: true,
	  	zoomSpeedIn: 500,
	  	zoomSpeedOut:500,		
			overlayShow: false								
		});		
		

     $('.edit_name').editable( 
     	path + "products/prodEditName",      
    	{    	 
     	   id        : 'data[Product][id]',
         name      : 'data[Product][name]',
 
         width		 : 500,
         cssclass : 'catEdForm',
         cancel    : '<div class="span-2"><input type="submit" class="span-3" value="Отменить" /></div><hr />',
         submit    : '<div class="clear" /><div class="span-2"><input type="submit" class="clear span-2" value="OK" /></div>',
         indicator : '<img src="'+path +'img/icons/ajax-loader.gif">',
         tooltip   : 'Редактировать название',
         callback : function(value, settings) {

        	 	flashMessage('Товар <span style="color:#911B3B;">'+value+'</span> переименован','message');	
        }

     });
    


	var origText = '';
	
	$('.edit_body').click(function(){
		var id = parseInt($(this).attr('id'));
		origText = $(this).html();
		$('#mmm').append('<div style="margin:150px 330px; auto;width:740px;height:400px"><img src="'+path +'img/icons/ajax-loader2.gif"></div>');
		$(this).html('');
		$('#ttt').load( 
			path + "products/prodEditBody",
			{ 'data[Product][id]': id },
			function(){
				$('#mmm').empty();
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
