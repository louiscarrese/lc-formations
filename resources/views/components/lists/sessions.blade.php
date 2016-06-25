@include('components.listTable', 
    [
        'title' => 'Sessions',
        'controllerName' => 'sessionsListController',
        'detailUri' => 'sessions',
        'idField' => 'id',
        'fields' => [
            'module.libelle' => [
                'label' => 'Libelle',
                'sortable' => true,
                'defaultSort' => true,
                'filterable' => true,
            ],
            'libelle' => [
                'label' => 'Dates',
                'sortable' => true,
                'filterable' => true,
            ],
        ]
    ])

