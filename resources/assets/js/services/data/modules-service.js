function modulesServiceFactory($resource) {
    return $resource('/intra/api/module/:id', null, {
        'query' : {method: 'GET', isArray: false}, 
        'all' : {
            method: 'GET', 
            url: '/intra/api/module/all',
            isArray: true
        }, 
        'update' : { method: 'PUT' },
        'search' : {
            method: 'GET',
            url: '/intra/api/module/search',
            isArray: true
        }
    });
}

