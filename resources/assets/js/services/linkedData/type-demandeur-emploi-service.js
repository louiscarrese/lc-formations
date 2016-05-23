function demandeurEmploiTypeDataServiceFactory($filter, $q) {
    var demandeurEmploiTypeDataService = angular.extend({}, staticDataFactory($filter, $q));

    demandeurEmploiTypeDataService.data = [
            {id: 'indemnise', label: 'Indemnisé'},
            {id: 'non_indemnise', label: 'Non indemnisé'},
        ];
    return demandeurEmploiTypeDataService;
}