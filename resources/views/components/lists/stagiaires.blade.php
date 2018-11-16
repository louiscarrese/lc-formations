@include('components.listTable', 
    [
        'title' => 'Stagiaires',
        'controllerName' => 'stagiairesListController',
        'detailUri' => 'stagiaires',
        'localSearch' => true,
        'idField' => 'id',
        'fields' => [
            'nom' => [
                'label' => 'Nom',
                'sortable' => true,
                'defaultSort' => true,
                'filterable' => true,
            ],
            'prenom' => [
                'label' => 'Prenom',
                'sortable' => true,
                'filterable' => true,
            ],
            'telephone' => [
                'label' => 'Téléphone',
                'sortable' => true,
                'filterable' => true,
                'tdClass' => 'centered text-nowrap',
            ],
            'email' => [
                'label' => 'Email',
                'sortable' => true,
                'filterable' => true,
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
