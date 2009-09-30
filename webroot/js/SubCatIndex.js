 $(document).ready(function() {
	$('.subCatAdd, .subCategoryAddCancel').click(function(){
		$('.subCategoryAdd').toggle();
		return false;
	});
	
	$('div.submit').click(function(){
		//alert($('#SubCategoryName').val());
		if($('#SubCategoryName').val() == '' ) {
			$('#SubCategoryNameError').text('Это поле должно быть заполнено');
			$('.subCategoryAdd').addClass('error');
			return false;
		}		
	});
	

	
	
	
});
