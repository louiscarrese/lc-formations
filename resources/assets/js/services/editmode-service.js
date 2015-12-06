function editModeServiceFactory() {
    return {
        initFromUrl: function(service) {
            var ret = {};

            ret.mode = this.getModeFromUrl();
            console.log(ret.mode);
            ret.editing = false;

            if(ret.mode === 'create') {
                ret.data = this.getDataFromUrl();
                ret.editing = true;
            } else {
                var id = this.getId();
                console.log(id + ' isNumber ? : ' + this.isNumber(id));
                if(this.isNumber(id)) {
                    service.get({id:id}, function(value, responseHeaders) {
                        ret.data = value;
                    });
                } else {
                    ret.data = {};
                }
                if(ret.mode === 'edit') {
                    ret.editing = true;
                }
            }

            return ret;
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
            var urlParse = this.parseUrl(window.location);
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
            paramString.split("&").forEach(function(part) {
                var item = part.split("=");
                result[item[0]] = decodeURIComponent(item[1]);
            });
            return result;
        }
};
}