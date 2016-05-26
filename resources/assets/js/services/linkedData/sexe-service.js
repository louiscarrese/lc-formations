function sexeDataServiceFactory($filter, $q) {
    var sexeDataService = angular.extend({}, staticDataFactory($filter, $q));

    sexeDataService.data = [
            {id: 'M', label: 'Mr'},
            {id: 'F', label: 'Mme'}
        ];
    return sexeDataService;
}