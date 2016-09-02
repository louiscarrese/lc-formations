function niveauFormationsServiceFactory($resource) {
    return $resource('/intra/api/niveau_formation/:id', null, {
        'query' : {method: 'GET', isArray: false}, 
        'update' : { method: 'PUT' }
    });
}