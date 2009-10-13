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

 });
