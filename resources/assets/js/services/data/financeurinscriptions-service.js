function financeurInscriptionsServiceFactory($resource) {
    return $resource('/intra/api/financeur_inscription/:id', null, {
        'query' : {method: 'GET', isArray: false}, 
        'update' : { method: 'PUT' }
    });
}
