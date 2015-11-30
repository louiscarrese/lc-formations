@extends('layouts.master')

@section('title', 'Paramètres')
@section('js-file', 'js/parametres.js')
@section('css-file', 'css/app.css')
@section('angularApp', 'parametresApp')

@section('content')
    @include('components.parametres.stagiairetypes')
    @include('components.parametres.formateurtypes')
    @include('components.parametres.financeurtypes')
    @include('components.parametres.tariftypes')
    @include('components.parametres.domaineformations')
    @include('components.parametres.lieu')
@endsection