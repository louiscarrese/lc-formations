@include('components.listTable', 
    [
        'title' => 'Financeurs',
        'controllerName' => 'financeursListController',
        'detailUri' => 'financeurs',
        'localSearch' => true,
        'idField' => 'id',
        'fields' => [
            'libelle' => [
                'label' => 'Libelle',
                'sortable' => true,
                'defaultSort' => true,
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
                'filterable' => 'financeur_type.libelle',
                'displayedField' => '@{{financeur_type.libelle}}'
            ],
        ]
    ])
