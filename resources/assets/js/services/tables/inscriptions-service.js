function inscriptionsTableServiceFactory($filter, sharedDataService) {
    return {
        queryParameters: function() {
            var ret = {};
            if(sharedDataService.data.stagiaire_id) {
                ret['stagiaire_id'] = sharedDataService.data.stagiaire_id;
            } else if(sharedDataService.data.session_id) {
                ret['session_id'] = sharedDataService.data.session_id;
            }
            return ret;
        },

        getSuccess:  function(data) {
            if(data.session.firstDate || data.session.lastDate) {
                data.session.libelle = ' (';
                if(data.session.firstDate) {
                    data.session.libelle += $filter('date')(data.session.firstDate, 'dd/MM/yyyy');
                }
                if(data.session.lastDate) {
                    data.session.libelle += ' - ' + $filter('date')(data.session.lastDate, 'dd/MM/yyyy');
                }
                data.session.libelle += ')';
            }
        },

        deleteMessage: function() {
            var message = 'Etes vous sur de vouloir supprimer cette inscription ?';
            message += '\nLes éléments associés suivants seront également supprimés : ';
            message += '\n - Financements ';
            return message;
        },

        addListeners: function(ctrl) {
            ctrl.getRowClass = function(item) {
                if(item.statut == 'pending') {
                    return 'warning';
                } else if(item.statut == 'validated') {
                    return 'success';
                } else if(item.statut == 'canceled') {
                    return 'danger';
                } else if(item.statut == 'withdrawn') {
                    return 'danger';
                }
                return null;
            }
        }
    };
}