function stagiairesServiceFactory($resource) {
    return $resource('/intra/api/stagiaire/:id', null, {
        'query' : {method: 'GET', isArray: false}, 
        'update' : { method: 'PUT' },
        'search' : {
            method: 'GET',
            url: '/intra/api/stagiaire/search',
            isArray: false
        }
    });
}
