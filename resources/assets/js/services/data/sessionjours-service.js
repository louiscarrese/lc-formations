function sessionJoursServiceFactory($resource) {
    return $resource('/api/session_jour/:id', null, {
        'update' : { method: 'PUT' }
    });
}
