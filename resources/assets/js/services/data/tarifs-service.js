function tarifsServiceFactory($resource) {
    return $resource('/intra/api/tarif/:id', null, {
        'query' : {method: 'GET', isArray: false}, 
        'update' : { method: 'PUT' }
    });
}
