function stagiairesServiceFactory($resource) {
    return $resource('/intra/api/stagiaire/:id', null, {
        'query' : {method: 'GET', isArray: false}, 
        'all' : {
            method: 'GET', 
            url: '/intra/api/stagiaire/all',
            isArray: true
        }, 
        'update' : { method: 'PUT' },
        'search' : {
            method: 'GET',
            url: '/intra/api/stagiaire/search',
            isArray: true
        }
    });
}
