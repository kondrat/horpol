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

		$("#SubCategoryAddForm").ajaxForm({
			url: path+'/products/addProduct',	
			dataType:  'json',			
			success: 
					function(data) {
							//console.log(data);
							
							if( data.img != null) {
								flashMessage('Изменения сохранены','message');
								//$('.brandShadow').hide().attr('src',path+"/img/catalog/"+data.img).fadeIn();
								//$('.brandFrom').hide();
							} else if (data.error != null) {
								flashMessage('Изменения не были сохранены','er');
								//$('.brandShadow').hide().attr('src',oldImg).fadeIn();
								//$('.brandFormError').html('<div class="error">'+data.error+'</div>');
								//alert(data.error);
								console.log(data.error);
							}
							
											
					},
			
			resetForm: true
				
		});

	
	
});
