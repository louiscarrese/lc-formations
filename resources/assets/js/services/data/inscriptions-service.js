function inscriptionsServiceFactory($resource) {
    return $resource('/intra/api/inscription/:id', null, {
        'update' : { method: 'PUT' }
    });
}