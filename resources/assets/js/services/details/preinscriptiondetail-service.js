function preinscriptionDetailServiceFactory(sharedDataService, $filter, $q, 
    sexeDataService, adherentDataService, statutStagiaireDataService, salarieTypeDataService, 
    demandeurEmploiTypeDataService, financementTypeDataService, financementAfdasDataService, financementAutreDataService, 
    stagiairesService, employeursService) {
    
    var statut = [
        {id: 'salarie', label: 'Salarié'},
        {id: 'demandeur_emploi', label: 'Demandeur d\'emploi'},
        {id: 'intermittent', label: 'Intermittent du spectacle'},
        {id: 'rsa', label: 'RSA'},
        {id: 'etudiant', label: 'Etudiant'},
        {id: 'autre', label: 'Autre'},
    ];

    //It would deserve to factorize with sessionDetailService.titleText
    function buildSessionLibelle(item) {
        var ret = item.module.libelle + ' ';

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

/*
    function getStagiaireStatus() {
        return $q.when(statut);
    };
*/
    function findInArray(array, key) {
        for(var i = 0; i < array.length; i++) {
            if(array[i].id == key) {
                return array[i];
            }
        }
        return null;
    }
/*
    function getStatutFromId(id) {
        var ret = null;
        i = 0;
        while(ret == null && i < statut.length) {
            if(statut[i].id == id) {
                ret = statut[i];
            }
            i++;
        }
        return ret;
    }
*/
  
    function getStagiaire(data) {
        if(data.stagiaire_id == null) {
            return data;
        } else {
            return data.stagiaire;
        }
    }

    function createStagiaire(data) {
        var stagiaire = {
            nom: data.nom,
            prenom: data.prenom,
            sexe: data.genre,
            date_naissance: data.date_naissance,
            adresse: data.adresse,
            code_postal: data.code_postal,
            ville: data.ville,
            tel_portable: data.tel_portable,
            tel_fixe: data.tel_fixe,
            email: data.email,
            profession: data.profession,
            etudes: null, 
            stagiaire_type_id: null,
            niveau_formation_id: null,
        };

        stagiairesService.save(stagiaire, 
            function(value, responseHeaders) {
                data.stagiaire_id = value.id;
            }
        );

    }

    function associateStagiaire() {
        console.log("associateStagiaire");
    }

    function dissociateStagiaire(data) {
        data.stagiaire_id = null;
        
    }

    return {
        staticDataServices: {
            'sexe': sexeDataService,
            'adherent': adherentDataService,
            'statut_stagiaire': statutStagiaireDataService,
            'salarie_type': salarieTypeDataService,
            'demandeur_emploi_type': demandeurEmploiTypeDataService,
            'financement_type': financementTypeDataService,
            'financement_afdas': financementAfdasDataService,
            'financement_autre': financementAutreDataService,
        },

        getLinkedData: function() {
            return {
                'status': $q.when(statut),
            }
        },

        getInternalKey: function(data) {
            return data.id;
        },

        getSuccess: function(data) {
            if(data.salarie_type_autre) {
                data.salarie_type_precision = {'autre': data.salarie_type_autre};
            }
            if(data.preinscription_sessions) {
                angular.forEach(data.preinscription_sessions, function(preinscription_session) {
                    preinscription_session.session.libelle = buildSessionLibelle(preinscription_session.session);
                })
            }
            if(data.date_naissance) {
                data.date_naissance = new Date(data.date_naissance);
            }

//            data.statut = getStatutFromId(data.statut);
//            data.trut = {values: [], precisions: {}};
        },

        preSend: function(originalData) {
            var ret = angular.copy(originalData);

            if(ret.salarie_type_precision && ret.salarie_type_precision.autre) {
                ret.salarie_type_autre = ret.salarie_type_precision.autre;
            }


            return ret;
        },
        titleText: function(data) {

        },

        getListUrl: function() {
            return '/preinscriptions';
        },

        deleteMessage: function() {
            var message = 'Etes vous sur de vouloir supprimer cette preinscription ?';
            return message;
        },
        
        addListeners: function(controller) {
            controller.getStatutLabel = function(statutId) {
                var retObj = findInArray(statut, statutId);
                return retObj ? retObj.label : null;
            };
            controller.getSalarieTypeLabel = function(typeId) {
                var retObj = findInArray(salarie_types, typeId);
                return retObj ? retObj.label : null;
            };
            controller.openedDatePicker = {};
            controller.openDatePicker = function($event, key) {
                $event.preventDefault();
                $event.stopPropagation();
                controller.openedDatePicker[key] = !controller.openedDatePicker[key];
            }

            controller.getStagiaire = getStagiaire;

            controller.dissociateStagiaire = dissociateStagiaire;
            controller.associateStagiaire = associateStagiaire;
            controller.createStagiaire = createStagiaire;
        },
    }
}