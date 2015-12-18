<div ng-controller="detailController as moduleCtrl">
    @include('components.detail', [
        'controller' => 'moduleCtrl',
        'fields' => [
            'id' => [
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
                'datasource' => 'linkedData.domaineFormations', //relative to the controller
                'dataId' => 'id', //relative to an item in the datasource
                'modelObject' => 'module_formation', //relative to an item in the controller data 
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
        ]
    ])

    <div ng-if="moduleCtrl.inited" ng-show="moduleCtrl.mode != 'create'">
        @include('components.lists.sessions')
    </div>

</div>
