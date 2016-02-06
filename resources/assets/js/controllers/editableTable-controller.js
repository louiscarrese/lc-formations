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

    //Data

    self.queryParameters = {};
    self.queryString = queryString;
    self.createUrl = createUrl;

    self.addObject = {};

    self.errorMessage = "";
    self.filterInput = "";

    self.sortProp = "id";
    self.sortReverse = false;

    self.refreshControllers = refreshControllers;

    if(tableService != undefined && typeof tableService.getLinkedData == 'function') {
        self.linkedData = tableService.getLinkedData();
    }

    if(tableService != undefined && typeof tableService.addListeners == 'function')
        tableService.addListeners(self);

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

    function editSubmit(index, value, ctrlsToRefresh) {
        //Validation
        var form = self['form_' + index];
        if(form.$valid) {
            //Send update
            self.update(value, ctrlsToRefresh);
        } 
    }

    function addSubmit(ctrlsToRefresh) {
        //Validation
        var form = self['form_add'];
        if(form.$valid) {
            //Send update
            self.create(self.addObject, ctrlsToRefresh);
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
     function update(type, ctrlsToRefresh) {
        var toSend = type;
        if(tableService != undefined && typeof tableService.preSend == 'function') {
            toSend = tableService.preSend(type);
        }

        self.errors = [];
        toSend.$update({id: type.internalKey}, 
            function(value, responseHeaders) {

                self.getSuccess(value);
                self.refreshControllers(ctrlsToRefresh);
                type.editing = false;
                self.sort();

            }, 
            function(httpResponse) {
                self.errors = self.extractErrors(httpResponse);
            });
    };

    /**
     * Delete
     */
     function del(type, ctrlsToRefresh) {
        self.errors = [];
        var confirmed = false;
        if(tableService != undefined && typeof tableService['deleteMessage'] == 'function' 
            && window.confirm(tableService.deleteMessage())) {
                confirmed = true;
        } else {
            confirmed = false;
        }
        if(confirmed) {
            type.$delete({id: type.internalKey}, 
                function(value, responseHeaders) {
                    self.data.splice(self.data.indexOf(value), 1);
                    self.refreshControllers(ctrlsToRefresh);
                }, 
                function(httpResponse) {
                    self.errors = self.extractErrors(httpResponse);
                });
        }
    };

    /**
     * Add
     */
     function create(obj, ctrlsToRefresh) {
        var toSend = self.addObject;
        if(tableService != undefined && typeof tableService.preSend == 'function') {
            toSend = tableService.preSend(self.addObject);
        }
        self.errors = [];
        dataService.save(toSend, 
            function(value, responseHeaders) {
                //process value
                self.getSuccess(value);

                //Update any other controller
                self.refreshControllers(ctrlsToRefresh);

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

    function refreshControllers(ctrls) {
        if(ctrls) {
            angular.forEach(ctrls, function (ctrl, idx) {
                ctrl.refreshData();
            });
        }
    }

    function queryString() {
        var ret = '';

        var parameters = {};
        if(tableService != undefined && typeof tableService.queryParameters == 'function') {
            parameters = tableService.queryParameters();
        }

        var first = true;
        angular.forEach(parameters, function(value, key) {
            ret += first ? '?' : '&'; 
            ret += key + '=' + value;
            first = false;
        });
 
        return ret;
    }

    function createUrl(baseUrl) {
        return baseUrl + '/create' + queryString();
    }
} 
