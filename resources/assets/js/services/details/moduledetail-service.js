function moduleDetailServiceFactory(sharedDataService, domaineFormationsService, formateursService, lieuService) {
    return {
        getLinkedData: function() {
            var domaineFormations = domaineFormationsService.query();
            var formateurs = formateursService.query();
            var lieus = lieuService.query();

            return {
                'domaineFormations': domaineFormations,
                'formateurs': formateurs,
                'lieus': lieus,
            };
        },

        getInternalKey: function(data) {
            return data.id;
        },

        getSuccess: function(data) {

            sharedDataService.data.module_id = data.id;

            if(data.formateurs != undefined) {
                data.formateurs_id = [];
                for(var i = 0; i < data.formateurs.length; i++) {
                    data.formateurs_id.push(data.formateurs[i].id);
                }
            }

            //Build the return structure
            return {
                'titleText': data.libelle != undefined ? data.libelle : "Création d'un module"
            }

        },

        getListUrl: function() {
            return '/modules';
        },

        deleteMessage: function() {
            var message = 'Etes vous sur de vouloir supprimer ce module ?';
            message += '\nLes éléments associés suivants seront également supprimés : ';
            message += '\n - Sessions ';
            message += '\n - Inscriptions';
            return message;
        },
    }
}