@inject('viewService', 'ModuleFormation\Services\ViewService')
@extends('layouts.master', ['current_menu' => 'preinscription'])

@section('title', 'Préinscription')
@section('js-file', '/js/preinscriptions-detail.js')
@section('css-file', '/css/app.css')
@section('angularApp', 'preinscriptionsDetailApp')

@section('content')
    @include('components.details.preinscription')
@endsection