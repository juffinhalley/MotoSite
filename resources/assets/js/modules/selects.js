"use strict"
import Choices from 'choices.js';
const styles = require('choices.js/assets/styles/css/choices.css');

class ChoiceSelect {
	constructor (entryData) {
		this.el = entryData.el;
		this.search = entryData.el.getAttribute("data-select-search") || false;
		this.prevEl = null;
		this.choiceBlock = null;
		this.multiple = entryData.multiple || this.el.getAttribute("data-select-multiple") || false;
		this.placeholderValue = entryData.el.getAttribute("data-placeholder") || false;

		if (this.placeholderValue) {
			this.placeholder = true;
		} else {
			this.placeholder = false;
		}
		
		if (typeof this.search == "string") {
			if (this.search == "true") {
				this.search = true;
			} else {
				this.search = false;
			}
		}

		this.init();
	}

	init () {
		this.build();

		if (this.el.getAttribute("data-select-tabs")) {
			this.initTabs();
		}

		this.initEvents();
	}

	build () {
		const _this = this;

		if (!_this.multiple) {
			console.log(_this.placeholder);
			console.log(_this.placeholderValue);
			_this.choices = new Choices(_this.el, {
				renderChoiceLimit: -1,
	    		maxItemCount: -1,
	    		searchFloor: 1,
	   			searchResultLimit: 50,
	   			removeItemButton: true,
	   			loadingText: 'Loading...',
			    noResultsText: 'No results found',
			    noChoicesText: 'No choices to choose from',
			    itemSelectText: '',
				editItems: false,
			    duplicateItems: false,
			    delimiter: ',',
			    paste: true,
			    searchEnabled: _this.search,
			    searchChoices: false,
			    placeholder: _this.placeholder,
    			placeholderValue: _this.placeholderValue
			});
		} else {
			_this.choices = new Choices(_this.el, {
				renderChoiceLimit: -1,
	    		maxItemCount: -1,
	    		searchFloor: 1,
	   			searchResultLimit: 50,
	   			removeItemButton: true,
	   			loadingText: '',
			    noResultsText: '',
			    noChoicesText: '',
			    itemSelectText: '',
			    searchChoices: false,
			    placeholder: _this.placeholder,
    			placeholderValue: _this.placeholderValue

			});
		}

		if (!_this.multiple) {
			_this.choices.choiceList.querySelector(".choices__item--selectable[data-value='"+_this.el.value+"']").classList.add("is-selected");
		}
	}

	initEvents () {
		const _this = this;


		if (!_this.multiple) {
			_this.el.addEventListener('choice', function(event) {
				// console.log(event.detail.choice.value);
				// console.log(event.detail);

				// if (_this.prevEl != null) {
				// 	_this.prevEl.classList.remove("is-selected");
				// }
				setTimeout(function() {
					_this.prevEl = document.getElementById(event.detail.choice.elementId);
					_this.prevEl.classList.add("is-selected");
				}, 100);
			}, false);
		}
	}

	initTabs () {
		const _this = this;
		const tabsBlock = document.querySelector("[data-select-tab-block='"+this.el.getAttribute("data-select-tabs")+"']");
		let activeItem = tabsBlock.querySelector("[data-select-tab-item].is-active");

		_this.el.addEventListener('choice', function(event) {
			activeItem.classList.remove("is-active");
			activeItem = tabsBlock.querySelector("[data-select-tab-item='"+event.detail.choice.value+"']");
			activeItem.classList.add("is-active");
		}, false);
	}
}

export default ChoiceSelect;