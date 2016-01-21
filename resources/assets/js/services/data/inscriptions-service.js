function inscriptionsServiceFactory($resource) {
    return $resource('/api/inscription/:id', null, {
        'update' : { method: 'PUT' },
        validate: {
            url: '/api/inscription/validate/:inscription_id',
            method: 'GET'
        },
        cancel: {
            url: '/api/inscription/cancel/:inscription_id',
            method: 'GET'
        },
        withdraw: {
            url: '/api/inscription/withdraw/:inscription_id',
            method: 'GET'
        }
    });
}