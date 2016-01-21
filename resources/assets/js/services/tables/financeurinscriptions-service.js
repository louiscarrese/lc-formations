function financeurInscriptionsTableServiceFactory(sharedDataService, financeursService) {
    return {
        getLinkedData: function() {
            var financeurs = financeursService.query();

            return {
                'financeurs': financeurs,
            }
        },


        preSend: function(data, parentController) {
            data.inscription_id = sharedDataService.data.inscription_id;
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