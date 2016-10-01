$(document).ready(function () {
    /* ADD COMMENTS */
    $("form#ADDCOMMENT").submit(function (e) {
        
        e.preventDefault();
        
        var message = $(".textarea-addcomment").val();
        var newsid = $("form#ADDCOMMENT").data('newsid');
        
        if (message != "") {
            
            $.ajax({
                type: "POST",
                url: GetBaseUrl() + "API/AddComInNews",
                data: {'news' : newsid, 'message' : message, 'token_data' : $('.Token').text(), 'token_name' : 'token_blog', 'token_blog' : $('.Token').text()},
                success : function(data) {
                    
                    location.reload();
                    
                }
                
            });
            
        }
        
        return false;
        
    });
    /* ADD COMMENTS */
});