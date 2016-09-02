function parametresServiceFactory($resource) {
    return $resource('/intra/api/parametre/:id', null, {
        'query' : {method: 'GET', isArray: false}, 
        'update' : { method: 'PUT' }
    });
}