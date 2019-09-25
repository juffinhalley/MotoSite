'use strict';

/**
 * Пользовательские обработчики формы
 * @module
 */

// ----------------------------------------
// Public
// ----------------------------------------

/**
 * @param {JQuery} $form
 * @param {Validator} Validator
 */
function validateHandlers ($form, Validator) {
	// сабмит формы, блок отправки при ошибке скриптов
	const method = $form.attr('method') || 'post';
	$form.prop('method', method);
	$form.on('submit', event => event.preventDefault());

	// сброс формы
	$form.on('reset', () => {
		$form.trigger('before-validator-reset');
		Validator.resetForm();
	});

	// проверка файлов, при смене
	$form.on('change', 'input[type="file"]', function (evt) {
		if (Validator.element(this)) {
			if ($(this).closest(".form-group__item").find("#js-file-name-holder").length) {
				$(this).closest(".form-group__item").find("#js-file-name-holder").html(evt.target.files[0].name);
				$("#remove-file-cross").show(100);
			}
		}

		Validator.element(this);
	});

	$("#remove-file-cross").on("click", function () {
		$("#js-file-name-holder").html($("#js-file-name-holder").attr("data-text"));
		$("#js-fileloader").val("");
		$("#remove-file-cross").hide(300);

		Validator.element($("#js-fileloader"));
	});

	// дальше ваш код
}

// ----------------------------------------
// Exports
// ----------------------------------------

export default validateHandlers;
