function stagiaireDetailServiceFactory(sharedDataService, stagiaireTypesService, employeursService) {
    return {
        getLinkedData: function() {
            var stagiaireType = stagiaireTypesService.query();
            var employeur = employeursService.query();

            return {
                'stagiaire_type': stagiaireType,
                'employeur': employeur
            };
        },

        getInternalKey: function(data) {
            return data.id;
        },

        getSuccess: function(data) {
            sharedDataService.data.stagiaire_id = data.id;
            //Build the return structure
            return {
                'titleText': data.id != undefined ? data.prenom + ' ' + data.nom : "Création d'un stagiaire"
            }

        },

        getListUrl: function() {
            return '/stagiaires';
        },

        deleteMessage: function() {
            var message = 'Etes vous sur de vouloir supprimer ce stagiaire ?';
            message += '\nLes éléments associés suivants seront également supprimés : ';
            message += '\n - Inscriptions ';
            return message;
        },
    }
}