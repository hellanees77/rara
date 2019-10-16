jQuery(document).ready(function($) {

/*------------------------------------------------
            DECLARATIONS
------------------------------------------------*/

    var loader = $('#loader');
    var loader_container = $('#preloader');
    var scroll = $(window).scrollTop();  
    var scrollup = $('.backtotop');
    var menu_toggle = $('.menu-toggle');
    var dropdown_toggle = $('.main-navigation button.dropdown-toggle');
    var nav_menu = $('.main-navigation ul.nav-menu');
    var masonry_gallery = $('.grid');

/*------------------------------------------------
            PRELOADER
------------------------------------------------*/

    loader_container.delay(1000).fadeOut();
    loader.delay(1000).fadeOut("slow");

/*------------------------------------------------
            BACK TO TOP
------------------------------------------------*/

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            scrollup.css({bottom:"25px"});
        } 
        else {
            scrollup.css({bottom:"-100px"});
        }
    });

    scrollup.click(function() {
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });

/*------------------------------------------------
            MAIN NAVIGATION
------------------------------------------------*/

    menu_toggle.click(function(){
        nav_menu.slideToggle();
       $('.main-navigation').toggleClass('menu-open');
       $('.menu-overlay').toggleClass('active');
    });

    dropdown_toggle.click(function() {
        $(this).toggleClass('active');
       $(this).parent().find('.sub-menu').first().slideToggle();
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            $('.menu-sticky #masthead').addClass('nav-shrink');
        }
        else {
            $('.menu-sticky #masthead').removeClass('nav-shrink');
        }
    });

    $('.main-navigation ul li.search-menu a').click(function(event) {
        event.preventDefault();
        $(this).toggleClass('search-active');
        $('.main-navigation #search').fadeToggle();
        $('.main-navigation .search-field').focus();
    });

    $(document).keyup(function(e) {
        if (e.keyCode === 27) {
            $('.main-navigation ul li.search-menu a').removeClass('search-active');
            $('.main-navigation #search').fadeOut();
        }
    });

    $(document).click(function (e) {
        var container = $("#masthead");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            nav_menu.slideUp();
           $('.main-navigation').removeClass('menu-open');
           $('.menu-overlay').removeClass('active');
        }
    });

    if( $(window).width() < 1023 ) {
        $('#secondary-menu').insertAfter('#primary-menu > li:last-child');
    }

    if( $(window).width() > 1024 ) {
        $('.center-aligned .site-branding').insertAfter('#primary-menu');

        $(document).click(function (e) {
            var container = $("#masthead");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                $('.main-navigation ul li.search-menu a').removeClass('search-active');
                $('.main-navigation #search').fadeOut();
            }
        });
    }

/*------------------------------------------------
            MATCH HEIGHT
------------------------------------------------*/

$('article .entry-container').matchHeight();

/*------------------------------------------------
            PRICE COUNT
------------------------------------------------*/

var numItems = $(".price-meta-wrapper").length;
var myHeight, myWidth;
for (i = 0; i < numItems; i++) {
    myWidth = $(".price-meta-wrapper>.trip-price:eq(" + i + ")").width();
    myHeight = $(".price-meta-wrapper>.trip-price:eq(" + i + ")").height();
    if (myWidth > myHeight) {
        $(".price-meta-wrapper>.trip-price:eq(" + i + ")").css({
            height: myWidth + "px"
        });
    }
    if (myWidth < myHeight) {
        $(".price-meta-wrapper:eq(" + i + ")>.trip-price").css({
            width: myHeight + "px"
        });
    }
}

/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});