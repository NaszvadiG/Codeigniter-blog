function LangLine (ligner, file) {

    var lang_uri = window.location.pathname.split('/')[1]
    var lang;
    
    file = file || "ajax";
    
    if (lang_uri == "fr") {
        lang = "french";
    }
    else if (lang_uri === "en") {
        lang = "english";
    }
    
    return JSON.parse($.ajax({
        type: 'GET',
        url: window.location.protocol + "//" + window.location.host + "/application/language/" + lang + "/" + file + ".json",
        dataType: 'json',
        global: false,
        async: false,
        success: function(data) {
            return data;
        }
    }).responseText)[ligner];

}