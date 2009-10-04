 $(document).ready(function() {
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
		$('.act a').css({'background-color':'#ccc'});
	},function(){
		$('.act a').css({'background-color':'#fff'});
		$(this).removeClass('act');
	});
	

	$('.productAdd, .productAddCancel').click(function(){
		$('.productItemAdd').toggle();
		return false;
	});

	$("#ProductAddProductForm").ajaxForm({
		url: path+'/products/addProduct',	
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
										'<img alt="newOn" src="/horpol/img/catalog/'+data.img+'"/></a>'+
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
		$(this).css({'border-color':'#000'});
	},function(){
		$(this).css({'border-color':'silver'});
		//$(this).removeClass('act');
	});
	$('.productEdit').hover(function(){
		$(this).css({'background-position':'5px -28px','border-color':'silver'});
	},function(){
		$(this).css({'background-position':'5px 4px','border-color':'#eee'});
		
	});


	$("#selectall").click(function(){
		$(".selectable").each(function(){
				$(this).click();
		});	
	});
	
});
