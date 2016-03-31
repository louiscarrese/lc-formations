function niveauFormationsServiceFactory($resource) {
    return $resource('/intra/api/niveau_formation/:id', null, {
        'update' : { method: 'PUT' }
    });
}