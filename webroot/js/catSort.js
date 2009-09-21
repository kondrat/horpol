$(document).ready(function(){

		$("#sortableList").sortable({

			forcePlaceholderSize: true,
			revert:true,
			axis:'y',
			handle:'.moveCat',
    	update : function () {
    		 
      	var order = $('#sortableList').sortable('serialize');
      	
				$.post(
					path + "/categories/sort",
					order,
							function(data){
								$('#infoSort').html(data.hi);
							},
							"json"
				);
						      	 
    	} 
		});

		
		$("#sortable").disableSelection();

		
		$('.moveCat').hover(function(){
			$(this).toggleClass('bg');
		},function(){
			$(this).toggleClass('bg');
		}
		);


});