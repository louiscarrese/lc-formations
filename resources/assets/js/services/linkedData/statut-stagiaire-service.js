function statutStagiaireDataServiceFactory($filter, $q) {
    var statutStagiaireDataService = angular.extend({}, staticDataFactory($filter, $q));

    statutStagiaireDataService.data = [
            {id: 'salarie', label: 'Salarié'},
            {id: 'demandeur_emploi', label: 'Demandeur d\'emploi'},
            {id: 'intermittent', label: 'Intermittent du spectacle'},
            {id: 'rsa', label: 'RSA'},
            {id: 'etudiant', label: 'Etudiant'},
            {id: 'autre', label: 'Autre'},
        ];
    return statutStagiaireDataService;
}