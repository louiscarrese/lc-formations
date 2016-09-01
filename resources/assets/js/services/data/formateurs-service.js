function formateursServiceFactory($resource) {
    return $resource('/intra/api/formateur/:id', null, {
        'query' : {method: 'GET', isArray: false}, 
        'all' : {
            method: 'GET', 
            url: '/intra/api/formateur/all',
            isArray: true
        }, 
        'update' : { method: 'PUT' },
        'search' : {
            method: 'GET',
            url: '/intra/api/formateur/search',
            isArray: true
        }
    });
}
