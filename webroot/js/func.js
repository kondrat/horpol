function flashMessage(message,class) {	
		$('div.fl').empty();
		$('div.fl').append('<div id="flashMessage" class="'+class+'">'+message+'</div>');
		
				var $alert = $('#flashMessage');
				var alerttimer = window.setTimeout(function () {
					$alert.trigger('click');
				}, 5000);
				$alert.animate({height: $alert.css('line-height') || '52px'}, 800)
				.click(function () {
					window.clearTimeout(alerttimer);
					$alert.animate({height: '0'}, 400);
					$alert.css({'border':'none'});
					
				});
}