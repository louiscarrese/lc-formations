function sessionsServiceFactory($resource) {
    return $resource('/intra/api/session/:id', null, {
        'update' : { 
            method: 'PUT'
        },
    });
}

