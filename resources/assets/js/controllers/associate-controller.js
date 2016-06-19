
function associateController($uibModalInstance, associationService, dataService, parentController) {
    var self = this;

    self.parentController = parentController;

    self.modalInstance = $uibModalInstance;
    /** Data */
    //The search result
    self.dbSearch = null;


    /** Functions */
    self.refreshList = refreshList;

    self.searchMatchDisplayed = searchMatchDisplayed;
    self.searchChoicesDisplayed = searchChoicesDisplayed;

    self.dbData = dbData;
    self.associate = associate;
    self.mergeData = mergeData;

    $uibModalInstance.rendered.then(function() {
        //Graphical init code
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

    function dbData(data, search) {
        if(associationService != undefined && typeof associationService.dbData == 'function') {
            return associationService.dbData(data, search);
        } else { 
            return 'you should define dbData in an association specialization service';
        }
    }

    function associate() {
        console.log('associate');
        if(associationService != undefined && typeof associationService.associate == 'function') {
            associationService.associate(parentController.data, self.dbSearch);
            parentController.update();
        } else { 
            console.log('you should define associate in an association specialization service');
        }
    }

    function mergeData(key) {
        if(associationService != undefined && typeof associationService.mergeData == 'function') {
            associationService.mergeData(key, self.parentController.data);
        } else {
            console.log('you should define mergeData in an association specialization service');
        }
    }

}