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

                //Copy data
                controller.data.libelle = module.libelle;
                controller.data.nb_jours = module.nb_jours;
                controller.data.heure_debut = module.heure_debut;
                controller.data.heure_fin = module.heure_fin;
                controller.data.effectif_max = module.effectif_max;
                controller.data.objectifs_pedagogiques = module.objectifs_pedagogiques;
                controller.data.materiel = module.materiel;


            }
        }

    }
}