function moduleDetailServiceFactory($filter, sharedDataService, domaineFormationsService, formateursService, lieuService) {
    function timeFormat(input) {
        var ret = input;  
        if(angular.isDate(input)) {
            ret = $filter('date')(input, 'HH:mm');
        }
        return ret;
    }

    return {
        getLinkedData: function() {
            var domaineFormations = domaineFormationsService.query();
            var formateurs = formateursService.query();
            var lieus = lieuService.query();

            return {
                'domaineFormations': domaineFormations.$promise,
                'formateurs': formateurs.$promise,
                'lieus': lieus.$promise,
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
        },
        
        titleText: function(data) {
            return data.libelle != undefined ? data.libelle : "Création d'un module";
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

        preSend: function(originalData) {
            var ret = angular.copy(originalData);

            ret.heure_debut = timeFormat(ret.heure_debut);
            ret.heure_fin = timeFormat(ret.heure_fin);

            return ret;
        },
    }
}