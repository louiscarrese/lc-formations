@inject('viewService', 'ModuleFormation\Services\ViewService')
@extends('layouts.master', ['current_menu' => 'inscription'])

@section('title', 'Inscriptions')
@section('js-file', '/js/inscriptions-list.js')
@section('css-file', '/css/app.css')
@section('angularApp', 'inscriptionsListApp')

@section('content')
    @include('components.lists.inscriptions')



@endsection