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

        getSuccess: function(data) {

            //Build the return structure
            return {
                'titleText': data.id != undefined ? data.libelle : "Création d'un financeur"
            }

        },

        getListUrl: function() {
            return '/financeurs';
        },

        deleteMessage: function() {
            var message = 'Etes vous sur de vouloir supprimer ce financeur ?';
            message += '\nLes éléments associés suivants seront également supprimés : ';
            message += '\n - Financements ';
            return message;
        },

    }
}