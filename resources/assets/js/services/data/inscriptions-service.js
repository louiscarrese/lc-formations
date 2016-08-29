function inscriptionsServiceFactory($resource) {
    return $resource('/intra/api/inscription/:id', null, {
        'update' : { method: 'PUT' },
        'en_cours': {
            url: '/intra/api/inscription/en_cours',
            method: 'GET',
            isArray: true
        }
    });
}