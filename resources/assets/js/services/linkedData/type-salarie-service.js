function salarieTypeDataServiceFactory($filter, $q) {
    var salarieTypeDataService = angular.extend({}, staticDataFactory($filter, $q));

    salarieTypeDataService.data = [
            {id: 'cdi', label: 'CDI'},
            {id: 'cdd', label: 'CDD'},
            {id: 'cui_cae', label: 'CUI/CAE'},
            {id: 'autre', label: 'Autre', precision: true}
        ];
    return salarieTypeDataService;
}