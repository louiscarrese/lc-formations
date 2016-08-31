function employeursServiceFactory($resource) {
    return $resource('/intra/api/employeur/:id', null, {
        'query' : {method: 'GET', isArray: false}, 
        'update' : { method: 'PUT' }
    });
}
