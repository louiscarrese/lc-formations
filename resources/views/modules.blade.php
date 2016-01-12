@extends('layouts.master')

<?php $current_menu='module'; ?>

@section('title', 'Modules')
@section('js-file', 'js/modules-list.js')
@section('css-file', 'css/app.css')
@section('angularApp', 'modulesListApp')

@section('content')
    @include('components.lists.modules')



@endsection