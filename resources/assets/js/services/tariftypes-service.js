function tarifTypesServiceFactory($resource) {
    return $resource('http://192.168.33.10/laravel/public/tarif_type/:id', null, {
        'update' : { method: 'PUT' }
    });
}