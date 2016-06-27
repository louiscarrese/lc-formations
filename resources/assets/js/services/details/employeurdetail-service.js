function employeurDetailServiceFactory(sharedDataService) {
    return {

        getInternalKey: function(data) {
            return data.id;
        },

        titleText: function(data) {
            return data.id != undefined ? data.raison_sociale : "Création d'un employeur";
        },

        getListUrl: function() {
            return '/intra/employeurs';
        },

        deleteMessage: function() {
            var message = 'Etes vous sur de vouloir supprimer cet employeur ?';
            return message;
        },
    }
}