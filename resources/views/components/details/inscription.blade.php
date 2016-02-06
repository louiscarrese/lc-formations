<div ng-controller="detailController as detailCtrl">
    @include('components.detail', [
        'controller' => 'detailCtrl',
        'fields' => [
            'stagiaire_id' => [
                'label' => 'Stagiaire',
                'type' => 'dropdown',
                'datasource' => 'linkedData.stagiaire', //relative to the controller
                'dataId' => 'id', //relative to an item in the dropdownDatasource
                'modelObject' => 'stagiaire', //relative to an item in the controller data 
                'displayed' => '<nom> <prenom>',
                'placeholder' => 'Stagiaire',
                'searchable' => true,
                'sizeLabel' => 2,
                'sizeValue' => 3,
                'validation' => 'required',
            ],
            'session_id' => [
                'label' => 'Session',
                'type' => 'dropdown',
                'datasource' => 'linkedData.session', //relative to the controller
                'dataId' => 'id', //relative to an item in the dropdownDatasource
                'modelObject' => 'session', //relative to an item in the controller data 
                'displayed' => '<module.libelle> <libelle>',
                'placeholder' => 'Session',
                'searchable' => true,
                'sizeLabel' => 2,
                'sizeValue' => 6,
                'validation' => 'required',
            ],
            'statut_libelle' => [
                'label' => 'Statut',
                'readonly' => true,
                'sizeLabel' => 2,
                'sizeValue' => 10,
            ],
            'profession_structure' => [
                'label' => 'Profession',
                'type' => 'textarea',
                'additionalAttributes' => 'rows=5',
                'sizeLabel' => 2,
                'sizeValue' => 10,
            ],
            'experiences' => [
                'label' => 'Expériences',
                'type' => 'textarea',
                'additionalAttributes' => 'rows=5',
                'sizeLabel' => 2,
                'sizeValue' => 10,
            ],
            'attentes' => [
                'label' => 'Attentes',
                'type' => 'textarea',
                'additionalAttributes' => 'rows=5',
                'sizeLabel' => 2,
                'sizeValue' => 10,
            ],
            'suggestions' => [
                'label' => 'Suggestions',
                'type' => 'textarea',
                'additionalAttributes' => 'rows=5',
                'sizeLabel' => 2,
                'sizeValue' => 10,
            ],
            'formations_precedentes' => [
                'label' => 'Formations précédentes',
                'type' => 'textarea',
                'additionalAttributes' => 'rows=5',
                'sizeLabel' => 2,
                'sizeValue' => 10,
            ],
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
