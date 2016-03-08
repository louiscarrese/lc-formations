function inscriptionsServiceFactory($resource) {
    return $resource('/api/inscription/:id', null, {
        'update' : { method: 'PUT' }
    });
}