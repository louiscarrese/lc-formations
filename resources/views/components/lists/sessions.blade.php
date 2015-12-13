@include('components.listTable', 
    [
        'title' => 'Sessions',
        'controllerName' => 'sessionsListController',
        'detailUri' => '/sessions',
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
        ]
    ])

