function employeursServiceFactory($resource) {
    return $resource('/intra/api/employeur/:id', null, {
        'update' : { method: 'PUT' }
    });
}
