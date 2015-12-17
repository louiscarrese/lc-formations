function moduleDetailServiceFactory(sharedDataService, domaineFormationsService) {
    return {
        getLinkedData: function() {
            var domaineFormations = domaineFormationsService.query();

            return {
                'domaineFormations': domaineFormations
            };
        },

        getInternalKey: function(data) {
            return data.id;
        },

        getSuccess: function(data) {

            sharedDataService.data.module_id = data.id;

            //Build the return structure
            return {
                'titleText': data.libelle != undefined ? data.libelle : "Création d'un module"
            }

        },

        getListUrl: function() {
            return '/modules';
        },
    }
}