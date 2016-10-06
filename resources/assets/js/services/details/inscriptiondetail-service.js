function inscriptionDetailServiceFactory(sharedDataService, stagiairesService, sessionsService, $filter, $q, $uibModal) {
    //Should use $filter...
    function findInArray(array, key) {
        for(var i = 0; i < array.length; i++) {
            if(array[i].id == key) {
                return array[i];
            }
        }
        return null;
    }

    //It would deserve to factorize with sessionDetailService.titleText
    function buildSessionLibelle(item) {
        var ret = '';
        if(item.firstDate || item.lastDate) {
            ret += '(';
            if(item.firstDate) {
                ret += $filter('date')(item.firstDate, 'dd/MM/yyyy');
            }
            if(item.lastDate) {
                ret += ' - ' + $filter('date')(item.lastDate, 'dd/MM/yyyy');
            }
            ret += ')';
        }
        return ret;
    };

    function getInscriptionStatus() {
        return $q.when({'data' : [
                {id: 'pending', libelle: 'En cours'},
                {id: 'canceled', libelle: 'Annulée'},
                {id: 'validated', libelle: 'Validée'},
                {id: 'withdrawn', libelle: 'Désistée'},
                {id: 'waiting_list', libelle: 'Liste d\'attente'},
                ]}
            );
    }

    return {
        getLinkedData: function() {
            var stagiaire = stagiairesService.query({forceNoPaginate: true});
            var sessions = sessionsService.query({forceNoPaginate: true});
            var status = getInscriptionStatus();

            sessions.$promise.then(function(data) {
                angular.forEach(data.data, function(session) {
                    session.libelle = buildSessionLibelle(session);
                });
            });

            return {
                'stagiaire': stagiaire.$promise,
                'session': sessions.$promise,
                'statut': status,
            };
        },

        getInternalKey: function(data) {
            return data.id;
        },

        getSuccess: function(data) {
            sharedDataService.data.inscription_id = data.id;

            if(data.session) {
                data.session.libelle = buildSessionLibelle(data.session);
            }
        },

        titleText: function(data) {
            var titleText = "Création d'une inscription";
            if(data.id != undefined) {
                titleText = 'Inscription de ' + data.stagiaire.prenom + ' ' + data.stagiaire.nom;
                titleText += ' à la formation ' + data.session.module.libelle;
            }

            return titleText;
        },

        getListUrl: function() {
            return '/intra/inscriptions';
        },

        deleteMessage: function() {
            var message = 'Etes vous sur de vouloir supprimer cette inscription ?';
            message += '\nLes éléments associés suivants seront également supprimés : ';
            message += '\n - Financements ';
            return message;
        },

        addListeners: function(controller) {
	    controller.onSessionChange = function(sessionId) {
		var session = findInArray(controller.linkedData.session, sessionId);
		controller.data.available_tarifs = session.module.tarifs;
	    }

            controller.contratFormation = function(event) {
                controller.contratParameterModal = $uibModal.open({
                    templateUrl: '../print/parameterContrat/' + controller.data.id,
                    size: 'lg',
                    appendTo: angular.element(document.getElementById('impressions')),
                    controller: ['$uibModalInstance', printParameterController],
                    controllerAs: 'printParameterCtrl',
                });

                event.preventDefault();
            }
            controller.conventionFormation = function(event) {
                controller.conventionParameterModal = $uibModal.open({
                    templateUrl: '../print/parameterConvention/' + controller.data.id,
                    size: 'lg',
                    appendTo: angular.element(document.getElementById('impressions')),
                    controller: ['$uibModalInstance', printParameterController],
                    controllerAs: 'printParameterCtrl',
                });

                event.preventDefault();
            }
        },

	populateLinkedObjects: function(dataFromUrl, linkedData) {
	    var ret = {};
	    
	    if(dataFromUrl && dataFromUrl.hasOwnProperty('session_id') && dataFromUrl.session_id != undefined) {
		session = findInArray(linkedData.session, dataFromUrl.session_id);
		ret.available_tarifs = session.module.tarifs;
	    }

	    return ret;
	}
    }
}
