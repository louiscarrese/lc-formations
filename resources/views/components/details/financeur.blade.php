<div ng-controller="detailController as detailCtrl">
    @include('components.detail', [
        'controller' => 'detailCtrl',
        'fields' => [
            'libelle' => [
                'label' => 'Libellé',
                'type' => 'text',
                'sizeLabel' => 2,
                'sizeValue' => 2,
            ],
            'structure' => [
                'label' => 'Structure',
                'type' => 'text',
                'sizeLabel' => 2,
                'sizeValue' => 2,
            ],
            'nom' => [
                'label' => 'Nom',
                'type' => 'text',
                'sizeLabel' => 2,
                'sizeValue' => 2,
            ],
            'prenom' => [
                'label' => 'Prenom',
                'type' => 'text',
                'sizeLabel' => 2,
                'sizeValue' => 2,
            ],
            'adresse' => [
                'label' => 'Adresse',
                'type' => 'textarea',
		'additionalAttributes' => 'rows=3',
                'sizeLabel' => 2,
                'sizeValue' => 5,
            ],
            'code_postal' => [
                'label' => 'Code postal',
                'type' => 'text',
                'sizeLabel' => 2,
                'sizeValue' => 1,
            ],
            'ville' => [
                'label' => 'Ville',
                'type' => 'text',
                'sizeLabel' => 2,
                'sizeValue' => 2,
            ],
            'tel' => [
                'label' => 'Téléphone',
                'type' => 'text',
                'sizeLabel' => 2,
                'sizeValue' => 2,
            ],
            'email' => [
                'label' => 'Email',
                'type' => 'email',
                'sizeLabel' => 2,
                'sizeValue' => 3,
            ],
            'financeur_type_id' => [
                'label' => 'Type',
                'type' => 'dropdown',
                'datasource' => 'linkedData.financeur_type', //relative to the controller
                'dataId' => 'id', //relative to an item in the dropdownDatasource
                'modelObject' => 'financeur_type', //relative to an item in the controller data 
                'displayed' => '<libelle>',
                'sizeLabel' => 2,
                'sizeValue' => 3,
            ],
        ]
    ])

</div>
