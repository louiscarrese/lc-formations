function formateurTypesServiceFactory($resource) {
    return $resource('/intra/api/formateur_type/:id', null, {
        'update' : { method: 'PUT' }
    });
}