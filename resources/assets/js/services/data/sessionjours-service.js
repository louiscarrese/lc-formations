function sessionJoursServiceFactory($resource) {
    return $resource('/api/session_jour/:id', null, {
        update : { method: 'PUT' },
        createDefault : { 
            url: '/api/session_jour/create_default',
            method: 'POST', 
            params: {session_id: '@session_id', base_date: '@base_date'} 
        }
    });
}

