@extends('layouts.master', ['current_menu' => 'preinscription'])

@section('title', 'Préinscriptions')
@section('js-file', '/js/preinscriptions-list.js')
@section('css-file', '/css/app.css')
@section('angularApp', 'preinscriptionsListApp')

@section('content')
    @include('components.lists.preinscriptions')



@endsection