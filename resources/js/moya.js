$(function(){
    var openMenu = $('#js-burger');
    var closeMenu = $('#js-menu-close');
    var lightbox = $('#m-lightbox');

    var windowHeight = $(window).height() - 100;
    var positionFooter = document.getElementById("m-footer").offsetTop;

    function binding(){
        openMenu.on('click', (e) => {
            lightbox.addClass('open');
        });
        closeMenu.on('click', (e) => {
            lightbox.removeClass('open');
        });
    }

    function hideSocialNav(){
        $(window).scroll(function(event){
            var posicionScroll = $(this).scrollTop();
            if (posicionScroll > (parseInt(positionFooter)-parseInt(windowHeight))){
                $("#m-social").addClass("m-hidden");
            } else {
                $("#m-social").removeClass("m-hidden");
            }
        });
    }

    function Init(){
        binding();
        hideSocialNav();
    }

    Init()
 });