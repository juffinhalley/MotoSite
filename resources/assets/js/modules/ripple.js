"use strict"
import PaperRipple from 'paper-ripple';
const papperCss = require('paper-ripple/dist/paper-ripple.min.css');

export default class Ripple {
	constructor (el) {
	    var ripple = new PaperRipple();
	    	
    	el.style.color = el.getAttribute("data-ripple-color")

	    el.appendChild(ripple.$);
	 
	    el.addEventListener('mousedown', function(ev) {
	        ripple.downAction(ev);
	    });
	    el.addEventListener('mouseup', function() {
	        ripple.upAction();
	    });
	    el.addEventListener('mouseleave', function() {
	        ripple.upAction();
	    });

		this.init();
	}

	init () {
	}
}
