@extends('layouts.master')

@section('title', 'Paramètres')
@section('js-file', 'js/modules-list.js')
@section('css-file', 'css/app.css')
@section('angularApp', 'modulesListApp')

@section('content')
    @include('components.lists.modules')



@endsection