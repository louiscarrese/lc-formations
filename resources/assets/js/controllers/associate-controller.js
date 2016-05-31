function associateController($uibModalInstance, associationService, dataService, preinscriptionData) {
    var self = this;

    self.preinscriptionData = preinscriptionData;

    /** Data */
    //The search criteria and result
    //ATTENTION: can be a string (criteria) or an object (result)
    self.dbSearch;

    /** Functions */
    self.refreshList = refreshList;

    self.searchMatchDisplayed = searchMatchDisplayed;
    self.searchChoicesDisplayed = searchChoicesDisplayed;


    /** Initialisation stuff */
    self.$onInit = function () {
        console.log(preinscriptionData);
        console.log(preinscriptionData.nom + ' ' + preinscriptionData.prenom);
        //Init code
        refreshList(preinscriptionData.nom + ' ' + preinscriptionData.prenom);
        self.dbSearch = preinscriptionData.nom + ' ' + preinscriptionData.prenom;
    }

    $uibModalInstance.rendered.then(function() {
        //Graphical init code
        self.searchForm.$show();
    })



    function refreshList(query) {
        if(query != undefined && query != '') {
            dataService.search({criterias: 'nom,prenom', query: query}, 
                function(values, responseHeaders) {
                    self.dbSearchList = values;
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