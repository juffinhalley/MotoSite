'use strict';

/**
 * Обработка ответа от сервера
 * @module
 */

// ----------------------------------------
// Imports
// ----------------------------------------

import Noty from './noty/noty-extend';

// ----------------------------------------
// Private
// ----------------------------------------

/**
 * Вывод уведомлений
 * @param {JQuery} $form
 * @param {string} message
 * @param {boolean} [success]
 * @private
 */
function showMessage ($form, message, success) {
	const noty = new Noty({
		type: success ? 'info' : 'error',
		text: message
	});
	noty.show();

	if (success && $.magnificPopup && $.magnificPopup.instance.isOpen) {
		$.magnificPopup.close();
	}
};

// ----------------------------------------
// Public
// ----------------------------------------

/**
 * @param {JQuery} $form
 * @param {Object} response
 * @param {string} statusText
 * @param {Object} xhr
 * @param {string} response.response - текстовое сообщение
 * @param {boolean} response.success - успешный запрос
 * @param {string} [response.redirect] - урл для редиректа, если равен текущему урлу - перегражаем страницу
 * @param {boolean} [response.reload] - перегрузить страницу
 * @param {boolean} [response.reset] - сбросить форму
 * @param {Array} [response.clear] - сбросить форму
 * @private
 */
function validateGetResponse ($form, response, statusText, xhr) {
	// обрабатываем ответ
	// ------------------
	if (typeof response === 'string') {
		response = JSON.parse(response);
	}

	if (response.reload || window.location.href === response.redirect) {
		return window.location.reload();
	}

	if (response.redirect) {
		return (window.location.href = response.redirect);
	}

	if (response.success) {
		if (response.clear) {
			if (Array.isArray(response.clear)) {
				response.clear.forEach(clearSelector => {
					$form.find(clearSelector).val('');
				});

				if ($("#js-file-name-holder").length) {
					$("#js-file-name-holder").html($("#js-file-name-holder").attr("data-text"));
					$("#remove-file-cross").hide(300);
				}
			} else {
				// игнорируемые типы инпутов
				let ignoredInputsType = [
					'submit',
					'reset',
					'button',
					'image'
				];
				$form.find('input, textarea, select').each((i, element) => {
					if (~ignoredInputsType.indexOf(element.type)) {
						return true;
					}
					element.value = '';
				});
			}
		} else if (response.reset) {
			$form.trigger('reset');
		}
	}
	showMessage($form, response.response, response.success);
}

// ----------------------------------------
// Exports
// ----------------------------------------

export default validateGetResponse;
