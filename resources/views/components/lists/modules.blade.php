@include('components.listTable', 
    [
        'title' => 'Modules',
        'controllerName' => 'modulesListController',
        'detailUri' => 'modules',
        'localSearch' => true,
        'idField' => 'id',
        'fields' => [
            'libelle' => [
                'label' => 'Libelle',
                'sortable' => true,
                'defaultSort' => true,
                'filterable' => true,
            ],
            'domaine_formation.id' => [
                'label' => 'Domaine',
                'sortable' => true,
                'filterable' => 'domaine_formation.libelle',
                'displayedField' => '@{{domaine_formation.libelle}}',
            ],
        ]
    ])

