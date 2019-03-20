$(function(){

    const WOW = require('wowjs');

    window.wow = new WOW.WOW({
        boxClass:     'js-block-watch',
        animateClass: 'is-visible',
        live: false
    });

    function Init(){
        window.wow.init();
    }

    Init()
 });