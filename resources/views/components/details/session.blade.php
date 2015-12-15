<div ng-controller="detailController as detailCtrl">
    @include('components.detail', [
        'controller' => 'detailCtrl',
        'fields' => [
            'id' => [
                'isId' => true,
                'label' => 'Id',
                'type' => 'integer',
                'sizeLabel' => 2,
                'sizeValue' => 1,
            ],
            'module_id' => [
                'label' => 'Module',
                'type' => 'dropdown',
                'dropdownDatasource' => 'linkedData.modules', //relative to the controller
                'dropdownDataId' => 'id', //relative to an item in the dropdownDatasource
                'dropdownDataLabel' => 'libelle', //relative to an item in the dropdownDatasource
                'dropdownLabel' => 'module_label', //relative to an item in the controller data 
                'change' => 'detailCtrl.onModuleChange',
                'sizeLabel' => 2,
                'sizeValue' => 5,
            ],
            'libelle' => [
                'label' => 'Libellé',
                'type' => 'text',
                'sizeLabel' => 2,
                'sizeValue' => 5,
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


    <form name="detailCtrl.sessionJourForm">
        <div ng-if="detailCtrl.inited" ng-show="detailCtrl.mode != 'create'">
            @include('components.EditableTable',
                ['controllerName' => 'sessionJoursController',
                 'title' => 'Jours',
                 'fields' => [
                    'id' => [
                        'label' => 'Id',
                        'isId' => true,
                        'sortable' => true,
                        'filterable' => true,
                        'editable' => true,
                        'type' => 'integer',
                        'addLine' => false,
                        'tdClass' => 'centered',
                        'additionalAttributes' => 'size=1',
                        'validation' => 'required',
                    ], //id
                    'date' => [
                        'label' => 'Date',
                        'sortable' => true,
                        'filterable' => true,
                        'editable' => true,
                        'type' => 'text', //TODO : date
                        'addLine' => true,
                        'validation' => 'required',
                    ], //date
                    'heure_debut' => [
                        'label' => 'Début',
                        'sortable' => true,
                        'filterable' => true,
                        'editable' => true,
                        'type' => 'text', //TODO : time
                        'addLine' => true,
                        'validation' => 'required',
                    ], //heure_debut
                    'heure_fin' => [
                        'label' => 'Fin',
                        'sortable' => true,
                        'filterable' => true,
                        'editable' => true,
                        'type' => 'text', //TODO : time
                        'addLine' => true,
                        'validation' => 'required',
                    ], //heure_fin
                    'lieu_id' => [
                        'label' => 'Lieu',
                        'sortable' => true,
                        'filterable' => true,
                        'editable' => true,
                        'type' => 'dropdown',
                        'dropdownDatasource' => 'linkedData.lieus', //relative to the controller
                        'dropdownDataId' => 'id', //relative to an item in the dropdownDatasource
                        'dropdownDataLabel' => 'libelle', //relative to an item in the dropdownDatasource
                        'dropdownLabel' => 'lieu_label', //relative to an item in the controller data
                        'addLine' => true,
                        'validation' => 'required',
                    ], //heure_debut
                 ] //fields
                 ])
        </div>
    </form>
<div>