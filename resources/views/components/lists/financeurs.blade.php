@include('components.listTable', 
    [
        'title' => 'Financeurs',
        'controllerName' => 'financeursListController',
        'detailUri' => '/financeurs',
        'idField' => 'id',
        'fields' => [
            'id' => [
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
            'structure' => [
                'label' => 'Structure',
                'sortable' => true,
                'filterable' => true,
            ],
            'nom' => [
                'label' => 'Nom',
                'sortable' => true,
                'filterable' => true,
            ],
            'prenom' => [
                'label' => 'Prénom',
                'sortable' => true,
                'filterable' => true,
            ],
            'financeur_type.id' => [
                'label' => 'Type',
                'sortable' => true,
                'tdClass' => 'centered',
                'filterable' => true,
                'displayedField' => 'financeur_type.libelle'
            ],
        ]
    ])