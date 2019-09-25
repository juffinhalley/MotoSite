'use strict';

/**
 * Создание таймеров с внутреним замыканием
 * @module
 * @example
import createTimer from './create-timer';

let timer = createTimer(500);
$(window).on('resize', function () {
	timer(() => {
		console.log('done');
	});
});

// only clear timeout
timer.clear();
 */

// ----------------------------------------
// Public
// ----------------------------------------

/**
 * @param {number} [defaultDelay=300]
 * @return {Function} запуск таймеров
 * @sourceCode
 */
function createTimer (defaultDelay = 300) {
	let timerId = null;
	let {clearTimeout, setTimeout} = window;

	/**
	 * @param {Function} fn
	 * @param {number} [delay=defaultDelay]
	 * @prop {Function} clear
	 */
	function timer (fn, delay = defaultDelay) {
		clearTimeout(timerId);
		timerId = setTimeout(fn, delay);
	}

	timer.clear = () => clearTimeout(timerId);
	return timer;
}

// ----------------------------------------
// Exports
// ----------------------------------------

export default createTimer;
