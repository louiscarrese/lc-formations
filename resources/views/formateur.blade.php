@extends('layouts.master')

<?php $current_menu='formateur'; ?>

@section('title', 'Formateur')
@section('js-file', '/js/formateurs-detail.js')
@section('css-file', '/css/app.css')
@section('angularApp', 'formateursDetailApp')

@section('content')
    @include('components.details.formateur')
@endsection