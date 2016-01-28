function sessionsTableServiceFactory($filter, sharedDataService) {
    //It would deserve to factorize with sessionDetailService.titleText
    function buildSessionLibelle(item) {
        var ret = '';
        if(item.firstDate && item.lastDate) {
            ret = '(' + $filter('date')(item.firstDate, 'dd/MM/yyyy');
            ret += ' - ' + $filter('date')(item.lastDate, 'dd/MM/yyyy') + ')';
        }
        return ret;
    };

    return {
        queryParameters: function() {
            var ret = {};
            if(sharedDataService.data.module_id) {
                ret['module_id'] = sharedDataService.data.module_id;
            }
            return ret;
        },

        deleteMessage: function() {
            var message = 'Etes vous sur de vouloir supprimer cette session ?';
            message += '\nLes éléments associés suivants seront également supprimés : ';
            message += '\n - Inscriptions ';
            return message;
        },

        getSuccess: function(data) {
            data.libelle = buildSessionLibelle(data);
        }
    };
}
