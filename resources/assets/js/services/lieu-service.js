function lieuServiceFactory($resource) {
    return $resource('http://192.168.33.10/laravel/public/api/lieu/:id', null, {
        'update' : { method: 'PUT' }
    });
}
