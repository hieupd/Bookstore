(function($) {
	$.fn.selectUl = function() {
		var config = {
			over: function() {
				if ($(this).parent().children().length > 1) {
					$(this).parent().children('.toolbar-dropdown').children('ul').addClass('over');
				} else {
					$(this).addClass('over');
				}
				$(this).parent().children('.toolbar-dropdown').children('ul').animate({
					opacity: 1,
					height: 'toggle'
				}, 100);
			},
			timeout: 0,
			out: function() {
				var that = this;
				$(this).parent().children('.toolbar-dropdown').children('ul').animate({
					opacity: 0,
					height: 'toggle'
				}, 100, function() {
					if ($(this).parent().children().length > 1) {
						$(that).parent().children('.toolbar-dropdown').children('ul').removeClass('over');
					} else {
						$(that).removeClass('over');
					}
				});
			}
		};
		$('.toolbar-title select').css('display', 'none');
		$('.toolbar-switch .toolbar-dropdown .current, .toolbar-switch .toolbar-dropdown').hoverIntent(config);
	};
	$.fn.insertUl = function() {
		var numOptions = $(this).children().length;
		var divSpan = $(this).toggleClass('toolbar-switch').parent().parent().find('span');
		divSpan.append($(this).parent().children('select').find('option:selected').text());
		var divUl = $(this).toggleClass('toolbar-switch').parent().parent().find('ul');
		for (var i = 0; i < numOptions; i++) {
			var text = '<li><a href ="' + $(this).find('option').eq(i).val() + '">' + $(this).find('option').eq(i).text() + '</a></li>';
			divUl.append(text);
		}
	};
})(jQuery);