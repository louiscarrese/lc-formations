@include('components.listTable', 
    [
        'title' => 'Stagiaires',
        'controllerName' => 'stagiairesListController',
        'detailUri' => 'stagiaires',
        'idField' => 'id',
        'fields' => [
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
                'tdClass' => 'centered',
                'displayedField' => '<a href="mailto:@{{email}}">@{{email}}</a>',
            ],
            'stagiaire_type.id' => [
                'label' => 'Type',
                'sortable' => true,
                'tdClass' => 'centered',
                'filterable' => 'stagiaire_type.libelle',
                'displayedField' => '@{{stagiaire_type.libelle}}'
            ],
        ]
    ])