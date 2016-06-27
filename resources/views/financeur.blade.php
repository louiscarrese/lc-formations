@inject('viewService', 'ModuleFormation\Services\ViewService')
@extends('layouts.master', ['current_menu' => 'financeur'])

@section('title', 'Financeur')
@section('js-file', '/js/financeurs-detail.js')
@section('css-file', '/css/app.css')
@section('angularApp', 'financeursDetailApp')

@section('content')
    @include('components.details.financeur')
@endsection