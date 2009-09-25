$(document).ready(function(){

		$("#sortableList").sortable({

			forcePlaceholderSize: true,
			revert:true,
			axis:'y',
			handle:'.moveCat',
    	update : function () {
    		 
      	var order = $('#sortableList').sortable('serialize');
      	
				$.ajax({
					type: "POST",
					url: path + "/categories/sort",
					data: order,
					success:function(data){
						flashMessage('Позиция изменена','message');	
					},
					error: function(event, request, settings){
						//alert( event.responseText );
						alert( 'Ошибка сервера. Попробуйте еще раз' );
					},
					async: false,
					dataType :"json"				
				});
			}			      	 
  
		});

		
		$("#sortable").disableSelection();

		
		$('.moveCat').hover(function(){
				$(this).addClass('bg');
			},function(){
				$(this).removeClass('bg');
			}
		);


});

 $(document).ready(function() {
     $('.edit').editable('http://www.example.com/save.php');
 });