"use strict"
import Swiper from 'swiper';
const swiperCss = require('swiper/dist/css/swiper.min.css');

export default class Slider {
	constructor (entryData) {
		this.config = entryData.swiperConfig;
		this.itemWrapper = entryData.item;
		this.item = this.itemWrapper.querySelector('.swiper-container');
		this.arrows = entryData.arrows || false;
		this.arrowsHidden = false;
		this.sliderInited = false;
		this.extResp = entryData.extResp || false;
		this.elements = this.itemWrapper.querySelectorAll('.swiper-slide');
		this.leftArrow = this.itemWrapper.querySelector('[data-arrow="left"]');
		this.rightArrow = this.itemWrapper.querySelector('[data-arrow="right"]');

		this.init();
	}

	init () {
		const _this = this;

		if (_this.config.slidesPerView === 'auto') {
			_this.calcSlides();
		}

		_this.expandConfing();
		_this.appendArrows();

		if (_this.extResp) {
			_this.noSliderHandler();
		} else {
			_this.buildSlider();
		}

		_this.resizeHandler();
	}

	calcSlides () {
		const _this = this;
		let slides = _this.item.querySelectorAll('.swiper-slide');

		for (var i = 0; i < slides.length; i++) {
			let slide = slides[i].children[0];
			let width = slide.clientWidth;
			let mgr = slide.style.marginRight;

			slide.parentNode.style.width = width + 'px';
			slide.parentNode.style.marginRight = mgr + 'px';
		}
	}

	noSliderHandler () {
		const _this = this;
		let elementsWidth = 0;

		for (var i = 0; i < _this.elements.length; i++) {
			let el = _this.elements[i];
			
			el.style.width = '100%';
			el.style.width = el.children.clientWidth;
			elementsWidth += el.clientWidth;
		}

		if (elementsWidth >= _this.itemWrapper.width()) {
			_this.buildSlider();
		} else {
			_this.destroySlider();
		}
	}

	destroySlider () {
		const _this = this;

		if (_this.sliderInited) {
			_this.slider.destroy(true, true);
			_this.sliderInited = false;
		}
		_this.hideArrows();

		_this.item.classList.add('swiper-regular-container');
		_this.item.classList.remove('is-inited');
	}

	buildSlider () {
		const _this = this;

		_this.item.classList.add('is-inited');
		_this.item.classList.remove('swiper-regular-container');

		if (_this.arrowsHidden) {
			_this.showArrows();
		}

		_this.createSlider();
		_this.sliderInited = true;
	}

	expandConfing () {
		const _this = this;

		if (_this.arrows) {
			_this.config.navigation = {};
			_this.config.navigation.nextEl = _this.rightArrow;
			_this.config.navigation.prevEl = _this.leftArrow;
		}
	}

	createSlider () {
		const _this = this;

		_this.slider = new Swiper(_this.item, _this.config);
	}

	resizer () {
		if (this.extResp) {
			this.noSliderHandler();
		}

		if (this.config.slidesPerView === 'auto') {
			this.calcSlides();
		}
	}

	resizeHandler () {
		const _this = this;
		let sliderTimeout = null;

		window.addEventListener('resize', function () {
			clearInterval(sliderTimeout);

			sliderTimeout = setTimeout(function () {
				_this.resizer();
			}, 300);
		});
	}

	hideArrows () {
		// this.leftArrow.hide(300);
		// this.rightArrow.hide(300);
		this.arrowsHidden = true;
	}

	showArrows () {
		// this.leftArrow.show(300);
		// this.rightArrow.show(300);
		this.arrowsHidden = false;
	}

	appendArrows () {
		if (this.arrows) {
			this.leftArrow.innerHTML = this.itemWrapper.getAttribute('data-left-arrow');
			this.rightArrow.innerHTML = this.itemWrapper.getAttribute('data-right-arrow');
		}
	}
}
