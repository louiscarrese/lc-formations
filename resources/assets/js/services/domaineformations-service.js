function domaineFormationsServiceFactory($resource) {
    return $resource('/api/domaine_formation/:id', null, {
        'update' : { method: 'PUT' }
    });
}
