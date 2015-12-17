<div ng-controller="detailController as detailCtrl">
    @include('components.detail', [
        'controller' => 'detailCtrl',
        'idField' => 'id',
        'fields' => [
            'id' => [
                'label' => 'Id',
                'type' => 'integer',
                'sizeLabel' => 2,
                'sizeValue' => 1,
            ],
            'module_id' => [
                'label' => 'Module',
                'type' => 'dropdown',
                'datasource' => 'linkedData.modules', //relative to the controller
                'dataId' => 'id', //relative to an item in the datasource
                'modelObject' => 'module', //relative to an item in the controller data 
                'change' => 'detailCtrl.onModuleChange',
                'displayed' => '<libelle>',
                'sizeLabel' => 2,
                'sizeValue' => 5,
            ],
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
            'effectif_max' => [
                'label' => 'Effectif maximum',
                'type' => 'text',
                'sizeLabel' => 2,
                'sizeValue' => 1,
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
        ] //fields
    ])

    <div ng-if="detailCtrl.inited" ng-show="detailCtrl.mode != 'create'">
        @include('components.EditableTable',
            ['controllerName' => 'sessionJoursController',
             'idField' => 'id',
             'title' => 'Jours',
             'fields' => [
                'date' => [
                    'label' => 'Date',
                    'sortable' => true,
                    'filterable' => true,
                    'editable' => true,
                    'type' => 'text', //TODO : date
                    'addLine' => true,
                    'validation' => 'required',
                    'size' => 1,
                ], //date
                'heure_debut' => [
                    'label' => 'Début',
                    'sortable' => true,
                    'filterable' => true,
                    'editable' => true,
                    'type' => 'text', //TODO : time
                    'addLine' => true,
                    'validation' => 'required',
                    'size' => 1,
                ], //heure_debut
                'heure_fin' => [
                    'label' => 'Fin',
                    'sortable' => true,
                    'filterable' => true,
                    'editable' => true,
                    'type' => 'text', //TODO : time
                    'addLine' => true,
                    'validation' => 'required',
                    'size' => 1,
                ], //heure_fin
                'lieu_id' => [
                    'label' => 'Lieu',
                    'sortable' => true,
                    'filterable' => true,
                    'editable' => true,
                    'type' => 'dropdown',
                    'datasource' => 'linkedData.lieus', //relative to the controller
                    'dataId' => 'id', //relative to an item in the datasource
                    'modelObject' => 'lieu', //where to find the subobject in the controller
                    'displayed' => '<libelle>',
                    'addLine' => true,
                    'validation' => 'required',
                    'size' => 3,
                ], //lieu_id

                 'formateurs_id' => [
                    'label' => 'Formateurs',
                    'sortable' => false,
                    'editable' => true,
                    'type' => 'multiselect',
                    'datasource' => 'linkedData.formateurs',
                    'dataId' => 'id',
                    'modelObjects' => 'formateurs',
                    'displayed' => '<nom> <prenom>',
                    'placeholder' => 'Formateurs',
                    'addLine' => true,
                    'size' => 6,
                ]
             ] //fields
             ])
    </div>
<div>