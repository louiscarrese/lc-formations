function tarifsServiceFactory($resource) {
    return $resource('/intra/api/tarif/:id', null, {
        'update' : { method: 'PUT' }
    });
}
