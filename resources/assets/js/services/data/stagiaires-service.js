function stagiairesServiceFactory($resource) {
    return $resource('/api/stagiaire/:id', null, {
        'update' : { method: 'PUT' }
    });
}
