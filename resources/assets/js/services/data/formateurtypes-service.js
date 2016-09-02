function formateurTypesServiceFactory($resource) {
    return $resource('/intra/api/formateur_type/:id', null, {
        'query' : {method: 'GET', isArray: false}, 
        'update' : { method: 'PUT' }
    });
}