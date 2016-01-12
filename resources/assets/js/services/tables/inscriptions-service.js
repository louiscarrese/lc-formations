function inscriptionsTableServiceFactory(sharedDataService) {
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
        }

    };
}