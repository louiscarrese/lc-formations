@inject('viewService', 'ModuleFormation\Services\ViewService')
@extends('layouts.master', ['current_menu' => ''])

@section('title', 'Module Formation')
@section('js-file', '/js/home.js')
@section('angularApp', 'homeApp')

@section('css-file', '/css/app.css')
@section('content')
    @include('components.lists.sessions', ['queryMethod' => 'upcoming'])

    @include('components.lists.inscriptions', ['queryMethod' => 'en_cours'])
@endsection