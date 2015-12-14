@extends('layouts.master')

@section('title', 'Formateurs')
@section('js-file', 'js/formateurs-list.js')
@section('css-file', 'css/app.css')
@section('angularApp', 'formateursListApp')

@section('content')
    @include('components.lists.formateurs')



@endsection