function detailController(editModeService, dataService, detailService) {
    var self = this;

    self.internalKey = 0;

    //CRUD
    self.create = create;
    self.cancel = cancel;
    self.update = update;
    self.delete = del;

    //Utilities
    self.edit = edit;
    self.getSuccess = getSuccess;

    self.data = {};

    //Initialize data
    editModeService.initFromUrl(dataService, function(mode, data) {
        //Store computed data
        self.data = data;

        //Are we editing ?
        self.mode = mode;
        if(self.mode === 'read') {
            self.editing = false;
        } else {
            self.editing = true;
        }

        self.getSuccess(data);
        self.inited = true;
    });

    if(detailService != undefined) {
        if(typeof detailService.getLinkedData == 'function')
            self.linkedData = detailService.getLinkedData();
        if(typeof detailService.addListeners == 'function')
            detailService.addListeners(this);
    }
    //CRUD

    function create() {
        if(self['mainForm'].$valid) {
            dataService.save(self.data, 
                function(value, responseHeaders) {
                    self.getSuccess(value);
                    self.mode = 'read';
                    self.editing = false;
                }, 
                function(httpResponseHeaders) {
                    alert('Error ! ');
                }
            );
        }
    };


    function cancel() {
        dataService.get({id:self.internalKey}, function(value, responseHeaders) {
            self.editing = false;
            self.mode = 'read';
            self.getSuccess(value);
        });
    }

    function update() {
        if(self['mainForm'].$valid) {
            self.data.$update({id:self.internalKey}, 
                function(value, responseHeaders) {
                    self.getSuccess(value);
                    self.editing = false;
                    self.mode = 'read';
                },
                function(httpResponseHeaders) {
                    alert('error');
                }
            );
        }
    }

    function del() {
        self.data.$delete({id:self.internalKey},
            function(value, responseHeaders) {
                if(detailService != undefined && typeof detailService.getListUrl == 'function')
                    window.location.href=detailService.getListUrl();
            },
            function(httpResponseHeaders) {
                alert('error');
            })
    }


    //Utilities
    function edit() {
        self.editing = true;
        self.mode = 'edit';
    }

    function getSuccess(data) {
        self.data = data;
        if(detailService != undefined && typeof detailService.getInternalKey == 'function')
            self.internalKey = detailService.getInternalKey(self.data);

        if(detailService != undefined && typeof detailService.getSuccess == 'function') {
            var successData = detailService.getSuccess(self.data);
            self.titleText = successData.titleText;
        }

    }


}