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

        deleteMessage: function() {
            var message = 'Etes vous sur de vouloir supprimer cette inscription ?';
            message += '\nLes éléments associés suivants seront également supprimés : ';
            message += '\n - Financements ';
            return message;
        },
    }
}