function inscriptionsTableServiceFactory(sharedDataService) {
    return {
        queryParameters: function() {
            var ret = {};
            if(sharedDataService.data.stagiaire_id) {
                ret['stagiaire_id'] = sharedDataService.data.stagiaire_id;
            }
            return ret;
        }

    };
}