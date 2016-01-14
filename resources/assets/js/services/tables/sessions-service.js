function sessionsTableServiceFactory(sharedDataService) {
    return {
        queryParameters: function() {
            var ret = {};
            if(sharedDataService.data.module_id) {
                ret['module_id'] = sharedDataService.data.module_id;
            }
            return ret;
        },

	getSuccess:  function(data) {
            if(data.firstDate && data.lastDate) {
                data.libelle = '(' + $filter('date')(data.firstDate, 'dd/MM/yyyy');
                data.libelle += ' - ' + $filter('date')(data.lastDate, 'dd/MM/yyyy') + ')';
            } else {
                data.libelle = '';
            }
	}
    };
}
