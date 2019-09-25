'use strict';
// ----------------------------------------
// Imports
// ----------------------------------------

import 'jquery.mmenu/dist/jquery.mmenu.all.css';
import mmenu from 'jquery.mmenu';

// ----------------------------------------
// Private
// ----------------------------------------

var burger;
var menu;
var api;
var header;

console.log(mmenu);

var lngsBuffer = $('.mmenu-left-panel__top').html().split('<a');
var lngsMenu = [];

for (var ink = 0; ink <= lngsBuffer.length - 1; ink++) {
	if (ink === 0) {

	} else {
		lngsBuffer[ink] = '<a' + lngsBuffer[ink];
		lngsMenu.push(lngsBuffer[ink]);
	}
}

var socsBuffer = $('.mmenu-left-panel__botton').html().split('<a');
var socsMenu = [];

for (var i = 0; i <= socsBuffer.length - 1; i++) {
	if (i === 0) {

	} else {
		socsBuffer[i] = '<a' + socsBuffer[i];
		socsMenu.push(socsBuffer[i]);
	}
}

var init = () => {
	var config = {
		navbar: {
			title: menu.attr('data-menu-start-title')
		},
		'extensions': [
			'pagedim-black',
			'position-right',
			// "tileview",
			// "listview-justify",
			'fx-menu-slide',
			'fx-listitems-slide'
		],
		'iconbar': {
			'add': true,
			'top': lngsMenu,
			'bottom': socsMenu
		},
		navbars: [
			{
				'position': 'bottom',
				'content': [
					$('.mmenu-bottom-block').eq(2).html()
				]
			},
			{
				'position': 'bottom',
				'content': [
					$('.mmenu-bottom-block').eq(1).html()
				]
			},
			{
				'position': 'bottom',
				'content': [
					$('.mmenu-bottom-block').eq(0).html()
				]
			}
		],
		'slidingSubmenus': true
	};

	menu.mmenu(config);
	api = menu.data('mmenu');

	api.bind('close:finish', function (event) {
		$('body').css('height', '100%');
		burger.removeClass('is-active');
		$('html').css('overflow', 'visible');
		header.css('top', '0');
	});

	api.bind('open:before', function (event) {
		burger.addClass('is-active');
		$('body').css('height', 'initial');
		$('html').css('overflow', 'hidden');
		header.css('top', $(window).scrollTop() + 'px');
	});
};

// ----------------------------------------
// Public
// ----------------------------------------

const publicData = {
	init: function (data = {}) {
		burger = data.burger || $('#js-burger');
		menu = data.menu || $('#js-mmenu');
		header = data.header || $('#js-header');

		init();

		return this;
	},

	getElements: () => {
		return {
			burger: burger,
			menu: menu
		};
	}
};

export default publicData;
