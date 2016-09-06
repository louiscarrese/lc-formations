function tarifsTableServiceFactory(sharedDataService, tarifTypesService) {
    return {
        getLinkedData: function() {
            var tarifTypes = tarifTypesService.query();

            return {
                'tarifTypes': tarifTypes.$promise,
            }
        },

        preSend: function(data) {
            data.module_id = sharedDataService.data.module_id;
            return data;
        },

        queryParameters: function() {
            var ret = {};
            if(sharedDataService.data.module_id) {
                ret['module_id'] = sharedDataService.data.module_id;
            }
            return ret;
        }

    };
}
