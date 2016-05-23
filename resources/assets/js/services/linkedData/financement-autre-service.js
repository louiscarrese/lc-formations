function financementAutreDataServiceFactory($filter, $q) {
    var financementAutreDataService = angular.extend({}, staticDataFactory($filter, $q));

    financementAutreDataService.data = [
            {id: 'conseil_regional', label: 'Conseil régional'},
            {id: 'conseil_general', label: 'Conseil général'},
            {id: 'pole_emploi', label: 'Pôle emploi'},
            {id: 'association', label: 'L\'association dans laquelle je suis bénévole'},
            {id: 'opca', label: 'Autre OPCA', precision: true},
            {id: 'autre', label: 'Autre', precision: true},
        ];
    return financementAutreDataService;
}