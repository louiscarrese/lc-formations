<div ng-controller="detailController as moduleCtrl">
    @include('components.detail', [
        'controller' => 'moduleCtrl',
        'fields' => [
            'id' => [
                'isId' => true,
                'label' => 'Id',
                'type' => 'integer',
                'sizeLabel' => 2,
                'sizeValue' => 1,
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
            'heure_debut' => [
                'label' => 'Heure de début',
                'type' => 'text',
                'sizeLabel' => 2,
                'sizeValue' => 1,
            ],
            'heure_fin' => [
                'label' => 'Heure de fin',
                'type' => 'text',
                'sizeLabel' => 2,
                'sizeValue' => 1,
            ],
             'heure_debut' => [
                'label' => 'Heure de début',
                'type' => 'text',
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
                'dropdownDatasource' => 'linkedData.domaineFormations', //relative to the controller
                'dropdownDataId' => 'id', //relative to an item in the dropdownDatasource
                'dropdownDataLabel' => 'libelle', //relative to an item in the dropdownDatasource
                'dropdownLabel' => 'module_formation_label', //relative to an item in the controller data 
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
        ]
    ])

    <div ng-if="moduleCtrl.inited" ng-show="moduleCtrl.mode != 'create'">
        @include('components.lists.sessions')
    </div>

</div>
