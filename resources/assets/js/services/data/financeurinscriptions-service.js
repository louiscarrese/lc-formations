function financeurInscriptionsServiceFactory($resource) {
    return $resource('/api/financeur_inscription/:id', null, {
        'update' : { method: 'PUT' }
    });
}
