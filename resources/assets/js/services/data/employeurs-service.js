function employeursServiceFactory($resource) {
    return $resource('/api/employeur/:id', null, {
        'update' : { method: 'PUT' }
    });
}
