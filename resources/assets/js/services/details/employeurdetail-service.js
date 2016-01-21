function employeurDetailServiceFactory(sharedDataService) {
    return {

        getInternalKey: function(data) {
            return data.id;
        },

        getSuccess: function(data) {

            //Build the return structure
            return {
                'titleText': data.id != undefined ? data.raison_sociale : "Création d'un employeur"
            }

        },

        getListUrl: function() {
            return '/employeurs';
        },

        deleteMessage: function() {
            var message = 'Etes vous sur de vouloir supprimer cet employeur ?';
            return message;
        },
    }
}