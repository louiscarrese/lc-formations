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
                        'href' => $viewService->privateUrl('sessions/'),
                        'placeholder' => 'Session',
                        'searchable' => true,
                        'sizeValue' => 6,
                        'validation' => 'required',
                    ],
                ]
            ],[
                'label' => 'Statut',
                'fields' => [

                    'statut.id' => [
                        'type' => 'dropdown',
                        'datasource' => 'linkedData.statut',
                        'dataId' => 'id',
                        'modelObject' => 'statut',
                        'displayed' => '<statut.libelle>',
                        'placeholder' => 'Statut',
                        'searchable' => false,
                        'sizeValue' => 2,
                        'validation' => 'required',
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
                            'defaultSort' => true,
                            'fields' => [
                                'financeur_id' => [
                                    'filterable' => 'financeur.libelle',
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

    <h3>Impressions</h3>
    <div id="impressions" class="custom-actions row">
        <span class="col-sm-2">
            <button ng-click="detailCtrl.contratFormation($event);" class="btn btn-default">Contrat de formation</button>
        </span>
    </div>

</div>
