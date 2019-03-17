$(function(){
    var openMenu = $('#js-burger');
    var closeMenu = $('#js-menu-close');
    var lightbox = $('#m-lightbox');

    function binding(){
        openMenu.on('click', (e) => {
            lightbox.addClass('open');
        });
        closeMenu.on('click', (e) => {
            lightbox.removeClass('open');
        });
    }

    function Init(){
        binding();
    }
    Init()
 });