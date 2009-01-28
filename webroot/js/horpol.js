
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

	$("div.test1 a").fancybox({	'hideOnContentClick': true,
								'zoomSpeedIn': 0, 'zoomSpeedOut': 0,
								'overlayShow': true,
								'overlayOpacity': 0.9
								});

	// $("p#test2 a").fancybox({ 'hideOnContentClick': true }); 
	 //$("div.test1 a").fancybox({ 'zoomSpeedIn': 500, 'zoomSpeedOut': 800, 'overlayShow': true }); 

}); 
