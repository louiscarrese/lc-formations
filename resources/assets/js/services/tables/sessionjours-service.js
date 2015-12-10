function sessionJoursTableServiceFactory(sharedDataService, lieuService) {
    return {
        getLinkedData: function() {
            var lieus = lieuService.query();

            return {
                'lieus': lieus
            }
        },

        getSuccess: function(data) {
            //Modify data
            if(data.lieu_id != undefined) {
                data.lieu_label = data.lieu.libelle;
            }

            //Build the return structure
            return {
            };
        },

        preSend: function(data, parentController) {
            data.session_id = sharedDataService.data.session_id;
        }

    };
}