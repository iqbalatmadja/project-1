function integer_numbering(evt,obj){
    var temp = obj.value;
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if(charCode == 46) temp += ".";
    tempArr = temp.split(".");
    if(tempArr.length > 2) return false;

    return ((charCode == 8) || (charCode >= 48) && (charCode <= 57));
}

function decimal_numbering(evt,obj){
    var temp = obj.value;
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if(charCode == 46) temp += ".";
    tempArr = temp.split(".");
    if(tempArr.length > 2) return false;

    return ((charCode == 8) || (charCode == 46) || (charCode >= 48) && (charCode <= 57));
}

function post(path, params, method) {
    method = method || "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
        }
    }

    document.body.appendChild(form);
    form.submit();
}