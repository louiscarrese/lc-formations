function niveauFormationsServiceFactory($resource) {
    return $resource('/api/niveau_formation/:id', null, {
        'update' : { method: 'PUT' }
    });
}