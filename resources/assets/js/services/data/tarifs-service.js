function tarifsServiceFactory($resource) {
    return $resource('/api/tarif/:id', null, {
        'update' : { method: 'PUT' }
    });
}
