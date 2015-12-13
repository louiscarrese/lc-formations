function sessionsTableServiceFactory(sharedDataService) {
    return {
        queryParameters: function() {
            var ret = {};
            if(sharedDataService.data.module_id) {
                ret['module_id'] = sharedDataService.data.module_id;
            }
            return ret;
        }

    };
}