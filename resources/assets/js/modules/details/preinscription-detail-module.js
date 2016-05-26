angular.module('preinscriptionDetail', ['detail', 'ngResource', 'xeditable', 'ui.bootstrap', 'ui.select', 'ngSanitize'])
    //dynamic data
    .factory('preinscriptionsService', ['$resource', preinscriptionsServiceFactory])
    //static data
    .factory('sexeDataService', ['$filter', '$q', sexeDataServiceFactory])
    .factory('adherentDataService', ['$filter', '$q', adherentDataServiceFactory])
    .factory('statutStagiaireDataService', ['$filter', '$q', statutStagiaireDataServiceFactory])
    .factory('salarieTypeDataService', ['$filter', '$q', salarieTypeDataServiceFactory])
    .factory('demandeurEmploiTypeDataService', ['$filter', '$q', demandeurEmploiTypeDataServiceFactory])
    .factory('financementTypeDataService', ['$filter', '$q', financementTypeDataServiceFactory])
    .factory('financementAfdasDataService', ['$filter', '$q', financementAfdasDataServiceFactory])
    .factory('financementAutreDataService', ['$filter', '$q', financementAutreDataServiceFactory])
    .factory('stagiairesService', ['$resource', stagiairesServiceFactory])
    .factory('employeursService', ['$resource', employeursServiceFactory])
    //detail service
    .factory('preinscriptionDetailService', 
        ['sharedDataService', '$filter', '$q', 
        'sexeDataService', 'adherentDataService', 'statutStagiaireDataService', 'salarieTypeDataService', 'demandeurEmploiTypeDataService', 'financementTypeDataService', 'financementAfdasDataService', 'financementAutreDataService',
        'stagiairesService', 'employeursService',
        preinscriptionDetailServiceFactory])
    //generic controller
    .controller('detailController', ['editModeService', 'preinscriptionsService', 'preinscriptionDetailService', '$q', detailController])
    .directive('datepickerLocaldate', datepickerLocaldate)
.run(function(editableOptions, editableThemes) {
  editableThemes.bs3.inputClass = 'input-sm';
  editableThemes.bs3.buttonsClass = 'btn-sm';
  editableOptions.theme = 'bs3';
});
