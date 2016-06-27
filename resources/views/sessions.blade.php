@inject('viewService', 'ModuleFormation\Services\ViewService')
@extends('layouts.master', ['current_menu' => 'session'])

@section('title', 'Sessions')
@section('js-file', '/js/sessions-list.js')
@section('css-file', '/css/app.css')
@section('angularApp', 'sessionsListApp')

@section('content')
    @include('components.lists.sessions')



@endsection