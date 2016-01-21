function sessionJoursTableServiceFactory(sharedDataService, lieuService, formateursService) {
    return {
        getLinkedData: function() {
            var lieus = lieuService.query();
            var formateurs = formateursService.query();

            return {
                'lieus': lieus,
                'formateurs': formateurs
            }
        },

        getSuccess: function(data) {

            if(data.formateurs != undefined) {
                data.formateurs_id = [];
                for(var i = 0; i < data.formateurs.length; i++) {
                    data.formateurs_id.push(data.formateurs[i].id);
                }
            }

            //Build the return structure
            return {
            };

        },

        preSend: function(data, parentController) {
            data.session_id = sharedDataService.data.session_id;
        },

        queryParameters: function() {
            var ret = {};
            if(sharedDataService.data.session_id) {
                ret['session_id'] = sharedDataService.data.session_id;
            }
            return ret;
        },

        autoAdd: function(dataService, form, autoAddObject) {
            if(dataService && autoAddObject && form) {
                if(form.$valid) {
                    var query = dataService.createDefault({}, 
                            { session_id: sharedDataService.data.session_id, base_date: autoAddObject.date }
                        );
                    return query.$promise;
                }
            }
        },

        deleteMessage: function() {
            var message = 'Etes vous sur de vouloir supprimer ce jour de session ?';
            return message;
        },

    };
}