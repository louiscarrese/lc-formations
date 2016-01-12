function sessionDetailServiceFactory(sharedDataService, modulesService, $filter) {
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

            sharedDataService.data.session_id = data.id;
            if(data.firstDate && data.lastDate) {
                data.libelle = '(' + $filter('date')(data.firstDate, 'dd/MM/yyyy');
                data.libelle += ' - ' + $filter('date')(data.lastDate, 'dd/MM/yyyy') + ')';
            } else {
                data.libelle = '';
            }
            
            //Build the return structure
            return {
                'titleText': data.id != undefined ? data.module.libelle + ' ' + data.libelle : "Création d'une session"
            }

        },

        getListUrl: function() {
            return '/sessions';
        },

        addListeners: function(controller) {
            controller.onModuleChange = function(moduleId) {

                //Get the module
                var modules = controller.linkedData.modules;
                var module = {};
                for(var i = 0; i < modules.length; i++) {
                    if(modules[i].id === moduleId) {
                        module = modules[i];
                    }
                }

                //Copy data
                controller.data.effectif_max = module.effectif_max;
                controller.data.objectifs_pedagogiques = module.objectifs_pedagogiques;
                controller.data.materiel = module.materiel;
            }
        }
    }
}