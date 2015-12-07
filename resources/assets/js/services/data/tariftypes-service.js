function tarifTypesServiceFactory($resource) {
    return $resource('/api/tarif_type/:id', null, {
        'update' : { method: 'PUT' }
    });
}