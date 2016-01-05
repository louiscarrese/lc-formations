function financeurDetailServiceFactory(sharedDataService, financeurTypesService) {
    return {
        getLinkedData: function() {
            var financeurType = financeurTypesService.query();

            return {
                'financeur_type': financeurType
            };
        },

        getInternalKey: function(data) {
            return data.id;
        },

        getSuccess: function(data) {

            //Build the return structure
            return {
                'titleText': data.libelle != undefined ? data.libelle : "Création d'un financeur"
            }

        },

        getListUrl: function() {
            return '/financeurs';
        },
    }
}