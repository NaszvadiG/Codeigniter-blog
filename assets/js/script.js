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
    var FlashNotifDiv = $(".flash_notif");
    
    /* SCROLL */
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
    /* SCROLL */

    /* LEFT MENU */
    /* https://github.com/onokumus/metisMenu */
    $("#menu").metisMenu();
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
    
    /* LOGIN AUTH */
    $("#LoginRight").on('submit', function(e) {
        
        e.preventDefault();
        
        var PseudoOrMail_Value = $("#InputUsernameOrMail").val();
        var Password_Value = $("#InputPassword").val();
        var SaveMe_Value = $("#SaveMeLogin").is(':checked') ? 1 : 0;
        var Choix_identifiant = 0; // 0 = Pseudo | 1 = Email
        var error_identifiant = true;
        var account_id = 0;
        
        console.info(SaveMe_Value);
        
        FlashNotifDiv.html("<div class=\"alert alert-info\" role=\"alert\">Chargement...</div>");
                
        if (PseudoOrMail_Value || Password_Value) {
            
            FlashNotifDiv.html("<div class=\"alert alert-info\" role=\"alert\">Vérification des identifiants...</div>");
            
            if (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(PseudoOrMail_Value) === true) {
                Choix_identifiant = 1;
            }
            
            if (Choix_identifiant === 0) { //On vérifie le pseudo
                $.ajax({
                    type: "POST",
                    url: GetBaseUrl() + "API/GetUsernameExists",
                    data: {'username' : PseudoOrMail_Value,'token_data' : $('.Token').text(),'token_name' : 'token_rencontre','token_rencontre' : $('.Token').text()},
                    success : function(data) {
                        if(JSON.parse(JSON.stringify(data)).Result === 1) { // Identifiant trouver
                            
                            $.ajax({
                                type: "POST",
                                url: GetBaseUrl() + "API/GetPasswordCorrect",
                                data: {'password' : Password_Value, 'remember' : SaveMe_Value, 'account': JSON.parse(JSON.stringify(data)).AccountID, 'token_data' : $('.Token').text(),'token_name' : 'token_rencontre','token_rencontre' : $('.Token').text()},
                                success : function(data) {
                                    if(JSON.parse(JSON.stringify(data)).Result === 1) { // Mot de passe correct
                                        FlashNotifDiv.html("<div class=\"alert alert-success\" role=\"alert\">Connexion réussi, chargement en cours</div>");
                                        setTimeout(function () { 
                                            location.reload(); 
                                        }, 3000);
                                    }
                                    else { // Mot de passe incorrect
                                        FlashNotifDiv.html("<div class=\"alert alert-danger\" role=\"alert\">Merci de vérifier vos identifiant</div>");
                                    }
                                }
                            });
                            
                        }
                        else { // Identfiiant trouver
                            FlashNotifDiv.html("<div class=\"alert alert-danger\" role=\"alert\">Merci de vérifier vos identifiant</div>");
                        }
                    }
                });
            }
            else { //On vérifie l'email
                $.ajax({
                    type: "POST",
                    url: GetBaseUrl() + "API/GetEmailExists",
                    data: {'email' : PseudoOrMail_Value,'token_data' : $('.Token').text(),'token_name' : 'token_rencontre','token_rencontre' : $('.Token').text()},
                    success : function(data) {
                        if(JSON.parse(JSON.stringify(data)).Result === 1) { // Identifiant trouver
                            $.ajax({
                                type: "POST",
                                url: GetBaseUrl() + "API/GetPasswordCorrect",
                                data: {'password' : Password_Value, 'remember' : SaveMe_Value, 'account': JSON.parse(JSON.stringify(data)).AccountID, 'token_data' : $('.Token').text(),'token_name' : 'token_rencontre','token_rencontre' : $('.Token').text()},
                                success : function(data) {
                                    if(JSON.parse(JSON.stringify(data)).Result === 1) { // Mot de passe correct
                                        FlashNotifDiv.html("<div class=\"alert alert-success\" role=\"alert\">Connexion réussi, chargement en cours</div>");
                                        setTimeout(function () { 
                                            location.reload(); 
                                        }, 3000);
                                    }
                                    else { // Mot de passe incorrect
                                        FlashNotifDiv.html("<div class=\"alert alert-danger\" role=\"alert\">Merci de vérifier vos identifiant</div>");
                                    }
                                }
                            });
                            
                        }
                        else { // Identfiiant trouver
                            FlashNotifDiv.html("<div class=\"alert alert-danger\" role=\"alert\">Merci de vérifier vos identifiant</div>");
                        }
                    }
                });
            }
            
        }
        else {
            FlashNotifDiv.html("<div class=\"alert alert-danger\" role=\"alert\">Merci de remplire les champs correctements</div>");
        }
        
        return false;
        
    });
    /* LOGIN AUTH */
    
    /* LOGOUT AUTH */
    $(".pointerLogout").click(function() {
        
        FlashNotifDiv.html("<div class=\"alert alert-info\" role=\"alert\">Chargement...</div>");
        
        $(this).parent("li").html("<span><i class=\"fa fa-spinner fa-spin\"></i></span>");
        
        $.ajax({
            type: "POST",
            url: GetBaseUrl() + "API/SetLogout",
            data: {'token_data' : $('.Token').text(),'token_name' : 'token_rencontre','token_rencontre' : $('.Token').text()},
            success : function(data) {
                if(JSON.parse(JSON.stringify(data)).Result === 1) {
                    FlashNotifDiv.html("<div class=\"alert alert-success\" role=\"alert\">Deconnexion réussi, chargement en cours</div>");
                    setTimeout(function () { 
                        location.reload(); 
                    }, 3000);
                }
            }
        });
    });
    /* LOGOUT AUTH */
    
});