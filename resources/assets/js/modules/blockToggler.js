'use strict';

class blockToggler {
	constructor (data = {}) {
		this.el = data.el;
		this.button = data.button;
		this.buttonId = this.uniqSmth();
		this.closeButton = data.closeButton || false;
		this.block = data.block;
		this.beforeOpen = data.beforeOpen || null;
		this.afterOpen = data.afterOpen || null;
		this.beforeClose = data.beforeClose || null;
		this.afterClose = data.afterClose || null;
		this.closeOnScroll = data.closeOnScroll;
		this.disableButton = data.disableButton || true;
		this.blockUniqClass = this.uniqSmth();
		this.overlay = data.overlay || false;
		this.overlayCreated = false;
		this.opened = false;
		this.delegate = data.buttonDelegate || false;
		if (this.delegate) {
			this.delegateBlock = data.buttonDelegate.from;
			this.delegateButton = data.buttonDelegate.button;
		}
		this.contentWrapper = document.body;

		this.init();
	}

	init () {
		this.block.classList.add(this.blockUniqClass);

		if (this.button) {
			if (!this.delegate) {
				this.button.setAttribute("data-uniq-id", this.buttonId);
			}

			this.clickInit();

			if (this.closeOnScroll) {
				this.onScrollInit();
			}

			if (this.overlay) {
				this.createOverlay();
			}
		}
	}

	uniqSmth () {
		return 'uniq-class' + (parseInt(performance.now() + (Math.random() * 100)));
	}

	edge () {
		return window.navigator.userAgent.indexOf('Edge') > -1;
	}

	scrollSize () {
		return window.outerWidth - document.body.clientWidth;
	}

	getClosed (el, cls) {
		let searchingEl = document.querySelector(cls);

		while (el != searchingEl) {
		    el = el.parentNode;

		    if (!el) {
		        return null;
		    }
		}

		return el;
	}

	clickInit () {
		const _this = this;

		if (!this.delegate) {
			_this.button.addEventListener('click', function (evt) {
				if (!_this.opened) {
					_this.setActive();
				} else {
					_this.removeActive();
				}
			});
		} else {
			window.delegateMe(this.delegateBlock, this.delegateButton, function(evt){
				if (!_this.opened) {
					_this.setActive();
				} else {
					_this.removeActive();
				}
			});
		}

		if (_this.closeButton) {
			_this.closeButton.addEventListener('click', function (evt) {
				_this.removeActive();
			});
		}

		if (!_this.edge()) {
			if (!this.delegate) {
				document.addEventListener('click', function (evt) {
					let target = evt.target;

					if (_this.el.classList.contains('is-active')) {
						if (_this.getClosed(target, "." + _this.blockUniqClass) == null &&
							!_this.getClosed(target, "[data-uniq-id=" + _this.buttonId + "]") && 
							target != document.querySelector("[data-uniq-id=" + _this.buttonId + "]")) {
							_this.removeActive();
						}
					}
				});
			} else {
				// document.addEventListener('click', function (evt) {
				// 	let target = evt.target;

				// 	console.log(_this.getClosed(target, "."+this.delegateButton));

				// 	if (_this.el.classList.contains('is-active')) {
				// 		if (_this.getClosed(target, "." + _this.blockUniqClass) == null &&
				// 			!_this.getClosed(target, "."+this.delegateButton)) {
				// 			_this.removeActive();
				// 		}
				// 	}
				// });
			}
		}
	}

	onScrollInit () {
		const _this = this;

		window.addEventListener('scroll', function (evt) {
			_this.removeActive();
		});
	}

	setActive () {
		this.opened = true;

		if (this.beforeOpen != null) {
			this.beforeOpen();
		}

		this.el.classList.add('is-active');
		this.block.classList.add('is-active');

		if (this.overlay) {
			this.setOverlay(1);
		}

		if (this.disableButton) {
			if (!this.delegate) {
				this.button.classList.add('is-hidden');
			}
		}

		if (this.afterOpen != null) {
			this.afterOpen();
		}
	}

	setOverlay (status) {
		// 1 - open, 0 close
		let overflow = null;
		let padr = null;

		if (status) {
			overflow = 'hidden';
			padr = this.scrollSize() + "px";

			this.overlayEL.style.transition = "visibility 0s 0s ease, opacity 0.2s 0.01s ease";
			this.overlayEL.style.opacity = "0.5";
			this.overlayEL.style.visibility = "visible";
		} else {
			overflow = 'auto';
			padr = '0';

			this.overlayEL.style.transition = "visibility 0s 0.2s ease, opacity 0.2s 0s ease";
			this.overlayEL.style.opacity = "0";
			this.overlayEL.style.visibility = "hidden";
		}

		this.contentWrapper.style.overflow = overflow;
		this.contentWrapper.style.paddingRight = padr;
	}

	createOverlay () {
		this.overlayEL = document.createElement("div");
		this.overlayEL.classList.add("js-block-toggler-overlay");
		this.overlayEL.style.backgroundColor = "#000";
		this.overlayEL.style.left = "0";
		this.overlayEL.style.top = "0";
		this.overlayEL.style.opacity = "0";
		this.overlayEL.style.visibility = "hidden";
		this.overlayEL.style.position = "absolute";
		this.overlayEL.style.zIndex = "100";
		this.overlayEL.style.width = "100%";
		this.overlayEL.style.height = "100%";

		this.contentWrapper.appendChild(this.overlayEL);
		this.overlayCreated = true;
	}

	removeActive () {
		this.opened = false;
		if (this.beforeClose != null) {
			this.beforeClose();
		}
		this.el.classList.remove('is-active');
		this.block.classList.remove('is-active');
		if (this.overlay) {
			this.setOverlay(0);
		}
		if (this.disableButton) {
			if (!this.delegate) {
				this.button.classList.remove('is-hidden');
			}
		}
		if (this.afterClose != null) {
			this.afterClose();
		}
	}
};

export default blockToggler;
