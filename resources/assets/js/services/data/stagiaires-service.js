function stagiairesServiceFactory($resource) {
    return $resource('/intra/api/stagiaire/:id', null, {
        'update' : { method: 'PUT' },
        'search' : {
            method: 'GET',
            url: '/intra/api/stagiaire/search',
            isArray: true
        }
    });
}
