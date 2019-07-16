var getBootstrapVersion = function () {
    var deferred = $.Deferred();

    var script = $('script[src*="bootstrap"]');
    if (script.length == 0) {
        console.log("No Bootstrap");
        return deferred.reject();
    }

    var src = script.attr('src');
    $.get(src).done(function(response) {
        var matches = response.match(/(?!v)([.\d]+[.\d])/);
        if (matches && matches.length > 0) {
            version = matches[0];
            deferred.resolve(version);
        }
    });

    return deferred;
};

getBootstrapVersion().done(function(version) {
    console.log("Bootstrap Version : "+version); // '3.3.4'
});
