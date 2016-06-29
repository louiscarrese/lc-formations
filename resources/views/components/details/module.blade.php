<div ng-controller="detailController as moduleCtrl">
    @include('components.detail', [
        'controller' => 'moduleCtrl',
        'sizeLabel' => 2,
        'rows' => [
            [
                'label' => 'Libellé',
                'fields' => [
                    'libelle' => [
                        'type' => 'text',
                        'sizeValue' => 5,
                        'validation' => 'required'
                    ],
                ]
            ],
            [
                'label' => 'Nombre de jours',
                'fields' => [
                    'nb_jours' => [
                        'type' => 'integer',
                        'sizeValue' => 1,
                    ],
                ]
            ],
            [
                'label' => 'Horaires matinée',
                'fields' => [
                    'heure_debut_matin' => [
                        'type' => 'time',
                        'format' => 'HH:mm',
                        'sizeValue' => 1,
                    ],
                    'heure_fin_matin' => [
                        'type' => 'time',
                        'format' => 'HH:mm',
                        'sizeValue' => 1,
                    ],
                ]
            ],
            [
                'label' => 'Horaires après midi',
                'fields' => [
                    'heure_debut_apresmidi' => [
                        'type' => 'time',
                        'format' => 'HH:mm',
                        'sizeValue' => 1,
                    ],
                    'heure_fin_apresmidi' => [
                        'type' => 'time',
                        'format' => 'HH:mm',
                        'sizeValue' => 1,
                    ],
                ]
            ],
            [
                'label' => 'Code formation',
                'fields' => [
                    'code_formation' => [
                        'type' => 'text',
                        'validation' => 'required',
                        'sizeValue' => 1,
                    ],
                ]
            ],
            [
                'label' => 'Lieu par défaut',
                'fields' => [
                    'lieu_id' => [
                        'type' => 'dropdown',
                        'datasource' => 'linkedData.lieus', //relative to the controller
                        'dataId' => 'id', //relative to an item in the datasource
                        'modelObject' => 'lieu', //relative to an item in the controller data 
                        'change' => '',
                        'displayed' => '<libelle>',
                        'placeholder' => 'Lieu par défaut',
                        'validation' => 'required',
                        'sizeValue' => 2,
                    ],
                ]
            ],
            [
                'label' => 'Effectif maximum',
                'fields' => [
                    'effectif_max' => [
                        'type' => 'integer',
                        'sizeValue' => 1,
                    ],
                ]
            ], 
            [
                'label' => 'Type',
                'fields' => [
                    'domaine_formation_id' => [
                        'type' => 'dropdown',
                        'datasource' => 'linkedData.domaineFormations', //relative to the controller
                        'dataId' => 'id', //relative to an item in the datasource
                        'modelObject' => 'domaine_formation', //relative to an item in the controller data 
                        'change' => '',
                        'displayed' => '<libelle>',
                        'placeholder' => 'Type',
                        'validation' => 'required',
                        'sizeValue' => 2,
                    ],
                ]
            ],
            [
                'label' => 'Objectifs pédagogiques',
                'fields' => [
                    'objectifs_pedagogiques' => [
                        'type' => 'textarea',
                        'additionalAttributes' => 'rows=5',
                        'sizeValue' => 10,
                    ],
                ]
            ],
            [
                'label' => 'Matériel',
                'fields' => [
                    'materiel' => [
                        'type' => 'textarea',
                        'additionalAttributes' => 'rows=5',
                        'sizeValue' => 10,
                    ],
                ]
            ],
            [
                'label' => 'Formation confiée à un autre organisme de formation (portage)',
                'fields' => [
                    'portage' => [
                        'type' => 'checkbox',
                        'additionalAttributes' => 'rows=5',
                        'sizeValue' => 10,
                    ],
                ]
            ],
            [
                'label' => 'Formateurs habituels',
                'fields' => [
                    'formateurs_id' => [
                        'type' => 'multiselect',
                        'datasource' => 'linkedData.formateurs',
                        'dataId' => 'id',
                        'modelObjects' => 'formateurs',
                        'displayed' => '<nom> <prenom>',
                        'placeholder' => 'Formateurs',
                        'sizeValue' => 10,
                    ]
                ]
            ],
        ]
    ])

    <div ng-if="moduleCtrl.inited && moduleCtrl.mode != 'create'">
        <div ng-controller="tarifsController as tarifsController">
            @include('components.editableTable', [
                'controllerName' => 'tarifsController',
                'idField' => 'id',
                'title' => 'Tarifs',
                'columns' => [
                    [
                        'label' => 'Tarif',
                        'sortable' => 'tarif_type_id',
                        'defaultSort' => true,
                        'fields' => [
                            'tarif_type_id' => [
                                'filterable' => 'tarif_type.libelle',
                                'editable' => true,
                                'type' => 'dropdown',
                                'datasource' => 'linkedData.tarifTypes',
                                'dataId' => 'id',
                                'modelObject' => 'tarif_type',
                                'displayed' => '<libelle>',
                                'placeholder' => 'Tarif',
                                'addLine' => true,
                                'validation' => 'required',
                                'size' => 3,
                            ],
                        ]
                    ],
                    [
                        'label' => 'Montant',
                        'sortable' => false,
                        'fields' => [
                            'montant' => [
                                'filterable' => false,
                                'editable' => true,
                                'type' => 'integer',
                                'addLine' => true,
                                'validation' => 'required',
                                'size' => 3,
                            ]
                        ]
                    ]
                ]
            ])
        </div>
        @include('components.lists.sessions')
    </div>

</div>
