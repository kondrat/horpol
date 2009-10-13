 $(document).ready(function() {

	var origText = '';
	
	$('.edit_body').click(function(){
		var id = parseInt($(this).attr('id'));
		origText = $(this).html();
		$('#mmm').append('<div style="margin:150px 330px; auto;width:740px;height:400px"><img src="'+path +'img/icons/ajax-loader2.gif"></div>');
		$(this).html('');
		$('#ttt').load( 
			path + "static_pages/pagesEditBody",
			{ 'data[StaticPage][id]': id },
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


	$('#pagesBodyEdit').click(function(){
		$('.edit_body').trigger('click');
	});
	




 });
