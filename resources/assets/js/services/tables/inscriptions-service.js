function inscriptionsTableServiceFactory($filter, sharedDataService) {
    return {
        queryParameters: function() {
            var ret = {};
            if(sharedDataService.data.stagiaire_id) {
                ret['stagiaire_id'] = sharedDataService.data.stagiaire_id;
            }
            return ret;
        },

        getRowClass: function(item) {
            if(item.statut == 'pending') {
                return 'warning';
            } else if(item.statut == 'validated') {
                return 'success';
            } else if(item.statut == 'canceled') {
                return 'danger';
            }
            return null;
        },

        getSuccess:  function(data) {
                if(data.session.firstDate && data.session.lastDate) {
                    data.session.libelle = '(' + $filter('date')(data.session.firstDate, 'dd/MM/yyyy');
                    data.session.libelle += ' - ' + $filter('date')(data.session.lastDate, 'dd/MM/yyyy') + ')';
                } else {
                    data.session.libelle = '';
                }
        }
    };
}