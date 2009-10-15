
//-----------------------------------------------------------------------------------
$(document).ready(function(){
	$("#selectall").click(selectAll);
});

	function selectAll() {

		var checked = $("#selectall").attr("checked");

		$(".selectable").each(function(){
			var subChecked = $(this).attr("checked");
					if (subChecked != checked) {
						$(this).click();
					}
				});
	}
//------------------------------------------------------------------------------------
$(document).ready(function() {

	$("div.test1 a").fancybox({	
		hideOnContentClic: true,
		zoomSpeedIn: 0,
		zoomSpeedOut: 0,
		overlayShow: true,
		overlayOpacity: 0.9
	});
	
	$("a.bigProd").fancybox({	
		hideOnContentClick: true,
  	zoomSpeedIn: 500,
  	zoomSpeedOut:500,		
		overlayShow: false								
	});								

}); 
