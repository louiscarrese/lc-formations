function financeurTypesServiceFactory($resource) {
    return $resource('/api/financeur_type/:id', null, {
        'update' : { method: 'PUT' }
    });
}