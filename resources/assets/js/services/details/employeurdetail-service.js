function employeurDetailServiceFactory(sharedDataService) {
    return {

        getInternalKey: function(data) {
            return data.id;
        },

        getSuccess: function(data) {

            //Build the return structure
            return {
                'titleText': data.libelle != undefined ? data.libelle : "Création d'un employeur"
            }

        },

        getListUrl: function() {
            return '/employeurs';
        },
    }
}