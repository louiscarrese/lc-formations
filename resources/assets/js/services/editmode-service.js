function editModeServiceFactory() {
    return {
        initFromUrl: function(service, callback) {
            var data = {};

            var mode = this.getModeFromUrl();

            if(mode === 'create') {
                data = this.getDataFromUrl();
            } else {
                var id = this.getId();
                if(this.isNumber(id)) {
                    service.get({id:id}, function(value, responseHeaders) {
                        callback(mode, value);
                    });
                } else {
                    data = {};
                }
            }

            callback(mode, data);
        },

        getModeFromUrl: function() {
            var urlParser = this.parseUrl(window.location);
            if(urlParser.pathname.substr(-'create'.length) === 'create') {
                return 'create';
            } else {
                var params = this.parseParameters(urlParser.search);
                if(params.hasOwnProperty('edit') && params.edit === 'true') {
                    return 'edit';
                } else {
                    return 'read';
                }
            }
        },

        getDataFromUrl: function () {
            var urlParser = this.parseUrl(window.location);
            var params = this.parseParameters(urlParser.search);
            return params;
        },

        getId: function() {
            var urlParse = this.parseUrl(window.location);
            var path = urlParse.pathname;
            var pathComponents = path.split('/');

            var id = pathComponents[pathComponents.length - 1];

            return id;
        },

        isNumber: function(n) {
            return !isNaN(parseFloat(n)) && isFinite(n);
        },

        parseUrl: function(url) {
            var parser = document.createElement('a');
            parser.href = url;

            return parser;
        },

        parseParameters: function(paramString) {
            var result = {};

            paramString.substring(1).split("&").forEach(function(part) {
                var item = part.split("=");
                result[item[0]] = decodeURIComponent(item[1]);
            });
            return result;
        }
};
}