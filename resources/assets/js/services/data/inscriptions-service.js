function inscriptionsServiceFactory($resource) {
    return $resource('/intra/api/inscription/:id', null, {
        'query' : {method: 'GET', isArray: false}, 
        'update' : { method: 'PUT' },
        'en_cours': {
            url: '/intra/api/inscription/en_cours',
            method: 'GET',
            isArray: false
        },
        'search' : {
            method: 'GET',
            url: '/intra/api/inscription/search',
            isArray: false
        }
    });
}
