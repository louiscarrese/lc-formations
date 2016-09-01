function sessionDetailServiceFactory(sharedDataService, modulesService, $filter) {
    function extractModuleInfo(module) {
        var ret = {};

        //Copy data
        ret.nb_jours = module.nb_jours;
        ret.effectif_max = module.effectif_max;
        ret.objectifs_pedagogiques = module.objectifs_pedagogiques;
        ret.materiel = module.materiel;

        return ret;
    }

    //Should use $filter...
    function findInArray(array, key) {
        for(var i = 0; i < array.length; i++) {
            if(array[i].id == key) {
                return array[i];
            }
        }
        return null;
    }


    return {
        getLinkedData: function() {
            var modules = modulesService.all();

            return {
                'modules': modules.$promise,
            };
        },

        getInternalKey: function(data) {
            return data.id;
        },

        getSuccess: function(data) {
            sharedDataService.data.session_id = data.id;
            
        },

        titleText: function(data) {
            var ret = "";
            if(data.id == null) {
                ret = "Création d'une session";
            } else {
                if(data.module) {
                    ret += data.module.libelle;
                }
                if(data.firstDate || data.lastDate) {
                    ret += ' (';
                    if(data.firstDate) {
                        ret += $filter('date')(data.firstDate, 'dd/MM/yyyy');
                    }
                    if(data.lastDate) {
                        ret += ' - ' + $filter('date')(data.lastDate, 'dd/MM/yyyy');
                    }
                    ret += ')';
                }
            }

            return ret;

        },

        getListUrl: function() {
            return '/intra/sessions';
        },

        addListeners: function(controller) {
            controller.onModuleChange = function(moduleId) {
                var module = findInArray(controller.linkedData.modules, moduleId);
                controller.data = angular.extend(controller.data, extractModuleInfo(module));
                controller.data.module = module;
            };
            controller.mailFormateurs = function() {
                controller.dataService.mailFormateurs({'session_id': controller.data.id}, 
                    function(value, responseHeadersr) {
                        window.location.href = value.mailtoLink;
                    }
                );
            }
        },

        populateLinkedObjects: function(dataFromUrl, linkedData) {
            var ret = {};
            if(dataFromUrl && dataFromUrl.hasOwnProperty('module_id') && dataFromUrl.module_id != undefined) {
                ret.module = findInArray(linkedData.modules, dataFromUrl.module_id);
                angular.extend(ret, extractModuleInfo(ret.module));
            }

            return ret;
        },

        deleteMessage: function() {
            var message = 'Etes vous sur de vouloir supprimer cette session ?';
            message += '\nLes éléments associés suivants seront également supprimés : ';
            message += '\n - Inscriptions ';
            return message;
        },
    }
}
