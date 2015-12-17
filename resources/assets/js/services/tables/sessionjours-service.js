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

            /** Treat dates manually because fuck */
            //1. copy the data
            var dateString = data.date;
            //2. ditch the time
            dateString = dateString.split(' ')[0];
            //3.split it
            var dateParts = dateString.split('-');
            //4.Make it an ISO 8601 string
            var iso8601String = dateParts[0] + '-' + dateParts[1] + '-' + dateParts[2] + 'T00:00:00Z';
            //4. get a real date 
            var date = new Date(iso8601String);
            data.date = date;


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
        }

    };
}