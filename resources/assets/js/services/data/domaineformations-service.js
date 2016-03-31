function domaineFormationsServiceFactory($resource) {
    return $resource('/intra/api/domaine_formation/:id', null, {
        'update' : { method: 'PUT' }
    });
}
