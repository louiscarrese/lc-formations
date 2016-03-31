function stagiairesServiceFactory($resource) {
    return $resource('/intra/api/stagiaire/:id', null, {
        'update' : { method: 'PUT' }
    });
}
