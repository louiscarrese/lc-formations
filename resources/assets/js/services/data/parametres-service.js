function parametresServiceFactory($resource) {
    return $resource('/intra/api/parametre/:id', null, {
        'update' : { method: 'PUT' }
    });
}