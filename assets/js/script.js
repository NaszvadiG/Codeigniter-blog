function GetBaseUrl () {
    return window.location.protocol + "//" + window.location.host + "/";
}

function GetLangCodeInLink () {
    return window.location.pathname.split('/')[1];
}

function GetControllerName () {
    return window.location.pathname.split('/')[2];
}

function GetActionName () {
    return window.location.pathname.split('/')[3];
}

function GetSegment (num) {
    return window.location.pathname.split('/')[num];
}

function GetTokenAPI () {
    return $('.Token').text();
}

$(document).ready(function () {
    
    var base_url = GetBaseUrl(); // Get Base Url
    var Token_Api = GetTokenAPI(); // Get Token API
    
    /* HEADER SCROLL */
    var scroll_start = 0;
    var scroll_idchange = $('#ContentJs');
    var scroll_offset = scroll_idchange.offset();
    var scroll_actual = $(document).scrollTop().valueOf();
    
    if (scroll_actual >= 70) {
        $('.navbar').addClass("navbar-fixed-top");
    }
    
    $(".lang_select").find('[data-lang="' + GetLangCodeInLink() + '"]').addClass('active'); 
    
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
            $(this).parent().children("ul").attr("id", "").slideDown(200);
        }
                
    });
    /* LEFT MENU */
    
    /* SET LANG */
    $(".lang_select img").click(function(e) {
        
        e.stopPropagation();
        var lang_select = $(this).data('lang');
        console.log(lang_select);
        
        $(".flash_notif").html('<span style="color: orange;"><i class="fa_lang_select fa fa-spinner fa-spin fa-3x fa-fw"></i></span>');
        
        Cookies.set("lang_choise", lang_select);
        
        setTimeout(
            function() {
                $(".fa_lang_select").removeClass("fa-spinner fa-spin").addClass("fa-check").css("color", "green");
                setTimeout(
                    function() {
                        location.reload(); 
                    }
                , 1500);
            }
        , 1500);

    });
    /* SET LANG */
    
});