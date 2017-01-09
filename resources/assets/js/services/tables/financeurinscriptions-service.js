function financeurInscriptionsTableServiceFactory(sharedDataService, financeursService) {
    return {
        getLinkedData: function() {
            var financeurs = financeursService.query({forceNoPaginate: true});

            return {
                'financeurs': financeurs.$promise,
            }
        },


        preSend: function(data) {
            data.inscription_id = sharedDataService.data.inscription_id;
            return data;
        },

        queryParameters: function() {
            var ret = {};
            if(sharedDataService.data.inscription_id) {
                ret['inscription_id'] = sharedDataService.data.inscription_id;
            }
            return ret;
        },

        deleteMessage: function() {
            var message = 'Etes vous sur de vouloir supprimer ce financement ?';
            return message;
        },

    };
}
