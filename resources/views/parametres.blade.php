@extends('layouts.master')

@section('title', 'Paramètres')
@section('js-file', 'js/parametres.js')
@section('css-file', 'css/app.css')
@section('angularApp', 'parametresApp')

@section('content')
    @include('components.editableTable',
        ['controllerName' => 'stagiaireTypesController',
         'title' => 'Types de stagiaires',
         'fields' => [
            'id' => [
                'label' => 'Id',
                'isId' => true,
                'sortable' => true,
                'filterable' => true,
                'editable' => true,
                'type' => 'integer',
                'addLine' => false,
                'tdClass' => 'centered',
                'additionalAttributes' => 'size=1',
            ], //id
            'libelle' => [
                'label' => 'Libellé',
                'sortable' => true,
                'filterable' => true,
                'editable' => true,
                'type' => 'text',
                'addLine' => true,
            ], //libelle
            'is_salarie' => [
                'label' => 'Salarié',
                'sortable' => true,
                'filterable' => true,
                'editable' => true,
                'type' => 'checkbox',
                'addLine' => true,
                'tdClass' => 'centered',
            ], //is_salarie
            'is_fonctionnaire' => [
                'label' => 'Fonctionnaire',
                'sortable' => true,
                'filterable' => true,
                'editable' => true,
                'type' => 'checkbox',
                'addLine' => true,
                'tdClass' => 'centered',
            ], //is_fonctionnaire
            'is_contrat_pro' => [
                'label' => 'Contrat Pro',
                'sortable' => true,
                'filterable' => true,
                'editable' => true,
                'type' => 'checkbox',
                'addLine' => true,
                'tdClass' => 'centered',
            ], //is_contrat_pro
            'is_demandeur_emploi' => [
                'label' => 'Demandeur d\'emploi',
                'sortable' => true,
                'filterable' => true,
                'editable' => true,
                'type' => 'checkbox',
                'addLine' => true,
                'tdClass' => 'centered',
            ], //is_demandeur_emploi
        ], //fields
    ])

    @include('components.editableTable',
        ['controllerName' => 'formateurTypesController',
         'title' => 'Types de formateurs',
         'fields' => [
            'id' => [
                'label' => 'Id',
                'isId' => true,
                'sortable' => true,
                'filterable' => true,
                'editable' => true,
                'type' => 'integer',
                'addLine' => true,
                'tdClass' => 'centered',
                'additionalAttributes' => 'size=1',
            ], //id
            'libelle' => [
                'label' => 'Libellé',
                'sortable' => true,
                'filterable' => true,
                'editable' => true,
                'type' => 'text',
                'addLine' => true,
            ], //libelle
        ], //fields
    ])

    @include('components.editableTable',
        ['controllerName' => 'financeurTypesController',
         'title' => 'Types de formateurs',
         'fields' => [
            'id' => [
                'label' => 'Id',
                'isId' => true,
                'sortable' => true,
                'filterable' => true,
                'editable' => true,
                'type' => 'integer',
                'addLine' => false,
                'tdClass' => 'centered',
                'additionalAttributes' => 'size=1',
            ], //id
            'libelle' => [
                'label' => 'Libellé',
                'sortable' => true,
                'filterable' => true,
                'editable' => true,
                'type' => 'text',
                'addLine' => true,
            ], //libelle
        ], //fields
    ])


    @include('components.editableTable',
        ['controllerName' => 'financeurTypesController',
         'title' => 'Types de financeurs',
         'fields' => [
            'id' => [
                'label' => 'Id',
                'isId' => true,
                'sortable' => true,
                'filterable' => true,
                'editable' => true,
                'type' => 'integer',
                'addLine' => false,
                'tdClass' => 'centered',
                'additionalAttributes' => 'size=1',
            ], //id
            'libelle' => [
                'label' => 'Libellé',
                'sortable' => true,
                'filterable' => true,
                'editable' => true,
                'type' => 'text',
                'addLine' => true,
            ], //libelle
        ], //fields
    ])

    @include('components.editableTable',
        ['controllerName' => 'tarifTypesController',
         'title' => 'Types de tarifs',
         'fields' => [
            'id' => [
                'label' => 'Id',
                'isId' => true,
                'sortable' => true,
                'filterable' => true,
                'editable' => true,
                'type' => 'integer',
                'addLine' => false,
                'tdClass' => 'centered',
                'additionalAttributes' => 'size=1',
            ], //id
            'libelle' => [
                'label' => 'Libellé',
                'sortable' => true,
                'filterable' => true,
                'editable' => true,
                'type' => 'text',
                'addLine' => true,
            ], //libelle
        ], //fields
    ])

    @include('components.editableTable',
        ['controllerName' => 'domaineFormationsController',
         'title' => 'Domaines de formation',
         'fields' => [
            'id' => [
                'label' => 'Id',
                'isId' => true,
                'sortable' => true,
                'filterable' => true,
                'editable' => true,
                'type' => 'integer',
                'addLine' => false,
                'tdClass' => 'centered',
                'additionalAttributes' => 'size=1',
            ], //id
            'libelle' => [
                'label' => 'Libellé',
                'sortable' => true,
                'filterable' => true,
                'editable' => true,
                'type' => 'text',
                'addLine' => true,
            ], //libelle
        ], //fields
    ])

    @include('components.editableTable',
        ['controllerName' => 'lieuController',
         'title' => 'Lieux de formation',
         'fields' => [
            'id' => [
                'label' => 'Id',
                'isId' => true,
                'sortable' => true,
                'filterable' => true,
                'editable' => true,
                'type' => 'integer',
                'addLine' => false,
                'tdClass' => 'centered',
                'additionalAttributes' => 'size=1',
            ], //id
            'libelle' => [
                'label' => 'Libellé',
                'sortable' => true,
                'filterable' => true,
                'editable' => true,
                'type' => 'text',
                'addLine' => true,
            ], //libelle
        ], //fields
    ])

@endsection