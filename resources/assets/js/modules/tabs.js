"use strict"
export default class Tabs {
	constructor (entryData) {
		this.block = entryData.el;
		this.buttons = this.block.querySelectorAll("[data-tabs-button]");
		this.containers = this.block.querySelectorAll("[data-tabs-container]");
		this.active = {
			button: this.block.querySelector("[data-tabs-button].is-active"),
			container: this.block.querySelector("[data-tabs-container].is-active")
		};
		this.tabs = [];

		this.init();
	}

	init () {
		const _this = this;

		class Connect {
			constructor (button, container) {
				button.addEventListener("click", function(){

					_this.active.button.classList.remove("is-active");
					_this.active.container.classList.remove("is-active");

					button.classList.toggle("is-active");
					container.classList.toggle("is-active");

					_this.active.button = button;
					_this.active.container = container;


					if (container.querySelector(".swiper-container")) {
						const mySlider = container.querySelector(".swiper-container");
						mySlider.swiper.update();
					}
				});
			}
		}

		for (var i = 0; i < this.buttons.length; i++) {
			let button = this.buttons[i];
			let block = this.block.querySelector('[data-tabs-container="'+button.getAttribute("data-tabs-button")+'"]');

 			this.tabs.push(new Connect(button, block));
		}
	}
}
