<div ng-controller="detailController as detailCtrl">
    @include('components.detail', [
        'controller' => 'detailCtrl',
        'sizeLabel' => 2,
        'rows' => [
            [
                'label' => 'Module',
                'fields' => [
                    'module_id' => [
                        'type' => 'dropdown',
                        'datasource' => 'linkedData.modules', //relative to the controller
                        'dataId' => 'id', //relative to an item in the datasource
                        'modelObject' => 'module', //relative to an item in the controller data 
                        'change' => 'detailCtrl.onModuleChange',
                        'displayed' => '<libelle>',
                        'placeholder' => 'Module',
                        'href' => '/modules/',
                        'sizeValue' => 5,
                    ],
                ]
            ],[
                'label' => 'Nombre de jours',
                'fields' => [
                    'module.nb_jours' => [
                        'readonly' => true,
                        'sizeValue' => 1,
                    ],
                ]
            ],[
                'label' => 'Effectif inscrit',
                'fields' => [
                    'dummy' => [
                        'type' => 'raw',
                        'displayed' => '<i class="text-success">@{{effectifValidated}} validées</i> + <i class="text-warning">@{{effectifPending}} en cours</i> + <i class="text-danger">@{{effectifWaitingList}} en attente</i> (@{{effectifTotal}} total)',
                        'sizeValue' => 4,
                    ],
                ]
            ],[
                'label' => 'Effectif maximum',
                'fields' => [
                    'effectif_max' => [
                        'type' => 'text',
                        'sizeValue' => 1,
                    ],
                ]
            ],[
                'label' => 'Objectifs pédagogiques',
                'fields' => [
                    'objectifs_pedagogiques' => [
                        'type' => 'textarea',
                        'additionalAttributes' => 'rows=5',
                        'sizeValue' => 10,
                    ],
                ]
            ],[
                'label' => 'Matériel',
                'fields' => [
                    'materiel' => [
                            'type' => 'textarea',
                            'additionalAttributes' => 'rows=5',
                            'sizeValue' => 10,
                        ],
                ]
            ]
        ]
    ])

    <div ng-if="detailCtrl.inited && detailCtrl.mode != 'create'">
        @include('components.lists.inscriptions', ['displayedField' => ['created_at', 'stagiaire.nom', 'stagiaire.prenom', 'stagiaire.email', 'stagiaire.tel_fixe', 'stagiaire.tel_portable', 'statut.libelle'], 'defaultSort' => 'created_at'])

        <div ng-controller="sessionJoursController as sessionJoursController">
            @include('components.editableTable',
                ['controllerName' => 'sessionJoursController',
                 'idField' => 'id',
                 'title' => 'Jours',
                 'refreshControllers' => '[detailCtrl]',
                 'columns' => [
                    [
                        'label' => 'Date',
                        'sortable' => 'date',
                        'defaultSort' => true,
                        'size' => 2,
                        'fields' => [
                            'date' => [
                                'filterable' => true,
                                'editable' => true,
                                'type' => 'date', 
                                'format' => 'dd/MM/yyyy',
                                'addLine' => true,
                                'validation' => 'required',
                            ], //date
                        ], //fields
                    ],
                    [
                        'label' => 'Matinée',
                        'sortable' => false,
                        'fields' => [
                            'heure_debut_matin' => [
                                'filterable' => true,
                                'editable' => true,
                                'type' => 'time',
                                'format' => 'HH:mm',
                                'addLine' => true,
                            ], //heure_debut_matin
                            'heure_fin_matin' => [
                                'filterable' => true,
                                'editable' => true,
                                'type' => 'time',
                                'format' => 'HH:mm',
                                'addLine' => true,
                            ], //heure_fin_matin
                        ]
                    ],
                    [
                        'label' => 'Après midi',
                        'sortable' => false,
                        'fields' => [
                            'heure_debut_apresmidi' => [
                                'filterable' => true,
                                'editable' => true,
                                'type' => 'time',
                                'format' => 'HH:mm',
                                'addLine' => true,
                            ], //heure_debut_apresmidi
                            'heure_fin_apresmidi' => [
                                'filterable' => true,
                                'editable' => true,
                                'type' => 'time',
                                'format' => 'HH:mm',
                                'addLine' => true,
                            ], //heure_fin_apresmidi
                        ]
                    ],
                    [
                        'label' => 'Lieu',
                        'sortable' => 'lieu',
                        'fields' => [
                            'lieu_id' => [
                                'filterable' => 'lieu.libelle',
                                'editable' => true,
                                'type' => 'dropdown',
                                'datasource' => 'linkedData.lieus', //relative to the controller
                                'dataId' => 'id', //relative to an item in the datasource
                                'modelObject' => 'lieu', //where to find the subobject in the controller
                                'displayed' => '<libelle>',
                                'placeholder' => 'Lieu',
                                'addLine' => true,
                            ], //lieu_id
                        ]
                    ],
                    [
                        'label' => 'Formateurs',
                        'sortable' => false,
                        'size' => 4,
                        'fields' => [
                             'formateurs_id' => [
                                'filterable' => 'formateurs.nom\':\'formateurs.prenom',
                                'editable' => true,
                                'type' => 'multiselect',
                                'datasource' => 'linkedData.formateurs',
                                'dataId' => 'id',
                                'modelObjects' => 'formateurs',
                                'displayed' => '<nom> <prenom>',
                                'placeholder' => 'Formateurs',
                                'addLine' => true,
                            ]
                        ]
                    ]
                ] //columns
             ])

            <h3>Création des jours en masse</h3>
             <div class="custom-actions row">
                <ng-form novalidate name="sessionJoursController.form_autoAdd">
                    <span class="col-sm-2" ng-class="{ 'has-error': sessionJoursController.form_autoAdd.date.$invalid && sessionJoursController.form_autoAdd.date.$touched }">
                        @include('components.myEditable', [
                            'element' => 'sessionJoursController.autoAddObject',
                            'editingFlag' => true,
                            'fieldId' => 'date',
                            'field' => [
                                'type' => 'date', 
                                'format' => 'dd/MM/yyyy',
                                'validation' => 'required',
                            ]
                        ])
                    </span>
                    <span class="col-sm-1">
                        <button class="btn btn-default" ng-click="sessionJoursController.autoAdd([sessionJoursController, detailCtrl])"><span>Créer les jours</span></button>
                    </span>
                </ng-form>
            </div>

            <h3>Impressions</h3>
            <div class="custom-actions row">
                <span class="col-sm-2">
                    <a ng-href="/print/emargement/@{{detailCtrl.data.id}}" class="btn btn-default">Feuilles d'émargement</a>
                </span>
                <span class="col-sm-2">
                    <a ng-href="/print/suivi_session/@{{detailCtrl.data.id}}" class="btn btn-default">Feuille de suivi de session</a>
                </span>
            </div>
            <h3>Mails</h3>
            <div class="custom-actions row">
                <span class="col-sm-2">
                    <a ng-click="detailCtrl.mailFormateurs()" class="btn btn-default">Mail formateur</a>
                </span>
                <span class="col-sm-2">
                    <a ng-href="@{{detailCtrl.data.mailParticipants}}" class="btn btn-default">Mail participants</a>
                </span>
            </div>
         </div>
    </div>
</div>