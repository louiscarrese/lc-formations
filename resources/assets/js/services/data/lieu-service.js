function lieuServiceFactory($resource) {
    return $resource('/intra/api/lieu/:id', null, {
        'update' : { method: 'PUT' }
    });
}
