function moduleDetailController(editModeService, modulesService, domaineFormationsService) {
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

    //Initialize data
    editModeService.initFromUrl(modulesService, function(mode, data) {
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
    });

    self.domaine_formations = domaineFormationsService.query();


    //CRUD

    function create() {
        modulesService.save(self.data, 
            function(value, responseHeaders) {
                self.data = value;
                self.mode = 'read';
                self.editing = false;
            }, 
            function(httpResponseHeaders) {
                alert('Error ! ');
            });
    };


    function cancel() {
        modulesService.get({id:self.internalKey}, function(value, responseHeaders) {
            self.editing = false;
            self.mode = 'read';
            self.getSuccess(value);
        });
    }

    function update() {
        self.data.$update({id:self.internalKey}, 
            function(value, responseHeaders) {
                self.getSuccess(value);
                self.editing = false;
                self.mode = 'read';
            },
            function(httpResponseHeaders) {
                alert('error');
            });
    }

    function del() {
        self.data.$delete({id:self.internalKey},
            function(value, responseHeaders) {
                window.location.href="/modules";
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
        self.internalKey = data.id
        if(self.data.domaine_formation_id != undefined) {
            self.data.module_formation_label = self.data.domaine_formation.libelle;
        }
    }


}