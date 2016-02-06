function sessionJoursTableServiceFactory($filter, sharedDataService, lieuService, formateursService) {
    function timeFormat(input) {
        var ret = input;  
        if(angular.isDate(input)) {
            ret = $filter('date')(input, 'HH:mm');
        }
        return ret;
    }

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

        preSend: function(data) {
            var ret = angular.copy(data);

            ret.session_id = sharedDataService.data.session_id;

            ret.heure_debut = timeFormat(ret.heure_debut);
            ret.heure_fin = timeFormat(ret.heure_fin);

            return ret;
        },

        queryParameters: function() {
            var ret = {};
            if(sharedDataService.data.session_id) {
                ret['session_id'] = sharedDataService.data.session_id;
            }
            return ret;
        },

        deleteMessage: function() {
            var message = 'Etes vous sur de vouloir supprimer ce jour de session ?';
            return message;
        },

        addListeners: function(ctrl) {
            ctrl.autoAdd = function(ctrls) {
                if(ctrl.form_autoAdd.$valid) {
                    var query = ctrl.dataService.createDefault({}, 
                            { session_id: sharedDataService.data.session_id, base_date: ctrl.autoAddObject.date }
                        ,function() {
                            angular.forEach(ctrls, function(controller) {
                                controller.refreshData();
                            })
                        });
                }
            }
        },
    };
}