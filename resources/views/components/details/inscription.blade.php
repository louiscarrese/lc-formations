<div ng-controller="detailController as detailCtrl">
    @include('components.detail', [
        'controller' => 'detailCtrl',
        'fields' => [
            'stagiaire_id' => [
                'label' => 'Stagiaire',
                'type' => 'dropdown',
                'datasource' => 'linkedData.stagiaire', //relative to the controller
                'dataId' => 'id', //relative to an item in the dropdownDatasource
                'modelObject' => 'stagiaire', //relative to an item in the controller data 
                'displayed' => '<nom> <prenom>',
                'searchable' => true,
                'sizeLabel' => 2,
                'sizeValue' => 3,
                'validation' => 'required',
            ],
            'session_id' => [
                'label' => 'Session',
                'type' => 'dropdown',
                'datasource' => 'linkedData.session', //relative to the controller
                'dataId' => 'id', //relative to an item in the dropdownDatasource
                'modelObject' => 'session', //relative to an item in the controller data 
                'displayed' => '<module.libelle>',
                'searchable' => true,
                'sizeLabel' => 2,
                'sizeValue' => 3,
                'validation' => 'required',
            ],
            'profession_structure' => [
                'label' => 'Profession',
                'type' => 'textarea',
                'additionalAttributes' => 'rows=5',
                'sizeLabel' => 2,
                'sizeValue' => 10,
            ],
            'experiences' => [
                'label' => 'Expériences',
                'type' => 'textarea',
                'additionalAttributes' => 'rows=5',
                'sizeLabel' => 2,
                'sizeValue' => 10,
            ],
            'attentes' => [
                'label' => 'Attentes',
                'type' => 'textarea',
                'additionalAttributes' => 'rows=5',
                'sizeLabel' => 2,
                'sizeValue' => 10,
            ],
            'suggestions' => [
                'label' => 'Suggestions',
                'type' => 'textarea',
                'additionalAttributes' => 'rows=5',
                'sizeLabel' => 2,
                'sizeValue' => 10,
            ],
            'formations_precedentes' => [
                'label' => 'Formations précédentes',
                'type' => 'textarea',
                'additionalAttributes' => 'rows=5',
                'sizeLabel' => 2,
                'sizeValue' => 10,
            ],
        ]
    ])
</div>
