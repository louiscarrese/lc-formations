@include('components.listTable', 
    [
        'title' => 'Modules',
        'controllerName' => 'modulesListController',
        'detailUri' => '/modules',
        'fields' => [
            'id' => [
                'isId' => true,
                'label' => 'Id',
                'sortable' => true,
                'filterable' => true,
                'tdClass' => 'centered'
            ],
            'libelle' => [
                'label' => 'Libelle',
                'sortable' => true,
                'filterable' => true,
            ],
            'domaine_formation.id' => [
                'label' => 'Domaine',
                'sortable' => true,
                'filterable' => true,
                'displayedField' => 'domaine_formation.libelle',
            ],
        ]
    ])

