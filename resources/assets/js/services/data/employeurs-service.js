function employeursServiceFactory($resource) {
    return $resource('/intra/api/employeur/:id', null, {
        'query' : {method: 'GET', isArray: false}, 
        'update' : { method: 'PUT' },
        'search' : {
            method: 'GET',
            url: '/intra/api/employeur/search',
            isArray: true
        }
    });
}
