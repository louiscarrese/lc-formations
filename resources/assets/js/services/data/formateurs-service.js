function formateursServiceFactory($resource) {
    return $resource('/api/formateur/:id', null, {
        'update' : { method: 'PUT' }
    });
}
