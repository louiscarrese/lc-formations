@extends('layouts.master')

<?php $current_menu='financeur'; ?>

@section('title', 'Financeurs')
@section('js-file', 'js/financeurs-list.js')
@section('css-file', 'css/app.css')
@section('angularApp', 'financeursListApp')

@section('content')
    @include('components.lists.financeurs')



@endsection