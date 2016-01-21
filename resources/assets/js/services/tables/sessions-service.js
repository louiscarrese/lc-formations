function sessionsTableServiceFactory($filter, sharedDataService) {
    return {
        queryParameters: function() {
            var ret = {};
            if(sharedDataService.data.module_id) {
                ret['module_id'] = sharedDataService.data.module_id;
            }
            return ret;
        },

        deleteMessage: function() {
            var message = 'Etes vous sur de vouloir supprimer cette session ?';
            message += '\nLes éléments associés suivants seront également supprimés : ';
            message += '\n - Inscriptions ';
            return message;
        },
    };
}
