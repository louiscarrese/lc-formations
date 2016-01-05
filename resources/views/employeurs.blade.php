@extends('layouts.master')

@section('title', 'Employeurs')
@section('js-file', 'js/employeurs-list.js')
@section('css-file', 'css/app.css')
@section('angularApp', 'employeursListApp')

@section('content')
    @include('components.lists.employeurs')



@endsection