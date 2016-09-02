function preinscriptionsServiceFactory($resource) {
    return $resource('/intra/api/preinscription/:id', null, {
        'query' : {method: 'GET', isArray: false}, 
        'update' : { method: 'PUT' }
    });
}
