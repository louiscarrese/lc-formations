function financeurTypesServiceFactory($resource) {
    return $resource('/intra/api/financeur_type/:id', null, {
        'query' : {method: 'GET', isArray: false}, 
        'update' : { method: 'PUT' }
    });
}