function tarifTypesServiceFactory($resource) {
    return $resource('/intra/api/tarif_type/:id', null, {
        'query' : {method: 'GET', isArray: false}, 
        'update' : { method: 'PUT' }
    });
}