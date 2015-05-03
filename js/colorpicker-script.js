(function($) {
	jQuery(document).ready(function ($) {    
		$('#modal_portfolio_colorOverlay').iris({
			hide:true,
			border:true,
			width:300,
			palettes:true
		});  
		$(document).click(function (e) {
			if (!$(e.target).is("#modal_portfolio_colorOverlay, .iris-picker, .iris-picker-inner")) {
				$('#modal_portfolio_colorOverlay').iris('hide');
			}
		});
		$('#modal_portfolio_colorOverlay').click(function (event) {
			$('#modal_portfolio_colorOverlay').iris('hide');
			$(this).iris('show');
		});
	});
})(jQuery);