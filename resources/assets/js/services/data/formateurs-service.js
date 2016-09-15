function formateursServiceFactory($resource) {
    return $resource('/intra/api/formateur/:id', null, {
        'query' : {method: 'GET', isArray: false}, 
        'update' : { method: 'PUT' },
        'search' : {
            method: 'GET',
            url: '/intra/api/formateur/search',
            isArray: false
        }
    });
}
