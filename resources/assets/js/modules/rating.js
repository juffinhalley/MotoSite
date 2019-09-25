import Rater from 'rater-js';

siteManager.rates = [];

const rateBlocks = document.querySelectorAll("[data-rating]");

rateBlocks.forEach((rate) => {
    let config = JSON.parse(rate.getAttribute("data-rating"));

    if (config.readOnly) {
        rate.classList.add("is-readOnly");
    }

    config.element = rate;

	siteManager.rates.push(new Rater(config));
})