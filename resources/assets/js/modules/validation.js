"use strict"
import validator from 'validator';

class ValidationEl {
	constructor () {

	}
}

class Form {
	constructor (el) {
		this.formEl = el;

		this.init();
	}

	getElements () {
		const inputs = this.formEl.querySelectorAll("input");
		const textareas = this.formEl.querySelectorAll("textarea");

		let els = [];

		inputs.forEach(function(el){
			els.push(el);
		});

		textareas.forEach(function(el){
			els.push(el);
		});

		return els;
	}

	rules () {
		return rules = [
			// alphaNum =
		]
	}

	init () {
		this.formElements = this.getElements();
		// validator.isAlphanumeric
		this.formEl.formInited = true;
	}
}

const translates = [];

const config = {
	formClass: ".js-form",
	translates: translates
}


// init
export default function () {
	const forms = document.querySelectorAll(config.formClass);

	forms.forEach(function(el, i) {
		console.log(el);
		
		if (!el.formInited && !el.classList.contains("no-js")) {
			new Form(el);
		}
	})
}
