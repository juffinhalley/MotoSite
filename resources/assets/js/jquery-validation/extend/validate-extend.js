'use strict';

/**
 * Расширение библиотеки валидации
 * @module
 */

// ----------------------------------------
// Imports
// ----------------------------------------

import classRules from './validate-class-rules';
import wezomMethods from './validate-wezom-methods';

// ----------------------------------------
// Private
// ----------------------------------------

/**
 * Получение имени типа
 * @param {string} type
 * @param {boolean} [multipleFileOrSelect]
 * @return {string}
 * @private
 */
function formGetTypeName (type, multipleFileOrSelect) {
	let typeName;
	switch (type) {
		case 'select-one':
		case 'select-multiple':
			typeName = '_select';
			break;
		case 'radio':
		case 'checkbox':
			typeName = '_checker';
			break;
		case 'file':
			typeName = multipleFileOrSelect ? '_files' : '_file';
			break;
		default:
			typeName = '';
	}
	return typeName;
}

/**
 * Получение сообщения в зависимости от элемента
 * @param {HTMLElement} element
 * @param {string} method
 * @return {string}
 * @private
 */
function formGetMethodMsgName (element, method) {
	let value = element.value;
	let methodName;
	switch (method) {
		case 'required':
		case 'maxlength':
		case 'minlength':
		case 'rangelength':
			methodName = method + formGetTypeName(element.type, element.multiple);
			break;
		case 'password':
			if (/^(\s|\t)*/.test(value)) {
				methodName = method + '_space';
			} else {
				methodName = method;
			}
			break;
		case 'url':
			if (!/^(http(s)?:)?\/\//i.test(value)) {
				methodName = method + '_protocol';
			} else if (!/((?!\/).)\..*$/.test(value)) {
				methodName = method + '_domen';
			} else if (!/\..{2,}$/.test(value)) {
				methodName = method + '_domen-length';
			} else {
				methodName = method;
			}
			break;
		case 'email':
			if (/(@\.|\.$)/.test(value)) {
				methodName = method + '_dot';
			} else if (/@.*(\\|\/)/.test(value)) {
				methodName = method + '_slash';
			} else if (!/@/.test(value)) {
				methodName = method + '_at';
			} else if (/^@/.test(value)) {
				methodName = method + '_at-start';
			} else if (value.split('@').length > 2) {
				methodName = method + '_at-multiple';
			} else if (/@$/.test(value)) {
				methodName = method + '_at-end';
			} else {
				methodName = method;
			}
			break;
		default:
			methodName = method;
	}
	return methodName;
}

// ----------------------------------------
// Public
// ----------------------------------------

/**
 * Объект расширений
 * @const {Object}
 */
const extendConfig = {
	/**
	 * Прототипы плагина
	 * @var {Object} messages
	 * @sourceCode |+30
	 */
	get messages () {
		let translates = (window.jsTranslations && window.jsTranslations['jquery-validation']) || {};
		if (Object.keys(translates).length === 0) {
			return console.warn('Переводы для jquery-validation - отсутствуют!');
		}

		for (let key in translates) {
			let value = translates[key];

			switch (key) {
				case 'maxlength':
				case 'maxlength_checker':
				case 'maxlength_select':
				case 'minlength':
				case 'minlength_checker':
				case 'minlength_select':
				case 'rangelength':
				case 'rangelength_checker':
				case 'rangelength_select':
				case 'range':
				case 'min':
				case 'max':
				case 'filetype':
				case 'filesize':
				case 'filesizeEach':
				case 'pattern':
					translates[key] = $.validator.format(value);
					break;
			}
		}

		return translates;
	},

	/**
	 * Прототипы плагина
	 * @var {Object} prototype
	 */
	prototype: {
		/**
		 * Вывод дефолтных сообщений
		 * @param {Element} element
		 * @param {Object|string} rule
		 * @return {string}
		 * @method prototype::defaultMessage
		 */
		defaultMessage (element, rule) {
			if (typeof rule === 'string') {
				rule = {method: rule};
			}

			let message = this.findDefined(
				this.customMessage(element.name, rule.method),
				this.customDataMessage(element, rule.method),
				!this.settings.ignoreTitle && element.title || undefined, // eslint-disable-line no-mixed-operators
				$.validator.messages[formGetMethodMsgName(element, rule.method)],
				'<strong>Warning: No message defined for ' + element.name + '</strong>'
			);

			let pattern = /\$?\{(\d+)\}/g;

			if (typeof message === 'function') {
				message = message.call(this, rule.parameters, element);
			} else if (pattern.test(message)) {
				message = $.validator.format(message.replace(pattern, '{$1}'), rule.parameters);
			}

			return message;
		}
	},

	/**
	 * Методы валидации
	 * @var {Object} methods
	 */
	methods: wezomMethods
};

for (let key in extendConfig) {
	$.extend($.validator[key], extendConfig[key]);
}

$.validator.addClassRules(classRules);
