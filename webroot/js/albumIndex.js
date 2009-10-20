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
     	path + "albums/albumEditName",      
    	{    	 
     	   id        : 'data[Album][id]',
         name      : 'data[Album][name]',
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
        	 	flashMessage('Альбом <span style="color:#911B3B;">'+value+'</span> переименован','message');	
        }

     });		
	$('#albumNameEdit').click(function(){
		$('.edit_name').trigger('click');
	});	


	$('.subCatAdd, .subCategoryAddCancel').click(function(){
		$('.photoAdd').toggle();
		return false;
	});

	$("#ImageAddForm").ajaxForm({
		url: path+'images/imageAdd',	
		dataType:  'json',			
		success: 
				function(data) {
						//console.log(data);
						var noName = '';
						if( data.img != null) {
							if( data.prodName == null) {
								noName = 'Нет названия';
								data.prodName = '';
							}
							flashMessage('Фото сохранено','message');
							$('.imageItemWrapper').prepend(

								'<div class="photoItem">'+
									'<div class="span-3">'+
										'<a  href="">'+
										'<img src="'+path+'img/gallery/s/'+data.img+'"/></a>'+
									'</div>'+
									'<input type="hidden" value="0" id="ImageId'+data.prodId+'_" name="data[Image][id]['+data.prodId+']"/>'+
									'<input type="checkbox" id="ImageId'+data.prodId+'" value="'+data.prodId+'" class="selectable" name="data[Image][id]['+data.prodId+']"/>'+
									'<div id="'+data.prodId+'" class="span-1 last imageEdit"/>'+
									'<div class="span-4 last photoNameVal">'+data.prodName+'</div>'+
									'<div class="span-4 last photoNoNameVal" style="color:red;">'+noName+'</div>'+
								'</div>'													
							);
							
							
							$('.noProductYet').remove();
							//$('.brandFrom').hide();
						} else if (data.error != null) {
							flashMessage(data.error,'er');
	
							//console.log(data.error);
						}
						
										
				},
		
		resetForm: true
			
	});



	$("#selectall").click(function(){	
		if ( $(this).is('input[name="sel"]') ) {		
			$(this).attr('value','Снять выделение');
			$(this).attr("name", "desel");
			$(".selectable").each(function(){
				$(this).attr("checked", "checked");						
			});				
		} else if( $(this).is('input[name="desel"]') )  {
			$(this).attr('value','Выбрать все');
			$(this).attr("name", "sel");		
			$(".selectable").each(function(){
				$(this).attr("checked", null);	
			});					
		}				
	});	

	$("a.bigImage").fancybox({	
		hideOnContentClick: true,
  	zoomSpeedIn: 500,
  	zoomSpeedOut:500,		
		overlayShow: false								
	});
	
		var currProdEd = null;
		$('.imageEdit').live('click',function(){
	
				if (currProdEd != null) {
					currProdEd.removeAttr("style");
				}				
				currProdEd = $(this).parents('.photoItem');				
			 	currProdEd.css({'background-color':'#ccc'});
				
				$("#imageEditWrapper").hide();
			  var pos = $(this).offset(); 
			  //console.log(pos); 
			  $("#imageEditWrapper").css( { "left": (pos.left - 180) + "px", "top":(pos.top - 170) + "px" } );
			  $("#imageEditWrapper").fadeIn('fast');
			 	var textVal = jQuery.trim($(this).siblings('.photoNameVal').text());
			 	//console.log(textVal);
			  $("#imageNameEdit").attr('value', textVal );
			  $("#imageIdEdit").attr('value', $(this).attr('id') );
		
	
		});
		
		$('.imageEditCancel').click(function(){
			$('#imageEditWrapper').toggle();
			$('.photoItem').css({'background-color':'#eee'});
			return false;
		});

		$('.imageEdit').hover(function(){
			$(this).css({'background-position':'5px -28px','border-color':'silver'});
		},function(){
			$(this).css({'background-position':'5px 4px','border-color':'#eee'});		
		});
		$('.photoItem').hover(function(){
			$(this).css({'border-color':'silver'});
		},function(){
			$(this).css({'border-color':'#eee'});
		});


				var oldLogo = '';
				$('.subb').click(function(){
						if (currProdEd != null) {
							oldLogo = currProdEd.find('img:first').attr('src');
							currProdEd.find('img:first').attr('src',path+"img/icons/ajax-loader2.gif");
						}	
				});


				$('#imageEditForm').ajaxForm({
					
					//tagret: '#newProdEdit',
					url: path+'images/imageAdd',	
					dataType:  'json',
					type: 'post',			
					success: 
							function(data) {
									//console.log(data);
									if( data.img != null) {
										flashMessage('Изменения сохранены','message');
										currProdEd.find('img:first').hide().attr('src',path+"img/gallery/s/"+data.img).fadeIn('slow');
										currProdEd.find('a:first').attr('href',path+"img/gallery/b/"+data.img);
										if(data.prodName != null) {
											currProdEd.find('.photoNameVal').text(data.prodName);
											currProdEd.find('.photoNoNameVal').text('');
											$("#imageNameEdit").attr('value', data.prodName );
										} else {
											currProdEd.find('.photoNameVal').text('');
											currProdEd.find('.photoNoNameVal').text('Нет названия');
										}
									}else if (data.error != null) {
										flashMessage(data.error,'er');
										currProdEd.find('img:first').attr('src',oldLogo);																	
									}else if(data.img == null && data.prodName != null) {
										flashMessage('Изменения сохранены','message');
										currProdEd.find('img:first').attr('src',oldLogo);										
										currProdEd.find('.photoNameVal').text(data.prodName);
										currProdEd.find('.photoNoNameVal').text('');
										$("#imageNameEdit").attr('value', data.prodName );							
									} else if(data.img == null && data.prodName == null) {
										flashMessage('Изменения сохранены','message');
										currProdEd.find('img:first').attr('src',oldLogo);
										currProdEd.find('.photoNameVal').text('');										
										currProdEd.find('.photoNoNameVal').text('Нет названия');
									}
													
							},
					
					resetForm: true
					
						
				});
		
 });
