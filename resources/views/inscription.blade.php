@extends('layouts.master', ['current_menu' => 'inscription'])

@section('title', 'Inscription')
@section('js-file', '/js/inscriptions-detail.js')
@section('css-file', '/css/app.css')
@section('angularApp', 'inscriptionsDetailApp')

@section('content')
    @include('components.details.inscription')
@endsection