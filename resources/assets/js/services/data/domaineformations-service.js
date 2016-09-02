function domaineFormationsServiceFactory($resource) {
    return $resource('/intra/api/domaine_formation/:id', null, {
        'query' : {method: 'GET', isArray: false}, 
        'update' : { method: 'PUT' }
    });
}
