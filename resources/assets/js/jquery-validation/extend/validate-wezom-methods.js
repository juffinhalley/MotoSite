'use strict';

/**
 * Дополнительные методы валидации
 * @module
 */

// ----------------------------------------
// Public
// ----------------------------------------

/**
 * Методы валидации
 * @var {Object} methods
 */
const methods = {
	/**
	 * Валидация email
	 * @param {string} value
	 * @param {HTMLInputElement|HTMLTextAreaElement} element
	 * @param {Object} param
	 * @return {boolean}
	 * @method methods::email
	 * @sourceCode |+4
	 */
	email (value, element) {
		let pattern = /^(([a-zA-Z0-9&+-=_])+((\.([a-zA-Z0-9&+-=_]){1,})+)?){1,64}@([a-zA-Z0-9]([a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?\.)+[a-zA-Z]{2,6}$/;
		return this.optional(element) || pattern.test(value);
	},

	/**
	 * Валидация по паттерну
	 * @param {string} value
	 * @param {HTMLInputElement|HTMLTextAreaElement} element
	 * @param {string|RegExp} param
	 * @return {boolean}
	 * @method methods::pattern
	 * @sourceCode |+9
	 */
	pattern (value, element, param) {
		if (this.optional(element)) {
			return true;
		}
		if (typeof param === 'string') {
			param = new RegExp(`^(?:${param})$`);
		}
		return param.test(value);
	},

	/**
	 * Валидация паролей
	 * @param {string} value
	 * @param {HTMLInputElement} element
	 * @param {Object} param
	 * @return {boolean}
	 * @method methods::password
	 * @sourceCode |+3
	 */
	password (value, element) {
		return this.optional(element) || /^\S.*$/.test(value);
	},

	/**
	 * Проверка общего объема всех файла в KB
	 * @param {string} value
	 * @param {HTMLInputElement} element
	 * @param {Object} param
	 * @return {boolean}
	 * @method methods::filesize
	 * @sourceCode |+7
	 */
	filesize (value, element, param) {
		let kb = 0;
		for (let i = 0; i < element.files.length; i++) {
			kb += element.files[i].size;
		}
		return this.optional(element) || (kb / 1024 <= param);
	},

	/**
	 * Максимальное количество файлов для загрузки
	 * @param {string} value
	 * @param {HTMLInputElement} element
	 * @param {Object} param
	 * @return {boolean}
	 * @method methods::maxupload
	 * @sourceCode |+3
	 */
	maxupload (value, element, param) {
		return element.files.length <= param;
	},

	/**
	 * Проверка объема каждого файла в KB
	 * @param {string} value
	 * @param {HTMLInputElement} element
	 * @param {Object} param
	 * @return {boolean}
	 * @method methods::filesizeeach
	 * @sourceCode |+10
	 */
	filesizeeach (value, element, param) {
		let flag = true;
		for (let i = 0; i < element.files.length; i++) {
			if (element.files[i].size / 1024 > param) {
				flag = false;
				break;
			}
		}
		return this.optional(element) || flag;
	},

	/**
	 * Проверка типа файла по расширению
	 * @param {string} value
	 * @param {HTMLInputElement} element
	 * @param {Object} param
	 * @return {boolean}
	 * @method methods::filetype
	 * @sourceCode |+25
	 */
	filetype (value, element, param) {
		let result;
		let extensions = 'png|jpe?g|gif|svg|doc|pdf|zip|rar|tar|html|swf|txt|xls|docx|xlsx|odt';
		if (element.files.length < 1) {
			return true;
		}

		param = typeof param === 'string' ? param.replace(/,/g, '|') : extensions;
		if (element.multiple) {
			let files = element.files;
			for (let i = 0; i < files.length; i++) {
				let value = files[i].name;
				let valueMatch = value.match(new RegExp('.(' + param + ')$', 'i'));

				result = this.optional(element) || valueMatch;
				if (result === null) {
					break;
				}
			}
		} else {
			let valueMatch = value.match(new RegExp('\\.(' + param + ')$', 'i'));
			result = this.optional(element) || valueMatch;
		}
		return result;
	},

	/**
	 * Проверка валидности одного из указанных элементов
	 * _этот или другой - должен быть валидным_
	 * @param {string} value
	 * @param {HTMLInputElement|HTMLTextAreaElement|HTMLSelectElement} element
	 * @param {Object} param
	 * @return {boolean}
	 * @method methods::or
	 * @sourceCode |+4
	 */
	or (value, element, param) {
		let $module = $(element.form);
		return $module.find(param + ':filled').length;
	},

	/**
	 * Проверка валидности слов (чаще всего используется для имени или фамилии)
	 * @param {string} value
	 * @param {HTMLInputElement|HTMLTextAreaElement} element
	 * @return {boolean}
	 * @method methods::word
	 * @sourceCode |+4
	 */
	word (value, element) {
		let testValue = /^[a-zа-яіїєёґąćęłńóśźżäöüß\'\`\- ]*$/i.test(value); // eslint-disable-line no-useless-escape
		return this.optional(element) || testValue;
	},

	/**
	 * Проверка валидности логинов
	 * @param {string} value
	 * @param {HTMLInputElement|HTMLTextAreaElement} element
	 * @param {Object} param
	 * @return {boolean}
	 * @method methods::login
	 * @sourceCode |+4
	 */
	login (value, element) {
		let testValue = /^[0-9a-zа-яіїєёґąćęłńóśźżäöüß][0-9a-zа-яіїєёґąćęłńóśźżäöüß\-\._]+$/i.test(value); // eslint-disable-line no-useless-escape
		return this.optional(element) || testValue;
	},

	/**
	 * Валидация номера телефона (укр)
	 * @param {string} value
	 * @param {HTMLInputElement|HTMLTextAreaElement} element
	 * @return {boolean}
	 * @method methods::phoneua
	 * @sourceCode |+3
	 */
	phoneua (value, element) {
		function testValue (value) {
			if (/^(\+)?38/.test(value)) {
				return /^(((\+?)(38))\s?)(([0-9]{3})|(\([0-9]{3}\)))(\-|\s)?(([0-9]{3})(\-|\s)?([0-9]{2})(\-|\s)?([0-9]{2})|([0-9]{2})(\-|\s)?([0-9]{2})(\-|\s)?([0-9]{3})|([0-9]{2})(\-|\s)?([0-9]{3})(\-|\s)?([0-9]{2}))$/.test(value); // eslint-disable-line no-useless-escape
			}
			return /^(([0-9]{3})|(\([0-9]{3}\)))(\-|\s)?(([0-9]{3})(\-|\s)?([0-9]{2})(\-|\s)?([0-9]{2})|([0-9]{2})(\-|\s)?([0-9]{2})(\-|\s)?([0-9]{3})|([0-9]{2})(\-|\s)?([0-9]{3})(\-|\s)?([0-9]{2}))$/.test(value); // eslint-disable-line no-useless-escape
		}

		return this.optional(element) || testValue(value);
	},

	/**
	 * Валидация номера телефона (общая)
	 * @param {string} value
	 * @param {HTMLInputElement|HTMLTextAreaElement} element
	 * @param {Object} param
	 * @return {boolean}
	 * @method methods::phone
	 * @sourceCode |+3
	 */
	phone (value, element) {
		return this.optional(element) || /^(((\+?)(\d{1,3}))\s?)?(([0-9]{0,4})|(\([0-9]{3}\)))(\-|\s)?(([0-9]{3})(\-|\s)?([0-9]{2})(\-|\s)?([0-9]{2})|([0-9]{2})(\-|\s)?([0-9]{2})(\-|\s)?([0-9]{3})|([0-9]{2})(\-|\s)?([0-9]{3})(\-|\s)?([0-9]{2}))$/.test(value); // eslint-disable-line no-useless-escape
	},

	/**
	 * Проверки пробелов в значении
	 * @param {string} value
	 * @return {boolean}
	 * @method methods::nospace
	 * @sourceCode |+4
	 */
	nospace (value) {
		let str = String(value).replace(/\s|\t|\r|\n/g, '');
		return str.length > 0;
	},

	/**
	 * Проверки валидности элемента
	 * @param {string} value
	 * @param {HTMLInputElement|HTMLTextAreaElement|HTMLSelectElement} element
	 * @return {boolean}
	 * @method methods::validTrue
	 * @sourceCode |+3
	 */
	validdata (value, element) {
		return $(element).data('valid') === true;
	}
};

// ----------------------------------------
// Exports
// ----------------------------------------

export default methods;
