function sessionsServiceFactory($resource) {
    return $resource('/api/session/:id', null, {
        'update' : { method: 'PUT' }
    });
}

