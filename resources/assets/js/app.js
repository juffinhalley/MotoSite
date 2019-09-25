
"use strict"

import BlockToggler from './modules/blockToggler';
import axios from 'axios';
import Ripple from './modules/ripple';
import animations from './modules/animations';
import Slider from './modules/sliders';
import Tabs from './modules/tabs';
import ChoiceSelect from './modules/selects';
import GSAP from 'gsap';
import $ from "jquery";
import 'magnific-popup';
import 'magnific-popup/dist/magnific-popup.css';

import '../svg/parsed/motosite_logo.svg';
import '../svg/parsed/secret.svg';
import '../svg/parsed/comment.svg';
import '../svg/parsed/bell.svg';
import '../svg/parsed/cog.svg';
import '../svg/parsed/cake.svg';
import '../svg/parsed/dots.svg';
import '../svg/parsed/search.svg';
import '../svg/parsed/miniArrow.svg';
import '../svg/parsed/vmLogo.svg';
import '../svg/parsed/announs.svg';
import '../svg/parsed/battle.svg';
import '../svg/parsed/callendar.svg';
import '../svg/parsed/camera.svg';
import '../svg/parsed/feeds.svg';
import '../svg/parsed/helmet.svg';
import '../svg/parsed/star.svg';
import '../svg/parsed/users.svg';
import '../svg/parsed/video.svg';
import '../svg/parsed/arrowLeft.svg';
import '../svg/parsed/arrowRight.svg';
import '../svg/parsed/marker.svg';
import '../svg/parsed/plus.svg';
import '../svg/parsed/trophy.svg';
import '../svg/parsed/info.svg';
import '../svg/parsed/eye.svg';
import '../svg/parsed/heart.svg';
import '../svg/parsed/pen.svg';
import '../svg/parsed/cross.svg';
import '../svg/parsed/play.svg';
import '../svg/parsed/mail.svg';
import '../svg/parsed/lplus.svg';
import '../svg/parsed/disclaimer.svg';
import '../svg/parsed/like.svg';
import '../svg/parsed/expand.svg';
import '../svg/parsed/arrowBottom.svg';
import '../svg/parsed/arrowTop.svg';
import '../svg/parsed/question.svg';
import '../svg/parsed/okay.svg';
import '../svg/parsed/shose.svg';
import '../svg/parsed/spacer-arrows.svg';
import '../svg/parsed/moto.svg';
import '../svg/parsed/arrowFullRight.svg';
import '../svg/parsed/callendar2.svg';
import '../svg/parsed/photoAdd.svg';
import '../svg/parsed/starRound.svg';
import '../svg/parsed/crestRound.svg';
import '../svg/parsed/smVideo.svg';
import '../svg/parsed/questionEmpty.svg';
import '../svg/parsed/needMoreIcons.svg';
import '../svg/parsed/user.svg';
import '../svg/parsed/minus.svg';
import '../svg/parsed/chart.svg';

import Echo from 'laravel-echo'

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    encrypted: true
});

window.GSAP = GSAP;
window.$ = $;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

if (!window.siteManager) {
	window.siteManager = {};
}

if (document.querySelector("[data-vue-app]")) {
	import("vue").then((module) => {
		const Vue = module;

		Vue.use(require('vue-chat-scroll'));

		Vue.component('message', require('./components/message.vue'))

		const dialogueChat = new Vue({
			el: '#chatbox1-app',

			data () {
				return {
					message: '',
					chat: [],
					typing: '',
					anotherUser: true
				}
			},

			watch: {
				message(){
					window.Echo.private('dialogue')
						.whisper('typing', {
							name: this.message
						});
				}
			},

			methods: {
				send () {
					if (this.message.length) {
						this.chat.push({
							message: this.message,
							from: 'user'
						});

						let message = this.message;
						this.message = '';

						axios({
							method: 'post',
							url: '/send',
							data: {
								message: message
							},
							headers: {
								'X-Socket-Id': window.Echo.socketId(),
							}
						})
						.then((response) => {
						})
						.catch((error) => {
							console.log(error);
						});
					}
				},

				chatListener () {
					window.Echo.private('dialogue')
						.listen('DialogueEvent', (evt) => {
							this.chat.push({
								message: evt.message,
								from: evt.user.name,
								userImage: evt.userImage
							});
						})
						.listenForWhisper('typing', (evt) => {
							if (evt.name != '') {
								this.typing = true;
							}else{
								this.typing = false;
							}
						});

					window.Echo.join(`dialogue`)
						.here((users) => {
							if (users.length >= 2) {
								this.anotherUser = true;
							}
						})
						.joining((user) => {
							this.anotherUser = true;
						})
						.leaving((user) => {
							this.anotherUser = false;
						});
				},

				getOldChat () {
					axios.post('/getOldMessages')
						.then(response => {
							if (response.data != '') {
								this.chat = response.data;
							}
						})
						.catch(error => {
							console.log(error);
						});
				}
			},

			mounted () {
				this.getOldChat();
				this.chatListener();
			}
		});

		// if (document.querySelector("#chatbox1-app")) {
		// 	const dialogueChat = new Vue({
		// 		el: '#chatbox1-app',
		// 		render: h => h(require('./components/dialogue-chat.vue'))
		// 	});
		// }
	});
}

