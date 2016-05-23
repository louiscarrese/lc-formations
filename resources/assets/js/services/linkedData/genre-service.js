function genreDataServiceFactory($filter, $q) {
    var genreDataService = angular.extend({}, staticDataFactory($filter, $q));

    genreDataService.data = [
            {id: 'M', label: 'Mr'},
            {id: 'F', label: 'Mme'}
        ];
    return genreDataService;
}