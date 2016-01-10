@extends('layouts.master')

@section('title', 'Inscriptions')
@section('js-file', 'js/inscriptions-list.js')
@section('css-file', 'css/app.css')
@section('angularApp', 'inscriptionsListApp')

@section('content')
    @include('components.lists.inscriptions')



@endsection