'use strict';

/**
 * Инит валидации форм
 * @module
 */

// ----------------------------------------
// Imports
// ----------------------------------------

import 'jquery-validation';
import './extend/validate-extend';
import validateHandlers from './validate-handlers';
import validateGetResponse from './validate-get-response';
import Preloader from './Preloader';
import Noty from './noty/noty-extend';

// ----------------------------------------
// Private
// ----------------------------------------

/**
 * @const {Object}
 * @private
 * @sourceCode
 */
const configDefault = {
	ignore: ':hidden, .js-ignore',
	get classes () {
		return {
			error: 'has-error',
			valid: 'is-valid',
			labelError: 'label-error',
			formError: 'form--error',
			formValid: 'form--valid',
			formPending: 'form--pending'
		};
	},
	get errorClass () {
		return this.classes.error;
	},
	get validClass () {
		return this.classes.error;
	},

	/**
	 * Валидировать элементы при потере фокуса.
	 * Или false или функция
	 * @type {Boolean|Function}
	 * @prop {HTMLElement} element
	 * @prop {Event} event
	 * @see {@link https://jqueryvalidation.org/validate/#onfocusout}
	 */
	onfocusout (element) {
		if (element.value.length || element.classList.contains(this.settings.classes.error)) {
			this.element(element);
		}
	},

	/**
	 * Валидировать элементы при keyup.
	 * Или false или функция
	 * @type {Boolean|Function}
	 * @prop {HTMLElement} element
	 * @prop {Event} event
	 * @see {@link https://jqueryvalidation.org/validate/#onkeyup}
	 */
	onkeyup (element) {
		if (element.classList.contains(this.settings.classes.error)) {
			this.element(element);
		}
	},

	/**
	 * Подсветка элементов с ошибками
	 * @param {HTMLElement} element
	 */
	highlight (element) {
		element.classList.remove(this.settings.classes.valid);
		element.classList.add(this.settings.classes.error);
	},

	/**
	 * Удаление подсветки элементов с ошибками
	 * @param {HTMLElement} element
	 */
	unhighlight (element) {
		const doClass = (typeof element.value === 'string' && element.value.length) ? 'add' : 'remove';
		element.classList.remove(this.settings.classes.error);
		element.classList[doClass](this.settings.classes.valid);
	},

	/**
	 * Обработчик сабмита формы
	 * @param {HTMLFormElement} form
	 * @returns {boolean}
	 */
	submitHandler (form) {
		/**
		 * @type {JQuery}
		 */
		const $form = $(form);
		const action = $form.attr('action');

		const preloader = new Preloader($form);

		try {
			/**
			 * @type {JQuery}
			 */
			const actionUrl = $form.attr("data-ajax");
			if (typeof (actionUrl) !== 'string') {
				const noty = new Noty({
					type: 'error',
					text: [
						'Error!',
						'--------------------',
						'ajax обработчик не указан'
					].join('<br>')
				});
				noty.show();
				return false;
			}
			preloader.show();

			const formData = new window.FormData(form);
			formData.append('xhr-lang', document.documentElement.lang || 'ru');

			if (form.id === 'error-throw-form') {
				throw new Error('CATCH Error!');
			}

			let xhr = new window.XMLHttpRequest();
			xhr.open('POST', actionUrl);
			xhr.onreadystatechange = function () {
				if (xhr.readyState === 4) {
					let {status, statusText, response} = xhr;
					preloader.hide();
					// все плохо
					if (status !== 200) {
						const noty = new Noty({
							type: 'error',
							text: [
								'Error!',
								'status: ' + status,
								'--------------------',
								statusText
							].join('<br>')
						});

						console.log(xhr);
						noty.show();
						return false;
					}

					if (typeof response === 'string') {
						response = JSON.parse(response);
					}
					validateGetResponse($form, response, statusText, xhr);
				}
			};

			xhr.send(formData);
			return false;
		} catch (err) {
			preloader.hide();
			const noty = new Noty({
				type: 'error',
				text: 'Catch error, see dev tools!'
			});
			noty.show();
			console.error(err);
		}
	}
};

// ----------------------------------------
// Public
// ----------------------------------------

/**
 * @param {JQuery} $elements
 * @param {ModuleLoader} moduleLoader
 * @sourceCode
 */
function validate ($elements, moduleLoader) {
	$elements.each((i, el) => {
		const $form = $(el);
		if ($form.hasClass('validate-inited') || $form.hasClass("no-js")) {
			return true;
		}

		$form.addClass("validate-inited");

		const config = $.extend(true, {}, configDefault, {
			// current element custom config
		});

		$form.validate(config);
		validateHandlers($form, $form.data('validator'));
	});
}

// ----------------------------------------
// Exports
// ----------------------------------------

export default validate;