const siteManager = window.siteManager;

siteManager.ajax = axios;

window.onload = function(){
	document.documentElement.classList.remove("page-preloading");

	var links = document.querySelectorAll("a");

	for (var i = 0; i < links.length; i++) {
		links[i].addEventListener("click", function(evt) {
			if (this.getAttribute("target") != "_blank") {
				evt.preventDefault();

				let newHref = this.getAttribute("href");
				document.documentElement.classList.add("page-preloading");

				setTimeout(() => {
					window.location.href = newHref;
				}, 300);
			}
		});
	}

	import('./jquery-validation/validate-init').then((module) => {
		window.siteManager.validate = module.default;

		window.siteManager.validate($("form"));
	});

	window.delegateMe = function(block, itemClass, callback){
	    block.addEventListener('click', function (evt) {
	        var el = evt.target

	        if (el.classList.contains(itemClass)) {
	            callback(el);
	            return this;
	        } else {
	            while (el && !el.classList.contains(itemClass) && el != block) {
	               el = el.parentNode;
	            }
	            if (el != block) {
	                callback(el);
	                return this;
	            }
	        }
	    });
	}

	//////////////////////////////////////
	// Define elements
	//////////////////////////////////////

	const header = document.getElementById("js-header");
	const burger = document.getElementById("js-burger");

	//////////////////////////////////////
	// Init Modules
	//////////////////////////////////////

	if (document.getElementById("js-user-video-container")) {
		window.delegateMe(document.getElementById("js-user-video-container"), "js-user-video-remove", function(evt){
			const el = evt.closest("[data-video-id]");
			const profileBlock = el.closest("[data-user-id]");
			const params = {};

			params.videoId = el.getAttribute("data-video-id");
			params.userId = profileBlock.getAttribute("data-user-id");

			axios.get("./modules/ajax/RemoveVideo.php", {
				params: params
			})
			.then(function (response) {
				animations.remove({
					el: el,
					duration: 0.3
				});
			})
			.catch(function (error) {
				console.log(error);
			});
		});
	}

	if (document.querySelector('.js-previewer-trigger')) {
		var btns = document.querySelectorAll('.js-previewer-trigger');

		btns.forEach((btn) => {
			btn.addEventListener('click', function (evt) {
				document.querySelector('#js-selo-previewer-list').classList.toggle('is-active');
			});
		})
	}

	if (document.getElementById("js-user-photo-container")) {
		window.delegateMe(document.getElementById("js-user-photo-container"), "js-user-photo-remove", function(evt){
			const el = evt.closest("[data-photo-id]");
			const profileBlock = el.closest("[data-user-id]");
			const params = {};

			params.photoId = el.getAttribute("data-photo-id");
			params.userId = profileBlock.getAttribute("data-user-id");

			axios.get("./modules/ajax/RemoveVideo.php", {
				params: params
			})
			.then(function (response) {
				animations.remove({
					el: el,
					duration: 0.3
				});
			})
			.catch(function (error) {
				console.log(error);
			});
		});
	}

	if (document.getElementById("js-user-albom-container")) {
		window.delegateMe(document.getElementById("js-user-albom-container"), "js-user-albom-remove", function(evt){
			const el = evt.closest("[data-albom-id]");
			const profileBlock = el.closest("[data-user-id]");
			const params = {};

			params.albomId = el.getAttribute("data-albom-id");
			params.userId = profileBlock.getAttribute("data-user-id");

			axios.get("./modules/ajax/RemoveAlbom.php", {
				params: params
			})
			.then(function (response) {
				animations.remove({
					el: el,
					duration: 0.3
				});
			})
			.catch(function (error) {
				console.log(error);
			});
		});
	}

	if (document.getElementById("js-user-edit-block")) {
		siteManager.search = new BlockToggler({
			el: document.getElementById('js-user-edit-block'),
			button: document.getElementById('js-user-edit-button'),
			closeButton: document.getElementById('js-user-edit-close'),
			block: document.getElementById('js-user-edit-block'),
			closeOnScroll: false,
			overlay: false,
			disableButton: false,
			afterOpen: function () {
			},
			beforeClose: function () {
			}
		});
	}

	if (document.getElementById("js-user-video-block")) {
		siteManager.search = new BlockToggler({
			el: document.getElementById('js-user-video-block'),
			button: document.getElementById('js-user-video-button'),
			closeButton: document.getElementById('js-user-video-close'),
			block: document.getElementById('js-user-video-block'),
			closeOnScroll: false,
			overlay: false,
			disableButton: false,
			afterOpen: function () {
			},
			beforeClose: function () {
			}
		});
	}

	if (document.getElementById("js-user-video-block-edit")) {
		siteManager.search = new BlockToggler({
			el: document.getElementById('js-user-video-block-edit'),
			closeButton: document.getElementById('js-user-video-edit-close'),
			block: document.getElementById('js-user-video-block-edit'),
			closeOnScroll: false,
			overlay: false,
			disableButton: false,
			buttonDelegate: {
				from: document.getElementById("js-user-video-container"),
				button: "js-user-video-edit"
			},
			afterOpen: function () {
			},
			beforeClose: function () {
			}
		});
	}

	if (document.getElementById("js-user-photo-block-edit")) {
		siteManager.search = new BlockToggler({
			el: document.getElementById('js-user-photo-block-edit'),
			closeButton: document.getElementById('js-user-photo-edit-close'),
			block: document.getElementById('js-user-photo-block-edit'),
			closeOnScroll: false,
			overlay: false,
			disableButton: false,
			buttonDelegate: {
				from: document.getElementById("js-user-photo-container"),
				button: "js-user-photo-edit"
			},
			afterOpen: function () {
			},
			beforeClose: function () {
			}
		});
	}

	if (document.querySelector('.main-menu-block')) {
		siteManager.mobileMenu = new BlockToggler({
			el: document.querySelector('.main-menu-block'),
			button: document.getElementById('js-burger'),
			closeButton: document.getElementById("js-close-burger-menu-button"),
			block: document.querySelector('.main-menu-block'),
			closeOnScroll: false,
			overlay: true,
			disableButton: false,
			beforeOpen: function () {
			},
			afterOpen: function () {
			},
			beforeClose: function () {
			},
			afterClose: function () {
			}
		});
	}

	siteManager.profileMenu = new BlockToggler({
		el: document.getElementById('js-profile-menu'),
		button: document.getElementById('js-profile-button'),
		block: document.getElementById('js-profile-block'),
		closeOnScroll: true,
		overlay: false,
		disableButton: false,
		afterOpen: function () {
			header.classList.add("is-changed");
		},
		beforeClose: function () {
			header.classList.remove("is-changed");
		}
	});

	if (document.querySelector(".js-regular-block-toggler")) {
		var blocks = document.querySelectorAll(".js-regular-block-toggler");

		for (var i = 0; i < blocks.length; i++) {
			var closeButton = document.querySelector(".js-regular-block-toggler-close[data-toggler-id='" + blocks[i].getAttribute("data-toggler-id") + "']");
			var openButton = document.querySelector(".js-regular-block-toggler-button[data-toggler-id='" + blocks[i].getAttribute("data-toggler-id") + "']");

			new BlockToggler({
				el: blocks[i],
				button: openButton,
				closeButton: closeButton,
				block: blocks[i],
				closeOnScroll: false,
				overlay: false,
				disableButton: false,
				beforeOpen: function () {
				},
				afterOpen: function () {
				},
				beforeClose: function () {
				},
				afterClose: function () {
				}
			});
		}
	}

	if (document.getElementById("js-map-conformations")) {
		var blocks = document.querySelectorAll(".js-map-conf-block");

		var prevButton = document.querySelector(".is-hidden.js-map-conf-button");
		var prevBlock = document.querySelector(".js-map-conf-block.is-active");

		for (var i = 0; i < blocks.length; i++) {
			var openButton = document.querySelector(".js-map-conf-button[data-toggler-id='" + blocks[i].getAttribute("data-toggler-id") + "']");

			new BlockToggler({
				el: blocks[i],
				button: openButton,
				closeButton: "",
				block: document.getElementById("js-map-conformations"),
				closeOnScroll: false,
				overlay: false,
				disableButton: false,
				afterOpen: function () {
					prevButton = this.button;
					prevBlock = this.el;
				},
				beforeOpen: function () {
					prevButton.classList.remove("is-hidden");
					prevBlock.classList.remove("is-active");
				}
			});
		}
	}

	if (document.querySelector(".js-add-more-inputs")) {
		var elements = document.querySelectorAll(".js-add-more-inputs");

		class MoreInput {
			constructor (block) {
				var _this = this;
				this.block = block;
				this.input = this.block.querySelector(".js-more-input");
				this.button = this.block.querySelector(".js-add-more-inputs-button");
				this.index = 0;

				this.button.addEventListener("click", function () {
					var newInput = _this.input.cloneNode();

					_this.input.classList.remove("js-more-input");
					_this.input.style.marginBottom = "16px";

					newInput.id = newInput.id + _this.index;
					newInput.name = newInput.name + _this.index;

					_this.index++;

					_this.block.appendChild(newInput);

					_this.input = _this.block.querySelector(".js-more-input");
				});
			}
		}

		for (var i = 0; i < elements.length; i++) {
			new MoreInput(elements[i]);
		}
	}

	if (document.getElementById('js-search-block')) {
		siteManager.search = new BlockToggler({
			el: document.getElementById('js-search-block'),
			button: document.getElementById('js-show-search-button'),
			block: document.getElementById('js-search-content'),
			closeButton: document.getElementById("js-search-close"),
			closeOnScroll: false,
			overlay: true,
			disableButton: false,
			afterOpen: function () {
			},
			beforeClose: function () {
			}
		});
	}

	if (document.querySelector('.js-choice-select')) {
		const selects = document.querySelectorAll('.js-choice-select');

		for (var i = 0; i < selects.length; i++) {
			let choiceType = selects[i].getAttribute("data-custom-choice");

			if (!choiceType) {
				new ChoiceSelect({
					el: selects[i]
				});
			} else {
				if (choiceType == "photovideo") {
					new ChoiceSelect({
						el: selects[i]
					});
				}

				if (choiceType == "multiple") {
					if (selects[i].getAttribute("data-map-places")) {
						siteManager.mapChanger = {};
						siteManager.mapChanger.el = selects[i];
						siteManager.mapChanger.class = new ChoiceSelect({
							el: selects[i],
							multiple: true
						});
					} else {
						new ChoiceSelect({
							el: selects[i],
							multiple: true
						});
					}
				}
			}
		}
	}

	if (document.querySelector('[data-tabs]')) {
		new Tabs({
			el: document.querySelector('[data-tabs]')
		});
	}

	if (document.querySelector('[data-slider]')) {
		const sliders = document.querySelectorAll('[data-slider]');
		siteManager.sliders = {};

		for (var i = 0; i < sliders.length; i++) {
				let newSlider = null;
				let _this = sliders[i];
				let sliderName = sliders[i].getAttribute("data-slider");

				if (sliderName == "announces") {
					newSlider = new Slider({
						item: _this,
					    arrows: true,
					    resizeHalper: true,
						swiperConfig: {
						    speed: 600,
						    loop: false,
						    slidesPerView: 1,
				    		spaceBetween: 20
						}
					});
				}

				if (sliderName == "battles") {
					newSlider = new Slider({
						item: _this,
					    arrows: true,
					    resizeHalper: true,
						swiperConfig: {
						    speed: 600,
						    loop: false,
						    slidesPerView: 1,
				    		spaceBetween: 4
						}
					});
				}

				if (sliderName == "miniSlider") {
					newSlider = new Slider({
						item: _this,
					    arrows: true,
					    resizeHalper: true,
						swiperConfig: {
						    speed: 600,
						    loop: true,
							slidesPerView: "auto",
				    		spaceBetween: 30,
				    		breakpoints: {
							    1280: {
							    	spaceBetween: 15
							    },
							    1023: {
							    	spaceBetween: 15
							    }
							}
						}
					});
				}

				if (sliderName == "itemSlider") {
					newSlider = new Slider({
						item: _this,
					    arrows: true,
					    resizeHalper: true,
						swiperConfig: {
						    speed: 600,
						    loop: true,
							slidesPerView: "auto",
						    slidesPerView: 1,
				    		spaceBetween: 0
						}
					});
				}

				if (sliderName == "triple") {
					newSlider = new Slider({
						item: _this,
					    arrows: true,
					    resizeHalper: true,
						swiperConfig: {
						    speed: 600,
						    loop: false,
							slidesPerView: "auto",
				    		spaceBetween: 30,
				    		breakpoints: {
							    1280: {
							    	spaceBetween: 45
							    },
							    1025: {
							    	spaceBetween: 15
							    }
							}
						}
					});
				}

				if (sliderName == "tripleMoto") {
					newSlider = new Slider({
						item: _this,
					    arrows: true,
					    resizeHalper: true,
						swiperConfig: {
						    speed: 600,
						    loop: false,
							slidesPerView: "auto",
				    		spaceBetween: 20,
				    		breakpoints: {
							    1280: {
							    	spaceBetween: 30
							    },
							    1025: {
							    	spaceBetween: 10
							    }
							}
						}
					});
				}

        if (sliderName == "siteTop") {
          newSlider = new Slider({
            item: _this,
              arrows: false,
              resizeHalper: true,
            swiperConfig: {
                speed: 600,
                loop: false,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                slidesPerView: 3,
                spaceBetween: 30,
                breakpoints: {
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 5
                    },
                    480: {
                        slidesPerView: 1,
                        spaceBetween: 10
                    },
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 10
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 20
                    }
                }
            }
          });
        }

        if (sliderName == "mySliderTripleLim") {
          newSlider = new Slider({
            item: _this,
              arrows: false,
              resizeHalper: false,
              swiperConfig: {
                speed: 600,
                loop: false,
                navigation: {
                  nextEl: _this.querySelector('.my-slider__button-next'),
                  prevEl: _this.querySelector('.my-slider__button-prev'),
                  disabledClass: 'my-slider__button-disabled',
                },
                slidesPerView: 3,
				    		spaceBetween: 20,
		    		    breakpoints: {
      		        1280: {
      		            spaceBetween: 30
      		        },
	    		        1025: {
	    		            spaceBetween: 10
	    		        },
                  768: {
                    slidesPerView: 2
                  },
                  500: {
                    slidesPerView: 1
                  },
  	    		    }
              }
          });
        }

        if (sliderName == "mySliderOnePag") {
          newSlider = new Slider({
            item: _this,
              arrows: false,
              resizeHalper: false,
              swiperConfig: {
                speed: 600,
                loop: false,
                pagination: {
                  el: '.swiper-pagination',
                  clickable: true,
                },
                navigation: {
                  nextEl: _this.querySelector('.my-slider__button-next'),
                  prevEl: _this.querySelector('.my-slider__button-prev'),
                  disabledClass: 'my-slider__button-disabled',
                },
                slidesPerView: 1,
                spaceBetween: 0,
              }
          });
        }

        if (sliderName == "mySliderDoubleLim") {
          newSlider = new Slider({
            item: _this,
              arrows: false,
              resizeHalper: false,
              swiperConfig: {
                speed: 600,
                loop: false,
                navigation: {
                  nextEl: _this.querySelector('.my-slider__button-next'),
                  prevEl: _this.querySelector('.my-slider__button-prev'),
                  disabledClass: 'my-slider__button-disabled',
                },
                slidesPerView: 2,
                spaceBetween: 20,
                breakpoints: {
                  1280: {
                      spaceBetween: 30
                  },
                  1025: {
                      spaceBetween: 10
                  }
                }
              }
          });
        }

        if (sliderName == "mySliderOneLim") {
          newSlider = new Slider({
            item: _this,
              arrows: false,
              resizeHalper: false,
              swiperConfig: {
                speed: 600,
                loop: false,
                navigation: {
                  nextEl: _this.querySelector('.my-slider__button-next'),
                  prevEl: _this.querySelector('.my-slider__button-prev'),
                  disabledClass: 'my-slider__button-disabled',
                },
                slidesPerView: 1,
                spaceBetween: 0,
              }
          });
        }

				siteManager.sliders[sliderName+i] = newSlider;
		}
	}

	if (document.querySelector('.js-show-more-block')) {
		var blocks = document.querySelectorAll('.js-show-more-block');

		class LoadMore {
			constructor (block) {
				this.block = block;
				this.id = this.block.getAttribute("data-show-more-id");
				this.container = document.querySelector(".js-show-more-block[data-show-more-id='"+ this.id +"']");
				this.button = document.querySelector(".js-show-more-button[data-show-more-id='"+ this.id +"']");
				this.url = this.button.getAttribute("data-url");

				this.button.addEventListener("click", () => {
					let params = this.button.getAttribute("data-params");

					axios.get(this.url, {
						params: params
					})
					.then((response) => {
						let resp = response.data;

						if (resp.success) {
							if (resp.markup) {
								let newels = document.createElement("div");
								newels.innerHTML = resp.markup;
								this.container.appendChild(newels);
							}

							if (resp.params) {
								this.button.setAttribute("data-params", resp.params);
							}
						} else {
						}
					})
					.catch(function (error) {
						console.log(error);
					});
				});
			}
		}

		for (var i = 0; i < blocks.length; i++) {
			new LoadMore(blocks[i]);
		}
	}

	var buttons = document.querySelectorAll('.paper-button');

	for (var i = 0; i < buttons.length; i++) {
		new Ripple(buttons[i]);
	}

	//////////////////////////////////////
	// etc.
	//////////////////////////////////////

	if (document.querySelector("[data-event-id]")) {
		const elements = document.querySelectorAll("[data-event-id]");

		elements.forEach((el) => {
			el.addEventListener("click", (evt) => {
				let id = el.getAttribute("data-event-id");

				axios.get("/eventConfirm", {
					params: id
				})
				.then(function (response) {
					el.classList.toggle("is-active");

					if (el.classList.contains("is-active")) {
						el.querySelector('[data-el-text1]').innerHTML = el.querySelector('[data-el-text1]').getAttribute("data-el-text2") + response.data.newData;
					} else {
						el.querySelector('[data-el-text1]').innerHTML = el.querySelector('[data-el-text1]').getAttribute("data-el-text1");
					}
				})
				.catch(function (error) {
					console.log(error);
				});
			});
		})
	}

  if (document.querySelector("[data-button-confirm]")) {
    const button = document.querySelector("[data-button-confirm]");
    const url = button.getAttribute("data-url");
    const textBlock = button.querySelector("[data-text]");

    button.addEventListener("click", () => {
	  let params = button.getAttribute("data-params");

      axios.get(url, {
        params: params
      })
      .then((response) => {
        let resp = response.data;

        if (resp.success) {
          if (resp.confirm) {
            button.classList.add("is-active");
          }
          if (resp.text) {
            textBlock.innerHTML = resp.text;
          }
          if (resp.params) {
            button.setAttribute("data-params", resp.params);
          }
        } else {
        }
      })
      .catch(function (error) {
        console.log(error);
      });
    });
  }

	if (document.querySelector("[data-rating]")) {
		import('./modules/rating');
	}

	if (document.querySelector(".js-accordion")) {

		class Accordion {
			constructor (el) {
				this.block = el;
				this.items = el.querySelectorAll("[data-accordion-item]");

				this.init();
			}

			init () {
				class Connection {
					constructor (item) {
						var _this = this;

						this.item = item;
						this.button = this.item.querySelector('[data-accordion-button]');
						this.container = this.item.querySelector('[data-accordion-container]');
						this.fullHeight = this.item.offsetHeight;
						this.startHeight = this.button.offsetHeight;
						this.status = false;

						this.button.addEventListener("click", function () {
							if (!_this.status) {
								_this.open();
							} else {
								_this.close();
							}
						});

						this.init();
					}

					init () {
						this.item.style.overflow = 'hidden';
						this.item.style.height = this.startHeight + "px";

						this.resizer();
					}

					open () {
						var _this = this;

						this.status = true;
						this.item.classList.add("is-active");

						GSAP.to(_this.item, 0.3, {
							height: _this.fullHeight
						});
					}

					close () {
						var _this = this;

						this.status = false;
						this.item.classList.remove("is-active");

						GSAP.to(_this.item, 0.3, {
							height: _this.startHeight
						});
					}

					recalc () {
						var _this = this;

						this.fullHeight = this.button.offsetHeight + this.container.offsetHeight;

						if (this.status) {
							this.item.style.height = this.fullHeight + "px";
						}
					}

					resizer () {
						var _this = this;
						let resizerTimeout = null;

						window.addEventListener('resize', function () {
							clearInterval(resizerTimeout);

							resizerTimeout = setTimeout(function () {
								_this.recalc();
							}, 300);
						});
					}
				}

				for (var i = 0; i < this.items.length; i++) {
					new Connection(this.items[i]);
				}
			}
		}

		var accordions = document.querySelectorAll(".js-accordion");

		for (var i = 0; i < accordions.length; i++) {
			new Accordion(accordions[i]);
		}
	}



	(function(){
		const input = document.getElementById("js-search-input");
		const resultBLock = document.getElementById("js-search-results");
		let deb = null;

		input.addEventListener("keyup", (evt) => {
			clearTimeout(deb);

			if (input.value.length > 3) {
				resultBLock.style.minHeight = "calc(100% - 63px)";
				preloader(resultBLock, true);

			 	deb = setTimeout(() => {
						axios.get("/search", {
							params: {
								value: input.value
							}
						})
						.then(function (response) {
							const resp = response.data;
							let markup = resp.markup;

							resultBLock.innerHTML = markup;

							// preloader(resultBLock, false);
						})
						.catch(function (error) {
							console.log(error);
						});
			 	}, 300);
			}
		})
	})();



	if (document.querySelector("[data-wanted-remove]")) {
		let buttons = document.querySelectorAll("[data-wanted-remove]");

		buttons.forEach((button) => {
			button.addEventListener("click", () => {
				let item = button.closest("[data-wanted-item]");
				let params = JSON.parse(item.dataset.wantedItem);

				axios.get("/removeWanted", {
					params: params
				})
				.then(function (response) {
					if (response.data.succes) {
						animations.remove({
							el: item,
							duration: 0.2
						});
					}
				})
				.catch(function (error) {
					console.log(error);
				});
			})
		});
	}


	function inputError (input, status) {
		var parent = input.parentElement;

		if (!input.classList.contains("inputInited")) {
			init();
		}

		function init () {
			var id = input.id;
			var errorEl = document.createElement("label");

			errorEl.id = id;
			errorEl.classList.add("is-error");
			errorEl.textContent = input.getAttribute("data-error-text");
			errorEl.style.display = "none";

			parent.appendChild(errorEl);

			input.classList.add("inputInited");
		}

		if (status) {
			input.classList.add("is-error");
			parent.querySelector("label.is-error").style.display = 'block';
		} else {
			input.classList.remove("is-error");
			parent.querySelector("label.is-error").style.display = 'none';
		}
	}


	function preloader (block, show) {
		if (show) {
			var preloader = document.createElement("div");
			var img = document.createElement("img");
			img.src = '/images/preloader.gif';

			preloader.appendChild(img);

			preloader.style.display = 'flex';
			preloader.style.position = 'absolute';
			preloader.style.userSelect = 'none';
			preloader.style.left = '0';
			preloader.style.top = '0';
			preloader.style.backgroundColor = 'rgba(255,255,255,0.8)';
			preloader.style.zIndex = '1000';
			preloader.style.width = '100%';
			preloader.style.height = '100%';
			preloader.style.justifyContent = "center";
			preloader.style.alignItems = "center";
			preloader.classList.add("preloader");

			block.appendChild(preloader);
		} else {
			block.querySelector(".preloader").remove();
		}
	}

	if (document.getElementById("js-map")) {
		require.ensure([], (require) => {
			var MarkerClusterer = require('./modules/markerclusterer').default;
			var markerCluster = null;
			var clusterCreated = false;
			var map = document.getElementById("js-map");
			var mapSettups = document.getElementById('js-map-settups');

			preloader(map.parentElement, true);

			preloader(mapSettups, true);

			var markers = [];
			var markersBus = [];

			var createMap = function (zoom, startPos) {
				siteManager.map = new google.maps.Map(map, {
					center: {
						lat: Number(startPos.lat),
						lng: Number(startPos.lng)
					},
					zoom: Number(zoom),
					streetViewControl: false,
					mapTypeControl: false,
					styles: [
					    {
					        "featureType": "administrative",
					        "elementType": "labels.text.fill",
					        "stylers": [
					            {
					                "color": "#533834"
					            }
					        ]
					    },
					    {
					        "featureType": "landscape",
					        "elementType": "all",
					        "stylers": [
					            {
					                "color": "#dfd2ae"
					            }
					        ]
					    },
					    {
					        "featureType": "poi.park",
					        "elementType": "all",
					        "stylers": [
					            {
					                "color": "#a5b076"
					            }
					        ]
					    },
					    {
					        "featureType": "road.highway",
					        "elementType": "geometry",
					        "stylers": [
					            {
					                "color": "#f7ca66"
					            }
					        ]
					    },
					    {
					        "featureType": "water",
					        "elementType": "all",
					        "stylers": [
					            {
					                "color": "#b9d3c2"
					            }
					        ]
					    }
					],
					navigationControl: true,
					scaleControl: true,
					draggable: true,
					disableDefaultUI: false
				});
			}

			var appendMarkers = function (markers) {
				siteManager.map.markers = [];

				for (var i = 0; i < markers.length; i++) {
					new createMarker({
						marker: markers[i]
					});
				}
			}

			var initWaypoint = function () {
				var waypointButton = document.getElementById('js-map-waypoint-button');
		        var directionsService = new google.maps.DirectionsService;
		        var directionsDisplay = new google.maps.DirectionsRenderer({
		        	map: siteManager.map
		        });

				var fromInput = document.getElementById("js-google-input-from");
				var fromInputOptions = {};
				var fromInputAutocomplete = new google.maps.places.Autocomplete(fromInput, fromInputOptions);

				var toInput = document.getElementById("js-google-input-to");
				var toInputOptions = {};
				var toInputAutocomplete = new google.maps.places.Autocomplete(toInput, toInputOptions);

				var areaInput = document.getElementById("js-google-input-area");
				var areaInputOptions = {
					types: ['geocode']
				};

				var areaInputAutocomplete = new google.maps.places.Autocomplete(areaInput, areaInputOptions);

				waypointButton.addEventListener("click", function () {
					if (!fromInputAutocomplete.getPlace() ||
						!toInputAutocomplete.getPlace()) {


						if (!fromInputAutocomplete.getPlace()) {
							inputError(fromInput, true);
						} else {
							inputError(fromInput, false);
						}
						if (!toInputAutocomplete.getPlace()) {
							inputError(toInput, true);
						} else {
							inputError(toInput, false);
						}

						return false;
					} else {
						inputError(fromInput, false);
						inputError(toInput, false);
					}
					directionsService.route({
			        	origin: fromInputAutocomplete.getPlace().formatted_address,
			        	destination: toInputAutocomplete.getPlace().formatted_address,
			        	// optimizeWaypoints: true,
			        	travelMode: 'DRIVING'
			        }, function(response, status) {
			        	if (status === 'OK') {
			        		directionsDisplay.setDirections(response);
            			// showSteps(response, markerArray, stepDisplay, map);
			        	} else {
			        		console.warn("chet poshlo ne tak");
			        	}
			        });
				});

				initMapChanger();

				preloader(mapSettups, false);
			}

			class createMarker {
				constructor (data) {
					this.markerData = data.marker;
					this.iwStatus = false;

					var _this = this;

					this.markerData.pos.lat = Number(_this.markerData.pos.lat);
					this.markerData.pos.lng = Number(_this.markerData.pos.lng);

					this.marker = new google.maps.Marker({
						position: _this.markerData.pos,
						map: siteManager.map,
						icon: _this.markerData.icon.def
					});

					this.iw = new google.maps.InfoWindow({
						content: _this.iwMarkup({
							url: _this.markerData.url,
							feedsUrl: _this.markerData.feedsUrl,
							name: _this.markerData.name,
							rating: _this.markerData.rating,
							addres: _this.markerData.addres
						})
					});

					this.marker.addListener('click', function () {
						if (!_this.iwStatus) {
							google.maps.event.trigger(siteManager.map, 'click');
							_this.iw.open(siteManager.map, _this.marker);
							_this.marker.setIcon(_this.markerData.icon.hover);
							_this.iwStatus = true;
						} else {
							_this.iw.close(siteManager.map, _this.marker);
							_this.marker.setIcon(_this.markerData.icon.def);
							_this.iwStatus = false;
							google.maps.event.trigger(siteManager.map, 'click');
						}
					});

					siteManager.map.addListener('click', function () {
						_this.iw.close();
						_this.marker.setIcon(_this.markerData.icon.def);
						_this.iwStatus = false;
					});

					this.marker.type = this.markerData.type;

					siteManager.map.markers.push(_this.marker);
				}

				iwMarkup (data) {
					var markup =
					'<div class="iw-block">' +
						'<div class="iw-block__top-row">'+
							'<a href="' + data.url + '" class="iw-block__name">' + data.name + '</a>'+
							'<div class="iw-block__rating">' + data.rating + '</div>'+
						'</div>'+
						'<div class="iw-block__content">'+
							'<div class="iw-block__addres">' + data.addres + '</div>'+
							'<div class="iw-block__user-rating">Ваша оценка: </div>'+
							'<div class="iw-block__alert">Оценка действительна полгода</div>'+
							'<a href="' + data.feedsUrl + '" class="iw-block__feeds">Смотреть коментарии</a>'+
						'</div>'+
					'</div>';

					return markup;
				}
			}

			var initMapChanger = function () {
				siteManager.mapChanger.el.addEventListener('change', function(event) {
					var selectedNow = siteManager.mapChanger.class.choices.getValue();
					preloader(map.parentElement, true);
					preloader(mapSettups, true);

					setTimeout(() => { // так нужно потому что всё происходит слишком быстро и прелоадер неуспевает показатся
				  		recalcMapMarkers(selectedNow);
					}, 100);
				}, false);
			}

			function recalcMapMarkers (data) {
				var filterArr = [];

				markersBus = [];

				data.map(function(val){
					filterArr.push(val.value);
				});

				var inList = function (type) {
					return filterArr.filter(filterHandler);

					function filterHandler (filterItem) {
						return type == filterItem;
					}
				}

				markers.map(function(marker){
					if (inList(marker.type).length) {
						markersBus.push(marker);
					}
				});

				appendMarkers(markersBus);

				createClusters();

				preloader(map.parentElement, false);
				preloader(mapSettups, false);
			}

			function createClusters () {
				if (clusterCreated) {
					markerCluster.clearMarkers();
				}

				markerCluster = new MarkerClusterer(siteManager.map, siteManager.map.markers, {
					imagePath: './images/map_icons/m',
					gridSize: 40,
					// minimumClusterSize: 10
				});

				clusterCreated = true;
			}

			axios.get("getMapData", {
				// params: params
			})
			.then(function (response) {
				markers = response.data.markers;

				createMap(response.data.zoom, response.data.startPos);

				appendMarkers(markers);

				createClusters();

				preloader(map.parentElement, false);

				initWaypoint();
			})
			.catch(function (error) {
				console.log(error);
			});
		}, "public/gmap");
	}

	siteManager.passChanger = function () {
		if (document.querySelector("[data-password-input-changer]")) {
			const inputs = document.querySelectorAll("[data-password-input]");

			for (let index = 0; index < inputs.length; index++) {
				const element = inputs[index];
				const button = element.parentNode.parentNode.querySelector("[data-password-input-changer]");

				button.addEventListener("click", () => {
					if (element.type == "text") {
						element.type = "password";
						button.classList.remove("is-active");
					} else {
						element.type = "text";
						button.classList.add("is-active");
					}
				});
			}
		}
	}

	siteManager.passChanger();

	import('./modules/popups');
	import('./modules/art');
}
