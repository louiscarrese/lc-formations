function stagiaireDetailServiceFactory(sharedDataService, stagiaireTypesService, employeursService, niveauFormationsService) {
    return {
        getLinkedData: function() {
            var stagiaireType = stagiaireTypesService.query();
            var employeur = employeursService.query({forceNoPaginate: true});
            var niveau_formation = niveauFormationsService.query();

            return {
                'stagiaire_type': stagiaireType.$promise,
                'employeur': employeur.$promise,
                'niveau_formation': niveau_formation.$promise
            };
        },

        getInternalKey: function(data) {
            return data.id;
        },

        getSuccess: function(data) {
            sharedDataService.data.stagiaire_id = data.id;
        },

        titleText: function(data) {
            return data.id != undefined ? data.prenom + ' ' + data.nom : "Création d'un stagiaire";
        },

        getListUrl: function() {
            return '/intra/stagiaires';
        },

        deleteMessage: function() {
            var message = 'Etes vous sur de vouloir supprimer ce stagiaire ?';
            message += '\nLes éléments associés suivants seront également supprimés : ';
            message += '\n - Inscriptions ';
            return message;
        },
    }
}