@extends('layouts.master')

<?php $current_menu='module'; ?>

@section('title', 'Module')
@section('js-file', '/js/modules-detail.js')
@section('css-file', '/css/app.css')
@section('angularApp', 'modulesDetailApp')

@section('content')
    @include('components.details.module')
@endsection