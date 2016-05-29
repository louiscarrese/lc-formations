function associateController($uibModalInstance, associationService, dataService, preinscriptionData) {
    var self = this;

    self.preinscriptionData = preinscriptionData;

    self.$onInit = function () {
        //Init code
    }

    $uibModalInstance.rendered.then(function() {
        //Graphical init code
        self.searchForm.$show();
    })


    self.refreshList = refreshList;

    self.searchMatchDisplayed = searchMatchDisplayed;
    self.searchChoicesDisplayed = searchChoicesDisplayed;


    function refreshList(criteria) {
        if(criteria != undefined && criteria != '') {
            dataService.search({criteria: criteria}, 
                function(values, responseHeaders) {
                    self.dbSearchList = values;
                }
            );
        } else {
            self.dbSearchList = [];
        }
    }

    function searchMatchDisplayed(item) {
        console.log('match');
        console.log(item);
        if(associationService != undefined && typeof associationService.searchMatchDisplayed == 'function')
            return associationService.searchMatchDisplayed(item);
        else 
            return 'you should define searchMatchDisplayed in an association specialization service';
    }

    function searchChoicesDisplayed(item) {
        console.log('choices');
        console.log(item);
        if(associationService != undefined && typeof associationService.searchChoicesDisplayed == 'function')
            return associationService.searchChoicesDisplayed(item);
        else 
            return 'you should define searchChoicesDisplayed in an association specialization service';
    }

}