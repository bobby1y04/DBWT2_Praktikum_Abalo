"use strict";

let body = document.getElementsByTagName('body')[0];

let addTransitionBackground = function() {
    let i = 0, j = 0, k = 0;

    function changeColor() {
        if (k >= 195) return;

        body.style.backgroundColor = `rgb(${i}, ${j}, ${k})`;

        if (i !== 111) i++;
        if (j !== 150) j++;

        k++;
        setTimeout(changeColor, 1);
    }

    changeColor();
}

addTransitionBackground();
