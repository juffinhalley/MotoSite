

const module = {
	remove: function (data) {
		let el = data.el;
		const duration = data.duration;
		
		let elBus = el.cloneNode();
		elBus.innerHTML = el.innerHTML;
		el.innerHTML = "";
		el.appendChild(elBus);
		el.className = "";
		el.classList.add("gsap-animation-remove-wrapper");
		el.style.width = elBus.clientWidth + 
			Number(window.getComputedStyle(elBus).marginLeft.split("px")[0]) + 
			Number(window.getComputedStyle(elBus).marginRight.split("px")[0])+ "px";
		el.style.height = elBus.clientHeight + 
			Number(window.getComputedStyle(elBus).marginTop.split("px")[0]) + 
			Number(window.getComputedStyle(elBus).marginBottom.split("px")[0])+ "px";

		window.GSAP.fromTo(elBus, duration, {
			opacity: 1,
			scale: 1,
			// ease: data.easing
		    onStart: function() {
				if (data.start) {
					data.start();
				}
		    }
		}, {
			opacity: 0,
			scale: 0.3,
			// ease: data.easing,
			onComplete () {
				elBus.remove();

				window.GSAP.to(el, 0.2, {
					width: 0,
					height: 0,
					onComplete () {
						el.remove();
					}
				});

				if (data.complete) {
					data.complete();
				}
			}
		});
	}
}

export default module;