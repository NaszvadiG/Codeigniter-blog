$(document).ready(function () {
    
    var base_url = window.location.protocol + "//" + window.location.host + "/";
    
    var ajax_url = window.location.protocol + "//" + window.location.host + "/";
    
    /* HEADER SCROLL */
    var scroll_start = 0;
    var scroll_idchange = $('#ContentJs');
    var scroll_offset = scroll_idchange.offset();
    var scroll_actual = $(document).scrollTop().valueOf();
    
    if (scroll_actual >= 70) {
        $('.navbar').addClass("navbar-fixed-top");
    }
    
    $(document).scroll(function() { 
        scroll_start = $(this).scrollTop();
        if(scroll_start > scroll_offset.top) {
            $('.navbar').addClass("navbar-fixed-top");
        } else {
            $('.navbar').removeClass("navbar-fixed-top");
        }
    });
   
    /* HEADER SCROLL */

    /* FOOTER SCROLL */

    /* FOOTER SCROLL */
    
    /* RETURN TO TOP */
    if ($('#back-to-top').length) {
        var scrollTrigger = 100, // px
            backToTop = function () {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    $('#back-to-top').addClass('show');
                } else {
                    $('#back-to-top').removeClass('show');
                }
            };
        backToTop();
        $(window).on('scroll', function () {
            backToTop();
        });
        $('#back-to-top').on('click', function (e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 700);
        });
    }
    /* RETURN TO TOP */

    /* LEFT MENU */
    
    $("#nav li").hover(
    function(){
        $(this).children('ul').hide();
        $(this).children('ul').slideDown('fast');
    },
    function () {
        $('ul', this).slideUp('fast');            
    });
    
    $('ul#menu li a').click(function (){
        
        var cible = $(this).parent().children("ul");
        //$("ul#menu li ul").not($("ul#menu li ul").parent("ul")).slideUp(200)
        //$("ul#menu li ul").slideUp(200);
        if ($(this).parent().attr("id") != "actif") {
            $(this).parent().attr("id", "actif");
            if (!cible.is(":visible")) {
                cible.slideDown(200);
            }
        }
        else {
            //$(this).parent(-1).find("li#actif").slideUp(200);
            $(this).parent().children("ul").attr("id", "");
        }
                
    });
    /* LEFT MENU */
    
});