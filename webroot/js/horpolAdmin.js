
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
$(document).ready( function(){
		var $alert = $('#flashMessage');
		if($alert.length) {
				var alerttimer = window.setTimeout(function () {
					$alert.trigger('click');
				}, 3000);
				$alert.animate({height: $alert.css('line-height') || '50px'}, 2000)
				.click(function () {
					window.clearTimeout(alerttimer);
					$alert.animate({height: '0'}, 200);
					
				});
		}
	
});
//------------------------------------------------------------------------------------
/*
$(document).ready(function() {
	$("div.test1 a").fancybox({	'hideOnContentClick': true,
								'zoomSpeedIn': 0, 'zoomSpeedOut': 0,
								'overlayShow': true,
								'overlayOpacity': 0.9
								});
}); 
*/
