jQuery(function($){
	/**
	 * Open social network login page on popup window
	 */
	$(document).on('click', '[data-socauth-popup]', function (e) {
		e.preventDefault();

		var link = $(this);
		var popupWindow = {
			href: link.attr('href'),
			title: link.attr('title'),
			width: 500,
			height: 600
		};
		var left = (window.innerWidth / 2) - (popupWindow.width / 2);
		var top = (window.innerHeight / 2) - (popupWindow.height / 2);


		window.open(popupWindow.href, popupWindow.title, 'width=' + popupWindow.width + ',height=' + popupWindow.height + ',left=' + left + ',top=' + top);

	});
});