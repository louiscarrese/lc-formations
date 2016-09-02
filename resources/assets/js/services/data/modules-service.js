function modulesServiceFactory($resource) {
    return $resource('/intra/api/module/:id', null, {
        'query' : {method: 'GET', isArray: false}, 
        'update' : { method: 'PUT' },
        'search' : {
            method: 'GET',
            url: '/intra/api/module/search',
            isArray: true
        }
    });
}

