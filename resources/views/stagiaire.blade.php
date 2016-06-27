@inject('viewService', 'ModuleFormation\Services\ViewService')
@extends('layouts.master', ['current_menu' => 'stagiaire'])

@section('title', 'Stagiaire')
@section('js-file', '/js/stagiaires-detail.js')
@section('css-file', '/css/app.css')
@section('angularApp', 'stagiairesDetailApp')

@section('content')
    @include('components.details.stagiaire')
@endsection