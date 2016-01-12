@extends('layouts.master')

<?php $current_menu='session'; ?>

@section('title', 'Session')
@section('js-file', '/js/sessions-detail.js')
@section('css-file', '/css/app.css')
@section('angularApp', 'sessionsDetailApp')

@section('content')
    @include('components.details.session')
@endsection