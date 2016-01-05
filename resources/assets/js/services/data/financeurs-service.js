function financeursServiceFactory($resource) {
    return $resource('/api/financeur/:id', null, {
        'update' : { method: 'PUT' }
    });
}
