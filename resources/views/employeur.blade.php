@extends('layouts.master')

@section('title', 'Employeur')
@section('js-file', '/js/employeurs-detail.js')
@section('css-file', '/css/app.css')
@section('angularApp', 'employeursDetailApp')

@section('content')
    @include('components.details.employeur')
@endsection