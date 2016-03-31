function formateursServiceFactory($resource) {
    return $resource('/intra/api/formateur/:id', null, {
        'update' : { method: 'PUT' }
    });
}
