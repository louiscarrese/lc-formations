function adherentDataServiceFactory($filter, $q) {
    var adherentDataService = angular.extend({}, staticDataFactory($filter, $q));

    adherentDataService.data = [
            {id: 'true', label: 'Déjà adhérent'},
            {id: 'false', label: 'Nouvel adhérent'}
        ];
    return adherentDataService;
}