$(document).ready(function() {

//changing name of the subCategory and url of the link
		var prev = null;
		$('.subCategory div a').click(function() {
			
			var liContent = $(this).text();
			
			if (prev != null) {
				prev.removeClass('actSubcat');
			}				
			prev = $(this).parent();				
		 	prev.addClass('actSubcat');				

			$('#subcat span.subCatText').text(liContent);
			$('#subcat span').addClass('subCatSelected');
			var subCat = $(this).attr('href');		
			$('#subcatSelect').attr('href',subCat);
			
			$("#step3").removeClass('prevStep').addClass('activeStep');
			$(".activeStep div#stepIcon3").css({'background-position':'-40px -40px'});			
			
			
			return false;
		});
		
		
		
	$('.subCatAdd, .subCategoryAddCancel').click(function(){
		$('.subCategoryAdd').toggle();
		return false;
	});

	$('.newSubCat').click(function(){
		//alert($('#SubCategoryName').val());
		if($('#SubCategoryName').val() == '' ) {
			$('#SubCategoryNameError').text('Это поле должно быть заполнено');
			$('.subCategoryAdd').addClass('error');
			return false;
		}		
	});

	$('.subCatItem').hover(function(){
		$(this).addClass('act');
		//$('.act a').css({'background-color':'#ccc'});
	},function(){
		//$('.act a').css({'background-color':'#fff'});
		$(this).removeClass('act');
	});
	
	$('.subCategoryEdit').hover(function(){
		$(this).css({'background-position':'0px -32px','border-color':'silver'});
	},function(){
		$(this).css({'background-position':'0px 0px','border-color':'#eee'});		
	});


	$('.subCategoryEdit').click(function(){
		$('.edit_name').empty();
		$('.subCatItem').removeClass('actSubcat');
		$(this).parents('.subCatItem').addClass('actSubcat');
		var id = parseInt($(this).attr('id'));
		$(this).next().append('<div style="margin:1em;"><img src="'+path +'img/icons/ajax-loader.gif"></div>');
		
		$(this).next().load( 
			path + "sub_categories/subCatEditName",
			{ 'data[SubCat][id]': id },
			function(){
				//$('#mmm').empty();
			}
		);
		
	});

	$('input.catBodyCancel').live('click',function(){
		$(this).parents('.edit_name').empty();
		$('.subCatItem').removeClass('actSubcat');
	});


	$('input.subCatEditSubmit').live('click',function(){
		if($('#subCatEditName').val() == '' ) {
			$('#SubCategoryEditError').text('Это поле должно быть заполнено');
			$(this).parents('.subCatItem').addClass('error');
			return false;
		}		
	});




//products
	$('.productAdd, .productAddCancel').click(function(){
		$('.productItemAdd').toggle();
		return false;
	});

	$("#ProductAddProductForm").ajaxForm({
		url: path+'products/addProduct',	
		dataType:  'json',			
		success: 
				function(data) {
						//console.log(data);
						
						if( data.img != null) {
							flashMessage('Товар сохранен','message');
							$('.productItemWrapper').prepend(
								'<div class="productItem" style="border-color:teal;">'+
									'<div class="span-4">'+
										'<a href="">'+
										'<img alt="newOn" src="'+path+'img/catalog/s/'+data.img+'"/></a>'+
									'</div>'+
									'<input type="hidden" value="0" id="ProductId'+data.prodId+'_" name="data[Product][id]['+data.prodId+']"/>'+
									'<input type="checkbox" id="ProductId'+data.prodId+'" value="'+data.prodId+'" class="selectable" name="data[Product][id]['+data.prodId+']"/>'+
									'<div class="span-6 last">'+data.prodName+'</div>'+
								'</div>'							
							
							);
							
							
							$('.noProductYet').remove();
							//$('.brandFrom').hide();
						} else if (data.error != null) {
							flashMessage('Изменения не были сохранены','er');
							//$('.brandShadow').hide().attr('src',oldImg).fadeIn();
							//$('.brandFormError').html('<div class="error">'+data.error+'</div>');
	
							console.log(data.error);
						}
						
										
				},
		
		resetForm: true
			
	});
	$('.newProduct').click(function(){
		$('#ProductFileError ,#ProductNameError').empty();
		$('.productItemAdd').removeClass('error');
		if($('#ProductUserfile').val() == '' ) {
			$('#ProductFileError').text('Это поле должно быть заполнено');
			$('.productItemAdd').addClass('error');
			return false;
		} else if ($('#ProductName').val() == '' ) {
			$('#ProductNameError').text('Это поле должно быть заполнено');
			$('.productItemAdd').addClass('error');
			return false;			
		}	
	});
	
	
	$('.productItem').hover(function(){
		//$(this).addClass('act');
		$(this).css({'border-color':'silver'});
	},function(){
		$(this).css({'border-color':'#eee'});
		//$(this).removeClass('act');
	});
	$('.productEdit').hover(function(){
		$(this).css({'background-position':'5px -28px','border-color':'silver'});
	},function(){
		$(this).css({'background-position':'5px 4px','border-color':'#eee'});
		
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



	$("a.bigProd").fancybox({	
		hideOnContentClick: true,
  	zoomSpeedIn: 500,
  	zoomSpeedOut:500,		
		overlayShow: false								
	});







	
});
