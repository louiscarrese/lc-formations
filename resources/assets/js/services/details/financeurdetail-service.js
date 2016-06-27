function financeurDetailServiceFactory(sharedDataService, financeurTypesService) {
    return {
        getLinkedData: function() {
            var financeurType = financeurTypesService.query();

            return {
                'financeur_type': financeurType.$promise
            };
        },

        getInternalKey: function(data) {
            return data.id;
        },

        titleText: function(data) {
            return data.id != undefined ? data.libelle : "Création d'un financeur"
        },

        getListUrl: function() {
            return '/intra/financeurs';
        },

        deleteMessage: function() {
            var message = 'Etes vous sur de vouloir supprimer ce financeur ?';
            message += '\nLes éléments associés suivants seront également supprimés : ';
            message += '\n - Financements ';
            return message;
        },

    }
}