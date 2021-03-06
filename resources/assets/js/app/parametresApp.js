angular.module('parametresApp', ['editableTable', 'ngResource'])
    .factory('stagiaireTypesService', ['$resource', stagiaireTypesServiceFactory])
    .factory('formateurTypesService', ['$resource', formateurTypesServiceFactory])
    .factory('financeurTypesService', ['$resource', financeurTypesServiceFactory])
    .factory('tarifTypesService', ['$resource', tarifTypesServiceFactory])
    .factory('domaineFormationsService', ['$resource', domaineFormationsServiceFactory])
    .factory('lieuService', ['$resource', lieuServiceFactory])
    .factory('niveauFormationsService', ['$resource', niveauFormationsServiceFactory])
    .factory('parametresService', ['$resource', parametresServiceFactory])

    .controller('stagiaireTypesController', ['$scope', '$filter', '$attrs', '$q', 'stagiaireTypesService', editableTableController])
    .controller('formateurTypesController', ['$scope', '$filter', '$attrs', '$q', 'formateurTypesService', editableTableController])
    .controller('financeurTypesController', ['$scope', '$filter', '$attrs', '$q', 'financeurTypesService', editableTableController])
    .controller('tarifTypesController', ['$scope', '$filter', '$attrs', '$q', 'tarifTypesService', editableTableController])
    .controller('domaineFormationsController', ['$scope', '$filter', '$attrs', '$q', 'domaineFormationsService', editableTableController])
    .controller('lieuController', ['$scope', '$filter', '$attrs', '$q', 'lieuService', editableTableController])
    .controller('niveauFormationsController', ['$scope', '$filter', '$attrs', '$q', 'niveauFormationsService', editableTableController])
    .controller('parametresController', ['$scope', '$filter', '$attrs', '$q', 'parametresService', editableTableController])
;
