@extends('layouts.master')

@section('title', 'Stagiaires')
@section('js-file', 'js/stagiaires-list.js')
@section('css-file', 'css/app.css')
@section('angularApp', 'stagiairesListApp')

@section('content')
    @include('components.lists.stagiaires')



@endsection