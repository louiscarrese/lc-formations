<div ng-controller="detailController as detailCtrl">
    @include('components.detail', [
        'controller' => 'detailCtrl',
        'fields' => [
            'nom' => [
                'label' => 'Nom',
                'type' => 'text',
                'sizeLabel' => 2,
                'sizeValue' => 2,
                'validation' => 'required',
            ],
            'prenom' => [
                'label' => 'Prenom',
                'type' => 'text',
                'sizeLabel' => 2,
                'sizeValue' => 2,
            ],
            'sexe' => [
                'label' => 'Sexe',
                'type' => 'radio',
                'values' => '["M", "F"]',
                'sizeLabel' => 2,
                'sizeValue' => 2,
            ],
            'date_naissance' => [
                'label' => 'Date de naissance',
                'type' => 'date',
                'format' => 'dd/MM/yyyy',
                'sizeLabel' => 2,
                'sizeValue' => 2,
            ],
            'adresse' => [
                'label' => 'Adresse',
                'type' => 'text',
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
            'tel_fixe' => [
                'label' => 'Téléphone fixe',
                'type' => 'text',
                'sizeLabel' => 2,
                'sizeValue' => 2,
            ],
            'tel_portable' => [
                'label' => 'Téléphone portable',
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
            'tel_fixe' => [
                'label' => 'Téléphone fixe',
                'type' => 'text',
                'sizeLabel' => 2,
                'sizeValue' => 2,
            ],
            'formateur_type_id' => [
                'label' => 'Type',
                'type' => 'dropdown',
                'datasource' => 'linkedData.formateur_type', //relative to the controller
                'dataId' => 'id', //relative to an item in the dropdownDatasource
                'modelObject' => 'formateur_type', //relative to an item in the controller data 
                'displayed' => '<libelle>',
                'sizeLabel' => 2,
                'sizeValue' => 3,
            ],
        ]
    ])

</div>
