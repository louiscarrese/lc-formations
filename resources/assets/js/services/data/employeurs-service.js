function employeursServiceFactory($resource) {
    return $resource('/intra/api/employeur/:id', null, {
        'query' : {method: 'GET', isArray: false}, 
        'all' : {
            method: 'GET', 
            url: '/intra/api/employeur/all',
            isArray: true
        }, 
        'update' : { method: 'PUT' },
        'search' : {
            method: 'GET',
            url: '/intra/api/employeur/search',
            isArray: true
        }
    });
}
