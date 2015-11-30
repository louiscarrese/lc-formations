function formateurTypesServiceFactory($resource) {
    return $resource('http://192.168.33.10/laravel/public/api/formateur_type/:id', null, {
        'update' : { method: 'PUT' }
    });
}