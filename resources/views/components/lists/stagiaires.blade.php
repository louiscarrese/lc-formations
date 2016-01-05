@include('components.listTable', 
    [
        'title' => 'Stagiaires',
        'controllerName' => 'stagiairesListController',
        'detailUri' => '/stagiaires',
        'idField' => 'id',
        'fields' => [
            'id' => [
                'label' => 'Id',
                'sortable' => true,
                'filterable' => true,
                'tdClass' => 'centered'
            ],
            'nom' => [
                'label' => 'Nom',
                'sortable' => true,
                'filterable' => true,
            ],
            'prenom' => [
                'label' => 'Prenom',
                'sortable' => true,
                'filterable' => true,
            ],
            'tel_fixe' => [
                'label' => 'Fixe',
                'sortable' => true,
                'filterable' => true,
                'tdClass' => 'centered'
            ],
            'tel_portable' => [
                'label' => 'Portable',
                'sortable' => true,
                'filterable' => true,
                'tdClass' => 'centered'
            ],
            'email' => [
                'label' => 'Email',
                'sortable' => true,
                'filterable' => true,
                'tdClass' => 'centered'
            ],
            'stagiaire_type.id' => [
                'label' => 'Type',
                'sortable' => true,
                'tdClass' => 'centered',
                'filterable' => true,
                'displayedField' => 'stagiaire_type.libelle'
            ],
        ]
    ])