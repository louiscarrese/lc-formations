function tarifTypesServiceFactory($resource) {
    return $resource('/intra/api/tarif_type/:id', null, {
        'update' : { method: 'PUT' }
    });
}