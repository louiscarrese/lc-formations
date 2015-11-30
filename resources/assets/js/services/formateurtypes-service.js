function formateurTypesServiceFactory($resource) {
    return $resource('/api/formateur_type/:id', null, {
        'update' : { method: 'PUT' }
    });
}