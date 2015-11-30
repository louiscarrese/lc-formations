function modulesServiceFactory($resource) {
    return $resource('http://192.168.33.10/laravel/public/api/module/:id', null, {
        'update' : { method: 'PUT' }
    });
}

