function preinscriptionsServiceFactory($resource) {
    return $resource('/intra/api/preinscription/:id', null, {
        'update' : { method: 'PUT' }
    });
}
