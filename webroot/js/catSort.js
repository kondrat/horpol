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
					success:function(data){$('#infoSort').html(data.hi);},
					error: function(event, request, settings){alert( event.responseText );},
					async: false,
					dataType :"json"				
				});
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

 $(document).ready(function() {
     $('.edit').editable('http://www.example.com/save.php');
 });