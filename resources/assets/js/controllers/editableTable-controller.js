function editableTableController($filter, dataService, tableService) {
    var self = this;

    self.dataService = dataService;

    //Functions
    self.orderBy = $filter('orderBy');

    self.setSort = setSort;
    self.getSort = getSort;
    self.sort = sort;

    self.refreshData = refreshData;
    self.query = query;
    self.create = create;
    self.cancel = cancel;
    self.update = update;
    self.delete = del;
    self.get = get;

    self.getSuccess = getSuccess;

    self.editSubmit = editSubmit;
    self.addSubmit = addSubmit;

    self.closeAlert = closeAlert;
    self.extractErrors = extractErrors;

    self.callService = callService;
    //Data

    self.queryParameters = {};

    self.addObject = {};

    self.errorMessage = "";
    self.filterInput = "";

    self.sortProp = "id";
    self.sortReverse = false;

    if(tableService != undefined && typeof tableService.getLinkedData == 'function') {
        self.linkedData = tableService.getLinkedData();
    }

    self.refreshData();

    function setSort(key) {
        if(self.sortProp == key) {
            self.sortReverse = !self.sortReverse;
        } else {
            self.sortProp = key;
            self.sortReverse = false;
        }
        self.sort();
    };

    function getSort(key) {
        if(self.sortProp === key) {
            return self.sortReverse;
        } else {
            return null;
        }
    };

    function sort() {
        self.data = self.orderBy(self.data, self.sortProp, self.sortReverse);
    }

    function getSuccess(value) {
        value.internalKey = value.id;
        if(tableService != undefined && typeof tableService.getSuccess == 'function') {
            tableService.getSuccess(value);
        }
    }

    function editSubmit(index, value) {
        //Validation
        var form = self['form_' + index];
        if(form.$valid) {
            //Send update
            self.update(value);
        } 
    }

    function addSubmit() {
        //Validation
        var form = self['form_add'];
        if(form.$valid) {
            //Send update
            self.create(self.addObject);
        }
    }
    function refreshData() {
        self.data = self.query();
    }

    function query() {
        if(tableService != undefined && typeof tableService.queryParameters == 'function') {
            self.queryParameters = tableService.queryParameters();
        }
        
        return dataService.query(self.queryParameters, function() {
            angular.forEach(self.data, function(value, key) {
                self.getSuccess(value);
            });
            self.sort();
        });
    }

    /**
     * Update
     */
     function update(type) {
        if(tableService != undefined && typeof tableService.preSend == 'function') {
            tableService.preSend(type);
        }

        self.errors = [];
        type.$update({id: type.internalKey}, 
            function(value, responseHeaders) {

                self.getSuccess(value);
                value.editing = false;
                self.sort();

            }, 
            function(httpResponse) {
                self.errors = self.extractErrors(httpResponse);
            });
    };

    /**
     * Delete
     */
     function del(type) {
        self.errors = [];
        type.$delete({id: type.internalKey}, 
            function(value, responseHeaders) {
                self.data.splice(self.data.indexOf(value), 1);
            }, 
            function(httpResponse) {
                self.errors = self.extractErrors(httpResponse);
            });
    };

    /**
     * Add
     */
     function create() {
        if(tableService != undefined && typeof tableService.preSend == 'function') {
            tableService.preSend(self.addObject);
        }
        self.errors = [];
        dataService.save(self.addObject, 
            function(value, responseHeaders) {
                //process value
                self.getSuccess(value);

                //Update data list
                self.data.push(value);
                self.sort();
                self.addObject = {};
                self.form_add.$setPristine();
                self.form_add.$setUntouched();
            }, 
            function(httpResponse) {
                self.errors = self.extractErrors(httpResponse);
            });
    };

    /**
     * Cancel
     */
     function cancel(type) {
        self.errors = [];
        dataService.get({id: type.internalKey}, function(value, responseHeaders) {
            self.getSuccess(value);
            value.editing = false;
            self.data[self.data.indexOf(type)] = value;
        });
    };

    /** 
     * Get
     */
     function get(type) {
        dataService.get({id: type.id}, function(value, responseHeaders) {
            self.getSuccess(value);
            self.data[self.data.indexOf(type)] = value;
        });
    };

    function closeAlert(index) {
        self.errors.splice(index, 1);
    };

    function extractErrors(data) {
        var ret = [];
        for(field in data) {
            for(i = 0; i < data[field].length; i++) {
                ret.push(data[field][i]);
            }
        }
        return ret;
    };

    function callService(methodName, parameters) {
        if(tableService != undefined && typeof tableService[methodName] == 'function') {
            return tableService[methodName].apply(self, parameters);
        }
        return null;
    }
} 
