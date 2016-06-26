function sessionsServiceFactory($resource) {
    return $resource('/intra/api/session/:id', null, {
        'update' : { 
            method: 'PUT'
        },
        mailFormateurs : { 
            url: '/intra/api/session/mail_formateurs',
            method: 'GET', 
            params: {session_id: '@session_id'} 
        }
    });
}

