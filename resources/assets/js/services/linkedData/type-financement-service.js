function financementTypeDataServiceFactory($filter, $q) {
    var financementTypeDataService = angular.extend({}, staticDataFactory($filter, $q));

    financementTypeDataService.data = [
            {id: 'employeur', label: 'Financement par l\'employeur'},
            {id: 'personnel', label: 'Financement personnel'},
            {id: 'afdas', label: 'Financement AFDAS'},
            {id: 'autre', label: 'Autres types de financements'},
        ];
    return financementTypeDataService;
}