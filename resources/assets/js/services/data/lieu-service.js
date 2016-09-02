function lieuServiceFactory($resource) {
    return $resource('/intra/api/lieu/:id', null, {
        'query' : {method: 'GET', isArray: false}, 
        'update' : { method: 'PUT' }
    });
}
