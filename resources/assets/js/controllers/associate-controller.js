
function associateController($uibModalInstance, associationService, dataService, preinscriptionData, parentController) {
    var self = this;

    self.parentController = parentController;

    /** Data */
    //The search criteria and result
    self.dbSearch;
    self.preinscriptionData = preinscriptionData;
    self.stagiaireFound = false; //unused ?


    /** Functions */
    self.refreshList = refreshList;

    self.searchMatchDisplayed = searchMatchDisplayed;
    self.searchChoicesDisplayed = searchChoicesDisplayed;

    $uibModalInstance.rendered.then(function() {
        //Graphical init code
        self.searchForm.$show();
        self.sourceDataForm.$show();
        self.dbDataForm.$show();

        self.searchSelect = angular.element(document.querySelectorAll('#searchForm .ui-select-container')).scope();
        self.searchSelect.search = 'DefaultSearch123';
    })



    function refreshList(query) {
        if(query != undefined && query != '') {
            dataService.search({criterias: 'nom,prenom', query: query}, 
                function(values, responseHeaders) {
                    self.dbSearchList = values;
                    if(values.length == 1) {
                        self.dbSearch = values[0];

                    }
                }
            );
        } else {
            self.dbSearchList = [];
        }
    }

    function searchMatchDisplayed(item) {
        if(associationService != undefined && typeof associationService.searchMatchDisplayed == 'function')
            return associationService.searchMatchDisplayed(item, self.dbSearch);
        else 
            return 'you should define searchMatchDisplayed in an association specialization service';
    }

    function searchChoicesDisplayed(item) {
        if(associationService != undefined && typeof associationService.searchChoicesDisplayed == 'function')
            return associationService.searchChoicesDisplayed(item);
        else 
            return 'you should define searchChoicesDisplayed in an association specialization service';
    }

}