function inscriptionDetailServiceFactory(sharedDataService, stagiairesService, sessionsService, $filter) {
    function buildSessionLibelle(item) {
        var ret = '';
        if(item.firstDate && item.lastDate) {
            ret = '(' + $filter('date')(item.firstDate, 'dd/MM/yyyy');
            ret += ' - ' + $filter('date')(item.lastDate, 'dd/MM/yyyy') + ')';
        }
        return ret;
    };

    return {
        getLinkedData: function() {
            var stagiaire = stagiairesService.query();
            var session = sessionsService.query();

            return {
                'stagiaire': stagiaire.$promise,
                'session': session.$promise,
            };
        },

        getInternalKey: function(data) {
            return data.id;
        },

        getSuccess: function(data) {

            sharedDataService.data.inscription_id = data.id;

            //We have to rebuild the session name here because it does not come from the session data service
            if(data.session) {
                data.session.libelle = buildSessionLibelle(data.session);
            }

            var titleText = "Création d'une inscription";
            if(data.id != undefined) {
                titleText = 'Inscription de ' + data.stagiaire.prenom + ' ' + data.stagiaire.nom;
                titleText += ' à la formation ' + data.session.module.libelle;
            }

            //Build the return structure
            return {
                'titleText': titleText
            }

        },

        getListUrl: function() {
            return '/inscriptions';
        },

        validateInscription: function(dataService) {
            if(dataService) {
                var resource = dataService.validate({inscription_id: sharedDataService.data.inscription_id});
                return resource.$promise;
            }
        },

        cancelInscription: function(dataService) {
            if(dataService) {
                var resource = dataService.cancel({inscription_id: sharedDataService.data.inscription_id});
                return resource.$promise;
            }
        },

        withdrawInscription: function(dataService) {
            if(dataService) {
                var resource = dataService.withdraw({inscription_id: sharedDataService.data.inscription_id});
                return resource.$promise;
            }
        },

        deleteMessage: function() {
            var message = 'Etes vous sur de vouloir supprimer cette inscription ?';
            message += '\nLes éléments associés suivants seront également supprimés : ';
            message += '\n - Financements ';
            return message;
        },
    }
}