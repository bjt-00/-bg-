"use strict";

var rudyTimer = (function () {
    var timer = null;
    function rudy() {   // called each time the timer goes off
        document.getElementById("output").innerHTML += " Rudy!";
    }
    return function () {
        if (timer == null) {
            timer = setInterval(rudy, 1000);
        } else {
            clearInterval(timer);
            timer = null;
        }
    }
})();