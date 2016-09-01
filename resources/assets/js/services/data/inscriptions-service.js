function inscriptionsServiceFactory($resource) {
    return $resource('/intra/api/inscription/:id', null, {
        'query' : {method: 'GET', isArray: false}, 
        'all' : {
            method: 'GET', 
            url: '/intra/api/inscription/all',
            isArray: true
        }, 
        'update' : { method: 'PUT' },
        'en_cours': {
            url: '/intra/api/inscription/en_cours',
            method: 'GET',
            isArray: true
        },
        'search' : {
            method: 'GET',
            url: '/intra/api/inscription/search',
            isArray: true
        }
    });
}