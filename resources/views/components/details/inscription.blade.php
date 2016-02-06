<div ng-controller="detailController as detailCtrl">
    @include('components.detail', [
        'controller' => 'detailCtrl',
        'sizeLabel' => 2,
        'rows' => [
            [
                'label' => 'Stagiaire',
                'fields' => [
                    'stagiaire_id' => [
                        'type' => 'dropdown',
                        'datasource' => 'linkedData.stagiaire', //relative to the controller
                        'dataId' => 'id', //relative to an item in the dropdownDatasource
                        'modelObject' => 'stagiaire', //relative to an item in the controller data 
                        'displayed' => '<nom> <prenom>',
                        'placeholder' => 'Stagiaire',
                        'searchable' => true,
                        'sizeValue' => 3,
                        'validation' => 'required',
                    ],
                ]
            ],[
                'label' => 'Session',
                'fields' => [
                    'session_id' => [
                        'type' => 'dropdown',
                        'datasource' => 'linkedData.session', //relative to the controller
                        'dataId' => 'id', //relative to an item in the dropdownDatasource
                        'modelObject' => 'session', //relative to an item in the controller data 
                        'displayed' => '<module.libelle> <libelle>',
                        'placeholder' => 'Session',
                        'searchable' => true,
                        'sizeValue' => 6,
                        'validation' => 'required',
                    ],
                ]
            ],[
                'label' => 'Statut',
                'fields' => [
                    'statut_libelle' => [
                        'readonly' => true,
                        'sizeValue' => 10,
                    ],
                ]
            ],[
                'label' => 'Profession',
                'fields' => [
                    'profession_structure' => [
                        'type' => 'textarea',
                        'additionalAttributes' => 'rows=5',
                        'sizeValue' => 10,
                    ],
                ]
            ],[
                'label' => 'Expériences',
                'fields' => [
                    'experiences' => [
                        'type' => 'textarea',
                        'additionalAttributes' => 'rows=5',
                        'sizeValue' => 10,
                    ],
                ]
            ],[
                'label' => 'Attentes',
                'fields' => [
                    'attentes' => [
                        'type' => 'textarea',
                        'additionalAttributes' => 'rows=5',
                        'sizeValue' => 10,
                    ],
                ]
            ],[
                'label' => 'Suggestions',
                'fields' => [
                    'suggestions' => [
                        'type' => 'textarea',
                        'additionalAttributes' => 'rows=5',
                        'sizeValue' => 10,
                    ],
                ]
            ],[
                'label' => 'Formations précédentes',
                'fields' => [
                    'formations_precedentes' => [
                        'type' => 'textarea',
                        'additionalAttributes' => 'rows=5',
                        'sizeValue' => 10,
                    ],
                ]
            ]
        ]
    ])

    <div ng-if="detailCtrl.inited && detailCtrl.mode != 'create'">
        <div ng-controller="financeurInscriptionsController as financeurInscriptionsController">
            @include('components.editableTable',
                [  
                    'controllerName' => 'financeurInscriptionsController',
                    'idField' => 'id',
                    'title' => 'Financements',
                    'columns' => [
                        [
                            'label' => 'Financeur',
                            'sortable' => 'financeur_id',
                            'fields' => [
                                'financeur_id' => [
                                    'filterable' => true,
                                    'editable' => true,
                                    'type' => 'dropdown',
                                    'datasource' => 'linkedData.financeurs',
                                    'dataId' => 'id',
                                    'modelObject' => 'financeur',
                                    'displayed' => '<libelle>',
                                    'placeholder' => 'Financeur',
                                    'addLine' => true,
                                ]
                            ]
                        ],
                        [
                            'label' => 'Montant',
                            'sortable' => 'montant',
                            'fields' => [
                                'montant' => [
                                    'filterable' => true,
                                    'editable' => true,
                                    'type' => 'integer',
                                    'addLine' => true,
                                ],
                            ]
                        ]
                    ]
                ]
            )
        </div>
    </div>

    <h2>Actions complémentaires</h2>
    <div class="custom-actions">
        <div ng-if="detailCtrl.data.statut == 'pending'">
            <button class="btn btn-default" ng-click="detailCtrl.validateInscription()">
                <span>Valider l'inscription</span>
            </button>
             <button class="btn btn-default" ng-click="detailCtrl.cancelInscription()">
                <span>Annuler l'inscription</span>
            </button>
        </div>
        <div ng-if="detailCtrl.data.statut == 'validated'">
            <button class="btn btn-default" ng-click="detailCtrl.withdrawInscription()">
                <span>Désistement</span>
            </button>
        </div>
    </div>
</div>
