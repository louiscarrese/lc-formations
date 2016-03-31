function financeurTypesServiceFactory($resource) {
    return $resource('/intra/api/financeur_type/:id', null, {
        'update' : { method: 'PUT' }
    });
}