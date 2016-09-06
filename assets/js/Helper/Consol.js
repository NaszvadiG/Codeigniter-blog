function Consol(message, type) {
    
    var result;
    var message_result = message;
    
    if(message instanceof Object == true) {
        message_result = JSON.stringify(message);
    }
    else {
        message_result = message;
    }
    
    
    switch(type) {
        case "log":
            result = console.log("%c" + message_result, "background: #31708f;box-shadow: #000 0px 2px 5px -1px;");
        break;
        case "info":
            result = console.info("%c" + message_result, "background: #bce8f1;color: #31708f;box-shadow: #000 0px 2px 5px -1px;");
        break;
        case "error":
            result = console.error("%c" + message_result, "background: #ebccd1;color: #a94442;box-shadow: #000 0px 2px 5px -1px;");
        break;
        case "success":
            result = console.log("%c" + message_result, "background: #d6e9c6;color: #3c763d;box-shadow: #000 0px 2px 5px -1px;");
        break;
        case "warning":
            result = console.warn("%c" + message_result, "background: #faebcc;color: #8a6d3b;box-shadow: #000 0px 2px 5px -1px;");
        break;
        default:
            result = console.info("%c" + message_result, "background: #bce8f1;color: #31708f;box-shadow: #000 0px 2px 5px -1px;");
        break;
    }
    
    return result;
    
}