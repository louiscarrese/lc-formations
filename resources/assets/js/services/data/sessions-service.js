function sessionsServiceFactory($resource, $http, $filter) {
    function buildLibelle(item) {
        var ret = '';
        if(item.firstDate && item.lastDate) {
            ret = '(' + $filter('date')(item.firstDate, 'dd/MM/yyyy');
            ret += ' - ' + $filter('date')(item.lastDate, 'dd/MM/yyyy') + ')';
        }
        return ret;
    };


    return $resource('/api/session/:id', null, {
        'update' : { method: 'PUT' },
        'query' : { 
            method: 'GET',
            isArray: true, 
            transformResponse: $http.defaults.transformResponse.concat([
                function (data, headersGetter) {
                    angular.forEach(data, function(item, idx) {
                        item.libelle = buildLibelle(item);
                    });
                    return data;
                }
            ])
        },
        'get' : {
            method: 'GET',
            transformResponse: $http.defaults.transformResponse.concat([
                function (data, headersGetter) {
                    data.libelle = buildLibelle(data);
                    return data;
                }
            ])
        }
    });
}

