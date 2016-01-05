@extends('layouts.master')

@section('title', 'Financeurs')
@section('js-file', 'js/financeurs-list.js')
@section('css-file', 'css/app.css')
@section('angularApp', 'financeursListApp')

@section('content')
    @include('components.lists.financeurs')



@endsection