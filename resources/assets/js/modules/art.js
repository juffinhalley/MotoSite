'use strict';

if (document.querySelector("[data-language-item]")) {

    const blocks = document.querySelectorAll("[data-language-item]");

    for (let index = 0; index < blocks.length; index++) {
        let button = blocks[index];

        button.addEventListener('click', function(evt) {

            blocks.forEach(function(el) {
                el.classList.remove("is-active");
            });

            button.classList.toggle("is-active");
        });
    };
}

if (document.querySelector("[data-switch]")) {
    const block = document.querySelector("[data-switch]");
    const buttonOn = block.querySelector("[data-btn-on]")
    const buttonOff = block.querySelector("[data-btn-off]")
    const container = block.querySelector("[data-switch-cont]")

    buttonOn.addEventListener('click', () => {
        buttonOn.classList.remove("is-active");
        buttonOff.classList.add("is-active");
        container.classList.add("is-active");
    });

    buttonOff.addEventListener('click', () => {
        buttonOff.classList.remove("is-active");
        buttonOn.classList.add("is-active");
        container.classList.remove("is-active");
    });
}
