@inject('formateurService', 'ModuleFormation\Services\FormateurService')

@include('components.listTable', 
    [
        'title' => 'Formateurs',
        'controllerName' => 'formateursListController',
        'detailUri' => 'formateurs',
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
                'tdClass' => 'centered'
            ],
            'email' => [
                'label' => 'Email',
                'sortable' => true,
                'filterable' => true,
                'tdClass' => 'centered',
                'displayedField' => '<a href="mailto:@{{email}}">@{{email}}</a>',
            ],
            'formateur_type.id' => [
                'label' => 'Type',
                'sortable' => true,
                'tdClass' => 'centered',
                'filterable' => 'formateur_type.libelle',
                'displayedField' => '@{{formateur_type.libelle}}'
            ],
        ]
])

<h3>Mails</h3>
<div class="custom-actions">
    <span>
        <a href="{{$formateurService->mailFormateursActifs()}}" class="btn btn-default">Mail formateurs actifs</a>
    </span>
</div>
