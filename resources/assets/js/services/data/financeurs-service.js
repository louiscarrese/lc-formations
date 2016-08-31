function financeursServiceFactory($resource) {
    return $resource('/intra/api/financeur/:id', null, {
        'query' : {method: 'GET', isArray: false}, 
        'update' : { method: 'PUT' }
    });
}
