<div ng-controller="detailController as detailCtrl">
    @include('components.detail', [
        'controller' => 'detailCtrl',
        'fields' => [
            'nom' => [
                'label' => 'Nom',
                'type' => 'text',
                'sizeLabel' => 3,
                'sizeValue' => 2,
                'validation' => 'required',
            ],
            'prenom' => [
                'label' => 'Prenom',
                'type' => 'text',
                'sizeLabel' => 3,
                'sizeValue' => 2,
            ],
            'sexe' => [
                'label' => 'Sexe',
                'type' => 'radio',
                'values' => '["M", "F"]',
                'sizeLabel' => 3,
                'sizeValue' => 2,
            ],
            'date_naissance' => [
                'label' => 'Date de naissance',
                'type' => 'date',
                'format' => 'dd/MM/yyyy',
                'sizeLabel' => 3,
                'sizeValue' => 2,
            ],
            'adresse' => [
                'label' => 'Adresse',
                'type' => 'textarea',
        		'additionalAttributes' => 'rows=3',
                'sizeLabel' => 3,
                'sizeValue' => 5,
            ],
            'code_postal' => [
                'label' => 'Code postal',
                'type' => 'text',
                'sizeLabel' => 3,
                'sizeValue' => 1,
            ],
            'ville' => [
                'label' => 'Ville',
                'type' => 'text',
                'sizeLabel' => 3,
                'sizeValue' => 2,
            ],
            'tel_fixe' => [
                'label' => 'Téléphone fixe',
                'type' => 'text',
                'sizeLabel' => 3,
                'sizeValue' => 2,
            ],
            'tel_portable' => [
                'label' => 'Téléphone portable',
                'type' => 'text',
                'sizeLabel' => 3,
                'sizeValue' => 2,
            ],
            'email' => [
                'label' => 'Email',
                'type' => 'email',
                'sizeLabel' => 3,
                'sizeValue' => 3,
                'validation' => 'email',
            ],
            'profession' => [
                'label' => 'Profession',
                'type' => 'text',
                'sizeLabel' => 3,
                'sizeValue' => 2,
            ],
            'etudes' => [
                'label' => 'Etudes',
                'type' => 'text',
                'sizeLabel' => 3,
                'sizeValue' => 2,
            ],
            'demandeur_emploi_depuis' => [
                'label' => 'Demandeur d\'emploi depuis',
                'type' => 'date',
                'format' => 'dd/MM/yyyy',
                'sizeLabel' => 3,
                'sizeValue' => 2,
            ],
            'niveau_qualification' => [
                'label' => 'Niveau de qualification',
                'type' => 'text',
                'sizeLabel' => 3,
                'sizeValue' => 2,
            ],
            'domaine_pro' => [
                'label' => 'Domaine professionel',
                'type' => 'text',
                'sizeLabel' => 3,
                'sizeValue' => 2,
            ],
            'niveau_formation_id' => [
                'label' => 'Niveau de formation',
                'type' => 'dropdown',
                'datasource' => 'linkedData.niveau_formation', //relative to the controller
                'dataId' => 'id', //relative to an item in the dropdownDatasource
                'modelObject' => 'niveau_formation', //relative to an item in the controller data 
                'displayed' => '<libelle>',
                'sizeLabel' => 3,
                'sizeValue' => 4,
            ],
            'employeur_id' => [
                'label' => 'Employeur',
                'type' => 'dropdown',
                'datasource' => 'linkedData.employeur', //relative to the controller
                'dataId' => 'id', //relative to an item in the dropdownDatasource
                'modelObject' => 'employeur', //relative to an item in the controller data 
                'displayed' => '<nom>',
                'sizeLabel' => 3,
                'sizeValue' => 3,
            ],
            'stagiaire_type_id' => [
                'label' => 'Type',
                'type' => 'dropdown',
                'datasource' => 'linkedData.stagiaire_type', //relative to the controller
                'dataId' => 'id', //relative to an item in the dropdownDatasource
                'modelObject' => 'stagiaire_type', //relative to an item in the controller data 
                'displayed' => '<libelle>',
                'sizeLabel' => 3,
                'sizeValue' => 3,
            ],
        ]
    ])

    <div ng-if="detailCtrl.inited && detailCtrl.mode != 'create'">
        @include('components.lists.inscriptions', ['displayedField' => ['session.libelle']])
    </div>

</div>
