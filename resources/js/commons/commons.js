$(function(){

    const WOW = require('wowjs');

    window.wow = new WOW.WOW({
        boxClass:     'js-block-watch',
        animateClass: 'is-visible'
    });

    function Init(){
        window.wow.init();
    }

    Init()
 });