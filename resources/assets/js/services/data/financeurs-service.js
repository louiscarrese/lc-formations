function financeursServiceFactory($resource) {
    return $resource('/intra/api/financeur/:id', null, {
        'update' : { method: 'PUT' }
    });
}
