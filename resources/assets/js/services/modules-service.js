function modulesServiceFactory($resource) {
    return $resource('/api/module/:id', null, {
        'update' : { method: 'PUT' }
    });
}

