function domaineFormationsServiceFactory($resource) {
    return $resource('http://192.168.33.10/laravel/public/api/domaine_formation/:id', null, {
        'update' : { method: 'PUT' }
    });
}
