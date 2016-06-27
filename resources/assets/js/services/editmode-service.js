function editModeServiceFactory($q) {

    return {
        initFromUrl: initFromUrl,
    };

    //Gets what it can from the URL.
    //Returns a promises which will be completed when data has arrived
    function initFromUrl(service) {
        return $q(function(resolve, reject) {
            var ret = {};

            ret.mode = getModeFromUrl();

            if(ret.mode === 'create') {
                ret.data = getDataFromUrl();
                resolve(ret);
            } else {
                var id = getId();
                if(isNumber(id)) {
                    service.get({id:id}).$promise.then(function(value) {
                        ret.data = value;
                        resolve(ret);
                    });
                } else {
                    ret.data = {};
                    resolve(ret);
                }
            }
        })
    }
    
    function getModeFromUrl() {
        var urlParser = parseUrl(window.location);
        if(urlParser.pathname.substr(-'create'.length) === 'create') {
            return 'create';
        } else {
            var params = parseParameters(urlParser.search);
            if(params.hasOwnProperty('edit') && params.edit === 'true') {
                return 'edit';
            } else {
                return 'read';
            }
        }
    }

    function getDataFromUrl() {
        var urlParser = parseUrl(window.location);
        var params = parseParameters(urlParser.search);
        return params;
    }

    function getId() {
        var urlParse = parseUrl(window.location);
        var path = urlParse.pathname;
        var pathComponents = path.split('/');

        var id = pathComponents[pathComponents.length - 1];

        return id;
    }

    function isNumber(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
    }

    function parseUrl(url) {
        var parser = document.createElement('a');
        parser.href = url;

        return parser;
    }

    function parseParameters(paramString) {
        var result = {};

        paramString.substring(1).split("&").forEach(function(part) {
            var item = part.split("=");
            result[item[0]] = decodeURIComponent(item[1]);
        });
        return result;
    }
}