function formateurTypesServiceFactory($resource) {
    return $resource('http://192.168.33.10/laravel/public/formateur_type/:id', null, {
        'update' : { method: 'PUT' }
    });
}