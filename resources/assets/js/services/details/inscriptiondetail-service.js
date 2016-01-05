function inscriptionDetailServiceFactory(sharedDataService, stagiairesService, sessionsService) {
    return {
        getLinkedData: function() {
            var stagiaire = stagiairesService.query();
            var session = sessionsService.query();

            return {
                'stagiaire': stagiaire,
                'session': session,
            };
        },

        getInternalKey: function(data) {
            return data.id;
        },

        getSuccess: function(data) {

            sharedDataService.data.inscription_id = data.id;

            //Build the return structure
            return {
                'titleText': data.libelle != undefined ? data.libelle : "Création d'un inscription"
            }

        },

        getListUrl: function() {
            return '/inscriptions';
        },
    }
}