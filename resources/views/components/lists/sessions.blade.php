@include('components.listTable', 
    [
        'title' => 'Sessions',
        'controllerName' => 'sessionsListController',
        'detailUri' => 'sessions',
        'localSearch' => true,
        'idField' => 'id',
        'fields' => [
            'module.libelle' => [
                'label' => 'Libelle',
                'sortable' => true,
                'filterable' => true,
                'tdClass' => "{'strike-through': item.canceled}"
            ],
            'libelle' => [
                'label' => 'Dates',
                'sortable' => true,
                'sortable_field' => 'firstDate',
                'defaultSort' => true,
                'filterable' => true,
            ],
            'effectifTotal' => [
                'label' => 'Inscriptions',
                'sortable' => true,
                'filterable' => false,
                'displayedField' => '<i class="text-success">@{{effectifValidated}}</i> + <i class="text-warning">@{{effectifPending}}</i> + <i class="text-danger">@{{effectifWaitingList}}</i> (@{{effectifTotal}}) / @{{effectif_max}}',
            ],

        ]
    ])

