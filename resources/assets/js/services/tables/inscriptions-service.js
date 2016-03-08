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
            data.session.libelle = '';
            if(data.session.firstDate || data.session.lastDate) {
                if(data.session.firstDate) {
                    data.session.libelle += $filter('date')(data.session.firstDate, 'dd/MM/yyyy');
                }
                if(data.session.lastDate) {
                    data.session.libelle += ' - ' + $filter('date')(data.session.lastDate, 'dd/MM/yyyy');
                }
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
                if(item.statut.id == 'pending') {
                    return 'warning';
                } else if(item.statut.id == 'validated') {
                    return 'success';
                } else if(item.statut.id == 'canceled') {
                    return 'danger';
                } else if(item.statut.id == 'withdrawn') {
                    return 'danger';
                }
                return null;
            }
        }
    };
}