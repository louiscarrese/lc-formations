function moduleDetailServiceFactory(sharedDataService, domaineFormationsService, dateTimeService) {
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
/*
            data.heure_debut = dateTimeService.stringtoUTCTime(data.heure_debut);
            data.heure_fin = dateTimeService.stringtoUTCTime(data.heure_fin);
*/
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