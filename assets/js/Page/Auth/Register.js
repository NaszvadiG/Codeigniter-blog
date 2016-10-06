$(document).ready(function () {
    
    //Register Function
    $("#register").on('submit', function(e) {
        
        e.preventDefault();
        
        $(".btn-register-form").html("Vérification");
        
        var input_username = $("#InputUsername").val();
        var input_email_1 = $("#InputEmail1").val();
        var input_email_2 = $("#InputEmail2").val();
        var input_password_1 = $("#InputPassword1").val();
        var input_password_2 = $("#InputPassword2").val();
        
        var error = false;
        
        //Reset class error form
        $(".register-form").children("div").children("div").removeClass("has-error");
        $(".register-form").children("div").children("div").removeClass("has-success");
        
        //Resete notification
        $(".alert-input-empty").remove();
        $(".success-input-empty").remove();
        
        if (input_username) { // OK
            
            $.ajax({ // fonction permettant de faire de l'ajax
                type: "POST", // methode de transmission des données au fichier php
                url: GetBaseUrl() + "API/GetUsernameExists", // url du fichier php
                data: {'username' : input_username,'token_data' : $('.Token').text(),'token_name' : 'token_blog','token_blog' : $('.Token').text()},
                success : function(data) {
                    if(JSON.parse(JSON.stringify(data)).Result === 0) { // None existe
                        if ($("#InputUsername").parent("div").hasClass("has-error") === true) {
                            $("#InputUsername").parent("div").removeClass("has-error");
                        }
                        $("#InputUsername").parent("div").addClass("has-success");
                    }
                    else {
                        $("#InputUsername").parent("div").addClass("has-error");
                        error = true;
                    }
                }
            });
            
        }
        else {
            $("#InputUsername").parent("div").addClass("has-error");
            
            error = true;
            
        }
        
        if (input_email_1 && input_email_2) {
            if (input_email_1 === input_email_2) {
                if (input_email_1 && (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(input_email_1) === true)) {
                    
                    $.ajax({
                        type: "POST",
                        url: GetBaseUrl() + "API/GetEmailExists",
                        data: {'email' : input_email_1,'token_data' : $('.Token').text(),'token_name' : 'token_blog','token_blog' : $('.Token').text()},
                        success : function(data) {
                            if(JSON.parse(JSON.stringify(data)).Result === 0) { // None existe
                                if ($("#InputEmail1").parent("div").hasClass("has-error") === true) {
                                    $("#InputEmail1").parent("div").removeClass("has-error");
                                }
                                if ($("#InputEmail2").parent("div").hasClass("has-error") === true) {
                                    $("#InputEmail2").parent("div").removeClass("has-error");
                                }
                                $("#InputEmail1").parent("div").addClass("has-success");
                                $("#InputEmail2").parent("div").addClass("has-success");
                            }
                            else {
                                $("#InputEmail1").parent("div").addClass("has-error");
                                $("#InputEmail2").parent("div").addClass("has-error");
                                error = true;
                            }
                        }
                    });
                    
                }else {
                    $("#InputEmail1").parent("div").addClass("has-error");
                    $("#InputEmail2").parent("div").addClass("has-error");
                    error = true;
                }
            }
            else {
                $("#InputEmail1").parent("div").addClass("has-error");
                $("#InputEmail2").parent("div").addClass("has-error");
                error = true;
            }
        }
        else {
            $("#InputEmail1").parent("div").addClass("has-error");
            $("#InputEmail2").parent("div").addClass("has-error");
            error = true;
        }
        
        if (input_password_1 && input_password_2) {
            if (input_password_1 === input_password_2) {
                if ($("#InputPassword1").parent("div").hasClass("has-error") === true) {
                    $("#InputPassword1").parent("div").removeClass("has-error");
                }
                if ($("#InputPassword2").parent("div").hasClass("has-error") === true) {
                    $("#InputPassword2").parent("div").removeClass("has-error");
                }
                
                $("#InputPassword1").parent("div").addClass("has-success");
                $("#InputPassword2").parent("div").addClass("has-success");
                
            }
            else {
                $("#InputPassword1").parent("div").addClass("has-error");
                $("#InputPassword2").parent("div").addClass("has-error");
                error = true;
            }
        }
        else {
            $("#InputPassword1").parent("div").addClass("has-error");
            $("#InputPassword2").parent("div").addClass("has-error");
            error = true;
        }
        
        if (error === false) {
            
            $.ajax({
                
                type: "POST",
                url: GetBaseUrl() + "API/SetNewAccount",
                data: {'username' : input_username, 'password': input_password_1, 'email': input_email_1 ,'token_data' : $('.Token').text(),'token_name' : 'token_blog','token_blog' : $('.Token').text()},
                success : function(data) {
                    if(JSON.parse(JSON.stringify(data)).Result === 1) { // Account REGISTER
                        
                        $("#register").prepend("<div class=\"alert alert-success success-input-empty\" role=\"alert\">Inscription réussi</div>");
                        
                    }
                    else {
                        $("#register").prepend("<div class=\"alert alert-danger alert-input-empty\" role=\"alert\">ERRORS</div>");
                    }
                }
                
            });
            
        }
        else {
            $("#register").prepend("<div class=\"alert alert-danger alert-input-empty\" role=\"alert\">Please insert corectly information</div>");
            
        }
        
        return false;
        
    });
    
});