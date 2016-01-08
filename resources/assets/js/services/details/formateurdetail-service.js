function formateurDetailServiceFactory(sharedDataService, formateurTypesService) {
    return {
        getLinkedData: function() {
            var formateurType = formateurTypesService.query();

            return {
                'formateur_type': formateurType
            };
        },

        getInternalKey: function(data) {
            return data.id;
        },

        getSuccess: function(data) {

            //Build the return structure
            return {
                'titleText': data.id != undefined ? data.prenom + ' ' + data.nom : "Création d'un formateur"
            }

        },

        getListUrl: function() {
            return '/formateurs';
        },
    }
}