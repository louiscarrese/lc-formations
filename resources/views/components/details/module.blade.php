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
            'heure_debut' => [
                'label' => 'Heure de début',
                'type' => 'time',
                'format' => 'HH:mm',
                'sizeLabel' => 2,
                'sizeValue' => 1,
            ],
            'heure_fin' => [
                'label' => 'Heure de fin',
                'type' => 'time',
                'format' => 'HH:mm',
                'sizeLabel' => 2,
                'sizeValue' => 1,
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
        @include('components.editableTable', [
            'controllerName' => 'tarifsController',
            'idField' => 'id',
            'title' => 'Tarifs',
            'fields' => [
                'tarif_type_id' => [
                    'label' => 'Tarif',
                    'sortable' => true,
                    'filterable' => true,
                    'editable' => true,
                    'type' => 'dropdown',
                    'datasource' => 'linkedData.tarifTypes',
                    'dataId' => 'id',
                    'modelObject' => 'tarif_type',
                    'displayed' => '<libelle>',
                    'addLine' => true,
                    'validation' => 'required',
                    'size' => 3,
                ],
                'montant' => [
                    'label' => 'Montant',
                    'sortable' => false,
                    'filterable' => false,
                    'editable' => true,
                    'type' => 'integer',
                    'addLine' => true,
                    'validation' => 'required',
                    'size' => 3,
                ]
            ]
        ])


        @include('components.lists.sessions')
    </div>

</div>
