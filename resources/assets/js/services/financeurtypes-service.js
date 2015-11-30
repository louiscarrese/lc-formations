function financeurTypesServiceFactory($resource) {
    return $resource('http://192.168.33.10/laravel/public/api/financeur_type/:id', null, {
        'update' : { method: 'PUT' }
    });
}