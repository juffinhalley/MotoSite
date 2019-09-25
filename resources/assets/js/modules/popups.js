import 'magnific-popup';
import 'magnific-popup/dist/magnific-popup.css';

if ($('.js-simple-ajax-popup').length) {
	$('.js-simple-ajax-popup').magnificPopup({
		type: 'ajax'
	});
};

if ($('.popup-default').length) {
	$('.popup-default').magnificPopup({
		type: 'inline',
		preloader: false,
		modal: false
	});
	$(document).on('click', '.popup-dismiss', function (e) {
		e.preventDefault();
		$.magnificPopup.close();
	});
	// $(document).on('click', '.popup-modal-dismiss', function (e) {
	// 	e.preventDefault();
	// 	$.magnificPopup.close();
	// });
};
