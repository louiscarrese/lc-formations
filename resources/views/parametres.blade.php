@extends('layouts.master')

@section('title', 'Paramètres')
@section('js-file', 'js/parametres.js')
@section('css-file', 'css/app.css')

@section('content')
    @include('components.stagiairetypes')
    @include('components.formateurtypes')
    @include('components.financeurtypes')
    @include('components.tariftypes')


@endsection