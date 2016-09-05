function sessionsServiceFactory($resource) {
    return $resource('/intra/api/session/:id', null, {
        'query' : {method: 'GET', isArray: false}, 
        'all' : {
            method: 'GET', 
            url: '/intra/api/session/all',
            isArray: true
        }, 
        'update' : { 
            method: 'PUT'
        },
        mailFormateurs : { 
            url: '/intra/api/session/mail_formateurs',
            method: 'GET', 
            params: {session_id: '@session_id'} 
        },
        'upcoming': {
            url: '/intra/api/session/upcoming',
            method: 'GET',
            isArray: false
        },
        'search' : {
            method: 'GET',
            url: '/intra/api/session/search',
            isArray: true
        }
    });
}

