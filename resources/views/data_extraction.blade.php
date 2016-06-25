@extends('layouts.master', ['current_menu' => 'dataExtraction'])

@section('title', 'Modules')
@section('js-file', '/js/dataExtraction.js')
@section('css-file', '/css/app.css')
@section('angularApp', 'dataExtractionApp')

@section('content')
    @include('print.dataExtraction')



@endsection