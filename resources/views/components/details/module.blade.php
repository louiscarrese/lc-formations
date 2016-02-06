<div ng-controller="detailController as moduleCtrl">
    @include('components.detail', [
        'controller' => 'moduleCtrl',
        'fields' => [
            'libelle' => [
                'label' => 'Libellé',
                'type' => 'text',
                'sizeLabel' => 2,
                'sizeValue' => 5,
                'validation' => 'required'
            ],
            'nb_jours' => [
                'label' => 'Nombre de jours',
                'type' => 'integer',
                'sizeLabel' => 2,
                'sizeValue' => 1,
            ],
            'heure_debut_matin' => [
                'label' => 'Heure de début de matinée',
                'type' => 'time',
                'format' => 'HH:mm',
                'sizeLabel' => 2,
                'sizeValue' => 1,
            ],
            'heure_fin_matin' => [
                'label' => 'Heure de fin de matinée',
                'type' => 'time',
                'format' => 'HH:mm',
                'sizeLabel' => 2,
                'sizeValue' => 1,
            ],
            'heure_debut_apresmidi' => [
                'label' => 'Heure de début d\'après midi',
                'type' => 'time',
                'format' => 'HH:mm',
                'sizeLabel' => 2,
                'sizeValue' => 1,
            ],
            'heure_fin_apresmidi' => [
                'label' => 'Heure de fin d\'après midi',
                'type' => 'time',
                'format' => 'HH:mm',
                'sizeLabel' => 2,
                'sizeValue' => 1,
            ],
            'code_formation' => [
                'label' => 'Code formation',
                'type' => 'text',
                'sizeLabel' => 2,
                'sizeValue' => 1,
            ],
            'lieu_id' => [
                'label' => 'Lieu par défaut',
                'type' => 'dropdown',
                'datasource' => 'linkedData.lieus', //relative to the controller
                'dataId' => 'id', //relative to an item in the datasource
                'modelObject' => 'lieu', //relative to an item in the controller data 
                'change' => '',
                'displayed' => '<libelle>',
                'placeholder' => 'Lieu par défaut',
                'validation' => 'required',
                'sizeLabel' => 2,
                'sizeValue' => 2,
            ],
            'effectif_max' => [
                'label' => 'Effectif maximum',
                'type' => 'integer',
                'sizeLabel' => 2,
                'sizeValue' => 1,
            ],
            'domaine_formation_id' => [
                'label' => 'Type',
                'type' => 'dropdown',
                'datasource' => 'linkedData.domaineFormations', //relative to the controller
                'dataId' => 'id', //relative to an item in the datasource
                'modelObject' => 'domaine_formation', //relative to an item in the controller data 
                'change' => '',
                'displayed' => '<libelle>',
                'placeholder' => 'Type',
                'validation' => 'required',
                'sizeLabel' => 2,
                'sizeValue' => 2,
            ],
            'objectifs_pedagogiques' => [
                'label' => 'Objectifs pédagogiques',
                'type' => 'textarea',
                'additionalAttributes' => 'rows=5',
                'sizeLabel' => 2,
                'sizeValue' => 10,
            ],
            'materiel' => [
                'label' => 'Matériel',
                'type' => 'textarea',
                'additionalAttributes' => 'rows=5',
                'sizeLabel' => 2,
                'sizeValue' => 10,
            ],
            'formateurs_id' => [
                'label' => 'Formateurs habituels',
                'type' => 'multiselect',
                'datasource' => 'linkedData.formateurs',
                'dataId' => 'id',
                'modelObjects' => 'formateurs',
                'displayed' => '<nom> <prenom>',
                'placeholder' => 'Formateurs',
                'sizeLabel' => 2,
                'sizeValue' => 10,
            ]
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
                        'fields' => [
                            'tarif_type_id' => [
                                'filterable' => true,
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
