function financeurInscriptionsServiceFactory($resource) {
    return $resource('/intra/api/financeur_inscription/:id', null, {
        'update' : { method: 'PUT' }
    });
}
