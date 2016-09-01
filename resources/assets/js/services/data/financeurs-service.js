function financeursServiceFactory($resource) {
    return $resource('/intra/api/financeur/:id', null, {
        'query' : {method: 'GET', isArray: false}, 
        'all' : {
            method: 'GET', 
            url: '/intra/api/financeur/all',
            isArray: true
        }, 
        'update' : { method: 'PUT' },
        'search' : {
            method: 'GET',
            url: '/intra/api/financeur/search',
            isArray: true
        }
    });
}
