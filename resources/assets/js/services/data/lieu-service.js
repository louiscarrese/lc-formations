function lieuServiceFactory($resource) {
    return $resource('/api/lieu/:id', null, {
        'update' : { method: 'PUT' }
    });
}
