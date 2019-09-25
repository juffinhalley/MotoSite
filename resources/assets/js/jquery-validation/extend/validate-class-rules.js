'use strict';

/**
 * Расширение автоматической валидации по имени CSS классов
 * @module
 */

// ----------------------------------------
// Public
// ----------------------------------------

/**
 * Список правил для валидации элементов по одному классу
 * Каждое свойство - css класс
 * @type {Object}
 * @sourceCode
 */
const classRules = {
	'validate-as-login': {
		minlength: 2,
		login: true,
		maxlength: 6,
		required: true
	},
	'validate-as-file-images': {
		filetype: 'png|jpe?g|gif|svg',
		// filesizeeach: 500,
		filesize: 500,
		maxupload: 2,
		required: true
	},
	'validate-docs': {
		filetype: 'doc|pdf|zip|rar|docx'
	}
};

// ----------------------------------------
// Exports
// ----------------------------------------

export default classRules;
