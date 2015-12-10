function sessionDetailServiceFactory(sharedDataService, modulesService) {
    return {
        getLinkedData: function() {
            var modules = modulesService.query();

            return {
                'modules': modules
            };
        },

        getInternalKey: function(data) {
            return data.id;
        },

        getSuccess: function(data) {
            //Modify data
            if(data.module_id != undefined) {
                data.module_label = data.module.libelle;
            }

            sharedDataService.data.session_id = data.id;


            //Build the return structure
            return {
                'titleText': data.libelle != undefined ? data.libelle : "Création d'une session"
            }

        },

        getListUrl: function() {
            return '/sessions';
        },

        addListeners: function(controller) {
            controller.onModuleChange = function(controller) {
                //Get the various informations we'll need
                var moduleId = controller.data.module_id;
                var modules = controller.linkedData.modules;

                //Get the module
                var module = {};
                for(var i = 0; i < modules.length; i++) {
                    if(modules[i].id === moduleId) {
                        module = modules[i];
                    }
                }

                //Strip the module of its useless properties
                delete(module.id);

                //Copy everything
                angular.extend(controller.data, module);

            }
        }

    }
}