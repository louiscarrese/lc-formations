function moduleDetailServiceFactory(domaineFormationsService) {
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
            if(data.domaine_formation_id != undefined) {
                data.module_formation_label = data.domaine_formation.libelle;
            }
            return data;
        },

        getListUrl: function() {
            return '/modules';
        }
    }
}