function financementAfdasDataServiceFactory($filter, $q) {
    var financementAfdasDataService = angular.extend({}, staticDataFactory($filter, $q));

    financementAfdasDataService.data = [
            {id: 'intermittent', label: 'Je suis demandeur d\'emploi'},
            {id: 'non_intermittent', label: 'Je ne suis pas intermittent mais justifie du nombre de jours de travail requis'},
        ];
    return financementAfdasDataService;
}