function modulesServiceFactory($resource) {
    return $resource('/intra/api/module/:id', null, {
        'update' : { method: 'PUT' }
    });
}

